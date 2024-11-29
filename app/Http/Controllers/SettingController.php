<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Models\Setting;
use App\Models\User;
use App\Models\Service;
use Hash;
use App\Models\ProviderSlotMapping;
use App\Http\Requests\UserRequest;
use App\Models\NotificationTemplate;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings(Request $request)
    {
        $auth_user = authSession();

        $pageTitle = __('messages.setting');
        $page = $request->page;

        if ($page == '') {
            if ($auth_user->hasAnyRole(['admin', 'demo_admin'])) {
                $page = 'general-setting';
            } else {
                $page = 'profile_form';
            }
        }

        return view('setting.index', compact('page', 'pageTitle', 'auth_user'));
    }

    /*ajax show layout data*/
    public function layoutPage(Request $request)
    {
        $page = $request->page;
        $auth_user = authSession();
        $user_id = $auth_user->id;
        $settings = AppSetting::first();
        $user_data = User::find($user_id);
        $envSettting = $envSettting_value = [];
        if ($auth_user['user_type'] == 'provider') {
            date_default_timezone_set($admin->time_zone ?? 'UTC');

            $current_time = \Carbon\Carbon::now();
            $time = $current_time->toTimeString();

            $current_day = strtolower(date('D'));

            $provider_id = $request->id ?? auth()->user()->id;

            $days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

            $slotsArray = ['days' => $days];
            $activeDay = 'mon';
            $activeSlots = [];

            foreach ($days as $value) {
                $slot = ProviderSlotMapping::where('provider_id', $provider_id)
                    ->where('days', $value)
                    ->orderBy('start_at', 'DESC')
                    ->selectRaw("SUBSTRING(start_at, 1, 5) as start_at")
                    ->pluck('start_at')
                    ->toArray();

                $obj = [
                    "day" => $value,
                    "slot" => $slot,
                ];
                $slotsArray[] = $obj;
                $activeSlots[$value] = $slot;
            }
            $pageTitle = __('messages.slot', ['form' => __('messages.slot')]);
        }
        if (count($envSettting) > 0) {
            $envSettting_value = Setting::whereIn('key', array_keys($envSettting))->get();
        }
        if ($settings == null) {
            $settings = new AppSetting;
        } elseif ($user_data == null) {
            $user_data = new User;
        }
        switch ($page) {
            case 'general-setting':
                $generalsetting   = Setting::where('type', '=', 'general-setting')->first();

                if (!empty($generalsetting['value'])) {
                    $decodedata = json_decode($generalsetting['value']);
                    $keys = ['site_name', 'site_description', 'inquriy_email', 'helpline_number', 'website', 'country_id', 'state_id', 'city_id', 'zipcode', 'address'];
                    foreach ($keys as $key) {
                        $generalsetting[$key] = $decodedata->$key;
                    }
                }
                $data = view('setting.' . $page, compact('page', 'generalsetting'))->render();
                break;
            case 'theme-setup':
                $themesetup   = Setting::where('type', '=', 'theme-setup')->first();
                $data = view('setting.' . $page, compact('page', 'themesetup'))->render();
                break;
            case 'site-setup':
                $site   = Setting::where('type', '=', 'site-setup')->first();
                if (!empty($site['value'])) {
                    $decodedata = json_decode($site['value']);
                    $keys = ['date_format', 'time_format', 'time_zone', 'language_option', 'default_currency', 'currency_position', 'google_map_keys', 'latitude', 'longitude', 'distance_type', 'radious', 'digitafter_decimal_point', 'android_app_links', 'playstore_url', 'provider_playstore_url', 'ios_app_links', 'appstore_url', 'provider_appstore_url', 'site_copyright'];
                    foreach ($keys as $key) {
                        $site[$key] = $decodedata->$key;
                    }
                }
                $data = view('setting.' . $page, compact('page', 'site'))->render();
                break;
            case 'service-configurations':
                $serviceconfig   = Setting::where('type', '=', 'service-configurations')->first();

                if (!empty($serviceconfig['value'])) {
                    $decodedata = json_decode($serviceconfig['value']);
                    $keys = ['advance_payment', 'slot_service', 'digital_services', 'service_packages', 'service_addons', 'post_services'];
                    foreach ($keys as $key) {
                        $serviceconfig[$key] = $decodedata->$key;
                    }
                }
                $data = view('setting.' . $page, compact('page', 'serviceconfig'))->render();
                break;
            case 'social-media':
                $socialmedia   = Setting::where('type', '=', 'social-media')->first();
                if (!empty($socialmedia['value'])) {
                    $decodedata = json_decode($socialmedia['value']);
                    $keys = ['facebook_url', 'linkedin_url', 'instagram_url', 'youtube_url', 'twitter_url'];
                    foreach ($keys as $key) {
                        $socialmedia[$key] = $decodedata->$key;
                    }
                }
                $data = view('setting.' . $page, compact('page', 'socialmedia'))->render();
                break;
            case 'cookie-setup':
                $cookiesetup   = Setting::where('type', '=', 'cookie-setup')->first();

                if (!empty($cookiesetup['value'])) {
                    $decodedata = json_decode($cookiesetup['value']);
                    $keys = ['title', 'description'];
                    foreach ($keys as $key) {
                        $cookiesetup[$key] = $decodedata->$key;
                    }
                }
                $data = view('setting.' . $page, compact('page', 'cookiesetup'))->render();
                break;

            case 'role-permission-setup':
                $tabpage = 'role';
                $data = view('setting.' . $page, compact('page', 'tabpage'))->render();
                break;
            case 'time_slot':
                $data  = view('setting.' . $page, compact('user_data', 'page', 'slotsArray', 'pageTitle', 'activeDay', 'provider_id', 'activeSlots'))->render();
                break;
            case 'password_form':
                $data  = view('setting.' . $page, compact('user_data', 'page'))->render();
                break;
            case 'profile_form':
                $why_choose_me = json_decode($user_data->why_choose_me, true);

                if ($why_choose_me !== null && is_array($why_choose_me)) {
                    $user_data['title'] = $why_choose_me['title'] ?? null;
                    $user_data['about_description'] = $why_choose_me['about_description'] ?? null;
                    $user_data['reason'] = $why_choose_me['reason'] ?? null;
                } else {
                    $user_data['title'] =  null;
                    $user_data['about_description'] = null;
                    $user_data['reason'] =  null;
                }

                $data  = view('setting.' . $page, compact('user_data', 'page'))->render();
                break;
            case 'mail-setting':
                $data  = view('setting.' . $page, compact('page'))->render();
                break;

            case 'payment-setting':
                $tabpage = 'cash';
                $data  = view('setting.' . $page, compact('tabpage', 'page'))->render();
                break;


            case 'notification-setting':
                $query_data = NotificationTemplate::with('defaultNotificationTemplateMap', 'constant')->get();
                $data = [];

                $notificationKeyChannels = array_keys(config('notification-setting.channels'));

                $arr = [];
                foreach ($notificationKeyChannels as $key => $value) {
                    $arr[$value] = 0;
                }

                foreach ($query_data as $key => $value) {
                    $data[$key] = [
                        'id' => $value->id,
                        'type' => $value->type,
                        'template' => $value->defaultNotificationTemplateMap->subject,
                        'is_default' => false,
                    ];

                    if (isset($value->channels)) {
                        $data[$key]['channels'] = $value->channels;
                    } else {
                        $data[$key]['channels'] = $arr;
                    }
                }

                $notificationChannels = config('notification-setting.channels');

                $data = view('setting.' . $page, compact('page', 'data', 'notificationChannels'))->render();
                break;
            case 'other-setting':
                $othersetting   = Setting::where('type', '=', 'OTHER_SETTING')->first();

                if (!empty($othersetting['value'])) {
                    $decodedata = json_decode($othersetting['value']);

                    if (!empty($decodedata->auto_assign_provider)) {
                        $keys = [
                            'social_login', 'google_login', 'apple_login', 'otp_login', 'online_payment', 'blog', 'maintenance_mode',
                            'wallet', 'enable_chat_gpt', 'test_without_key', 'chat_gpt_key', 'force_update_user_app', 'user_app_minimum_version', 'user_app_latest_version',
                            'force_update_provider_app', 'provider_app_minimum_version', 'provider_app_latest_version', 'force_update_admin_app', 'admin_app_minimum_version', 'admin_app_latest_version',
                            'firebase_notification', 'firebase_key', 'auto_assign_provider'
                        ];
                    } else {
                        $keys = [
                            'social_login', 'google_login', 'apple_login', 'otp_login', 'online_payment', 'blog', 'maintenance_mode',
                            'wallet', 'enable_chat_gpt', 'test_without_key', 'chat_gpt_key', 'force_update_user_app', 'user_app_minimum_version', 'user_app_latest_version',
                            'force_update_provider_app', 'provider_app_minimum_version', 'provider_app_latest_version', 'force_update_admin_app', 'admin_app_minimum_version', 'admin_app_latest_version',
                            'firebase_notification', 'firebase_key'
                        ];
                    }

                    foreach ($keys as $key) {
                        $othersetting[$key] = $decodedata->$key;
                    }
                }
                $data = view('setting.' . $page, compact('page', 'othersetting'))->render();
                break;
            case 'notification-templates':

                $module_action = 'List';

                $filter = [
                    'status' => request()->status,
                ];

                $pageTitle = trans('messages.notification_templates');


                $data = view('setting.' . $page, compact('page', 'module_action', 'filter', 'pageTitle'))->render();
                break;
            case 'earning-setting':
                $earningsetting   = Setting::where('type', '=', 'earning-setting')->first();

                $data  = view('setting.' . $page, compact('earningsetting', 'page'))->render();
                break;
            default:
                $data  = view('setting.' . $page, compact('settings', 'page', 'envSettting'))->render();
                break;
        }

        return response()->json($data);
    }


    public function envChanges(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $auth_user = authSession();
        $page = $request->page;
        $env = $request->ENV;
        $envtype = $request->type;

        foreach ($env as $key => $value) {
            envChanges($key, str_replace('#', '', $value));
        }
        \Artisan::call('cache:clear');
        return redirect()->route('setting.index', ['page' => $page])->withSuccess(ucfirst($envtype) . ' ' . __('messages.updated'));
    }

    public function updateProfile(UserRequest $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $user = \Auth::user();
        $page = $request->page;

        $data = $request->all();

        $why_choose_me = [

            'title' => $request->title,
            'about_description' => $request->about_description,
            'reason' => isset($request->reason) ? array_filter($request->reason, function ($value) {
                return $value !== null;
            }) : null,

        ];

        $data['why_choose_me'] = json_encode($why_choose_me);

        $user->fill($data)->update();
        storeMediaFile($user, $request->profile_image, 'profile_image');

        return redirect()->route('setting.index', ['page' => 'profile_form'])->withSuccess(__('messages.profile') . ' ' . __('messages.updated'));
    }

    public function changePassword(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $user = User::where('id', \Auth::user()->id)->first();

        if ($user == "") {
            $message = __('messages.user_not_found');
            return comman_message_response($message, 400);
        }

        $validator = \Validator::make($request->all(), [
            'old' => 'required|min:8|max:255',
            'password' => 'required|min:8|confirmed|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('setting.index', ['page' => 'password_form'])->with('errors', $validator->errors());
        }

        $hashedPassword = $user->password;

        $match = Hash::check($request->old, $hashedPassword);

        $same_exits = Hash::check($request->password, $hashedPassword);
        if ($match) {
            if ($same_exits) {
                $message = __('messages.old_new_pass_same');
                return redirect()->route('setting.index', ['page' => 'password_form'])->with('error', $message);
            }

            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
            \Auth::logout();
            $message = __('messages.password_change');
            return redirect()->route('setting.index', ['page' => 'password_form'])->withSuccess($message);
        } else {
            $message = __('messages.valid_password');
            return redirect()->route('setting.index', ['page' => 'password_form'])->with('error', $message);
        }
    }

    public function termAndCondition(Request $request)
    {
        $setting_data = Setting::where('type', 'terms_condition')->where('key', 'terms_condition')->first();
        $pageTitle = __('messages.terms_condition');
        $assets = ['textarea'];
        return view('setting.term_condition_form', compact('setting_data', 'pageTitle', 'assets'));
    }

    public function saveTermAndCondition(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $setting_data = [
            'type'  => 'terms_condition',
            'key'   =>  'terms_condition',
            'value' =>  $request->value
        ];
        $result = Setting::updateOrCreate(['id' => $request->id], $setting_data);
        if ($result->wasRecentlyCreated) {
            $message = __('messages.save_form', ['form' => __('messages.terms_condition')]);
        } else {
            $message = __('messages.update_form', ['form' => __('messages.terms_condition')]);
        }

        return redirect()->route('term-condition')->withsuccess($message);
    }

    public function privacyPolicy(Request $request)
    {
        $setting_data = Setting::where('type', 'privacy_policy')->where('key', 'privacy_policy')->first();
        $pageTitle = __('messages.privacy_policy');
        $assets = ['textarea'];

        return view('setting.privacy_policy_form', compact('setting_data', 'pageTitle', 'assets'));
    }

    public function savePrivacyPolicy(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $setting_data = [
            'type'   => 'privacy_policy',
            'key'   =>  'privacy_policy',
            'value' =>  $request->value
        ];
        $result = Setting::updateOrCreate(['id' => $request->id], $setting_data);
        if ($result->wasRecentlyCreated) {
            $message = __('messages.save_form', ['form' => __('messages.privacy_policy')]);
        } else {
            $message = __('messages.update_form', ['form' => __('messages.privacy_policy')]);
        }

        return redirect()->route('privacy-policy')->withsuccess($message);
    }

    public function helpAndSupport(Request $request)
    {
        $setting_data = Setting::where('type', 'help_support')->where('key', 'help_support')->first();
        $pageTitle = __('messages.help_support');
        $assets = ['textarea'];
        return view('setting.help_support_form', compact('setting_data', 'pageTitle', 'assets'));
    }

    public function saveHelpAndSupport(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $setting_data = [
            'type'  => 'help_support',
            'key'   =>  'help_support',
            'value' =>  $request->value
        ];
        $result = Setting::updateOrCreate(['id' => $request->id], $setting_data);
        if ($result->wasRecentlyCreated) {
            $message = __('messages.save_form', ['form' => __('messages.help_support')]);
        } else {
            $message = __('messages.update_form', ['form' => __('messages.help_support')]);
        }

        return redirect()->route('help-support')->withsuccess($message);
    }

    public function refundCancellationPolicy(Request $request)
    {
        $setting_data = Setting::where('type', 'refund_cancellation_policy')->where('key', 'refund_cancellation_policy')->first();
        $pageTitle = __('messages.refund_cancellation_policy');
        $assets = ['textarea'];
        return view('setting.refund_cancellation_policy_form', compact('setting_data', 'pageTitle', 'assets'));
    }

    public function saveRefundCancellationPolicy(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $setting_data = [
            'type'  => 'refund_cancellation_policy',
            'key'   =>  'refund_cancellation_policy',
            'value' =>  $request->value
        ];
        $result = Setting::updateOrCreate(['id' => $request->id], $setting_data);
        if ($result->wasRecentlyCreated) {
            $message = __('messages.save_form', ['form' => __('messages.refund_cancellation_policy')]);
        } else {
            $message = __('messages.update_form', ['form' => __('messages.refund_cancellation_policy')]);
        }

        return redirect()->route('refund-cancellation-policy')->withsuccess($message);
    }

    public function dataDeletion(Request $request)
    {
        $setting_data = Setting::where('type', 'data_deletion_request')->where('key', 'data_deletion_request')->first();
        $pageTitle = __('messages.data_deletion_request');
        $assets = ['textarea'];

        return view('setting.data_deletion_form', compact('setting_data', 'pageTitle', 'assets'));
    }

    public function saveDataDeletion(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $setting_data = [
            'type'   => 'data_deletion_request',
            'key'   =>  'data_deletion_request',
            'value' =>  $request->value
        ];
        $result = Setting::updateOrCreate(['id' => $request->id], $setting_data);
        if ($result->wasRecentlyCreated) {
            $message = __('messages.save_form', ['form' => __('messages.data_deletion_request')]);
        } else {
            $message = __('messages.update_form', ['form' => __('messages.data_deletion_request')]);
        }

        return redirect()->route('data-deletion-request')->withsuccess($message);
    }

    public function sendPushNotification(Request $request)
    {
        $data = $request->all();

        if ($data['type'] === 'alldata') {
            $data['service_id'] = 0;
        }
        if (!empty($data['is_type']) && $data['is_type'] == 'provider') {
            $data['type'] = 0;
            $data['service_id'] = 0;
        }

        $heading      = array(
            "en" => $data['title']
        );
        $content      = array(
            "en" => $data['description']
        );
        $othersetting = \App\Models\Setting::where('type', 'OTHER_SETTING')->first();

        $decodedata = json_decode($othersetting['value']);

        $notification_type = isset($decodedata->firebase_notification) ? 1 : 0;

        if ($notification_type == 1) {

            $apiKey = isset($decodedata->firebase_key) ? $decodedata->firebase_key : null;

            $apiUrl = 'https://fcm.googleapis.com/fcm/send';
            $apiKey = $apiKey;

            $headers = [
                'Authorization: key=' . $apiKey,
                'Content-Type: application/json',
            ];


            if (!empty($data['is_type']) && $data['is_type'] == 'provider') {

                $firebase_data = [
                    'to' => '/topics/providerApp',
                    'collapse_key' => 'type_a',
                    'notification' => [
                        'title' => $heading['en'],
                        'body' => $content['en'],
                    ],
                    'data' => [
                        'type' => $data['type'],
                        'service_id' => $data['service_id']
                    ],
                ];
            } else {

                $firebase_data = [
                    'to' => '/topics/userApp',
                    'collapse_key' => 'type_a',
                    'notification' => [
                        'title' => $heading['en'],
                        'body' => $content['en'],
                    ],
                    'data' => [
                        'type' => $data['type'],
                        'service_id' => $data['service_id']
                    ],
                ];
            }

            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($firebase_data));

            $response = curl_exec($ch);

            curl_close($ch);
        }

        if ($response) {
            $message = trans('messages.update_form', ['form' => trans('messages.pushnotification_settings')]);
        } else {
            $message = trans('messages.failed');
        }
        if (request()->is('api/*')) {
            return comman_message_response($message);
        }
        return redirect()->route('pushNotification.index')->withSuccess($message);
    }
    public function saveEarningTypeSetting(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();
        $page = $request->page;
        $message = trans('messages.failed');
        if ($request->earning_type == 'subscription') {
            $data['value'] = 'subscription';
        } else {
            $data['value'] = 'commission';
        }


        $data = [
            'type'  => 'earning-setting',
            'key'   => 'earning-setting',
            'value' => $data['value'],
        ];

        $res = Setting::updateOrCreate(['type' => 'earning-setting', 'key' => 'earning-setting'], $data);
        if ($res) {
            $message = trans('messages.update_form', ['form' => trans('messages.earning_setting')]);
        }
        return redirect()->route('setting.index', ['page' => $page])->withSuccess($message);
    }
    public function comission($id)
    {
        $auth_user = authSession();
        $providerdata = User::with('providertype')->where('user_type', 'provider')->where('id', $id)->first();
        if (empty($providerdata)) {
            $msg = __('messages.not_found_entry', ['name' => __('messages.provider')]);
            return redirect(route('provider.index'))->withError($msg);
        }
        $pageTitle = __('messages.view_form_title', ['form' => __('messages.provider')]);
        return view('setting.comission', compact('pageTitle', 'providerdata', 'auth_user'));
    }


    public function otherSetting(Request $request)
    {
        $data = $request->all();
        $page = $request->type;
        $message = trans('messages.failed');
        $other_setting_data = [
            'social_login' => (isset($data['social_login']) && $data['social_login'] == 'on') ? 1 : 0,
            'google_login' => (isset($data['google_login']) && $data['google_login'] == 'on') ? 1 : 0,
            'apple_login' => (isset($data['apple_login']) && $data['apple_login'] == 'on') ? 1 : 0,
            'otp_login' => (isset($data['otp_login']) && $data['otp_login'] == 'on') ? 1 : 0,
            'online_payment' => (isset($data['online_payment']) && $data['online_payment'] == 'on') ? 1 : 0,
            'blog' => (isset($data['blog']) && $data['blog'] == 'on') ? 1 : 0,
            'maintenance_mode' => (isset($data['maintenance_mode']) && $data['maintenance_mode'] == 'on') ? 1 : 0,
            'advanced_payment_setting' => (isset($data['advanced_payment_setting']) && $data['advanced_payment_setting'] == 'on') ? 1 : 0,
            'wallet' => (isset($data['wallet']) && $data['wallet'] == 'on') ? 1 : 0,
            'enable_chat_gpt' => (isset($data['enable_chat_gpt']) && $data['enable_chat_gpt'] == 'on') ? 1 : 0,
            'test_without_key' => (isset($data['test_without_key']) && $data['test_without_key'] == 'on') ? 1 : 0,
            'chat_gpt_key' => (isset($data['chat_gpt_key'])) ? $data['chat_gpt_key'] : null,
            'force_update_user_app' => (isset($data['force_update_user_app']) && $data['force_update_user_app'] == 'on') ? 1 : 0,
            'user_app_minimum_version' => (isset($data['user_app_minimum_version'])) ? (int)$data['user_app_minimum_version'] : null,
            'user_app_latest_version' => (isset($data['user_app_latest_version'])) ? (int)$data['user_app_latest_version'] : null,
            'force_update_provider_app' => (isset($data['force_update_provider_app']) && $data['force_update_provider_app'] == 'on') ? 1 : 0,
            'provider_app_minimum_version' => (isset($data['provider_app_minimum_version'])) ? (int)$data['provider_app_minimum_version'] : null,
            'provider_app_latest_version' => (isset($data['provider_app_latest_version'])) ? (int)$data['provider_app_latest_version'] : null,
            'force_update_admin_app' => (isset($data['force_update_admin_app']) && $data['force_update_admin_app'] == 'on') ? 1 : 0,
            'admin_app_minimum_version' => (isset($data['admin_app_minimum_version'])) ? (int)$data['admin_app_minimum_version'] : null,
            'admin_app_latest_version' => (isset($data['admin_app_latest_version'])) ? (int)$data['admin_app_latest_version'] : null,
            'firebase_notification' => (isset($data['firebase_notification']) && $data['firebase_notification'] == 'on') ? 1 : 0,
            'firebase_key' => (isset($data['firebase_key'])) ? $data['firebase_key'] : null,
            'auto_assign_provider' => (isset($data['auto_assign_provider']) && $data['auto_assign_provider'] == 'on') ? 1 : 0,
        ];


        $data = [
            'type'  => 'OTHER_SETTING',
            'key'   => 'OTHER_SETTING',
            'value' => json_encode($other_setting_data),
        ];

        $res = Setting::updateOrCreate(['type' => 'OTHER_SETTING', 'key' => 'OTHER_SETTING'], $data);

        if ($res) {
            $message = trans('messages.update_form', ['form' => trans('messages.other_setting')]);
        }

        return redirect()->route('setting.index', ['page' => $page])->withSuccess($message);
    }


    public function generalSetting(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $auth_user = authSession();

        $data = $request->all();
        $page = $request->page;
        $generalsetting = [
            'site_name' => (isset($data['site_name'])) ? $data['site_name'] : null,
            'site_description' => (isset($data['site_description'])) ? $data['site_description'] : null,
            'inquriy_email' => (isset($data['inquriy_email'])) ? $data['inquriy_email'] : null,
            'helpline_number' => (isset($data['helpline_number'])) ? $data['helpline_number'] : null,
            'website' => (isset($data['website'])) ? $data['website'] : null,
            'country_id' => isset($data['country_id']) ? $data['country_id'] : null,
            'state_id' => isset($data['state_id']) ? $data['state_id'] : null,
            'city_id' => isset($data['city_id']) ? $data['city_id'] : null,
            'zipcode' => (isset($data['zipcode'])) ? $data['zipcode'] : null,
            'address' => (isset($data['address'])) ? $data['address'] : null,

        ];

        $res = Setting::updateOrCreate(
            ['id' => $request->id],
            ['type' => 'general-setting', 'key' => 'general-setting', 'value' => json_encode($generalsetting)]
        );
        $resdata = $res ? json_decode($res->value, true) : [];
        $type = 'APP_NAME';
        $env = $request->ENV;
        $env['APP_NAME'] = $resdata['site_name'];
        foreach ($env as $key => $value) {
            envChanges($key, $value);
        }

        if ($res) {
            $message = trans('messages.update_form', ['form' => trans('messages.general_settings')]);
        }

        return redirect()->route('setting.index', ['page' => $page])->withSuccess($message);
    }

    public function themeSetup(Request $request)
    {
        if (demoUserPermission()) {
            return redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }

        $auth_user = authSession();
        $data = $request->all();
        $page = $request->page;
        $setting = Setting::updateOrCreate(
            ['id' => $request->id],
            ['type' => 'theme-setup', 'key' => 'theme-setup', 'value' => Null]
        );

        storeMediaFile($setting, $request->logo, 'logo');
        storeMediaFile($setting, $request->favicon, 'favicon');
        storeMediaFile($setting, $request->footer_logo, 'footer_logo');
        storeMediaFile($setting, $request->loader, 'loader');
        imageSession('set');
        $message = trans('messages.update_form', ['form' => trans('messages.theme_setup')]);

        return redirect()->route('setting.index', ['page' => $page])->withSuccess($message);
    }


    public function siteSetup(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $auth_user = authSession();

        $data = $request->all();

        createLangFile($request->language_option);
        deleteLangFile($request->language_option);

        $page = $request->page;
        $sitesetup = [
            'date_format' => (isset($data['date_format'])) ? $data['date_format'] : null,
            'time_format' => (isset($data['time_format'])) ? $data['time_format'] : null,
            'time_zone' => (isset($data['time_zone'])) ? $data['time_zone'] : null,
            'language_option' => (isset($data['language_option'])) ? $data['language_option'] : [],
            'default_currency' => isset($data['default_currency']) ? $data['default_currency'] : null,
            'currency_position' => isset($data['currency_position']) ? $data['currency_position'] : null,
            'google_map_keys' => (isset($data['google_map_keys'])) ? $data['google_map_keys'] : null,
            'latitude' => (isset($data['latitude'])) ? $data['latitude'] : null,
            'longitude' => (isset($data['longitude'])) ? $data['longitude'] : null,
            'distance_type' => (isset($data['distance_type'])) ? $data['distance_type'] : null,
            'radious' => (isset($data['radious'])) ? $data['radious'] : null,
            'digitafter_decimal_point' => (isset($data['digitafter_decimal_point'])) ? $data['digitafter_decimal_point'] : null,
            'android_app_links' => (isset($data['android_app_links']) && $data['android_app_links'] == 'on') ? 1 : 0,
            'playstore_url' => (isset($data['playstore_url'])) ? $data['playstore_url'] : null,
            'provider_playstore_url' => (isset($data['provider_playstore_url'])) ? $data['provider_playstore_url'] : null,
            'ios_app_links' => (isset($data['ios_app_links']) && $data['ios_app_links'] == 'on') ? 1 : 0,
            'appstore_url' => (isset($data['appstore_url'])) ? $data['appstore_url'] : null,
            'provider_appstore_url' => (isset($data['provider_appstore_url'])) ? $data['provider_appstore_url'] : null,
            'site_copyright' => (isset($data['site_copyright'])) ? $data['site_copyright'] : null,

        ];
        if (isset($data['time_zone'])) {
            AppSetting::updateOrCreate([], ['time_zone' => $data['time_zone']]);
        }
        $res = Setting::updateOrCreate(
            ['id' => $request->id],
            ['type' => 'site-setup', 'key' => 'site-setup', 'value' => json_encode($sitesetup)]
        );

        \Artisan::call('cache:clear');
        sitesetupSession('set');

        if ($res) {
            $message = trans('messages.update_form', ['form' => trans('messages.site_setup')]);
        }

        return redirect()->route('setting.index', ['page' => $page])->withSuccess($message);
    }
    public function serviceConfig(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $auth_user = authSession();

        $data = $request->all();

        $page = $request->type;

        $serviceconfig = [
            'advance_payment' => (isset($data['advance_payment']) && $data['advance_payment'] == 'on') ? 1 : 0,
            'slot_service' => (isset($data['slot_service']) && $data['slot_service'] == 'on') ? 1 : 0,
            'digital_services' => (isset($data['digital_services']) && $data['digital_services'] == 'on') ? 1 : 0,
            'service_packages' => (isset($data['service_packages']) && $data['service_packages'] == 'on') ? 1 : 0,
            'service_addons' => (isset($data['service_addons']) && $data['service_addons'] == 'on') ? 1 : 0,
            'post_services' => (isset($data['post_services']) && $data['post_services'] == 'on') ? 1 : 0,
        ];

        $res = Setting::updateOrCreate(
            ['id' => $request->id],
            ['type' => 'service-configurations', 'key' => 'service-configurations', 'value' => json_encode($serviceconfig)]
        );


        if ($res) {
            $message = trans('messages.update_form', ['form' => trans('messages.service_configurations')]);
        }

        return redirect()->route('setting.index', ['page' => $page])->withSuccess($message);
    }
    public function socialMedia(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $auth_user = authSession();

        $data = $request->all();
        $page = $request->page;

        $socialmedia = [
            'facebook_url' => (isset($data['facebook_url'])) ? $data['facebook_url'] : null,
            'twitter_url' => (isset($data['twitter_url'])) ? $data['twitter_url'] : null,
            'linkedin_url' => (isset($data['linkedin_url'])) ? $data['linkedin_url'] : null,
            'instagram_url' => (isset($data['instagram_url'])) ? $data['instagram_url'] : null,
            'youtube_url' => (isset($data['youtube_url'])) ? $data['youtube_url'] : null,
        ];

        $res = Setting::updateOrCreate(
            ['id' => $request->id],
            ['type' => 'social-media', 'key' => 'social-media', 'value' => json_encode($socialmedia)]
        );


        if ($res) {
            $message = trans('messages.update_form', ['form' => trans('messages.social_media')]);
        }

        return redirect()->route('setting.index', ['page' => $page])->withSuccess($message);
    }
    public function cookieSetup(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $auth_user = authSession();

        $data = $request->all();
        $page = $request->page;
        $generalsetting = [
            'title' => (isset($data['title'])) ? $data['title'] : null,
            'description' => (isset($data['description'])) ? $data['description'] : null,
        ];

        $res = Setting::updateOrCreate(
            ['id' => $request->id],
            ['type' => 'cookie-setup', 'key' => 'cookie-setup', 'value' => json_encode($generalsetting)]
        );


        if ($res) {
            $message = trans('messages.update_form', ['form' => trans('messages.cookie_setup')]);
        }

        return redirect()->route('setting.index', ['page' => $page])->withSuccess($message);
    }
    public function PushNotification(Request $request)
    {
        $pageTitle = (__('messages.pushnotification_settings'));
        $settings = AppSetting::first();
        $settings = [];
        $services = Service::pluck('name', 'id');
        return view('setting.push-notification-setting', compact('settings', 'pageTitle', 'services'))->render();
    }
}
