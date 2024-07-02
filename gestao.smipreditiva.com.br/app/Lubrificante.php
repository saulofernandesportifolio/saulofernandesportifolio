<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lubrificante extends Model
{
    //
    protected $fillable = ['id',
        'desc'];
    public $timestamps= false;
}
