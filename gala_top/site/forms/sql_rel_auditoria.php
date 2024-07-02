<?php

//include('../gala/bd.php');

echo $query = mysql_query("SELECT a.id_cotacao, 
a.regional_atribuida, 
a.uf, 
a.cotacao_principal, 
a.criado_em, 
a.carteira, 
a.revisao, 
a.cliente, 
a.status_da_cotacao, 
a.substatus_da_cotacao, 
a.dt_inclusao_bd_cip, 
a.ALTAS, 
a.PORTABILIDADE2, 
a.MIGRACAO, 
a.TROCAS, 
a.TT, 
a.BACKUP, 
a.M_2_M, 
a.FIXA, 
a.PRE_POS, 
a.MIGRACAO_TROCA, 
a.TIPO_SERVICO, 
a.total_linhas_cip, 
a.dt_inclusao_bd_cip2,
a.dia,
a.TEMPO,
a.TIPO_PROCESSO,
a.TIPO_DE_LINHA,
a.SLA_DIAS,
a.PRAZO_DIAS,
a.visao_ilha,
a.vencimento_ilha,
a.TIPO_COTACAO, 
b.status_cip_auditoria as ds_status_cip, 
b.disc_status_cip_auditoria as ds_disc_status_cip, 
c.nome as nome, 
b.dt_tratamento_auditoria as ds_tratamento, 
b.hora_tratamento_auditoria as ds_hora_tratamento, 
b.setor,
i.id_cotacao, 
i.ofensor, 
i.colaborador, 
i.tipo_erro, 
i.descricao_erro, 
c.usuario, 
c.turno as turno, 
c.idtbl_usuario, 
d.usuario, 
d.turno as turno_op, 
d.idtbl_usuario, 
d.nome as colaborador, 
e.ofensor as ofensor,
f.tipo_erro as tipo_erro,
g.acao as acao,
h.tipo_erro2 as descricao_erro 
FROM tbl_cotacao a 
INNER JOIN tbl_auditoria b 
ON a.id_cotacao=b.id_cotacao
INNER JOIN tbl_erros_cotacao i
ON a.id_cotacao=i.id_cotacao
LEFT JOIN tbl_usuarios c 
ON c.idtbl_usuario=b.idtbl_usuario_auditoria 
LEFT JOIN tbl_usuarios d 
ON d.idtbl_usuario=i.colaborador 
LEFT JOIN tbl_ofensores_auditoria e 
ON e.id=i.ofensor 
LEFT JOIN tbl_tipo_de_erro_auditoria f 
ON f.id=i.tipo_erro
INNER JOIN tbl_acao_auditoria g 
ON g.id=i.acao_auditoria 
LEFT JOIN tbl_tipo_de_erro_auditoria2 h 
ON h.id=i.descricao_erro

WHERE b.status_cip_auditoria IN (13,14,15,16,17,18,19) 


GROUP BY a.cotacao_principal,a.id_cotacao DESC");

while($linha = mysql_fetch_array($query))
{
 
	$output[] = array (
			$linha[0],  //  reg_dt_entrada,
			$linha[1],  //  data_solicitacao,	
		    $linha[2],	// usuario,
			$linha[3],	// devolucao,
			$linha[4],	// canal_entrada,
			$linha[5],	// produto,
			$linha[6],	// servico,
			$linha[7],	// qtd_acessos,
			$linha[8],	// motivo_cancelamento,
			$linha[9],	// cnpj,
			$linha[10],	// razao_social,
			$linha[11],	// n_gestao_servicos,
			$linha[12],	// data_abertura_gestao,
			$linha[13],	// motivo_devolucao,
			$linha[14],	// area_solicitante,
			$linha[15],	// data_devolucao,
			$linha[16],	// data_encerramento,
			$linha[17],	// status_solicitacao
			$linha[18],	// obs
			$linha[19],	// revisao
			$linha[20]	// id_solicitacao
	);
}

echo json_encode($output);

?>

