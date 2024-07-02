<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->string('nome');
            $table->string('email');
            $table->string('password');
            $table->integer('perfil');
            $table->string('turno');
            $table->integer('statususer');
            $table->integer('primeiro_acesso');
            $table->integer('recuperacao');
            $table->string('cnpj_cpf');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
