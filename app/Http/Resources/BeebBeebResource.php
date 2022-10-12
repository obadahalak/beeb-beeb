<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BeebBeebResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'lat'=>$this->lat,
            'long' =>$this->long,
            'description'=>$this->description,
            'time'=>$this->time,
            'image'=>$this->image->src
        ];
    }
}
