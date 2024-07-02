<?php

include("../fixa/bd.php");

ini_set ( 'mysql.connect_timeout' ,  '350' ); 
ini_set ( 'default_socket_timeout' ,  '350' );
ini_set('memory_limit', '-1'); 

function f_inserir_dados($dados=array(), $info, $id, $existente)
{	  

	  $data_cadastro=date("Y-m-d");


		if($info == 2)
		{

			//atualiza revisao
		  	if($existente == 'S')
		  	{
			  	//busca revisao atual
			  	$buscaRevisao=mysql_query("SELECT MAX(revisao) AS revisao FROM siscom_vendas WHERE pacote = '$dados[0]'");

				while($rowBr=mysql_fetch_array($buscaRevisao))
				{
					$revisao = $rowBr['revisao'];
				}

				//adiciona + 1
				$revisao = $revisao + 1;
		  	}
		  	else
		  	{
			  	$revisao = 1;
		  	}	


				//popula tabela siscom_vendas
				$sql_insere =
					"INSERT INTO siscom_vendas(
						`pacote`,
						`data`,
						`hora`,
						`cnpj_cpf_cliente`,
						`razao_social`,
						`segmento`,
						`gerente_vendas`,
						`servico`,
						`status`,
						`produto`,
						`qtd`,
						`importacao_usuario`,
						`importacao_data`,
						`revisao`     
				    )VALUES(
						'$dados[0]',
						'$dados[1]',
						'$dados[2]',
						'$dados[3]',
						'$dados[4]',
						'$dados[5]',
						'$dados[6]',
						'$dados[7]',
						'$dados[8]',
						'$dados[9]',
						'$dados[10]',
						'$id',
						 NOW(),
						 $revisao 
				    )";

		}
		elseif ($info == 3) 
		{

			//atualiza revisao
		  	if($existente == 'S')
		  	{
			  	//busca revisao atual
			  	$buscaRevisao=mysql_query("SELECT MAX(revisao) as revisao FROM siscom_servico WHERE nro_solicitacao = '$dados[11]'");

				while($rowBr=mysql_fetch_array($buscaRevisao))
				{
					$revisao = $rowBr['revisao'];
				}

				//adiciona + 1
				$revisao = $revisao + 1;
		  	}
		  	else
		  	{
			  	$revisao = 1;
		  	}	


				//popula tabela siscom_servicos
				$sql_insere =
					"INSERT INTO siscom_servico(
						`cliente_especial`,
						`data`,
						`hora`,
						`cnpj_cpf_cliente`,
						`codigo_cliente`,
						`razao_social_cliente`,
						`servico`,
						`evento`,
						`gerente_negocio`,
						`escritorio_gn`,
						`gn_responsavel_canal`,
						`nro_solicitacao`,
						`status`,
						`acessos`,
						`importacao_usuario`,
						`importacao_data`,
						`revisao`     
				    )VALUES(
						'$dados[0]',
						'$dados[1]',
						'$dados[2]',
						'$dados[3]',
						'$dados[4]',
				        '$dados[5]',
				        '$dados[6]',
				        '$dados[7]',
				        '$dados[8]',
				        '$dados[9]',
				        '$dados[10]',
						'$dados[11]',
						'$dados[12]',
						'$dados[13]',
						'$id',
						 NOW(),
						 $revisao
					 )";
		
		}elseif ($info == 1) 
		{

				//popula tabela gs
				$sql_insere =
					"INSERT INTO gestao_servicos(
						`cod_solicitacao`,            
						`cod_sistema_origem`,     
						`cod_canal_entrada`,      
						`canal_entrada`,          
						`entrada`,               
						`saida`,                  
						`cod_status`,             
						`status`,                 
						`cliente`,               
						`responsavel`,            
						`apelido`,               
						`cod_produtos`,           
						`produto`,                
						`cod_servicos`,          
						`servico`,                
						`complemento`,            
						`qtd`,                    
						`dias_corridos`,          
						`dias_uteis`,             
						`cod_segmentos`,          
						`segmento`,               
						`categoria`,              
						`dt_entrada`,             
						`importacao_usuario`,    
						`importacao_data`     
				    )VALUES(
						'$dados[0]',
						'$dados[1]',
						'$dados[2]',
						'$dados[3]',
						'$dados[4]',
				        '$dados[5]',
				        '$dados[6]',
				        '$dados[7]',
				        '$dados[8]',
				        '$dados[9]',
				        '$dados[10]',
						'$dados[11]',
						'$dados[12]',
						'$dados[13]',
						'$dados[14]',
						'$dados[15]',
				        '$dados[16]',
				        '$dados[17]',
				        '$dados[18]',
				        '$dados[19]',
				        '$dados[20]',
				        '$dados[21]',
						'$dados[22]',
						'$id',
						 NOW()
					 )";
			
		}elseif ($info == 4) 
		{
				$sql_insere = '&' . str_replace("'","", $dados[5]) //cnpj
					        . '&' . str_replace("'","", $dados[6]) //nome_fantasia
					        . '&' . str_replace("'","", $dados[7]) //razao_social
					        . '&' . str_replace("'","", $dados[8]) //endereco
					        . '&' . str_replace("'","", $dados[9]) // cep
					        . '&' . str_replace("'","", $dados[10]) //cidade
							. '&' . str_replace("'","", $dados[11]) //estado
							. '&' . str_replace("'","", $dados[12]) //pais
							. '&' . str_replace("'","", $dados[48]) //div_gov
							. '&' . $id 
							. '&' . $data_cadastro;
			
			$sql_insere="CALL import_data('$sql_insere', '4');";
		}elseif ($info == 5)
		{
																	
				$sql_insere = '&' . str_replace("'","", $dados[0]) //Indicação de data e hora
					        . '&' . str_replace("'","", $dados[1]) //Analista pré
					        . '&' . str_replace("'","", $dados[2]) //SISCOM
					        . '&' . str_replace("'","", $dados[3]) //Categoria produto
					        . '&' . str_replace("'","", $dados[4]) // Devolução?
					        . '&' . str_replace("'","", $dados[5]) //CANAL DE ENTRADA
							. '&' . str_replace("'","", $dados[6]) //DATA RECEBIMENTO DA SOLICITAÇÃO
							. '&' . str_replace("'","", $dados[7]) //NÚMERO DO PACOTE DO SISCOM
							. '&' . str_replace("'","", $dados[8]) //PRODUTO	
							. '&' . str_replace("'","", $dados[9]) //TIPO DA SOLICITAÇÃO / CATEGORIA
							. '&' . str_replace("'","", $dados[10]) //SERVIÇOS
							. '&' . str_replace("'","", $dados[11]) //CNPJ
							. '&' . str_replace("'","", $dados[12]) //Razão Social
							. '&' . str_replace("'","", $dados[13]) //Quantidade de acessos
							. '&' . str_replace("'","", $dados[14]) //Número gestão de serviços
							. '&' . str_replace("'","", $dados[15]) //Data abertura gestão
							. '&' . str_replace("'","", $dados[16]) //Motivo devolução
							. '&' . str_replace("'","", $dados[17]) //Área devolução
							. '&' . str_replace("'","", $dados[18]) //Data de devolução
							. '&' . str_replace("'","", $dados[19]) //STATUS
							. '&' . str_replace("'","", $dados[20]); //Observações		

			$sql_insere="CALL import_data('$sql_insere', '5');";
		}elseif ($info == 6)
		{

			$sql_insere = '&' . str_replace("'","", $dados[0]) // Indicação de data e hora	
						. '&' . str_replace("'","", $dados[1]) // Analista tramitação	
						. '&' . str_replace("'","", $dados[2]) // Devolução?	
						. '&' . str_replace("'","", $dados[3]) // SISCOM	
						. '&' . str_replace("'","", $dados[4]) // Data entrada SISCOM	
						. '&' . str_replace("'","", $dados[5]) // Canal de entrada	
						. '&' . str_replace("'","", $dados[6]) // PRODUTO 	
						. '&' . str_replace("'","", $dados[7]) // TIPO DA SOLICITAÇÃO / CATEGORIA	
						. '&' . str_replace("'","", $dados[8]) //  SERVIÇOS 	
						. '&' . str_replace("'","", $dados[9]) // Qtde de acessos	
						. '&' . str_replace("'","", $dados[10]) // Número de pacotes Siscom	
						. '&' . str_replace("'","", $dados[11]) // CNPJ	
						. '&' . str_replace("'","", $dados[12]) // Razão Social	
						. '&' . str_replace("'","", $dados[13]) // Número gestão de serviços	
						. '&' . str_replace("'","", $dados[14]) // Data abertura gestão	
						. '&' . str_replace("'","", $dados[15]) // Categoria	
						. '&' . str_replace("'","", $dados[16]) // Data de devolução	
						. '&' . str_replace("'","", $dados[17]) // Data de Encerramento	
						. '&' . str_replace("'","", $dados[18]) // Status	
						. '&' . str_replace("'","", $dados[19]); // Observação	

			$sql_insere="CALL import_data('$sql_insere', '6');";
		}elseif ($info == 7)
		{

			$sql_insere =   '&' . str_replace("'","", $dados[0])   //reg_dt_entrada 
						  . '&' . str_replace("'","", $dados[1])   //usuario_pos_tramitacao       
						  . '&' . str_replace("'","", $dados[2])   //siscom                       
						  . '&' . str_replace("'","", $dados[3])   //data_entrada_siscom          
						  . '&' . str_replace("'","", $dados[4])   //canal_entrada                
						  . '&' . str_replace("'","", $dados[5])   //produto                      
						  . '&' . str_replace("'","", $dados[6])   //tipo_solicitacao             
						  . '&' . str_replace("'","", $dados[7])   //servico                      
						  . '&' . str_replace("'","", $dados[8])   //qtd_acessos                  
						  . '&' . str_replace("'","", $dados[9])   //cnpj                         
						  . '&' . str_replace("'","", $dados[10])  //razao_social                 
						  . '&' . str_replace("'","", $dados[11])  //n_gestao_servicos            
						  . '&' . str_replace("'","", $dados[12])  //motivo_devolucao             
						  . '&' . str_replace("'","", $dados[13])  //oportunidade                 
						  . '&' . str_replace("'","", $dados[14])  //proposta                     
						  . '&' . str_replace("'","", $dados[15])  //data_recebimento_pos         
						  . '&' . str_replace("'","", $dados[16])  //data_finalizado              
						  . '&' . str_replace("'","", $dados[17])  //contrato_mae                 
						  . '&' . str_replace("'","", $dados[18])  //obs                          
						  . '&' . str_replace("'","", $dados[19]);  //status                          
 
			$sql_insere="CALL import_data('$sql_insere', '7');";
		}elseif ($info == 8)
		{
			$sql_insere =   '&' . str_replace("'","", $dados[0])	// reg_dt_entrada
						  . '&' . str_replace("'","", $dados[1])	// Data da solicitação	
						  . '&' . str_replace("'","", $dados[2])	// ANALISTA	
						  . '&' . str_replace("'","", $dados[3])	// Devolução?	
						  . '&' . str_replace("'","", $dados[4])	// Canal de entrada	
						  . '&' . str_replace("'","", $dados[5])	// PRODUTO INTRAGOV	
						  . '&' . str_replace("'","", $dados[6])	// SERVIÇO INTRAGOV	
						  . '&' . str_replace("'","", $dados[7])	// Qtde de acessos	
						  . '&' . str_replace("'","", $dados[8])	// Motivo do Cancelamento	
						  . '&' . str_replace("'","", $dados[9])	// CNPJ	
						  . '&' . str_replace("'","", $dados[10])	// Razão Social	
						  . '&' . str_replace("'","", $dados[11])	// Número gestão de serviços	
						  . '&' . str_replace("'","", $dados[12])	// Data abertura gestão	
						  . '&' . str_replace("'","", $dados[13])	// Motivo devolução	
						  . '&' . str_replace("'","", $dados[14])	// Área Solicitante	
						  . '&' . str_replace("'","", $dados[15])	// Data de devolução	
						  . '&' . str_replace("'","", $dados[16])	// Data de Encerramento	
						  . '&' . str_replace("'","", $dados[17]);	// Status

			$sql_insere="CALL import_data('$sql_insere', '8');";
		}elseif ($info == 9)
		{
			$sql_insere =   '&' . str_replace("'","", $dados[0]) // reg_dt_entrada  
						  . '&' . str_replace("'","", $dados[1]) // tipo_entrada          
						  . '&' . str_replace("'","", $dados[2]) // contrato_mae          
						  . '&' . str_replace("'","", $dados[3]) // data_assinatura_doc   
						  . '&' . str_replace("'","", $dados[4]) // numero_documento      
						  . '&' . str_replace("'","", $dados[5]) // sistema_validacao     
						  . '&' . str_replace("'","", $dados[6]) // n_vantive             
						  . '&' . str_replace("'","", $dados[7]) // produto               
						  . '&' . str_replace("'","", $dados[8]) // data_trativa          
						  . '&' . str_replace("'","", $dados[9]) // nome_solicitante      
						  . '&' . str_replace("'","", $dados[10]) // nome_analista         
						  . '&' . str_replace("'","", $dados[11]) // n_gestao_servicos     
						  . '&' . str_replace("'","", $dados[12]) // razao_social          
						  . '&' . str_replace("'","", $dados[13]) // cnpj                  
						  . '&' . str_replace("'","", $dados[14]) // plano_solicitado      
						  . '&' . str_replace("'","", $dados[15]) // qtde_acesso           
						  . '&' . str_replace("'","", $dados[16]) // data_finalizacao      
						  . '&' . str_replace("'","", $dados[17]) // n_gs                  
						  . '&' . str_replace("'","", $dados[18]) // numero_wcd            
						  . '&' . str_replace("'","", $dados[19]); // contrato                    

			$sql_insere="CALL import_data('$sql_insere', '9');";
		}        


		$acao_insere= mysql_query($sql_insere) or die (mysql_error());
}
		
?>