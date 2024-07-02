<?php   
@session_start();
include '../conexao.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php
	if($_SESSION["operador_gestao"] == 0){  
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
  
  function arrumaString($string) {

 return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}
  
  
?>
 
<div id="principal">
<?php


$id                           =$_POST["id1"];
$email                        =$_POST["email"];
$senha                        =$_POST["senha"];
$gc                           =$_POST["gc"];
$acao                         =$_POST["acao"];
$status                       =$_POST["status"];
$login_gestao                 =$_POST["login_gestao"];
$status_tp                    =$_POST["status_tp"];
$comentario_antigo            = trim($_POST["comentario_antigo"]);
$comentario_novo              = arrumaString($_POST["comentario_novo"]);
$data_cadastro_comentario     = date('d/m/Y');

//echo $motivo;	,
$login = $_SESSION["login"];
$nome  = $_SESSION["nome"];
$turno = $_SESSION["turno"];

$pula = "\n";
$comentario = trim($comentario_antigo.$pula.$data_cadastro_comentario." : ".$comentario_novo." "."-"." ".$nome);
$data_tramite= date("y-m-d");
if ($status_tp	== '2'){
	$disc_status_tp = "Em Tratamento";
	$fila = 2;
	$tramite = "Tratando";
	$data_correcao = "0000/00/00";
	$data_tramite= date("y-m-d");
}

if ($status_tp	== '4'){
	$disc_status_tp = "Erro Sistemico";
	$fila = 4;
	$tramite = "Erro Sistemico";
	$data_correcao = date("Y-m-d");
	$data_tramite= date("y-m-d");
}


if ($status_tp	== '3'){
    $disc_status_tp = "Tratado";
	$fila = 3;
	$tramite = "Tratado";
	$data_correcao = date("Y-m-d");
	$data_tramite= date("y-m-d");
    

	
}
$sql_update = "UPDATE base_gestao SET
					email_do_cliente = '$email',
					login_gestao = '$login_gestao',
					senha = '$senha',
					comentario = '$comentario',
					usuario = '$login',
					status = '$status',
					acao = '$acao',
					fila = '$fila',
					nome2 = '$nome',
					gc = '$gc',
					tramite = '$tramite',
					data_tramite = '$data_tramite',
					turno = '$turno',
					status_tp = '$status_tp',
					disc_status_tp = '$disc_status_tp'
					WHERE  id_gestao ='$id'";
	
$update = mysql_query($sql_update) or die (mysql_error());
	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
         window.location.assign('../../tp/gestao/pedido_gestao_bko.php');
		
		</script>
 		";

?>
    
</div>
</body>
</html>