<?php

namespace App\Http\Resources;

use App\Http\enum\nameSections;
use App\Http\Traits\rateCalculation;
use Illuminate\Http\Resources\Json\JsonResource;

class wishListResource extends JsonResource
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

        return[


            'id' => $this->product->id,
            'name' => $this->product->name,
            'discount_price' => $this->product->dicount_price,
            'price' => $this->product->price,
            'description' => $this->product->description,
            'size' => $this->product->size,
            'addons' => $this->product->addons,
            'intgredients' => $this->product->intgredients,
            'rating' => $this->getRating(nameSections::product->value, $this->product->id),
            'offer' => $this->product->offer->discount ?? false,
            'image' => new ImageResource($this->product->image),
        ];


    }
}
