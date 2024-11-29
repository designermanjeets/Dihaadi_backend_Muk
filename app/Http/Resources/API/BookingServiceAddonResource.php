<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingServiceAddonResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'service_addon_id'    => $this->service_addon_id,
            'price'         => $this->price,
            'status'        => $this->status,
           'serviceaddon_image' => getSingleMedia($this->AddonserviceDetails, 'serviceaddon_image',null),
        ];
    }
}
