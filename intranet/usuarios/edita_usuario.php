<?php if(strpos($_SERVER['HTTP_USER_AGENT'], "MSIE")){$nav = "IE";}else{ $nav = "outro";} ?>
<!--Recebe os dados do usuário-->
<?php

$linha = mysql_fetch_assoc(mysql_query("SELECT * FROM tbl_usuarios WHERE id = '".$id_usuario."';"))or die(mysql_error());
		$id_usuario	= $linha["id"];
		$nome		= $linha["nome"];
		$login		= $linha["login"];
		$senha		= $linha["senha"];
		$dt_nasc	= $linha["dt_nasc"];
		$setor		= $linha["setor"];
		$perfil		= $linha["perfil"];
		$email		= $linha["email"];
?>

<form id="edita_usuario" method="post" action="usuarios/envia_usuario.php?action=edicao&id_usuario=<?php echo $id_usuario; ?>">
	  </br>
      <?php if($_COOKIE['login'] == $login){?> 
      <H2>Editar perfil:</H2>
      <input type="hidden" name="self" value="s" />
      <?php }else{?>
      <H2>Editar usuario:</H2>
      <input type="hidden" name="self" value="n" />
      <?php }?>
	<?php if($_COOKIE['perfil'] == 'ADMINISTRADOR'){ ?>
      <p>Perfil:</br>
		<table class="no_format"><tr>
      	<td width="20%">
        <input <?php if($perfil == 'ADMINISTRADOR'){echo 'checked="checked"';}?> id="perfil" name="perfil" type="radio" value="ADMINISTRADOR" /> 		Administrador
        </td>
        <td width="20%">
        <input id="perfil" <?php if($perfil == 'COORDENADOR'){echo 'checked="checked"';}?> name="perfil" type="radio" value="COORDENADOR">    	  		Coordenador
        </td>
        <td>
        <input id="perfil" <?php if($perfil == 'USUARIO'){echo 'checked="checked"';}?> name="perfil" type="radio" value="USUARIO" >
         Usuário
         </td>
        </tr>
        </table>
      </p>
      </br>
	<?php } ?>    
      <p>Nome: <input size="70" value="<?php echo $nome;?>" max="70" maxlength="70" id="nome" name="nome" style="background-color:#F7F4DB;" type="text"></p>
      </br>
      <p>e-mail: 
		<input size="70" max="70" value="<?php echo $email;?>" maxlength="70" id="email" name="email" style="background-color:#F7F4DB;" type="text">
      </p>
      </br>
      <?php if($_COOKIE['perfil'] == 'ADMINISTRADOR'){?>
      <p>Setor</br>
      	<!-- Para os procedimentos --> 
		<table class="no_format"><tr>
      	<td width="19%">
        <input <?php if($setor == 'TRAMITACAO'){echo 'checked="checked"';}?> id="setor" name="setor" type="radio" value="TRAMITACAO"> 	        Tramitação</td>
        <td width="15%">
        <input id="setor" <?php if($setor == 'INPUT'){echo 'checked="checked"';}?> name="setor" type="radio" value="INPUT">
        Input
        </td>
        <td width="15%">
        <input id="setor" name="setor" type="radio" value="QUALIDADE" <?php if($setor == 'QUALIDADE'){echo 'checked="checked"';}?>>
        Qualidade
        </td>
        <td width="15%">
        <input id="setor" name="setor" type="radio" value="BI" <?php if($setor == 'BI'){echo 'checked="checked"';}?> >
        BI
        </td>
        <td width="25%">
        <input id="setor" name="setor" type="radio" value="RH" <?php if($setor == 'RH'){echo 'checked="checked"';}?> >
        Recursos Humanos
        </td>
        </tr>
        </table>
      </p>
      </br>
      <?php }?>
      <p>Data de nascimento: <input style="background-color:#F7F4DB;" 
      value="<?php if(isset($dt_nasc)){
		  if($nav =="IE"){echo substr($dt_nasc,8,2)."/".substr($dt_nasc,5,2)."/".substr($dt_nasc,0,4);}
					else{echo $dt_nasc;}
		  } ?>" 
      type="date" name="dt_nasc" />
      &nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size:12">formato: dd / mm / aaaa</font></p>
      <?php if($_COOKIE['login'] == $login){?> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?func=password&id_usuario=<?php echo $id_usuario;?>">Alterar senha</a>
      <?php }?>
	  <table class="no_format"><tr>
      <td>&nbsp;</td></tr><tr>
      	<td align="left" width="30%"><input type="button" name="voltar" value="Voltar" onclick="history.back(-1)"/></td>
      	<td align="center"><input type="reset" value="Limpar os campos"></td>
        <td align="right"><input type="submit" value="Editar usuário"></td>
      </tr></table>
</form>