<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectClientesresultado extends Model
{

    protected $table = 'clientes';

    protected $fillable = ['id','nome','responsavel','tipocli'];


    public static function SelectBartendersresultados($id)
    {
        return SelectClientesresultado::where('tipocli', '=', $id)->get();

    }

    public $timestamps= false;
}
