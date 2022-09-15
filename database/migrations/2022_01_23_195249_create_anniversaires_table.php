<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnniversairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anniversaires', function (Blueprint $table) {
            $table->id();
            $table->integer('id_orchestre');
            $table->integer('id_traiteure');
            $table->integer('id_salle');
            $table->integer('id_cameramen');
            $table->integer('id_tartes');
            $table->integer('id_lebsa');
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
        Schema::dropIfExists('anniversaires');
    }
}
