<?php


$mes = $_POST['mes'];
require_once('../fixa/bd.php');

$query = mysql_query("SELECT DISTINCT
					  	  	 scc.id_solicitacao
							,scc.data_recebimento_solicitacao
							,ce.descricao AS canal_entrada      
							,scc.categoria_produto         
							,scc.produto          
							,scc.servico    
							,scc.complemento_servico       
							,scc.quantidade     
							,scc.cnpj_cpf              
							,scc.razao_social               
							,scc.gerente_vendas
							,scc.gerente_negocio
							,scc.uf
							,scc.obs
							,ss.descricao AS status_solicitacao 
							,scc.motivo_devolucao 
							,scc.descricao_motivo_devolucao
							,u.nome
							,date_format(scc.regDataEntrada, '%d/%m/%Y %H:%i:%s')  AS regDataEntrada              
					FROM sccancelamento scc 
						INNER JOIN canal_entrada ce ON scc.canal_entrada = ce.id_canal_entrada
						INNER JOIN status_solicitacao ss ON scc.status_solicitacao = ss.id_status_solicitacao
						INNER JOIN usuario u ON scc.id_usuario = u.id_usuario
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
			$fetch[12], //uf
			$fetch[13], //obs
			$fetch[14], //status_solicitacao
			$fetch[15], //motivo_devolucao
			$fetch[16], //descricao_motivo_devolucao
			$fetch[17], //nome
			$fetch[18] //regDataEntrada
	);
}

echo json_encode($output);

?>

