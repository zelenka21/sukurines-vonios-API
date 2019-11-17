<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
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
        'title' => $this->title,
        'description' => $this->description,
        'location' => $this->location,
        'image' => $this->image
      ];
       // return parent::toArray($request);
    }
}
