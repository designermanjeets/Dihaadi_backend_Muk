<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'country_id' => $this->id,
            'currency_name'=>$this->currency_name,
            'currency_symbol'=>$this->symbol,
            'currency_code'=>$this->currency_code,
        ];
    }
}
