<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostJobRequestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_job_requests')->delete();
        
        \DB::table('post_job_requests')->insert(array (
            0 => 
            array (
                'created_at' => '2023-09-11 10:38:12',
                'customer_id' => 44,
                'date' => NULL,
                'description' => 'Indulge in relaxation and rejuvenation with our Face Massage service. Our expert therapists use gentle techniques to melt away tension and leave your skin glowing and refreshed. 💆🏻🧖‍♀️',
                'id' => 1,
                'job_price' => NULL,
                'price' => 20.0,
                'provider_id' => NULL,
                'reason' => NULL,
                'status' => 'requested',
                'title' => 'Face Massage',
                'updated_at' => '2023-09-11 10:38:12',
            ),
            1 => 
            array (
                'created_at' => '2023-09-11 10:54:30',
                'customer_id' => 47,
                'date' => NULL,
                'description' => 'Bring your space to life with our Green Plant Creation service. Our experts curate and install lush, vibrant plants to transform your environment into a green oasis. 🪴🥀',
                'id' => 2,
                'job_price' => NULL,
                'price' => 30.0,
                'provider_id' => NULL,
                'reason' => NULL,
                'status' => 'requested',
                'title' => 'Green Plant Creation',
                'updated_at' => '2023-09-11 10:54:30',
            ),
            2 => 
            array (
                'created_at' => '2023-10-02 13:52:58',
                'customer_id' => 49,
                'date' => NULL,
                'description' => 'Savor the exquisite with our Macaron Delights service. Indulge in a symphony of flavors and textures as we handcraft these sweet masterpieces, perfect for every occasion. 🍩🍪',
                'id' => 3,
                'job_price' => NULL,
                'price' => 40.0,
                'provider_id' => NULL,
                'reason' => NULL,
                'status' => 'requested',
                'title' => 'Macaron Delights',
                'updated_at' => '2023-10-02 13:52:58',
            ),
            3 => 
            array (
                'created_at' => '2023-10-02 13:55:16',
                'customer_id' => 3,
                'date' => NULL,
                'description' => 'Indulge in ultimate hair relaxation with our Hair Spa service. Our skilled stylists pamper your locks, providing deep nourishment and rejuvenation, leaving your hair silky, smooth, and revitalized. 🧖‍♀️',
                'id' => 4,
                'job_price' => NULL,
                'price' => 36.0,
                'provider_id' => NULL,
                'reason' => NULL,
                'status' => 'requested',
                'title' => 'Hair Care',
                'updated_at' => '2023-10-02 13:55:16',
            ),
            4 => 
            array (
                'created_at' => '2023-10-02 13:57:22',
                'customer_id' => 3,
                'date' => NULL,
                'description' => 'Elevate your comfort with our AC Refresh and Revive service. Experience enhanced cooling efficiency and air quality as we rejuvenate your system. 🔩🧑🏻‍🔧',
                'id' => 5,
                'job_price' => NULL,
                'price' => 25.0,
                'provider_id' => NULL,
                'reason' => NULL,
                'status' => 'requested',
                'title' => 'AC Refresh and Revive',
                'updated_at' => '2023-10-02 13:57:22',
            ),
            5 => 
            array (
                'created_at' => '2023-10-02 13:59:27',
                'customer_id' => 3,
                'date' => NULL,
                'description' => 'Experience the pinnacle of cleanliness with our Ultimate Deep Cleaning service. Our meticulous experts leave no corner untouched, ensuring a spotless and refreshed environment. 🧽🧼🧹🪣',
                'id' => 6,
                'job_price' => NULL,
                'price' => 50.0,
                'provider_id' => NULL,
                'reason' => NULL,
                'status' => 'requested',
                'title' => 'Ultimate Deep Cleaning',
                'updated_at' => '2023-10-02 13:59:27',
            ),
            6 => 
            array (
                'created_at' => '2023-10-03 05:24:10',
                'customer_id' => 3,
                'date' => NULL,
                'description' => 'Experience the transformation of your living spaces with Interior Elegance Creations. Our skilled designers blend creativity and functionality, crafting interiors that reflect your unique style and elevate the aesthetics of your home. 🧑🏻‍🎨',
                'id' => 7,
                'job_price' => NULL,
                'price' => 45.0,
                'provider_id' => NULL,
                'reason' => NULL,
                'status' => 'requested',
                'title' => 'Interior Elegance Creations',
                'updated_at' => '2023-10-03 05:24:10',
            ),
            7 => 
            array (
                'created_at' => '2023-10-03 05:50:21',
                'customer_id' => 3,
                'date' => NULL,
                'description' => 'Our talented artists craft breathtaking celestial scenes, igniting your imagination and infusing your space with heavenly beauty. 🧑🏻‍🎨🖌️🎨',
                'id' => 9,
                'job_price' => NULL,
                'price' => 45.0,
                'provider_id' => NULL,
                'reason' => NULL,
                'status' => 'requested',
                'title' => 'Celestial Artistry on Canvas',
                'updated_at' => '2023-10-03 05:50:21',
            ),
            8 => 
            array (
                'created_at' => '2023-10-03 05:54:05',
                'customer_id' => 3,
                'date' => NULL,
                'description' => 'Swift and reliable Electrical Wire Repair Solutions to keep your home safe and powered. Our expert electricians ensure seamless wire repairs, restoring your electrical systems\' integrity. 🧑🏻‍🔧🔧🪛',
                'id' => 10,
                'job_price' => NULL,
                'price' => 50.0,
                'provider_id' => NULL,
                'reason' => NULL,
                'status' => 'requested',
                'title' => 'Electrical Wire Repair Solutions',
                'updated_at' => '2023-10-03 05:54:05',
            ),
        ));
        
        
    }
}