<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostJobServiceMappingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_job_service_mappings')->delete();
        
        \DB::table('post_job_service_mappings')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 1,
                'post_request_id' => 1,
                'service_id' => 111,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 2,
                'post_request_id' => 2,
                'service_id' => 112,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 3,
                'post_request_id' => 3,
                'service_id' => 114,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 4,
                'post_request_id' => 4,
                'service_id' => 115,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 5,
                'post_request_id' => 5,
                'service_id' => 116,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 6,
                'post_request_id' => 6,
                'service_id' => 117,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 7,
                'post_request_id' => 7,
                'service_id' => 119,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 9,
                'post_request_id' => 9,
                'service_id' => 120,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 10,
                'post_request_id' => 10,
                'service_id' => 122,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}