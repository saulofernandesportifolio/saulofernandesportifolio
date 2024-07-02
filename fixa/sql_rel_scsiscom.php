<?php


$mes = $_POST['mes'];
require_once('../fixa/bd.php');

$query = mysql_query("SELECT DISTINCT
					  	  	 scs.id_solicitacao
							,scs.data_recebimento_solicitacao
							,ce.descricao AS canal_entrada      
							,scs.categoria_produto         
							,scs.produto          
							,scs.servico    
							,scs.complemento_servico       
							,scs.quantidade     
							,scs.cnpj_cpf              
							,scs.razao_social               
							,scs.gerente_vendas
							,scs.gerente_negocio
							,scs.uf
							,scs.valor_proposta
							,scs.obs
							,ss.descricao AS status_solicitacao 
							,scs.motivo_devolucao 
							,scs.descricao_motivo_devolucao
							,u.nome
							,date_format(scs.regDataEntrada, '%d/%m/%Y %H:%i:%s')  AS regDataEntrada              
					FROM scsiscom scs 
						INNER JOIN canal_entrada ce ON scs.canal_entrada = ce.id_canal_entrada
						INNER JOIN status_solicitacao ss ON scs.status_solicitacao = ss.id_status_solicitacao
						INNER JOIN usuario u ON scs.id_usuario = u.id_usuario
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
			$fetch[13], //valor_proposta
			$fetch[14], //obs
			$fetch[15], //status_solicitacao
			$fetch[16], //motivo_devolucao
			$fetch[17], //descricao_motivo_devolucao
			$fetch[18], //nome
			$fetch[19] //regDataEntrada
	);
}

echo json_encode($output);

?>

