<?php

use App\Models\User;
use App\Models\Products;
use App\Models\BeebBeebSections;
use App\Models\Drivers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use SebastianBergmann\CodeCoverage\Driver\Driver;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BeebBeebSections::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Drivers::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Products::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('size_addons');
            $table->integer('quantity');
            $table->double('ammount_after_discount');
            $table->double('ammount_befor_discount');
            $table->double('total_after_offer');
            $table->enum('order_status',['Accepted','Reject','Preparing','under_delivey','near_address','is_deleverey'])->default('Accepted');
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
        Schema::dropIfExists('orders');
    }
};
