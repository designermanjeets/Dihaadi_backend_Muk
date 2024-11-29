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
use Illuminate\Support\Facades\Storage;
use App\Mail\VerificationEmail;
use App\Models\UserDocument;

class UserController extends Controller
{
	use NotificationTrait;
	// public function register(UserRequest $request) {
	// 	$input = $request->all();
	// 	$email = $input['email'];
	// 	$username = $input['username'];
	// 	$password = $input['password'];
	// 	$input['display_name'] = $input['first_name']." ".$input['last_name'];
	// 	$input['user_type'] = isset($input['user_type']) ? $input['user_type'] : 'user';
	// 	$input['password'] = Hash::make($password);
	// 	$input['age'] = $input['age'];  // 17-05-24
	// 	$input['gender'] = $input['gender'];  // 17-05-24

	// 	$input['contact_number'] = $input['phone'];
	// 	// dd($input);

	// 	//  $input['previous_employee_history'] = $input['previous_employee_history'];
	// 	//  $input['skill'] = $input['skill'];
	// 	//  $input['duration'] = $input['duration'];
	// 	//  $input['days_available'] = $input['days_available'];
	// 	//  $input['work_location'] = $input['work_location'];
	// 	//  $input['work_area'] = $input['work_area'];
	// 	//  $input['preffered_type_work'] = $input['preffered_type_work'];
	// 	//  $input['health_physical_limitation'] = $input['health_physical_limitation'];
	// 	//  $input['languages_spoken'] = $input['languages_spoken'];
	// 	//  $input['emergency_contact'] = $input['emergency_contact'];



	// 	if( in_array($input['user_type'],['handyman', 'provider'])) // USERTYPES
	// 	{
	// 		$input['status'] = isset($input['status']) ? $input['status']: 0;
	// 	}

	// 	/* $user = User::withTrashed()                 // DELETE ENTRY
	// 	->where(function ($query) use ($email, $username) {
	// 		$query->where('email', $email)->orWhere('username', $username);
	// 	})
	// 	->first();
	// 	*/

	// 	if( in_array($input['user_type'],['handyman', 'provider'])) {
	// 		$input['status'] = isset($input['status']) ? $input['status']: 0;
	// 	}
	// 	$user = User::select('*')
	// 		->where('contact_number', $input['phone'])
	// 		->first()
	// 	;
	// 	// dd($user->count(), $user);

	// 	if($user){
	// 		if($user->deleted_at == null){

	// 			$message = trans('messages.login_form');
	// 			$response = [
	// 				'message' => $message,
	// 			];
	// 			return comman_custom_response($response);
	// 		}
	// 		$message = trans('messages.deactivate');
	// 		$response = [
	// 			'message' => $message,
	// 			'Isdeactivate' => 1,
	// 		];
	// 		return comman_custom_response($response);
	// 	}else{
	// 		// dump($input);
	// 		$user = User::create($input);   // CREATE USER
	// 		// dd('sssss');
	// 		//Work Experience
	// 		//  if(!empty($user->id)){
	// 		//     $input['user_id'] = $user->id;
	// 		//     $user = WorkExperience::create($input);
	// 		// }


	// 		/* if ($user->user_type == 'user' || $user->user_type == 'provider' || $user->user_type == 'handyman') {
	// 			$id = $user->id;
	// 			$user->assignRole($input['user_type']);
	// 			$verificationLink = route('verify',['id' => $id]);
	// 			//  Mail::to($user->email)->send(new VerificationEmail($verificationLink));
	// 			$message = 'Email Verification link has been sent to your email. Please Check your inbox';
	// 			$response = [
	// 				'message' => $message,
	// 				'data' => $user
	// 			];
	// 			return comman_custom_response($response);
	// 		} */
	// 		$user->assignRole($input['user_type']);
	// 	}

	// 	if($user->user_type == 'provider' || $user->user_type == 'user'){
	// 		$wallet = array(
	// 			'title' => $user->display_name,
	// 			'user_id' => $user->id,
	// 			'amount' => 0
	// 		);
	// 		$result = Wallet::create($wallet);
	// 	}
	// 	if(!empty($input['loginfrom']) && $input['loginfrom'] === 'vue-app'){
	// 		if($user->user_type != 'user'){
	// 			$message = trans('messages.save_form',['form' => $input['user_type'] ]);
	// 			$response = [
	// 				'message' => $message,
	// 				'data' => $user
	// 			];
	// 			return comman_custom_response($response);
	// 		}
	// 	}
	// 	$input['api_token'] = $user->createToken('auth_token')->plainTextToken;

	// 	unset($input['password']);
	// 	$message = trans('messages.save_form',['form' => $input['user_type'] ]);

	// 	$user->api_token = $user->createToken('auth_token')->plainTextToken;
	// 	$response = [
	// 		'message' => $message,
	// 		'data' => $user
	// 	];

	// 	$activity_data = [
	// 		'activity_type' => 'resgister',
	// 		'user_id' => $user->id,
	// 		'user_type' => $user->user_type,
	// 	];
	// 	$this->sendNotification($activity_data);

	// 	return comman_custom_response($response);
	// }

    // public function register(UserRequest $request){
    //     if (User ::where('username', $request->username)->exists()) {
    //         return response()->json(['error' => 'Username already exists.'], 400);
    //     }

    //     // Check if email already exists
    //     if (User ::where('email', $request->email)->exists()) {
    //         return response()->json(['error' => 'Email already exists.'], 400);
    //     }

    //     if (User ::where('contact_number', $request->contact_no)->exists()) {
    //         return response()->json(['error' => 'Contact Number already exists.'], 400);
    //     }
    //     $data = [
    //         'username' => $request->username,
    //         'contact_number' => $request->contact_no,
    //         'user_type' => $request->user_type,
    //         'email' => $request->email,
    //         'latitude' => $request->latitude,
    //         'longitude' => $request->longitude,
    //         'password'=>'12345678',
    //     ];
    // }
    // customer registration
    public function register(UserRequest $request){
        if (User ::where('username', $request->username)->exists()) {
            return response()->json(['error' => 'Username already exists.'], 400);
        }

        // Check if email already exists
        if (User ::where('email', $request->email)->exists()) {
            return response()->json(['error' => 'Email already exists.'], 400);
        }

        if (User ::where('contact_number', $request->contact_no)->exists()) {
            return response()->json(['error' => 'Contact Number already exists.'], 400);
        }

        if($request->user_type == 'user'){
            $data = [
                'username' => $request->username,
                'contact_number' => $request->contact_no,
                'user_type' => $request->user_type,
                'email' => $request->email,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'password'=>$request->contact_no,
                'status'=>0,
            ];
            $user = User::create($data);
            if($user){
                // Step 2: Generate a 4-digit OTP
                $otp = rand(1000, 9999); // Generates a random 4-digit number
                // Step 3: Save the OTP to the user's record
                $user->otp = $otp; // Assuming you have an 'otp' column in your users table
                $user->save();
                //sms function to send email
                $contactnumber = $request->contact_no;
                $url = 'https://www.fast2sms.com/dev/bulkV2?authorization=Ssvpd7EcZ2LVAkjhemDwKaBW8rG4nzQU6Ogbt5xH0FITM9oPqym6CPLFA8KBanTtO7xvrwz5S2pRqhcI&route=dlt&sender_id=NABOTP&message=171269&variables_values='.$otp.'&flash=0&numbers='.$contactnumber;
              // return response()->json($url);
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
                    //dd($response);
                   curl_close($ch);
                   return response()->json([
                       'user_id'=> $user->id,
                       'mobile'=>$contactnumber,
                       'opt'=>true,
                   ],200);
           }else{
            echo "Something went Wrong. Please Try again";
            $message = "Something went Wrong. Please Try again";
            return comman_message_response($message, 406);
        }
        }else{
            echo "Invalid User Type";
            $message = "Invalid User Type";
            return comman_message_response($message, 406);
        }
    }
    //Customer Otp Verification
    public function registerotp(Request $request){
        /**
         * @var integer $userid
         * @var integer $otp (4 digit number)
         * @var mixed $usertype (user | provider)
         */
        $userid = $request->user_id;
        $otp = $request->otp;
        $userType = $request->user_type;

        $user = User::where('id', $userid)
			->where('user_type',$userType) // user - admin - provider -handiman
            ->where('status',0)
            ->where('otp',$otp)
			->first();

        if($user){
            $user->otp='';
            $user->status=1;
            $user->save();

            $success = $user;
			$success['user_role'] = $user->getRoleNames();
			$success['api_token'] = $user->createToken('auth_token')->plainTextToken;
			$success['profile_image'] = getSingleMedia($user,'profile_image',null);
			$is_verify_provider = false;
			$success['is_verify_provider'] = (int) $is_verify_provider;
			unset($success['media']);
			unset($user['roles']);

            //return response()->json([$success ], 200 );
            return response()->json([ 'data' => $success ], 200 );
        }else{
            echo "Invalid Otp or User_type";
            $message = "Invalid Otp or User_type";
            return comman_message_response($message, 406);
        }
    }
    // Provider registration
    public function registerprovider(UserRequest $request){
        // $input = $request->all();
        // //common for all
        // return response()->json($input);
        /**
         * Required filed
         * username
         * contact
         * email
         */
        // Check if username already exists
        if (User ::where('username', $request->username)->exists()) {
            return response()->json(['error' => 'Username already exists.'], 400);
        }

        // Check if email already exists
        if (User ::where('email', $request->email)->exists()) {
            return response()->json(['error' => 'Email already exists.'], 400);
        }

        if (User ::where('contact_number', $request->contact_no)->exists()) {
            return response()->json(['error' => 'Contact Number already exists.'], 400);
        }

        if ($request->user_type === 'provider') {
        // Prepare the data array
            $data = [
                'username' => $request->username,
                'contact_number' => $request->contact_no,
                'user_type' => $request->user_type,
                'email' => $request->email,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'status' =>0,
                'password'=>$request->password,
            ];
            // Add additional fields for providers
            $data['address'] = $request->address;
            $data['gender'] = $request->gender;
            $data['age'] = $request->age;
            $data['total_experiance'] = $request->total_experiance;
            $data['skills'] = $request->skills;
            $data['available_hours'] = $request->available_hours;
            $data['avaiable_days'] = $request->avaiable_days;
            $data['preferred_work_location'] = $request->preferred_work_location;
            $data['prefered_work_type'] = $request->prefered_work_type;
            $data['emergency_number'] = $request->emergency_number;
            $data['emergency_contact_person'] = $request->emergency_contact_name;
            $data['health_issues'] = $request->health_issues;
            $data['is_avaiable'] = $request->is_available;

            $user = User::create($data);
            $userId = $user->id;

            if ($request->hasFile('aadhar_card')) {
                $aadharCardFile = $request->file('aadhar_card');
                $aadharCardFileName = $userId . '_' .'aadhar_card_' . '.' . $aadharCardFile->getClientOriginalExtension();
                $aadharCardPath = $aadharCardFile->storeAs('documents/aadhar_card', $aadharCardFileName, 'public');
                //$document->aadhar_card = $aadharCardPath;
                $data['aadhar_card'] = $aadharCardPath;
            }

            // Handle Local Address Proof Upload
            if ($request->hasFile('local_address_proof')) {
                $addressProofFile = $request->file('local_address_proof');
                $addressProofFileName = $userId . '_' .'local_address_proof_' . '.' . $addressProofFile->getClientOriginalExtension();
                $addressProofPath = $addressProofFile->storeAs('documents/address_proof', $addressProofFileName, 'public');
                //$document->local_address_proof = $addressProofPath;
                $data['local_address_proof'] = $addressProofPath;
            }

            // Handle Self Photo Upload
            if ($request->hasFile('self_photo')) {
                $selfPhotoFile = $request->file('self_photo');
                $selfPhotoFileName = $userId . '_' .'self_photo_' . '.' . $selfPhotoFile->getClientOriginalExtension();
                $selfPhotoPath = $selfPhotoFile->storeAs('documents/self_photo', $selfPhotoFileName, 'public');
                //$document->self_photo = $selfPhotoPath;
                $data['self_photo'] = $selfPhotoPath;
            }

            // Update user record with document paths if needed
            $user->aadhar_card_image = $data['aadhar_card'];
            $user->local_address_proof = $data['local_address_proof'];
            $user->self_photo = $data['self_photo'];
            $user->save(); // Save the updated user record

            return response()->json(['message' => 'We will notify when verification is completed',"profile_status"=>'pending'], 201);
        }else{
            echo "Invalid User Type";
            $message = "Invalid User Type";
            return comman_message_response($message, 406);
        }

    }


	public function login(Request $request) {
		$Isactivate = request('Isactivate');
        //$inputData = $request->all();
        $contactnumber = $request->contact_number;
        $userType = strtolower($request->user_type);


//		if($Isactivate == 1){
            //User::withTrashed() // softdelete
            //$user = User::withTrashed()->select('id')->where('contact_number', $contactnumber)->first();
            $user = User::select('id')
			->where('contact_number', $contactnumber)
			->where('user_type',$userType) // user - admin - provider -handiman
			->first();
			if($user){
				//$user->restore();//soft restore
                 // Step 2: Generate a 4-digit OTP
                $otp = rand(1000, 9999); // Generates a random 4-digit number

                // Step 3: Save the OTP to the user's record
                $user->otp = $otp; // Assuming you have an 'otp' column in your users table
                $user->save();
                // return response()->json([
                //     'user_id'=> $user->id,
                //     'mobile'=>$contactnumber,
                //     // 'opt'=>$otp,
                // ]);
                #TODO::Step 4: send otp to the mobile number
                //sms function to send email
                //$url = 'https://www.fast2sms.com/dev/bulkV2?authorization=Ssvpd7EcZ2LVAkjhemDwKaBW8rG4nzQU6Ogbt5xH0FITM9oPqym6CPLFA8KBanTtO7xvrwz5S2pRqhcI&route=dlt&sender_id=NABOTP&message=171269&variables_values='.$otp.'&flash=0&numbers=9216106615';
                $url = 'https://www.fast2sms.com/dev/bulkV2?authorization=Ssvpd7EcZ2LVAkjhemDwKaBW8rG4nzQU6Ogbt5xH0FITM9oPqym6CPLFA8KBanTtO7xvrwz5S2pRqhcI&route=dlt&sender_id=NABOTP&message=171269&variables_values='.$otp.'&flash=0&numbers='.$contactnumber;

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
                return response()->json([
                    'user_id'=> $user->id,
                    'mobile'=>$contactnumber,
                    'opt'=>true,
                ],200);
               // return comman_custom_response($otp_response);
               // echo "OTP generated and saved: " . $otp;
			}else{

                echo "User  not found.";
				$message = trans('auth.failed');
				return comman_message_response($message, 406);
			}
//		}

		// if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

		// 	$user = Auth::user();
		// 	if(request('loginfrom') === 'vue-app'){
		// 		if($user->user_type != 'user'){
		// 			$message = trans('auth.not_able_login');
		// 			return comman_message_response($message,400);
		// 		}
		// 	}
		// 	$user->save();

		// 	$success = $user;
		// 	$success['user_role'] = $user->getRoleNames();
		// 	$success['api_token'] = $user->createToken('auth_token')->plainTextToken;
		// 	$success['profile_image'] = getSingleMedia($user,'profile_image',null);
		// 	$is_verify_provider = false;

		// 	if($user->user_type == 'provider')
		// 	{
		// 		$is_verify_provider = verify_provider_document($user->id);
		// 		$success['subscription'] = get_user_active_plan($user->id);

		// 		if(is_any_plan_active($user->id) == 0 && $success['is_subscribe'] == 0 ){
		// 			$success['subscription'] = user_last_plan($user->id);
		// 		}
		// 		$success['is_subscribe'] = is_subscribed_user($user->id);
		// 		$success['provider_id'] = admin_id();

		// 	}
		// 	if($user->user_type == 'provider' || $user->user_type == 'user'){
		// 		$wallet = Wallet::where('user_id',$user->id)->first();
		// 		if( $wallet == null){
		// 			$wallet = array(
		// 				'title' => $user->display_name,
		// 				'user_id' => $user->id,
		// 				'amount' => 0
		// 			);
		// 			Wallet::create($wallet);
		// 		}
		// 	}
		// 	$success['is_verify_provider'] = (int) $is_verify_provider;
		// 	unset($success['media']);
		// 	unset($user['roles']);

		// 		return response()->json([ 'data' => $success ], 200 );
		// } else{
		// 	$message = trans('auth.failed');
		// 	return comman_message_response($message,406);
		// }
    }
    public function verifyOtp(Request $request){
        $InputData = $request->all();
        $userid = $request->user_id;
        $otp = $request->otp;

        $userinfo = User::where('id',$userid)
        ->where('otp',$otp)->first();
        Auth::login($userinfo); //
        $user = Auth::user();
        if(Auth::check()){
            $success = $user;
            // $role =  $user->getRoleNames();



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
            $user->otp = ''; // Set otp to empty
            $user->save(); // Save the changes to the database
            $success = $user;
			$success['user_role'] = $user->getRoleNames();
			$success['api_token'] = $user->createToken('auth_token')->plainTextToken;
			$success['profile_image'] = getSingleMedia($user,'profile_image',null);
			$is_verify_provider = false;
			$success['is_verify_provider'] = (int) $is_verify_provider;
			unset($success['media']);
			unset($user['roles']);

            //return response()->json([$success ], 200 );
            return response()->json([ 'data' => $success ], 200 );
        }

        //$usersWithOtp = User::whereNotNull('otp')->get();
        // return response()->json([
        //     'user_id'=> $InputData,
        //     'user' => $user,
        //     'isauth' =>auth::check(),
        // ]);
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
