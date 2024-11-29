<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserFavouriteProvidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_favourite_providers')->delete();
        
        \DB::table('user_favourite_providers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'provider_id' => 17,
                'user_id' => 3,
                'created_at' => '2024-02-05 05:38:49',
                'updated_at' => '2024-02-05 05:38:49',
            ),
            1 => 
            array (
                'id' => 2,
                'provider_id' => 16,
                'user_id' => 3,
                'created_at' => '2024-02-05 05:39:02',
                'updated_at' => '2024-02-05 05:39:02',
            ),
            2 => 
            array (
                'id' => 3,
                'provider_id' => 14,
                'user_id' => 3,
                'created_at' => '2024-02-05 05:39:58',
                'updated_at' => '2024-02-05 05:39:58',
            ),
            3 => 
            array (
                'id' => 4,
                'provider_id' => 13,
                'user_id' => 3,
                'created_at' => '2024-02-05 05:41:27',
                'updated_at' => '2024-02-05 05:41:27',
            ),
            4 => 
            array (
                'id' => 5,
                'provider_id' => 12,
                'user_id' => 3,
                'created_at' => '2024-02-05 05:42:04',
                'updated_at' => '2024-02-05 05:42:04',
            ),
            5 => 
            array (
                'id' => 6,
                'provider_id' => 4,
                'user_id' => 37,
                'created_at' => '2024-02-05 05:43:13',
                'updated_at' => '2024-02-05 05:43:13',
            ),
            6 => 
            array (
                'id' => 7,
                'provider_id' => 7,
                'user_id' => 37,
                'created_at' => '2024-02-05 05:43:42',
                'updated_at' => '2024-02-05 05:43:42',
            ),
        ));
        
        
    }
}