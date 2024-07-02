<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    protected $fillable = ['id',
                           'idclientes',
                           'cliente',
                           'evento',
                           'cep_do_evento',
                           'bairro',
                           'cidade',
                           'uf',
                           'chegada_deposito',
                           'carro',
                           'tipo',
                           'numero de bartenders',
                           'uniforme',
                           'observacao',
                           'data_evento',
                           'score',
                           'qtd_bartenders',
                           'bartenders',
                           'animacao',
                           'hora_evento',
                           'pacote_contrado',
                           'adicionais',
                           'frutas',
                           'n_convidados'];

    public $timestamps= false;
}
