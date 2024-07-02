<?php


$mes = $_POST['mes'];
require_once('../fixa/bd.php');

$query = mysql_query("SELECT DISTINCT
					  	  	 scm.id_solicitacao
							,scm.data_recebimento_solicitacao
							,ce.descricao AS canal_entrada      
							,scm.categoria_produto         
							,scm.produto          
							,scm.servico    
							,scm.complemento_servico       
							,scm.quantidade     
							,scm.cnpj_cpf              
							,scm.razao_social               
							,scm.gerente_vendas
							,scm.gerente_negocio
							,scm.simulacao
							,scm.uf
							,scm.valor
							,scm.obs
							,ss.descricao AS status_solicitacao 
							,scm.motivo_devolucao 
							,scm.descricao_motivo_devolucao
							,u.nome
							,date_format(scm.regDataEntrada, '%d/%m/%Y %H:%i:%s')  AS regDataEntrada              
					FROM scmovel scm 
						INNER JOIN canal_entrada ce ON scm.canal_entrada = ce.id_canal_entrada
						INNER JOIN status_solicitacao ss ON scm.status_solicitacao = ss.id_status_solicitacao
						INNER JOIN usuario u ON scm.id_usuario = u.id_usuario
					WHERE SUBSTRING(regDataEntrada,6,2) = $mes
					ORDER BY regDataEntrada");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], //id_solicitacao
			$fetch[1], //data_recebimento_solicitacao
			$fetch[2], //canal_entrada
			$fetch[3], //categoria_produto
			$fetch[4], //produto
			$fetch[5], //servico
			$fetch[6], //complemento_servico
			$fetch[7], //quantidade
			$fetch[8], //cnpj_cpf
			$fetch[9], //razao_social
			$fetch[10], //gerente_vendas
			$fetch[11], //gerente_negocio
			$fetch[12], //simulacao
			$fetch[13], //uf
			$fetch[14], //valor
			$fetch[15], //obs
			$fetch[16], //status_solicitacao
			$fetch[17], //motivo_devolucao
			$fetch[18], //descricao_motivo_devolucao
			$fetch[19], //nome
			$fetch[20] //regDataEntrada
	);
}

echo json_encode($output);

?>

