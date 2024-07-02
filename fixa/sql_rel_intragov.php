<?php

require_once('../fixa/bd.php');
$mes = $_POST['mes'];
$query = mysql_query("SELECT DISTINCT
						reg_dt_entrada,
						data_solicitacao,	
						usuario,
						devolucao,
						canal_entrada,
						produto,
						servico_intragov,
						qtd_acessos,
						motivo_cancelamento,
						replace(replace(replace(cnpj,'.',''),'/',''),'-','') AS cnpj,             
						razao_social,
						n_gestao_servicos,
						data_abertura_gestao,
						motivo_devolucao,
						area_solicitante,
						data_devolucao,
						data_encerramento,
						status_solicitacao,
						obs,
						revisao,
						id_solicitacao,
						data_pedido_cancelamento_cliente
					FROM 
						v_geral_intragov 
						WHERE reg_dt_entrada <> '' AND SUBSTRING(reg_dt_entrada,4,2) = $mes
						ORDER BY reg_dt_entrada DESC");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0],  //  reg_dt_entrada,
			$fetch[1],  //  data_solicitacao,	
		    $fetch[2],	// usuario,
			$fetch[3],	// devolucao,
			$fetch[4],	// canal_entrada,
			$fetch[5],	// produto,
			$fetch[6],	// servico,
			$fetch[7],	// qtd_acessos,
			$fetch[8],	// motivo_cancelamento,
			$fetch[9],	// cnpj,
			$fetch[10],	// razao_social,
			$fetch[11],	// n_gestao_servicos,
			$fetch[12],	// data_abertura_gestao,
			$fetch[13],	// motivo_devolucao,
			$fetch[14],	// area_solicitante,
			$fetch[15],	// data_devolucao,
			$fetch[16],	// data_encerramento,
			$fetch[17],	// status_solicitacao
			$fetch[18],	// obs
			$fetch[19],	// revisao
			$fetch[20],	// id_solicitacao
			$fetch[21]  // data_pedido_cancelamento_cliente
	);
}

echo json_encode($output);

?>

