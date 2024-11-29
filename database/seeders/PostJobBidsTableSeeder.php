<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostJobBidsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_job_bids')->delete();
        
        \DB::table('post_job_bids')->insert(array (
            0 => 
            array (
                'created_at' => '2023-10-06 06:57:46',
                'customer_id' => 3,
                'duration' => NULL,
                'id' => 1,
                'post_request_id' => 9,
                'price' => 25.0,
                'provider_id' => 4,
                'status' => 1,
                'updated_at' => '2023-10-06 06:57:46',
            ),
        ));
        
        
    }
}