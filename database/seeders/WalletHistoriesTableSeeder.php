<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WalletHistoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wallet_histories')->delete();
        
        \DB::table('wallet_histories')->insert(array (
            0 => 
            array (
                'activity_data' => '{"title":"Justin Worn","user_id":39,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 06:50:51',
                'datetime' => '2023-09-05 06:50:51',
                'id' => 1,
                'updated_at' => '2023-09-05 06:50:51',
                'user_id' => 39,
            ),
            1 => 
            array (
                'activity_data' => '{"title":"Alexa Ellis","user_id":38,"provider_name":"","amount":900}',
                'activity_message' => 'Wallet top-up with $900.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 06:51:21',
                'datetime' => '2023-09-05 06:51:21',
                'id' => 2,
                'updated_at' => '2023-09-05 06:51:21',
                'user_id' => 38,
            ),
            2 => 
            array (
                'activity_data' => '{"title":"David Thomas","user_id":37,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 06:51:37',
                'datetime' => '2023-09-05 06:51:37',
                'id' => 3,
                'updated_at' => '2023-09-05 06:51:37',
                'user_id' => 37,
            ),
            3 => 
            array (
                'activity_data' => '{"title":"Pedro Norris","user_id":3,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet added with amount $1000.00',
                'activity_type' => 'add_wallet',
                'created_at' => '2023-09-05 06:54:24',
                'datetime' => '2023-09-05 06:54:24',
                'id' => 4,
                'updated_at' => '2023-09-05 06:54:24',
                'user_id' => 3,
            ),
            4 => 
            array (
                'activity_data' => '{"title":"Joseph Harris User Wallet","user_id":40,"provider_name":"","amount":901}',
                'activity_message' => 'Wallet top-up with $901.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:03:23',
                'datetime' => '2023-09-05 07:03:23',
                'id' => 5,
                'updated_at' => '2023-09-05 07:03:23',
                'user_id' => 40,
            ),
            5 => 
            array (
                'activity_data' => '{"title":"Joseph Harris User Wallet","user_id":40,"provider_name":"","amount":900}',
                'activity_message' => 'Wallet top-up with $900.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:03:30',
                'datetime' => '2023-09-05 07:03:30',
                'id' => 6,
                'updated_at' => '2023-09-05 07:03:30',
                'user_id' => 40,
            ),
            6 => 
            array (
                'activity_data' => '{"title":"Pedro Norris User Wallet","user_id":3,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:03:39',
                'datetime' => '2023-09-05 07:03:39',
                'id' => 7,
                'updated_at' => '2023-09-05 07:03:39',
                'user_id' => 3,
            ),
            7 => 
            array (
                'activity_data' => '{"title":"Justin Worn User Wallet","user_id":39,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:03:46',
                'datetime' => '2023-09-05 07:03:46',
                'id' => 8,
                'updated_at' => '2023-09-05 07:03:46',
                'user_id' => 39,
            ),
            8 => 
            array (
                'activity_data' => '{"title":"Alexa Ellis User Wallet","user_id":38,"provider_name":"","amount":900}',
                'activity_message' => 'Wallet top-up with $900.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:03:53',
                'datetime' => '2023-09-05 07:03:53',
                'id' => 9,
                'updated_at' => '2023-09-05 07:03:53',
                'user_id' => 38,
            ),
            9 => 
            array (
                'activity_data' => '{"title":"David Thomas User Wallet","user_id":37,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:03:59',
                'datetime' => '2023-09-05 07:03:59',
                'id' => 10,
                'updated_at' => '2023-09-05 07:03:59',
                'user_id' => 37,
            ),
            10 => 
            array (
                'activity_data' => '{"title":"Sunny Francis User Wallet","user_id":41,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:17:26',
                'datetime' => '2023-09-05 07:17:26',
                'id' => 11,
                'updated_at' => '2023-09-05 07:17:26',
                'user_id' => 41,
            ),
            11 => 
            array (
                'activity_data' => '{"title":"Daniel Wiliams Provider Wallet","user_id":16,"provider_name":"","amount":900}',
                'activity_message' => 'Wallet top-up with $900.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:17:45',
                'datetime' => '2023-09-05 07:17:45',
                'id' => 12,
                'updated_at' => '2023-09-05 07:17:45',
                'user_id' => 16,
            ),
            12 => 
            array (
                'activity_data' => '{"title":"Felix Harris Provider Wallet","user_id":4,"provider_name":"","amount":2000}',
                'activity_message' => 'Wallet top-up with $2000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:17:54',
                'datetime' => '2023-09-05 07:17:54',
                'id' => 13,
                'updated_at' => '2023-09-05 07:17:54',
                'user_id' => 4,
            ),
            13 => 
            array (
                'activity_data' => '{"title":"Felix Harris Provider Wallet","user_id":4,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:18:27',
                'datetime' => '2023-09-05 07:18:27',
                'id' => 14,
                'updated_at' => '2023-09-05 07:18:27',
                'user_id' => 4,
            ),
            14 => 
            array (
                'activity_data' => '{"title":"David Thomas User Wallet","user_id":37,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:18:40',
                'datetime' => '2023-09-05 07:18:40',
                'id' => 15,
                'updated_at' => '2023-09-05 07:18:40',
                'user_id' => 37,
            ),
            15 => 
            array (
                'activity_data' => '{"title":"Felix Harris Provider Wallet","user_id":4,"provider_name":"","amount":5000}',
                'activity_message' => 'Wallet top-up with $5000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:19:24',
                'datetime' => '2023-09-05 07:19:24',
                'id' => 16,
                'updated_at' => '2023-09-05 07:19:24',
                'user_id' => 4,
            ),
            16 => 
            array (
                'activity_data' => '{"title":"David Thomas User Wallet","user_id":37,"provider_name":"","amount":12000}',
                'activity_message' => 'Wallet top-up with $12000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:19:32',
                'datetime' => '2023-09-05 07:19:32',
                'id' => 17,
                'updated_at' => '2023-09-05 07:19:32',
                'user_id' => 37,
            ),
            17 => 
            array (
                'activity_data' => '{"title":"Sunny Francis User Wallet","user_id":41,"provider_name":"","amount":2000}',
                'activity_message' => 'Wallet top-up with $2000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:22:18',
                'datetime' => '2023-09-05 07:22:18',
                'id' => 18,
                'updated_at' => '2023-09-05 07:22:18',
                'user_id' => 41,
            ),
            18 => 
            array (
                'activity_data' => '{"title":"Tracy Jones User Wallet","user_id":42,"provider_name":"","amount":500}',
                'activity_message' => 'Wallet top-up with $500.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 07:28:56',
                'datetime' => '2023-09-05 07:28:56',
                'id' => 19,
                'updated_at' => '2023-09-05 07:28:56',
                'user_id' => 42,
            ),
            19 => 
            array (
                'activity_data' => '{"title":"Brenda Moody User Wallet","user_id":43,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 03:08:25',
                'datetime' => '2023-09-05 03:08:25',
                'id' => 20,
                'updated_at' => '2023-09-05 03:08:25',
                'user_id' => 43,
            ),
            20 => 
            array (
                'activity_data' => '{"title":"Jorge Perez Provider Wallet","user_id":15,"provider_name":"","amount":500}',
                'activity_message' => 'Wallet top-up with $500.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 03:09:28',
                'datetime' => '2023-09-05 03:09:28',
                'id' => 21,
                'updated_at' => '2023-09-05 03:09:28',
                'user_id' => 15,
            ),
            21 => 
            array (
                'activity_data' => '{"title":"David Thomas User Wallet","user_id":37,"provider_name":"","amount":1200}',
                'activity_message' => 'Wallet top-up with $1200.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 03:09:51',
                'datetime' => '2023-09-05 03:09:51',
                'id' => 22,
                'updated_at' => '2023-09-05 03:09:51',
                'user_id' => 37,
            ),
            22 => 
            array (
                'activity_data' => '{"title":"Felix Harris Provider Wallet","user_id":4,"provider_name":"","amount":20}',
                'activity_message' => 'Wallet top-up with $20.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 03:10:20',
                'datetime' => '2023-09-05 03:10:20',
                'id' => 23,
                'updated_at' => '2023-09-05 03:10:20',
                'user_id' => 4,
            ),
            23 => 
            array (
                'activity_data' => '{"title":"David Thomas User Wallet","user_id":37,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet added with amount $1000.00',
                'activity_type' => 'add_wallet',
                'created_at' => '2023-09-05 03:11:45',
                'datetime' => '2023-09-05 03:11:45',
                'id' => 24,
                'updated_at' => '2023-09-05 03:11:45',
                'user_id' => 37,
            ),
            24 => 
            array (
                'activity_data' => '{"title":"Stella Green","user_id":44,"provider_name":"","amount":800}',
                'activity_message' => 'Wallet top-up with $800.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 03:42:24',
                'datetime' => '2023-09-05 03:42:24',
                'id' => 25,
                'updated_at' => '2023-09-05 03:42:24',
                'user_id' => 44,
            ),
            25 => 
            array (
                'activity_data' => '{"title":"Katie Brown","user_id":17,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 03:42:36',
                'datetime' => '2023-09-05 03:42:36',
                'id' => 26,
                'updated_at' => '2023-09-05 03:42:36',
                'user_id' => 17,
            ),
            26 => 
            array (
                'activity_data' => '{"title":"Katie Brown Provider Wallet","user_id":17,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 03:45:44',
                'datetime' => '2023-09-05 03:45:44',
                'id' => 27,
                'updated_at' => '2023-09-05 03:45:44',
                'user_id' => 17,
            ),
            27 => 
            array (
                'activity_data' => '{"title":"Felix Harris Provider Wallet","user_id":4,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet added with amount $1000.00',
                'activity_type' => 'add_wallet',
                'created_at' => '2023-09-05 03:47:13',
                'datetime' => '2023-09-05 03:47:13',
                'id' => 28,
                'updated_at' => '2023-09-05 03:47:13',
                'user_id' => 4,
            ),
            28 => 
            array (
                'activity_data' => '{"title":"Pedra Danlel User Wallet","user_id":45,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 03:59:19',
                'datetime' => '2023-09-05 03:59:19',
                'id' => 29,
                'updated_at' => '2023-09-05 03:59:19',
                'user_id' => 45,
            ),
            29 => 
            array (
                'activity_data' => '{"title":"Milar Green User Wallet","user_id":46,"provider_name":"","amount":800}',
                'activity_message' => 'Wallet top-up with $800.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 04:34:48',
                'datetime' => '2023-09-05 04:34:48',
                'id' => 30,
                'updated_at' => '2023-09-05 04:34:48',
                'user_id' => 46,
            ),
            30 => 
            array (
                'activity_data' => '{"title":"Joy Hanry User Wallet","user_id":48,"provider_name":"","amount":500}',
                'activity_message' => 'Wallet top-up with $500.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 05:15:26',
                'datetime' => '2023-09-05 05:15:26',
                'id' => 31,
                'updated_at' => '2023-09-05 05:15:26',
                'user_id' => 48,
            ),
            31 => 
            array (
                'activity_data' => '{"title":"Lisa Deo User Wallet","user_id":47,"provider_name":"","amount":700}',
                'activity_message' => 'Wallet top-up with $700.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 05:15:37',
                'datetime' => '2023-09-05 05:15:37',
                'id' => 32,
                'updated_at' => '2023-09-05 05:15:37',
                'user_id' => 47,
            ),
            32 => 
            array (
                'activity_data' => '{"title":"Diana Norris User Wallet","user_id":49,"provider_name":"","amount":900}',
                'activity_message' => 'Wallet top-up with $900.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 05:15:50',
                'datetime' => '2023-09-05 05:15:50',
                'id' => 33,
                'updated_at' => '2023-09-05 05:15:50',
                'user_id' => 49,
            ),
            33 => 
            array (
                'activity_data' => '{"title":"Andy Potter User Wallet","user_id":50,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-05 05:16:02',
                'datetime' => '2023-09-05 05:16:02',
                'id' => 34,
                'updated_at' => '2023-09-05 05:16:02',
                'user_id' => 50,
            ),
            34 => 
            array (
                'activity_data' => '{"title":"Erik Simon Provider Wallet","user_id":12,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-10 21:24:11',
                'datetime' => '2023-09-10 21:24:11',
                'id' => 35,
                'updated_at' => '2023-09-10 21:24:11',
                'user_id' => 12,
            ),
            35 => 
            array (
                'activity_data' => '{"title":"Pedro Norris User Wallet","user_id":3,"provider_name":"","amount":1000}',
                'activity_message' => 'Wallet top-up with $1000.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-29 15:07:20',
                'datetime' => '2023-09-29 15:07:20',
                'id' => 36,
                'updated_at' => '2023-09-29 15:07:20',
                'user_id' => 3,
            ),
            36 => 
            array (
                'activity_data' => '{"title":"Jorge Perez Provider Wallet","user_id":15,"provider_name":"","amount":100}',
                'activity_message' => 'Wallet top-up with $100.00',
                'activity_type' => 'update_wallet',
                'created_at' => '2023-09-29 15:12:01',
                'datetime' => '2023-09-29 15:12:01',
                'id' => 37,
                'updated_at' => '2023-09-29 15:12:01',
                'user_id' => 15,
            ),
            37 => 
            array (
                'activity_data' => '{"title":"Pedro Norris User Wallet","user_id":3,"provider_name":"","amount":2246.4285,"transaction_id":null,"transaction_type":null}',
                'activity_message' => 'Wallet top-up with $2246.43',
                'activity_type' => 'wallet_top_up',
                'created_at' => '2023-10-02 19:37:12',
                'datetime' => '2023-10-02 19:37:12',
                'id' => 38,
                'updated_at' => '2023-10-02 19:37:12',
                'user_id' => 3,
            ),
            38 => 
            array (
                'activity_data' => '{"title":"Erik Simon Provider Wallet","user_id":12,"provider_name":"","amount":935}',
                'activity_message' => 'messages.wallet_amount',
                'activity_type' => 'wallet_payout_transfer',
                'created_at' => '2023-10-06 11:26:05',
                'datetime' => '2023-10-06 11:26:05',
                'id' => 39,
                'updated_at' => '2023-10-06 11:26:05',
                'user_id' => 12,
            ),
        ));
        
        
    }
}