<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id();
            $table->string('presentacion');
            $table->string('contextualizacion');
            $table->string('contribucion');
            $table->string('prerequisitos');
            $table->string('adaptaciones');
            $table->unsignedBigInteger('informacion_id');
            $table->foreign('informacion_id')->references('id')->on('informacions');
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
        Schema::dropIfExists('asignaturas');
    }
}
