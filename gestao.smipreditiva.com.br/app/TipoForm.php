<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoForm extends Model
{
    //
    protected $fillable = ['id','desc'];

    public $timestamps= false;
}
