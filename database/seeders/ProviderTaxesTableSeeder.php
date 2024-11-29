<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProviderTaxesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provider_taxes')->delete();
        
        \DB::table('provider_taxes')->insert(array (
            0 => 
            array (
                'id' => 65,
                'provider_id' => 12,
                'tax_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 66,
                'provider_id' => 12,
                'tax_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 71,
                'provider_id' => 16,
                'tax_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 76,
                'provider_id' => 4,
                'tax_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 77,
                'provider_id' => 4,
                'tax_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 81,
                'provider_id' => 15,
                'tax_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 82,
                'provider_id' => 8,
                'tax_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 83,
                'provider_id' => 8,
                'tax_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 84,
                'provider_id' => 13,
                'tax_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 85,
                'provider_id' => 13,
                'tax_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 86,
                'provider_id' => 9,
                'tax_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 87,
                'provider_id' => 6,
                'tax_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 88,
                'provider_id' => 6,
                'tax_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 93,
                'provider_id' => 7,
                'tax_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 96,
                'provider_id' => 10,
                'tax_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 99,
                'provider_id' => 17,
                'tax_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 100,
                'provider_id' => 17,
                'tax_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 101,
                'provider_id' => 14,
                'tax_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}