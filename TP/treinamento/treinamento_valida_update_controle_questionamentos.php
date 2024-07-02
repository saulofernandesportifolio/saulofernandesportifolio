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
	$antigo_comentario= $_POST["antigo_comentario"];
	$destinatario     = $_POST["destinatario"];
	$status           = $_POST["status"];
	$login            = $_SESSION["login"];
	$nome1            = $_SESSION["nome"];
    $id               = $_POST["id"];
$hora = date ('H:i:s');
$data = date('Y-m-d');
$data_cadastro_comentario = date('d/m/Y');		
$pula = "\n";
$coment = $antigo_comentario.$pula.$data_cadastro_comentario." : ".$comentario." "."-"." ".$nome1;

if ($status == 'Concluido'){
	$data_conclusao = date('Y-m-d');
	}else $data_conclusao ='0000-00-00';

$query="UPDATE controle_de_questionamentos SET
                   comentario= '$coment',
				   destinatario='$destinatario',
				   status= '$status',
				   orientador='$nome1',
				   data_cadastro= '$data',
				   hora_cadastro= '$hora',
				   data_conclusao=  '$data_conclusao'
				   where id = '$id'";
(!mysql_query($query,$conecta)); 

	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		javascript: history.go(-2);
		</script>
 		";
		
?>    
</div>
</body>
</html>