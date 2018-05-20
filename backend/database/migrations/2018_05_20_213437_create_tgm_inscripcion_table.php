<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTgmInscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tgm_inscripcion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tgm_gimnasio_id')->unsigned();
            $table->integer('tgm_cliente_id')->unsigned();
            $table->foreign('tgm_gimnasio_id')->references('id')->on('tgm_gimnasio')->onDelete('cascade');
            $table->foreign('tgm_cliente_id')->references('id')->on('tgm_cliente')->onDelete('cascade');
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
        Schema::dropIfExists('tgm_inscripcion');
    }
}
