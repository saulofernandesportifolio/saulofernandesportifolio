<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$erro = "";
if(!isset($func))$func="";
include "../bd.php";
include "../funcoes.php";

if (!isset($login))
	{
		echo "<script type=\"text/javascript\">
		alert('Por favor, informe seu login e senha para acessar o sistema');
		history.back();
		</script>";
		exit;
 	}
if (!isset($sistema)){
		$sistema = "N/A";		
	}
if($func != "edicao"){
	if($solicitacao == 'RELATORIO')
	{	
	if (!isset($tipo))
		{
			echo "<script type=\"text/javascript\">
			alert('Por favor, selecione o tipo de relatório');
			history.back();
			</script>";
			exit;
		}
		
	if (empty($descricao))
		{
			echo "<script type=\"text/javascript\">
			alert('Por favor, preencha a descrição');
			history.back();
			</script>";
			exit;
		}
	}
	
	if($solicitacao == 'SISTEMA')
	{
	if (!isset($tipo))
		{
			echo "<script type=\"text/javascript\">
			alert('Por favor, selecione uma opção de serviço');
			history.back();
			</script>";
			exit;
		}
	
	if (!isset($sistema))
		{
			echo "<script type=\"text/javascript\">
			alert('Por favor, selecione uma opção de sistema');
			history.back();
			</script>";
			exit;
		}
		if (empty($descricao))
		{
			echo "<script type=\"text/javascript\">
			alert('Por favor, preencha a descrição');
			history.back();
			</script>";
			exit;
		}
		
	}
	
	if($solicitacao == 'PROJETO')
	{
	if (empty($tipo))
		{
			echo "<script type=\"text/javascript\">
			alert('Por favor, colcoque o título do projeto');
			history.back();
			</script>";
			exit;
		}
		if (empty($descricao))
		{
			echo "<script type=\"text/javascript\">
			alert('Por favor, preencha a descrição');
			history.back();
			</script>";
			exit;
		}
		
	}
	
	if($solicitacao == 'SEGURANCA')
	{
	if (!isset($tipo))
		{
			echo "<script type=\"text/javascript\">
			alert('Por favor, selecione o tipo de operação');
			history.back();
			</script>";
			exit;
		}
	
	if (!isset($sistema)){
		$sistema = "N/A";		
		}
		
		if (empty($descricao))
		{
			echo "<script type=\"text/javascript\">
			alert('Por favor, preencha a descrição');
			history.back();
			</script>";
			exit;
		}
		
	}

	
	$sql_usuario_logado = mysql_fetch_array(mysql_query("SELECT * FROM tbl_usuarios WHERE id = $ide"));
	
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
				$erro = "";
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
				$erro = 'Erro ao processar arquivo!';
			}else{
				if(!move_uploaded_file($file_tmp_name,$destino."\\".$file_name)){
					$erro = 'NÃ£o foi possÃ­vel salvar o arquivo!';
				}
			}
		}
		if($erro != "" || $file_name == $n_chamado){$file_name = "N/A";}
}
if($func == "edicao"){
	$sql_chamado = "UPDATE tbl_chamados SET solicitacao='".$solicitacao."', tipo='".$tipo."', sistema='".$sistema."' WHERE n_chamado='".$n_chamado."'";
}
else{
//Cria chamado
	$sql_chamado = "INSERT INTO `scs`.`tbl_chamados` (`n_chamado`, 
                                                      `solicitacao`, 
                                                      `tipo`, 
                                                      `sistema`, 
                                                      `descricao`, 
                                                      `l_input`, 
                                                      `login`, 
                                                      `arquivo_user`, 
                                                      `arquivo_op`, 
                                                      `dt_solic`, 
                                                      `dt_conclusao`, 
                                                      `dt_devolucao`, 
                                                      `dt_finalizacao`, 
                                                      `status`, 
                                                      `prioridade`) 
                                                      VALUES ('".$n_chamado."', 
                                                              '".$solicitacao."', 
                                                              '".$tipo."',
                                                              '".$sistema."', 
                                                              '"."[".$login."] ".$descricao."', 
                                                              '".$sql_usuario_logado['login']."', 
                                                              'AGUARDANDO',
                                                              '".htmlentities($file_name)."',
                                                              'N/A', 
                                                              '".date("Y-m-d")."',
                                                              NULL,
                                                              NULL,
                                                              NULL, 
                                                              'TRAMITANDO', 
                                                              '2')";
}
mysql_query($sql_chamado) or die(mysql_error());
if($func == "edicao"){
	echo "<script>
		    alert('$erro \\nChamado Numero $n_chamado foi alterado com sucesso!'); 
			document.location.replace('menu_1.php?ide={$ide}&n_chamado={$n_chamado}&m=2');</script>";
	     exit;		
}else{
		echo "<script>
			alert('$erro \\nChamado Numero $n_chamado foi criado com sucesso!'); 
			document.location.replace('menu_1.php?ide={$ide}&n_chamado={$n_chamado}&m=2');</script>";
	     exit;		
}
?>