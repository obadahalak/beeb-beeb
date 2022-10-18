<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Carts;
use App\Models\Owners;
use App\Models\Drivers;
use App\Models\Reviews;
use App\Models\Section;
use App\Models\Products;
use App\Models\Attribute;
use App\Models\BannerImages;
use App\Models\OfferProducts;
use Illuminate\Database\Seeder;
use App\Models\BeebBeebSections;
use App\Models\CategoryProducts;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        BannerImages::factory(10)->create();
       // Attribute::factory(3)->create();
      //Carts::factory(1)->create();
       // OfferProducts::factory(5)->create();
     // Reviews::factory(10)->create();
       // Products::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // BeebBeebSections::factory(1)->create()->each(function($u){

        //     $u->images()->create([
        //         'src'=>'beeb_beeb_images/image22.png',
        //         'type' =>'image',
        //     ]);
        //     $u->images()->create([
        //         'src'=>'beeb_beeb_logo/image22.png',
        //         'type' =>'logo',
        //     ]);
        // });

    //CategoryProducts::factory(1)->create();
     //   Owners::factory(3)->create();
        //Section::factory(1)->create();
        // \App\Models\User::factory(10)->create();


    }
}
