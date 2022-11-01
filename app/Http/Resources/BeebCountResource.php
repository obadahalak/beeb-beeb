<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BeebCountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (auth()->check()) {

            return [
                'id' => $this->id,
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'lat' => $this->lat,
                'long' => $this->long,
                'description' => $this->description,
                'rating' => $this->rate ,
                'offer' => $this->offer && $this->offer->status ? ($this->offer->offer) : false,
                'time' => $this->time,
                'delivery_cost' => $this->delivery_cost,
                'delivery_date' => $this->delivery_date,
                'images' => ImageResource::collection($this->images),
                'like' => $this->islike ? true : false,

            ];
        } else {


            return [
                'id' => $this->id,
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'lat' => $this->lat,
                'long' => $this->long,
                'description' => $this->description,
                'rating' => $this->rate ,
                'offer' => $this->offer && $this->offer->status ? ($this->offer->offer) : false,
                'time' => $this->time,
                'delivery_cost' => $this->delivery_cost,
                'delivery_date' => $this->delivery_date,
                'images' => ImageResource::collection($this->images),
                'like' => 'not auth',

            ];
        }
    }
}
