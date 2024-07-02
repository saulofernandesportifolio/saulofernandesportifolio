<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectClientes extends Model
{

    protected $table = 'tiposclientes';

    protected $fillable = ['id'];

    public $timestamps= false;
}
