<?php   
@session_start();
include '../conexao.php';
include '../funcoes.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>

<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php
	if($_SESSION["treinamento"] == 0){  
    echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../logout.php');
		</script>
 		";
	}
?>
 
<div id="principal">
<?php
date_default_timezone_set('America/Sao_Paulo');
	
	$comentario       = $_POST["comentario"];
	$destinatario     = $_POST["destinatario"];
	$status           = $_POST["status"];
	$login            = $_SESSION["login"];
	$nome1            = $_SESSION["nome"];

$hora = date ('H:i:s');
$data = date('Y-m-d');


if ($status == 'Concluido'){
	$data_conclusao = date('Y-m-d');
	}else $data_conclusao ='0000-00-00';

$query="INSERT INTO controle_de_questionamentos(
                   comentario,
				   destinatario,
				   status,
				   orientador,
				   data_cadastro,
				   hora_cadastro,
				   data_conclusao
				    ) 
				   VALUES  (
				   '$comentario',
				   '$destinatario',
				   '$status',
				   '$nome1',
				   '$data',
				   '$hora',
				   '$data_conclusao'			   
				   )";
(!mysql_query($query,$conecta)); 

	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		javascript: history.go(-1);
		</script>
 		";
		
?>    
</div>
</body>
</html>