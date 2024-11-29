<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProviderSlotMapping;

class ProviderSlotController extends Controller
{
    public function getProviderSlot(Request $request){
        $provider_id = $request->provider_id ?? auth()->user()->id;
        date_default_timezone_set($admin->time_zone ?? 'UTC');

        $current_time = \Carbon\Carbon::now();
        $time = $current_time->toTimeString();

        $current_day = strtolower(date('D'));



        $days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

        $slotsArray = [];
        $activeDay ='mon';
        foreach ($days as $value) {
            $slot = ProviderSlotMapping::where('provider_id', $provider_id)
            ->where('days', $value)
            ->orderBy('start_at', 'asc')
            ->pluck('start_at')
            ->toArray();

            $obj = [
                "day" => $value,
                "slot" => $slot,
            ];
            array_push($slotsArray, $obj);
        }


        return comman_custom_response($slotsArray);
    }
}
