<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = ['id',
                           'nome',
                           'cep',
                           'endereco',
                           'numero',
                           'cidade',
                           'uf',
                           'bairro',
                           'email',
                           'telefone',
                           'responsavel'];

    public $timestamps= false;
}
