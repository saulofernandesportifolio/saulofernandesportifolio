<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Cliente extends Model
{
    protected $fillable = ['id', 'nome','tipocli'];

    public $timestamps = false;
}
