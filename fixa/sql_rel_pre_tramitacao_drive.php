<?php
set_time_limit(200);
require_once('../fixa/bd.php');

$query = mysql_query('CALL proc_solicitacoes_old_pretramitacao()');

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], //reg_dt_entrada
			$fetch[1], //usuario_pre
			$fetch[2], //siscom
			$fetch[3], //cat_produto
			$fetch[4], //devolucao
			$fetch[5], //canal_entrada
			$fetch[6], //data_recebimento_solicitacao
			$fetch[7], //numero_pacote_siscom
			$fetch[8], //produto
			$fetch[9], //tipo_solicitacao_categoria
			$fetch[10], //servicos 
			$fetch[11], //cnpj
			$fetch[12], //razao_social
			$fetch[13], //quantidade_acessos
			$fetch[14], //numero_gs
			$fetch[15], //data_abertura_gestao
			$fetch[16], //motivo_devolucao
			$fetch[17], //area_devolucao
			$fetch[18], //data_devolucao
			$fetch[19], //status
			$fetch[20] //obs
	);
}

echo json_encode($output);

?>

