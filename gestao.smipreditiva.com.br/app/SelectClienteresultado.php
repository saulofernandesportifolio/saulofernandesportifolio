<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectClienteresultado extends Model
{

    protected $table = 'equipamentos';

    protected $fillable = ['tag', 'setor', 'equipamento', 'potencia', 'rpm', 'id','idcliente'];


    public static function SelectClienteresultados($idclientes)
    {
        return SelectClienteresultado::where('idclientes', '=', $idclientes)->get();

    }

    public $timestamps= false;
}
