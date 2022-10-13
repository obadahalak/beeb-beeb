<?php

namespace Database\Factories;

use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfferProducts>
 */
class OfferProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $discount=[20,30,40];
        return [
            'products_id'=>Products::all()->random()->id,
            'code'=>"generateCode". random_int(1,1000),
            'discount'=>$discount[random_int(0,2)],
            'expire_date'=>Carbon::now()->addDays(5),
            'status'=>true,
        ];
    }
}
