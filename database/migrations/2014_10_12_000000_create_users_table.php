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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("surname");
            $table->string("phone_number");
            $table->string("username");
            $table->string("role");
            $table->string("permissions");
            $table->unsignedBigInteger("viloyat_id")->nullable();
            $table->unsignedBigInteger("tuman_id")->nullable();
            $table->unsignedBigInteger("maydon_id")->nullable();
            $table->foreign('viloyat_id')->references('id')->on('viloyatlar');
            $table->foreign('tuman_id')->references('id')->on('tumanlar');
            $table->foreign('maydon_id')->references('id')->on('maydonlar');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
