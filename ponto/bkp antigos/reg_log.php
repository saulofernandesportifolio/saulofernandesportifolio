<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php

$ip = getenv("REMOTE_ADDR"); // obtém o IP do usuário
$ip = $_SERVER["REMOTE_ADDR"]; //Pego o IP
$host = gethostbyaddr("$ip"); //pego o host

date_default_timezone_set("Brazil/East");
$data_evento = date("Y/m/d H:i:s");


$sql_log = "INSERT INTO log_eventos (usuario, data_evento, ip_maquina, ip_user, host_maquina) VALUES ('$usuario', '$data_evento', '$ip', '$ip', '$host')";

$acao_log = mysql_query($sql_log) or die (mysql_error());
	
		
				


?>



</body>
</html>
