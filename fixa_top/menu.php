<?php

require_once '../fixa_top/app/Model/cripto.php';

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
			<li  class="menu_li" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=View/home.php'">
			<i class="fa fa-home fa-3x" aria-hidden="true"></i><br/>
			Home
			</li>
			<?php if($id_perfil == 3 || $id_perfil == 4){?>
			<li  class="menu_li" style="text-align: center;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=View/UploadBase.php'">
			<i class="fa fa-upload fa-3x" aria-hidden="true"></i><br/>
			Upload de base
			</li>
			<?php } ?>
			<?php if($id_perfil == 1 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10){?>
		    <li  class="menu_li" style="text-align: center;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=View/Usuarios.php'">
		    <i class="fa fa-users fa-3x" aria-hidden="true"></i><br/>	
		    Usuários
		    </li>
		    <?php } ?>
		     <li class="menu_li" style="text-align: center;">
		    	<i class="fa fa-search fa-3x" aria-hidden="true"></i><br/>
		    	Consulta
		    	<ul>
			      <li style="margin-top: 24%;width:158px;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=View/SolicitacaoHistorico.php'">Solicitação
			      </li>
		      	</ul>
	      	</li>
	         <?php if($id_perfil == 1 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10){?>
				<li  class="menu_li" style="text-align: center;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=View/SolicitacaoDistribuir.php'">
				<i class="fa fa-share fa-3x" aria-hidden="true"></i><br/>
				Distribuir
				</li>
			<?php }?>
			 <?php if($id_perfil == 1 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10){?>
				<li  class="menu_li" style="text-align: center;" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=View/SolicitacaoRedistribuir.php'">
				<i class="fa fa-share-alt fa-3x" aria-hidden="true"></i><br/>
				Redistribuir
				</li>
			<?php }?>
		    <?php if($id_perfil == 6 || $id_perfil == 10){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=View/SolicitacaoTramitacaoManual.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form Tramitação
	        </li>
	         <?php } ?>
	          <?php if($id_perfil == 13){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=View/ApoioManual.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form Apoio
	        </li>
	         <?php } ?>
	         <?php if($id_perfil == 1){?>
	        <li  style="text-align: center;" class="menu_li" onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=View/Aprovacao.php'">
	        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><br/>
	        Form Aprovação
	        </li>
	        <?php } ?>
	        <?php if($id_perfil == 2 || $id_perfil == 3){?>
			<li  class="menu_li" style="text-align: center;" onClick="document.location.href='principal.php?t=View/Relatorios.php'">
				<i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i>
			<br/>
			Relatório BI
			</li>
			<?php }?>
			<li class="menu_li" style="text-align: center;">
				<i class="fa fa-files-o fa-3x" aria-hidden="true"></i><br/>
				Relatórios
				<ul>
				   <?php if($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 6 || $id_perfil == 10){?>
			      <li style="margin-top: 24%;width:186px;" onClick="document.location.href='principal.php?t=View/TramitacaoRelatorio.php'">Relatório Tramitação</li>
			      <?php } ?>
			      <?php if($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4  || $id_perfil == 12 || $id_perfil == 10){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=View/AprovacaoRelatorio.php'">Relatório Aprovação</li>
			      <?php } ?>
			       <?php if($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3 || $id_perfil == 4 || $id_perfil == 10 || $id_perfil == 13 ){?>
			      <li style="width:186px;" onClick="document.location.href='principal.php?t=View/ApoioRelatorio.php'">Relatório Apoio</li>
			      <?php } ?>
			    </ul>
			</li>
		</ul>
	</div>
	<div id="menu_usuario">
		<ul class="header-menu horizontal-list" >
			<li style="text-align: center;" class="menu_li" id="usuario">
			<i class="fa fa-user fa-3x" aria-hidden="true"></i><br/>
				<p style="font-size: x-small;">
				<?php echo $nome . ' - ' . $perfil . ' - ' . $projeto?>
				</p>
					<ul style="margin-top: 9%;width: 40%;">
				      <li onClick="document.location.href='principal.php?id=<?php echo $cripto->codificar($id_usuario)?>&t=View/formalterasenha.php'">Alterar Senha
				      </li>
					   <li  onClick="document.location.href='logout.php'">Logout</li>
				    </ul>
				</li>
			</ul>
	</div>
</div>



