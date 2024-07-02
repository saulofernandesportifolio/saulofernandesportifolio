<script type="text/javascript" src="js/Supervisor.js"></script>

<?php 
require_once '../fixa_top/app/Model/Tramitacao.php';
require_once '../fixa_top/app/Model/Aprovacao.php';

//cria objeto
$solicitacaoTramitacao = new Tramitacao('', '', '', '', '', '', '', '', '', '', '', '', '', '', '','','', '','');
$solicitacaoAprovacao= new Aprovacao('', '', '', '', '', '', '', '', '', '');

$num_rows_tram 	  = $solicitacaoTramitacao->buscaItensPendentesTram();
$num_rows_postram = $solicitacaoAprovacao->buscaItensPendentesPos();

?>

<div class="div_itens_pendentes">
	<p class="titulo_itens_pendentes">Itens Tramitação</p> 
	<p class="numero_solicitacoes_pendentes"><?php echo $num_rows_tram;?></p>
</div>
<div class="div_itens_pendentes">
	<p class="titulo_itens_pendentes">Itens Aprovação</p> 
	<p class="numero_solicitacoes_pendentes"><?php echo $num_rows_postram;?></p>
</div>        
 <br/>
<br/>
<br/>
<?php
$buscaSolicitacoesUsuariosBySupervisor = mysql_query("SELECT 
    u.id_usuario, 
    u.nome, 
    count(solicitacao_fases.id_solicitacao) as numero_solicitacoes,
    'Tramitação' AS fase
FROM usuario u 
    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
WHERE u.id_status = 2 AND id_perfil !=4 AND tramitacao = 'Com operador'
GROUP BY u.id_usuario
UNION
SELECT 
    u.id_usuario, 
    u.nome, 
    0 AS numero_solicitacoes,
	'Tramitação' AS fase
FROM usuario u 
WHERE ID_USUARIO not in(
SELECT 
    u.id_usuario
FROM usuario u 
    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
WHERE id_perfil !=4 AND tramitacao = 'Com operador' AND u.id_status = 2
GROUP BY u.id_usuario
)AND id_perfil in(6) AND u.id_status = 2
GROUP BY u.id_usuario
UNION
SELECT 
    u.id_usuario, 
    u.nome, 
    count(solicitacao_fases.id_solicitacao) as numero_solicitacoes,
   'Aprovação' AS fase
FROM usuario u 
    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
WHERE u.id_status = 2 AND id_perfil !=4 AND aprovacao = 'Com operador'
GROUP BY u.id_usuario
UNION
SELECT 
    u.id_usuario, 
    u.nome, 
    0 AS numero_solicitacoes,
    'Aprovação' AS fase
FROM usuario u 
    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
WHERE u.id_status = 2 AND id_perfil IN(12) AND u.id_usuario NOT IN (
			SELECT id_usuario_resp 
			FROM solicitacao_fases  
			WHERE aprovacao = 'Com operador')
GROUP BY u.id_usuario
ORDER BY nome");
?>

	   <div id="wrapper" class="table_home_supervisor" style="float: none !important;margin-top: 7%;width: 47%;">    
	    <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
			   <thead>
		          <tr>
		            <th><span>Nome</span></th>
		            <th><span>Nº Solicitações</span></th>
		            <th><span>Fase</span></th>
		            <th><span></span></th>
	               </tr>
	            </thead> 
		<?php  if(mysql_affected_rows() > 0)
		{
			while($rowsSolicitacaoUsuario=mysql_fetch_array($buscaSolicitacoesUsuariosBySupervisor)){?>
				 <tr>
				    <td><?php echo $rowsSolicitacaoUsuario['nome'];?></td>
				    <td id="solicitacao_operador_usuario_visao_supervisor"><?php echo $rowsSolicitacaoUsuario['numero_solicitacoes'];?></td> 
				    <td><?php echo $rowsSolicitacaoUsuario['fase'];?></td>
				    <td>
				    	<i id="<?php echo 'icone_' . $rowsSolicitacaoUsuario['id_usuario']?>" class="detalhes_itens_pendentes_operador_area_supervisor fa fa-plus" style="display: inline;" aria-hidden="true">
				    	<div style="visibility: hidden;"><?php echo $rowsSolicitacaoUsuario['id_usuario'] .'$'.$rowsSolicitacaoUsuario['fase']?></div>
				    	</i>
			    	</td>	 
				 </tr>
				  <tr id="<?php echo 'itens_pendentes_operador_area_supervisor_' . $rowsSolicitacaoUsuario['id_usuario']?>"</tr>
			<?php } ?>
		</table>
		<?php } ?>
