<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    //
    protected $fillable = ['id','idclientes','equipamento','setor','tag','potencia','rpm'];

    public $timestamps= false;
}
