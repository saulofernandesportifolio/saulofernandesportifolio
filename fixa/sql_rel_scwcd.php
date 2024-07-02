<?php


$mes = $_POST['mes'];
require_once('../fixa/bd.php');

$query = mysql_query("SELECT DISTINCT
					  	  	 scw.id_solicitacao
							,scw.data_recebimento_solicitacao
							,ce.descricao AS canal_entrada      
							,scw.categoria_produto         
							,scw.produto              
							,scw.quantidade     
							,scw.cnpj_cpf              
							,scw.razao_social               
							,scw.gerente_vendas
							,scw.gerente_negocio
							,scw.oportunidade
							,scw.valor_proposta
							,scw.obs
							,ss.descricao AS status_solicitacao 
							,scw.motivo_devolucao 
							,scw.descricao_motivo_devolucao
							,u.nome
							,date_format(scw.regDataEntrada, '%d/%m/%Y %H:%i:%s')  AS regDataEntrada              
					FROM scwcd scw 
						INNER JOIN canal_entrada ce ON scw.canal_entrada = ce.id_canal_entrada
						INNER JOIN status_solicitacao ss ON scw.status_solicitacao = ss.id_status_solicitacao
						INNER JOIN usuario u ON scw.id_usuario = u.id_usuario
					WHERE SUBSTRING(scw.regDataEntrada,6,2) = $mes
					ORDER BY regDataEntrada");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], //id_solicitacao
			$fetch[1], //data_recebimento_solicitacao
			$fetch[2], //canal_entrada
			$fetch[3], //categoria_produto
			$fetch[4], //produto
			$fetch[5], //quantidade
			$fetch[6], //cnpj_cpf
			$fetch[7], //razao_social
			$fetch[8], //gerente_vendas
			$fetch[9], //gerente_negocio
			$fetch[10], //oportunidade
			$fetch[11], //valor_proposta
			$fetch[12], //obs
			$fetch[13], //status_solicitacao
			$fetch[14], //motivo_devolucao
			$fetch[15], //descricao_motivo_devolucao
			$fetch[16], //nome
			$fetch[17] //regDataEntrada
	);
}

echo json_encode($output);

?>

