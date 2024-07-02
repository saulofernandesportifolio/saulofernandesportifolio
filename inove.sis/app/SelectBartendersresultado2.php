<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectBartendersresultado2 extends Model
{

     protected $table = 'bartenders';

    protected $fillable = ['bairro', 'id'];


    public static function SelectBartendersresultados2($id)
    {
        return SelectBartendersresultado2::where('id', '=', $id)->get();

    }

    public $timestamps= false;
}
