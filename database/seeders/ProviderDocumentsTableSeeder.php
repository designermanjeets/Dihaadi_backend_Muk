<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\ProviderDocument;

class ProviderDocumentsTableSeeder extends Seeder
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
                'created_at' => '2023-10-12 09:46:54',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 1,
                'is_verified' => 0,
                'provider_id' => 6,
                'updated_at' => '2023-10-12 09:48:31',
                'provider_document' => public_path('/images/provider-document/andrew/driving_licence_andrew.png'),
            ],
            [
                'created_at' => '2023-10-12 09:47:44',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 3,
                'is_verified' => 1,
                'provider_id' => 6,
                'updated_at' => '2023-10-12 09:48:31',
                'provider_document' => public_path('/images/provider-document/andrew/passport_andrew.png'),
            ],
            [
                'created_at' => '2023-10-12 09:50:41',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 4,
                'is_verified' => 0,
                'provider_id' => 10,
                'updated_at' => '2023-10-12 09:50:41',
                'provider_document' => public_path('/images/provider-document/beverly/passport_beverly.png'),
            ],
            [
                'created_at' => '2023-10-12 09:51:09',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 6,
                'is_verified' => 1,
                'provider_id' => 10,
                'updated_at' => '2023-10-12 09:51:27',
                'provider_document' => public_path('/images/provider-document/beverly/driving_licence_beverly.png'),
            ],
            [
                'created_at' => '2023-10-12 09:52:46',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 7,
                'is_verified' => 0,
                'provider_id' => 16,
                'updated_at' => '2023-10-12 09:52:46',
                'provider_document' => public_path('/images/provider-document/daniel/driving_licence_daniel.png'),
            ],
            [
                'created_at' => '2023-10-12 09:52:56',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 8,
                'is_verified' => 1,
                'provider_id' => 16,
                'updated_at' => '2023-10-12 09:53:07',
                'provider_document' => public_path('/images/provider-document/daniel/passport_daniel.png'),
            ],
            [
                'created_at' => '2023-10-12 09:54:30',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 9,
                'is_verified' => 1,
                'provider_id' => 8,
                'updated_at' => '2023-10-12 10:26:59',
                'provider_document' => public_path('/images/provider-document/danny/driving_licence_danny.png'),
            ],
            [
                'created_at' => '2023-10-12 09:54:36',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 10,
                'is_verified' => 0,
                'provider_id' => 8,
                'updated_at' => '2023-10-12 09:54:36',
                'provider_document' => public_path('/images/provider-document/danny/passport_danny.png'),
            ],
            [
                'created_at' => '2023-10-12 09:56:33',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 11,
                'is_verified' => 1,
                'provider_id' => 14,
                'updated_at' => '2023-10-12 09:56:53',
                'provider_document' => public_path('/images/provider-document/venesa/passport_venesa.png'),
            ],
            [
                'created_at' => '2023-10-12 09:56:42',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 12,
                'is_verified' => 0,
                'provider_id' => 14,
                'updated_at' => '2023-10-12 09:56:42',
                'provider_document' => public_path('/images/provider-document/venesa/driving_licence_venesa.png'),
            ],
            [
                'created_at' => '2023-10-12 09:59:17',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 13,
                'is_verified' => 0,
                'provider_id' => 9,
                'updated_at' => '2023-10-12 09:59:17',
                'provider_document' => public_path('/images/provider-document/kahlil/driving_licence_kahlil.png'),
            ],
            [
                'created_at' => '2023-10-12 09:59:21',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 14,
                'is_verified' => 1,
                'provider_id' => 9,
                'updated_at' => '2023-10-12 09:59:35',
                'provider_document' => public_path('/images/provider-document/kahlil/passport_kahlil.png'),
            ],
            [
                'created_at' => '2023-10-12 10:00:38',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 15,
                'is_verified' => 0,
                'provider_id' => 13,
                'updated_at' => '2023-10-12 10:00:38',
                'provider_document' => public_path('/images/provider-document/richard/driving_licence_richard.png'),
            ],
            [
                'created_at' => '2023-10-12 10:00:43',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 16,
                'is_verified' => 1,
                'provider_id' => 13,
                'updated_at' => '2023-10-12 10:05:39',
                'provider_document' => public_path('/images/provider-document/richard/passport_richard.png'),
            ],
            [
                'created_at' => '2023-10-12 10:04:03',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 18,
                'is_verified' => 1,
                'provider_id' => 17,
                'updated_at' => '2023-10-12 10:05:37',
                'provider_document' => public_path('/images/provider-document/katie/driving_licence_katie.png'),
            ],
            [
                'created_at' => '2023-10-12 10:06:32',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 19,
                'is_verified' => 0,
                'provider_id' => 17,
                'updated_at' => '2023-10-12 10:06:32',
                'provider_document' => public_path('/images/provider-document/katie/passport_katie.png'),
            ],
            [
                'created_at' => '2023-10-12 10:19:12',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 20,
                'is_verified' => 1,
                'provider_id' => 15,
                'updated_at' => '2023-10-12 10:19:55',
                'provider_document' => public_path('/images/provider-document/jorge/driving_licence_jorge.png'),
            ],
            [
                'created_at' => '2023-10-12 10:19:39',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 22,
                'is_verified' => 1,
                'provider_id' => 15,
                'updated_at' => '2023-10-12 10:19:55',
                'provider_document' => public_path('/images/provider-document/jorge/passport_jorge.png'),
            ],
            [
                'created_at' => '2023-10-12 10:21:44',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 23,
                'is_verified' => 0,
                'provider_id' => 7,
                'updated_at' => '2023-10-12 10:21:44',
                'provider_document' => public_path('/images/provider-document/jennifer/passport_jennifer.png'),
            ],
            [
                'created_at' => '2023-10-12 10:21:49',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 24,
                'is_verified' => 0,
                'provider_id' => 7,
                'updated_at' => '2023-10-12 10:21:49',
                'provider_document' => public_path('/images/provider-document/jennifer/driving_licence_jennifer.png'),
            ],
            [
                'created_at' => '2023-10-12 10:24:06',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 25,
                'is_verified' => 1,
                'provider_id' => 12,
                'updated_at' => '2023-10-12 10:24:33',
                'provider_document' => public_path('/images/provider-document/erik/driving_licence_erik.png'),
            ],
            [
                'created_at' => '2023-10-12 10:25:01',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 27,
                'is_verified' => 0,
                'provider_id' => 12,
                'updated_at' => '2023-10-12 10:25:01',
                'provider_document' => public_path('/images/provider-document/erik/passport_erik.png'),
            ],
            [
                'created_at' => '2023-10-12 10:26:20',
                'deleted_at' => NULL,
                'document_id' => 3,
                'id' => 28,
                'is_verified' => 0,
                'provider_id' => 4,
                'updated_at' => '2023-10-12 10:26:39',
                'provider_document' => public_path('/images/provider-document/felix/passport_felix.png'),
            ],
            [
                'created_at' => '2023-10-12 10:26:26',
                'deleted_at' => NULL,
                'document_id' => 5,
                'id' => 29,
                'is_verified' => 1,
                'provider_id' => 4,
                'updated_at' => '2023-10-12 10:26:35',
                'provider_document' => public_path('/images/provider-document/felix/driving_licence_felix.png'),
            ],
        ];
        
        foreach ($data as $key => $val) {
            $featureImage = $val['provider_document'] ?? null;
            $providerDocData = Arr::except($val, ['provider_document']);
            $provider_document = ProviderDocument::create($providerDocData);
            if (isset($featureImage)) {
                $this->attachFeatureImage($provider_document, $featureImage);
            }
        }
    }
    private function attachFeatureImage($model, $publicPath)
    {

        $file = new \Illuminate\Http\File($publicPath);

        $media = $model->addMedia($file)->preservingOriginal()->toMediaCollection('provider_document');

        return $media;

    }
}