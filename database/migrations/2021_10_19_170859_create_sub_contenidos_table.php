<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_contenidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreSubContenido');
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
        Schema::dropIfExists('sub_contenidos');
    }
}
