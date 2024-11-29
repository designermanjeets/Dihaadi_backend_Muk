<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WalletsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wallets')->delete();
        
        \DB::table('wallets')->insert(array (
            0 => 
            array (
                'amount' => 1732.15,
                'created_at' => '2023-09-05 06:36:30',
                'id' => 4,
                'status' => 1,
                'title' => 'Alexa Ellis User Wallet',
                'updated_at' => '2023-10-05 06:36:59',
                'user_id' => 38,
            ),
            1 => 
            array (
                'amount' => 1951.9,
                'created_at' => '2023-09-05 06:49:20',
                'id' => 5,
                'status' => 1,
                'title' => 'Justin Worn User Wallet',
                'updated_at' => '2023-10-05 06:14:54',
                'user_id' => 39,
            ),
            2 => 
            array (
                'amount' => 2200.2385,
                'created_at' => '2023-09-05 06:54:24',
                'id' => 6,
                'status' => 1,
                'title' => 'Pedro Norris User Wallet',
                'updated_at' => '2023-10-05 07:19:19',
                'user_id' => 3,
            ),
            3 => 
            array (
                'amount' => 1761.3,
                'created_at' => '2023-09-05 06:58:14',
                'id' => 7,
                'status' => 1,
                'title' => 'Joseph Harris User Wallet',
                'updated_at' => '2023-10-05 06:09:07',
                'user_id' => 40,
            ),
            4 => 
            array (
                'amount' => 3002.367,
                'created_at' => '2023-09-05 07:11:34',
                'id' => 8,
                'status' => 1,
                'title' => 'Sunny Francis User Wallet',
                'updated_at' => '2023-09-05 10:38:33',
                'user_id' => 41,
            ),
            5 => 
            array (
                'amount' => 900.0,
                'created_at' => '2023-09-05 07:13:43',
                'id' => 9,
                'status' => 1,
                'title' => 'Daniel Wiliams Provider Wallet',
                'updated_at' => '2023-09-05 07:17:45',
                'user_id' => 16,
            ),
            6 => 
            array (
                'amount' => 462.4,
                'created_at' => '2023-09-05 07:22:48',
                'id' => 10,
                'status' => 1,
                'title' => 'Tracy Jones User Wallet',
                'updated_at' => '2023-10-05 10:16:08',
                'user_id' => 42,
            ),
            7 => 
            array (
                'amount' => 600.0,
                'created_at' => '2023-09-05 07:44:51',
                'id' => 11,
                'status' => 1,
                'title' => 'Jorge Perez Provider Wallet',
                'updated_at' => '2023-09-29 09:42:01',
                'user_id' => 15,
            ),
            8 => 
            array (
                'amount' => 961.9,
                'created_at' => '2023-09-05 10:41:35',
                'id' => 12,
                'status' => 1,
                'title' => 'Brenda Moody User Wallet',
                'updated_at' => '2023-10-05 08:18:49',
                'user_id' => 43,
            ),
            9 => 
            array (
                'amount' => 2000.0,
                'created_at' => '2023-09-05 10:44:12',
                'id' => 13,
                'status' => 1,
                'title' => 'Katie Brown Provider Wallet',
                'updated_at' => '2023-09-05 11:45:44',
                'user_id' => 17,
            ),
            10 => 
            array (
                'amount' => 761.01,
                'created_at' => '2023-09-05 10:56:53',
                'id' => 14,
                'status' => 1,
                'title' => 'Stella Green User Wallet',
                'updated_at' => '2023-10-05 10:07:14',
                'user_id' => 44,
            ),
            11 => 
            array (
                'amount' => 965.55,
                'created_at' => '2023-09-05 11:11:45',
                'id' => 15,
                'status' => 1,
                'title' => 'David Thomas User Wallet',
                'updated_at' => '2023-10-05 06:50:32',
                'user_id' => 37,
            ),
            12 => 
            array (
                'amount' => 1000.0,
                'created_at' => '2023-09-05 11:47:13',
                'id' => 16,
                'status' => 1,
                'title' => 'Felix Harris Provider Wallet',
                'updated_at' => '2023-09-05 11:47:13',
                'user_id' => 4,
            ),
            13 => 
            array (
                'amount' => 983.4,
                'created_at' => '2023-09-05 11:49:49',
                'id' => 17,
                'status' => 1,
                'title' => 'Pedra Danlel User Wallet',
                'updated_at' => '2023-10-05 10:12:15',
                'user_id' => 45,
            ),
            14 => 
            array (
                'amount' => 734.8,
                'created_at' => '2023-09-05 12:08:04',
                'id' => 18,
                'status' => 1,
                'title' => 'Milar Green User Wallet',
                'updated_at' => '2023-10-05 09:20:38',
                'user_id' => 46,
            ),
            15 => 
            array (
                'amount' => 482.711,
                'created_at' => '2023-09-05 12:42:58',
                'id' => 19,
                'status' => 1,
                'title' => 'Joy Hanry User Wallet',
                'updated_at' => '2023-10-03 13:04:34',
                'user_id' => 48,
            ),
            16 => 
            array (
                'amount' => 663.87,
                'created_at' => '2023-09-05 12:49:25',
                'id' => 20,
                'status' => 1,
                'title' => 'Lisa Deo User Wallet',
                'updated_at' => '2023-10-05 08:12:09',
                'user_id' => 47,
            ),
            17 => 
            array (
                'amount' => 900.0,
                'created_at' => '2023-09-05 12:56:45',
                'id' => 21,
                'status' => 1,
                'title' => 'Diana Norris User Wallet',
                'updated_at' => '2023-09-05 13:15:50',
                'user_id' => 49,
            ),
            18 => 
            array (
                'amount' => 948.75,
                'created_at' => '2023-09-05 13:09:46',
                'id' => 22,
                'status' => 1,
                'title' => 'Andy Potter User Wallet',
                'updated_at' => '2023-10-03 12:16:33',
                'user_id' => 50,
            ),
            19 => 
            array (
                'amount' => 935.0,
                'created_at' => '2023-09-06 05:06:20',
                'id' => 23,
                'status' => 1,
                'title' => 'Erik Simon Provider Wallet',
                'updated_at' => '2023-10-06 05:56:05',
                'user_id' => 12,
            ),
            20 => 
            array (
                'amount' => 1050.0,
                'created_at' => '2023-09-25 07:49:35',
                'id' => 24,
                'status' => 1,
                'title' => 'Antonio Griffin',
                'updated_at' => '2023-09-25 07:49:35',
                'user_id' => 53,
            ),
            21 => 
            array (
                'amount' => 725.0,
                'created_at' => '2023-09-29 05:49:06',
                'id' => 25,
                'status' => 1,
                'title' => 'Jennifer Davis',
                'updated_at' => '2023-09-29 05:49:06',
                'user_id' => 7,
            ),
            22 => 
            array (
                'amount' => 851.0,
                'created_at' => '2023-09-29 07:59:37',
                'id' => 26,
                'status' => 1,
                'title' => 'Ricahard Gross',
                'updated_at' => '2023-09-29 07:59:37',
                'user_id' => 13,
            ),
            23 => 
            array (
                'amount' => 965.0,
                'created_at' => '2023-09-29 08:32:13',
                'id' => 27,
                'status' => 1,
                'title' => 'Venesa Shaw',
                'updated_at' => '2023-09-29 08:32:13',
                'user_id' => 14,
            ),
            24 => 
            array (
                'amount' => 880.0,
                'created_at' => '2023-09-30 07:11:34',
                'id' => 28,
                'status' => 1,
                'title' => 'Danny Mark',
                'updated_at' => '2023-09-30 07:11:34',
                'user_id' => 8,
            ),
            25 => 
            array (
                'amount' => 960.0,
                'created_at' => '2023-10-06 05:52:15',
                'id' => 29,
                'status' => 1,
                'title' => 'Andrew Rhodes',
                'updated_at' => '2023-10-06 05:52:15',
                'user_id' => 6,
            ),
        ));
        
        
    }
}