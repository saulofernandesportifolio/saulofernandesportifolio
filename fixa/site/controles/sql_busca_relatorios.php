<?php 

include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa/site/classes/cripto.php");

$cripto = new cripto();

$mes   = isset($_GET['mes']) ? $_GET['mes'] : '';

if (!empty($opcao))
{	
	switch ($opcao)
	{ 
		case 'buscaRelatorioAuditoria': 
		{ 
			echo getRelatorioAuditoria($mes); 
			break; 
		}
		case 'buscaRelatorioAuditoriaStatus': 
		{ 
			echo getRelatorioAuditoriaStatus($mes); 
			break; 
		}
	} 
} 

function getRelatorioAuditoria($mes)
{
	$sql = mysql_query("CALL proc_rel_auditoria($mes)");

	while($fetch  = mysql_fetch_array($sql))
	{
		$output[]  = array (
			$fetch[0], //dia, 
			$fetch[1] //numero_solicitacoes, 
		);
	}


	echo json_encode($output);
}

function getRelatorioAuditoriaStatus($mes)
{
	$sql = mysql_query("SELECT 
							aprovado,
							ROUND((numero * 100)/total) AS porcentagem
						FROM(
							SELECT 
								aprovado,
								COUNT(id_solicitacao) as numero,
								(
									SELECT COUNT(id_solicitacao) 
									FROM tramitacao_historico 
									WHERE month(reg_dt_entrada) = $mes AND cat_produto = 'Voz'
								) as total
							FROM tramitacao_historico 
							WHERE month(reg_dt_entrada) = $mes AND cat_produto = 'Voz'
							GROUP BY aprovado
						) tabela
						");

		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
				$fetch[0], //aprovado, 
				$fetch[1] //porcentagem, 
			);
		}

		echo json_encode($output);
}