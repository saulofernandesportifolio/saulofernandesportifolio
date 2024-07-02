<?php   
@session_start();
include '../conexao.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php
	if($_SESSION["controle_atividades"] == 0){  
    echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../logout.php');
		</script>
 		";
	}
	$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");
?>
 
<div id="principal">
<?php
	
	$tipo			=	$_POST["tipo"];
	$regional		=	$_POST["regional"];
	$pedido			=   $_POST["pedido"];
	$solicitado_por =   $_POST["solicitado_por"];
	$acao           =   $_POST["acao"];
	$motivo_do_erro =	$_POST["motivo_do_erro"];
	$comentario     =	$_POST["comentario"];
	
$data_cadastro = date("Y-m-d");	

$login = $_SESSION["login"];
$nome1 = $_SESSION["nome"];
$turno = $_SESSION["turno"];
//echo $turno;

$query="INSERT INTO erros_pendentes(
                   tipo,
				   regional,
				   pedido,
				   solicitado_por,
				   acao,
				   motivo,
				   data_cad,
				   usuario,
				   login,
				   turno,
				   comentario
				    ) 
				   VALUES				   
				   ('$tipo',
				   '$regional',
				   '$pedido',
				   '$solicitado_por',
				   '$acao',
				   '$motivo_do_erro',
				   '$data_cadastro',
				   '$nome1',
				   '$login',
				   '$turno',
				   '$comentario'
				   )";
(!mysql_query($query,$conecta)); 
	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('../../tp/home.php');
		</script>
 		";

?>
    
</div>
</body>
</html>