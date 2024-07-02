<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alarme extends Model
{
    protected $table = 'alarmes';

    protected $fillable = ['alarme'];

    public $timestamps= false;
}
