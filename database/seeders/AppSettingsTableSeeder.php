<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('app_settings')->delete();
        
        \DB::table('app_settings')->insert(array (
            0 => 
            array (
                'earning_type' => NULL,
                'facebook_url' => 'https://www.facebook.com/iqonicdesign/',
                'helpline_number' => '+15265897485',
                'id' => 1,
                'inquriy_email' => 'hello@iqonic.design',
                'instagram_url' => 'https://www.instagram.com/iqonicdesign/?igshid=YmMyMTA2M2Y%3D',
                'language_option' => '["nl","fr","it","pt","es","en"]',
                'linkedin_url' => 'https://www.linkedin.com/company/iqonicthemes/',
                'remember_token' => NULL,
                'site_copyright' => '© 2024 All Rights Reserved by IQONIC Design',
                'site_description' => 'Launch your own mobile-based online On-Demand Home Services with Handyman Service mobile app. The customizable templates of this amazing app can quickly let developers to set up a service booking system to accept bookings from clients from anywhere in only a few minutes. With ready to use Sign in page, Sign up pages, Payment methods page, Booking lists, Service Type demo, Handyman detail page, Coupon page, and more, this Handyman Service app allows business to have a complete and running booking service system app in no time.
The provider in this Handyman Service app can assign the booking to Handyman and accelerate the service. This Handyman Service system app comes with a Laravel PHP admin panel to have a meaningful insights from the admin dashboard and statistics. Assign multi-roles and permissions like Admin, Service Provider, Handyman, and customers using this app. Additionally, this Handyman Service app supports Multiple Language/ RTL support. This customizable, ready-to-use app comes with light as well as dark theme support and push notification to engage with clients in a more interactive way.',
                'site_email' => NULL,
                'site_favicon' => NULL,
                'site_logo' => '/tmp/phplwW9Vi',
                'site_name' => 'Handyman Service',
                'time_zone' => 'Asia/Kolkata',
                'twitter_url' => 'https://twitter.com/iqonicdesign',
                'youtube_url' => 'https://www.youtube.com/iqonicdesign',
            ),
        ));
        
        
    }
}