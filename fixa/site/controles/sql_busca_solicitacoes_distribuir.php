<?php 

include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa/site/classes/cripto.php");

$cripto = new cripto();

$idUsuario   = isset($_GET['idUsuarioCriptografado']) ? $_GET['idUsuarioCriptografado'] : '';
$fase   = isset($_GET['fase']) ? $_GET['fase'] : ''; 
$n_gs   = isset($_GET['n_gs']) ? $_GET['n_gs'] : ''; 
$n_solicitacao   = isset($_GET['n_solicitacao']) ? $_GET['n_solicitacao'] : ''; 
$tipo   = isset($_GET['tipo']) ? $_GET['tipo'] : ''; 


if (!empty($opcao))
{	
	switch ($opcao)
	{ 
		case 'buscaSolicitacoesPreDistribuir': 
		{ 
			echo getSolicitacoesPreDistribuir($cripto, $idUsuario); 
			break; 
		}
		case 'buscaSolicitacoesPreOperador':
		{
			echo getSolicitacoesPreOperador($idUsuario, $cripto); 
			break; 
		}
		case 'buscaSolicitacoesTramPosDistribuir':
		{
			echo getSolicitacoesTramPosDistribuir($cripto, $idUsuario, $fase); 
			break;	
		}
		case 'buscaSolicitacoesTramOperador':
		{
			echo getSolicitacoesTramPosDistribuirOperador($cripto, $idUsuario, $fase); 
			break;	
		}
		case 'buscaSolicitacoesFila':
		{
			echo getSolicitacoesFila($n_solicitacao); 
			break;	
		}
		case 'buscaProtocoloSolicitacao':
		{
			echo getProtocoloSolicitacao($tipo);
			break;
		} 
	} 
} 

function getSolicitacoesPreDistribuir(cripto $cripto, $idUsuario)
{
	$idUsuario = $cripto->decodificar($idUsuario);

	$sql = mysql_query("CALL proc_distribuir_solicitacoes_pre($idUsuario)");

	while($fetch  = mysql_fetch_array($sql))
	{
		$output[]  = array (
			$fetch[0], //data, 
			$fetch[1], //hora, 
			$fetch[2], //id_solicitacao,
			$fetch[3], //importacao_data, 
			$fetch[4], //cnpj, 
			$fetch[5], //razao_social,
			$fetch[6], //status, 
			$fetch[7], //acessos, 
			$fetch[8], //revisao, 
			$fetch[9], //fonte, 
			$fetch[10], //importacao_usuario,
			$fetch[11], //distribuido,
			$fetch[12], //produto
			$fetch[13] //e2e
		);
	}



	echo json_encode($output);
}

function getSolicitacoesPreOperador($idUsuario, cripto $cripto)
{
	$idUsuario = $cripto->decodificar($idUsuario);

	$buscarOperador=mysql_query("SELECT u.id_usuario, u.nome, count(solicitacao_fases.id_solicitacao) as numero_solicitacoes, e2e 
								FROM usuario u LEFT JOIN solicitacao_fases 
								ON solicitacao_fases.id_usuario_resp = u.id_usuario
								WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
									  SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario UNION 
									  SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4)) 
								)AND id_perfil !=4 AND pre_tramitacao = 'Com operador'
								GROUP BY u.id_usuario
								UNION
								SELECT u.id_usuario, u.nome, 0 AS numero_solicitacoes, e2e 
								FROM usuario u 
								LEFT JOIN solicitacao_fases 
									ON solicitacao_fases.id_usuario_resp = u.id_usuario
									WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
										  SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario UNION 
										  SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4)) 
									)AND id_perfil in(5,11) and u.id_usuario NOT IN (SELECT id_usuario_resp FROM solicitacao_fases  where pre_tramitacao = 'Com operador')
								GROUP BY u.id_usuario
								ORDER BY nome");

    while($fetch  = mysql_fetch_array($buscarOperador))
	{
		$output[]  = array (
			$cripto->codificar($fetch[0]), //id_usuario, 
			$fetch[1], //nome, 
			$fetch[2], //n_pedidos,
			$fetch[3] //e2e,
		);
	}

	echo json_encode($output);

}

function getSolicitacoesTramPosDistribuir(cripto $cripto, $idUsuario, $fase)
{
	$idUsuario = $cripto->decodificar($idUsuario);

	$sql = mysql_query("CALL proc_distribuir_solicitacoes_tram_pos($idUsuario,'$fase')");

	if($fase == 'tramitacao')
	{
		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
				$fetch[0], //id_solicitacao
				$fetch[1], //n_gs
				$fetch[2], //data_inicio
				$fetch[3], //data_final
				$fetch[4], //QUANTIDADE DE DIAS DE TRATATIVA DA ETAPA
				$fetch[5], //data_abert
				$fetch[6], //cnpj
				$fetch[7], //razao_social
				$fetch[8], //e2e
				$fetch[9], //acessos
				$fetch[10], //obs_pre
				$fetch[11], //usuario_pre
				$fetch[12] //revisao
			);
		}
	}
	else if($fase == 'pos_tramitacao')
	{
		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
				$fetch[0], //id_solicitacao
				$fetch[1], //n_gs
				$fetch[2], //data_inicio
				$fetch[3], //data_final
				$fetch[4], //QUANTIDADE DE DIAS DE TRATATIVA DA ETAPA
				$fetch[5], //data_abert
				$fetch[6], //cnpj
				$fetch[7], //razao_social
				$fetch[8], //e2e
				$fetch[9], //acessos
				$fetch[10], //obs_pre
				$fetch[11], //usuario_pre
				$fetch[12], //revisao
				$fetch[13], //data_final_tram
                $fetch[14], //obs_tram
                $fetch[15]  //usuario_tram
			);
		}
	}

	echo json_encode($output);	
}

function getSolicitacoesTramPosDistribuirOperador(cripto $cripto, $idUsuario, $fase)
{
	$idUsuario = $cripto->decodificar($idUsuario);

	if($fase == 'tramitacao')
	{
		$buscarOperador=mysql_query("SELECT u.id_usuario, u.nome, count(solicitacao_fases.id_solicitacao) AS n_pedidos, e2e 
									FROM usuario u LEFT JOIN solicitacao_fases 
									ON solicitacao_fases.id_usuario_resp = u.id_usuario
									WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
										  SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario UNION 
										  SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4)) 
									)AND id_perfil !=4 AND tramitacao = 'Com operador'
									GROUP BY u.id_usuario
									UNION
									SELECT u.id_usuario, u.nome, 0 AS n_pedidos, e2e 
									FROM usuario u 
									LEFT JOIN solicitacao_fases 
										ON solicitacao_fases.id_usuario_resp = u.id_usuario
										WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
											  SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario UNION 
											  SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4)) 
										)AND id_perfil in(6,11) and u.id_usuario NOT IN (SELECT id_usuario_resp FROM solicitacao_fases  where tramitacao = 'Com operador')
									GROUP BY u.id_usuario
									ORDER BY nome");
	
		while($fetch  = mysql_fetch_array($buscarOperador))
		{
			$output[]  = array (
				$cripto->codificar($fetch[0]), //id_usuario, 
				$fetch[1], //nome, 
				$fetch[2], //n_pedidos,
				$fetch[3] //e2e,
			);
		}
	}
	else if($fase == 'pos_tramitacao')
	{
		$buscarOperador=mysql_query("SELECT u.id_usuario, u.nome, count(solicitacao_fases.id_solicitacao) as n_pedidos, e2e 
									FROM usuario u LEFT JOIN solicitacao_fases 
									ON solicitacao_fases.id_usuario_resp = u.id_usuario
									WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
										  SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario UNION 
										  SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4)) 
									)AND id_perfil !=4 AND pos_tramitacao = 'Com operador'
									GROUP BY u.id_usuario
									UNION
									SELECT u.id_usuario, u.nome, 0 AS n_pedidos, e2e 
									FROM usuario u 
									LEFT JOIN solicitacao_fases 
										ON solicitacao_fases.id_usuario_resp = u.id_usuario
										WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
											  SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario UNION 
											  SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4)) 
										)AND id_perfil = 7 and u.id_usuario NOT IN (SELECT id_usuario_resp FROM solicitacao_fases  where pos_tramitacao = 'Com operador')
									GROUP BY u.id_usuario
									ORDER BY nome"); 

		while($fetch  = mysql_fetch_array($buscarOperador))
		{
			$output[]  = array (
				$cripto->codificar($fetch[0]), //id_usuario, 
				$fetch[1], //nome, 
				$fetch[2], //n_pedidos,
				$fetch[3] //e2e,
			);
		}
 
	}


	echo json_encode($output);	
}

function getSolicitacoesFila($n_solicitacao)
{

	if($n_solicitacao != "null")
	{
		$buscarSolicitacoesFila=mysql_query("CALL proc_consulta_solicitacoes_fila('$n_solicitacao');");
	}else{
		$buscarSolicitacoesFila=mysql_query("CALL proc_consulta_solicitacoes_fila('Todos');");
	}

    while($fetch  = mysql_fetch_array($buscarSolicitacoesFila))
	{
		$output[]  = array (
			$fetch[0], //Fase, 
			$fetch[1], //Operador, 
			$fetch[2], //Protocolo
			$fetch[3], //gs
			$fetch[4], //Data Início,
			$fetch[5], //Revisão,
			$fetch[6] //Situação,
		);
	}

	echo json_encode($output);
}


function getProtocoloSolicitacao($tipo)
{
	if($tipo == "intragov")
	{
		$buscaUltimoIdGerado = mysql_query("SELECT Max(id_intragov) ultimoid FROM intragov");

		if(mysql_affected_rows() > 0)
		{

		    while($row_li=mysql_fetch_array($buscaUltimoIdGerado))
		    {
		        $ultimoid  = $row_li['ultimoid'];
		    }

		    $ultimoid = $ultimoid + 1;
		    $protocoloSolicitacao = "SI" . $ultimoid;
		}

		//insere na tabela novo id
		$insereNovaSolicitacao = "INSERT INTO intragov(id_solicitacao)VALUES('$protocoloSolicitacao')";
        $executaNovaInsercao= mysql_query($insereNovaSolicitacao) or die (mysql_error());		
	}
	else if($tipo == "gcom")
	{
		$buscaUltimoIdGerado = mysql_query("SELECT Max(id_gcom) ultimoid FROM gcom");

		if(mysql_affected_rows() > 0){

		    while($row_li=mysql_fetch_array($buscaUltimoIdGerado))
		    {
		        $ultimoid  = $row_li['ultimoid'];
		    }

		    $ultimoid = $ultimoid + 1;
		    $protocoloSolicitacao = "SG" . $ultimoid;
		}
		//insere na tabela novo id
		$insereNovaSolicitacao = "INSERT INTO gcom(id_solicitacao)VALUES('$protocoloSolicitacao')";
        $executaNovaInsercao= mysql_query($insereNovaSolicitacao) or die (mysql_error());	
	}
	else if($tipo == "pre_tramitacao")
	{

		$buscaUltimoIdGerado = mysql_query("SELECT Max(id_pre_tramitacao) ultimoid FROM pre_tramitacao");

		if(mysql_affected_rows() > 0)
		{

		    while($row_li=mysql_fetch_array($buscaUltimoIdGerado))
		    {
		        $ultimoid  = $row_li['ultimoid'];
		    }

		    $ultimoid = $ultimoid + 1;
		    $protocoloSolicitacao = "ST" . $ultimoid;
	    }
	    //insere na tabela novo id
		$insereNovaSolicitacao = "INSERT INTO pre_tramitacao(id_solicitacao)VALUES('$protocoloSolicitacao')";
        $executaNovaInsercao= mysql_query($insereNovaSolicitacao) or die (mysql_error());
	}

	echo json_encode($protocoloSolicitacao);
}