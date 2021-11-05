<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidoComponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_componentes', function (Blueprint $table) {
            $table->id();
            $table->integer('hora');
            $table->unsignedBigInteger('componentes_id');
            $table->foreign('componentes_id')->references('id')->on('componentes');
            $table->unsignedBigInteger('contenidos_id');
            $table->foreign('contenidos_id')->references('id')->on('contenidos');
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
        Schema::dropIfExists('contenido_componentes');
    }
}
