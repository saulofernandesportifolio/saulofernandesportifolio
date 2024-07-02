<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bartender extends Model
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
                           'carro',
                           'danca',
                           'drinks',
                           'simpatia',
                           'beleza',
                           'postura',
                           'score'];

    public $timestamps= false;
}
