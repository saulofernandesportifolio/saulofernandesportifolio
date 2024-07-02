<?php


$mes = $_POST['mes'];
require_once('../fixa/bd.php');

$query = mysql_query("SELECT DISTINCT
					  	  	 scp.id_solicitacao
							,scp.data_recebimento_solicitacao
							,ce.descricao AS canal_entrada      
							,scp.categoria_produto         
							,scp.produto            
							,scp.cnpj_cpf              
							,scp.razao_social               
							,scp.gerente_senior
							,scp.gerente_negocio
							,scp.diretor
							,scp.data_base
							,scp.prazo_contratual
							,scp.valor_pendencia
							,scp.fup_envio
							,scp.obs
							,ss.descricao AS status_solicitacao 
							,scp.devido
							,scp.motivo_devolucao 
							,scp.descricao_motivo_devolucao
							,u.nome
							,date_format(scp.regDataEntrada, '%d/%m/%Y %H:%i:%s')  AS regDataEntrada              
					FROM scpendencia scp 
						INNER JOIN canal_entrada ce ON scp.canal_entrada = ce.id_canal_entrada
						INNER JOIN status_solicitacao ss ON scp.status_solicitacao = ss.id_status_solicitacao
						INNER JOIN usuario u ON scp.id_usuario = u.id_usuario
					WHERE SUBSTRING(regDataEntrada,6,2) = $mes
					ORDER BY regDataEntrada");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0], // Solicitação
            $fetch[1], // Data Recebimento Solicitação
            $fetch[2], // Canal Entrada
            $fetch[3], // Categoria Produto
            $fetch[4], // Produto
            $fetch[5], // CNPJ/CPF  
            $fetch[6], // Razão Social
            $fetch[7], // Gerente Senior
            $fetch[8], // Gerente Negócio
            $fetch[9], // Diretor
            $fetch[10], // Data Base
            $fetch[11], // Prazo Contratual
            $fetch[12], // Valor Pendência
            $fetch[13], // FUP Envio
            $fetch[14], // Obs
            $fetch[15], // Status
            $fetch[16], // Devido
            $fetch[17], // Motivo Devolução
            $fetch[18], // Descrição Motivo Devolução
            $fetch[19], // Analista
            $fetch[20] // Data Finalização  
	);
}

echo json_encode($output);

?>

