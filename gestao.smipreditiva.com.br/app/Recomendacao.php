<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomendacao extends Model
{

    protected $table = 'recomendacaos';

    protected $fillable = ['recomendacao', 'idalarme'];


    public static function recomendacaos($id)
    {
        return Recomendacao::where('idalarme', '=', $id)
            ->get();

    }

    public $timestamps= false;
}
