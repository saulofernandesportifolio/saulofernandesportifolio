<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectCliente extends Model
{

    protected $table = 'ocorrencias';

    protected $fillable = ['idclientes'];

    public $timestamps= false;
}
