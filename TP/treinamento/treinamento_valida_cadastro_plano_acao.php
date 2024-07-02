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
	
	$ilha_bko         =	$_POST["ilha_bko"];
	$parecer          =	$_POST["parecer"];
	$comentario       = $_POST["comentario"];
	$operador         = $_POST["operador"];
	$reincidente      = $_POST["reincidente"];
	$atividade        =	$_POST["atividade"];
	$login            = $_SESSION["login"];
	$nome1            = $_SESSION["nome"];

$hora = date ('H:i:s');
$data = date('Y-m-d');

$query="INSERT INTO plano_de_acao(
                   ilha_bko,
				   parecer,
				   comentario,
				   operador,
				   reincidente,
				   atividade,
				   orientador,
				   data_cadastro,
				   hora_cadastro
				    ) 
				   VALUES  (
				   '$ilha_bko',
				   '$parecer',
				   '$comentario',
				   '$operador',
				   '$reincidente',
				   '$atividade',
				   '$nome1',
				   '$data',
				   '$hora'			   
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