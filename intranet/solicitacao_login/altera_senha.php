<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<form enctype="multipart/form-data" method="post" action="solicitacao_login/altera_senha2.php">
	  </br>
      <H2>Alteração de senha:</H2>
      </br>
      <p>Senha Atual:&nbsp;&nbsp;&nbsp;
      <input size="30" max="30" maxlength="30" name="senha_ant" style="background-color:#F7F4DB;" type="password"></p>
      </br>
      <p>Nova Senha:&nbsp;&nbsp;&nbsp;
      <input size="30" max="30" maxlength="30" name="senha_nova" style="background-color:#F7F4DB;" type="password"></p>
      </br>
      <p>nova senha:&nbsp;&nbsp;&nbsp;&nbsp;
      <input size="30" max="30" maxlength="30" name="senha_nova2" style="background-color:#F7F4DB;" type="password"></br>
      (Confirmação)</p>
      </br>
      <table class="no_format"><tr>
      	<td align="left" width="30%"><input type="button" name="voltar" value="Voltar" onclick="history.back(-1)"/></td>
      	<td align="center"><input type="reset" value="Limpar os campos"></td>
        <td align="right"><input type="submit" value="Alterar senha"></td>
      </tr></table>
</form>