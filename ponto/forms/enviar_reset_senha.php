<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php

include "abreconexao.php";

$sql = "UPDATE usuarios SET
		senha = 'empreza'
		,acesso = 1
		WHERE id = $id";
		
		$acao = mysql_query($sql) or die (mysql_error());
		
		echo "<hr><font size='2' color='#666666'>Senha resetada com sucesso. Por Favor anote os dados para acesso ao sistema: \n
												Senha = empreza <br>";



?><p><input type="button" name="Submit2" value="Voltar" onClick="window.location='conteudo.php?&usuario=<?php echo "$usuario"?>'">



</p></body>
</html>
