<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditosComponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos_componentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creditos_id');
            $table->foreign('creditos_id')->references('id')->on('creditos');
            $table->unsignedBigInteger('componente_id');
            $table->foreign('componente_id')->references('id')->on('componentes');
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
        Schema::dropIfExists('creditos_componentes');
    }
}
