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
        Schema::create('tumanlar', function (Blueprint $table) {
            $table->id();
            $table->string("tuman_nomi", 255);
            $table->unsignedBigInteger("maydon_id");
            $table->foreign('maydon_id')->references('id')->on('maydonlar');
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
        Schema::dropIfExists('tumanlar');
    }
};
