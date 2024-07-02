<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php

include "abreconexao.php";


$sql_user = "SELECT * FROM usuarios WHERE login = '".$_REQUEST['re']."'";

$acao_user = mysql_query($sql_user) or die (mysql_error());

while($linha_user = mysql_fetch_assoc($acao_user))
{
	$perfil_3			= $linha_user["perfil"];
	$departamento2		= $linha_user["departamento"];
	$carga_horaria2		= $linha_user["carga_horaria"];
}

if ($perfil_2 == '0')
{
	$perfil_2 = $perfil_3;
}

if ($carga_horaria == '0')
{
	$carga_horaria = $carga_horaria2;
}

if ($departamento == '0')
{
	$departamento = $departamento2;
}


if ($carga_horaria == 8)
{
	$carga_hora_sab = 4;
}

if ($carga_horaria == 6)
{
	$carga_hora_sab = 6;
}

$sql_update = "UPDATE usuarios SET
				login = '$re'
				,nome = '$nome'
				,perfil = '$perfil_2'
				,hora_entrada = '$hora_entrada'
				,hora_saida = '$hora_saida'
				,hora_limite_ponto = '$hora_limite_ponto'
				,hora_ent_sab = '$hora_ent_sab'
				,hora_sai_sab = '$hora_sai_sab'
				,hora_limite_sab = '$hora_limite_sab'
				,ctps = '$ctps'
				,data_admissao = '$data_admissao'
				,funcao = '$funcao'
				,departamento = '$departamento'
				,carga_horaria = '$carga_horaria'
				,carga_horaria_sab = '$carga_hora_sab'
				WHERE id = $id";
				
				$acao_update = mysql_query($sql_update) or die (mysql_error());
				
										echo "<script>alert('Usuario alterado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
										exit;


?>


</body>
</html>
