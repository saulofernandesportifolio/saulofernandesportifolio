<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liberacao extends Model
{
    //
    protected $fillable = ['id','idbartenders','data_inicial','data_final','status','liberado'];

    public $timestamps= false;
}
