<?php


$mes = $_POST['mes'];
require_once('../fixa/bd.php');

$query = mysql_query("SELECT DISTINCT
					  	  	 scc.id_solicitacao
							,scc.data_recebimento_solicitacao
							,ce.descricao AS canal_entrada      
							,scc.tipo_documento            
							,scc.cnpj_cpf              
							,scc.razao_social               
							,scc.gerente_vendas
							,scc.gerente_negocio
							,scc.data_envio_cliente
							,scc.endereco_envio
							,scc.obs
							,ss.descricao AS status_solicitacao 
							,scc.motivo_devolucao 
							,scc.descricao_motivo_devolucao
							,u.nome
							,date_format(scc.regDataEntrada, '%d/%m/%Y %H:%i:%s')  AS regDataEntrada              
					FROM sccartas scc 
						INNER JOIN canal_entrada ce ON scc.canal_entrada = ce.id_canal_entrada
						INNER JOIN status_solicitacao ss ON scc.status_solicitacao = ss.id_status_solicitacao
						INNER JOIN usuario u ON scc.id_usuario = u.id_usuario
					WHERE SUBSTRING(scc.regDataEntrada,6,2) = $mes
					ORDER BY regDataEntrada");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], //id_solicitacao
			$fetch[1], //data_recebimento_solicitacao
			$fetch[2], //canal_entrada
			$fetch[3], //tipo_documento
			$fetch[4], //cnpj_cpf
			$fetch[5], //razao_social
			$fetch[6], //gerente_vendas
			$fetch[7], //gerente_negocio
			$fetch[8], //data_envio_cliente
			$fetch[9], //endereco_envio
			$fetch[10], //obs
			$fetch[11], //status_solicitacao
			$fetch[12], //motivo_devolucao
			$fetch[13], //descricao_motivo_devolucao
			$fetch[14], //nome
			$fetch[15] //regDataEntrada
	);
}

echo json_encode($output);

?>

