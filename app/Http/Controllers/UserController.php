<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Http\Requests\UserRequest;
use Hash;
Use Auth;
use App\Http\Resources\API\UserResource;
use App\Http\Resources\API\ServiceResource;
use Illuminate\Support\Facades\Password;
use App\Models\Booking;
use App\Models\WorkExperience;
use App\Models\Wallet;
use App\Models\HandymanRating;
use App\Http\Resources\API\HandymanRatingResource;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

class UserController extends Controller
{
	use NotificationTrait;
	public function register(UserRequest $request)
	{

		$input = $request->all();
		
	   
		$email = $input['email'];
		$username = $input['username'];
		$password = $input['password'];
		$input['display_name'] = $input['first_name']." ".$input['last_name'];
		$input['user_type'] = isset($input['user_type']) ? $input['user_type'] : 'user';
		$input['password'] = Hash::make($password);
		$input['age'] = $input['age'];  // 17-05-24
		$input['gender'] = $input['gender'];  // 17-05-24


		//  $input['previous_employee_history'] = $input['previous_employee_history'];
		//  $input['skill'] = $input['skill'];
		//  $input['duration'] = $input['duration'];
		//  $input['days_available'] = $input['days_available'];
		//  $input['work_location'] = $input['work_location'];
		//  $input['work_area'] = $input['work_area'];
		//  $input['preffered_type_work'] = $input['preffered_type_work'];
		//  $input['health_physical_limitation'] = $input['health_physical_limitation'];
		//  $input['languages_spoken'] = $input['languages_spoken'];
		//  $input['emergency_contact'] = $input['emergency_contact'];  
		


		if( in_array($input['user_type'],['handyman', 'provider'])) // USERTYPES
		{
			$input['status'] = isset($input['status']) ? $input['status']: 0;
		}

		$user = User::withTrashed()                 // DELETE ENTRY
		->where(function ($query) use ($email, $username) {
			$query->where('email', $email)->orWhere('username', $username);
		})
		->first();

		if($user){
			if($user->deleted_at == null){

				$message = trans('messages.login_form');
				$response = [
					'message' => $message,
				];
				return comman_custom_response($response);
			}
			$message = trans('messages.deactivate');
			$response = [
				'message' => $message,
				'Isdeactivate' => 1,
			];
			return comman_custom_response($response);
		}else{
			$user = User::create($input);   // CREATE USER
			//Work Experience       
			//  if(!empty($user->id)){               
			//     $input['user_id'] = $user->id;
			//     $user = WorkExperience::create($input); 
			// }
			

			if ($user->user_type == 'user' || $user->user_type == 'provider' || $user->user_type == 'handyman') {
				$id = $user->id;
				$user->assignRole($input['user_type']);
				$verificationLink = route('verify',['id' => $id]);
			  //  Mail::to($user->email)->send(new VerificationEmail($verificationLink));
				$message = 'Email Verification link has been sent to your email. Please Check your inbox';
				$response = [
					'message' => $message,
					'data' => $user
				];
				return comman_custom_response($response);
			}
			$user->assignRole($input['user_type']);
		}

		if($user->user_type == 'provider' || $user->user_type == 'user'){
			$wallet = array(
				'title' => $user->display_name,
				'user_id' => $user->id,
				'amount' => 0
			);
			$result = Wallet::create($wallet);
		}
		if(!empty($input['loginfrom']) && $input['loginfrom'] === 'vue-app'){
			if($user->user_type != 'user'){
				$message = trans('messages.save_form',['form' => $input['user_type'] ]);
				$response = [
					'message' => $message,
					'data' => $user
				];


				return comman_custom_response($response);
			}
		}
		$input['api_token'] = $user->createToken('auth_token')->plainTextToken;

		unset($input['password']);
		$message = trans('messages.save_form',['form' => $input['user_type'] ]);

		$user->api_token = $user->createToken('auth_token')->plainTextToken;
		$response = [
			'message' => $message,
			'data' => $user
		];

		$activity_data = [
			'activity_type' => 'resgister',
			'user_id' => $user->id,
			'user_type' => $user->user_type,
		];
		$this->sendNotification($activity_data);

		return comman_custom_response($response);
	}

	public function SendOtp(Request $request) {
		$user=User::select('*')
			->where('contact_number', 'like', '%'.$request->mobile)
			->limit(1)
			->get()
		;

		if(isset($user)){
			$otp=rand(100000, 999999);

			$usr=User::find($user[0]->id);
			$usr->otp = $otp;
			$usr->save();
			
			$mobile=$request->mobile;
			// $mobile="9815006568";

			$url = 'https://www.fast2sms.com/dev/bulkV2?authorization=Ssvpd7EcZ2LVAkjhemDwKaBW8rG4nzQU6Ogbt5xH0FITM9oPqym6CPLFA8KBanTtO7xvrwz5S2pRqhcI&route=dlt&sender_id=NABOTP&message=171269&variables_values='.$otp.'&flash=0&numbers='.$mobile;

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_HTTPHEADER, [
				'Cache-Control: no-cache',
				'Content-Type: application/x-www-form-urlencoded',
				'cache-control: no-cache'
			]);

			$response = curl_exec($ch);
			// dd($response);
			curl_close($ch);
			
			// dd($user->toarray());

			$otp_response = [
				// 'success' => true,
				'user_id' => $user[0]->id,
				'mobile' => $mobile,
				'otp_sent' => true
			];
			return comman_custom_response($otp_response);
		}
	}

	public function LoginOtpVerify(Request $request) {
		$user=User::select('id', 'username', 'first_name', 'last_name', 'email', 'user_type', 'contact_number', 'status', 'display_name')
			->where('id', $request->user_id)
			->where('otp', $request->otp)
			->get()
		;
		// dd($user->toarray());

		if(isset($user) && $user->count() > 0) {
			$data['success'] = true;
			$data = $user;

			return response()->json([ 'success'=> true, 'data' => $data ], 200 );
		}else{
			$message = trans('auth.failed');
			return comman_message_response($message, 406);
		}
	}

	public function login(Request $request) {
		$Isactivate = request('Isactivate');
		// dd($Isactivate);
		if($Isactivate == 1){
			$user = User::withTrashed()
			->where('email', request('email'))
			->first();
			if($user){
				$user->restore();
			}else{
				$message = trans('auth.failed');
				return comman_message_response($message, 406);
			}

		}

		if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

			$user = Auth::user();
			if(request('loginfrom') === 'vue-app'){
				if($user->user_type != 'user'){
					$message = trans('auth.not_able_login');
					return comman_message_response($message,400);
				}
			}
			$user->save();
	
			$success = $user;
			$success['user_role'] = $user->getRoleNames();
			$success['api_token'] = $user->createToken('auth_token')->plainTextToken;
			$success['profile_image'] = getSingleMedia($user,'profile_image',null);
			$is_verify_provider = false;

			if($user->user_type == 'provider')
			{
				$is_verify_provider = verify_provider_document($user->id);
				$success['subscription'] = get_user_active_plan($user->id);

				if(is_any_plan_active($user->id) == 0 && $success['is_subscribe'] == 0 ){
					$success['subscription'] = user_last_plan($user->id);
				}
				$success['is_subscribe'] = is_subscribed_user($user->id);
				$success['provider_id'] = admin_id();

			}
			if($user->user_type == 'provider' || $user->user_type == 'user'){
				$wallet = Wallet::where('user_id',$user->id)->first();
				if( $wallet == null){
					$wallet = array(
						'title' => $user->display_name,
						'user_id' => $user->id,
						'amount' => 0
					);
					Wallet::create($wallet);
				}
			}
			$success['is_verify_provider'] = (int) $is_verify_provider;
			unset($success['media']);
			unset($user['roles']);

				return response()->json([ 'data' => $success ], 200 );
		} else{
			$message = trans('auth.failed');
			return comman_message_response($message,406);
		}
	}

	public function userList(Request $request)
	{
		$user_type = isset($request['user_type']) ? $request['user_type'] : 'handyman';
		$status = isset($request['status']) ? $request['status'] : 1;

		$user_list = User::orderBy('id','desc')->where('user_type',$user_type);
		if(!empty($status)){
			$user_list = $user_list->where('status',$status);
		}

		if(default_earning_type() === 'subscription' && $user_type == 'provider' && auth()->user() !== null && !auth()->user()->hasRole('admin')){
			$user_list = $user_list->where('is_subscribe',1);
		}

		if(auth()->user() !== null && auth()->user()->hasRole('admin')){
			$user_list = $user_list->withTrashed();
			if($request->has('keyword') && isset($request->keyword))
			{
				$user_list = $user_list->where('display_name','like','%'.$request->keyword.'%');
			}
			if($user_type == 'handyman' && $status == 0){
				$user_list = $user_list->orWhere('provider_id',NULL)->where('user_type' ,'handyman');
			}
			if($user_type == 'handyman' && $status == 1){
				$user_list = $user_list->whereNotNull('provider_id')->where('user_type' ,'handyman');
			}

		}
		if($request->has('provider_id'))
		{
			$user_list = $user_list->where('provider_id',$request->provider_id);
		}
		if($request->has('city_id') && !empty($request->city_id))
		{
			$user_list = $user_list->where('city_id',$request->city_id);
		}
		if($request->has('keyword') && isset($request->keyword))
		{
			$user_list = $user_list->where('display_name','like','%'.$request->keyword.'%');
		}
		if($request->has('booking_id')){
			$booking_data = Booking::find($request->booking_id);

			$service_address = $booking_data->handymanByAddress;
			if($service_address != null)
			{
				$user_list = $user_list->where('service_address_id', $service_address->id);
			}
		}
		$per_page = config('constant.PER_PAGE_LIMIT');
		if( $request->has('per_page') && !empty($request->per_page)){
			if(is_numeric($request->per_page)){
				$per_page = $request->per_page;
			}
			if($request->per_page === 'all' ){
				$per_page = $user_list->count();
			}
		}

		$user_list = $user_list->paginate($per_page);

		$items = UserResource::collection($user_list);

		$response = [
			'pagination' => [
				'total_items' => $items->total(),
				'per_page' => $items->perPage(),
				'currentPage' => $items->currentPage(),
				'totalPages' => $items->lastPage(),
				'from' => $items->firstItem(),
				'to' => $items->lastItem(),
				'next_page' => $items->nextPageUrl(),
				'previous_page' => $items->previousPageUrl(),
			],
			'data' => $items,
		];

		return comman_custom_response($response);
	}

	public function userDetail(Request $request)
	{
		$id = $request->id;

		$user = User::find($id);
		$message = __('messages.detail');
		if(empty($user)){
			$message = __('messages.user_not_found');
			return comman_message_response($message,400);
		}

		$service = [];
		$handyman_rating = [];
		$handyman = [];
		$profile_array = [];

		if($user->user_type == 'provider')
		{
			$service = Service::where('provider_id',$id)->where('status',1)->orderBy('id','desc')->paginate(10);
			$service = ServiceResource::collection($service);
			$handyman_rating = HandymanRating::where('handyman_id',$id)->orderBy('id','desc')->paginate(10);
			$handyman_rating = HandymanRatingResource::collection($handyman_rating);
			$handyman_staff = User::where('user_type','handyman')->where('provider_id',$id)->where('is_available',1)->get();
			$handyman = UserResource::collection($handyman_staff);

			if(!empty($handyman_staff)){
				foreach ($handyman_staff as $image) {
					$profile_array[] = $image->login_type !== null ? $image->social_image : getSingleMedia($image, 'profile_image',null);
				}
			}
		}
		$user_detail = new UserResource($user);
		if($user->user_type == 'handyman'){
			$handyman_rating = HandymanRating::where('handyman_id',$id)->orderBy('id','desc')->paginate(10);
			$handyman_rating = HandymanRatingResource::collection($handyman_rating);
		}

		$response = [
			'data' => $user_detail,
			'service' => $service,
			'handyman_rating_review' => $handyman_rating,
			'handyman_staff' => $handyman,
			'handyman_image' => $profile_array,
		];
		return comman_custom_response($response);

	}

	public function changePassword(Request $request){
		$user = User::where('id',\Auth::user()->id)->first();

		if($user == "") {
			$message = __('messages.user_not_found');
			return comman_message_response($message,406);
		}

		$hashedPassword = $user->password;

		$match = Hash::check($request->old_password, $hashedPassword);

		$same_exits = Hash::check($request->new_password, $hashedPassword);
		if ($match)
		{
			if($same_exits){
				$message = __('messages.old_new_pass_same');
				return comman_message_response($message,406);
			}

			$user->fill([
				'password' => Hash::make($request->new_password)
			])->save();

			$message = __('messages.password_change');
			return comman_message_response($message,200);
		}
		else
		{
			$message = __('messages.valid_password');
			return comman_message_response($message);
		}
	}

	public function updateProfile(Request $request)
	{
		$user = \Auth::user();
		if($request->has('id') && !empty($request->id)){
			$user = User::where('id',$request->id)->first();
		}
		if($user == null){
			return comman_message_response(__('messages.no_record_found'),400);
		}

		$data=$request->all();

		$why_choose_me=[

			'why_choose_me_title'=>$request->why_choose_me_title,
			'why_choose_me_reason' => isset($request->why_choose_me_reason) && is_string($request->why_choose_me_reason)
			? array_filter(json_decode($request->why_choose_me_reason), function ($value) {
				return $value !== null;
			})
			: null,

		];

		$data['why_choose_me']=($why_choose_me);

		$user->fill($data)->update();

		if(isset($request->profile_image) && $request->profile_image != null ) {
			$user->clearMediaCollection('profile_image');
			$user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
		}

		$user_data = User::find($user->id);

		$message = __('messages.updated');
		$user_data['profile_image'] = $user->login_type !== null ? $user->social_image : getSingleMedia($user_data,'profile_image',null);
		$user_data['user_role'] = $user->getRoleNames();
	
		unset($user_data['roles']);
		unset($user_data['media']);
	   
		$response = [
			'data' => $user_data,
			'message' => $message
		];
		return comman_custom_response( $response );
	}

	public function logout(Request $request){
		$auth = Auth::user();

		if($request->is('api*')){

		   if(!Auth::guard('sanctum')->check()) {
			return response()->json(['status' => false, 'message' => __('messages.user_not_logged_in')]);
		   }

		  $user = Auth::guard('sanctum')->user();

		  $user->tokens()->delete();

		return comman_message_response('Logout successfully');

	   }
		 Auth::logout();

		return comman_message_response('Logout successfully');

	}

	public function forgotPassword(Request $request)
	{
		$request->validate([
			'email' => 'required|email',
		]);

		$response = Password::sendResetLink(
			$request->only('email')
		);

		return $response == Password::RESET_LINK_SENT
			? response()->json(['message' => __($response), 'status' => true], 200)
			: response()->json(['message' => __($response), 'status' => false], 406);
	}

	public function socialLogin(Request $request)
	{
		$input = $request->all();

		if($input['login_type'] === 'mobile'){
			$user_data = User::where('username',$input['username'])->where('login_type','mobile')->first();
		}else{
			$user_data = User::where('email',$input['email'])->first();

		}

		if( $user_data != null ) {
			if( !isset($user_data->login_type) || $user_data->login_type  == '' ){
				if($request->login_type === 'google'){
					$message = __('validation.unique',['attribute' => 'email' ]);
				} else {
					$message = __('validation.unique',['attribute' => 'username' ]);
				}
				return comman_message_response($message,400);
			}

			$user_data->update($input);
			
			$message = __('messages.login_success');
		} else {

			if($request->login_type === 'google')
			{
				$key = 'email';
				$value = $request->email;
			} else {
				$key = 'username';
				$value = $request->username;
			}

			$trashed_user_data = User::where($key,$value)->whereNotNull('login_type')->withTrashed()->first();

			if ($trashed_user_data != null && $trashed_user_data->trashed())
			{
				if($request->login_type === 'google'){
					$message = __('validation.unique',['attribute' => 'email' ]);
				} else {
					$message = __('validation.unique',['attribute' => 'username' ]);
				}
				return comman_message_response($message,400);
			}

			if($request->login_type === 'mobile' && $user_data == null ){
				$otp_response = [
					'status' => true,
					'is_user_exist' => false
				];
				return comman_custom_response($otp_response);
			}
			if($request->login_type === 'mobile' && $user_data != null){
				$otp_response = [
					'status' => true,
					'is_user_exist' => true
				];
				return comman_custom_response($otp_response);
			}

			$password = !empty($input['accessToken']) ? $input['accessToken'] : $input['email'];

			$input['user_type']  = "user";
			$input['display_name'] = $input['first_name']." ".$input['last_name'];
			$input['password'] = Hash::make($password);
			$input['user_type'] = isset($input['user_type']) ? $input['user_type'] : 'user';
			$user = User::create($input);
		
			$user->assignRole($input['user_type']);

			$user_data = User::where('id',$user->id)->first();
			$message = trans('messages.save_form',['form' => $input['user_type'] ]);
		}

		$user_data['api_token'] = $user_data->createToken('auth_token')->plainTextToken;
		$user_data['profile_image'] = $user_data->login_type !== null ? $user_data->social_image : getSingleMedia($user_data,'profile_image',null);
		$response = [
			'status' => true,
			'message' => $message,
			'data' => $user_data
		];
		return comman_custom_response($response);
	}

	public function userStatusUpdate(Request $request)
	{
		$user_id =  $request->id;
		$user = User::where('id',$user_id)->first();

		if($user == "") {
			$message = __('messages.user_not_found');
			return comman_message_response($message,400);
		}
		$user->status = $request->status;
		$user->save();

		$message = __('messages.update_form',['form' => __('messages.status') ]);
		$response = [
			'data' => new UserResource($user),
			'message' => $message
		];
		return comman_custom_response($response);
	}
	public function contactUs(Request $request){
		try {
			\Mail::send('contactus.contact_email',
			array(
				'first_name' => $request->get('first_name'),
				'last_name' => $request->get('last_name'),
				'email' => $request->get('email'),
				'subject' => $request->get('subject'),
				'phone_no' => $request->get('phone_no'),
				'user_message' => $request->get('user_message'),
			), function($message) use ($request)
			{
				$message->from($request->email);
				$message->to(env('MAIL_FROM_ADDRESS'));
			});
			$messagedata = __('messages.contact_us_greetings');
			return comman_message_response($messagedata);
		} catch (\Throwable $th) {
			$messagedata = __('messages.something_wrong');
			return comman_message_response($messagedata);
		}

	}
	public function handymanAvailable(Request $request){
		$user_id =  $request->id;
		$user = User::where('id',$user_id)->first();

		if($user == "") {
			$message = __('messages.user_not_found');
			return comman_message_response($message,400);
		}
		$user->is_available = $request->is_available;
		$user->save();

		$message = __('messages.update_form',['form' => __('messages.status') ]);
		$response = [
			'data' => new UserResource($user),
			'message' => $message
		];
		return comman_custom_response($response);
	}
	public function handymanReviewsList(Request $request){
		$id = $request->handyman_id;
		$handyman_rating_data = HandymanRating::where('handyman_id',$id);

		$per_page = config('constant.PER_PAGE_LIMIT');

		if( $request->has('per_page') && !empty($request->per_page)){
			if(is_numeric($request->per_page)){
				$per_page = $request->per_page;
			}
			if($request->per_page === 'all' ){
				$per_page = $handyman_rating_data->count();
			}
		}

		$handyman_rating_data = $handyman_rating_data->orderBy('created_at','desc')->paginate($per_page);

		$items = HandymanRatingResource::collection($handyman_rating_data);
		$response = [
			'pagination' => [
				'total_items' => $items->total(),
				'per_page' => $items->perPage(),
				'currentPage' => $items->currentPage(),
				'totalPages' => $items->lastPage(),
				'from' => $items->firstItem(),
				'to' => $items->lastItem(),
				'next_page' => $items->nextPageUrl(),
				'previous_page' => $items->previousPageUrl(),
			],
			'data' => $items,
		];
		return comman_custom_response($response);
	}
	public function deleteUserAccount(Request $request){
		$user_id = \Auth::user()->id;
		$user = User::where('id',$user_id)->first();
		if($user == null){
			$message = __('messages.user_not_found');__('messages.msg_fail_to_delete',['item' => __('messages.user')] );
			return comman_message_response($message,400);
		}
		$user->booking()->forceDelete();
		$user->payment()->forceDelete();
		$user->forceDelete();
		$message = __('messages.msg_deleted',['name' => __('messages.user')] );
		return comman_message_response($message,200);
	}
	public function deleteAccount(Request $request){
		$user_id = \Auth::user()->id;
		$user = User::where('id',$user_id)->first();
		if($user == null){
			$message = __('messages.user_not_found');__('messages.msg_fail_to_delete',['item' => __('messages.user')] );
			return comman_message_response($message,400);
		}
		if($user->user_type == 'provider'){
			if($user->providerPendingBooking()->count() == 0){
				$user->providerService()->forceDelete();
				$user->providerPendingBooking()->forceDelete();
				$provider_handyman = User::where('provider_id',$user_id)->get();
				if(count($provider_handyman) > 0){
					foreach ($provider_handyman as $key => $value) {
						$value->provider_id = NULL;
						$value->update();
					}
				}
				$user->forceDelete();
			}else{
				$message = __('messages.pending_booking');
				 return comman_message_response($message,400);
			}
		}else{
			if($user->handymanPendingBooking()->count() == 0){
				$user->handymanPendingBooking()->forceDelete();
				$user->forceDelete();
			}else{
				$message = __('messages.pending_booking');
				 return comman_message_response($message,400);
			}
		}
		$message = __('messages.msg_deleted',['name' => __('messages.user')] );
		return comman_message_response($message,200);
	}
	public function addUser(UserRequest $request)
	{
		$input = $request->all();

		$password = $input['password'];
		$input['display_name'] = $input['first_name']." ".$input['last_name'];
		$input['user_type'] = isset($input['user_type']) ? $input['user_type'] : 'user';
		$input['password'] = Hash::make($password);

		if( $input['user_type'] === 'provider')
		{
		}
		$user = User::create($input);
		$user->assignRole($input['user_type']);
		$input['api_token'] = $user->createToken('auth_token')->plainTextToken;

		unset($input['password']);
		$message = trans('messages.save_form',['form' => $input['user_type'] ]);
		$user->api_token = $user->createToken('auth_token')->plainTextToken;
		$response = [
			'message' => $message,
			'data' => $user
		];
		return comman_custom_response($response);
	}
	public function editUser(UserRequest $request)
	{
		if($request->has('id') && !empty($request->id)){
			$user = User::where('id',$request->id)->first();
		}
		if($user == null){
			return comman_message_response(__('messages.no_record_found'),400);
		}

		$user->fill($request->all())->update();

		if(isset($request->profile_image) && $request->profile_image != null ) {
			$user->clearMediaCollection('profile_image');
			$user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
		}

		$user_data = User::find($user->id);

		$message = __('messages.updated');
		$user_data['profile_image'] = getSingleMedia($user_data,'profile_image',null);
		$user_data['user_role'] = $user->getRoleNames();
		unset($user_data['roles']);
		unset($user_data['media']);
		$response = [
			'data' => $user_data,
			'message' => $message
		];
		return comman_custom_response( $response );
	}
	public function userWalletBalance(Request $request){
		$user = Auth::user();
		$amount = 0;
		$wallet = Wallet::where('user_id',$user->id)->first();
		if($wallet !== null){
			$amount = $wallet->amount;
		}
		$response = [
			'balance' => $amount,
		];
		return comman_custom_response( $response );
	}


	// user email verify
	public function verify(Request $request)
	{
		$email = $request->email;
		$user = User::where('email',$email)->first();
		if ($user === null) {
			$message = 'User not registered. Please check your email or register.';
			$response = [
				'message' => $message,
			];
			return comman_custom_response($response);
		}
		if($user->is_email_verified == 0){
			$verificationLink = route('verify',['id' => $user->id]);
			$response_data=Mail::to($user->email)->send(new VerificationEmail($verificationLink));
			$message = 'Email Verification link has been sent to your email. Please Check your inbox';
			$response = [
					'message' => $message,
					'is_email_verified' => $user->is_email_verified,
			];
			return comman_custom_response($response);

		}else{
			$message = 'Email already verify!!!';
			$response = [
				'message' => $message,
				'is_email_verified' => $user->is_email_verified,
		];


		return comman_custom_response($response);
		}
	}
	// For the Work Experience

	public function workExperience(Request $request)
	{

		 $input = $request->all();
		 

		 $input['previous_employee_history'] = $input['previous_employee_history'];
		 $input['category_id'] = $input['category_id'];
		 $input['subcategory_id'] = $input['subcategory_id'];
		 $input['duration'] = $input['duration'];
		 $input['days_available'] = $input['days_available'];
		 $input['work_location'] = $input['work_location'];
		 $input['work_area'] = $input['work_area'];
		 $input['preffered_type_work'] = $input['preffered_type_work'];
		 $input['health_physical_limitation'] = $input['health_physical_limitation'];
		 $input['languages_spoken'] = $input['languages_spoken'];
		 $input['emergency_contact'] = $input['emergency_contact'];
 
			//Work Experience       
			 if(!empty($request->id)){               
				$input['user_id'] = $request->id;
				$user = WorkExperience::create($input); 
			}          
		  
			if ($user!==null) {
				$message = 'User Work Experience added.';
				$response = [
					'message' => $message,
				];                 
			return comman_custom_response($response);
		}
}

	//For the Legal Document
	public function LegalDocument(Request $request){
		if(!empty($request->id)){
			$user = User::where('id',$request->id)->first();
		}        
	  
		if(isset($request->aadhar_image)) {
			$user->clearMediaCollection('aadhar_image');
			$user->addMediaFromRequest('aadhar_image')->toMediaCollection('aadhar_image');
		}
		
		if(isset($request->address_proof)) {
			$user->clearMediaCollection('address_proof');
			$user->addMediaFromRequest('address_proof')->toMediaCollection('address_proof');
		}
		if(isset($request->legal_photo)) {
			$user->clearMediaCollection('legal_photo');
			$user->addMediaFromRequest('legal_photo')->toMediaCollection('legal_photo');
		}

			$message = 'Legal document uploaded.';
			$response = [
				'message' => $message,
			];
			return comman_custom_response($response);

	}

	  //Get Users on basis of category

	public function getUserCat(Request $request){
		
		$user_type = 'user';
		$category_id = $request['id'];
		$status = isset($request['status']) ? $request['status'] : 1;

		$user_list = User::orderBy('users.id','desc')->where('user_type',$user_type);
		if(!empty($status)){
			$user_list = $user_list->where('status',$status);
		}
		$user_list = $user_list->leftjoin('work_experience', 'users.id', '=', 'work_experience.user_id')
	->select('users.*')->where('work_experience.category_id',$category_id); // Select the required columns
	   
		$per_page = config('constant.PER_PAGE_LIMIT');
		if( $request->has('per_page') && !empty($request->per_page)){
			if(is_numeric($request->per_page)){
				$per_page = $request->per_page;
			}
			if($request->per_page === 'all' ){
				$per_page = $user_list->count();
			}
		}

		$user_list = $user_list->paginate($per_page);

		$items = UserResource::collection($user_list);

		$response = [
			'pagination' => [
				'total_items' => $items->total(),
				'per_page' => $items->perPage(),
				'currentPage' => $items->currentPage(),
				'totalPages' => $items->lastPage(),
				'from' => $items->firstItem(),
				'to' => $items->lastItem(),
				'next_page' => $items->nextPageUrl(),
				'previous_page' => $items->previousPageUrl(),
			],
			'data' => $items,
		];
		return comman_custom_response($response);     
	}

}
