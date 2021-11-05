<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadoContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado_contenidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resultado_id');
            $table->foreign('resultado_id')->references('id')->on('resultados');
            $table->unsignedBigInteger('contenido_id');
            $table->foreign('contenido_id')->references('id')->on('contenidos');
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
        Schema::dropIfExists('resultado_contenidos');
    }
}
