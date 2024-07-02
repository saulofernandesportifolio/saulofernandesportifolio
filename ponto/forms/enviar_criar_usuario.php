<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php

echo $usuario=$_COOKIE["id"];

if ($carga_horaria == 8)
{
	$carga_hora_sab = 4;
}

if ($carga_horaria == 6)
{
	$carga_hora_sab = 6;
}


include "abreconexao.php";

$sql_usuario = "INSERT INTO usuarios (login, nome, senha, perfil, acesso, hora_entrada, hora_saida, hora_limite_ponto, hora_ent_sab, hora_sai_sab, hora_limite_sab, ctps, data_admissao, funcao, departamento, carga_horaria, carga_horaria_sab) VALUES ('$re', '$nome', 'empreza', $perfil_2, 1, '$hora_entrada', '$hora_saida', '$hora_limite_ponto', '$hora_ent_sab', '$hora_sai_sab', '$hora_limite_sab', '$ctps', '$data_admissao', '$funcao', '$departamento', '$carga_horaria', '$carga_hora_sab')";

$acao_usuario = mysql_query($sql_usuario) or die (mysql_error());



if ($perfil_2 == '1')
{

$sql_banco = "INSERT INTO banco_horas (usuario, nome, banco) VALUES ('$re', '$nome', '00:00:00')";

$acao_banco = mysql_query($sql_banco) or die (mysql_error());

}


echo "<hr><font size='2' color='#666666'>Usuario criado com sucesso. Por Favor anote os dados para acesso ao sistema: \n
										Login = $re \n
										Senha = empreza <br>";



?>

<input type="button" name="Submit2" value="Voltar" onClick="window.location='conteudo.php?&usuario=<?php echo "$usuario"?>'">

</body>
</html>
