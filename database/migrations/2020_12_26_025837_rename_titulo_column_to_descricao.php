<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTituloColumnToDescricao extends Migration {
    public function up() {
        Schema::table('telefones', function (Blueprint $table) {
            $table->renameColumn('titulo', 'descricao');
        });
    }

    public function down() {
        Schema::table('telefones', function (Blueprint $table) {
            $table->renameColumn('descricao', 'titulo');
        });
    }
}