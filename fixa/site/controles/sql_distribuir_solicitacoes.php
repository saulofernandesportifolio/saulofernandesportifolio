<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("../fixa/bd.php");
require_once '../fixa/site/classes/cripto.php';
$cripto = new cripto();

if(isset($_POST['data'])){
	$data_cadastro = $_POST['data'];
	$data_cadastro = explode("/", $data_cadastro);
	$data_cadastro = $data_cadastro[2] . "-" . $data_cadastro[1] . "-" . $data_cadastro[0];
	$data_cadastro = strtotime($data_cadastro);
	$data_cadastro = date( 'Y-m-d', $data_cadastro);
}else{
	$data_cadastro=date("Y-m-d");
}

$sup = $_POST['sup'];
$sup =  $cripto->decodificar($sup);
$op = $_POST['op'];
$op = $cripto->decodificar($op);
$solicitacoesArray = $_POST['sm'];
$fase = $_POST['fase'];
$fonte = $_POST['source'];


$nSolicitacoes = count($solicitacoesArray); 

if($nSolicitacoes == 0)
{
	exit();
}else{
	//atualiza informaçoes na tabela de usuario x solicitacao
	for($item = 0; $item < $nSolicitacoes; $item++) {

			if($fonte == 'distribuicao_manual')
			{

					$solicitacaoId = $solicitacoesArray[$item];

					if($fase == 'pre_tramitacao' || $fase == 'tramitacao' || $fase == 'pos_tramitacao')
					{
						//busca revisao solicitacao manual
						$fetchRevisaoManual = mysql_query("SELECT IFNULL(MAX(revisao),0) AS revisao FROM pre_tramitacao WHERE id_solicitacao = '$solicitacaoId'");
					}
					else if($fase == 'intragov')
					{
						//busca revisao solicitacao manual
						$fetchRevisaoManual = mysql_query("SELECT IFNULL(MAX(revisao),0) AS revisao FROM intragov WHERE id_solicitacao = '$solicitacaoId'");
					}else if($fase == 'gcom')
					{
						//busca revisao solicitacao manual
						$fetchRevisaoManual = mysql_query("SELECT IFNULL(MAX(revisao),0) AS revisao FROM gcom WHERE id_solicitacao = '$solicitacaoId'");
					}

					if(mysql_affected_rows() > 0)
					{
				    	  while($rowrm=mysql_fetch_array($fetchRevisaoManual))
				    	  {
				    	  		$revisao = $rowrm['revisao'] + 1;
				    	  }
					}
					else
					{
						$revisao = 1;
					}
				
					$priorizacao = 0;
			}
			else
			{
				//get solicitacao and revisao
				$dadosSolicitacao = explode("&", $solicitacoesArray[$item]);
				$solicitacaoId = $dadosSolicitacao[0];
				$revisao	   = $dadosSolicitacao[1];
				$priorizacao   = $dadosSolicitacao[2];
			}

			//distribui solicitacao para usuario
			$sql_insere="INSERT INTO usuario_solicitacao(id_usuario, id_solicitacao, id_supervisor, reg_data, revisao, priorizacao) 
						VALUES('$op', '$solicitacaoId', '$sup', '$data_cadastro', $revisao, $priorizacao)";

			$acao_insere= mysql_query($sql_insere) or die (mysql_error());

			//atualiza tabela solicitacao_fases 
			if($fase == 'pre_tramitacao')
			{

					//verifica se item ja existe na tabela solicitacao de fases
					$checkSolicitacaoFases=mysql_query("SELECT * FROM solicitacao_fases WHERE id_solicitacao = '$solicitacaoId'");

			     	if(mysql_affected_rows() > 0)
			     	{
			     		$sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
															SET 
																pre_tramitacao	 = 'Com operador', 
																id_usuario_resp  = $op,
																revisao 		 = $revisao,
																data_ultima_acao = '$data_cadastro',
																fonte 			 = 'Distribuicao'
															WHERE id_solicitacao = '$solicitacaoId'";	
			     	}
		     		else
		     		{
						$sql_atualiza_status_fase_edicao = "INSERT INTO solicitacao_fases(id_solicitacao, pre_tramitacao, id_usuario_resp, revisao, data_ultima_acao, fonte) 
													VALUES('$solicitacaoId', 'Com operador', '$op', '$revisao', '$data_cadastro','Distribuicao')";
		     		}

		     		$sql_inicia_pre = "UPDATE pre_tramitacao
		     							SET id_solicitacao = '$solicitacaoId', revisao = '$revisao' 
										WHERE id_solicitacao = '$solicitacaoId'";

					$acao_atualiza_inicia_pre = mysql_query($sql_inicia_pre) or die (mysql_error());
					
			}
			else if($fase == 'tramitacao')
			{
				$sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
													SET 
														tramitacao 		 = 'Com operador', 
														id_usuario_resp  = $op,
														revisao 		 = $revisao,
														data_ultima_acao = '$data_cadastro',
														fonte 			 = 'Distribuicao'
													WHERE id_solicitacao = '$solicitacaoId'";	
			}
			else if($fase == 'pos_tramitacao')
			{
				$sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
													SET 
														pos_tramitacao 	 = 'Com operador', 
														id_usuario_resp  = $op,
														revisao 		 = $revisao,
														data_ultima_acao = '$data_cadastro',
														fonte 			 = 'Distribuicao'
													WHERE id_solicitacao = '$solicitacaoId'";	
			}
			else if($fase == 'intragov')
			{
				//verifica se item ja existe na tabela solicitacao de fases
				$checkSolicitacaoFases=mysql_query("SELECT * FROM solicitacao_fases WHERE id_solicitacao = '$solicitacaoId'");

		     	if(mysql_affected_rows() > 0)
		     	{
		     		$sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
														SET 
															intragov			= 'Com operador', 
															id_usuario_resp 	= $op,
															revisao 			= $revisao,
															data_ultima_acao    = '$data_cadastro',
															fonte 			 	= 'Distribuicao'
														WHERE id_solicitacao 	= '$solicitacaoId'";	
		     	}
	     		else
	     		{
					$sql_atualiza_status_fase_edicao = "INSERT INTO solicitacao_fases(id_solicitacao, intragov, id_usuario_resp, revisao, data_ultima_acao, fonte) 
												VALUES('$solicitacaoId', 'Com operador', '$op', '$revisao', '$data_cadastro', 'Distribuicao')";
	     		}

	     		$sql_inicia_intragov = "UPDATE intragov
		     							SET id_solicitacao = '$solicitacaoId', revisao = '$revisao' 
										WHERE id_solicitacao = '$solicitacaoId'";

				$acao_atualiza_inicia_intragov = mysql_query($sql_inicia_intragov) or die (mysql_error());
				
			}
			else if($fase == 'gcom')
			{
					//verifica se item ja existe na tabela solicitacao de fases
					$checkSolicitacaoFases=mysql_query("SELECT * FROM solicitacao_fases WHERE id_solicitacao = '$solicitacaoId'");

			     	if(mysql_affected_rows() > 0)
			     	{
			     		$sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
															SET 
																gcom				 = 'Com operador', 
																id_usuario_resp 	 = $op,
																revisao 			 = $revisao,
																data_ultima_acao     = '$data_cadastro',
																fonte 			 	 = 'Distribuicao'
															WHERE id_solicitacao = '$solicitacaoId'";	
			     	}
		     		else
		     		{
						$sql_atualiza_status_fase_edicao = "INSERT INTO solicitacao_fases(id_solicitacao, gcom, id_usuario_resp, revisao, data_ultima_acao, fonte) 
													VALUES('$solicitacaoId', 'Com operador', '$op', '$revisao', '$data_cadastro', 'Distribuicao')";
		     		}

		     		$sql_inicia_gcon = "UPDATE gcom
		     							SET id_solicitacao = '$solicitacaoId', revisao = '$revisao' 
										WHERE id_solicitacao = '$solicitacaoId'";

					$acao_atualiza_inicia_gcon = mysql_query($sql_inicia_gcon) or die (mysql_error());	
			}

  	  	 	$acao_atualiza_status_fase_edicao = mysql_query($sql_atualiza_status_fase_edicao) or die (mysql_error());

  	  	 	//verifica se solic. é encontrada tabela siscom vendas
  	  	 	$query_busca_siscom_vendas = mysql_query("SELECT pacote FROM siscom_vendas WHERE pacote = '$solicitacaoId'");

  	  	 	if(mysql_affected_rows() > 0){
  	  	 		//atualiza tabela siscom vendas
  	  	 		$query_atualiza_siscom_vendas = "UPDATE siscom_vendas SET distribuido = 'S' WHERE pacote = '$solicitacaoId'";
  	  	
  	  	 		$acao_atualiza_siscom_vendas = mysql_query($query_atualiza_siscom_vendas) or die (mysql_error());
  	  	 	}

  	  	 	//verifica se solic. é encontrada tabela siscom servicos
  	  	 	$query_busca_siscom_servico = mysql_query("SELECT nro_solicitacao FROM siscom_servico WHERE nro_solicitacao = '$solicitacaoId'");

  	  	 	if(mysql_affected_rows() > 0){
  	  	 		//atualiza tabela siscom vendas
  	  	 		$query_atualiza_siscom_servico = "UPDATE siscom_servico SET distribuido = 'S' WHERE nro_solicitacao = '$solicitacaoId'";
  	  	 	
  	  	 		$acao_atualiza_siscom_servico = mysql_query($query_atualiza_siscom_servico) or die (mysql_error());
  	  	 	}

	}
						
}

?>
