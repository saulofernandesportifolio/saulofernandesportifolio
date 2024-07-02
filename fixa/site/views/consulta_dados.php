﻿<?php 

include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa/site/classes/cripto.php");

$cripto = new cripto();

$idUsuarioCriptografado   = isset($_GET['idUsuarioCriptografado']) ? $_GET['idUsuarioCriptografado'] : ''; 
$idUsuarioCriptografado = $cripto->decodificar($idUsuarioCriptografado);

$opcao  = isset($_GET['opcao']) ? $_GET['opcao'] : ''; 
$valor  = isset($_GET['valor']) ? $_GET['valor'] : ''; 
$valor2 = isset($_GET['valor2']) ? $_GET['valor2'] : ''; 
$form   = isset($_GET['form']) ? $_GET['form'] : ''; 
$n_gs = isset($_GET['n_gs']) ? $_GET['n_gs'] : ''; 
$n_solicitacao   = isset($_GET['n_solicitacao']) ? $_GET['n_solicitacao'] : ''; 
$fase   = isset($_GET['fase']) ? $_GET['fase'] : ''; 
$ids   = isset($_GET['ids']) ? $_GET['ids'] : '';
$idUsuario   = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : ''; 
$cnpj = isset($_GET['cnpj']) ? $_GET['cnpj'] : '';

if (!empty($opcao))
{	
	switch ($opcao)
	{ 
		case 'motivo': 
		{ 
			echo getFilterMotivo($valor, $form); 
			break; 
		} 
		case 'descricao_motivo': 
		{ 
			echo getFilterDescricaoMotivo($valor, $form); 
			break; 
		}
		case 'tipo_solicitacao': 
		{ 
			echo getFilterTipoSolicitacao($valor, $form); 
			break; 
		}
		case 'complemento_tipo_solicitacao': 
		{ 
			echo getFilterComplementoTipoSolicitacao($valor, $valor2, $form); 
			break; 
		}
		case 'produto_manual':
		{
			echo getFilterProduto($valor, $form); 
			break; 
		}
		case 'servico_intragov':
		{
			echo getFilterServicoIntragov($form); 
			break; 
		}
		case 'tabela_devolucao':
		{
			echo getDevolucaoData($valor); 
			break; 
		}
		case 'tabela_solicitacao':
		{
			echo getSolicitacaoData($n_solicitacao, $n_gs);
			break; 
		}
		case 'tabela_redistribuicao':
		{
			echo getSolicitacaoRedistribuicao($n_solicitacao);
			break; 
		}
		case 'usuario_fase':
		{
			echo getUsuarioFase($fase, $idUsuarioCriptografado);
			break; 
		}
		case 'consultaSolicitacaoExistente':
		{
			echo getSolicitacaoDataPendentes($ids);
			break; 
		}  
		case 'consultaItensPendentesFasesOperador':
		{
			echo getSolicitacoesPendentesFaseOperador($idUsuarioCriptografado, $fase);
			break; 
		}
		case 'consultaFilaChamados':
		{
			echo getconsultaFilaChamados($idUsuarioCriptografado);
			break; 
		}
		case 'buscaRazaoSocial':
		{
			echo getRazaoSocialByCnpj($cnpj);
		}  
	} 
} 


	function getFilterMotivo($valor, $form)
	{ 
		$sql  = mysql_query("SELECT DISTINCT descricao FROM motivo_devolucao WHERE area  LIKE '%$valor%' AND fase  LIKE '%$form%' ORDER BY descricao"); 
		while($fetch = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0]  //descricao,	
			);
		}

		echo json_encode($output);
	}

	function getFilterDescricaoMotivo($valor, $form)
	{ 
		$sql  = mysql_query("SELECT DISTINCT descricao_detalhes FROM motivo_devolucao WHERE descricao  LIKE '%$valor%' AND fase  LIKE '%$form%' ORDER BY descricao_detalhes"); 
		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0]  //descricao,	
			);
		}

		echo json_encode($output);
	}

	function getFilterTipoSolicitacao($valor, $form)
	{ 
		$sql  = mysql_query("SELECT DISTINCT descricao FROM tipo_solicitacao WHERE categoria_produto  LIKE '%$valor%' ORDER BY descricao"); 
		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0]  //descricao,	
			);
		}

		echo json_encode($output);
	}

	function getFilterComplementoTipoSolicitacao($valor, $valor2, $form)
	{ 
		$sql  = mysql_query("SELECT DISTINCT completo FROM tipo_solicitacao WHERE categoria_produto  LIKE '%$valor%' AND descricao  LIKE '%$valor2%' ORDER BY completo"); 
		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0]  //descricao,	
			);
		}

		echo json_encode($output);
	}

	function getFilterProduto($valor, $form)
	{ 
		$sql  = mysql_query("SELECT DISTINCT descricao FROM produto WHERE categoria_produto  LIKE '%$valor%' ORDER BY descricao"); 
		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0]  //descricao,	
			);
		}

		echo json_encode($output);
	}

	function getFilterServicoIntragov($form)
	{ 
		$sql  = mysql_query("SELECT DISTINCT descricao FROM tipo_solicitacao WHERE categoria_produto  LIKE '%$form%' ORDER BY descricao"); 
		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0]  //descricao,	
			);
		}

		echo json_encode($output);
	}

	function getDevolucaoData($valor)
	{
		$sql  = mysql_query("SELECT 
								reg_data, 
								reg_usuario,
								nro_solicitacao,
								revisao,
								fase,
								status,
								area,
								motivo,
								motivo_descricao,
								situacao
							FROM v_consulta_devolucoes
							WHERE area LIKE '%$valor%'
							ORDER BY reg_data");

		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0], //reg_data, 
					$fetch[1], //reg_usuario,
					$fetch[2], //nro_solicitacao,
					$fetch[3], //revisao,
					$fetch[4], //fase,
					$fetch[5], //status,
					$fetch[6], //area,
					$fetch[7], //motivo,
					$fetch[8],  //motivo_descricao
					$fetch[9]  //situacao
			);
		}

		echo json_encode($output);
	}

	function getSolicitacaoData($n_solicitacao, $n_gs)
	{	
		if($n_solicitacao != "null"){
			$sql = mysql_query("SELECT * FROM v_consulta_solicitacoes_pre WHERE n_solicitacao = '$n_solicitacao' UNION ALL
								SELECT * FROM v_consulta_solicitacoes_tramitacao WHERE n_solicitacao = '$n_solicitacao' UNION ALL
								SELECT * FROM v_consulta_solicitacoes_pos WHERE n_solicitacao = '$n_solicitacao' UNION ALL
								SELECT * FROM v_consulta_solicitacoes_intragov WHERE n_solicitacao = '$n_solicitacao' UNION ALL
								SELECT * FROM v_consulta_solicitacoes_gcon WHERE n_solicitacao = '$n_solicitacao' ORDER BY data");
		}else if($n_gs != "null"){
			$sql = mysql_query("SELECT * FROM v_consulta_solicitacoes_pre WHERE n_gs = $n_gs UNION ALL
								SELECT * FROM v_consulta_solicitacoes_tramitacao WHERE n_gs = $n_gs UNION ALL
								SELECT * FROM v_consulta_solicitacoes_pos WHERE n_gs = $n_gs UNION ALL
								SELECT * FROM v_consulta_solicitacoes_intragov WHERE n_gs = $n_gs UNION ALL 
								SELECT * FROM v_consulta_solicitacoes_gcon WHERE n_gs = $n_gs ORDER BY data");
		}
		
		
		
		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0], //solicitacoes.data,
					$fetch[1], //u.nome AS operador,
					$fetch[2], //u.cpf,
					$fetch[3], //solicitacoes.n_solicitacao,
					$fetch[4], //solicitacoes.n_gs,
					$fetch[5], //solicitacoes.fase,
					$fetch[6], //ss.descricao AS status,
					$fetch[7], //solicitacoes.cnpj,
					$fetch[8], //solicitacoes.razao_social,
					$fetch[9], //solicitacoes.qtd_acessos,
					$fetch[10] //solicitacoes.revisao
			);
		}

		echo json_encode($output);
	}

	function getSolicitacaoDataPendentes($n_solicitacao)
	{
		$sql = mysql_query("SELECT id_solicitacao, status, situacao FROM solicitacoes_pendentes sp 
							WHERE id_solicitacao = '$n_solicitacao' AND situacao != 'Corrigido'");
		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0], //id_solicitacao,
					$fetch[1], //status,
					$fetch[2]  //situacao
			);
		}

		echo json_encode($output);
	} 

	function getSolicitacaoRedistribuicao($n_solicitacao)
	{
		$sql = mysql_query("SELECT 
								IFNULL(sf.id_solicitacao,''),
								IFNULL(sf.id_gestao_servicos,''),
								IFNULL(sf.pre_tramitacao,''),
								IFNULL(sf.tramitacao,''),
								IFNULL(sf.pos_tramitacao,''),
								IFNULL(u.nome,'') AS nome_operador,
								IFNULL(sf.revisao,''),
								IFNULL(sf.gcom,''),
								IFNULL(sf.intragov,'')
							FROM solicitacao_fases sf
								LEFT JOIN usuario u
									ON sf.id_usuario_resp = u.id_usuario
							WHERE id_solicitacao = '$n_solicitacao'");

		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0], //id_solicitacao,
					$fetch[1], //id_gestao_servicos,
					$fetch[2], //pre_tramitacao,
					$fetch[3], //tramitacao,
					$fetch[4], //pos_tramitacao,
					$fetch[5], //nome_operador,
					$fetch[6], //revisao
					$fetch[7], //gcon
					$fetch[8]  //intragov
			);
		}

		echo json_encode($output);
	}

	function getUsuarioFase($fase, $idUsuario)
	{
		
		if($fase == 'pre_tramitacao')
		{
			$sql=mysql_query("SELECT  
								u.id_usuario, 
								u.nome,
								IFNULL(solicitacao.n_solicitacao,0) AS n_pedidos
							FROM usuario u
								LEFT JOIN solicitacao_fases sf
									ON u.id_usuario = sf.id_usuario_resp
								LEFT JOIN(
									SELECT COUNT(sf.id_solicitacao) AS n_solicitacao, u.id_usuario 
									FROM usuario u
										LEFT JOIN solicitacao_fases sf
											ON u.id_usuario = sf.id_usuario_resp 
									GROUP BY sf.id_usuario_resp
								)AS solicitacao
									ON solicitacao.id_usuario = u.id_usuario
							WHERE
								u.id_supervisor in  (
									SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario
									UNION 
									-- allow analista lider and operador pre-tramitacao to do the redistribution 
									SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4) 
								) 
							AND u.id_perfil IN(5,11)
							GROUP BY u.id_usuario");

			 while($fetch  = mysql_fetch_array($sql))
			 {
				$output[]  = array (
						$fetch[0], //id_usuario,
						$fetch[1], //nome,
						$fetch[2] //n_pedidos,
				);
			 }

			echo json_encode($output);  	
		}
		else if($fase == 'tramitacao')
		{
			$sql=mysql_query("SELECT  
							u.id_usuario, 
							u.nome,
							IFNULL(solicitacao.n_pedidos,0) AS n_pedidos
						FROM usuario u
							LEFT JOIN solicitacao_fases sf
								ON u.id_usuario = sf.id_usuario_resp
							LEFT JOIN(
								SELECT 
									COUNT(id_solicitacao) n_pedidos,
									id_usuario_resp
								FROM solicitacao_fases 
								WHERE tramitacao = 'Concluído'
								GROUP BY id_usuario_resp
								UNION
								SELECT 
									COUNT(id_solicitacao) n_pedidos,
									id_usuario_resp
								FROM solicitacao_fases 
								WHERE tramitacao != 'Concluído'
								GROUP BY id_usuario_resp
							)AS solicitacao
								ON solicitacao.id_usuario_resp = u.id_usuario
						WHERE
							u.id_supervisor in  (
								SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario
								UNION 
								-- allow analista lider and operador pre-tramitacao to do the redistribution 
								SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4,5) 
							) 
						AND u.id_perfil IN(6,11)
						GROUP BY u.id_usuario");

			 while($fetch  = mysql_fetch_array($sql))
			 {
				$output[]  = array (
						$fetch[0], //id_usuario,
						$fetch[1], //nome,
						$fetch[2] //n_pedidos,
				);
			 }

			echo json_encode($output);  	
		}
		else if($fase =='pos_tramitacao')
		{
			$sql=mysql_query(
	            "SELECT  
						u.id_usuario, 
						u.nome,
						IFNULL(solicitacao.n_pedidos,0) AS n_pedidos
					FROM usuario u
						LEFT JOIN solicitacao_fases sf
							ON u.id_usuario = sf.id_usuario_resp
						LEFT JOIN(
							SELECT 
								COUNT(id_solicitacao) n_pedidos,
								id_usuario_resp
							FROM solicitacao_fases 
							WHERE pos_tramitacao = 'Concluído'
							GROUP BY id_usuario_resp
							UNION
							SELECT 
								COUNT(id_solicitacao) n_pedidos,
								id_usuario_resp
							FROM solicitacao_fases 
							WHERE pos_tramitacao != 'Concluído'
							GROUP BY id_usuario_resp
						)AS solicitacao
							ON solicitacao.id_usuario_resp = u.id_usuario
					WHERE
						u.id_supervisor in  (
							SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario
							UNION 
							-- allow analista lider 
							SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4) 
						) 
					AND u.id_perfil = 7
					GROUP BY u.id_usuario");

			 while($fetch  = mysql_fetch_array($sql))
			 {
				$output[]  = array (
						$fetch[0], //id_usuario,
						$fetch[1], //nome,
						$fetch[2] //n_pedidos,
				);
			 }

			echo json_encode($output);  	
		}
		else if($fase =='gcon')
		{
			$sql=mysql_query(
	            "SELECT  
					u.id_usuario, 
					u.nome,
					IFNULL(solicitacao.n_pedidos,0) AS n_pedidos
				FROM usuario u
					LEFT JOIN solicitacao_fases sf
						ON u.id_usuario = sf.id_usuario_resp
					LEFT JOIN(
						SELECT 
							COUNT(id_solicitacao) n_pedidos,
							id_usuario_resp
						FROM solicitacao_fases 
						WHERE gcom = 'Concluído'
						GROUP BY id_usuario_resp
						UNION
						SELECT 
							COUNT(id_solicitacao) n_pedidos,
							id_usuario_resp
						FROM solicitacao_fases 
						WHERE gcom != 'Concluído'
						GROUP BY id_usuario_resp
					)AS solicitacao
						ON solicitacao.id_usuario_resp = u.id_usuario
				WHERE
					u.id_supervisor in  (
						SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario
						UNION 
						-- allow analista lider and operador pre-tramitacao to do the redistribution 
						SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4) 
					) 
				AND u.id_perfil = 8
				GROUP BY u.id_usuario");

			 while($fetch  = mysql_fetch_array($sql))
			 {
				$output[]  = array (
						$fetch[0], //id_usuario,
						$fetch[1], //nome,
						$fetch[2] //n_pedidos,
				);
			 }

			echo json_encode($output);  	
		}
		else if($fase =='intragov')
		{
			$sql=mysql_query(
	            "SELECT  
					u.id_usuario, 
					u.nome,
					IFNULL(solicitacao.n_pedidos,0) AS n_pedidos
				FROM usuario u
					LEFT JOIN solicitacao_fases sf
						ON u.id_usuario = sf.id_usuario_resp
					LEFT JOIN(
						SELECT 
							COUNT(id_solicitacao) n_pedidos,
							id_usuario_resp
						FROM solicitacao_fases 
						WHERE intragov = 'Concluído'
						GROUP BY id_usuario_resp
						UNION
						SELECT 
							COUNT(id_solicitacao) n_pedidos,
							id_usuario_resp
						FROM solicitacao_fases 
						WHERE intragov != 'Concluído'
						GROUP BY id_usuario_resp
					)AS solicitacao
						ON solicitacao.id_usuario_resp = u.id_usuario
				WHERE
					u.id_supervisor in  (
						SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuario
						UNION 
						-- allow analista lider and operador pre-tramitacao to do the redistribution 
						SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuario AND id_perfil in(4) 
					) 
				AND u.id_perfil = 9
				GROUP BY u.id_usuario");

			 while($fetch  = mysql_fetch_array($sql))
			 {
				$output[]  = array (
						$fetch[0], //id_usuario,
						$fetch[1], //nome,
						$fetch[2] //n_pedidos,
				);
			 }

			echo json_encode($output);  	
		}
	}

	function getSolicitacoesPendentesFaseOperador($id_usuario, $fase){
		if($fase == 'pre'){
			$fetchSolicitacoesPendentesFaseOperador=mysql_query(
				     		"SELECT DISTINCT
									sf.id_solicitacao,
									IFNULL(sf.id_gestao_servicos,'') AS id_gestao_servicos,
									IFNULL(date_format(CAST(us.reg_data AS DATE),'%d/%m/%Y') ,'') AS data_receb_solicitacao,
									IFNULL(date_format(solicitacao_info.importacao_data,'%d/%m/%Y'),'') AS reg_dt_entrada,
									'' AS data_abert_gestao,
									'' AS acessos,
									IFNULL(DATEDIFF(
										CAST(solicitacao_info.importacao_data  AS DATE),
										STR_TO_DATE(
											REPLACE(us.reg_data,'/',',') 
										,'%d,%m,%Y')
									), '') AS qtde_dias_tratativa_total,
									sf.revisao,
									IFNULL(solicitacao_info.status,'Entrada Manual Pre') AS status
								FROM 
									solicitacao_fases sf 
									INNER JOIN usuario_solicitacao us
										ON sf.revisao = us.revisao
										AND sf.id_solicitacao =  us.id_solicitacao
									LEFT JOIN(
										SELECT id_sv AS id, pacote AS id_solicitacao, status, revisao, importacao_data FROM siscom_vendas 
										UNION
										SELECT id_ss AS id,nro_solicitacao AS id_solicitacao, status, revisao, importacao_data FROM siscom_servico 
									)as solicitacao_info
										ON sf.revisao = solicitacao_info.revisao
										AND sf.id_solicitacao =  solicitacao_info.id_solicitacao
								WHERE 
									sf.pre_tramitacao = 'Com operador' AND sf.id_usuario_resp = $id_usuario 
								ORDER BY 
									sf.revisao, us.reg_data");
		}else if($fase == 'tra'){
			$fetchSolicitacoesPendentesFaseOperador=mysql_query("SELECT DISTINCT
																		sf.id_solicitacao,
																		sf.id_gestao_servicos,
																		pt.data_receb_solicitacao,
																		date_format(pt.reg_dt_entrada,'%d/%m/%Y') AS reg_dt_entrada,
																		pt.data_abert_gestao,
																		pt.qtd_acessos,
																		DATEDIFF(
																			CAST(pt.reg_dt_entrada  AS DATE),
																			STR_TO_DATE(
																				REPLACE(pt.data_receb_solicitacao,'/',',') 
																			,'%d,%m,%Y')
																		) AS qtde_dias_tratativa_total,
																		sf.revisao,
																		'tramitacao' AS status 
																	FROM solicitacao_fases sf 
																		INNER JOIN pre_tramitacao pt 
																			ON sf.id_solicitacao = pt.id_solicitacao
																			AND sf.revisao = pt.revisao
																		INNER JOIN usuario_solicitacao us
																			ON sf.id_solicitacao = us.id_solicitacao
																			AND sf.revisao = us.revisao
																	WHERE 
																		sf.id_usuario_resp = $id_usuario AND
																		sf.tramitacao = 'Com operador' AND
																		sf.pre_tramitacao = 'Concluído'
																	ORDER BY us.priorizacao");
		}else if($fase == 'pos'){
			$fetchSolicitacoesPendentesFaseOperador=mysql_query("CALL proc_solicitacoes_pendentes_pos($id_usuario)");
		}else if($fase == 'intragov'){
			$fetchSolicitacoesPendentesFaseOperador=mysql_query("SELECT 
																	sf.id_solicitacao,
																	IFNULL(sf.id_gestao_servicos,'') AS id_gestao_servicos,
																	IFNULL(date_format(CAST(us.reg_data AS DATE),'%d/%m/%Y') ,'') AS data_receb_solicitacao,
																	'' AS reg_dt_entrada,
																	'' AS data_abert_gestao,
																	'' AS acessos,
																        '' AS qtde_dias_tratativa_total,
																	sf.revisao,
																	'intragov' AS status
																FROM 
																	solicitacao_fases sf
																		INNER JOIN usuario_solicitacao us
																			ON sf.id_solicitacao = us.id_solicitacao
																			AND sf.revisao = us.revisao
																WHERE 
																	sf.id_usuario_resp = $id_usuario AND
																	sf.intragov = 'Com operador'");
		}else if($fase == 'gcon'){
			$fetchSolicitacoesPendentesFaseOperador=mysql_query("SELECT 
																	sf.id_solicitacao,
																	IFNULL(sf.id_gestao_servicos,'') AS id_gestao_servicos,
																	IFNULL(date_format(CAST(us.reg_data AS DATE),'%d/%m/%Y') ,'') AS data_receb_solicitacao,
																	'' AS reg_dt_entrada,
																	'' AS data_abert_gestao,
																	'' AS acessos,
																        '' AS qtde_dias_tratativa_total,
																	sf.revisao,
																	'gcon' AS status
																FROM 
																	solicitacao_fases sf
																		INNER JOIN usuario_solicitacao us
																			ON sf.id_solicitacao = us.id_solicitacao
																			AND sf.revisao = us.revisao
																WHERE 
																	sf.id_usuario_resp = $id_usuario AND
																	sf.gcom = 'Com operador'");
							}
		 while($row  = mysql_fetch_array($fetchSolicitacoesPendentesFaseOperador))
		 {
			$output[]  = array (
					$row[0], //id_solicitacao,
					$row[1], //id_gestao_servicos,
					$row[2], //data_receb_solicitacao,
					$row[3], //reg_dt_entrada,
					$row[4], //data_abert_gestao,
					$row[5], //qtd_acessos,
					$row[6], //qtde_dias_tratativa_total,
					$row[7], //revisao,
					$row[8] //status,
			);
		 }

			echo json_encode($output);  	
	}

	function getconsultaFilaChamados($idUsuarioCriptografado){

		$sql = mysql_query("SELECT
								reg_data,
								nome,
								cpf,
								protocolo_solicitacao,
								nro_gs,
								canal_entrada,
								status,
								obs,
								qtd_acesso,
								revisao,
								situacao,
								chamado
							FROM v_consulta_chamados
							WHERE id_supervisor  in  (
								SELECT id_supervisor FROM supervisor WHERE id_usuario = $idUsuarioCriptografado
								UNION 
								-- allow analista lider  
								SELECT id_supervisor FROM usuario WHERE id_usuario = $idUsuarioCriptografado AND id_perfil in(4) 
							)");

		while($fetch  = mysql_fetch_array($sql))
		{
			$output[]  = array (
					$fetch[0], //reg_data,
					$fetch[1], //nome,
					$fetch[2], //cpf,
					$fetch[3], //protocolo_solicitacao,
					$fetch[4], //nro_gs,
					$fetch[5], //canal_entrada,
					$fetch[6], //status
					$fetch[7], //obs
					$fetch[8], //qtd_acesso
					$fetch[9], //revisao
					$fetch[10],//situacao
					$fetch[11] //chamado
			);
		}

		echo json_encode($output);
	}

	function getRazaoSocialByCnpj($cnpj){
		$sql = mysql_query("SELECT razao_social FROM empresa WHERE cnpj LIKE '%$cnpj%'");

		while($fetch  = mysql_fetch_array($sql))
		{
			$output = $fetch['razao_social'];
		}

		echo json_encode($output);
	} 

?>

