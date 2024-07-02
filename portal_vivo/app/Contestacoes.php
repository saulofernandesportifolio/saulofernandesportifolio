<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Contestacoes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'id_parc',
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
        'id_contestacao_op',
        'descricao',
        'motivo',
        'submotivo',
        'reaberto',
        'tramite',
        'created_at',
        'data_criacao'
    ];
    public $timestamps= false;
}
