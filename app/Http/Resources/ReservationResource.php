<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
        'id' => $this->id,
        'user_id' => $this->user_id,
        'apartment_id' => $this->apartment_id,
        'guestCount' => $this->guestCount,
        'arrival' => (string) $this->arrival,
        'departure' => (string) $this->departure,
      ];

    }
}
