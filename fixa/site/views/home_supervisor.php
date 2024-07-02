<?php 
require_once '../fixa/site/classes/SolicitacaoPreTramitacao.php';
require_once '../fixa/site/classes/SolicitacaoTramitacao.php';
require_once '../fixa/site/classes/SolicitacaoPosTramitacao.php';
//cria objeto
$SolicitacaoPreTramitacao = new SolicitacaoPreTramitacao();
$SolicitacaoTramitacao = new SolicitacaoTramitacao();

if($projeto != "Voz")
{
	$SolicitacaoPosTramitacao = new SolicitacaoPosTramitacao();
}

$num_rows_pre = $SolicitacaoPreTramitacao->consultaNumeroSolicitacoesPendentesPre($id_usuario);
$num_rows_tram = $SolicitacaoTramitacao->consultaNumeroSolicitacoesPendentesTramitacao($id_usuario);

if($projeto != "Voz")
{
	$num_rows_postram = $SolicitacaoPosTramitacao->consultaNumeroSolicitacoesPendentesPos($id_usuario);
}
?>

<div class="div_itens_pendentes">
	<p class="titulo_itens_pendentes">Itens Pré</p> 
	<p class="numero_solicitacoes_pendentes"><?php echo $num_rows_pre;?></p>
</div>
<div class="div_itens_pendentes">
	<p class="titulo_itens_pendentes">Itens Tramitação</p> 
	<p class="numero_solicitacoes_pendentes"><?php echo $num_rows_tram;?></p>
</div>
<?php if($projeto != "Voz"){?>
<div class="div_itens_pendentes">
	<p class="titulo_itens_pendentes">Itens Pós</p> 
	<p class="numero_solicitacoes_pendentes"><?php echo $num_rows_postram;?></p>
</div>        
<?php }?>
 <br/>
<br/>
<br/>
<?php
$buscaSolicitacoesUsuariosBySupervisor = mysql_query("SELECT u.nome, count(solicitacao_fases.id_solicitacao) as numero_solicitacoes 
														FROM usuario u LEFT JOIN solicitacao_fases 
														ON solicitacao_fases.id_usuario_resp = u.id_usuario
														WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
															  SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario UNION 
															  SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario AND id_perfil in(4)) 
														)AND id_perfil !=4 AND pre_tramitacao = 'Com operador'
														GROUP BY u.id_usuario
														UNION ALL
														SELECT u.nome, count(solicitacao_fases.id_solicitacao) as numero_solicitacoes 
														FROM usuario u LEFT JOIN solicitacao_fases 
														ON solicitacao_fases.id_usuario_resp = u.id_usuario
														WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
															  SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario UNION 
															  SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario AND id_perfil in(4)) 
														)AND id_perfil !=4 AND tramitacao = 'Com operador'
														GROUP BY u.id_usuario
														UNION ALL
														SELECT u.nome, count(solicitacao_fases.id_solicitacao) as numero_solicitacoes 
														FROM usuario u LEFT JOIN solicitacao_fases 
														ON solicitacao_fases.id_usuario_resp = u.id_usuario
														WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
															  SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario UNION 
															  SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario AND id_perfil in(4)) 
														)AND id_perfil !=4 AND pos_tramitacao = 'Com operador'
														GROUP BY u.id_usuario
														UNION ALL
														SELECT u.nome, count(solicitacao_fases.id_solicitacao) as numero_solicitacoes 
														FROM usuario u LEFT JOIN solicitacao_fases 
														ON solicitacao_fases.id_usuario_resp = u.id_usuario
														WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
															  SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario UNION 
															  SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario AND id_perfil in(4)) 
														)AND id_perfil !=4 AND intragov = 'Com operador'
														GROUP BY u.id_usuario
														UNION ALL
														SELECT u.nome, count(solicitacao_fases.id_solicitacao) as numero_solicitacoes 
														FROM usuario u LEFT JOIN solicitacao_fases 
														ON solicitacao_fases.id_usuario_resp = u.id_usuario
														WHERE u.id_usuario  IN (SELECT id_usuario FROM usuario WHERE id_supervisor in  (
															  SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario UNION 
															  SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario AND id_perfil in(4)) 
														)AND id_perfil !=4 AND gcom = 'Com operador'
														GROUP BY u.id_usuario
														ORDER BY nome
														");

   	if(mysql_affected_rows() > 0)
   	{?>
	   <div id="wrapper" class="table_home_supervisor" style="float: none !important;margin-top: 7%;">    
	    <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
			   <thead>
		          <tr>
		            <th><span>Nome</span></th>
		            <th><span>Nº Solicitações</span></th>
	               </tr>
	            </thead> 
		<?php  
		while($rowsSolicitacaoUsuario=mysql_fetch_array($buscaSolicitacoesUsuariosBySupervisor)){?>
			 <tr>
			    <td><?php echo $rowsSolicitacaoUsuario['nome'];?></td>
			    <td><?php echo $rowsSolicitacaoUsuario['numero_solicitacoes'];?></td> 
			 </tr>
		<?php } ?>
		</table>
	<?php } ?>
