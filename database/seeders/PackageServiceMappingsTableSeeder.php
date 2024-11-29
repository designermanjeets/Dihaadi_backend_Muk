<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackageServiceMappingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('package_service_mappings')->delete();
        
        \DB::table('package_service_mappings')->insert(array (
            0 => 
            array (
                'created_at' => '2023-10-06 06:31:48',
                'id' => 11,
                'service_id' => 61,
                'service_package_id' => 1,
                'updated_at' => '2023-10-06 06:31:48',
            ),
            1 => 
            array (
                'created_at' => '2023-10-06 06:31:48',
                'id' => 12,
                'service_id' => 94,
                'service_package_id' => 1,
                'updated_at' => '2023-10-06 06:31:48',
            ),
            2 => 
            array (
                'created_at' => '2023-10-06 06:53:26',
                'id' => 13,
                'service_id' => 81,
                'service_package_id' => 3,
                'updated_at' => '2023-10-06 06:53:26',
            ),
            3 => 
            array (
                'created_at' => '2023-10-06 06:53:26',
                'id' => 14,
                'service_id' => 100,
                'service_package_id' => 3,
                'updated_at' => '2023-10-06 06:53:26',
            ),
            4 => 
            array (
                'created_at' => '2023-10-06 07:05:09',
                'id' => 15,
                'service_id' => 76,
                'service_package_id' => 4,
                'updated_at' => '2023-10-06 07:05:09',
            ),
            5 => 
            array (
                'created_at' => '2023-10-06 07:05:09',
                'id' => 16,
                'service_id' => 80,
                'service_package_id' => 4,
                'updated_at' => '2023-10-06 07:05:09',
            ),
            6 => 
            array (
                'created_at' => '2023-10-06 07:20:28',
                'id' => 19,
                'service_id' => 79,
                'service_package_id' => 5,
                'updated_at' => '2023-10-06 07:20:28',
            ),
            7 => 
            array (
                'created_at' => '2023-10-06 07:20:28',
                'id' => 20,
                'service_id' => 90,
                'service_package_id' => 5,
                'updated_at' => '2023-10-06 07:20:28',
            ),
            8 => 
            array (
                'created_at' => '2023-10-06 07:25:51',
                'id' => 21,
                'service_id' => 15,
                'service_package_id' => 6,
                'updated_at' => '2023-10-06 07:25:51',
            ),
            9 => 
            array (
                'created_at' => '2023-10-06 07:25:51',
                'id' => 22,
                'service_id' => 17,
                'service_package_id' => 6,
                'updated_at' => '2023-10-06 07:25:51',
            ),
            10 => 
            array (
                'created_at' => '2023-10-06 07:25:51',
                'id' => 23,
                'service_id' => 54,
                'service_package_id' => 6,
                'updated_at' => '2023-10-06 07:25:51',
            ),
            11 => 
            array (
                'created_at' => '2023-10-06 07:25:51',
                'id' => 24,
                'service_id' => 89,
                'service_package_id' => 6,
                'updated_at' => '2023-10-06 07:25:51',
            ),
            12 => 
            array (
                'created_at' => '2023-10-06 07:35:25',
                'id' => 25,
                'service_id' => 56,
                'service_package_id' => 7,
                'updated_at' => '2023-10-06 07:35:25',
            ),
            13 => 
            array (
                'created_at' => '2023-10-06 07:35:25',
                'id' => 26,
                'service_id' => 58,
                'service_package_id' => 7,
                'updated_at' => '2023-10-06 07:35:25',
            ),
            14 => 
            array (
                'created_at' => '2023-10-06 07:35:25',
                'id' => 27,
                'service_id' => 71,
                'service_package_id' => 7,
                'updated_at' => '2023-10-06 07:35:25',
            ),
            15 => 
            array (
                'created_at' => '2023-10-06 07:35:25',
                'id' => 28,
                'service_id' => 87,
                'service_package_id' => 7,
                'updated_at' => '2023-10-06 07:35:25',
            ),
            16 => 
            array (
                'created_at' => '2023-10-06 07:35:25',
                'id' => 29,
                'service_id' => 101,
                'service_package_id' => 7,
                'updated_at' => '2023-10-06 07:35:25',
            ),
            17 => 
            array (
                'created_at' => '2023-10-06 08:22:05',
                'id' => 30,
                'service_id' => 25,
                'service_package_id' => 8,
                'updated_at' => '2023-10-06 08:22:05',
            ),
            18 => 
            array (
                'created_at' => '2023-10-06 08:22:05',
                'id' => 31,
                'service_id' => 26,
                'service_package_id' => 8,
                'updated_at' => '2023-10-06 08:22:05',
            ),
            19 => 
            array (
                'created_at' => '2023-10-06 08:22:05',
                'id' => 32,
                'service_id' => 27,
                'service_package_id' => 8,
                'updated_at' => '2023-10-06 08:22:05',
            ),
        ));
        
        
    }
}