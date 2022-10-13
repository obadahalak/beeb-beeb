<?php

namespace Database\Factories;

use App\Models\BeebBeebSections;
use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::all()->random()->id,
            'products_id'=>Products::all()->random()->id,
            'beeb_beeb_sections_id'=>BeebBeebSections::all()->random()->id,
            'rate'=>random_int(1,5),
            'review'=>fake()->text(50),
        ];
    }
}
