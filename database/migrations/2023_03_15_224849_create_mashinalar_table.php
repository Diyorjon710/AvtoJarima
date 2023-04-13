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
        Schema::create('mashinalar', function (Blueprint $table) {
            $table->id();
            $table->string("car_name", 255);
            $table->string("car_number", 255);
            $table->string("car_jarimasi", 255);
            $table->float("car_jarima_narxi");
            $table->string("car_image", 255);
            $table->unsignedBigInteger("maydon_id");
            $table->unsignedBigInteger("viloyat_id");
            $table->unsignedBigInteger("tuman_id");
            $table->foreign('maydon_id')->references('id')->on('maydonlar');
            $table->foreign('viloyat_id')->references('id')->on('viloyatlar');
            $table->foreign('tuman_id')->references('id')->on('tumanlar');
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
        Schema::dropIfExists('mashinalar');
    }
};
