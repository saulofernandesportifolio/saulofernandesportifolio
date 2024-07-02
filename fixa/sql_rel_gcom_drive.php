<?php

require_once('../fixa/bd.php');

$query = mysql_query('CALL proc_solicitacoes_old_gcon()');

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
			$fetch[0]	, // reg_dt_entrada	
			$fetch[1]	, // data_receb_documento			
			$fetch[2]	, //tipo_entrada    	        		
			$fetch[3]	, //contrato_mae      		
			$fetch[4]	, //data_assinatura_doc    
			$fetch[5]	, //numero_documento       
 			$fetch[6]	, //sistema_validacao 		
			$fetch[7]	, //n_vantive              
			$fetch[8]	, //produto            		
			$fetch[9]	, //data_trativa           
			$fetch[10]	, //nome_solicitante
			$fetch[11]	, //operador
			$fetch[12]	, //n_gestao_servicos
			$fetch[13]	, //razao_social           
			$fetch[14]	, //cnpj                   
			$fetch[15]	, //plano_solicitado       
			$fetch[16]	, //qtde_acesso
			$fetch[17]	, //data_finalizacao
			$fetch[18]	, //n_gestao_servicos 
			$fetch[19]	, //numero_wcd             
			$fetch[20]	  //contrato
	);
}

echo json_encode($output);

?>

