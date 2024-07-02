<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
include "../bd.php";

	if (empty($descricao2))
	{
		echo "<script type=\"text/javascript\">
		alert('Por favor, preencha a descrição');
		history.back();
		</script>";
		exit;
 	}

$sql_chamados = mysql_fetch_array(mysql_query("SELECT * FROM tbl_chamados WHERE n_chamado = '".$n_chamado."';")) or die(mysql_error());
$sql_usuario_logado = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = $ide"));

$descricao = "Descrição: ".$sql_chamados["descricao"]." <br /> (".$sql_usuario_logado["login"]."-". date("d/m").")".$descricao2;

if($sql_chamados["status"] == 'CONCLUIDO'){

				// Altera status, prioridade, data de devolução e descrição do pedido no Banco
					mysql_query("UPDATE `scs`.`tbl_chamados` SET `status` = 'DEVOLVIDO', `prioridade` = '1', 
					`dt_devolucao` = '".date("Y-m-d")."', `descricao` = '".$descricao."' WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");
}
				// Exibe mensagem de alteração bem sucedida ao usuario
					echo "<script>
	     			alert('O chamado numero $n_chamado foi DEVOLVIDO para a operação!'); 
          			document.location.replace('menu_1.php?ide={$ide}&n_chamado={$n_chamado}&m=3');</script>";
     				exit;

?>