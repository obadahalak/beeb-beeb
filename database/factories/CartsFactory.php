<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carts>
 */
class CartsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'products_id'=>Products::all()->random()->id,
            'user_id'=>User::find(1)->id,
            'quantity'=>random_int(1,5),
            
        ];
    }
}
