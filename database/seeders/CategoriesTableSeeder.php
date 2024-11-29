<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 12:55:09',
                'deleted_at' => NULL,
                'description' => 'Experience enhanced comfort with our AC CoolCare services, ensuring optimal cooling performance for your space.🔩 🪛',
                'id' => 9,
                'is_featured' => 1,
                'name' => 'AC CoolCare',
                'status' => 1,
                'category_image' => public_path('/images/category-images/ac_coolcare.png'),
                'updated_at' => '2023-09-04 12:55:15',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 12:56:14',
                'deleted_at' => NULL,
                'description' => 'The Tailor category guides you through the art of fabric manipulation and garment construction, from sewing basics to advanced techniques, helping you create perfectly tailored pieces. 🧥🥻👔',
                'id' => 10,
                'is_featured' => 0,
                'name' => 'Tailor',
                'status' => 1,
                'category_image' => public_path('/images/category-images/tailor.png'),
                'updated_at' => '2023-09-04 12:56:14',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 12:57:10',
                'deleted_at' => NULL,
                'description' => 'The Smart Home category delves into the realm of interconnected devices and automation, transforming living spaces into efficient and tech-savvy environments. 📱',
                'id' => 11,
                'is_featured' => 0,
                'name' => 'Smart Home',
                'status' => 1,
                'category_image' => public_path('/images/category-images/smart_home.png'),
                'updated_at' => '2023-09-04 12:57:10',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 12:57:44',
                'deleted_at' => NULL,
                'description' => 'Ensure safety and peace of mind with our Security Guard services, providing vigilant protection for your premises.👮🏻',
                'id' => 12,
                'is_featured' => 0,
                'name' => 'Security Guard',
                'status' => 1,
                'category_image' => public_path('/images/category-images/security_guard.png'),
                'updated_at' => '2023-09-04 12:57:44',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 12:58:07',
                'deleted_at' => NULL,
                'description' => 'The Sanitization category offers expert guidance on maintaining clean and hygienic environments through effective cleaning and disinfection practices.🧴',
                'id' => 13,
                'is_featured' => 0,
                'name' => 'Sanitization',
                'status' => 1,
                'category_image' => public_path('/images/category-images/sanitization.png'),
                'updated_at' => '2023-09-04 12:58:07',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 12:58:27',
                'deleted_at' => NULL,
                'description' => 'The Salon category is a hub of beauty and grooming expertise, offering insights into hairstyling, skincare, and personal care routines for a confident and polished you. ✂️',
                'id' => 14,
                'is_featured' => 0,
                'name' => 'Salon',
                'status' => 1,
                'category_image' => public_path('/images/category-images/salon.png'),
                'updated_at' => '2023-09-04 12:58:27',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 12:58:53',
                'deleted_at' => NULL,
                'description' => 'The Photography category captures the essence of visual storytelling, offering tips on composition, editing, and equipment to help you create captivating images. 📸',
                'id' => 15,
                'is_featured' => 0,
                'name' => 'Photography',
                'status' => 1,
                'category_image' => public_path('/images/category-images/photography.png'),
                'updated_at' => '2023-09-04 12:58:53',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 12:59:13',
                'deleted_at' => NULL,
                'description' => 'The Pest Control category equips you with effective strategies to manage and eliminate pests, ensuring a pest-free environment and peace of mind. 🪲🪳',
                'id' => 16,
                'is_featured' => 0,
                'name' => 'Pest Control',
                'status' => 1,
                'category_image' => public_path('/images/category-images/pest_control.png'),
                'updated_at' => '2023-09-04 12:59:13',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 12:59:31',
                'deleted_at' => NULL,
                'description' => 'The Pandit category offers spiritual guidance, rituals, and insights rooted in ancient traditions, assisting individuals in their journey towards deeper understanding and connection.🔥',
                'id' => 17,
                'is_featured' => 0,
                'name' => 'Pandit',
                'status' => 1,
                'category_image' => public_path('/images/category-images/pandit.png'),
                'updated_at' => '2023-09-04 12:59:31',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 13:00:04',
                'deleted_at' => NULL,
                'description' => 'The Painter category celebrates the world of colors and creativity, offering guidance on techniques, styles, and mediums for both aspiring and seasoned artists.🖌️🎨',
                'id' => 18,
                'is_featured' => 1,
                'name' => 'Painter',
                'status' => 1,
                'category_image' => public_path('/images/category-images/painter.png'),
                'updated_at' => '2023-09-04 13:06:10',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 13:00:26',
                'deleted_at' => NULL,
                'description' => 'Experience the convenience of pristine garments with our comprehensive Laundry services, ensuring freshness and care for your clothing.🧼',
                'id' => 19,
                'is_featured' => 0,
                'name' => 'Laundry',
                'status' => 1,
                'category_image' => public_path('/images/category-images/laundry.png'),
                'updated_at' => '2023-09-04 13:00:26',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 13:00:55',
                'deleted_at' => NULL,
                'description' => 'The Gardener category cultivates a wealth of knowledge on plant care, landscaping, and sustainable gardening practices to help enthusiasts foster thriving green spaces. 🏡⛏️',
                'id' => 20,
                'is_featured' => 0,
                'name' => 'Gardener',
                'status' => 1,
                'category_image' => public_path('/images/category-images/gardener.png'),
                'updated_at' => '2023-09-04 13:05:54',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 13:01:27',
                'deleted_at' => NULL,
                'description' => 'Experience top-notch Automotive Care for your vehicle\'s longevity and performance. From maintenance to repairs, our experts ensure your ride stays at its best. 🚛🚙',
                'id' => 21,
                'is_featured' => 0,
                'name' => 'Automotive Care',
                'status' => 1,
                'category_image' => public_path('/images/category-images/automotive_care.png'),
                'updated_at' => '2023-09-04 13:01:27',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 13:02:07',
                'deleted_at' => NULL,
                'description' => 'The Cooking category offers a delightful exploration of culinary techniques, recipes, and kitchen tips, catering to both novice cooks and seasoned chefs. 🫕🍲',
                'id' => 22,
                'is_featured' => 1,
                'name' => 'Cooking',
                'status' => 1,
                'category_image' => public_path('/images/category-images/cooking.png'),
                'updated_at' => '2023-09-04 13:02:10',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 13:02:54',
                'deleted_at' => NULL,
                'description' => 'The Plumber category guides you through the intricacies of pipes, fixtures, and plumbing systems to help you tackle issues and master essential plumbing skills. 🛠️',
                'id' => 23,
                'is_featured' => 1,
                'name' => 'Plumber',
                'status' => 1,
                'category_image' => public_path('/images/category-images/plumber.png'),
                'updated_at' => '2023-09-04 13:02:54',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 13:03:21',
                'deleted_at' => NULL,
                'description' => 'Efficiently remove dirt and grime with our cleaning products, restoring surfaces to their pristine condition. 🧼🧽🧹🧻',
                'id' => 24,
                'is_featured' => 1,
                'name' => 'Cleaning',
                'status' => 1,
                'category_image' => public_path('/images/category-images/cleaning.png'),
                'updated_at' => '2023-09-04 13:03:21',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 13:04:01',
                'deleted_at' => NULL,
                'description' => 'Delve into the Electrician category to illuminate your understanding of electrical systems, from wiring complexities to safety essentials. 💡🪛🔌',
                'id' => 25,
                'is_featured' => 1,
                'name' => 'Electrician',
                'status' => 1,
                'category_image' => public_path('/images/category-images/electrician.png'),
                'updated_at' => '2023-09-04 13:06:04',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 13:04:41',
                'deleted_at' => NULL,
                'description' => 'A carpenter is a skilled tradesperson who specializes in working with wood to construct, install, and repair structures and objects. 🪛 🪚',
                'id' => 26,
                'is_featured' => 1,
                'name' => 'Carpenter',
                'status' => 1,
                'category_image' => public_path('/images/category-images/carpenter.png'),
                'updated_at' => '2023-09-04 13:04:53',
            ],
            [
                'color' => '#000000',
                'created_at' => '2023-09-04 13:05:01',
                'deleted_at' => NULL,
                'description' => 'This service will be completed Online/Remotely. 🧑🏻‍🔧🔧🪛',
                'id' => 27,
                'is_featured' => 1,
                'name' => 'Remote Services',
                'status' => 1,
                'category_image' => public_path('/images/category-images/remote_service.png'),
                'updated_at' => '2023-09-04 13:05:01',
            ],
        ];
        
        foreach ($data as $key => $val) {
            $featureImage = $val['category_image'] ?? null;
            $categoryData = Arr::except($val, ['category_image']);
            $category = Category::create($categoryData);
            if (isset($featureImage)) {
                $this->attachFeatureImage($category, $featureImage);
            }
        } 
    }

    private function attachFeatureImage($model, $publicPath)
    {

        $file = new \Illuminate\Http\File($publicPath);

        $media = $model->addMedia($file)->preservingOriginal()->toMediaCollection('category_image');

        return $media;

    }
}