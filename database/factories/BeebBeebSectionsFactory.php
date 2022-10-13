<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BeebBeebSections>
 */
class BeebBeebSectionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $time=[
            'open_time'=>now()->format('h:m'),
            'close_time'=>now()->addHours(2)->format('h:m'),
        ];
        $offer=[
        'code'=>'code'.time(),
        'discount'=>20,
        'expire_date'=>now()->addDays(3),
        'status'=>true
    ];
        return [
            'owners_id' =>1,
            'section_id'=>2,
            'name'=>'New market',
            'phone'=>'1234567',
            'lat'=>'-76.82452',
            'long'=>'160.14189',
            'address'=>'syraia-damascus',
            'description'=>fake()->text(30),
            'time'=>$time,
            'delivery'=> json_encode('delivery-data'),
            'offer'=>$offer,
            'delivery_cost'=>1000,
            'status'=>false
        ];
    }
}
