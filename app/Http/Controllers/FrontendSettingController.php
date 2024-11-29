<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Models\User;
use App\Models\Service;
use App\Models\FrontendSetting;


class FrontendSettingController extends Controller
{
    public function frontendSettings(Request $request)
    {
        $auth_user = authSession();

        $pageTitle = __('messages.frontend_setting');
        $page = $request->page;

        if ($page == '') {
            if ($auth_user->hasAnyRole(['admin', 'demo_admin'])) {
                $page = 'landing-page-setting';
            }
        }

        return view('frontendsetting.index', compact('page', 'pageTitle', 'auth_user'));
    }



    /*ajax show layout data*/
    public function layoutPage(Request $request)
    {
        $page = $request->page;
        $auth_user = authSession();
        $user_id = $auth_user->id;

        $settings = AppSetting::firstOrNew();
        $user_data = User::find($user_id);
        $tabpage = '';

        $landing_page_data = FrontendSetting::where('type', $page)->first();

        if (!empty($landing_page_data['value'])) {
            $decodedata = json_decode($landing_page_data['value']);

            switch ($page) {
                case 'landing-page-setting':
                    $tabpage = 'section_1';
                    break;
                case 'heder-menu-setting':
                    $keys = ['header_setting', 'enable_language', 'enable_darknight_mode', 'home', 'service', 'provider', 'categories','bookings'];
                    foreach ($keys as $key) {
                        $landing_page_data[$key] = $decodedata->$key;
                    }
                    break;
                case 'footer-setting':
                    $keys = ['footer_setting', 'enable_popular_category', 'category_id', 'enable_popular_service', 'service_id'];
                    foreach ($keys as $key) {
                        $landing_page_data[$key] = $decodedata->$key;
                    }
                    break;
                case 'login-register-setting':
                    $keys = ['login_register', 'title', 'description'];
                    foreach ($keys as $key) {
                        $landing_page_data[$key] = $decodedata->$key;
                    }
                    break;
                default:
                    // Additional logic for default case if needed
                    break;
            }
        }

        $data = view('frontendsetting.' . $page, compact('landing_page_data', 'page', 'tabpage', 'user_data'))->render();
        return response()->json($data);
    }
    public function landingpagesettingsUpdates(Request $request){
        $data = $request->all();
        $page = $request->page;
        $type = $request->type;

        $status = isset($data['status']) && $data['status'] == 'on' ? 1 : 0;

        $configurations = [
            'section_1' => ['category_id','current_location','enable_search','enable_popular_services','enable_popular_provider','provider_id'],
            'section_2' => ['category_id'],
            'section_3' => ['service_id'],
            'section_4' => ['service_id'],
            'section_5' => ['email', 'contact_number'],
            'section_6' => [],
            'section_7' => ['url', 'subtitle', 'subdescription'],
            'section_8' => [],
            'section_9' => ['overall_rating'],
        ];

        $landing_page_data = [
            $type => $status,
            'title' => $data['title'],
        ];
        if (!empty($data['description'])) {
            $landing_page_data['description'] = $data['description'];
        }
        foreach ($configurations[$type] ?? [] as $field) {
            $landing_page_data[$field] = isset($data[$field]) ? $data[$field] : [];
        }

        $res = FrontendSetting::updateOrCreate(['id' => $request->id], [
            'type' => 'landing-page-setting',
            'key' => $type,
            'status' => $status,
            'value' => json_encode($landing_page_data),
        ]);

        if ($type == 'section_5') {
            storeMediaFile($res, $request->section5_attachment, 'section5_attachment');
        } elseif ($type == 'section_6') {
            storeMediaFile($res, $request->main_image, 'main_image');
            storeMediaFile($res, $request->google_play, 'google_play');
            storeMediaFile($res, $request->app_store, 'app_store');
        } elseif ($type == 'section_7') {
            storeMediaFile($res, $request->vimage, 'vimage');
        }

        return redirect()->route('frontend_setting.index', ['page' => $page])->withSuccess(__('messages.landing_page_settings').' '.__('messages.updated'));
    }


    public function landingLayoutPage(Request $request){
        $tabpage = $request->tabpage;
        $auth_user = authSession();
        $user_id = $auth_user->id;
        $user_data = User::find($user_id);
        $landing_page = FrontendSetting::where('key',$tabpage)->first();

        switch ($tabpage) {
            case 'section_1':
                if(!empty($landing_page['value'])){
                    $decodedata = json_decode($landing_page['value']);
                    $landing_page['section_1'] = $decodedata->section_1;
                    $landing_page['title'] = $decodedata->title;
                    $landing_page['description'] = $decodedata->description;
                    $landing_page['current_location'] = $decodedata->current_location;
                    $landing_page['enable_search'] = $decodedata->enable_search;
                    $landing_page['enable_popular_services'] = $decodedata->enable_popular_services;
                    $landing_page['category_id'] = $decodedata->category_id;
                    $landing_page['enable_popular_provider'] = $decodedata->enable_popular_provider;
                    $landing_page['provider_id'] = $decodedata->provider_id;
                }
                $data  = view('forntend-setting-landing.'.$tabpage, compact('user_data','tabpage','landing_page'))->render();

                break;

            case 'section_2':
                if(!empty($landing_page['value'])){
                    $decodedata = json_decode($landing_page['value']);
                    $landing_page['section_2'] = $decodedata->section_2;
                    $landing_page['title'] = $decodedata->title;
                    $landing_page['category_id'] = $decodedata->category_id;
                }
                $data  = view('forntend-setting-landing.'.$tabpage, compact('user_data','tabpage','landing_page'))->render();
                break;

            case 'section_3':
                if(!empty($landing_page['value'])){
                    $decodedata = json_decode($landing_page['value']);
                    $landing_page['section_3'] = $decodedata->section_3;
                    $landing_page['title'] = $decodedata->title;
                    $landing_page['service_id'] = $decodedata->service_id;

                }
                $data  = view('forntend-setting-landing.'.$tabpage, compact('user_data', 'tabpage', 'landing_page'))->render();
                break;

            case 'section_4':
                if(!empty($landing_page['value'])){
                    $decodedata = json_decode($landing_page['value']);
                    $landing_page['section_4'] = $decodedata->section_4;
                    $landing_page['title'] = $decodedata->title;
                    $landing_page['service_id'] = $decodedata->service_id;
                }
                $data  = view('forntend-setting-landing.'.$tabpage, compact('user_data','tabpage','landing_page'))->render();
                break;

            case 'section_5':
                if(!empty($landing_page['value'])){
                    $decodedata = json_decode($landing_page['value']);
                    $landing_page['section_5'] = $decodedata->section_5;
                    $landing_page['title'] = $decodedata->title;
                    $landing_page['email'] = $decodedata->email;
                    $landing_page['contact_number'] = $decodedata->contact_number;
                    $landing_page['description'] = $decodedata->description;
                }
                $data  = view('forntend-setting-landing.'.$tabpage, compact('user_data','tabpage','landing_page'))->render();
                break;

            case 'section_6':
                if(!empty($landing_page['value'])){
                    $decodedata = json_decode($landing_page['value']);
                    $landing_page['section_6'] = $decodedata->section_6;
                    $landing_page['title'] = $decodedata->title;
                    $landing_page['description'] = $decodedata->description;
                }
                $data  = view('forntend-setting-landing.'.$tabpage, compact('user_data','tabpage','landing_page'))->render();
                break;

            case 'section_7':
                if(!empty($landing_page['value'])){
                    $decodedata = json_decode($landing_page['value']);
                    $landing_page['section_7'] = $decodedata->section_7;
                    $landing_page['title'] = $decodedata->title;
                    $landing_page['description'] = $decodedata->description;
                    $landing_page['url'] = $decodedata->url;
                    $landing_page['subtitle'] = $decodedata->subtitle;
                    $landing_page['subdescription'] = $decodedata->subdescription;
                }
                $data  = view('forntend-setting-landing.'.$tabpage, compact('user_data','tabpage','landing_page'))->render();
                break;
            case 'section_8':
                if(!empty($landing_page['value'])){
                    $decodedata = json_decode($landing_page['value']);
                    $landing_page['section_8'] = $decodedata->section_8;
                    $landing_page['title'] = $decodedata->title;
                    $landing_page['description'] = $decodedata->description;
                }
                $data  = view('forntend-setting-landing.'.$tabpage, compact('user_data','tabpage','landing_page'))->render();
                break;
            case 'section_9':
                if(!empty($landing_page['value'])){
                    $decodedata = json_decode($landing_page['value']);
                    $landing_page['section_9'] = $decodedata->section_9;
                    $landing_page['title'] = $decodedata->title;
                    $landing_page['overall_rating'] = $decodedata->overall_rating;
                    $landing_page['description'] = $decodedata->description;
                }
                $data  = view('forntend-setting-landing.'.$tabpage, compact('user_data','tabpage','landing_page'))->render();
                break;


            default:
                $data  = view('forntend-setting-landing.'.$tabpage,compact('tabpage','landing_page'))->render();
                break;
        }
        return response()->json($data);
    }

    public function getLandingLayoutPageConfig(Request $request){
        $mode = $request->type;
        $page = 'landing-page-setting';
        $select = 'value' ;


        $landing_page = FrontendSetting::select('id','key', $select,'status','type')->where('key',$mode)->first();
        $landing_page['key'] = $mode;


        return response()->json(['success'=>'Ajax request submitted successfully','data'=>$landing_page]);
    }

    public function headingpagesettings(Request $request)
    {
        $data = $request->all();
        $page = 'heder-menu-setting';
        $message = trans('messages.failed');
        $order = array_diff_key($data, array_flip(['_token', 'id', 'type', 'status', 'active_tab']));
        $status = (isset($data['status']) && $data['status'] == 'on') ? 1 : 0;
        $header_setting_data = [
            'header_setting' => $status,
            'enable_language' => (isset($data['enable_language']) && $data['enable_language'] == 'on') ? 1 : 0,
            'enable_darknight_mode' => (isset($data['enable_darknight_mode']) && $data['enable_darknight_mode'] == 'on') ? 1 : 0,
        ];
        foreach ($order as $item => $value) {
            $header_setting_data[$item] = ($value == 'on') ? 1 : 0;
        }
        $res = FrontendSetting::updateOrCreate(
            ['id' => $request->id],
            ['type' => 'heder-menu-setting', 'key' => 'heder-menu-setting', 'status' => $status, 'value' => json_encode($header_setting_data)]
        );

        if ($res) {
            $message = trans('messages.update_form', ['form' => trans('messages.heder-menu-setting')]);
        }

        return redirect()->route('frontend_setting.index', ['page' => $page])->withSuccess(__('messages.header_menu_settings').' '.__('messages.updated'));
    }

    public function footerpagesettings(Request $request)
    {
        $data = $request->all();
        $page = 'footer-setting';
        $message = trans('messages.failed');
        $order = array_diff_key($data, array_flip(['_token', 'id', 'type', 'status', 'active_tab']));
        $status = (isset($data['status']) && $data['status'] == 'on') ? 1 : 0;
        $footer_setting_data = [
            'footer_setting' => $status,
            'enable_popular_category' => (isset($data['enable_popular_category']) && $data['enable_popular_category'] == 'on') ? 1 : 0,
            'category_id' => isset($data['category_id']) ? $data['category_id'] : [],
            'enable_popular_service' => (isset($data['enable_popular_service']) && $data['enable_popular_service'] == 'on') ? 1 : 0,
            'service_id' => isset($data['service_id']) ? $data['service_id'] : [],
        ];

        $res = FrontendSetting::updateOrCreate(
            ['id' => $request->id],
            ['type' => 'footer-setting', 'key' => 'footer-setting', 'status' => $status, 'value' => json_encode($footer_setting_data)]
        );

        if ($res) {
            $message = trans('messages.update_form', ['form' => trans('messages.footer-setting')]);
        }

        return redirect()->route('frontend_setting.index', ['page' => $page])->withSuccess(__('messages.footer_settings').' '.__('messages.updated'));
    }

    public function loginregisterpagesettings(Request $request)
    {
        $data = $request->all();
        $page = 'login-register-setting';
        $message = trans('messages.failed');
        $order = array_diff_key($data, array_flip(['_token', 'id', 'type', 'status', 'active_tab']));
        $status = (isset($data['status']) && $data['status'] == 'on') ? 1 : 0;
        $login_register_data = [
            'login_register' => $status,
            'title' => $data['title'],
            'description'=> $data['description'],
        ];

        $res = FrontendSetting::updateOrCreate(
            ['id' => $request->id],
            ['type' => 'login-register-setting', 'key' => 'login-register-setting', 'status' => $status, 'value' => json_encode($login_register_data)]
        );
        storeMediaFile($res, $request->login_register_image, 'login_register_image');
        if ($res) {
            $message = trans('messages.update_form', ['form' => trans('messages.footer-setting')]);
        }

        return redirect()->route('frontend_setting.index', ['page' => $page])->withSuccess(__('messages.login_register_settings').' '.__('messages.updated'));
    }


    public function recentlyViewedStore($serviceId)
    {
        $userId = auth()->id();

        $recentlyViewed = session()->get('recently_viewed:' . $userId, []);
        $recentlyViewed = array_values(array_unique($recentlyViewed));
        $service = Service::find($serviceId);
        if (!in_array($service, $recentlyViewed)) {

            array_unshift($recentlyViewed, $service);

            $recentlyViewed = array_slice($recentlyViewed, 0, 10);

            session()->put('recently_viewed:' . $userId, $recentlyViewed);

            return response()->json(['success' => true, 'message' => $recentlyViewed]);
        }

        return response()->json(['success' => false, 'message' => 'Service not found'], 404);
    }
    public function recentlyViewedGet()
    {
        $userId = auth()->id();
        $limit = 10;

        $recentlyViewed = session()->get('recently_viewed:' . $userId, []);
        array_unshift($recentlyViewed);
        $recentlyViewed = array_slice($recentlyViewed, 0, $limit);
        session(['recently_viewed:' . $userId => $recentlyViewed]);

        return response()->json($recentlyViewed);
    }
}
