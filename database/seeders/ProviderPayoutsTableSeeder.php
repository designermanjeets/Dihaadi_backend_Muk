<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProviderPayoutsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provider_payouts')->delete();
        
        \DB::table('provider_payouts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'provider_id' => 12,
                'payment_method' => 'wallet',
                'description' => NULL,
                'amount' => 65.0,
                'paid_date' => NULL,
                'created_at' => '2023-10-06 05:56:05',
                'updated_at' => '2023-10-06 05:56:05',
            ),
            1 => 
            array (
                'id' => 2,
                'provider_id' => 16,
                'payment_method' => 'bank',
                'description' => NULL,
                'amount' => 91.0,
                'paid_date' => NULL,
                'created_at' => '2023-10-06 05:58:17',
                'updated_at' => '2023-10-06 05:58:17',
            ),
        ));
        
        
    }
}