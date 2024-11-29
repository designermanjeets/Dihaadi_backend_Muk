<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppDownloadsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('app_downloads')->delete();
        
        \DB::table('app_downloads')->insert(array (
            0 => 
            array (
                'appstore_url' => 'https://apps.apple.com/us/app/handyman-service-user/id1591427211',
                'created_at' => '2023-10-12 11:43:01',
                'description' => NULL,
                'id' => 1,
                'playstore_url' => 'https://play.google.com/store/apps/details?id=com.iqonic.servicebooking',
                'provider_appstore_url' => 'https://apps.apple.com/in/app/handyman-provider-app/id1596025324',
                'provider_playstore_url' => 'https://play.google.com/store/apps/details?id=com.iqonic.provider',
                'title' => 'Play Store And App Store Url',
                'updated_at' => '2023-10-12 11:43:01',
            ),
        ));
        
        
    }
}