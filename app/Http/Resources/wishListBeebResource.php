<?php

namespace App\Http\Resources;

use App\Http\enum\nameSections;
use App\Http\Traits\rateCalculation;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class wishListBeebResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    use rateCalculation;

    public function toArray($request)
    {
        return [
            'id'=>$this->beebSecton->id,
            'name'=>$this->beebSecton->name,
            'phone'=>$this->beebSecton->phone,
            'address'=>$this->beebSecton->address,
            'lat'=>$this->beebSecton->lat,
            'long' =>$this->beebSecton->long,
            'description'=>$this->beebSecton->description,
            'rating'=>$this->getRating(nameSections::beebSection->value,$this->beebSecton->id),
            'offer'=>$this->beebSecton->offer && $this->beebSecton->offer->status ? ($this->beebSecton->offer->offer) : false,
            'time'=>$this->beebSecton->time,
            'delivery_cost'=>$this->beebSecton->delivery_cost,
            'delivery_date'=>$this->beebSecton->delivery_date,
            'images'=>ImageResource::collection($this->beebSecton->images),
        ];
    }
}
