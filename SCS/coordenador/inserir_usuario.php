<?php
include "../bd.php"; 
$usuario_logado = (mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = $ide")));
?>
  <table id="table" class="menu">
	<tr bordercolor="#FFFFFF"> 
	  <td colspan="3">
      <H2>M&oacute;dulo de inser&ccedil;&atilde;o de usu&aacute;rio</H2>
	  </td>
	</tr>
	<tr> 
	  <td align="center" colspan="3"> 
	  <hr/>
		<center><p class="rigth"><strong>INSERIR USU&Aacute;RIO</strong></p></center>
	  </td>
	</tr>
    <tr>
	    <td>&nbsp;</td>
    </tr>
    <tr>
	    <td>&nbsp;</td>
    </tr>
    <form method="post" action="envia_usuario.php?ide=<?php echo $usuario_logado['id'] ?>" >
	<tr>
	  <td width="5%">
		Nome (completo):
	  </td>
	  <td width="60%">
		<input type="text" id="nome" name="nome" maxlength="50" size="80" />
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
		<input type="radio" id="area" name="area" value="INPUT" />Input
        <input type="radio" id="area" name="area" value="QUALIDADE" />Qualidade
        <input type="radio" id="area" name="area" value="TRAMITACAO" />Tramita&ccedil;&atilde;o
        <input type="radio" id="area" name="area" value="BI" />Business Inteligence
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
		<input type="radio" id="perfil" name="perfil" value="1" />Coordenador
        <input type="radio" id="perfil" name="perfil" value="3" />Usu&aacute;rio
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
		<center><button type="reset" id="reset" name="reset" value="Reset">Resetar</button></center>
    </td>
	<td align="right">
        <input type="hidden" id="us_alteracao" name="us_alteracao" value="<?php echo $usuario_logado["login"]; ?>" />
    	<input type="submit" id="submit" name="submit" value="   Criar   " />
	</td>
    </tr>
    </form>
  </table>