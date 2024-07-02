<?php 

include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa/site/classes/cripto.php");

$cripto = new cripto();

$chamado   = isset($_GET['chamado']) ? $_GET['chamado'] : ''; 
$protocolo = isset($_GET['protocolo']) ? $_GET['protocolo'] : '';
$revisao   = isset($_GET['revisao']) ? $_GET['revisao'] : '';  

if (!empty($opcao))
{	
	switch ($opcao)
	{ 
		case 'buscaHistoricoComentarios': 
		{ 
			echo getHistoricoComentarios($chamado, $protocolo, $revisao); 
			break; 
		}
		case 'buscaHistoricoRetornoTi': 
		{ 
			echo getHistoricoRetornoTi($chamado, $protocolo, $revisao); 
			break; 
		}
	} 
} 

function getHistoricoComentarios($chamado, $protocolo, $revisao)
{

	$sql = mysql_query("SELECT 
							date_format(cc.reg_data,'%d/%m/%Y') AS reg_data, 
							u.nome, 
							trim(cc.comentario) AS comentario 
						FROM chamado_comentarios cc
							INNER JOIN usuario u ON  u.id_usuario = cc.reg_usuario
						WHERE chamado = '$chamado' AND solicitacao = '$protocolo' AND revisao = '$revisao'");

	while($fetch  = mysql_fetch_array($sql))
	{
		$output[]  = array (
			$fetch[0], //reg_data, 
			$fetch[1], //reg_usuario, 
			$fetch[2] //comentario
		);
	}

	echo json_encode($output);
}

function getHistoricoRetornoTi($chamado, $protocolo, $revisao)
{

	$sql = mysql_query("SELECT 
							data_retorno_ti, 
							parecer_ti
						FROM chamados
						WHERE nro_chamado = '$chamado' AND id_solicitacao = '$protocolo' AND revisao = '$revisao'");

	while($fetch  = mysql_fetch_array($sql))
	{
		$output[]  = array (
			$fetch[0], //reg_data, 
			$fetch[1] //reg_usuario, 
		);
	}

	echo json_encode($output);
}
