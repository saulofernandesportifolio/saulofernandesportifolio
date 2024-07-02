<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $fillable = ['id','idocorrencias','idclientes','cliente','atividades_intervencao','hh_normal'
    ,'executante','tipo_intervencao','hh_extra','tempo_maq_parada','diagnostico','usuario'
    ,'data_cadastro','hora_cadastro'];

    public $timestamps= false;
}
