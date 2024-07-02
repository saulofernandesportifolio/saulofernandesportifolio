<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lubrificacao extends Model
{
    //
    protected $fillable = ['id',
        'nu_lubri',
        'tag',
        'setor',
        'equipamento',
        'pontencia',
        'rpm',
        'velocidade',
        'servico_executado',
        'motivo',
        'ponto',
        'quantidade',
        'servico',
        'lubrificante',
        'volume',
        'frequencia',
        'data_execucao',
        'mes_execucao',
        'ano_execucao',
        'data_prox_lubri',
        'usuario',
        'data_criacao',
        'status'];
    public $timestamps= false;

}
