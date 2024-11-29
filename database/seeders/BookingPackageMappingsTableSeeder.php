<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookingPackageMappingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('booking_package_mappings')->delete();
        
        \DB::table('booking_package_mappings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'booking_id' => 210,
                'service_package_id' => 1,
                'provider_id' => 4,
                'category_id' => 14,
                'subcategory_id' => NULL,
                'name' => 'Hair Cutting and Coloring',
                'description' => NULL,
                'price' => 50.0,
                'start_at' => NULL,
                'end_at' => NULL,
                'status' => 1,
                'is_featured' => 0,
                'package_type' => NULL,
                'created_at' => '2023-10-06 11:46:03',
                'updated_at' => '2023-10-06 11:46:03',
            ),
            1 => 
            array (
                'id' => 2,
                'booking_id' => 221,
                'service_package_id' => 4,
                'provider_id' => 4,
                'category_id' => 19,
                'subcategory_id' => NULL,
                'name' => 'Laundry Service Package',
                'description' => NULL,
                'price' => 38.0,
                'start_at' => NULL,
                'end_at' => NULL,
                'status' => 1,
                'is_featured' => 0,
                'package_type' => NULL,
                'created_at' => '2023-10-06 15:25:41',
                'updated_at' => '2023-10-06 15:25:41',
            ),
        ));
        
        
    }
}