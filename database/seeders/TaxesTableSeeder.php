<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('taxes')->delete();
        
        \DB::table('taxes')->insert(array (
            0 => 
            array (
                'created_at' => '2023-09-01 10:06:25',
                'id' => 1,
                'status' => 1,
                'title' => 'Service Tax',
                'type' => 'percent',
                'updated_at' => '2023-09-01 10:06:25',
                'value' => 5.0,
            ),
            1 => 
            array (
                'created_at' => '2023-09-01 10:07:36',
                'id' => 2,
                'status' => 1,
                'title' => 'Booking Fee',
                'type' => 'fixed',
                'updated_at' => '2023-09-01 10:07:36',
                'value' => 4.0,
            ),
        ));
        
        
    }
}