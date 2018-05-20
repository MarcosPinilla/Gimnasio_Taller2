<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTgmUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tgm_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usu_correo')->index();
            $table->string('password');
            $table->integer('tgm_rol_id')->unsigned();
            $table->integer('tgm_cliente_id')->unsigned();
            $table->foreign('tgm_rol_id')->references('id')->on('tgm_rol')->onDelete('cascade');
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
        Schema::dropIfExists('tgm_user');
    }
}
