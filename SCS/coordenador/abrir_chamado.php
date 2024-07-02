<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//Consulta SQL reduzida
//Autoria: Lauro Pereira
//Grupo Empreza
include "../funcoes.php";
include "../bd.php";

$sql_chamados = mysql_fetch_array(mysql_query("SELECT * FROM tbl_chamados WHERE n_chamado = '".$n_chamado."';")) or die(mysql_error());

$sql_usuario_logado = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = '".$ide."';")) or die(mysql_error());

if($sql_usuario_logado["perfil"] != 3){

	if($sql_chamados["login"] == "AGUARDANDO"){
		mysql_query("UPDATE tbl_chamados SET login = '".$sql_usuario_logado["login"]."' WHERE n_chamado = ".$n_chamado) or die(mysql_error());
	
		$sql_chamados["login"] = $sql_usuario_logado["login"];
	
		$sql_usuario_chamado = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE login = '".$sql_usuario_logado["login"]."';"))
			or die(mysql_error());
	}
	else{
		$sql_usuario_chamado = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE login = '".$sql_chamados["login"]."';")) 
			or die(mysql_error());
	}
}
?>
  <table id="table" class="menu" width="100%">
	<tr bordercolor="#FFFFFF"> 
	  <td colspan="3"><H2>M&oacute;dulo de consulta de chamado</H2></td>
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
			{echo "<a style=\"color:blue;\" target=\"new\" href=\"../arquivo/".$sql_chamados["arquivo_user"]."\">arquivo do usuario<br /></a>";}
			else{echo "N&atilde;o foram anexados arquivos pelo usuario.<br />";}
			//echo $sql_chamados["arquivo_op"];
			if($sql_chamados["arquivo_op"] != "" && $sql_chamados["arquivo_op"] != NULL && $sql_chamados["arquivo_op"] != "N/A" )
			{echo "<a style=\"color:blue;\" target=\"new\" href=\"../arquivo/".$sql_chamados["arquivo_op"]."\">arquivo do operador</a>";}
			else{echo "N&atilde;o foram anexados arquivos pelo operador.";}
		?>
      </td>
    </tr>
    <tr>
    	<td>Solicita&ccedil;&atilde;o:</td>
      <?php if($sql_chamados["solicitacao"] == 'RELATORIO')
	  {?><td colspan="3"><?php echo $sql_chamados["solicitacao"];?> para a ilha de <?php echo $sql_chamados["tipo"];}?>
      
      <?php if($sql_chamados["solicitacao"] == 'SISTEMA')
	  {?><td colspan="3"><?php echo $sql_chamados["tipo"];
	  			 if($sql_chamados["tipo"] != 'CRIACAO'){?> do sistema <?php echo $sql_chamados["sistema"]; }
				 else{?>Ferramenta no sistema <?php echo $sql_chamados["sistema"]; }}?>
      
	  <?php if($sql_chamados["solicitacao"] == 'PROJETO')
	  {?><td colspan="3"><?php echo $sql_chamados["solicitacao"];?> com o t&iacute;tulo <?php echo $sql_chamados["tipo"];}?>
      
	  <?php if($sql_chamados["solicitacao"] == 'SEGURANCA')
	  	{?><td colspan="3">
		  <?php switch($sql_chamados["tipo"]){
		  	case "CRIACAO": echo "Solicita&ccedil;&atilde;o de cria&ccedil;&atilde;o de novo perfil,";break;
			case "RESET":	echo "Solicita&ccedil;&atilde;o de reset de senha,";break;
			case "EXCLUSAO":echo "Solicita&ccedil;&atilde;o de exclus&atilde;o de perfil,";break;
		  }
	  }?>
      conforme descri&ccedil;&atilde;o abaixo:
      </td>
    </tr>
    <tr>
      <td colspan="3">
      	</br>
		<div style="margin-left:10%; width:90%; border: groove;" >
        	<center><font>
				<?php echo $sql_chamados["descricao"] ?>
			</font></center>
        </div>
      </td>
    </tr>
    <tr>
   	<!-- TRATAMENTO PARA PEDIDOS TRAMITANDO OU DEVOLVIDOS -->
    <?php if($sql_chamados["status"]!= "CONCLUIDO"){?>
    <?php if($sql_usuario_logado["perfil"] == 1 && ($sql_usuario_chamado["login"] == $sql_usuario_logado["login"])){?>
      <td colspan="3">
      	<input value="atender" id="atender" name="solicitacao" type="radio" onclick="HabCampos2()"/>Atender Chamado</option>
		<input value="encaminhar" id="encaminhar" name="solicitacao" type="radio" onclick="HabCampos2()"/> Encaminhar &agrave; outro usu&aacute;rio</option>
      </td>
    </tr>
    <tr><td colspan="3"><hr/></td></tr>
    <tr>
	   	<td colspan="3">
    <label id="campo_atender" style="display:none">
        <form enctype="multipart/form-data" action="mensagem_concluido.php?ide=<?php echo $ide ?>&n_chamado=<?php echo $n_chamado?>" method="post">
        <div align="left">
        <font>Status:</font>
        <select id="status" name="status" >
        	<option value="CONCLUIDO" id="concluido" name="CONCLUIDO">Concluido</option>
            <option value="AGUARDANDO" id="aguardando" name="AGUARDANDO">Aguardando</option>
            <option value="PARADO" id="parado" name="PARADO">Parado</option>
            <option value="ANALISE" id="analise" name="ANALISE">Análise</option>
            <option value="DESENVOLVIMENTO" id="desenvolvimento" name="DESENVOLVIMENTO">Desenvolvimento</option>
            <option value="IMPLANTACAO" id="implantacao" name="IMPLANTACAO">Implantação</option>
            <option value="LEVANTAMENTO_DE_REQUISITOS" id="levantamento_de_requisitos" name="LEVANTAMENTO_DE_REQUISITOS">Levantamento de Requisitos</option>
        </select>
     	</div>
        <div align="left">
            </br><font >Anexar arquivo:</br>(Arquivo .jpg de até 6Mb):</font>
	    	<input name="arquivo" type="file"/>
	        </font>
       	</div>
        <div align="center">
        </br></br>
        <font>Responder &agrave; solicita&ccedil;&atilde;o:</font></br>
      	<textarea id="descricao2" name="descricao2" cols="50" rows="5"></textarea></br>
	    <input type="submit" value="Submeter" name="Concluir" />
        </div>
		</form>
	</label>
    <label id="campo_encaminhar" style="display:none">
        <form enctype="multipart/form-data" action="mensagem_troca.php?ide=<?php echo $ide ?>&n_chamado=<?php echo $n_chamado?>" method="post">
            <div align="left">
            <font>Direcionar o chamado &agrave; outro operador:</font></br>
            <select id="login_chamado" name="login_chamado">
        <?php 
		$total_usuarios = mysql_query("SELECT * FROM tbl_usuarios WHERE perfil = 1");
				for($i=0;$i < mysql_num_rows($total_usuarios);$i++){
					$usuario = mysql_fetch_assoc($total_usuarios);
				if($sql_chamados["login"] != $usuario["login"]){	
				   echo "<option value=".$usuario["login"]." id=".
				   $usuario["login"]." name=".$usuario["login"].
				   ">".$usuario["nome"]."</option>";
				}
				}
				?>
            </select>
		    </div>
            <div align="left">
            </br><font >Anexar arquivo:</br>(Arquivo .jpg de até 6Mb):</font>
	    	<input name="arquivo" type="file"/>
	        </font>
        	</div>
			<div align="center">            
            </br></br>
            <textarea id="descricao2" name="descricao2" cols="50" rows="5"></textarea></br>
    		<input type="submit" value="Encaminhar" name="encaminhar" />
            </div>
    </form>
    </label>
        <?php }
      	else{
          if($sql_chamados["login"] != "AGUARDANDO"){
		  ?>
          <td align="center" colspan="3" >
        	<center><font>
            	Este chamado foi imputado &agrave; <?php echo diffDate(date("Y-m-d"), $sql_chamados["dt_solic"], "D") ?> dias e est&aacute; sendo atendido pelo operador <?php echo $sql_chamados["login"];?>.
		    </font></center>
          </td>
		<?php }
		  else{
		?>
			  <td align="center" colspan="3" >
        	<center><font>
            	Este chamado est&aacute; aguardando atendimento.
		    </font></center>
          </td>
		<?php }
		  }
		}?>

<!-- TRATAMENTO PARA PEDIDOS CONCLUIDOS-->
      <?php if($sql_usuario_logado["perfil"] != 2 && $sql_chamados["status"] == "CONCLUIDO"){
			$tmo = diffDate(date("Y-m-d"), $sql_chamados["dt_conclusao"], "D");
			if( $tmo > 2){
			//Trata pedidos que ainda podem ser devolvidos ( data de conclusão < 2 dias )?>
		      <td colspan="3">
		          <center><font>Este chamado foi conclu&iacute;do &agrave; <?php echo $tmo ?> dias, e n&atilde;o pode mais ser devolvido.
		          </font></center>
		          <center><font>Caso seja necessário, abra outro chamado.
		          </font></center>          
       		<?php }
			//Trata pedidos que ainda podem ser devolvidos ( data de conclusão < 2 dias )
			else{?>
				<form action="mensagem_devolvido.php?ide=<?php echo $ide ?>&n_chamado=<?php echo $n_chamado?>" method="post">
		    <td  align="center" colspan="3">
		        <textarea id="descricao2" name="descricao2" cols="50" rows="5"></textarea>
			</td>
		   </tr>
	       <tr>
	       <td align="center" colspan="3">
	        <input type="submit" value="Devolver" name="devolver" />
			</form>
       	<?php }
		}
		?>
        </td>
    </tr>
    <tr><td colspan="3"><hr></td></tr>
    <tr>
      <td>
		<input type="button" value="Voltar" name="voltar" onClick="javascript:history.back(1)">
	  </td>
    </tr>
</table>