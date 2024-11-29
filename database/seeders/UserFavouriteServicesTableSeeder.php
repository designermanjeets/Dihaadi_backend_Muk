<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserFavouriteServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_favourite_services')->delete();
        
        \DB::table('user_favourite_services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'service_id' => 87,
                'user_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-02-05 04:10:14',
                'updated_at' => '2024-02-05 04:10:14',
            ),
            1 => 
            array (
                'id' => 2,
                'service_id' => 79,
                'user_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-02-05 04:12:50',
                'updated_at' => '2024-02-05 04:12:50',
            ),
            2 => 
            array (
                'id' => 3,
                'service_id' => 105,
                'user_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-02-05 04:13:28',
                'updated_at' => '2024-02-05 04:13:28',
            ),
            3 => 
            array (
                'id' => 4,
                'service_id' => 110,
                'user_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-02-05 04:13:36',
                'updated_at' => '2024-02-05 04:13:36',
            ),
            4 => 
            array (
                'id' => 5,
                'service_id' => 99,
                'user_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-02-05 04:13:48',
                'updated_at' => '2024-02-05 04:13:48',
            ),
            5 => 
            array (
                'id' => 6,
                'service_id' => 77,
                'user_id' => 37,
                'deleted_at' => NULL,
                'created_at' => '2024-02-05 04:15:10',
                'updated_at' => '2024-02-05 04:15:10',
            ),
            6 => 
            array (
                'id' => 7,
                'service_id' => 83,
                'user_id' => 37,
                'deleted_at' => NULL,
                'created_at' => '2024-02-05 04:15:31',
                'updated_at' => '2024-02-05 04:15:31',
            ),
            7 => 
            array (
                'id' => 8,
                'service_id' => 57,
                'user_id' => 42,
                'deleted_at' => NULL,
                'created_at' => '2024-02-05 04:16:43',
                'updated_at' => '2024-02-05 04:16:43',
            ),
            8 => 
            array (
                'id' => 9,
                'service_id' => 61,
                'user_id' => 42,
                'deleted_at' => NULL,
                'created_at' => '2024-02-05 04:16:58',
                'updated_at' => '2024-02-05 04:16:58',
            ),
        ));
        
        
    }
}