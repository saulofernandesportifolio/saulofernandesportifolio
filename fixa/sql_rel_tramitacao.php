<?php

require_once('../fixa/bd.php');
$mes = $_POST['mes'];

$query = mysql_query("SELECT DISTINCT
						data_hora,
						analista_tramitacao,
						devolucao,
						id_solicitacao,
						data_entrada_siscom,
						canal_entrada,
						produto,
						concat(cat_produto,' - ',tipo_solicitacao) AS tipo_solicitacao,
			            tipo_solicitacao AS servicos,
						qtd_acessos,
						 '' AS n_pact_siscom,
						replace(replace(replace(cnpj,'.',''),'/',''),'-','') AS cnpj,              
						razao_social,
						n_gestao_servicos,
						data_abertura_gestao,
						cat_produto,
						data_devolucao,
						data_encerramento,
						status_solicitacao_tramitacao,
						obs,
						revisao,
						complemento_tipo_solicitacao,
						data_pedido_cancelamento_cliente
					FROM 
						v_geral_tramitacao 
					WHERE data_hora <> '' AND SUBSTRING(data_hora,4,2) = $mes
					ORDER BY data_hora DESC 
					");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], //data_hora   
			$fetch[1], //analista_tramitacao
			$fetch[2], //devolucao
			$fetch[3], //id_solicitacao
			$fetch[4], //data_entrada_siscom
			$fetch[5], //canal_entrada
			$fetch[6], //produto
			$fetch[7], //tipo_solicitacao
			$fetch[8], //servicos
			$fetch[9], //qtd_acessos
			$fetch[10], //n_pact_siscom
			$fetch[11], //cnpj
			$fetch[12], //razao_social
			$fetch[13], //n_gestao_servicos
			$fetch[14], //data_abertura_gestao
			$fetch[15], //cat_produto
			$fetch[16], //data_devolucao
			$fetch[17], //data_encerramento
			$fetch[18], //status_solicitacao_tramitacao
			$fetch[19], //obs
			$fetch[20], //revisao
			$fetch[21],  //complemento_tipo_solicitacao
			$fetch[22]  //data_pedido_cancelamento_cliente
	);
}

echo json_encode($output);

?>

