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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->string('name')->nullable();
            $table->string('video_link')->nullable();
            $table->integer('type')->default(0)->comment('Rent : 1, Sale : 2');
            $table->integer('status')->default(0)->comment('pending : 0, approved : 1, cancel : 2');
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
        Schema::dropIfExists('properties');
    }
};
