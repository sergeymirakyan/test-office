<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'address_1'     => $this->address_1,
            'address_2'     => $this->address_2,
            'postal_code'   => $this->postal_code,
            'lat'           => $this->lat,
            'lng'           => $this->long,
            'country'       => new CountryResource($this->country),
        ];
    }
}
