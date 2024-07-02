<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>::.P.I.Q. - Portal Ilha Qualidade.::</title>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
</head>

<body>

<?php

include "../abreconexao.php";

$sql = "ALTER IGNORE TABLE banco_horas ADD UNIQUE INDEX(usuario)";
$acao = mysql_query($sql) or die (mysql_error());

echo "<br><font color='#999999' face='arial' size='2'> Registros duplicados removidos com sucesso.</font>";

?>
<p><input type="button" name="Submit2" value="Voltar" onClick="window.location='menu.php?&usuario=<?php echo "$usuario"?>&senha=<?php echo "$senha"?>'">

</body>
</html>
