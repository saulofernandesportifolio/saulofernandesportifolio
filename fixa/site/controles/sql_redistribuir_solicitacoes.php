<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("../fixa/bd.php");

if(isset($_POST['data'])){
	$data_cadastro = $_POST['data'];
	$data_cadastro = explode("/", $data_cadastro);
	$data_cadastro = $data_cadastro[2] . "-" . $data_cadastro[1] . "-" . $data_cadastro[0];
	$data_cadastro = strtotime($data_cadastro);
	$data_cadastro = date( 'Y-m-d', $data_cadastro);
}else{
	$data_cadastro=date("Y-m-d");
}
require_once '../fixa/site/classes/cripto.php';
$cripto = new cripto();

$sup = $_POST['sup'];
$sup =  $cripto->decodificar($sup);
$op = $_POST['op'];

$solicitacoesArray = $_POST['sm'];
$fase = $_POST['fase'];
$fonte = $_POST['source'];
$nSolicitacoes = count($solicitacoesArray); 


if($nSolicitacoes == 0)
{
	exit();
}else{
	//atualiza informaçoes
	for($item = 0; $item < $nSolicitacoes; $item++) {

			//get solicitacao and revisao
			$dadosSolicitacao = explode("&", $solicitacoesArray[$item]);
			$solicitacaoId = $dadosSolicitacao[0];
			$revisao	   = $dadosSolicitacao[1];
		    
		    //redistribui solicitacao - atualiza usuario (busca informacoes)
			$fetchDadosUsuarioSolic = mysql_query("SELECT * FROM usuario_solicitacao WHERE id_solicitacao = '$solicitacaoId' AND revisao = $revisao");

			if(mysql_affected_rows() > 0)
			{

			    while($row_us=mysql_fetch_array($fetchDadosUsuarioSolic))
			    {
			        $dataEntrada  = $row_us['reg_data'];
			        $revisao 	  = $row_us['revisao'];
			    }
			}

			//deleta solicitacao do usuario antigo
			$sql_delete_usuario_solicitacao="DELETE FROM usuario_solicitacao WHERE id_solicitacao = '$solicitacaoId' AND revisao = $revisao"; 

			$acao_insere= mysql_query($sql_delete_usuario_solicitacao) or die (mysql_error());

			//insere novo responsável - data e revisao permanecem a mesma de antes
			$sql_insere="INSERT INTO usuario_solicitacao(id_usuario, id_solicitacao, id_supervisor, reg_data, revisao) 
							VALUES('$op', '$solicitacaoId', '$sup', '$dataEntrada', $revisao)";

			$acao_insere= mysql_query($sql_insere) or die (mysql_error());

			//atualiza tabela solicitacao_fases 
			if($fase == 'pre_tramitacao'){

					//atualiza solicitacao fases
					$sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
														SET 
															pre_tramitacao	 = 'Com operador', 
															tramitacao = '',
															id_usuario_resp  = '$op',
															data_ultima_acao = now(),
															fonte = 'Redistribuicao'
														WHERE id_solicitacao = '$solicitacaoId'";	
			     	
			}
			else if($fase == 'tramitacao')
			{
				$sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
													SET 
														tramitacao 		 = 'Com operador',
														pos_tramitacao 	 = '', 
														id_usuario_resp  = $op,
														data_ultima_acao = now(),
														fonte = 'Redistribuicao'
													WHERE id_solicitacao = '$solicitacaoId'";	
			}
			else if($fase == 'pos_tramitacao')
			{
				$sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
													SET 
														pos_tramitacao 	= 'Com operador', 
														id_usuario_resp = $op,
														data_ultima_acao = now(),
														fonte = 'Redistribuicao'
													WHERE id_solicitacao = '$solicitacaoId'";	
			}else if($fase == 'gcon')
			{
				$sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
													SET 
														gcom 	= 'Com operador', 
														id_usuario_resp = $op,
														data_ultima_acao = now(),
														fonte = 'Redistribuicao'
													WHERE id_solicitacao = '$solicitacaoId'";	
			}else if($fase == 'intragov')
			{
				$sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
													SET 
														intragov 	= 'Com operador', 
														id_usuario_resp = $op,
														data_ultima_acao = now(),
														fonte = 'Redistribuicao'
													WHERE id_solicitacao = '$solicitacaoId'";	
			}

  	  	 	$acao_atualiza_status_fase_edicao = mysql_query($sql_atualiza_status_fase_edicao) or die (mysql_error());
	 }
}

?>