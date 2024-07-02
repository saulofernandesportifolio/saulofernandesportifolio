<?php

require_once '../fixa/site/classes/cripto.php';

$cripto = new cripto();

$sql_operador="SELECT id_perfil FROM v_geral_usuario_info WHERE id_usuario=$id_usuario";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
          $id_perfil          = $linha_operador["id_perfil"];
	    }


?>



<div id="main-container">
    <!-- HEADER -->
    <div id="menu_options">
		<ul class="header-menu horizontal-list">
			<li  class="menu_li" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=views/home.php'">
			<i class="fa fa-home fa-3x" aria-hidden="true"></i><br/>
			Home
			</li>

			<?php if(($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 5 || $id_perfil == 11) && $projeto != 'SC'){?>
			<li  class="menu_li" style="text-align: center;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=views/form_upload_base.php'">
			<i class="fa fa-upload fa-3x" aria-hidden="true"></i><br/>
			Upload de base
			</li>
			<?php } ?>
			<?php if($id_perfil == 1 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10){?>
		    <li  class="menu_li" style="text-align: center;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=views/formusuariospesquisa.php'">
		    <i class="fa fa-users fa-3x" aria-hidden="true"></i><br/>	
		    Usuários
		    </li>
		    <?php } ?>
		    <?php if(($id_perfil != 12 && $id_perfil != 13 && $id_perfil != 14 && $id_perfil != 15 && $id_perfil !=16 && $id_perfil !=17 && $id_perfil !=18)&& $projeto != 'SC'){?>
		    <li class="menu_li" style="text-align: center;">
		    	<i class="fa fa-search fa-3x" aria-hidden="true"></i><br/>
		    	Consulta
		    	<ul>
			      <li style="width:186px;margin-top:36px;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=views/v_consulta_devolucoes.php'">Devoluções</li>
			      <li style="width:186px;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=views/v_consulta_solicitacao.php'">Solicitação</li>
			      <?php if($id_perfil == 1 || $id_perfil == 2){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=views/home_bi.php'">Itens na Fila</li>
			      <?php } ?>
		      	</ul>
	      	</li>
	      	<?php } ?>
	      	<?php if($id_perfil == 1 || $id_perfil == 9){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?&tipo=intragov&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/v_pre_solicitacao_manual.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form Intragov
	        </li>
	         <?php } ?>
	         <?php if($id_perfil == 1 || $id_perfil == 8){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?&tipo=gcom&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/v_pre_solicitacao_manual.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form Gcon
	        </li>
	         <?php } ?>
	         <?php if($id_perfil == 1 || $id_perfil == 5 || $id_perfil == 11){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?&tipo=pre&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/v_pre_solicitacao_manual.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form Pré-Tramitação
	        </li>
	         <?php } ?>
	         <?php if($id_perfil == 1 || $id_perfil == 12 || $id_perfil == 19){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?&tipo=scs&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/SuporteComercialSiscom.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form SC Siscom
	        </li>
	         <?php } ?>
	         <?php if($id_perfil == 1 || $id_perfil == 13 || $id_perfil == 19){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?&tipo=scw&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/SuporteComercialWcd.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form SC WCD
	        </li>
	         <?php } ?>
	         <?php if($id_perfil == 1 || $id_perfil == 14 || $id_perfil == 19){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?&tipo=scp&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/SuporteComercialProcessum.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form SC Processum
	        </li>
	         <?php } ?>
	         <?php if($id_perfil == 1 || $id_perfil == 15 || $id_perfil == 19){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?&tipo=scc&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/SuporteComercialCancelamento.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form SC Cancelamento
	        </li>
	         <?php } ?>
	         <?php if($id_perfil == 1 || $id_perfil == 16 || $id_perfil == 19){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?&tipo=scp&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/SuporteComercialPendencia.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form SC Pendencia
	        </li>
	         <?php } ?>
	           <?php if($id_perfil == 1 || $id_perfil == 17 || $id_perfil == 19){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?&tipo=scm&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/SuporteComercialMovel.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form SC Movel
	        </li>
	         <?php } ?>
	          <?php if($id_perfil == 1 || $id_perfil == 18 || $id_perfil == 19){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?&tipo=scct&id=<?php echo $cripto->codificar($id_usuario)?>&t=views/SuporteComercialCartas.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form SC Cartas
	        </li>
	         <?php } ?>
	         <?php if(($id_perfil == 1 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10)&& $projeto != 'SC'){?>
				<li  class="menu_li" style="text-align: center;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=views/distribuir_solicitacao.php'">
				<i class="fa fa-share fa-3x" aria-hidden="true"></i><br/>
				Distribuir
				</li>
			<?php }?> 
	       	<?php if(($id_perfil == 1 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10)&& $projeto != 'SC'){?>
	      	 <li class="menu_li" style="text-align: center;">
	      	 		<i class="fa fa-share-alt fa-3x" aria-hidden="true"></i><br/>
	      	 	Redistribuir
	      	 	<ul>
			      <li style="width:186px;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=views/redistribuir_solicitacao.php'">Tramitação</li>
			      <li style="width:186px;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=views/redistribuir_gcon_intragov.php'">Gcon/Intragov</li>
		      	</ul>
	      	 </li>
	      	<?php } ?>
	      	<?php if($id_perfil == 2){?>
			<li  class="menu_li" style="text-align: center;" onClick="document.location.href='principal.php?t=views/relatorios.php'">
				<i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i>
			<br/>
			Relatórios BI
			</li>
			<?php }
			?>
			<li class="menu_li" style="text-align: center;">
				<i class="fa fa-files-o fa-3x" aria-hidden="true"></i><br/>
				Relatórios
				<ul style="margin-top: 36px;">
				   <?php if(($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4  || $id_perfil == 10 || $id_perfil == 5 || $id_perfil == 11) && $projeto != 'SC'){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=views/rel_pretramitacao.php'">Relatório Pré-Tramitação</li>
			      <?php } ?>
			      <?php if(($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4  || $id_perfil == 10 || $id_perfil == 6 || $id_perfil == 11) && $projeto != 'SC'){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=views/rel_tramitacao.php'">Relatório Tramitação</li>
			      <?php } ?>
			      <?php if(($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10 || $id_perfil == 7) && $projeto != 'SC'){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=views/rel_postramitacao.php'">Relatório Pós-Tramitação</li>
			      <?php } ?>
			      <?php if(($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10 || $id_perfil == 9) && $projeto != 'SC'){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=views/rel_intragov.php'">Relatório Intragov</li>
			      <?php } ?>
			      <?php if(($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10 || $id_perfil == 8) && $projeto != 'SC'){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=views/rel_gcom.php'">Relatório Gcon</li>
			      <?php } ?>
			       <?php if(($id_perfil == 1 || $id_perfil == 12 || $id_perfil == 19) || ($id_perfil == 3 && $projeto == 'SC')){?>
			       	 <li style="width:198px;" onClick="document.location.href='principal.php?t=views/SuporteComercialSiscomReport.php'">Relatório SC Siscom</li>
			      <?php } ?>
			      <?php if(($id_perfil == 1 || $id_perfil == 13 || $id_perfil == 19)|| ($id_perfil == 3 && $projeto == 'SC')){?>
			       	 <li style="width:198px;" onClick="document.location.href='principal.php?t=views/SuporteComercialWcdReport.php'">Relatório SC WCD</li>
			      <?php } ?>
			      <?php if(($id_perfil == 1 || $id_perfil == 14 || $id_perfil == 19)|| ($id_perfil == 3 && $projeto == 'SC')){?>
			       	 <li style="width:198px;" onClick="document.location.href='principal.php?t=views/SuporteComercialProcessumReport.php'">Relatório SC Processum</li>
			      <?php } ?>
			      <?php if(($id_perfil == 1 || $id_perfil == 15 || $id_perfil == 19)|| ($id_perfil == 3 && $projeto == 'SC')){?>
			       	 <li style="width:198px;" onClick="document.location.href='principal.php?t=views/SuporteComercialCancelamentoReport.php'">Relatório SC Cancelamento</li>
			      <?php } ?>
			       <?php if(($id_perfil == 1 || $id_perfil == 16 || $id_perfil == 19)|| ($id_perfil == 3 && $projeto == 'SC')){?>
			       	 <li style="width:198px;" onClick="document.location.href='principal.php?t=views/SuporteComercialPendenciaReport.php'">Relatório SC Pendência</li>
			      <?php } ?>
			       <?php if(($id_perfil == 1 || $id_perfil == 17 || $id_perfil == 19)|| ($id_perfil == 3 && $projeto =='SC')){?>
			       	 <li style="width:198px;" onClick="document.location.href='principal.php?t=views/SuporteComercialMovelReport.php'">Relatório SC Móvel</li>
			      <?php } ?>
			       <?php if(($id_perfil == 1 || $id_perfil == 18 || $id_perfil == 19)|| ($id_perfil == 3 && $projeto == 'SC')){?>
			       	 <li style="width:198px;" onClick="document.location.href='principal.php?t=views/SuporteComercialCartasReport.php'">Relatório SC Cartas</li>
			      <?php } ?>
			    </ul>
			</li>
			<?php if($id_perfil == 2){?>
			<li style="text-align: center;" class="menu_li">
			<i class="fa fa-file-text-o fa-3x" aria-hidden="true"></i><br/>
				Relatórios(Drive)
				<ul>
				   <?php if($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4  || $id_perfil == 10 || $id_perfil == 5 || $id_perfil == 11){?>
			      <li style="width:186px;margin-top: 36px;" onClick="document.location.href='principal.php?t=views/rel_pretramitacao_drive.php'">Relatório Pré-Tramitação</li>
			      <?php } ?>
			      <?php if($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4  || $id_perfil == 10 || $id_perfil == 6 || $id_perfil == 11){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=views/rel_tramitacao_drive.php'">Relatório Tramitação</li>
			      <?php } ?>
			      <?php if($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10 || $id_perfil == 7){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=views/rel_postramitacao_drive.php'">Relatório Pós-Tramitação</li>
			      <?php } ?>
			      <?php if($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10 || $id_perfil == 9){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=views/rel_intragov_drive.php'">Relatório Intragov</li>
			      <?php } ?>
			      <?php if($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10 || $id_perfil == 8){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=views/rel_gcom_drive.php'">Relatório Gcon</li>
			      <?php } ?>
			    </ul>
			</li>
			<?php }?>
			<?php if(($id_perfil == 2 || $id_perfil == 3) && ($projeto != 'SC')){?>
			<li style="text-align: center;" class="menu_li">
				<i class="fa fa-line-chart fa-3x" aria-hidden="true"></i><br/>
				Relatórios Especiais
				<ul>
			      <li style="width:186px;margin-top: 36px;" onClick="document.location.href='principal.php?t=views/rel_auditoria.php'">Relatório Auditoria</li>
			    </ul>
			</li>
			<?php }?>
			 <?php if(($id_perfil == 1 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10) && ($projeto != 'SC')){?>
			 <li style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=views/v_chamados.php'">
			 <i class="fa fa-bars fa-3x" aria-hidden="true"></i><br/>
			 Chamados
			 </li>
			 <?php }?>
		</ul>
	</div>
	<div id="menu_usuario">
		<ul class="header-menu horizontal-list" >
			<li style="text-align: center;" class="menu_li" id="usuario">
			<i class="fa fa-user fa-3x" aria-hidden="true"></i><br/>
				<?php echo $nome . ' - ' . $perfil . ' - ' . $projeto?>
					<ul style="width:160px;margin-top: 36px;">
				      <li onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=views/formalterasenha.php'">Alterar Senha
				      </li>
					   <li  onClick="document.location.href='logout.php'">Logout</li>
				    </ul>
				</li>
			</ul>
	</div>
</div>



