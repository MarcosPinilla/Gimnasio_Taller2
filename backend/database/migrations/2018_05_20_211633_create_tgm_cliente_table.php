<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTgmClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tgm_cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->index();
            $table->string('apellido')->index();
            $table->string('peso');
            $table->string("imc");
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
        Schema::dropIfExists('tgm_cliente');
    }
}
