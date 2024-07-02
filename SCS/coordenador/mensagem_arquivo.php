<?php
include "../funcoes.php";
$destino = "\\\\servempreza02\www\SCS\arquivo";

	//Recebe informações sobre o arquivo anexado
		if(!$_FILES){echo "Erro ao carregar o arquivo!";	}
	else{	$file_name	   = $n_chamado.strtolower(htmlentities(RemoveAcentos($_FILES['arquivo']['name'])));
			$file_type 	   = $_FILES['arquivo']['type'];
			$file_size     = $_FILES['arquivo']['size'];
			$file_tmp_name = $_FILES['arquivo']['tmp_name'];
			$error         = $_FILES['arquivo']['error'];
		}
	switch ($error){
		case 0:
			break;
		case 1:
			echo 'O tamanho do arquivo Ã© maior que o definido nas configuraÃ§Ãµes do PHP!';
			break;
		case 2:
			echo 'O tamanho do arquivo Ã© maior do que o permitido!';
			break;
		case 3:
			echo 'O upload nÃ£o foi concluÃ­do!';
			break;
		case 4:
			echo 'Nenhum arquivo selecionado para upload...';
			break;
	}
	if($error == 0){
		if(!is_uploaded_file($file_tmp_name)){
			echo 'Erro ao processar arquivo!';
		}else{
			if(!move_uploaded_file($file_tmp_name,$destino."\\".htmlentities($file_name))){
				echo 'NÃ£o foi possÃ­vel salvar o arquivo!';
			}
		}
	}
	if(!empty($file_name)){

		// Salva caminho do arquivo no Banco de Dados
		mysql_query("UPDATE `scs`.`tbl_chamados` SET `arquivo_op` = '".htmlentities($file_name)."'
		WHERE `tbl_chamados`.`n_chamado` ='".$n_chamado."';");
	}
	//mensagens de conclusão ou falha
	echo "<script>
         document.location.replace('menu_1.php?ide={$ide}&n_chamado={$n_chamado}&m=1&caminho={$caminho}');
		 </script>";
		 break;
?> 