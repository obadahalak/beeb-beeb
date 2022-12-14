<?php

use App\Models\cartUser;
use App\Models\Products;
use App\Models\User;
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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Products::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(cartUser::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('quantity')->default(1);
            $table->boolean('in_cart')->default(0);
            $table->json('addons')->nullable();
            $table->double('ammount_after_discount');
            $table->double('ammount_befor_discount');
            $table->double('ammount_after_offer');
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
        Schema::dropIfExists('carts');
    }
};
