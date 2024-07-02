<?php

namespace App\Models;

use App\User;
use DB;
use Illuminate\Database\Eloquent\Model;

class Balanco extends Model
{
    public $timestamps = false;

    protected $fillable = ['id','id_user','montante','empresa_id'];
}
