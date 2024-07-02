<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Cartao extends Model
{

    protected $table = 'cartoes';
    protected $fillable = ['id', 'tarifa','tarifa1','tarifa2'];

    public $timestamps = false;
}
