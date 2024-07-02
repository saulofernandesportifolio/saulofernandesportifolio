<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center">
  <p><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <form name="form1" method="post" action="enviar_registro_hora_atraso.php?&usuario=<?php echo "$usuario"?>">
    <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Registrar a 
      entrada do colaborador</strong></font></p>
    <p>&nbsp;</p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">Selecione o Colaborador: 
      </font><font color="#003366"> 
      <select name="login" id="select">
        <option value="0" selected>Selecione</option>
        <?php
		
	include "abreconexao.php";
	
		$sql_user = "SELECT login, nome FROM usuarios WHERE perfil = 1 ORDER BY nome";
		
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
    <p>&nbsp; </p>
    <p> 
      <input type="submit" name="Submit" value="Registrar" />
      <input type="button" name="Submit2" value="Cancelar" onclick="history.back()" />
    </p>
    <p><img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" />

 </p>
    </form>
  <p><font color="#003366"> </font> </p>
</div>
</body>
</html>
