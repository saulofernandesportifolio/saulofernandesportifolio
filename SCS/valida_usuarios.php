<?php
include "bd.php";
$sql = "SELECT * FROM tbl_usuarios WHERE login = '$usuario'";
$acao = mysql_query($sql) or die (mysql_error());
while($linha = mysql_fetch_array($acao))
{
    $idusuarios     = $linha["id"];
    $login          = $linha["login"];
    $senha          = $linha["senha"];
    $nome           = $linha["nome"];
    $perfil         = $linha["perfil"];
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
	header("location:index.php?log_error=$log_error&sen_error=$sen_error");
	break;}
else{
	switch($perfil){
		case 1:
		  header("location:coordenador/menu_1.php?ide=$idusuarios");
		  break;
		case 3:
		  header("location:usuario/menu_1.php?ide=$idusuarios");
		  break;
		default:
		  echo "<script type=\"text/javascript\">
        	alert('Por favor, informe seu login e senha para acessar o sistema');
        	history.back();
			</script>";
    		exit;
	}
		  
		  
}
?>