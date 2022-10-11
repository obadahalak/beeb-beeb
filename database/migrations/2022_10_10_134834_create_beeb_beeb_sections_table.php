<?php

use App\Models\Owners;
use App\Models\Section;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beeb_beeb_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Owners::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Section::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('phone');
            $table->text('address');
            $table->string('lat');
            $table->string('long');
            //$table->string('image');
            //$table->string('photos');
            $table->text('description');
            $table->json('time');
            $table->json('delivery');
            $table->boolean('is_open');
            $table->boolean('stauts');

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
        Schema::dropIfExists('beeb_beeb_sections');
    }
};
