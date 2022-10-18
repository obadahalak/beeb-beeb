<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $colors=['red','green','blue','yellow'];
        return [
            'products_id'=>Products::find(11)->id,
            'key'=>'size',
            'value'=>$colors[random_int(0,3)],
            'price'=>100,
        ];
    }
}
