<?php  
$linha = mysql_fetch_assoc(mysql_query("SELECT * FROM calendario WHERE id = '".$id_evento."';")) or die(mysql_error);
	    $id_evento	= $linha["id"];
		$data		= $linha["data"];
		$descricao	= $linha["evento"];
		$us_evento	= $linha["us_evento"];
		$tipo		= $linha["tipo"];
?>
<form id="edita_evento" method="post" action="evento/envia_evento.php?action=edicao&id_evento=<?php echo $id_evento; ?>">
<input type="hidden" name="id_evento" value="<?php echo $id_evento ?>"
      </br>
      <H2>Inserir Evento</H2>

      <p>Tipo de evento:</br>
		<table class="no_format">
        <tr><td></br></td></tr>
        <tr>
        <td width="20%">
        <input <?php if($tipo == 'pessoal'){echo  'checked="checked"';}?> id="tipo" name="tipo" type="radio" value="pessoal"><font>Pessoal</font>
        </td>
        <td width="20%">
        <input <?php if($tipo == 'global'){echo  'checked="checked"';}?> id="tipo" name="tipo" type="radio" value="global"><font>Publico</font>
        </td>
        <td width="20%">
        <input <?php if($tipo == 'aniversario'){echo  'checked="checked"';}?>id="tipo" name="tipo" type="radio" value="aniversario"><font>Aniversário</font>
        </td>
        </tr>
        </table>
      </p>
      </br>
		<table class="no_format">
        <tr>
        	<td><p>Data:</p></td>
      		<td><input type="date" id="dt_evento" name="dt_evento" value="<?php 
				if(isset($data)){echo substr($data,8,2)."/".substr($data,5,2)."/".substr($data,0,4);} ?>" /></td>
        </tr>
        <tr>
        	<td><p>Descrição:</p></td>
      		<td><input type="text" value="<?php echo $descricao?>" id="descricao" name="descricao" /></td>
        </tr>
        <tr><td colspan="3"></br></br></td></tr>
        <tr><td colspan="3"><a href="index.php?func=my_event">Meus eventos</a></td></tr>
        <tr><td colspan="3"></br></br></td></tr>
        <tr><td colspan="3"><hr></td></tr>
		<tr>
      		<td align="left"><input type="button" name="voltar" value="Voltar" onclick="history.back(-1)"/></td>
	      	<td align="center"><input type="reset" value="Limpar os campos"></td>
    	    <td align="right"><input type="submit" value="Alterar evento"></td>
      </tr></table>
</form>