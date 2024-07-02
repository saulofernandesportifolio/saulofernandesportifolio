<?php

require_once('../fixa/bd.php');
$mes = $_POST['mes'];
$query = mysql_query("SELECT DISTINCT
						reg_dt_entrada			,
						data_receb_documento	,
						tipo_entrada      		,
						contrato_mae      		,
						data_assinatura_doc     ,
						numero_documento        ,
 						sistema_validacao 		,
						n_vantive               ,
						produto            		,
						data_trativa            ,
						nome_solicitante        ,
						operador    	        ,
						n_gestao_servicos       ,
						razao_social            ,
						replace(replace(replace(cnpj,'.',''),'/',''),'-','') AS cnpj,              
						plano_solicitado        ,
						qtde_acesso             ,  
						data_finalizacao        ,
						n_gestao_servicos       ,
						numero_wcd				,
						'' AS contrato 			,
						revisao                 ,
						id_solicitacao			,
						devolucao 				,
						motivo_devolucao		,
						area_devolucao			,
						data_devolucao			,
						status					,
						data_assinatura_contrato,	
		    			qtd_contrato_analisados 
						FROM 
						v_geral_gcom  
						WHERE reg_dt_entrada <> '' AND SUBSTRING(reg_dt_entrada,4,2) = $mes
						ORDER BY reg_dt_entrada DESC");

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
			$fetch[20]	, //contrato
			$fetch[21]	, //revisao 
			$fetch[22]	, //id_solicitacao
			$fetch[23]	, //devolucao
			$fetch[24]	, //motivo_devolucao
			$fetch[25]	, //area_devolucao
			$fetch[26]	, //data_devolucao
			$fetch[27]	, //status
			$fetch[28]  , //data_assinatura_contrato,	
		    $fetch[29]    //qtd_contrato_analisados
	);
}

echo json_encode($output);

?>

