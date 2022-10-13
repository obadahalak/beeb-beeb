<?php

namespace App\Http\Resources;

use App\Http\enum\nameSections;
use App\Http\Traits\rateCalculation;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BeebBeebResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    use rateCalculation ;
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'lat'=>$this->lat,
            'long' =>$this->long,
            'description'=>$this->description,
            'rating'=>$this->getRating(nameSections::beebSection->value,$this->id),
            // 'offer'=>'',
            'time'=>$this->time,
            'images'=>ImageResource::collection($this->images),
        ];
    }
}
