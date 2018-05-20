<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTgmHistorialRutinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tgm_historial_rutina', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tgm_cliente_id')->unsigned();
            $table->foreign('tgm_cliente_id')->references('id')->on('tgm_cliente')->onDelete('cascade');
            $table->integer('tgm_rutina_id')->unsigned();
            $table->foreign('tgf_rutina_id')->references('id')->on('tgm_rutina')->onDelete('cascade');
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
        Schema::dropIfExists('tgm_historial_rutina');
    }
}
