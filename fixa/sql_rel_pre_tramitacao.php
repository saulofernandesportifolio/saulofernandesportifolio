<?php


$mes = $_POST['mes'];
require_once('../fixa/bd.php');

$query = mysql_query("SELECT DISTINCT
					  	   data_hora,
			               analista_pre,
			               id_solicitacao,
			               cat_produto,
			               devolucao,
			               canal_entrada,
			               data_receb_solicitacao,
			               '' AS n_pact_siscom,
			               produto,
			               concat(cat_produto,' - ',tipo_solicitacao) AS tipo_solicitacao,
			               tipo_solicitacao AS servicos,
			               replace(replace(replace(cnpj,'.',''),'/',''),'-','') AS cnpj,                            
			               razao_social,
			               qtd_acessos,
			               n_gestao_servicos,
			               data_abert_gestao,
			               motivo_devolucao,
			               area_devolucao,
			               data_devolucao,
			               status_solicitacao,
			               obs,
			               revisao,
			               complemento_tipo_solicitacao,
			               data_pedido_cancelamento_cliente
					FROM v_geral_pre_tramitacao 
					WHERE data_hora <> ''  AND SUBSTRING(data_hora,4,2) = $mes
					ORDER BY data_hora desc");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], //data_hora
			$fetch[1], //analista_pre
			$fetch[2], //id_solicitacao
			$fetch[3], //cat_produto
			$fetch[4], //devolucao
			$fetch[5], //canal_entrada
			$fetch[6], //data_receb_solicitacao
			$fetch[7], //n_pact_siscom
			$fetch[8], //produto
			$fetch[9], //tipo_solicitacao
			$fetch[10], //servicos 
			$fetch[11], //cnpj
			$fetch[12], //razao_social
			$fetch[13], //qtd_acessos
			$fetch[14], //n_gestao_servicos
			$fetch[15], //data_abert_gestao
			$fetch[16], //motivo_devolucao
			$fetch[17], //area_devolucao
			$fetch[18], //data_devolucao
			$fetch[19], //status_solicitacao
			$fetch[20], //obs
			$fetch[21], //revisao
			$fetch[22], //complemento_tipo_solicitacao
			$fetch[23] //data_pedido_cancelamento_cliente
	);
}

echo json_encode($output);

?>

