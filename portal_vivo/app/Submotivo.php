<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Submotivo extends Model
{

     protected $table = 'submotivos';

    protected $fillable = ['submotivo', 'id_submotivo'];


    public static function submotivos($id)
    {
        return Submotivo::where('id_submotivo', '=', $id)
            ->get();

    }

    public $timestamps= false;
}
