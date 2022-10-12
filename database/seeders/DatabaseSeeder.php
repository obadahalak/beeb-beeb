<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Owners;
use App\Models\Drivers;
use App\Models\Section;
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

        BeebBeebSections::factory(1)->create()->each(function($u){

            $u->image()->create([
                'src'=>'beeb_beeb_images/image3.png',
            ]);
        });

    //CategoryProducts::factory(1)->create();
     //   Owners::factory(3)->create();
        //Section::factory(1)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
