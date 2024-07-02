<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Controle de Ponto On-Line</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p align="center">&nbsp;</p>
<?php

include "abreconexao.php";

$sql = "SELECT * FROM usuarios WHERE login = '$usuario'";

$acao = mysql_query($sql) or die (mysql_error());

while($linha = mysql_fetch_assoc($acao))
{
	$login 				= $linha["login"];
	$nome				= $linha["nome"];
}


?>
<div align="center"><img src="../imagens/cabecalho_empreza_ponto.jpg" width="808" height="133" /> 
</div>
<form name="form7" method="post" action="alterar_senha2.php">
  <p>&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center"><font size="2" face="Arial, Helvetica, sans-serif">&Eacute; necessaria 
    a altera&ccedil;&atilde;o de senha no primeiro acesso.</font></p>
  <table width="35%" height="193" border="0" align="center">
    <tr> 
      <td height="51" colspan="2"> <div align="center"><font color="#999999" size="3" face="Arial, Helvetica, sans-serif"><strong>Menu 
          de Altera&ccedil;&atilde;o de Senhas</strong></font></div></td>
    </tr>
    <tr> 
      <td width="51%"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">&#8226; Usu&aacute;rio</font></td>
      <td width="49%"> <input name="usuario" type="text" id="usuario3" value="<?php echo "$usuario" ?>" size="15" maxlength="15" readonly="true"> 
      </td>
    </tr>
    <tr> 
      <td><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">&#8226; Senha Atual</font></td>
      <td> <input name="senha" type="password" id="senha" size="15" maxlength="15"> 
      </td>
    </tr>
    <tr> 
      <td><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">&#8226; Nova Senha</font></td>
      <td> <input name="nova" type="password" id="nova" size="15" maxlength="15"> 
      </td>
    </tr>
    <tr> 
      <td height="24"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">&#8226; Confirma&ccedil;&atilde;o</font></td>
      <td> <input name="confirma" type="password" id="confirma" size="15" maxlength="15"> 
      </td>
    </tr>
    <tr> 
      <td height="26"> <div align="right"> 
          <input type="submit" name="Submit" value="Atualizar">
        </div></td>
      <td> <input type="button" name="Submit2" value="Cancelar" onClick="history.back()"> 
    </tr>
  </table>
  <p align="center"><img src="../imagens/fundo_menu.jpg" width="775" height="30"></p>
</form>
<p>&nbsp; </p>
</body>
</html>
