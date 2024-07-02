<?php

class UploadBase
{
	public $id;
	public $nome;

	  function __construct($id, $nome) 
	  {
	  		$this->id = $id;
	  		$this->nome = $nome;
	  }

	  function validaSolicitacaoImportada($base, $nro_solicitacao, $status)
	  {
	  		if($base == 'Siscom Vendas')
	  		{
	  			//verifica se ja nao existe solicitacao na base com este mesmo status, se nao tiver passa para proxima validação
	  			$validaSolicitacaoImportada = mysql_query("SELECT siscom FROM siscom_vendas WHERE siscom = '$nro_solicitacao' AND status = '$status'");
	  		
		  		if(mysql_affected_rows() == 0)
	            {
	            	//verifica se é item novo, se nao estiver na tabela solicitacao_fases é nova
	            	$validaSolicitacaoNova = mysql_query("SELECT id_solicitacao FROM solicitacao_fases WHERE id_solicitacao = '$nro_solicitacao'");

	            	if(mysql_affected_rows() == 0)
	            	{
	            		//verifica se ja foi distribuido, se ainda não foi não entra no sistema
		            	$validaSolicitacaoNova = mysql_query("SELECT siscom FROM siscom_vendas WHERE siscom = '$nro_solicitacao' AND distribuido IS NULL");

		            	if(mysql_affected_rows() == 0)
		            	{
		            		//item novo
		            		return true;
		            	}
		            }
	            	else
	            	{
		            	//verifica se esta solicitação ja foi concluida, se tiver não entra no sistema
		            	$validaSolicitacaoPendenteCadastro = mysql_query("SELECT id_solicitacao FROM solicitacao_fases 
		            													 WHERE id_solicitacao = '$nro_solicitacao' AND tramitacao = 'Concluído' 
		            													 AND aprovacao IN('Concluído','Tramitação Realizado/Produtos Especiais')");

		            	if(mysql_affected_rows() > 0)
			            {
			            	return false;
			            }
					}
		        }
	  		}
	  		else if($base == 'Siscom Servicos')
	  		{
	  			//verifica se ja nao existe solicitacao na base com este mesmo status, se nao tiver passa para proxima validação
	  			$validaSolicitacaoImportada = mysql_query("SELECT siscom FROM siscom_servicos WHERE siscom = '$nro_solicitacao' AND status = '$status'");
	  		
		  		if(mysql_affected_rows() == 0)
	            {
	            	//verifica se é item novo, se nao estiver na tabela solicitacao_fases é nova
	            	$validaSolicitacaoNova = mysql_query("SELECT id_solicitacao FROM solicitacao_fases WHERE id_solicitacao = '$nro_solicitacao'");

	            	if(mysql_affected_rows() == 0)
	            	{
	            		//verifica se ja foi distribuido, se ainda não foi não entra no sistema
		            	$validaSolicitacaoNova = mysql_query("SELECT siscom FROM siscom_servicos WHERE siscom = '$nro_solicitacao' AND distribuido IS NULL");

		            	if(mysql_affected_rows() == 0)
		            	{
		            		//item novo
		            		return true;
		            	}
		            }
	            	else
	            	{
		            	//verifica se esta solicitação ja foi concluida, se tiver não entra no sistema
		            	$validaSolicitacaoPendenteCadastro = mysql_query("SELECT id_solicitacao FROM solicitacao_fases 
		            													 WHERE id_solicitacao = '$nro_solicitacao' AND tramitacao = 'Concluído' 
		            													 AND aprovacao IN('Concluído','Tramitação Realizado/Produtos Especiais')");

		            	if(mysql_affected_rows() > 0)
			            {
			            	return false;
			            }
					}
		        }
	  		}
	  }

	  function validaSolicitacaoReprovada($nro_solicitacao, $base)
	  {
	  		if($base == "sv")
	  		{

	  			//verifica se solicitacao esta na lista de pendentes
				$validaSolicitacaoImportada = mysql_query("SELECT 
															sp.id_solicitacao, sp.status, sp.situacao 
														FROM solicitacoes_pendentes sp 
														WHERE sp.id_solicitacao = '$nro_solicitacao' AND sp.situacao != 'Corrigido'");
				
				if(mysql_affected_rows() > 0)
			    {
			    	//verifica se ja foi distribuido, se ainda não foi não entra no sistema
		            $validaSolicitacaoNova = mysql_query("SELECT siscom FROM siscom_vendas WHERE siscom = '$nro_solicitacao' AND distribuido IS NULL");

		            if(mysql_affected_rows() == 0)
		            {
		            	$validaReprovada = mysql_query("SELECT id_solicitacao 
		            									FROM solicitacao_fases 
		            									WHERE id_solicitacao = '$nro_solicitacao' AND (tramitacao = 'Reprovado' OR aprovacao = 'Reprovado')");

		            	//verifica se solicitação foi reprovada
		            	if(mysql_affected_rows() > 0)
			            {
			            	//verifica se esta solicitação ja foi concluida, se tiver não entra no sistema
		            		$validaSolicitacaoPendenteCadastro = mysql_query("SELECT id_solicitacao FROM solicitacao_fases 
		            													 WHERE id_solicitacao = '$nro_solicitacao' AND tramitacao = 'Concluído' 
		            													 AND aprovacao IN('Concluído','Tramitação Realizado/Produtos Especiais')");
		            		if(mysql_affected_rows() > 0)
				            {
				            	return false;
				            }
				            else
				            {
				            	return true;
				            }
			            }
			            else
			            {

			            	//verifica se esta solicitação ja foi concluida, se tiver não entra no sistema
		            		$validaSolicitacaoPendenteCadastro = mysql_query("SELECT id_solicitacao FROM solicitacao_fases 
		            													 WHERE id_solicitacao = '$nro_solicitacao' AND tramitacao = 'Concluído' 
		            													 AND aprovacao IN('Concluído','Tramitação Realizado/Produtos Especiais')");
		            		if(mysql_affected_rows() > 0)
				            {
				            	return false;
				            }
				            else
				            {
				            	//verifica se solicitacao já esta com operador ou na fila de distribuição, se estiver não entra de novo
		            			$validaSolicitacaoPendenteCadastro = mysql_query("SELECT * FROM solicitacao_fases 
																			WHERE id_solicitacao = '$nro_solicitacao' 
																			AND tramitacao IN ('Com operador','Fila de distribuição') 
																			OR aprovacao IN('Com operador', 'Devolvido para tramitação')
																			OR (tramitacao = 'Concluído' AND aprovacao IS NULL)");
		            			if(mysql_affected_rows() > 0)
		            			{
		            				return false;
		            			}
		            			else
		            			{
		            				return true;	
		            			}
				            }
				        }
			    	}
			    }
			    else
			    {
			    	//verifica se ja foi distribuido, se ainda não foi não entra no sistema
		            $validaSolicitacaoNova = mysql_query("SELECT siscom FROM siscom_vendas WHERE siscom = '$nro_solicitacao' AND distribuido IS NULL");

		            if(mysql_affected_rows() == 0)
		            {	

		            	//verifica se solicitacao já esta com operador ou na fila de distribuição, se estiver não entra de novo
		            	$validaSolicitacaoPendenteCadastro = mysql_query("SELECT * FROM solicitacao_fases 
																			WHERE id_solicitacao = '$nro_solicitacao' 
																			AND tramitacao IN ('Com operador','Fila de distribuição') 
																			OR aprovacao IN('Com operador', 'Devolvido para tramitação')
																			OR (tramitacao = 'Concluído' AND aprovacao IS NULL)");
		            	if(mysql_affected_rows() > 0)
		            	{
		            		
		            		return false;
		            	}
		            	else
		            	{
		            		//verifica se esta solicitação ja foi concluida, se tiver não entra no sistema
		            		$validaSolicitacaoPendenteCadastro = mysql_query("SELECT id_solicitacao FROM solicitacao_fases 
		            													 WHERE id_solicitacao = '$nro_solicitacao' AND tramitacao = 'Concluído' 
		            													 AND aprovacao IN('Concluído','Tramitação Realizado/Produtos Especiais')");
		            		if(mysql_affected_rows() > 0)
				            {
				            	return false;
				            }
				            else
				            {
				            	return true;
				            }
		            	}
		            }
			    }
			}
			else if($base == "ss")
			{
				//verifica se solicitacao esta na lista de pendentes
				$validaSolicitacaoImportada = mysql_query("SELECT 
															sp.id_solicitacao, sp.status, sp.situacao 
														FROM solicitacoes_pendentes sp 
														WHERE sp.id_solicitacao = '$nro_solicitacao' AND sp.situacao != 'Corrigido'");
				
				//item reprovado pela primeira vez
				if(mysql_affected_rows() > 0)
			    {
			    	//verifica se ja foi distribuido, se ainda não foi não entra no sistema
		            $validaSolicitacaoNova = mysql_query("SELECT siscom FROM siscom_servicos WHERE siscom = '$nro_solicitacao' AND distribuido IS NULL");

		            if(mysql_affected_rows() == 0)
		            {
		            	$validaReprovada = mysql_query("SELECT id_solicitacao 
		            									FROM solicitacao_fases 
		            									WHERE id_solicitacao = '$nro_solicitacao' AND (tramitacao = 'Reprovado' OR aprovacao = 'Reprovado')");

		            	//verifica se solicitação foi reprovada
		            	if(mysql_affected_rows() > 0)
			            {
			            	//verifica se esta solicitação ja foi concluida, se tiver não entra no sistema
		            		$validaSolicitacaoPendenteCadastro = mysql_query("SELECT id_solicitacao FROM solicitacao_fases 
		            													 WHERE id_solicitacao = '$nro_solicitacao' AND tramitacao = 'Concluído' 
		            													 AND aprovacao IN('Concluído','Tramitação Realizado/Produtos Especiais')");
		            		if(mysql_affected_rows() > 0)
				            {
				            	return false;
				            }
				            else
				            {
				            	return true;
				            }
			            }
			            else
			            {
		            	  	//verifica se esta solicitação ja foi concluida, se tiver não entra no sistema
		            		$validaSolicitacaoPendenteCadastro = mysql_query("SELECT id_solicitacao FROM solicitacao_fases 
		            													 WHERE id_solicitacao = '$nro_solicitacao' AND tramitacao = 'Concluído' 
		            													 AND aprovacao IN('Concluído','Tramitação Realizado/Produtos Especiais')");
		            		if(mysql_affected_rows() > 0)
				            {
				            	return false;
				            }
				            else
				            {
				            	//verifica se solicitacao já esta com operador ou na fila de distribuição, se estiver não entra de novo
		            			$validaSolicitacaoPendenteCadastro = mysql_query("SELECT * FROM solicitacao_fases 
																			WHERE id_solicitacao = '$nro_solicitacao' 
																			AND tramitacao IN ('Com operador','Fila de distribuição') 
																			OR aprovacao IN('Com operador', 'Devolvido para tramitação')
																			OR (tramitacao = 'Concluído' AND aprovacao IS NULL)");
		            			if(mysql_affected_rows() > 0)
		            			{
		            				return false;
		            			}
		            			else
		            			{
		            				return true;
		            			}
				            }
				        }
			    	}
			    }
			    else
			    {
			    	//verifica se ja foi distribuido, se ainda não foi não entra no sistema
		            $validaSolicitacaoNova = mysql_query("SELECT siscom FROM siscom_servicos WHERE siscom = '$nro_solicitacao' AND distribuido IS NULL");

		            if(mysql_affected_rows() == 0)
		            {
		            	//verifica se solicitacao já esta com operador ou na fila de distribuição, se estiver não entra de novo
		            	$validaSolicitacaoPendenteCadastro = mysql_query("SELECT * FROM solicitacao_fases 
																			WHERE id_solicitacao = '$nro_solicitacao' 
																			AND tramitacao IN ('Com operador','Fila de distribuição') 
																			OR aprovacao IN('Com operador', 'Devolvido para tramitação')
																			OR (tramitacao = 'Concluído' AND aprovacao IS NULL)");
		            	if(mysql_affected_rows() > 0)
		            	{
		            		return false;
		            	}
		            	else
		            	{
		            		//verifica se esta solicitação ja foi concluida, se tiver não entra no sistema
		            		$validaSolicitacaoPendenteCadastro = mysql_query("SELECT id_solicitacao FROM solicitacao_fases 
		            													 WHERE id_solicitacao = '$nro_solicitacao' AND tramitacao = 'Concluído' 
		            													 AND aprovacao IN('Concluído','Tramitação Realizado/Produtos Especiais')");
		            		if(mysql_affected_rows() > 0)
				            {
				            	return false;
				            }
				            else
				            {
				            	return true;
				            }
		            	}
		            }
			    }
			}
	  }

	  function validaDataAtualizacaoSiscom($data_atualizacao_siscom, $siscom)
	  {
	  		if(strlen($data_atualizacao_siscom) != 19)
	  		{
	  			$log = 'Informe data no formato dd/mm/aaaa hh:mm:ss';
	  			return $log;
	  		}
								
				$checkdata = mysql_query("SELECT data_entrada_siscom FROM tramitacao WHERE siscom = '$siscom' ORDER BY revisao DESC LIMIT 1");

				//verifica se solicitacao ja esta na base
				if(mysql_affected_rows() > 0)
            	{
	        		  $data = substr($data_atualizacao_siscom, 0, 10);
	        		  $hora = substr($data_atualizacao_siscom, 11, 18);


		              $data = explode("/", $data);
		              $data = $data[2] . "-" . $data[1] . "-" . $data[0] . ' ' . $hora;

		              $data = strtotime($data);
		              $data = date( "Y-m-d H:i:s", $data);


	            		//achou, verifica se data de atualizacao é diferente da ultima versao
	            		while($row_sup=mysql_fetch_array($checkdata))
						{ 
							$ultimaDataSiscom = $row_sup['data_entrada_siscom'];
						}

						  $dataUltimaRevisao = substr($ultimaDataSiscom, 0, 10);
		        		  $horaUltimaRevisao = substr($ultimaDataSiscom, 11, 18);

			              $dataUltimaRevisao = explode("/", $dataUltimaRevisao);

			              $dataUltimaRevisao = $dataUltimaRevisao[2] . "-" . $dataUltimaRevisao[1] . "-" . $dataUltimaRevisao[0] . ' ' . $horaUltimaRevisao;

			              $dataUltimaRevisao = strtotime($dataUltimaRevisao);
			              $dataUltimaRevisao = date( "Y-m-d H:i:s", $dataUltimaRevisao);

						if($dataUltimaRevisao == $data)
						{
							$log = 'Data de Atualização é igual a data da ultima versão';
							return $log;
						}
						else if($data < $dataUltimaRevisao)
						{
							$log = 'Data de Atualização é menor que a data ultima revisão';
							return $log;
						}
						else
						{
							return 1;
						}
				}
				else
				{
					return '1';
				}		
	  }
}?>