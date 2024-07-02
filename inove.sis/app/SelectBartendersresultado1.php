<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectBartendersresultado1 extends Model
{

     protected $table = 'bartenders';

    protected $fillable = ['cidade', 'id'];


    public static function SelectBartendersresultados1($id)
    {
        return SelectBartendersresultado1::where('id', '=', $id)->get();

    }

    public $timestamps= false;
}
