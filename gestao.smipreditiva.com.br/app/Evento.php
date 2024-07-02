<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    protected $fillable = ['id','idocorrencias','idrecomedacaos'];

    public $timestamps= false;
}
