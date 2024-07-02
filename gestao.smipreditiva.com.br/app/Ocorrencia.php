<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{

    protected $fillable = ['id',
                           'tag',
                           'setor',
                           'equipamento',
                           'pontencia',
                           'rpm',
                           'velocidade',
                           'demodulacao',
                            'valor_velocidade',
                            'valor_demodulacao',
                           'desgaste_rolamentos','recomendacao_desgaste_rotalamentos',
                           'desbalanceamento', 'recomendacao_desbalanceamentos',
                           'sistema_transmissao','recomendacao_sistema_transmissao',
                           'folgas_desgaste', 'recomendacao_folgas_desgaste',
                           'rigidez','recomendacao_rigidez',
                           'lubrificacao_deficiente','recomendacao_lubrificacao_deficiente',
                           'outros',
                            'obs',
                           'prazo_intervensao',
                           'status',
                           'desc_status',
                           'anotacoes',
                           'analise',
                           'usuario',
                           'data_criacao',
                           'hora_criacao',
                           'data_hora_criacao',
                            'grafico',
                            'arquivo',
                            'usuario_ult_alteracao',
                            'data_ult_alt',
                            'hora_ult_alt',
                            'user_id_gestor'];
    public $timestamps= false;
}
