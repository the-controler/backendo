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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('car_name');
            $table->index('car_name');
            $table->foreign('car_name')->references('name')->on('cars')->onDelete('cascade');
            $table->integer('days');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->string('place');
            $table->double('price');
            $table->string('status');
            $table->string('payment-methode');
            $table->string('payment-status');

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
        Schema::dropIfExists('reservations');
    }
};
