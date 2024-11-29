<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\{
    Booking,
    Category,
    Service,
    Payment,
    Slider,
    User,
    Setting,
    AppSetting,
    ProviderType,
    ProviderPayout,
    PaymentGateway,
    BookingRating,
    HandymanRating,
    HandymanType,
    HandymanPayout,
    BookingHandymanMapping,
    ProviderServiceAddressMapping,
    Wallet,
    Blog,
    PostJobRequest,
    FrontendSetting,
    Country
};
use App\Http\Resources\API\{
    BookingResource,
    ServiceResource,
    CategoryResource,
    SliderResource,
    UserResource,
    PaymentGatewayResource,
    BookingRatingResource,
    HandymanRatingResource,
    PostJobRequestResource,
    BlogResource,
    CountryResource
};

class DashboardController extends Controller
{

    public function dashboardDetail(Request $request){
        $per_page = 6;
        $customer_review = null;
        $notification = 0;
        $upcomming_booking = null;
        $is_email_verified = 0;

        $slider = SliderResource::collection(Slider::where('status',1)->paginate($per_page));

        $category_section = FrontendSetting::getValueByKey('section_2');
        $category= CategoryResource::collection( Category::whereIN( 'id' ,$category_section->category_id )->orderBy('name','asc')->paginate(8));

        $service = Service::where('status',1)->where('service_type','service');
        $service = $service->whereHas('providers', function ($a) use ($request) {
            $a->where('status', 1);
        });
        if ($request->has('city_id') && !empty($request->city_id)) {
            $service = $service->whereHas('providers', function ($a) use ($request) {
                $a->where('city_id', $request->city_id);
            });
        }
        if(default_earning_type() === 'subscription'){
            $service = $service->whereHas('providers', function ($a) use ($request) {
                $a->where('status', 1)->where('is_subscribe',1);
            });
        }
        $service = ServiceResource::collection($service->orderBy('id','desc')->paginate($per_page));

        if ($request->has('latitude') && !empty($request->latitude) && $request->has('longitude') && !empty($request->longitude)) {
            $get_distance = getSettingKeyValue('site-setup','radious');
            $get_unit = getSettingKeyValue('site-setup','distance_type');

            $locations = Service::locationService($request->latitude,$request->longitude,$get_distance,$get_unit);
            $service_in_location = ProviderServiceAddressMapping::whereIn('provider_address_id',$locations)->get()->pluck('service_id');
            $service = Service::with('providerServiceAddress')->whereIn('id',$service_in_location)->get();
            $service = ServiceResource::collection($service);
        }

        $provider = User::where('user_type','provider')->where('status',1);

        if(default_earning_type() === 'subscription'){
            $provider = $provider->where('is_subscribe',1);
        }
        if ($request->has('city_id') && !empty($request->city_id)) {
            $provider = $provider->where('city_id', $request->city_id);
        }
        $provider = UserResource::collection($provider->paginate($per_page));

        $featured_service_section = FrontendSetting::getValueByKey('section_4');
        $featured_service= Service::whereIN( 'id' ,$featured_service_section->service_id );
        $featured_service = $featured_service->whereHas('providers', function ($a) use ($request) {
            $a->where('status', 1);
        });
        if(default_earning_type() === 'subscription'){
            $featured_service = $featured_service->whereHas('providers', function ($a) use ($request) {
                $a->where('status', 1)->where('is_subscribe',1);
            });
        }
        $featured_service = ServiceResource::collection($featured_service->orderBy('id','desc')->paginate($per_page));

        if ($request->has('latitude') && !empty($request->latitude) && $request->has('longitude') && !empty($request->longitude)) {
            $get_distance = getSettingKeyValue('site-setup','radious');
            $get_unit = getSettingKeyValue('site-setup','distance_type');

            $locations = Service::locationService($request->latitude,$request->longitude,$get_distance,$get_unit);
            $service_in_location = ProviderServiceAddressMapping::whereIn('provider_address_id',$locations)->get()->pluck('service_id');
            $featured_service = Service::with('providerServiceAddress')->whereIn('id',$service_in_location)->where('is_featured',1) ->get();
            $featured_service = ServiceResource::collection($featured_service);
        }

        if($request->has('customer_id') && isset($request->customer_id)){
            $customer_review = BookingRating::with('customer','service')->where('customer_id',$request->customer_id)->get();
            if (!empty($customer_review))
            {
                $customer_review = BookingRatingResource::collection($customer_review);
            }
            $user = User::where('id',$request->customer_id)->first();

            $notification=0;

            if($user){

                $notification = count($user->unreadNotifications);
            }

            $upcomming_booking = Booking::where('customer_id',$request->customer_id)
            ->with('customer')->where('status', 'accept')->orderBy('id', 'DESC')->first();

            if(!empty($upcomming_booking)){
                $upcomming_booking = New BookingResource($upcomming_booking);
            }

            $is_email_verified = $user->is_email_verified ? 1 : 0;
        }

        $blogs = BlogResource::collection(Blog::paginate($per_page));

        $response = [
           'status'         => true,
           'slider'         => $slider,
           'category'       => $category,
           'service'        => $service,
           'featured_service' => $featured_service,
           'provider'       => $provider,
           'customer_review' => $customer_review,
           'notification_unread_count' => $notification,
           'upcomming_confirmed_booking' =>$upcomming_booking,
           'blogs' => $blogs,
           'is_email_verified' => $is_email_verified,
        ];

        return comman_custom_response($response);
    }
    public function providerDashboard(Request $request){
        $per_page = config('constant.PER_PAGE_LIMIT');

        $provider = User::find(auth()->user()->id);

        $booking = Booking::myBooking();
        $total_booking = $booking->count();

        $service = Service::myService()->where('status',1);
        $total_service = $service->count();

        if ($request->has('city_id') && !empty($request->city_id)) {
            $service = $service->whereHas('providers', function ($a) use ($request) {
                $a->where('city_id', $request->city_id);
            });
        }

        $service = ServiceResource::collection($service->orderBy('id','desc')->paginate($per_page));


        $handyman = UserResource::collection(User::myUsers()->paginate($per_page));

        $providerEarning    = ProviderPayout::where('provider_id',$provider->id)->sum('amount') ?? 0;

        $revenuedata        = ProviderPayout::selectRaw('sum(amount) as total , DATE_FORMAT(created_at , "%m") as month' )
                                    ->where('provider_id',auth()->user()->id)
                                    ->whereYear('created_at',date('Y'))
                                    ->groupBy('month');
        $revenuedata= $revenuedata->get();
        $data['revenueData']    =    [];
        for($i = 1; $i <= 12; $i++ ){
            $revenueData = 0;
            foreach($revenuedata as $revenue){
                if((int)$revenue['month'] == $i){

                    $data['revenueData'][] = [
                        $i => (int)$revenue['total']
                    ];
                    $revenueData++;
                }
            }
            if($revenueData == 0){
                $data['revenueData'][] = (object) [] ;
            }
        }

        $commission = ProviderType::where('id',$provider->providertype_id)->first();

        $notification = count($provider->unreadNotifications);

        $active_plan = get_user_active_plan($provider->id);
        if(is_any_plan_active($provider->id) == 0 && is_subscribed_user($provider->id) == 0 ){
            $active_plan = user_last_plan($provider->id);
        }
        $provider_wallet = Wallet::where('user_id',$provider->id)->where('status',1)->first();
        $online_handyman = User::myUsers()->where('is_available',1)->orderBy('last_online_time','desc')->limit(10)->get();
        $profile_array = [];
        if(!empty($online_handyman)){
            foreach ($online_handyman as $online) {
                $profile_array[] = $online->login_type !== null ? $online->social_image : getSingleMedia($online, 'profile_image',null);
            }
        }
        $post_request = PostJobRequest::where('status','requested')->latest()->take(5)->get();
        $post_requests = PostJobRequestResource::collection($post_request);
        $upcomming_booking = Booking::myBooking()->with('customer')->where('date','>', now())->where('status', 'pending')->orderBy('id', 'DESC')->take(5)->get();
        if(!empty($upcomming_booking)){
            $upcomming_booking = BookingResource::collection($upcomming_booking);
        }

        $response = [
            'status'         => true,
            'total_booking'  => $total_booking,
            'total_service'  => $total_service,
            'total_handyman' => $handyman->count(),
            'today_cash' => today_cash_total(auth()->user()->id,Carbon::today(),Carbon::today()),
            'service'        => $service,
            'handyman'       => $handyman,
            'total_revenue'  => (float)$providerEarning,
            'monthly_revenue'=> $data,
            'commission'     => $commission,
            'notification_unread_count' => $notification,
            'subscription'  => $active_plan,
            'is_subscribed' => is_subscribed_user($provider->id),
            'provider_wallet' => $provider_wallet,
            'online_handyman' => $profile_array,
            'post_requests' => $post_requests,
            'upcomming_booking' => $upcomming_booking,
            'is_email_verified' => $provider->is_email_verified,
         ];

         return comman_custom_response($response);

    }
    public function handymanDashboard(Request $request){
        $per_page = config('constant.PER_PAGE_LIMIT');
        $handyman = User::find(auth()->user()->id);
        if($handyman){
            $sitesetup = Setting::getValueByKey('site-setup','site-setup');
            $get_current_time = Carbon::now();
            $handyman->last_online_time = $get_current_time->toTimeString();
            $handyman->update();
        }
        $booking =  BookingHandymanMapping::with('bookings')->where('handyman_id',auth()->user()->id)->get();

        $upcomming = BookingHandymanMapping::with('bookings')->whereHas('bookings', function($bookings){
            $bookings->where('status','accept');
        })->where('handyman_id',auth()->user()->id)->orderBy('id','DESC')->get();

        $today_booking =  BookingHandymanMapping::with('bookings')->whereHas('bookings', function($bookings){
            $bookings->whereDate('date', Carbon::today());
        })->where('handyman_id',auth()->user()->id)->get();

        $completed_booking = BookingHandymanMapping::with('bookings')->whereHas('bookings', function($bookings){
            $bookings->where('status','completed');
        })->where('handyman_id',auth()->user()->id)->orderBy('id','DESC')->get();

        $handyman_rating = HandymanRating::where('handyman_id',auth()->user()->id)->orderBy('id','desc')->paginate(10);
        $handyman_rating = HandymanRatingResource::collection($handyman_rating);

        $commission = HandymanType::where('id',$handyman->handymantype_id)->first();

        $handymanEarning    = HandymanPayout::where('handyman_id',auth()->user()->id)->sum('amount') ?? 0;

        $revenuedata         = HandymanPayout::selectRaw('sum(amount) as total , DATE_FORMAT(created_at , "%m") as month' )
                                    ->where('handyman_id',auth()->user()->id)
                                    ->whereYear('created_at',date('Y'))
                                    ->groupBy('month');
        $revenuedata= $revenuedata->get();
        $data['revenueData']    =    [];
        for($i = 1; $i <= 12; $i++ ){
            $revenueData = 0;
            foreach($revenuedata as $revenue){
                if((int)$revenue['month'] == $i){

                    $data['revenueData'][] = [
                        $i => (int)$revenue['total']
                    ];
                    $revenueData++;
                }
            }
            if($revenueData == 0){
                $data['revenueData'][] = (object) [] ;
            }
        }

        $notification = count($handyman->unreadNotifications);

        $upcomming_booking = Booking::myBooking()->with('customer')->where('status', 'pending')->orderBy('id', 'DESC')->take(5)->get();
        if(!empty($upcomming_booking)){
            $upcomming_booking = BookingResource::collection($upcomming_booking);
        }

        $response = [
            'status'                        => true,
            'today_cash' =>                today_cash_total(auth()->user()->id,Carbon::today(),Carbon::today()),
            'total_booking'                 => $booking->count(),
            'upcomming_booking'             => $upcomming->count(),
            'today_booking'                 => $today_booking->count(),
            'commission'                    => $commission,
            'handyman_reviews'              => $handyman_rating,
            'total_revenue'                 => $handymanEarning,
            'monthly_revenue'               => $data,
            'notification_unread_count'     => $notification,
            'isHandymanAvailable'           => $handyman->is_available,
            'completed_booking'             => $completed_booking->count(),
            'upcomming_booking'             => $upcomming_booking,
            'is_email_verified'             => $handyman->is_email_verified,
         ];
         return comman_custom_response($response);

    }
    public function adminDashboard(Request $request){
        $admin = User::find(auth()->user()->id);

        $notification = count($admin->unreadNotifications);

        $services = Booking::with('categoryService')->myBooking()->showServiceCount()->take(5)->get();

        $post_request = PostJobRequest::latest()->take(5)->get();
        $post_requests = PostJobRequestResource::collection($post_request);

        $general_setting = Setting::getValueByKey('general-setting','general-setting');
        $response = [
            'status'                        => true,
            'total_booking'                 => Booking::myBooking()->count(),
            'total_service'                 => Service::myService()->count(),
            'total_provider'                => User::myUsers('get_provider')->count(),
            'total_revenue'                 => Payment::where('payment_status','paid')->sum('total_amount'),
            'monthly_revenue'               => adminEarning(),
            'provider'                      => UserResource::collection(User::myUsers('get_provider')->orderBy('id','DESC')->take(5)->get()),
            'user'                          => UserResource::collection(User::myUsers('get_customer')->orderBy('id','DESC')->take(5)->get()),
            'upcomming_booking'             => BookingResource::collection(Booking::myBooking()->where('status','pending')->orderBy('id','DESC')->take(5)->get()),
            'notification_unread_count'     => $notification,

         ];

         return comman_custom_response($response);
    }
    public function configurations(Request $request){
        $sitesetup = Setting::getValueByKey('site-setup','site-setup');
        $general_setting = Setting::getValueByKey('general-setting','general-setting');
        $service_config = Setting::getValueByKey('service-configurations','service-configurations');
        $social_media = Setting::getValueByKey('social-media','social-media');
        $other_setting = Setting::getValueByKey('OTHER_SETTING','OTHER_SETTING');
        $terms_condition = Setting::getValueByKey('terms_condition','terms_condition');
        $privacy_policy = Setting::getValueByKey('privacy_policy','privacy_policy');
        $help_support = Setting::getValueByKey('help_support','help_support');
        $refund_policy = Setting::getValueByKey('refund_policy','refund_policy');
        $earning_setting = Setting::getValueByKey('earning-setting','earning-setting');
        $country_obj= Country::where('id', $sitesetup->default_currency)->first();
        $response = [
            "site_name"=> $general_setting->site_name,
            "site_description"=> $general_setting->site_description,
            "inquiry_email"=> $general_setting->inquriy_email,
            "helpline_number"=> $general_setting->helpline_number,
            "website"=> $general_setting->website,
            "zipcode"=> $general_setting->zipcode,
            "site_copyright"=> $sitesetup->site_copyright,
            "date_format"=> $sitesetup->date_format,
            "time_format"=> $sitesetup->time_format,
            "time_zone"=> $sitesetup->time_zone,
            "distance_type"=> $sitesetup->distance_type,
            "radius"=> $sitesetup->radious,

            "playstore_url"=> $sitesetup->playstore_url,
            "appstore_url"=> $sitesetup->appstore_url,
            "provider_appstore_url"=> $sitesetup->provider_appstore_url,
            "provider_playstore_url"=> $sitesetup->provider_playstore_url,

            "currency_country_code"=> $sitesetup->default_currency,
            "currency_position"=> $sitesetup->currency_position,
            "currency_symbol"=> $country_obj->symbol,
            "currency_code"=> $country_obj->currency_code,
            "decimal_point"=> $sitesetup->digitafter_decimal_point,



            "advance_payment_status"=> $service_config->advance_payment,
            "slot_service_status"=> $service_config->slot_service,
            "digital_service_status"=> $service_config->digital_services,
            "service_package_status"=> $service_config->service_packages,
            "service_addon_status"=> $service_config->service_addons,
            "job_request_service_status"=> $service_config->post_services,
            "social_login_status"=> $other_setting->social_login,
            "google_login_status"=> $other_setting->google_login,
            "apple_login_status"=> $other_setting->apple_login,
            "otp_login_status"=> $other_setting->otp_login,
            "online_payment_status"=> $other_setting->online_payment,
            "blog_status"=> $other_setting->blog,
            "maintenance_mode"=> $other_setting->maintenance_mode,
            "wallet_status"=> $other_setting->wallet,
            "chat_gpt_status"=> $other_setting->enable_chat_gpt,
            "test_chat_gpt_without_key"=> $other_setting->test_without_key,

            "force_update_user_app"=> $other_setting->force_update_user_app,
            "user_app_minimum_version"=> (int)$other_setting->user_app_minimum_version,
            "user_app_latest_version"=>  (int)$other_setting->user_app_latest_version,
            "force_update_provider_app"=> $other_setting->force_update_provider_app,
            "provider_app_minimum_version"=> (int)$other_setting->provider_app_minimum_version,
            "provider_app_latest_version"=>  (int)$other_setting->provider_app_latest_version,
            "force_update_admin_app"=> $other_setting->force_update_admin_app,
            "admin_app_minimum_version"=> (int)$other_setting->admin_app_minimum_version,
            "admin_app_latest_version"=>  (int)$other_setting->admin_app_latest_version,
            "firebase_notification_status"=> $other_setting->firebase_notification,

            "facebook_url"=> $social_media->facebook_url,
            "linkedin_url"=> $social_media->linkedin_url,
            "instagram_url"=> $social_media->instagram_url,
            "youtube_url"=> $social_media->youtube_url,
            "twitter_url"=> $social_media->twitter_url,

            "terms_conditions"=> $terms_condition,
            "privacy_policy"=> $privacy_policy,
            "help_support"=> $help_support,
            "refund_policy"=> $refund_policy,
            "earning_type"=> $earning_setting,
            "auto_assign_status" => !empty($other_setting->auto_assign_provider) ? $other_setting->auto_assign_provider: 0

        ];
        if(!empty($request->is_authenticated) && $request->is_authenticated == 1){
            $response["google_map_key"] = $sitesetup->google_map_keys;
            $response["chat_gpt_key"] = $other_setting->chat_gpt_key;
            $response["firebase_key"] = $other_setting->firebase_key;
        }

        return comman_custom_response($response);
    }
}
