<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookingExtraChargesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('booking_extra_charges')->delete();
        
        \DB::table('booking_extra_charges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'booking_id' => 6,
                'title' => 'Extra',
                'price' => 10.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'booking_id' => 2,
                'title' => 'Extra',
                'price' => 5.0,
                'qty' => 2.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'booking_id' => 31,
                'title' => 'Extra',
                'price' => 10.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'booking_id' => 48,
                'title' => 'Extra',
                'price' => 10.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'booking_id' => 58,
                'title' => 'Extra',
                'price' => 10.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'booking_id' => 65,
                'title' => 'Extra',
                'price' => 28.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'booking_id' => 69,
                'title' => 'Extra',
                'price' => 26.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'booking_id' => 72,
                'title' => 'Extra',
                'price' => 25.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'booking_id' => 86,
                'title' => 'Extra',
                'price' => 10.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'booking_id' => 114,
                'title' => 'Extra',
                'price' => 25.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'booking_id' => 124,
                'title' => 'Extra',
                'price' => 21.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'booking_id' => 167,
                'title' => 'Extra',
                'price' => 10.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'booking_id' => 169,
                'title' => 'Extra',
                'price' => 25.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'booking_id' => 171,
                'title' => 'Extra',
                'price' => 25.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 16,
                'booking_id' => 173,
                'title' => 'Extra',
                'price' => 30.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 17,
                'booking_id' => 182,
                'title' => 'Extra',
                'price' => 10.0,
                'qty' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}