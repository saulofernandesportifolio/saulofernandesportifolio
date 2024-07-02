<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectBartenders extends Model
{

    protected $table = 'bartenders';

    protected $fillable = ['id'];

    public $timestamps= false;
}
