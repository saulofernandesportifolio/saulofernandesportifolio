<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = ['id','cliente','cidade','estado','email','contato', 'logo', 'user_id_gestor'];

    public $timestamps= false;
}
