<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
include "../bd.php";

$sql_usuario_logado = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = '".$ide."';")) or die(mysql_error());

if($senha != $sql_usuario_logado["senha"] || $senha == $senha2 || $senha2 != $senha3 || $senha2 == ""){$teste_erro = true;}
			else{$teste_erro = false;}

if($senha != $sql_usuario_logado["senha"]){$erro = "A senha digitada não corresponde à senha atual.                        ";}

if($senha == $senha2){$erro2					 = "A nova senha não pode ser igual a sua senha anterior.                  ";}

if($senha2 != $senha3){$erro3					 = "A nova senha não corresponde com à confirmação.                        ";}

if($senha2 == ""){$erro2	   					 = "Favor digitar uma nova senha.                                          ";}

if($teste_erro == false){
				// Reseta a senha do usuário selecionado
					mysql_query("UPDATE `scs`.`tbl_usuarios` SET `senha` = '".$senha2."'
					WHERE `tbl_usuarios`.`id` ='".$ide."';");

				// Salva a data de alteração
					mysql_query("UPDATE `scs`.`tbl_usuarios` SET `dt_alteracao` = '".date("Y-m-d")."'
					WHERE `tbl_usuarios`.`id` ='".$ide."';");

				// Salva usuario que realizou a alteracao
					mysql_query("UPDATE `scs`.`tbl_usuarios` SET `us_alteracao` = '".$sql_usuario_logado["login"]."'
					WHERE `tbl_usuarios`.`id` ='".$ide."';");
					
				// Salva tipo de alteracao
					mysql_query("UPDATE `scs`.`tbl_usuarios` SET `tp_alteracao` = 'alt_senha'
					WHERE `tbl_usuarios`.`id` ='".$ide."';");

				// Exibe mensagem de alteração bem sucedida ao usuario
					echo "<script>
	     			alert('Sua senha foi atualizada com sucesso.'); 
          			document.location.replace('menu_1.php?ide={$ide}&&m=0');</script>";
     				exit;
}
else{
	if(!isset($erro)){$erro = "";}else{$erro = $erro."\\n";}
	if(!isset($erro2)){$erro2 = "";}else{$erro2 = $erro2."\\n";}
	if(!isset($erro3)){$erro3 = "";}else{$erro3 = $erro3."\\n";}
					echo "<script>
	     			alert('".$erro.$erro2.$erro3."'); 
          			document.location.replace('menu_1.php?ide={$ide}&&m=8');</script>";
     				exit;
}
?>