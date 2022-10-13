<?php

use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use App\Models\BeebBeebSections;
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Products::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Orders::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(BeebBeebSections::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->double('rate');
            $table->text('review');
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
        Schema::dropIfExists('reviews');
    }
};
