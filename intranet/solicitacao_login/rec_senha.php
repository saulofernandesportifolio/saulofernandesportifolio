<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<form enctype="multipart/form-data" method="post" action="solicitacao_login/troca_senha.php">
	  </br>
      <H2>Recuperação de senha:</H2>
      <p>Confirme os dados abaixo:</p>
      </br>
      <p>e-mail:<input size="70" max="70" maxlength="70" id="email" name="email" style="background-color:#F7F4DB;" type="text"></p>
      </br>
      <p>Data de nascimento: <input style="background-color:#F7F4DB;" type="date" name="dt_nasc" />
      &nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size:12">formato: dd / mm / aaaa</font></p>
      </br>
      <table class="no_format"><tr>
      	<td align="left" width="30%"><input type="button" name="voltar" value="Voltar" onclick="history.back(-1)"/></td>
      	<td align="center"><input type="reset" value="Limpar os campos"></td>
        <td align="right"><input type="submit" value="Solicitar nova senha"></td>
      </tr></table>
</form>