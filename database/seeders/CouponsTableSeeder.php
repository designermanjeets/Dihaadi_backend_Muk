<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('coupons')->delete();
        
        \DB::table('coupons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'ETR6YUTO',
                'discount_type' => 'fixed',
                'discount' => 5.0,
                'status' => 1,
                'expire_date' => '2026-09-30 12:00:00',
                'deleted_at' => NULL,
                'created_at' => '2023-09-09 12:47:49',
                'updated_at' => '2023-09-09 12:47:49',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'JIY6HFYL',
                'discount_type' => 'percentage',
                'discount' => 2.0,
                'status' => 1,
                'expire_date' => '2026-10-31 12:00:00',
                'deleted_at' => NULL,
                'created_at' => '2023-09-09 12:49:28',
                'updated_at' => '2023-09-09 12:49:28',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'JER5TY6P',
                'discount_type' => 'fixed',
                'discount' => 4.0,
                'status' => 1,
                'expire_date' => '2026-11-30 12:00:00',
                'deleted_at' => NULL,
                'created_at' => '2023-09-09 12:51:09',
                'updated_at' => '2023-09-09 12:51:09',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'RTS4RT5G',
                'discount_type' => 'percentage',
                'discount' => 3.0,
                'status' => 1,
                'expire_date' => '2026-12-31 12:00:00',
                'deleted_at' => NULL,
                'created_at' => '2023-09-09 12:52:35',
                'updated_at' => '2023-09-09 12:52:35',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'QW3D4RTY',
                'discount_type' => 'fixed',
                'discount' => 7.0,
                'status' => 1,
                'expire_date' => '2026-11-30 12:00:00',
                'deleted_at' => NULL,
                'created_at' => '2023-09-09 12:54:48',
                'updated_at' => '2023-09-09 12:54:48',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'A3EDF5TG',
                'discount_type' => 'percentage',
                'discount' => 2.0,
                'status' => 1,
                'expire_date' => '2026-09-30 12:00:00',
                'deleted_at' => NULL,
                'created_at' => '2023-09-09 12:56:31',
                'updated_at' => '2023-09-09 12:56:31',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'FTY5YJ6N',
                'discount_type' => 'fixed',
                'discount' => 3.0,
                'status' => 1,
                'expire_date' => '2026-09-30 12:00:00',
                'deleted_at' => NULL,
                'created_at' => '2023-09-09 12:57:40',
                'updated_at' => '2023-09-09 12:57:40',
            ),
        ));
        
        
    }
}