<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlanLimitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('plan_limits')->delete();
        
        \DB::table('plan_limits')->insert(array (
            0 => 
            array (
                'created_at' => '2023-09-11 05:03:48',
                'id' => 4,
                'plan_id' => 3,
                'plan_limitation' => '{"service":{"limit":null},"handyman":{"limit":null},"featured_service":{"limit":null}}',
                'updated_at' => '2023-09-11 05:03:48',
            ),
            1 => 
            array (
                'created_at' => '2023-09-11 05:04:02',
                'id' => 5,
                'plan_id' => 2,
                'plan_limitation' => '{"service":{"limit":null},"handyman":{"limit":null},"featured_service":{"limit":null}}',
                'updated_at' => '2023-09-11 05:04:02',
            ),
            2 => 
            array (
                'created_at' => '2023-09-11 05:05:54',
                'id' => 6,
                'plan_id' => 1,
                'plan_limitation' => '{"service":{"limit":null},"handyman":{"limit":null},"featured_service":{"limit":null}}',
                'updated_at' => '2023-09-11 05:05:54',
            ),
        ));
        
        
    }
}