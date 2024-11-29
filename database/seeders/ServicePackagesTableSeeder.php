<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\ServicePackage;

class ServicePackagesTableSeeder extends Seeder
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
                'category_id' => 14,
                'created_at' => '2023-09-09 12:45:30',
                'description' => 'Elevate your look with our Hair Cutting and Coloring Combo Package. Our skilled stylists craft personalized haircuts and add vibrant color, creating a harmonious transformation that matches your style and personality, all in one convenient package. ??',
                'end_at' => '2026-09-30 00:00:00',
                'id' => 1,
                'is_featured' => 0,
                'name' => 'Hair Cutting and Coloring',
                'package_type' => 'single',
                'price' => 50.0,
                'provider_id' => 4,
                'start_at' => '2023-09-09 00:00:00',
                'status' => 1,
                'package_attachment' => public_path('/images/package/hair_cutting_and_coloring.png'),
                'subcategory_id' => 25,
                'updated_at' => '2023-10-06 06:31:48',
            ],
            [
                'category_id' => 18,
                'created_at' => '2023-10-06 06:53:26',
                'description' => 'Enhance your interior with our Multi-Frame Set Painting and Artistic Frame Design combo package! Our talented artists will create stunning paintings tailored to your style, while our frame designers will craft custom frames to complement your artwork. Transform your space into a work of art with this perfect pairing. ??‍??️?',
                'end_at' => '2026-12-31 12:00:00',
                'id' => 3,
                'is_featured' => 0,
                'name' => 'Frame Painting',
                'package_type' => 'single',
                'price' => 55.0,
                'provider_id' => 4,
                'start_at' => '2023-10-06 12:00:00',
                'status' => 1,
                'package_attachment' => public_path('/images/package/frame_painting_1.png'),
                'subcategory_id' => 36,
                'updated_at' => '2023-10-06 06:53:26',
            ],
            [
                'category_id' => 19,
                'created_at' => '2023-10-06 07:05:09',
                'description' => 'Experience luxury in every thread with our Laundry Service Package ! This package combines meticulous Silk and Designer Garment ??? Care with the pristine Evening Gown and Formal Attire Cleaning. We ensure your most delicate fabrics and special outfits receive the royal treatment, leaving you looking and feeling fabulous for any occasion. ???',
                'end_at' => NULL,
                'id' => 4,
                'is_featured' => 0,
                'name' => 'Laundry Service Package',
                'package_type' => 'single',
                'price' => 38.0,
                'provider_id' => 4,
                'start_at' => NULL,
                'status' => 1,
                'package_attachment' => public_path('/images/package/laundry_service_package_1.png'),
                'subcategory_id' => 38,
                'updated_at' => '2023-10-06 07:05:09',
            ],
            [
                'category_id' => NULL,
                'created_at' => '2023-10-06 07:19:45',
                'description' => 'GreenGuard and CommercialShield provide comprehensive security solutions for both your green spaces and commercial buildings. With our expert services, your properties are protected inside and out, ensuring safety and peace of mind.',
                'end_at' => NULL,
                'id' => 5,
                'is_featured' => 0,
                'name' => 'GreenGuard and CommercialShield: Your Space\'s Protectors',
                'package_type' => 'multiple',
                'price' => 48.0,
                'provider_id' => 17,
                'start_at' => NULL,
                'status' => 1,
                'package_attachment' => public_path('/images/package/greenguard_and_commercialshield_1.png'),
                'subcategory_id' => NULL,
                'updated_at' => '2023-10-06 07:20:28',
            ],
            [
                'category_id' => NULL,
                'created_at' => '2023-10-06 07:25:51',
                'description' => 'Upgrade your space with Carpentry and Sanitization! Our skilled carpenters bring your vision to life, while our sanitization experts ensure a clean and safe environment. It\'s the perfect combination of craftsmanship and cleanliness for your home or office. ⚒️?',
                'end_at' => NULL,
                'id' => 6,
                'is_featured' => 0,
                'name' => 'Carpentry and Sanitization',
                'package_type' => 'multiple',
                'price' => 37.0,
                'provider_id' => 4,
                'start_at' => NULL,
                'status' => 1,
                'package_attachment' => public_path('/images/package/carpentry_and_sanitization_1.png'),
                'subcategory_id' => NULL,
                'updated_at' => '2023-10-06 07:25:51',
            ],
            [
                'category_id' => NULL,
                'created_at' => '2023-10-06 07:35:25',
                'description' => 'Boost your home\'s safety and efficiency with our Smart Home Protection Suite. This comprehensive package includes Alarm System Installation, Smart Lighting Installation, Smart Appliance Integration, Leak Repair, and Sewer Line Cleaning. Enjoy peace of mind and convenience, all in one package. ???‍??',
                'end_at' => NULL,
                'id' => 7,
                'is_featured' => 0,
                'name' => 'Smart Home Protection Suite',
                'package_type' => 'multiple',
                'price' => 30.0,
                'provider_id' => 4,
                'start_at' => NULL,
                'status' => 1,
                'package_attachment' => public_path('/images/package/smart_home_protection_suite_1.png'),
                'subcategory_id' => NULL,
                'updated_at' => '2023-10-06 07:35:25',
            ],
            [
                'category_id' => 22,
                'created_at' => '2023-10-06 08:22:05',
                'description' => 'Discover diverse culinary delights with our Authentic Mexican Chef ??? , Chinese Food ??  and Italian Cook ?? combo service. Indulge in a world of flavors, all in one package.  ??',
                'end_at' => NULL,
                'id' => 8,
                'is_featured' => 0,
                'name' => 'Global Gourmet Fusion',
                'package_type' => 'single',
                'price' => 68.0,
                'provider_id' => 4,
                'start_at' => NULL,
                'status' => 1,
                'package_attachment' => public_path('/images/package/global_gourmet_fusion_1.png'),
                'subcategory_id' => 9,
                'updated_at' => '2023-10-06 08:22:05',
            ],
        ];
        
        foreach ($data as $key => $val) {
            $featureImage = $val['package_attachment'] ?? null;
            $servicePackageData = Arr::except($val, ['package_attachment']);
            $service_package = ServicePackage::create($servicePackageData);
            if (isset($featureImage)) {
                $this->attachFeatureImage($service_package, $featureImage);
            }
        } 
    }
    private function attachFeatureImage($model, $publicPath)
    {

        $file = new \Illuminate\Http\File($publicPath);

        $media = $model->addMedia($file)->preservingOriginal()->toMediaCollection('package_attachment');

        return $media;

    }
}