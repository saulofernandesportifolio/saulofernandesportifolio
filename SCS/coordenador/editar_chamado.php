<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include "../bd.php"; 

$sql_chamados = mysql_fetch_assoc(mysql_query("SELECT * FROM tbl_chamados WHERE n_chamado = ".$n_chamado));
$sql_usuario_logado = mysql_fetch_assoc(mysql_query("SELECT * FROM tbl_usuarios WHERE id = ".$ide));

?>
  <table id="table" class="menu" width="100%">
	<tr bordercolor="#FFFFFF"> 
	  <td colspan="3"><H2>M&oacute;dulo de edi&ccedil;&atilde;o de chamado</H2></td>
	</tr>
	<tr> 
	  <td align="center" colspan="3">
      <hr/>
      <center><p class="rigth"><strong>CHAMADO N&ordm; <?php echo $n_chamado;?></strong></p></center>
	  </td>
	</tr>
	<tr>
	  <td>Responsável atendimento:</td>
      <td><?php echo $sql_chamados["login"] ?></td>
      <td></td>
	</tr>
    <tr>
	  <td>Responsável input:</td>
      <td><?php echo $sql_chamados["l_input"] ?></td>
      <td></td>
	</tr>
    <tr>
      <!--  VERIFICA SE O PEDIDO JA FOI CONCLUIDO-->
	  <?php if ($sql_chamados["status"] == "CONCLUIDO"){?>
	      <td>Data de conclus&atilde;o:</td>
	      <td><?php echo substr($sql_chamados["dt_conclusao"],8,2)."/".
		  				 substr($sql_chamados["dt_conclusao"],5,2)."/".
						 substr($sql_chamados["dt_conclusao"],0,4);?>
	      </td>
	      <td></td>
	  <?php } 
	  else{?>
	      <td colspan="3"></td>
	  <?php } ?>
	</tr>
    <tr>
      <td>Documentos anexados:</td>
      <td align="left" colspoan="2" style="color:black; font:bold">
	  	<?php 
			if($sql_chamados["arquivo_user"] != "" && $sql_chamados["arquivo_user"] != NULL && $sql_chamados["arquivo_user"] != "N/A" )
			{echo "<a style=\"color:blue;\" target=\"new\" href=\"../arquivo/".$sql_chamados["arquivo_user"]."\">arquivo do usuario</br></a>";}
			else{echo "N&atilde;o foram anexados arquivos pelo usuario.</br>";}
			//echo $sql_chamados["arquivo_op"];
			if($sql_chamados["arquivo_op"] != "" && $sql_chamados["arquivo_op"] != NULL && $sql_chamados["arquivo_op"] != "N/A" )
			{echo "<a style=\"color:blue;\" target=\"new\" href=\"../arquivo/".$sql_chamados["arquivo_op"]."\">arquivo do operador</a>";}
			else{echo "N&atilde;o foram anexados arquivos pelo operador.";}
		?>
      </td>
    </tr>
    <tr>
	  <td colspan="2">
	  </br><strong>Solicitação:</strong></br>
        <input <?php  if($sql_chamados["solicitacao"]=="RELATORIO") echo "checked=\"checked\"" ?> 
        value="RELATORIO" id="relatorio" name="solicitacao" type="radio" onclick="HabCampos()"/>Relat&oacute;rio</option>
		<input <?php  if($sql_chamados["solicitacao"]=="SISTEMA") echo "checked=\"checked\"" ?>
        value="SISTEMA" id="sistema" name="solicitacao" type="radio" onclick="HabCampos()"/> Sistema</option>
		<input <?php  if($sql_chamados["solicitacao"]=="PROJETO") echo "checked=\"checked\"" ?>
        value="PROJETO" id="projeto" name="solicitacao" type="radio" onclick="HabCampos()"/>Projeto</option>
        <input <?php  if($sql_chamados["solicitacao"]=="SEGURANCA") echo "checked=\"checked\"" ?>
        value="SEGURANCA" id="seguranca" name="solicitacao" type="radio" onclick="HabCampos()"/>Seguran&ccedil;a L&oacute;gica</option>
	  </td>
	</tr>
	<tr bordercolor="#FFFFFF"> 
	  <td colspan="3">
      
	    <!-- OPÇÃO RELATÓRIOS-->
		<label id="campo_relatorio" style="display:none">
		<form enctype="multipart/form-data" name="form1" method="post" action="envia_chamado.php?ide=<?php echo $idusuario?>">
			</br><strong>Tipo de relat&oacute;rio:</strong></br>
			<input <?php  if($sql_chamados["tipo"]=="INPUT") echo "checked=\"checked\"" ?>
            value="INPUT" id="select" name="tipo" type="radio" onc />Input
			<input <?php  if($sql_chamados["tipo"]=="TRAMITACAO") echo "checked=\"checked\"" ?>
            value="TRAMITACAO" id="tramitacao" name="tipo" type="radio" />Tramita&ccedil;&atilde;o
			<input <?php  if($sql_chamados["tipo"]=="QUALIDADE") echo "checked=\"checked\"" ?>
            value="QUALIDADE" id="qualidade" name="tipo" type="radio" />Qualidade
                          
            <!-- ÁREA DE SUBMISSÃO DE DADOS -->
				</br>
                <div style="margin-left:10%; width:90%; border: groove;" >
	    	    	<center><font>
						<?php echo $sql_chamados["descricao"] ?>
					</font></center>
		        </div>
				<hr noshade="noshade" />
			<input type="hidden" name="n_chamado" id="n_chamado" value="<?php echo ($n_chamado)?>" />
	        <input type="hidden" name="solicitacao" id="solicitacao" value="RELATORIO" />
			<input type="button" name="Submit2" value="Cancelar" onclick="window.location="menu_1.php?m=0&ide=<?php echo $idusuario?>""/>
			<input type="submit" name="Submit" value="Alterar >>" />
                    <input type="hidden" name="func" id="func" value="edicao" />
        <input type="hidden" name="login" id="login" value="<?php echo $sql_usuario_logado["login"]?>" />
			</div>
        </form>
        </label>
        
        <!-- OPÇÃO SISTEMA-->
             
        <label id="campo_sistema" style="display:none">
        	<form enctype="multipart/form-data" name="form1" method="post" action="envia_chamado.php?ide=<?php echo $idusuario?>">
			    </br><strong>Servi&ccedil;o:</strong></br>
							
				<input <?php  if($sql_chamados["tipo"]=="MANUTENCAO") echo "checked=\"checked\"" ?>
                value="MANUTENCAO" id="manutencao" name="tipo" type="radio" />Manuten&ccedil;&atilde;o
				<input <?php  if($sql_chamados["tipo"]=="ALTERACAO") echo "checked=\"checked\"" ?>
                value="ALTERACAO" id="alteracao" name="tipo" type="radio" />Altera&ccedil;&atilde;o
				<input <?php  if($sql_chamados["tipo"]=="CRIACAO") echo "checked=\"checked\"" ?>
                value="CRIACAO" id="criacao" name="tipo" type="radio" />Cria&ccedil;&atilde;o
	            
	            </br></br><strong>Sistema:</strong></br>
            	<input <?php  if($sql_chamados["sistema"]=="CIP") echo "checked=\"checked\"" ?>
                value="CIP" id="cip" name="sistema" type="radio" />CIP
				<input <?php  if($sql_chamados["sistema"]=="EGTQ") echo "checked=\"checked\"" ?>
                value="EGTQ" id="egtq" name="sistema" type="radio" />E-GTQ
                <input <?php  if($sql_chamados["sistema"]=="SCS") echo "checked=\"checked\"" ?>
                value="SCS" id="scs" name="sistema" type="radio" />SCS
                <input <?php  if($sql_chamados["sistema"]=="INTRANET") echo "checked=\"checked\"" ?>
                value="INTRANET" id="intranet" name="sistema" type="radio" />INTRANET
              
	            <!-- ÁREA DE SUBMISSÃO DE DADOS -->
				</br>
                <div style="margin-left:10%; width:90%; border: groove;" >
	    	    	<center><font>
						<?php echo $sql_chamados["descricao"] ?>
					</font></center>
		        </div>
				<hr noshade="noshade" />
				<input type="hidden" name="n_chamado" id="n_chamado" value="<?php echo ($n_chamado)?>" />
		 		<input type="hidden" name="solicitacao" id="solicitacao" value="SISTEMA" />
				<input type="button" name="Submit2" value="Cancelar" onclick="window.location="menu_1.php?m=0&ide=<?php echo $idusuario?>""/>
				<input type="submit" name="Submit" value="Avan&ccedil;ar >>" />
                <input type="hidden" name="func" id="func" value="edicao" />
        		<input type="hidden" name="login" id="login" value="<?php echo $sql_usuario_logado["login"]?>" />
			</div>
			</form>
        </label>
        
        <!-- OPÇÃO PROJETO-->
        <label id="campo_projeto" style="display:none">
	        <form enctype="multipart/form-data" name="form1" method="post" action="envia_chamado.php?ide=<?php echo $idusuario?>">
			    </br><strong>Titulo do projeto:</strong></br>
				<input value="<?php  echo $sql_chamados["tipo"] ?>" id="titulo" name="tipo" type="text" />
	            </br>
                        
    	  		<!-- ÁREA DE SUBMISSÃO DE DADOS -->
				</br>
                <div style="margin-left:10%; width:90%; border: groove;" >
	    	    	<center><font>
						<?php echo $sql_chamados["descricao"] ?>
					</font></center>
		        </div>
				<hr noshade="noshade" />
				<input type="hidden" name="n_chamado" id="n_chamado" value="<?php echo ($n_chamado)?>" />
				<input type="hidden" name="solicitacao" id="solicitacao" value="PROJETO" />
				<input type="button" name="Submit2" value="Cancelar" onclick="window.location="menu_1.php?m=0&ide=<?php echo $idusuario?>""/>
				<input type="submit" name="Submit" value="Avan&ccedil;ar >>" />
                <input type="hidden" name="func" id="func" value="edicao" />
        		<input type="hidden" name="login" id="login" value="<?php echo $sql_usuario_logado["login"]?>" />
			</div> 
        	</form>
        </label>
        
        <!-- OPÇÃO SEGURANÇA LÓGICA-->
        
     	<label id="campo_seguranca" style="display:none">
			<form enctype="multipart/form-data" name="form1" method="post" action="envia_chamado.php?ide=<?php echo $idusuario?>">
		    	</br><strong>Tipo de opera&ccedil;&atilde;o:</strong></br>
				<input <?php  if($sql_chamados["tipo"]=="CRIACAO") echo "checked=\"checked\"" ?>
                value="CRIACAO" id="criacao" name="tipo" type="radio" onc />Cria&ccedil;&atilde;o
				<input <?php  if($sql_chamados["tipo"]=="RESET") echo "checked=\"checked\"" ?>
                value="RESET" id="reset" name="tipo" type="radio" />Reset de senha
				<input <?php  if($sql_chamados["tipo"]=="EXCLUSAO") echo "checked=\"checked\"" ?>
                value="EXCLUSAO" id="exclusao" name="tipo" type="radio" />Exclus&atilde;o de registro
                          
    	        <!-- ÁREA DE SUBMISSÃO DE DADOS -->
				</br>
                <div style="margin-left:10%; width:90%; border: groove;" >
	    	    	<center><font>
						<?php echo $sql_chamados["descricao"] ?>
					</font></center>
		        </div>
				<hr noshade="noshade" />
				<input type="hidden" name="n_chamado" id="n_chamado" value="<?php echo ($n_chamado)?>" />
		        <input type="hidden" name="solicitacao" id="solicitacao" value="SEGURANCA" />
				<input type="button" name="Submit2" value="Cancelar" onclick="window.location="menu_1.php?m=0&ide=<?php echo $idusuario?>""/>
				<input type="submit" name="Submit" value="Avan&ccedil;ar >>" />
                <input type="hidden" name="func" id="func" value="edicao" />
        		<input type="hidden" name="login" id="login" value="<?php echo $sql_usuario_logado["login"]?>" />
			</div>
	        </form>
        </label>
     </td>
      <td>
      </td>
	</tr>
</table>

