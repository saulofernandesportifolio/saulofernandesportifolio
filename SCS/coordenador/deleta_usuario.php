<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
include "../bd.php";
$sql_usuario        = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = '".$id."';")) or die(mysql_error());
$sql_usuario_logado = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = '".$ide."';")) or die(mysql_error());

$usuario_del = $sql_usuario["login"];

				// OCULTA o usuário do sistema, porém ele permanece no banco de dados
					mysql_query("UPDATE `scs`.`tbl_usuarios` SET `login` = '-".$sql_usuario["login"]."',
					`senha` = '-',`nome` = '-',`area` = '-',`perfil` = '-' WHERE  `tbl_usuarios`.`id` ='".$id."';");
					
				// Salva a data de alteração
					mysql_query("UPDATE `scs`.`tbl_usuarios` SET `dt_alteracao` = '".date("Y-m-d")."'
					WHERE `tbl_usuarios`.`id` ='".$id."';");

				// Salva usuario que realizou a alteracao
					mysql_query("UPDATE `scs`.`tbl_usuarios` SET `us_alteracao` = '".$sql_usuario_logado["login"]."'
					WHERE `tbl_usuarios`.`id` ='".$id."';");
					
				// Salva tipo de alteracao
					mysql_query("UPDATE `scs`.`tbl_usuarios` SET `tp_alteracao` = 'deletado'
					WHERE `tbl_usuarios`.`id` ='".$id."';");


				// Exibe mensagem de alteração bem sucedida ao usuario
					echo "<script>alert('O usuário $usuario_del foi deletado.'); 
          			document.location.replace('menu_1.php?ide={$ide}&m=6.');</script>";
     				exit;
?>