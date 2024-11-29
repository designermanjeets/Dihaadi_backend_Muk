<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FrontendSetting;
use App\Http\Resources\API\LandingPageSettingResource;
use App\Models\PaymentGateway;
use App\Http\Resources\API\PaymentGatewayResource;


class FrontendSettingController extends Controller
{
    public function getLandingPageSetting(Request $request){
        $landingPage = FrontendSetting::where('status',1);

        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page)){
                $per_page = $request->per_page;
            }
            if($request->per_page === 'all' ){
                $per_page = $landingPage->count();
            }
        }
        $landingPage = $landingPage->paginate($per_page);
        $items = LandingPageSettingResource::collection($landingPage);

        $response = [
            'pagination' => [
                'total_items' => $items->total(),
                'per_page' => $items->perPage(),
                'currentPage' => $items->currentPage(),
                'totalPages' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem(),
                'next_page' => $items->nextPageUrl(),
                'previous_page' => $items->previousPageUrl(),
            ],
            'data' => $items,
        ];

        return comman_custom_response($response);
    }

    public function getPaymentGatewayList(Request $request){
        $paymentstatus = PaymentGateway::where('status',1);

        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page)){
                $per_page = $request->per_page;
            }
            if($request->per_page === 'all' ){
                $per_page = $paymentstatus->count();
            }
        }
        $paymentstatus = $paymentstatus->paginate($per_page);
        $items = PaymentGatewayResource::collection($paymentstatus);

        $response = [
            'pagination' => [
                'total_items' => $items->total(),
                'per_page' => $items->perPage(),
                'currentPage' => $items->currentPage(),
                'totalPages' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem(),
                'next_page' => $items->nextPageUrl(),
                'previous_page' => $items->previousPageUrl(),
            ],
            'data' => $items,
        ];

        return comman_custom_response($response);
    }


}
