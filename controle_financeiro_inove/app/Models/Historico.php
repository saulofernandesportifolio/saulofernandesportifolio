<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Historico extends Model
{
    protected $fillable = ['user_id','type', 'montante', 'recebido','total_antes', 'total_depois', 'user_id_transaction', 'data'];
}
