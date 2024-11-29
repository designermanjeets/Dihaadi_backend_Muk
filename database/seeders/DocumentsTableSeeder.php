<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('documents')->delete();
        
        \DB::table('documents')->insert(array (
            0 => 
            array (
                'created_at' => '2023-10-12 08:07:13',
                'deleted_at' => NULL,
                'id' => 1,
                'is_required' => 0,
                'name' => 'Voting Card',
                'status' => 1,
                'updated_at' => '2023-10-12 08:07:13',
            ),
            1 => 
            array (
                'created_at' => '2023-10-12 08:07:32',
                'deleted_at' => NULL,
                'id' => 2,
                'is_required' => 0,
                'name' => 'Pan Card',
                'status' => 1,
                'updated_at' => '2023-10-12 08:07:32',
            ),
            2 => 
            array (
                'created_at' => '2023-10-12 08:07:43',
                'deleted_at' => NULL,
                'id' => 3,
                'is_required' => 1,
                'name' => 'Passport',
                'status' => 1,
                'updated_at' => '2023-10-12 08:07:43',
            ),
            3 => 
            array (
                'created_at' => '2023-10-12 08:07:57',
                'deleted_at' => NULL,
                'id' => 4,
                'is_required' => 0,
                'name' => 'Aadhar Card',
                'status' => 1,
                'updated_at' => '2023-10-12 08:08:21',
            ),
            4 => 
            array (
                'created_at' => '2023-10-12 08:08:14',
                'deleted_at' => NULL,
                'id' => 5,
                'is_required' => 1,
                'name' => 'Driving Licence',
                'status' => 1,
                'updated_at' => '2023-10-12 08:08:14',
            ),
        ));
        
        
    }
}