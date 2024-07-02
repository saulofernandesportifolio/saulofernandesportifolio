<?PHP
//Consulta SQL reduzida
//Autoria: Lauro Pereira
//Grupo Empreza
include "../funcoes.php";
include "../bd.php";

$sql_usuario= mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = '".$id."';")) or die(mysql_error());

$sql_usuario_logado = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = '".$ide."';")) or die(mysql_error());

?>

  <table id="table" class="menu">
	<tr bordercolor="#FFFFFF"> 
	  <td colspan="3"><H2>M&oacute;dulo de altera&ccedil;&atilde;o de usu&aacute;rio</H2></td>
	</tr>
	<tr> 
	  <td align="center" colspan="3">
      <hr/>
      <center><p class="rigth"><strong><?PHP echo $sql_usuario["login"];?></strong></p></center>
	  </td>
	</tr>
	<tr>
    <form method="post" action="atualiza_usuario.php?ide=<?php echo $sql_usuario_logado['id'] ?>&id=<?php echo $sql_usuario['id'] ?>" >
	  <td width="15%">Nome:</td>
      <td width="50%"><input type="text" id="nome" name="nome" maxlength="50" size="80" value="<?php echo $sql_usuario["nome"];?>" /></td>
	  <td>&nbsp;
      
	  </td>
	</tr>
     <tr>
	    <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="5%">
		&Aacute;rea:
	  </td>
	  <td width="60%">
		<input <?php if($sql_usuario["area"] == "INPUT"){ echo "checked=\"checked\"";}?> type="radio" id="area" name="area" value="INPUT" />Input
        <input <?php if($sql_usuario["area"] == "QUALIDADE"){ echo "checked=\"checked\"";}?> type="radio" id="area" name="area" value="QUALIDADE" />Qualidade
        <input <?php if($sql_usuario["area"] == "TRAMITACAO"){ echo "checked=\"checked\"";}?> type="radio" id="area" name="area" value="TRAMITACAO" />Tramita&ccedil;&atilde;o
        <input <?php if($sql_usuario["area"] == "BI"){ echo "checked=\"checked\"";}?> type="radio" id="area" name="area" value="BI" />Business Inteligence
	  </td>
    </tr>
    <tr>
	    <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="5%">
		Perfil:
	  </td>
	  <td width="60%">
		<input <?php if($sql_usuario["perfil"] == "1"){ echo "checked=\"checked\"";}?>  type="radio" id="perfil" name="perfil" value="1" />Coordenador
        <input <?php if($sql_usuario["perfil"] == "2"){ echo "checked=\"checked\"";}?> type="radio" id="perfil" name="perfil" value="3" />Usu&aacute;rio
	  </td>
	</tr>
    <tr>
	    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>	
		<button id="voltar" name="voltar" value="voltar" onclick="history.back()">Voltar</button>
    </td>
    <td>
    </td>
	<td align="right">
        <input type="hidden" id="us_alteracao" name="us_alteracao" value="<?php echo $usuario_logado["login"]; ?>" />
    	<input type="submit" id="submit" name="submit" value="Salvar alterações" />
	</td>
    </tr>
    </form>
  </table>