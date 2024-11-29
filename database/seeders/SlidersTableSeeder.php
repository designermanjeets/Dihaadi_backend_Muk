<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Slider;

class SlidersTableSeeder extends Seeder
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
                'created_at' => '2022-02-23 09:05:27',
                'deleted_at' => NULL,
                'description' => 'Transform your indoor spaces with a fresh coat of paint. Our experts will revitalize your home\'s interior, creating the atmosphere you desire. ?‍?',
                'id' => 1,
                'status' => 1,
                'title' => 'Interior Painting Service',
                'type' => 'service',
                'type_id' => '81',
                'updated_at' => '2023-10-03 10:41:33',
                'slider_image' => public_path('/images/slider/1.png'),
            ],
            [
                'created_at' => '2022-02-23 09:21:08',
                'deleted_at' => NULL,
                'description' => 'Discover the ideal furniture and decor pieces to complement your interior design style through our sourcing service. ?',
                'id' => 2,
                'status' => 1,
                'title' => 'Furniture and Decor Sourcing',
                'type' => 'service',
                'type_id' => '15',
                'updated_at' => '2023-10-03 11:24:31',
                'slider_image' => public_path('/images/slider/2.png'),
            ],
            [
                'created_at' => '2022-02-23 09:23:23',
                'deleted_at' => NULL,
                'description' => 'Create one-of-a-kind pieces with our custom design and fabrication service, tailored to your unique preferences. ??',
                'id' => 3,
                'status' => 1,
                'title' => 'Custom Design and Fabrication',
                'type' => 'service',
                'type_id' => '16',
                'updated_at' => '2023-10-03 11:25:40',
                'slider_image' => public_path('/images/slider/3.jpg'),
            ],
            [
                'created_at' => '2022-02-23 09:25:11',
                'deleted_at' => NULL,
                'description' => 'Optimize your living spaces for functionality and aesthetics with our expert space planning and layout design service. ?',
                'id' => 4,
                'status' => 1,
                'title' => 'Space Planning and Layout Design',
                'type' => 'service',
                'type_id' => '50',
                'updated_at' => '2023-10-03 11:25:53',
                'slider_image' => public_path('/images/slider/4.png'),
            ],
        ];
        
        foreach ($data as $key => $val) {
            $featureImage = $val['slider_image'] ?? null;
            $sliderData = Arr::except($val, ['slider_image']);
            $slider = Slider::create($sliderData);
            if (isset($featureImage)) {
                $this->attachFeatureImage($slider, $featureImage);
            }
        } 
    }
    private function attachFeatureImage($model, $publicPath)
    {

        $file = new \Illuminate\Http\File($publicPath);

        $media = $model->addMedia($file)->preservingOriginal()->toMediaCollection('slider_image');

        return $media;

    }
}