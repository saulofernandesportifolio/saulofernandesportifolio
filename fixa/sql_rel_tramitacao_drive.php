<?php
set_time_limit(200);
require_once('../fixa/bd.php');

$query = mysql_query('CALL proc_solicitacoes_old_tramitacao()');

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], //reg_dt_entrada
			$fetch[1], //usuario_tramitacao
			$fetch[2], //devolucao
			$fetch[3], //siscom
			$fetch[4], //data_entrada_siscom
			$fetch[5], //canal_entrada
			$fetch[6], //produto
			$fetch[7], //tipo_solicitacao
			$fetch[8], //servicos
			$fetch[9], //qtd_acessos
			$fetch[10], //numero_de_pacotes
			$fetch[11], // cnpj
			$fetch[12], //razao_social
			$fetch[13], //n_gestao_servicos
			$fetch[14], //data_abertura_gestao
			$fetch[15], //categoria
			$fetch[16], //data_devolucao
			$fetch[17], //data_encerramento
			$fetch[18], //status
			$fetch[19] //obs
	);
}

echo json_encode($output);

?>

