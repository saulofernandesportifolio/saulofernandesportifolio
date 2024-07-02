<?php
include "../bd.php"; 
$usuario_logado = (mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = $ide")));

?>
  <table id="table" class="menu">
	<tr bordercolor="#FFFFFF"> 
	  <td colspan="3">
      <H2>M&oacute;dulo de atualiza&ccedil;&atilde;o de informa&ccedil;&otilde;es de usu&aacute;rio</H2>
	  </td>
	</tr>
	<tr> 
	  <td align="center" colspan="3"> 
	  <hr/>
		<center><p class="rigth"><strong>ALTERA&Ccedil;&Atilde;O DE SENHA</strong></p></center>
	  </td>
	</tr>
    <tr>
	    <td>&nbsp;</td>
    </tr>
    <tr>
	    <td>&nbsp;</td>
    </tr>
    <form method="post" action="altera_senha2.php?ide=<?php echo $ide?>" >
	<tr>
	  <td width="5%">
		Senha atual:
	  </td>
	  <td width="60%">
		<input type="password" id="senha" name="senha" maxlength="50" size="20" />
	  </td>
      <td>
      	<a style="color:#FF0000"><?php $erro?></a>
      </td>
    </tr>
    <tr>
	  <td width="5%">
		Nova senha:
	  </td>
	  <td width="60%">
		<input type="password" id="senha2" name="senha2" maxlength="50" size="20" />
      </td>
      <td>
      	<a style="color:#FF0000"><?php $erro2?></a>
      </td>
    </tr>
    <tr>
	  <td width="5%">
		Digite novamente:
	  </td>
	  <td width="60%">
		<input type="password" id="senha3" name="senha3" maxlength="50" size="20" />
	  </td>
      <td>
      	<a style="color:#FF0000"><?php $erro3?></a>
      </td>
    </tr>
    <tr>
	    <td>&nbsp;</td>
    </tr>
    <tr>
    <td colspan="3">	
        <hr />
    </td>
    </tr>
    <tr>
    <td>
		<button id="voltar" name="voltar" value="voltar" onclick="history.back()">Voltar</button>
    </td>
    <td>
		<center><button type="reset" id="reset" name="reset" value="Reset">Resetar</button></center>
    </td>
	<td align="right">
    	<input type="submit" id="submit" name="submit" value="Atualizar senha" />
	</td>
    </tr>
    </form>
  </table>