<form id="add_usuario" enctype="multipart/form-data" method="post" action="usuarios/envia_usuario.php?action=criacao">
	  </br>
      <H2>Adicionar usuario:</H2>
	<?php if($_COOKIE['perfil'] == 'ADMINISTRADOR'){ ?>
      <p>Perfil:</br>
		<table class="no_format"><tr>
      	<td width="20%"><input id="perfil" name="perfil" type="radio" value="ADMINISTRADOR">Administrador</td>
        <td width="20%"><input id="perfil" name="perfil" type="radio" value="COORDENADOR">Coordenador</td>
        <td><input id="perfil" name="perfil" type="radio" value="USUARIO" checked="checked" >Usuário</td>
        </tr>
        </table>
      </p>
      </br>
	<?php } ?>    
      <p>Nome: <input size="70" max="70" maxlength="70" id="nome" name="nome" style="background-color:#F7F4DB;" type="text"></p>
      </br>
      <p>e-mail: 
		<input size="70" max="70" maxlength="70" id="email" name="email" style="background-color:#F7F4DB;" type="text">
      </p>
      </br>
      <?php if($_COOKIE['perfil'] == 'ADMINISTRADOR'){ ?>
      <p>Setor</br>
      	<!-- Para os procedimentos --> 
		<table class="no_format"><tr>
      	<td width="20%"><input id="setor" name="setor" type="radio" value="TRAMITACAO" checked="checked">Tramitação</td>
        <td width="20%"><input id="setor" name="setor" type="radio" value="INPUT">Input</td>
        <td width="20%"><input id="setor" name="setor" type="radio" value="QUALIDADE">Qualidade</td>
        <td width="20%"><input id="setor" name="setor" type="radio" value="BI">BI</td>
        <td width="20%"><input id="setor" name="setor" type="radio" value="BI">Recursos Humanos</td>
        </tr>
        </table>
      </p>
      </br>
		<?php } ?>    
      <p>Data de nascimento: <input style="background-color:#F7F4DB;" type="date" name="dt_nasc" />
      &nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size:12">formato: dd / mm / aaaa</font></p>
      </br>
      <table class="no_format"><tr>
      	<td align="left" width="30%"><input type="button" name="voltar" value="Voltar" onclick="history.back(-1)"/></td>
      	<td align="center"><input type="reset" value="Limpar os campos"></td>
        <td align="right"><input type="submit" value="Adicionar usuário"></td>
      </tr></table>
</form>