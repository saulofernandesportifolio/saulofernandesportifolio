<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
date_default_timezone_set("Brazil/East");
include "../bd.php";
include "../data.php";

//Recebe Variaveis do POST
	$senha_ant		= $_POST['senha_ant'];
	$senha_nova		= $_POST['senha_nova'];
	$senha_nova2	= $_POST['senha_nova2'];

//Verificação de erros
	$error=false;
	$erro="";

	//Valida campos vasios
	if($senha_ant == "" || $senha_nova == "" || $senha_nova2 == ""){
		$erro=$erro."Favor preencher todos os campos!\\n";
		$error=true;
	}
	//Valida senha antiga
	$sql_senha = "SELECT senha FROM tbl_usuarios WHERE login = '".$_COOKIE['login']."';";
	$senha = mysql_fetch_assoc(mysql_query($sql_senha));
	if( $senha['senha']!= $senha_ant){
		$erro=$erro."$sql_senha\\n";
		$error=true;
	}
	//Valida confirmação de senha
	if( $senha_nova != $senha_nova2){
		$erro=$erro."Confirmação de senha não corresponde à nova senha!\\n";
		$error=true;
	}

	//CRIA SQL DE CRIAÇÃO OU EDIÇÃO		
	$sql_usuario = "UPDATE `intranet`.`tbl_usuarios` SET `senha` = '".$senha_nova."' WHERE login = '".$_COOKIE['login']."' AND senha = '".$senha_ant."';";
	
	if($error==false){
		//EXECUTA COMANDO SQL
			mysql_query($sql_usuario) or die(mysql_error());
			echo "<script>
			 alert('{$_COOKIE['login']}, sua senha foi alterada com sucesso.')
			 document.location.replace('../index.php?func=\"\"');</script>";
			exit;
	}
	else{
		echo "<script>
		 alert('$erro'); 
		 document.location.replace('../index.php?func=password');
		 </script>";
		exit;
	}
?>