<?php

use App\Models\Section;
use App\Models\BeebBeebSections;
use App\Models\CategoryProducts;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BeebBeebSections::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Section::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(CategoryProducts::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->double('dicount_price');
            $table->double('price');
           // $table->string('image');
            $table->text('description');
            $table->integer('preparing_time')->nullable();
            $table->boolean('non_veg')->nullable();
            $table->json('intgredients')->nullable();
            $table->json('size');
            $table->json('addons')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
