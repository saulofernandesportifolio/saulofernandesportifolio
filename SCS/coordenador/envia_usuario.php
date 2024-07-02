<?php
include "../bd.php";
$usuario_logado = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = $ide"));

$login = explode(" ", $nome);
$primeiro_nome = $login[0];
$ultimo_nome = end($login);
$login = strtolower($primeiro_nome).".".strtolower($ultimo_nome);
$id = mysql_num_rows(mysql_query("SELECT * FROM tbl_usuarios"))+1;

$sql_chamado = "INSERT INTO `scs`.`tbl_usuarios` (`id`, `login`, `senha`, `nome`, `area`, `perfil`, `us_alteracao`, `dt_alteracao`, `tp_alteracao` ) 
				VALUES ('".$id."', '".$login."', 'empreza','".$nome."', '".$area."', '".$perfil."', '".$usuario_logado["login"]."','".date("Y-m-d")."','criacao');";
  mysql_query($sql_chamado) or die(mysql_error());
  
 
		echo "<script>
		     alert('Usuario $login foi criado com sucesso!'); 
	          document.location.replace('menu_1.php?ide={$usuario_logado['id']}&m=5');</script>";
	     exit;

		
?>