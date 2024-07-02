<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectBartendersresultado extends Model
{

     protected $table = 'bartenders';

    protected $fillable = ['carro', 'cidade', 'id'];


    public static function SelectBartendersresultados($id)
    {
        return SelectBartendersresultado::where('id', '=', $id)->get();

    }

    public $timestamps= false;
}
