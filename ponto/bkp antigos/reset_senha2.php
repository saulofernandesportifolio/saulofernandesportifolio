<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php

include "abreconexao.php";

$sql = "SELECT * FROM usuarios WHERE login =  '".$_REQUEST['login']."'";

$acao = mysql_query($sql) or die (mysql_error());

while($linha = mysql_fetch_assoc($acao))
	{
			$id 				= $linha["id"];
			$nome				= $linha["nome"];
			$login				= $linha["login"];
			$perfil				= $linha["perfil"];
			
	}
	
	
	if ($perfil == 1)
	{
			$perfil = "Colaborador";
	}
	
	if ($perfil == 2)
	{
			$perfil = "Supervisor";
	}
	
	if ($perfil == 3)
	{
			$perfil = "Administrador";
	}
	
	


?>
<p align="right"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /></p>
<p>&nbsp;</p>
<table width="899" border="1" cellpadding="0" cellspacing="0">
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td width="407"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Nome</strong>: 
        </font><font color="#FFFFFF"><?php echo "<font size='2' face='Arial' color='#333'>$nome"?></font><font size="2" face="Arial, Helvetica, sans-serif"> 
        </font></div></td>
    <td width="476"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Matricula</strong>: 
        </font><font color="#FFFFFF"><?php echo "<font size='2' face='Arial' color='#333'>$login"?></font><font size="2" face="Arial, Helvetica, sans-serif"> 
        </font></div></td>
    <td width="476"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Login 
        Sistema</strong>: </font><font color="#FFFFFF"><?php echo "<font size='2' face='Arial' color='#333'>$login"?></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Perfil</strong>: 
        </font><font color="#FFFFFF"><?php echo "<font size='2' face='Arial' color='#333'>$perfil"?></font><font size="2" face="Arial, Helvetica, sans-serif"> 
        </font></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Resetar senha 
  do usu&aacute;rio</font> <font color="#FFFFFF"><?php echo "<font size='2' face='Arial' color='#333'>$login"?></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">?</font></p>
<p align="center"> 
  <input type="button" name="Submit2" value="Sim" onClick="window.location='enviar_reset_senha.php?&usuario=<?php echo "$usuario"?>&id=<?php echo "$id"?>'">
  <font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
  <input type="button" name="Submit22" value="N&atilde;o" onclick="history.back()" />
  </font></p>
<p align="center">&nbsp;</p>
<p align="center"><img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" /></p>
</body>
</html>
