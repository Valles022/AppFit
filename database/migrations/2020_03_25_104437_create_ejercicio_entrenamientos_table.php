<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjercicioEntrenamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicio_entrenamiento', function (Blueprint $table) {
            $table->unsignedBigInteger('ejercicio_id');
            $table->unsignedBigInteger('entrenamiento_id');
            $table->foreign('ejercicio_id')->references('id')->on('ejercicios')->onDelete('cascade');;
            $table->foreign('entrenamiento_id')->references('id')->on('entrenamientos')->onDelete('cascade');;

            $table->integer('num_series');
            $table->integer('num_repes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejercicio_entrenamiento');
    }
}
