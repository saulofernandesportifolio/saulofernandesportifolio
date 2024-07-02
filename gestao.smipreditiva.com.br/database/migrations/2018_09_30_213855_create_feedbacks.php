<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('feecbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idocorrencia');
            $table->integer('idcliente');
            $table->string('cliente');
            $table->string('motivo_intervencao');
            $table->string('tempo_falha');
            $table->string('diagnostico_correto');
            $table->string('tempo_intervencao');
            $table->date('data_intervencao');
            $table->string('n_os');
            $table->string('executante');
            $table->string('servico_executado');
            $table->string('custo_homem_hora_normal');
            $table->string('calculo_faturamento');
            $table->string('intervalo_producao');
            $table->integer('beneficio_financeiro');
            $table->string('observacao');
            $table->datetime('data_atualizacao_registro');
            $table->string('usuario');
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
        Schema::dropIfExists('feedbaks');
    }
}
