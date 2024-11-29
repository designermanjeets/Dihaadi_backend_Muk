<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Bank;

class BanksTableSeeder extends Seeder
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
                'aadhar_no' => '4584785478547965',
                'account_no' => '045874857485678',
                'bank_name' => 'ITB Bank',
                'branch_name' => 'North Battleford, SK, Canada',
                'created_at' => '2023-10-12 07:17:52',
                'deleted_at' => NULL,
                'id' => 2,
                'ifsc_no' => 'ITB000B7INSC',
                'mobile_no' => '1-81289567',
                'pan_no' => 'IY25RT5841',
                'provider_id' => 4,
                'status' => 1,
                'stripe_account' => NULL,
                'updated_at' => '2023-10-12 07:17:52',
                'bank_attachment' => public_path('/images/bank/itb_bank.png'),
            ],
            [
                'aadhar_no' => '2564785478547698',
                'account_no' => '045475857485678',
                'bank_name' => 'IYB Bank',
                'branch_name' => 'Edinburgh, Scotland, UK',
                'created_at' => '2023-10-12 07:21:06',
                'deleted_at' => NULL,
                'id' => 3,
                'ifsc_no' => 'IYB000B7NSC',
                'mobile_no' => '44-85748545',
                'pan_no' => 'IY56RT5854',
                'provider_id' => 17,
                'status' => 1,
                'stripe_account' => NULL,
                'updated_at' => '2023-10-12 07:21:06',
                'bank_attachment' => public_path('/images/bank/iyb_bank.png'),
            ],
            [
                'aadhar_no' => '2563865478547415',
                'account_no' => '087574857485663',
                'bank_name' => 'RQI Bank',
                'branch_name' => 'Frankston, Victoria, Australia',
                'created_at' => '2023-10-12 07:29:09',
                'deleted_at' => NULL,
                'id' => 4,
                'ifsc_no' => 'RQIB0003FVA',
                'mobile_no' => '63-98512454',
                'pan_no' => 'WQR25ORT58',
                'provider_id' => 16,
                'status' => 1,
                'stripe_account' => NULL,
                'updated_at' => '2023-10-12 07:29:09',
                'bank_attachment' => public_path('/images/bank/rqi_bank.png'),
            ],
            [
                'aadhar_no' => '5634785451547961',
                'account_no' => '046374857456373',
                'bank_name' => 'PEV Bank',
                'branch_name' => 'Melbourne, Australia',
                'created_at' => '2023-10-12 07:33:33',
                'deleted_at' => NULL,
                'id' => 5,
                'ifsc_no' => 'PEVB0007NSC',
                'mobile_no' => '61-85749687',
                'pan_no' => 'FT25RT5832',
                'provider_id' => 14,
                'status' => 1,
                'stripe_account' => NULL,
                'updated_at' => '2023-10-12 07:33:33',
                'bank_attachment' => public_path('/images/bank/pev_bank.png'),
            ],
            [
                'aadhar_no' => '1546785478563912',
                'account_no' => '038574857485643',
                'bank_name' => 'DTO Bank',
                'branch_name' => 'Ontario, Barrie, Canada',
                'created_at' => '2023-10-12 07:41:15',
                'deleted_at' => NULL,
                'id' => 6,
                'ifsc_no' => 'DTB0007OBT',
                'mobile_no' => '1-6674859612',
                'pan_no' => 'RI25RT5833',
                'provider_id' => 12,
                'status' => 1,
                'stripe_account' => NULL,
                'updated_at' => '2023-10-12 07:41:15',
                'bank_attachment' => public_path('/images/bank/dto_bank.png'),
            ],
            [
                'aadhar_no' => '3325785478547941',
                'account_no' => '025574637485696',
                'bank_name' => 'MPR Bank',
                'branch_name' => 'Belfast, UK',
                'created_at' => '2023-10-12 07:46:34',
                'deleted_at' => NULL,
                'id' => 7,
                'ifsc_no' => 'MPB0007NBU',
                'mobile_no' => '44-5874968574',
                'pan_no' => 'KI56YU65417',
                'provider_id' => 7,
                'status' => 1,
                'stripe_account' => NULL,
                'updated_at' => '2023-10-12 07:46:34',
                'bank_attachment' => public_path('/images/bank/mpr_bank.png'),
            ],
            [
                'aadhar_no' => '4585785421547945',
                'account_no' => '0235564657485789',
                'bank_name' => 'HTB Bank',
                'branch_name' => 'Augusta, ME, USA',
                'created_at' => '2023-10-12 07:51:49',
                'deleted_at' => NULL,
                'id' => 8,
                'ifsc_no' => 'HTB0007AMU',
                'mobile_no' => '1-5896547896',
                'pan_no' => 'FT675R467U',
                'provider_id' => 9,
                'status' => 1,
                'stripe_account' => NULL,
                'updated_at' => '2023-10-12 07:51:49',
                'bank_attachment' => public_path('/images/bank/htb_bank.png'),
            ],
        ];
        
        foreach ($data as $key => $val) {
            $featureImage = $val['bank_attachment'] ?? null;
            $bankData = Arr::except($val, ['bank_attachment']);
            $bank = Bank::create($bankData);
            if (isset($featureImage)) {
                $this->attachFeatureImage($bank, $featureImage);
            }
        }
    }
    private function attachFeatureImage($model, $publicPath)
    {

        $file = new \Illuminate\Http\File($publicPath);

        $media = $model->addMedia($file)->preservingOriginal()->toMediaCollection('bank_attachment');

        return $media;

    }
}