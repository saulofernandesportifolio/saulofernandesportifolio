<?php

require_once('../fixa/bd.php');
$mes = $_POST['mes'];

$query = mysql_query("SELECT DISTINCT	
						data_hora,
						usuario,      
						id_solicitacao,
						data_entrada_siscom,                         
						canal_entrada,               
						produto,              
						concat('DADOS',' - ',tipo_solicitacao) AS tipo_solicitacao,
			            tipo_solicitacao AS servicos,
			            qtd_acessos,
						replace(replace(replace(cnpj,'.',''),'/',''),'-','') AS cnpj,                                        
						razao_social,                           
						n_gestao_servicos,              
						motivo_devolucao,            
						oportunidade,                   
						proposta,
						data_recebimento_pos,           
						data_finalizado,                        
						contrato_mae,
						obs,                        
						status,
						revisao,
						complemento_tipo_solicitacao,
						data_pedido_cancelamento_cliente,
						data_assinatura_contrato,	
		    			qtd_contrato_analisados                 
					FROM 
						v_geral_pos_tramitacao 
						WHERE usuario <> '' AND SUBSTRING(data_hora,4,2) = $mes
						ORDER BY data_hora DESC
					");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
				$fetch[0], 	//data_hora,
				$fetch[1], 	//usuario,      
				$fetch[2], 	//id_solicitacao,                         
				$fetch[3], 	//data_entrada_siscom,               
				$fetch[4], 	//canal_entrada,              
				$fetch[5], 	//produto,            
				$fetch[6], 	//tipo_solicitacao,                    
				$fetch[7], 	//servicos,                           
				$fetch[8], 	//qtd_acessos,                   
				$fetch[9], 	//cnpj,                    
				$fetch[10],	//razao_social,              
				$fetch[11],	//n_gestao_servicos,            
				$fetch[12],	//motivo_devolucao,                                      
				$fetch[13],	//oportunidade,                   
				$fetch[14],	//proposta,
				$fetch[15],	//data_recebimento_pos,           
				$fetch[16],	//data_finalizado,                        
				$fetch[17],	//contrato_mae,                          
				$fetch[18], //obs 
				$fetch[19], //status
				$fetch[20], //revisao
				$fetch[21], //complemento_tipo_solicitacao
				$fetch[22], //data_pedido_cancelamento_cliente,	
		    	$fetch[23], //data_assinatura_contrato
				$fetch[24]  //qtd_contrato_analisados
	);
}

echo json_encode($output);

?>

