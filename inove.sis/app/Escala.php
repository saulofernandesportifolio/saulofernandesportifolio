<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
    //
    protected $fillable = ['id','ideventos','idbartenders'];

    public $timestamps= false;
}
