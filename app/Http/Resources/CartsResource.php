<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Http\enum\nameSections;
use App\Http\Traits\rateCalculation;
use App\Http\Resources\ImageResource;
use App\Http\Resources\AddonseResource;
use App\Http\Resources\AttributeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartsResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->product->name,
            'description' => $this->product->description,
            'another_addons'=>$this->addons->another ?? null,
            'addons'=> AddonseResource::collection(Attribute::whereIn('id',$this->addons->add_id ?? [])->get()) ,
            'image' => new ImageResource($this->product->image),
            'quantity'=>$this->quantity,
            'ammount_after_discount'=>$this->ammount_after_discount,
            'ammount_befor_discount'=>$this->ammount_befor_discount,
            'ammount_after_offer'=>$this->ammount_after_offer,

                
        ];
    }
}
