<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include "../bd.php";
include "../funcoes.php";

$sql_chamados = mysql_fetch_array(mysql_query("SELECT * FROM tbl_chamados WHERE n_chamado = $n_chamado;")) or die(mysql_error());
$sql_usuario_logado = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = $ide"));

$descricao = $sql_chamados["descricao"]." <br /> (".$sql_usuario_logado["login"]."-". date("d/m").")".$descricao2;

$destino = "\\\\servempreza02\www\SCS\arquivo";

$erro = "";

	//Recebe informações sobre o arquivo anexado
		if(!$_FILES){$erro = "Erro ao carregar o arquivo!";	}
	   else{$file_name	   = $n_chamado.strtolower(htmlentities(RemoveAcentos($_FILES['arquivo']['name'])));
			$file_type 	   = $_FILES['arquivo']['type'];
			$file_size     = $_FILES['arquivo']['size'];
			$file_tmp_name = $_FILES['arquivo']['tmp_name'];
			$error         = $_FILES['arquivo']['error'];
		}
	switch ($error){
		case 0:
			break;
		case 1:
			$erro = 'O tamanho do arquivo Ã© maior que o definido nas configuraÃ§Ãµes do PHP!';
			break;
		case 2:
			$erro = 'O tamanho do arquivo Ã© maior do que o permitido!';
			break;
		case 3:
			$erro = 'O upload nÃ£o foi concluÃ­do!';
			break;
		case 4:
			$erro = 'Nenhum arquivo selecionado para upload...';
			break;
	}
	if($error == 0){
		if(!is_uploaded_file($file_tmp_name)){
			echo 'Erro ao processar arquivo!';
		}else{
			if(!move_uploaded_file($file_tmp_name,$destino."\\".$file_name)){
				echo 'NÃ£o foi possÃ­vel salvar o arquivo!';
			}
		}
	}
	
	// Salva descrição nova
	mysql_query("UPDATE `scs`.`tbl_chamados` SET `descricao` = '".$descricao."'
	WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");
	

if($sql_chamados["status"] != 'DEVOLVIDO' and $sql_chamados["status"] != 'CONCLUIDO'){
		// Salva data de conclusao
			mysql_query("UPDATE `scs`.`tbl_chamados` SET `dt_conclusao` = '".date("Y-m-d")."'
			WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");
}

if($sql_chamados["status"] == 'DEVOLVIDO'){

		// Salva data de conclusao
			mysql_query("UPDATE `scs`.`tbl_chamados` SET `dt_finalizacao` = '".date("Y-m-d")."'
			WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");
}
				
// Altera o STATUS do pedido no Banco
	if($status == "AGUARDANDO"){$status = 'TRAMITANDO'; $usuario = 'AGUARDANDO';}else{$usuario = $sql_usuario_logado['login'];}
	mysql_query("UPDATE `scs`.`tbl_chamados` SET `status` = '".$status."', `login` = '".$usuario."'
	WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");

if($sql_chamados["arquivo_op"] == "" || $sql_chamados["arquivo_op"] == NULL || $sql_chamados["arquivo_op"] == "N/A"){
  if($erro==""){
	// Salva caminho do arquivo no Banco de Dados
	mysql_query("UPDATE `scs`.`tbl_chamados` SET `arquivo_op` = '".htmlentities($file_name)."'
	WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");
  }
}

// Exibe mensagem de alteração bem sucedida ao usuario
	echo "<script>
  		alert('$erro \\n O status do chamado numero $n_chamado foi alterado para ".strtolower($status)."!'); 
		document.location.replace('menu_1.php?ide={$ide}&n_chamado={$n_chamado}&m=3');</script>";
    exit;
?>