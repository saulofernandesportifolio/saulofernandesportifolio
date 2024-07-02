<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'protocolo',
        'revisao',
        'pedido',
        'cnpj_cpf',
        'descricao_defesa',
        'status',
        'id_parceiro',
        'email',
        'endereco_anexo',
        'endereco_download',
        'reaberto',
        'tramite',
        'created_at',
        'data_criacao'
    ];
    public $timestamps= false;
}
