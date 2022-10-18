<?php

use App\Models\User;
use App\Models\Products;
use App\Models\BeebBeebSections;
use App\Models\Carts;
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
            $table->json('products');
            $table->foreignIdFor(Drivers::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
