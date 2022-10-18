<?php

namespace App\Http\Resources;

use App\Http\enum\nameSections;
use App\Http\Traits\rateCalculation;
use App\Http\Resources\AttributeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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


        if (auth('sanctum')->check()) {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'discount_price' => $this->dicount_price,
                'price' => $this->price,
                'description' => $this->description,
                'intgredients' => $this->intgredients,
                'addons'=>AttributeResource::collection($this->attributes),
                'rating' => $this->getRating(nameSections::product->value, $this->id),
                'offer' => $this->offer->discount ?? false,
                'image' => new ImageResource($this->image),
                'like' => $this->islike ? true : false,
            ];
        } else {


            return [
                'id' => $this->id,
                'name' => $this->name,
                'discount_price' => $this->dicount_price,
                'price' => $this->price,
                'description' => $this->description,
                'intgredients' => $this->intgredients,
                'addons'=>AttributeResource::collection($this->attributes),
                'rating' => $this->getRating(nameSections::product->value, $this->id),
                'offer' => $this->offer->discount ?? false,
                'image' => new ImageResource($this->image),
                'like' => 'not auth',
            ];
        }
    }
}
