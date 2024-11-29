<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use App\Models\AppSetting;
use App\Models\AppDownload;

class AlterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $appSettingsData = [];
        $socialMediaData = [];
        $earningData = [];

        $siteSetupData = [
            'type' => 'site-setup',
            'key' => 'site-setup',
            'value' => [],
        ];

        $appsettings = AppSetting::all();
        foreach ($appsettings as $appsetting) {
            if(!empty($appsetting)){

                $appSettingsData[] = [
                    'type' => 'general-setting',
                    'key' => 'general-setting',
                    'value' => [
                        'site_name' => $appsetting->site_name ?? "Handyman Service",
                        'site_description' => $appsetting->site_description ?? "Launch your own mobile-based online On-Demand Home Services with Handyman Service mobile app. The customizable templates of this amazing app can quickly let developers set up a service booking system to accept bookings from clients from anywhere in only a few minutes. With ready-to-use Sign-in page, Sign-up pages, Payment methods page, Booking lists, Service Type demo, Handyman detail page, Coupon page, and more, this Handyman Service app allows businesses to have a complete and running booking service system app in no time. The provider in this Handyman Service app can assign the booking to Handyman and accelerate the service. This Handyman Service system app comes with a Laravel PHP admin panel to have meaningful insights from the admin dashboard and statistics. Assign multi-roles and permissions like Admin, Service Provider, Handyman, and customers using this app. Additionally, this Handyman Service app supports Multiple Language/ RTL support. This customizable, ready-to-use app comes with light as well as dark theme support and push notification to engage with clients in a more interactive way.",
                        'inquriy_email' => $appsetting->inquriy_email ?? "hello@iqonic.design",
                        'helpline_number' => $appsetting->helpline_number ?? "+15265897485",
                        'website' => $appsetting->website ?? null,
                        'country_id' => $appsetting->country_id ?? "231",
                        'state_id' => $appsetting->state_id ?? "3956",
                        'city_id' => $appsetting->city_id ?? "47855",
                        'zipcode' => $appsetting->zipcode ?? "12201",
                        'address' => $appsetting->address ?? "45 HUDSON AVE UNIT 1296 ALBANY NY 12201-6256 USA",
                    ],
                ];




                $socialMediaData[] = [
                    'type' => 'social-media',
                    'key' => 'social-media',
                    'value' => [
                        'facebook_url' => $appsetting->facebook_url ?? "https://www.facebook.com/iqonicdesign/",
                        'instagram_url' => $appsetting->instagram_url ?? "https://www.instagram.com/iqonicdesign/?igshid=YmMyMTA2M2Y%3D",
                        'twitter_url' => $appsetting->twitter_url ?? "https://twitter.com/iqonicdesign",
                        'linkedin_url' => $appsetting->linkedin_url ?? "https://www.linkedin.com/company/iqonicthemes/",
                        'youtube_url' => $appsetting->youtube_url ?? "https://www.youtube.com/iqonicdesign",
                    ],
                ];

                $earningData[] = [
                    'type' => 'earning-setting',
                    'key' => 'earning-setting',
                    'value' => $appsetting->earning_type ?? 'commission',
                ];



                $siteSetupData['value'] = [
                    'date_format' => $appsetting->date_format ?? "F j, Y",
                    'time_format' => $appsetting->time_format ?? "g:i A",
                    'time_zone' => $appsetting->time_zone ?? "Asia/Kolkata",
                    'language_option' => $appsetting->language_option ?? ["nl", "fr", "it", "pt", "es", "en"],
                    'default_currency' => $appsetting->default_currency ?? "231",
                    'currency_position' => $appsetting->currency_position ?? "left",
                    'google_map_keys' => $appsetting->google_map_keys ?? "AIzaSyCtTed7y_ePqg1QoDMHOyu01FtP_Ot-mDU",
                    'latitude' => $appsetting->latitude ?? null,
                    'longitude' => $appsetting->longitude ?? null,
                    'distance_type' => $appsetting->distance_type ?? "km",
                    'radious' => $appsetting->radious ?? "50",
                    'digitafter_decimal_point' => $appsetting->digitafter_decimal_point ?? "2",
                    'android_app_links' => $appsetting->android_app_links ?? 0,
                    'playstore_url' => $appsetting->playstore_url ?? "https://play.google.com/store/apps/details?id=com.iqonic.servicebooking",
                    'provider_playstore_url' => $appsetting->provider_playstore_url ?? "https://play.google.com/store/apps/details?id=com.iqonic.provider",
                    'ios_app_links' => $appsetting->ios_app_links ?? 0,
                    'appstore_url' => $appsetting->appstore_url ?? "https://apps.apple.com/us/app/handyman-service-user/id1591427211",
                    'provider_appstore_url' => $appsetting->provider_appstore_url ?? "https://apps.apple.com/in/app/handyman-provider-app/id1596025324",
                    'site_copyright' => $appsetting->site_copyright ?? "© 2024 All Rights Reserved by IQONIC Design",
                ];
            }
        }

        $appdownloads = AppDownload::all();
        foreach ($appdownloads as $appdownload) {
            if (!empty($appdownload)) {
                $siteSetupData['value']['playstore_url'] = $appdownload->playstore_url ?? "https://play.google.com/store/apps/details?id=com.iqonic.servicebooking";
                $siteSetupData['value']['provider_playstore_url'] = $appdownload->provider_playstore_url ?? "https://play.google.com/store/apps/details?id=com.iqonic.provider";
                $siteSetupData['value']['appstore_url'] = $appdownload->appstore_url ?? "https://apps.apple.com/us/app/handyman-service-user/id1591427211";
                $siteSetupData['value']['provider_appstore_url'] = $appdownload->provider_appstore_url ?? "https://apps.apple.com/in/app/handyman-provider-app/id1596025324";

            }
        }

        $settings = Setting::all();
        foreach ($settings as $setting) {

            if ($setting->key == 'CURRENCY_COUNTRY_ID') {
                $siteSetupData['value']['default_currency'] = $setting->value ?? "231";
            }

            if ($setting->key == 'CURRENCY_POSITION') {
                $siteSetupData['value']['currency_position'] = $setting->value ?? "left";
            }

            if ($setting->key == 'DISTANCE_TYPE') {
                $siteSetupData['value']['distance_type'] = $setting->value ?? "km";
            }

            if ($setting->key == 'DISTANCE_RADIOUS') {
                $siteSetupData['value']['radious'] = $setting->value ?? "50";
            }

            if ($setting->key == 'GOOGLE_MAP_KEY') {
                $siteSetupData['value']['google_map_keys'] = $setting->value ?? "AIzaSyCtTed7y_ePqg1QoDMHOyu01FtP_Ot-mDU";
            }
            if ($setting->key == 'OTHER_SETTING') {
                $setting->update([
                    'value' => '{"social_login":1,"google_login":1,"apple_login":1,"otp_login":1,"online_payment":1,"blog":1,"maintenance_mode":0, "advanced_payment_setting":1,"wallet":1,"enable_chat_gpt":1,"test_without_key":1,"chat_gpt_key":null,"force_update_user_app":0,"user_app_minimum_version":null,"user_app_latest_version":null,"force_update_provider_app":0,"provider_app_minimum_version":null,"provider_app_latest_version":null,"force_update_admin_app":0,"admin_app_minimum_version":null,"admin_app_latest_version":null,"firebase_notification":1,"firebase_key":"Firebase Key","auto_assign_provider":0}',
                ]);
            }
            else{
                Setting::firstOrCreate([
                    'type' => 'OTHER_SETTING',
                    'key' => 'OTHER_SETTING',
                ], [
                    'value' =>  '{"social_login":1,"google_login":1,"apple_login":1,"otp_login":1,"online_payment":1,"blog":1,"maintenance_mode":0, "advanced_payment_setting":1,"wallet":1,"enable_chat_gpt":1,"test_without_key":1,"chat_gpt_key":null,"force_update_user_app":0,"user_app_minimum_version":null,"user_app_latest_version":null,"force_update_provider_app":0,"provider_app_minimum_version":null,"provider_app_latest_version":null,"force_update_admin_app":0,"admin_app_minimum_version":null,"admin_app_latest_version":null,"firebase_notification":1,"firebase_key":"Firebase Key","auto_assign_provider":0}',
                ]);
            }
            if ($setting->key != 'service-configurations') {
                Setting::firstOrCreate([
                    'type' => 'service-configurations',
                    'key' => 'service-configurations',
                ], [
                    'value' => '{"advance_payment":1,"slot_service":1,"digital_services":1,"service_packages":1,"service_addons":1,"post_services":1}',
                ]);
            }
            if ($setting->key != 'cookie-setup') {
                Setting::firstOrCreate([
                    'type' => 'cookie-setup',
                    'key' => 'cookie-setup',
                ], [
                    'value' => '{"title":"Cookie Notice","description":"We use cookies for better browsing, personalized content, and traffic analysis. Click `Accept All` to consent."}',
                ]);
            }
        }

        $mergedData = array_merge($appSettingsData, $socialMediaData,$earningData, [$siteSetupData]);

        foreach ($mergedData as $data) {
            $existingSetting = Setting::where('type', $data['type'])->where('key', $data['key'])->first();
            if ($existingSetting) {
                $existingSetting->update(['value' => json_encode($data['value'])]);
            } else {
                Setting::create([
                    'type' => $data['type'],
                    'key' => $data['key'],
                    'value' => json_encode($data['value']),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // You can add rollback logic if needed
    }
}
