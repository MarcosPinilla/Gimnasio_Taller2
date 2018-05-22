<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tgm_historial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('peso');
            $table->string('imc');
            $table->integer('estado_rutina_id')->unsigned();
            $table->foreign('estado_rutina_id')->references('id')->on('tgm_estado_rutina')->onDelete('cascade');
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
        Schema::dropIfExists('historial');
    }
}
