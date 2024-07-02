<?php
set_time_limit(200);
require_once('../fixa/bd.php');

$query = mysql_query('CALL proc_solicitacoes_old_postramitacao()');

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], //reg_dt_entrada
			$fetch[1], //usuario_pos_tramitacao
			$fetch[2], //siscom
			$fetch[3], //data_entrada_siscom
			$fetch[4], //canal_entrada
			$fetch[5], //produto
			$fetch[6], //tipo_solicitacao
			$fetch[7], //servico
			$fetch[8], //qtd_acessos
			$fetch[9], //cnpj
			$fetch[10], //razao_social
			$fetch[11], // n_gestao_servicos
			$fetch[12], //motivo_devolucao
			$fetch[13], //oportunidade
			$fetch[14], //proposta
			$fetch[15], //data_recebimento_pos
			$fetch[16], //data_finalizado
			$fetch[17], //contrato_mae
			$fetch[18], //obs
			$fetch[19] //status
	);
}

echo json_encode($output);

?>

