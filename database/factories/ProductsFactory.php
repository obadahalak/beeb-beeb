<?php

namespace Database\Factories;

use App\Models\BeebBeebSections;
use App\Models\CategoryProducts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        $beebBeeb = BeebBeebSections::all()->random();
        $category_products_id = CategoryProducts::where('section_id', $beebBeeb->section_id)->first();
        $preparing_time = 30;
        $integredients = [
            'colories' => 22,
            'grams' => 100,
            'fats' => 0,
            'proteins' => 22,
        ];
        $size = [
            'small' => 230,
            'big' => 350
        ];
        $addons = [
            'more mayonnaise' => 5,
            'more ketchup' => 5,
        ];

        return [
            'beeb_beeb_sections_id' => $beebBeeb->id,
            'section_id' => $beebBeeb->section_id,
            'category_products_id' => $category_products_id,
            'name' => 'productName',
            'price' => '230',
            'dicount_price' => '200',
            'description' => fake()->text(60),
            'preparing_time' => $preparing_time,
            'non_veg' => true,
            'intgredients' =>array_to_string($integredients),
            'size' =>array_to_string($size),
            'addons' =>array_to_string($addons),
            'status' => true

        ];
    }
}
