<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{

    protected $table = 'motivos';

    protected $fillable = ['motivo'];

    public $timestamps= false;
}
