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
        Schema::create('cars', function (Blueprint $table) {


            $table->id("car_id");
            $table->foreignIdFor(\App\Models\Category::class,"category_id");
            $table->foreignIdFor(\App\Models\User::class,"user_id");
            $table->string("name");
            $table->integer("km");
            $table->integer("model");
            $table->string("brand");
            $table->decimal("price");
            $table->string("fuel");
            $table->decimal("engine");
            $table->string("slug");
            $table->text("description");
            $table->boolean("is_active")->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
