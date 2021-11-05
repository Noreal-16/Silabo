<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacions', function (Blueprint $table) {
            $table->id();
            $table->string('asignatura');
            $table->string('codigo');
            $table->string('tipoAsignatura');
            $table->string('rediseñoCurricular');
            $table->string('nivel');
            $table->string('semestre');
            $table->unsignedBigInteger('ciclos_id');
            $table->foreign('ciclos_id')->references('id')->on('ciclos');
            $table->unsignedBigInteger('creditos_id');
            $table->foreign('creditos_id')->references('id')->on('creditos');
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
        Schema::dropIfExists('informacions');
    }
}
