<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php

date_default_timezone_set("Brazil/East");

include "abreconexao.php";

$sql = "SELECT * FROM banco_horas WHERE id = $id";

$acao = mysql_query($sql) or die (mysql_error());

while($linha = mysql_fetch_assoc($acao))
	{
			$re					= $linha["usuario"];
			$nome				= $linha["nome"];
			$banco				= $linha["banco"];
			$observacao			= $linha["observacao"];
			$user				= $linha["usuario_modificacao"];
			$data_mod			= $linha["data_modificacao"];
	}
		
?>
<p align="center"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="enviar_alterar_banco.php?&usuario=<?php echo "$usuario"?>&login=<?php echo "$re"?>">
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Nome</strong>: 
    </font><font color="#FFFFFF"><?php echo "<font size='2' face='Arial' color='#333'>$nome"?></font></p>
  <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>RE</strong></font><font size="2" face="Arial, Helvetica, sans-serif">:</font><font color="#FFFFFF"><?php echo "<font size='2' face='Arial' color='#333'>$re"?></font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">Banco 
    Horas: </font></strong> 
    <input name="banco" type="text" value="<?php echo "$banco"?>">
    </font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">Obs</font></strong>: 
    <textarea name="observacao"><?php echo "$observacao"?></textarea>
    </font></p>
  <p>&nbsp;</p>
  <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Banco 
    modificado manualmente por </font><font color="#000000"><?php echo "<font size='2' face='Arial' color='#333'>$user - $data_mod"?></font></p>
  <p align="center"> 
    <input type="submit" name="Submit" value="Alterar" />
    <input type="button" name="Submit2" value="Voltar" onclick="history.back()" />
  </p>
</form>
</body>
</html>
