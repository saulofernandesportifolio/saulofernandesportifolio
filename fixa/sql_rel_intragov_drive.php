<?php
set_time_limit(200);
require_once('../fixa/bd.php');

$query = mysql_query('CALL proc_solicitacoes_old_intragov()');

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], //reg_dt_entrada
			$fetch[1], //data_solicitacao
			$fetch[2], //usuario_intragov
			$fetch[3], //devolucao
			$fetch[4], //canal_entrada
			$fetch[5], //produto_intragov
			$fetch[6], //servico_intragov
			$fetch[7], //qtd_acessos
			$fetch[8], //motivo_cancelamento
			$fetch[9], //cnpj
			$fetch[10], //razao_social
			$fetch[11], //n_gestao_servicos
			$fetch[12], //data_abertura_gestao
			$fetch[13], //motivo_devolucao
			$fetch[14], //area_solicitante
			$fetch[15], //data_devolucao
			$fetch[16], //data_encerramento
			$fetch[17] //status
	);
}

echo json_encode($output);

?>

