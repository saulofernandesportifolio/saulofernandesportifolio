<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Transferencia extends Model
{
    protected $fillable = ['id', 'nome'];
}
