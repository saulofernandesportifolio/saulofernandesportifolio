<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
include "../bd.php";
$sql_chamados = mysql_fetch_array(mysql_query("SELECT * FROM tbl_chamados WHERE n_chamado = '".$n_chamado."';")) or die(mysql_error());

if($sql_chamados["status"] == 'TRAMITANDO'){

				// Altera o STATUS do pedido no Banco
					mysql_query("UPDATE `scs`.`tbl_chamados` SET `status` = 'CONCLUIDO'
					WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");

				// Salva data de conclusao
					mysql_query("UPDATE `scs`.`tbl_chamados` SET `dt_conclusao` = '".date("Y-m-d")."'
					WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");

				// Exibe mensagem de alteração bem sucedida ao usuario
					echo "<script>
	     			alert('O status do chamado numero $n_chamado foi alterado para CONCLUIDO!'); 
          			document.location.replace('menu_1.php?ide={$ide}&n_chamado={$n_chamado}&m=3');</script>";
     				exit;
}

if($sql_chamados["status"] == 'DEVOLVIDO'){

				// Altera o STATUS do pedido no Banco
					mysql_query("UPDATE `scs`.`tbl_chamados` SET `status` = 'CONCLUIDO'
					WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");

				// Salva data de conclusao
					mysql_query("UPDATE `scs`.`tbl_chamados` SET `dt_finalizacao` = '".date("Y-m-d")."'
					WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");

				// Exibe mensagem de alteração bem sucedida ao usuario
					echo "<script>
	     			alert('O status do chamado numero $n_chamado foi alterado para CONCLUIDO!'); 
          			document.location.replace('menu_1.php?ide={$ide}&n_chamado={$n_chamado}&m=3');</script>";
     				exit;
}
?>