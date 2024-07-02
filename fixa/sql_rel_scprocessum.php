<?php


$mes = $_POST['mes'];
require_once('../fixa/bd.php');

$query = mysql_query("SELECT DISTINCT
					  	  	 scp.id_solicitacao
							,scp.data_recebimento_solicitacao
							,ce.descricao AS canal_entrada      
							,scp.categoria_produto            
							,scp.cnpj_cpf              
							,scp.razao_social               
							,scp.gerente_vendas
							,scp.gerente_negocio
							,scp.obs
							,ss.descricao AS status_solicitacao 
							,scp.motivo_devolucao 
							,scp.descricao_motivo_devolucao
							,u.nome
							,date_format(scp.regDataEntrada, '%d/%m/%Y %H:%i:%s')  AS regDataEntrada              
					FROM scprocessum scp 
						INNER JOIN canal_entrada ce ON scp.canal_entrada = ce.id_canal_entrada
						INNER JOIN status_solicitacao ss ON scp.status_solicitacao = ss.id_status_solicitacao
						INNER JOIN usuario u ON scp.id_usuario = u.id_usuario
					WHERE SUBSTRING(scp.regDataEntrada,6,2) = $mes
					ORDER BY regDataEntrada");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], //id_solicitacao
			$fetch[1], //data_recebimento_solicitacao
			$fetch[2], //canal_entrada
			$fetch[3], //categoria_produto
			$fetch[4], //cnpj_cpf
			$fetch[5], //razao_social
			$fetch[6], //gerente_vendas
			$fetch[7], //gerente_negocio
			$fetch[8], //obs
			$fetch[9], //status_solicitacao
			$fetch[10], //motivo_devolucao
			$fetch[11], //descricao_motivo_devolucao
			$fetch[12], //nome
			$fetch[13] //regDataEntrada
	);
}

echo json_encode($output);

?>

