<?php setcookie("login",$_POST['usuario'],time() + 43200);?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include "bd.php";
$sql = "SELECT * FROM tbl_usuarios WHERE login = '$usuario'";
$acao = mysql_query($sql) or die (mysql_error());
while($linha = mysql_fetch_array($acao))
{
    $idusuarios		= $linha["id"];
    $login			= $linha["login"];
    $senha			= $linha["senha"];
    $nome			= $linha["nome"];
    $perfil			= $linha["perfil"];
	$setor			= $linha["setor"];
}
//Inicializa Variaveis de erro
$log_error = "";
$sen_error = "";
$error = false;
//Valida Login
if(!isset($login)){
	$log_error="Digite um login válido";
	$error = true;
}
else{
	//Valida Senha
	if(!isset($senha) || $senha != $_POST['senha']){
		$sen_error="Senha incorreta";
		$error = true;}
}
if($error == true){
	setcookie("login","");
	header("location:index.php?error=$error&log_error=$log_error&sen_error=$sen_error");
	break;}
else{
	setcookie("nome",$nome,time() + 43200);
	setcookie("perfil",$perfil,time() + 43200);
	setcookie("setor",$setor,time() + 43200);
	header("location:index.php");
}
?>