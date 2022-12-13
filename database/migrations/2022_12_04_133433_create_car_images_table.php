<?php

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
        Schema::create('car_images', function (Blueprint $table) {
            $table->id("image_id");
            $table->foreignIdFor(\App\Models\Car::class,"car_id");
            $table->string("image_url");
            $table->string("alt")->nullable();
            $table->string("seq")->default(0);
            $table->boolean("is_active")->default("0");
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
        Schema::dropIfExists('car_images');
    }
};
