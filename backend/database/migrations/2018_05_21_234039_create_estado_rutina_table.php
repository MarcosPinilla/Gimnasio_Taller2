<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoRutinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tgm_estado_rutina', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tgm_cliente_id')->unsigned();
            $table->foreign('tgm_cliente_id')->references('id')->on('tgm_cliente')->onDelete('cascade');
            $table->integer('tgm_rutina_id')->unsigned();
            $table->foreign('tgm_rutina_id')->references('id')->on('tgm_rutina')->onDelete('cascade');
            $table->boolean('estado');
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
        Schema::dropIfExists('estado_rutina');
    }
}
