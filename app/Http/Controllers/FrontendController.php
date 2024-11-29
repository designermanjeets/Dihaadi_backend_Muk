<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\PostJobRequestController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Service;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Setting;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\BookingRating;
use App\Models\BookingHandymanMapping;
use App\Models\UserFavouriteService;
use App\Models\ServicePackage;
use App\Models\ProviderTaxMapping;
use App\Models\PostJobRequest;
use App\Models\ServiceAddon;
use App\Models\FrontendSetting;
use Yajra\DataTables\DataTables;
use Auth;
use App\Models\HandymanRating;
use App\Models\ProviderServiceAddressMapping;
use Carbon\Carbon;
use App\Models\Tax;

class FrontendController extends Controller
{

    public function index(Request $request){
        $auth_user_id = null;
        $favourite = null;

        if(auth()->check() && auth()->user()->hasRole('user')){
            $auth_user_id = auth()->user()->id;
            $favourite = UserFavouriteService::where('user_id', $auth_user_id)->get();
        }
        $sectionData = [];
        $sectionKeys = ['section_1', 'section_2', 'section_3', 'section_4', 'section_5', 'section_6', 'section_7', 'section_9'];

        foreach ($sectionKeys as $key) {
            $section = FrontendSetting::where('key', $key)->first();
            $sectionData[$key] = $section ? json_decode($section->value, true) : null;
        }
        $settings = Setting::where('type', 'service-configurations')->where('key','service-configurations')->first();
        $serviceconfig = $settings ? json_decode($settings->value) : null;
        $postjobservice = $serviceconfig ? $serviceconfig->post_services : null;
        $ratings = BookingRating::pluck('rating')->toArray();
        $averageRating = count($ratings) > 0 ? array_sum($ratings) / count($ratings) : 0;
        $totalRating = number_format($averageRating, 2);
        return view('landing-page.index',compact('sectionData','postjobservice','auth_user_id','favourite','totalRating'));
    }

    public function userLoginView(Request $request){
        $footerSection = FrontendSetting::where('key', 'login-register-setting')->first();
        $sectionData = $footerSection ? json_decode($footerSection->value, true) : null;
        return view('landing-page.login',compact('sectionData'));
    }

    public function partnerRegistrationView(Request $request){
        $footerSection = FrontendSetting::where('key', 'login-register-setting')->first();
        $sectionData = $footerSection ? json_decode($footerSection->value, true) : null;
        return view('landing-page.providerRegister',compact('sectionData'));
    }

    public function userRegistrationView(Request $request){
        $footerSection = FrontendSetting::where('key', 'login-register-setting')->first();
        $sectionData = $footerSection ? json_decode($footerSection->value, true) : null;
        return view('landing-page.register',compact('sectionData'));
    }

    public function forgotPassword(Request $request){
        $footerSection = FrontendSetting::where('key', 'login-register-setting')->first();
        $sectionData = $footerSection ? json_decode($footerSection->value, true) : null;
        return view('landing-page.forgot-password',compact('sectionData'));
    }

    public function catgeoryList(Request $request){
        return view('landing-page.category');
    }

    public function subCatgeoryList(Request $request){
        $category_id = $request->category_id;
        return view('landing-page.sub-category', compact('category_id'));
    }

    public function serviceList(Request $request){
        if($request->provider_id){
            $id = $request->provider_id;
            $type = "provider-service";
        }
        else if($request->subcategory_id){
            $id = $request->subcategory_id;
            $type = 'subcategory-service';
        }
        else if($request->category_id){
            $id = $request->category_id;
            $type = 'category-service';
        }
        else{
            $id = null;
            $type = null;
        }

        if ($request->latitude && $request->longitude) {
            $latitude = $request->latitude;
            $longitude = $request->longitude;
        }
        else{
            $latitude = null;
            $longitude = null;
        }
        return view('landing-page.service', compact('id','type','latitude','longitude'));
    }

    public function providerList(Request $request){
        return view('landing-page.provider');
    }

    public function blogList(Request $request){
        return view('landing-page.blog');
    }

    public function bookingList(Request $request){
        return view('landing-page.booking');
    }

    public function postJobList(Request $request){
        return view('landing-page.post-job');
    }

    public function relatedService(Request $request){
        $service_id = $request->id;
        $serviceController = app(ServiceController::class);
        $apiRequest = new Request(['service_id' => $service_id, 'per_page' => 'all']);
        $service = $serviceController->getServiceDetail($apiRequest);
        $serviceData = json_decode($service->content(), true);
        return view('landing-page.related-service',compact('service'));
    }

    public function categoryDetail(Request $request){
        $category_id = $request->id;
        $category = Category::where('id', $category_id)->first();
        $sub_category = SubCategory::where('category_id', $category_id)->where('status' , 1)->get();
        $serviceController = app(ServiceController::class);
        $apiRequest = new Request(['category_id' => $category_id]);
        $serviceResponse = $serviceController->getServiceList($apiRequest);
        $service = $serviceResponse->getData()->data ?? [];

        return view('landing-page.category-detail', compact('category','sub_category', 'service'));
    }

    public function blogDetail(Request $request){
        $blog_id = $request->id;
        $blog_data = Blog::all();
        $blogController = app(BlogController::class);
        $apiRequest = new Request(['blog_id' => $blog_id]);
        $blogResponse = $blogController->getBlogDetail($apiRequest);
        $blog = $blogResponse->getData()->blog_detail ?? [];
        $blog->read_time = calculateReadingTime($blog->description);

        return view('landing-page.blog-detail', compact('blog', 'blog_data'));
    }

    public function providerDetail(Request $request){
        $provider_id = $request->id;
        $userController = app(UserController::class);
        $apiRequest = new Request(['id' => $provider_id]);
        $providerData = $userController->userDetail($apiRequest);
        $providerData = json_decode($providerData->content(), true);
        $why_choose_me = json_decode($providerData['data']['why_choose_me'], true);

        $sitesetup = Setting::where('type','site-setup')->where('key', 'site-setup')->first();
        $datetime = json_decode($sitesetup->value);

        $completed_services = Booking::where('provider_id', $providerData['data']['id'])->where('status', 'completed')->count();

        $servicerating = Service::where('provider_id', $providerData['data']['id'])->with('serviceRating')->get();
        $allRatings = $servicerating->flatMap(function ($service) {
            return $service->serviceRating->filter(function ($rating){
                return in_array($rating->rating, [4,5]);
            });
        });
        $satisfy_customers = $allRatings->pluck('customer_id')->unique()->count();

        if(!empty(auth()->user()) && auth()->user()->hasRole('user')){
            $auth_user_id=auth()->user()->id;
            $favourite = UserFavouriteService::where('user_id',$auth_user_id)->get();
         }
         else{
            $auth_user_id=null;
            $favourite=null;
         }
        return view('landing-page.ProviderDetails', compact('providerData','why_choose_me','datetime','completed_services','satisfy_customers','auth_user_id','favourite'));
    }



    public function handymanDetail(Request $request){
        $handyman_id = $request->id;
        $userController = app(UserController::class);
        $apiRequest = new Request(['id' => $handyman_id]);
        $handymanData = $userController->userDetail($apiRequest);
        $handymanData = json_decode($handymanData->content(), true);
        $why_choose_me = json_decode($handymanData['data']['why_choose_me'], true);

        $handyman_rating = HandymanRating::where('handyman_id', $handymanData['data']['id'])->orderBy('created_at', 'desc')->get();
        $total_handyman_rating = $handyman_rating->count();

        $sitesetup = Setting::where('type','site-setup')->where('key', 'site-setup')->first();
        $datetime = json_decode($sitesetup->value);

        $completed_services = BookingHandymanMapping::whereHas('bookings', function($query){
            $query->where('status', 'completed');
        })->where('handyman_id', $handymanData['data']['id'])->count();

        $satisfy_customers = $handyman_rating->filter(function ($rating) {
           return in_array($rating->rating, [4, 5]);
        })->pluck('customer_id')->unique()->count();

        return view('landing-page.HandymanDetails', compact('handymanData','why_choose_me','handyman_rating','total_handyman_rating','datetime','completed_services','satisfy_customers'));
    }

    public function serviceDetail(Request $request){
        $service_id = $request->id;
        $serviceController = app(ServiceController::class);
        $apiRequest = new Request(['service_id' => $service_id, 'per_page' => 'all']);
        $service = $serviceController->getServiceDetail($apiRequest);
        $serviceData = json_decode($service->content(), true);

        $sitesetup = Setting::where('type','site-setup')->where('key', 'site-setup')->first();
        $date_time = json_decode($sitesetup->value);
        $favouriteServiceData = [];

        if (!empty(auth()->user())) {
            $favouriteServiceResponse = $serviceController->getUserFavouriteService($apiRequest);
            $favouriteService = json_decode($favouriteServiceResponse->content(), true);
            $favouriteServiceData = $favouriteService['data'] ?? [];
            $userId = auth()->user()->id;
            $favouriteService = collect($favouriteServiceData)->filter(function ($item) use ($userId,$service_id) {
                return isset($item['user_id']) && $item['user_id'] == $userId
                    && isset($item['service_id']) && $item['service_id'] == $service_id;
            })->toArray();
        } else {
            $favouriteService = collect();
            $userId = 0;
        }

        $completed_services = Booking::where('provider_id', $serviceData['provider']['id'])->where('status', 'completed')->count();

        $knownLanguageArray = json_decode($serviceData['provider']['known_languages'], true);
        $subtotal = $serviceData['service_detail']['discount'] != 0 ?($serviceData['service_detail']['price'])-($serviceData['service_detail']['price']*$serviceData['service_detail']['discount']/100) : $subtotal = $serviceData['service_detail']['price'];
        $total_ratings = BookingRating::where('service_id',$serviceData['service_detail']['id'])->get();
        return view('landing-page.ServiceDetail', compact('serviceData','favouriteService','date_time','completed_services','knownLanguageArray','subtotal','total_ratings','favouriteServiceData','userId'));
    }

    public function privacyPolicy(Request $request){
        $privacy_policy = Setting::where('type', 'privacy_policy')->where('key', 'privacy_policy')->first();
        return view('landing-page.PrivacyPolicy',compact('privacy_policy'));
    }

    public function termConditions(Request $request){
        $term_condition = Setting::where('type', 'terms_condition')->where('key', 'terms_condition')->first();
        return view('landing-page.TermConditions',compact('term_condition'));
    }

    public function refundPolicy(Request $request){
        $refund_policy = Setting::where('type', 'refund_cancellation_policy')->where('key', 'refund_cancellation_policy')->first();
        return view('landing-page.RefundPolicy',compact('refund_policy'));
    }

    public function helpSupport(Request $request){
        $help_support = Setting::where('type', 'help_support')->where('key', 'help_support')->first();
        return view('landing-page.helpSupport',compact('help_support'));
    }

    public function DataDeletion(Request $request){
        $data_deletion_request = Setting::where('type', 'data_deletion_request')->where('key', 'data_deletion_request')->first();
        return view('landing-page.dataDeletion',compact('data_deletion_request'));
    }

    public function bookServiceView(Request $request){

        $service_id=$request->id;
        $service = Service::where('id',$service_id)->with('providers','category','serviceRating','serviceAddon')->first();

        $service->service_image = getSingleMedia($service,'service_attachment', null);
        $service->category_name = optional($service->category)->name;
        $service->subcategory_name = optional($service->subcategory)->name;
        $service->provider_name = optional($service->providers)->display_name;
        $service->provider_image = getSingleMedia($service->providers,'profile_image', null);
        $total_reviews = optional($service->serviceRating)->count();
        $total_rating = optional($service->serviceRating)->sum('rating');
        $service->total_reviews = $total_reviews;
        $service->total_rating = $total_reviews > 0 ? number_format($total_rating/$total_reviews, 2) : 0;

        $coupons = Coupon::where('expire_date','>',date('Y-m-d H:i'))
        ->where('status',1)
        ->whereHas('serviceAdded',function($coupons) use($service_id){
            $coupons->where('service_id', $service_id );
        })->get();

        $user_id=Auth::id();

        $taxes_data = ProviderTaxMapping::where('provider_id', $service->provider_id)
        ->with(['taxes' => function ($query) {
            $query->where('status', 1);
        }])
        ->orderBy('created_at', 'desc')->get();

        $transformedData = $taxes_data->map(function ($tax) {
            return [
                'id' => $tax->id,
                'provider_id' => $tax->provider_id,
                'title' => $tax->taxes->title,
                'type' => $tax->taxes->type,
                'value' => $tax->taxes->value,
            ];
        });

        $availableserviceslot=null;

        if($service->is_slot==1 ){

            $availableserviceslot=getServiceTimeSlot($service->provider_id);

        }

        $taxes =$transformedData;

        if($request->package_id){
            $service = ServicePackage::where('id', $request->package_id)->first();
            $service->package_image = $service->getFirstMedia('package_attachment')->getUrl();
            $service->service_id = $service_id;
        }

        $serviceaddon = null;
        if($request->addons){
            $addon_id = explode(',', $request->addons);
            $serviceaddons = ServiceAddon::whereIn('id', $addon_id)->get();
            $serviceaddon = $serviceaddons->map(function ($addon) {
                return [
                    'id' => $addon->id,
                    'name' => $addon->name,
                    'price' => $addon->price,
                    'serviceaddon_image' => getSingleMedia($addon, 'serviceaddon_image', null),
                ];
            });
        }
        $sitesetup = Setting::where('type','site-setup')->where('key', 'site-setup')->first();
        $sitesetupdata = json_decode($sitesetup->value);
        $googlemapkey = $sitesetupdata->google_map_keys;
        $user = auth()->user();
        $wallet = $user->wallet;
        $wallet_amount = $wallet->amount ?? 0;
        return view('landing-page.BookService',compact('service','coupons','taxes','user_id','availableserviceslot','serviceaddon','googlemapkey','wallet_amount'));
    }

    public function bookPostJobView(Request $request){
        $user_id = Auth::id();
        $post_job_id = $request->id;
        $postJobController = app(PostJobRequestController::class);
        $apiRequest = new Request(['post_request_id' => $post_job_id]);
        $postJob = $postJobController->getPostRequestDetail($apiRequest);
        return view('landing-page.BookPostJob',compact('postJob','user_id'));
    }


    public function postJob()
    {
        $user_id=Auth::id();
        return view('landing-page.post-job-show',compact('user_id'));
    }

    public function bookingDetail(Request $request){
        $booking_id = $request->id;
        $bookingController = app(BookingController::class);
        $apiRequest = new Request(['booking_id' => $booking_id]);
        $booking = $bookingController->getBookingDetail($apiRequest);

        $user = auth()->user();
        $wallet = $user->wallet;
        $wallet_amount=  $wallet->amount;
        $bookingData = json_decode($booking->content(), true);
        $sitesetup = Setting::where('type','site-setup')->where('key', 'site-setup')->first();
        $date_time = $sitesetup ? json_decode($sitesetup->value, true) : null;
        return view('landing-page.BookingDetail',compact('booking','wallet_amount','date_time','bookingData'));
    }

    public function postJobDetail(Request $request){
        $post_job_id = $request->id;
        $postJobController = app(PostJobRequestController::class);
        $apiRequest = new Request(['post_request_id' => $post_job_id]);
        $postJob = $postJobController->getPostRequestDetail($apiRequest);
        return view('landing-page.post-job-detail',compact('postJob'));
    }

    public function favouriteServiceList(Request $request){
        $user = auth()->user();
        $favouriteService = UserFavouriteService::where('user_id', $user->id)->get();

        $isEmpty = $favouriteService->isEmpty();

        return view('landing-page.FavouriteService', compact('isEmpty'));
    }

    public function servicePackageList(Request $request){
        $service_id = $request->id;
        $serviceController = app(ServiceController::class);
        $apiRequest = new Request(['service_id' => $service_id]);
        $service = $serviceController->getServiceDetail($apiRequest);
        $serviceData = json_decode($service->content(), true);
        return view('landing-page.ServicePackages',compact('service','serviceData'));
    }

    public function ratingList(Request $request){

        if($request->handyman_id){
            $query = HandymanRating::query()->orderBy('created_at', 'desc');

        }
        else{
            $query = BookingRating::query()->orderBy('created_at', 'desc');
        }

        $review_count=0;

        if($request->provider_id){
            $id = $request->provider_id;
            $type = "provider-rating";

            $query = $query->whereHas('service',function ($q) use($id) {
                $q->where('provider_id',$id);
            });

            $review_count=count($query->get());
        }
        else if($request->handyman_id){
            $id = $request->handyman_id;
            $type = 'handyman-rating';

            $query = $query->where('handyman_id', $id);

            $review_count=count($query->get());
        }
        else if($request->service_id){
            $id = $request->service_id;
            $type = "service-rating";
            $query = $query->where('service_id', $id);
            $review_count=count($query->get());
        }

        return view('landing-page.RatingAll', compact('id','type','review_count'));
    }

    public function categoryDatatable(Datatables $datatable, Request $request){
        $query = Category::query();

        $query=$query->where('status',1);

        $filter = $request->filter;
        if(isset($filter['search'])) {
            $query->where('name', 'LIKE', '%'.$filter['search'].'%');
        }
        $datatable = $datatable->eloquent($query)
            ->editColumn('name', function ($data) {
                return view('category.datatable-card',compact('data'));
            })
            ->order(function ($query) {
                $query->orderBy('id', 'desc');
            });

           
        return $datatable->rawColumns(['name'])
            ->toJson();
    }

    public function subCategoryDatatable(Datatables $datatable, Request $request){
        $query = SubCategory::query();
        $query=$query->where('status',1);
        $query = $query->where('category_id', $request->category_id);
        $datatable = $datatable->eloquent($query)
            ->editColumn('name', function ($data) {
                return view('subcategory.datatable-card',compact('data'));
            })
            ->order(function ($query) {
                $query->orderBy('id', 'desc');
            });

        return $datatable->rawColumns(['name'])
            ->toJson();
    }

    public function serviceDatatable(Datatables $datatable, Request $request){
        $query = Service::where('service_type','service')->where('status',1);

        if($request->type == 'provider-service'){
            $query->where('provider_id', $request->id);
        }
        if($request->type == 'subcategory-service'){
            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('subcategory_id', $request->id);
            });
        }
        if($request->type == 'category-service'){
            $query->where('category_id', $request->id);
        }
        if ($request->has('latitude') && !empty($request->latitude) && $request->has('longitude') && !empty($request->longitude)) {

            $get_distance = getSettingKeyValue('site-setup','radious') ?? 50;
            $get_unit = getSettingKeyValue('site-setup','distance_type') ?? 'km';

            $locations = $query->locationService($request->latitude,$request->longitude,$get_distance,$get_unit);
            $service_in_location = ProviderServiceAddressMapping::whereIn('provider_address_id',$locations)->get()->pluck('service_id');
            $query->with('providerServiceAddress')->whereIn('id',$service_in_location);
        }

        if(default_earning_type() === 'subscription'){
             $query->whereHas('providers', function ($a) use ($request) {
                 $a->where('status', 1)->where('is_subscribe',1);
             });
         }
        $filter = $request->filter;

        if(isset($filter['search'])) {
            $query->where('name', 'LIKE', '%'.$filter['search'].'%');
        }
        if(isset($filter['selectedCategory'])) {
            $query->where('category_id', $filter['selectedCategory']);
        }
        if(isset($filter['selectedProvider'])) {
            $query->where('provider_id', $filter['selectedProvider']);
        }
        if (isset($filter['selectedPriceRange'])) {
            $priceRange = explode('-', $filter['selectedPriceRange']);

            if (count($priceRange) === 2) {
                $minPrice = $priceRange[0];
                $maxPrice = $priceRange[1];
                $query->whereBetween('price', [$minPrice, $maxPrice]);
            }
        }
        if(isset($filter['selectedSortOption'])) {
            if ($filter['selectedSortOption'] == "best_selling") {
                $bestSellingServiceIds = Booking::select('service_id', \DB::raw('COUNT(service_id) as service_count'))
                    ->groupBy('service_id')
                    ->orderByDesc('service_count')
                    ->pluck('service_id')
                    ->toArray();

                    if (!empty($bestSellingServiceIds)) {
                        $query->whereIn('id', $bestSellingServiceIds)
                            ->orderByRaw(\DB::raw("FIELD(id, " . implode(',', $bestSellingServiceIds) . ")"));
                    }
            }
            if ($filter['selectedSortOption'] == "top_rated") {
                $topRatedServiceIds = BookingRating::select(
                        'service_id',
                        \DB::raw('COALESCE(AVG(rating), 0) as avg_rating'),
                        \DB::raw('COUNT(rating) as total_reviews')
                    )
                    ->groupBy('service_id')
                    ->orderByDesc('avg_rating')
                    ->orderByDesc('total_reviews')
                    ->pluck('service_id')
                    ->toArray();
                    if (!empty($bestSellingServiceIds)) {
                $query->whereIn('id', $topRatedServiceIds)
                    ->orderByRaw(\DB::raw("FIELD(id, " . implode(',', $topRatedServiceIds) . ")"));
                    }
            }
            if($filter['selectedSortOption'] == "newest"){
                $query->orderBy('created_at', 'desc');
            }
        }


        $datatable = $datatable->eloquent($query)
        ->editColumn('name', function ($data) {
            $totalReviews = $data->id ? BookingRating::where('service_id', $data->id)->count() : 0;
            $totalRating = $data->serviceRating ? (float) number_format(max($data->serviceRating->avg('rating'), 0), 2) : 0;
            if(!empty(auth()->user())){
                $favouriteService = $data->getUserFavouriteService()->where('user_id', auth()->user()->id)->get();
            }else{
                $favouriteService = collect();
            }
            return view('service.datatable-card', compact('data', 'totalReviews','totalRating', 'favouriteService'));
        })
        ->order(function ($query) {
            $query->orderBy('id', 'desc');
        });

        return $datatable->rawColumns(['name'])
            ->toJson();
    }

    public function blogDatatable(Datatables $datatable, Request $request){
        $query = Blog::query();
        $query =$query->where('status',1);
        $filter = $request->filter;
        if(isset($filter['search'])) {
            $query->where('title', 'LIKE', '%'.$filter['search'].'%');
        }

        $datatable = $datatable->eloquent($query)
            ->editColumn('name', function ($data) {
                return view('blog.datatable-card',compact('data'));
            })
            ->order(function ($query) {
                $query->orderBy('id', 'desc');
            });

        return $datatable->rawColumns(['name'])
            ->toJson();
    }

    public function providerDatatable(Datatables $datatable, Request $request){
        $query = User::query();
        $query = $query->where('user_type','provider')->where('status',1);
        $filter = $request->filter;
        if(isset($filter['search'])) {
            $query->where('first_name', 'LIKE', '%'.$filter['search'].'%')->orWhere('last_name', 'LIKE', '%'.$filter['search'].'%');
        }

        $datatable = $datatable->eloquent($query)
            ->editColumn('name', function ($data) {
                $providers_service_rating = (float) 0;
                $providers_service_rating = (isset($data->getServiceRating) && count($data->getServiceRating) > 0 ) ?
                (float) number_format(max($data->getServiceRating->avg('rating'),0), 2) : 0;

                return view('provider.datatable-card',compact('data','providers_service_rating'));
            })
            ->order(function ($query) {
                $query->orderBy('id', 'desc');
            });

        return $datatable->rawColumns(['name'])
            ->toJson();
    }

    public function bookingDatatable(Datatables $datatable, Request $request){
        $query = Booking::query();
        $query = $query->where('customer_id', auth()->user()->id);
        $filter = $request->filter;
        if(isset($filter['search'])) {
            $query->WhereHas('service',function($q) use($filter) {
                $q->where('name', 'LIKE', '%'.$filter['search'].'%');
            });
        }
        if(isset($filter['booking_date_range'])) {

            $startDate = explode(' to ', $filter['booking_date_range'])[0];
            $startDate = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
            $endDate = explode(' to ', $filter['booking_date_range'])[1];
            $endDate = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');
            $query->whereDate('date', '>=', $startDate);
            $query->whereDate('date', '<=', $endDate);
        }

        if(isset($filter['status'])) {
            $query->where('status', $filter['status']);
        }

        $query->orderByDesc('id');

        $datatable = $datatable->eloquent($query)
            ->editColumn('name', function ($data) {
                $service = optional($data->service);
                $serviceimage = getSingleMedia($service,'service_attachment', null);
                $total_rating = (float) number_format(max(optional($data->service)->serviceRating->avg('rating'),0), 2);
                return view('booking.datatable-card',compact('data','total_rating','serviceimage'));
            });

        return $datatable->rawColumns(['name'])
            ->toJson();
    }

    public function postJobDatatable(Datatables $datatable, Request $request)
    {
        $query = PostJobRequest::myPostJob()->whereIn('status',['requested','accepted','assigned']);
        $filter = $request->filter;
        if (isset($filter['search'])) {
            $searchTerm = $filter['search'];
            $query->where(function ($query) use ($searchTerm) {
                $query->where('status', 'LIKE', '%' . $searchTerm . '%');
                $query->orWhereHas('postServiceMapping', function ($serviceQuery) use ($searchTerm) {
                    $serviceQuery->where('service_id', '!=', null)
                        ->whereExists(function ($subServiceQuery) use ($searchTerm) {
                            $subServiceQuery->selectRaw(1)
                                ->from('services')
                                ->whereRaw('services.id = post_job_service_mappings.service_id')
                                ->where('name', 'LIKE', '%' . $searchTerm . '%');
                        });
                });
            });
        }
        $datatable = $datatable->eloquent($query)
            ->editColumn('name', function ($data) {
                $services = optional($data->postServiceMapping);
                $serviceImages = $services->map(function ($service) {
                    $serviceId = $service->service_id;
                    $image = optional(Service::find($serviceId)->getFirstMedia('service_attachment'))->getUrl();
                    return $image;
                });
                return view('postrequest.datatable-card',compact('data','serviceImages'));
            })
            ->order(function ($query) {
                $query->orderBy('id', 'desc');
            });

        return $datatable->rawColumns(['name'])
            ->toJson();
    }


    public function favouriteServiceDatatable(Datatables $datatable, Request $request){
        $user = auth()->user();

        $favouriteServiceIds = UserFavouriteService::where('user_id', $user->id)->pluck('service_id')->toArray();

        $query = Service::whereIn('id', $favouriteServiceIds);

        $filter = $request->filter;
        if(isset($filter['search'])) {
            $query->where('name', 'LIKE', '%'.$filter['search'].'%');
        }
        if(isset($filter['selectedCategory'])) {
            $query->where('category_id', $filter['selectedCategory']);
        }
        if(isset($filter['selectedProvider'])) {
            $query->where('provider_id', $filter['selectedProvider']);
        }
        if (isset($filter['selectedPriceRange'])) {
            $priceRange = explode('-', $filter['selectedPriceRange']);

            if (count($priceRange) === 2) {
                $minPrice = $priceRange[0];
                $maxPrice = $priceRange[1];
                $query->whereBetween('price', [$minPrice, $maxPrice]);
            }
        }
        if(isset($filter['selectedSortOption'])) {
            if ($filter['selectedSortOption'] == "best_selling") {
                $bestSellingServiceIds = Booking::select('service_id', \DB::raw('COUNT(service_id) as service_count'))
                    ->groupBy('service_id')
                    ->orderByDesc('service_count')
                    ->pluck('service_id')
                    ->toArray();

                $query->whereIn('id', $bestSellingServiceIds)
                    ->orderByRaw(\DB::raw("FIELD(id, " . implode(',', $bestSellingServiceIds) . ")"));
            }
            if ($filter['selectedSortOption'] == "top_rated") {
                $topRatedServiceIds = BookingRating::select('service_id', \DB::raw('COALESCE(AVG(rating), 0) as avg_rating'))
                    ->groupBy('service_id')
                    ->orderByDesc('avg_rating')
                    ->pluck('service_id')
                    ->toArray();

                $query->whereIn('id', $topRatedServiceIds)
                    ->orderByRaw(\DB::raw("FIELD(id, " . implode(',', $topRatedServiceIds) . ")"));
            }
            if($filter['selectedSortOption'] == "newest"){
                $query->orderBy('created_at', 'desc');
            }
        }


        $datatable = $datatable->eloquent($query)
            ->editColumn('name', function ($data) {
                $totalReviews = BookingRating::where('service_id', $data->id)->count();
                $totalRating = count($data->serviceRating) > 0
                    ? (float)number_format(max($data->serviceRating->avg('rating'), 0), 2)
                    : 0;

                    if(!empty(auth()->user())){
                        $favouriteService = $data->getUserFavouriteService()->where('user_id', auth()->user()->id)->get();
                    }else{
                        $favouriteService = collect();
                    }
                    return view('service.datatable-card', compact('data', 'totalReviews','totalRating', 'favouriteService'));
            });

        return $datatable->rawColumns(['name'])
            ->toJson();
    }
    public function ratingDatatable(Datatables $datatable, Request $request){

        $id = $request->id;
        if($request->type == 'handyman-rating'){
            $query = HandymanRating::query()->orderBy('created_at', 'desc');
            $query = $query->where('handyman_id', $id);
        }
        else{
            $query = BookingRating::query()->orderBy('created_at', 'desc');
        }
        if($request->type == 'provider-rating'){
            $query = $query->whereHas('service',function ($q) use($id) {
                $q->where('provider_id',$id);
            });
        }
        elseif($request->type == 'service-rating'){
            $query = $query->where('service_id', $id);
        }

        $filter = $request->filter;
        if(isset($filter['search'])) {
            $query->WhereHas('customer',function($q) use($filter) {
                $q->where('display_name', 'LIKE', '%'.$filter['search'].'%');
            });
        }

        $datatable = $datatable->eloquent($query)
            ->editColumn('name', function ($data) {
                return view('ratingreview.datatable-card',compact('data'));
            });

        return $datatable->rawColumns(['name'])
            ->toJson();
    }
    public function userSubscribe(Request $request){
        $emailData['email'] = $request->email;
        $emailData['title'] = env('APP_NAME');
        $emailData['body'] = 'Thank you for subscribe us.';
        try {
            \Mail::send('customer.subscribe_email', $emailData, function($message)use($emailData) {
                $message->to($emailData['email'])
                        ->subject($emailData['title']);
            });

            $messagedata = __('landingpage.subscribe_msg');
            return comman_message_response($messagedata);
        } catch (\Throwable $th) {
            $messagedata = __('messages.something_wrong');
            return comman_message_response($messagedata);
        }
    }
}
