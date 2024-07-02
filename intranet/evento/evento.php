<?php if(strpos($_SERVER['HTTP_USER_AGENT'], "MSIE")){$nav = "IE";}else{ $nav = "outro";} ?>
<form id="add_evento" method="post" action="evento/envia_evento.php?action=criacao">
      </br>
      <H2>Inserir Evento</H2>
      <?php 
		$usuario = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE login = '".$_COOKIE["login"]."' ;"));
		if($usuario["perfil"] != 'USUARIO'){
		?>
      <p>Tipo de evento:</br>
		<table class="no_format">
        <tr><td></br></td></tr>
        <tr><td width="20%"><input checked="checked" id="tipo" name="tipo" type="radio" value="pessoal"><font>Pessoal</font></td>
        <td width="20%"><input id="tipo" name="tipo" type="radio" value="global"><font>Publico</font></td>
        <td width="20%"><input id="tipo" name="tipo" type="radio" value="aniversario"><font>Aniversário</font></td></tr>
        </table>
      </p>
		<?php }?>
      </br>
		<table class="no_format">
        <tr>
        	<td><p>Data:</p></td>
      		<td><input type="date" id="dt_evento" name="dt_evento" value="<?php 
				if(isset($data)){
					if($nav =="IE"){echo substr($data,8,2)."/".substr($data,5,2)."/".substr($data,0,4);}
					else{ echo $data;}
				} ?>" />
            </td>
        </tr>
        <tr>
        	<td><p>Descrição:</p></td>
      		<td><input type="text" id="evento" name="descricao" max:"20" maxlength="20" size="20" /></td>
        </tr>
        <tr><td colspan="3"></br></br></td></tr>
        <tr><td colspan="3"><a href="index.php?func=my_event">Meus eventos</a></td></tr>
        <tr><td colspan="3"></br></br></td></tr>
        <tr><td colspan="3"><hr></td></tr>
		<tr>
      		<td align="left"><input type="button" name="voltar" value="Voltar" onclick="history.back(-1)"/></td>
	      	<td align="center"><input type="reset" value="Limpar os campos"></td>
    	    <td align="right"><input type="submit" value="Criar evento"></td>
      </tr></table>
</form>