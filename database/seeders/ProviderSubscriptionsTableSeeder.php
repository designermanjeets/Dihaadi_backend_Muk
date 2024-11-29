<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProviderSubscriptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provider_subscriptions')->delete();
        
        \DB::table('provider_subscriptions')->insert(array (
            0 => 
            array (
                'amount' => 0.0,
                'created_at' => '2024-02-02 09:53:47',
                'description' => NULL,
                'duration' => NULL,
                'end_at' => '2024-02-09 09:53:47',
                'id' => 1,
                'identifier' => 'free',
                'payment_id' => '1',
                'plan_id' => 1,
                'plan_limitation' => '{"featured_service":{"is_checked":null,"limit":null},"handyman":{"is_checked":null,"limit":null},"service":{"is_checked":null,"limit":null}}',
                'plan_type' => NULL,
                'start_at' => '2024-02-02 09:53:47',
                'status' => 'active',
                'title' => 'Free plan',
                'type' => 'weekly',
                'updated_at' => '2024-02-02 09:53:47',
                'user_id' => 4,
            ),
        ));
        
        
    }
}