<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag');
            $table->string('setor');
            $table->string('equipamento');
            $table->string('pontencia');
            $table->string('rpm');
            $table->string('velocidade');
            $table->string('demodulacao');
            $table->string('desgaste_rolamentos');
            $table->string('desbalanceamento');
            $table->string('sistema_transmissao');
            $table->string('folgas_desgastes');
            $table->string('rigidez');
            $table->string('lubrificacao_deficiente');
            $table->string('outros');
            $table->integer('status');
            $table->string('desc_status');
            $table->string('anotacoes');
            $table->string('usuario');
            $table->date('data_criacao');
            $table->time('hora_criacao');
            $table->datetime('data_hora_criacao');
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
        Schema::dropIfExists('ocorrencias');
    }
}
