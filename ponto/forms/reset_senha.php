<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p align="center"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="reset_senha2.php?&usuario=<?php echo "$usuario"?>">
  <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Registrar 
    a entrada do colaborador</strong></font></p>
  <p align="center">&nbsp;</p>
  <p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Selecione 
    o Colaborador: </font><font color="#003366"> 
    <select name="login" id="select">
      <option value="0" selected>Selecione</option>
      <?php
		
	include "abreconexao.php";
	
		$sql_user = "SELECT login, nome FROM usuarios ORDER BY nome";
		
		$acao_user = mysql_query($sql_user) or die (mysql_error());
		
		while($linha = mysql_fetch_assoc($acao_user))
		{
		
		$login = $linha["login"];
		$nome = $linha["nome"];
		
			echo "<option value='$login'";
			echo ">$nome</option>";
}
?>
    </select>
    </font></p>
  <p align="center">&nbsp; </p>
  <p align="center"> 
    <input type="submit" name="Submit" value="Alterar" />
    <input type="button" name="Submit2" value="Cancelar" onclick="history.back()" />
  </p>
  <p align="center"><img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" /></p>
</form>
</body>
</html>
