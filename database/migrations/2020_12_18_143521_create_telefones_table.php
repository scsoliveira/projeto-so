<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonesTable extends Migration {
    public function up() {
        Schema::create('telefones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->string('titulo');
            $table->string('telefone');
            $table->timestamps();
        });

        Schema::table('telefones', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    public function down() {
        Schema::dropIfExists('telefones');
    }
}
