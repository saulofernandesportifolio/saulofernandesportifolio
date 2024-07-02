<?php   
@session_start();
$login = $_SESSION["login"];
$nome  = $_SESSION["nome"];
$turno = $_SESSION["turno"];
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
	if($_SESSION["erros_bko"] == 0){  
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

$ofensor=$_POST["ofensor"];
$id=$_POST["id1"];
$adabas=$_POST["adabas"];
$motivo=$_POST["motivo"];
$status_tp=$_POST["status_tp"];
$comentario_antigo=trim($_POST["comentario_antigo"]);
$comentario_novo=$_POST["comentario_novo"];
$data_cadastro_comentario = date('d/m/Y');

$operador =  $_POST["operador"];

//echo "$operador";
//echo "<br>";
//echo "$id";

				 


$pula = "\n";
$comentario = trim($comentario_antigo.$pula.$data_cadastro_comentario." : ".$comentario_novo." "."-"." ".$nome);

$data_cadastro = date("Y-m-d");

$sql="SELECT * FROM base_erros WHERE id='$id1'";
        
		         $result = mysql_query($sql,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
				 $pedido = $dado["pedido"];
				 $tipo = $dado["tipo"];
				 $portabilidade = $dado["portabilidade"];
				 $cliente = $dado["cliente"];
				 $status_do_pedido = $dado["status_do_pedido"];
				 $revisao = $dado["revisao"];
				 $regional = $dado["regional"];
				 $criado_em = $dado["criado_em"];
				 $alta = $dado["alta"];
				 $troca = $dado["troca"];
				 $transferencia_titularidade = $dado["transferencia_titularidade"];
				 $data_correcao = $dado["data_correcao"];
				 $id_tabelao = $dado["id_tabelao"];
				 $fila = $dado["fila"];
				 $status = $dado["status"];
				 $nome2 = $dado["nome2"];
				 $tramite = $dado["tramite"];
				 $data_tramite = $dado["data_tramite"];
				 $turno = $dado["turno"];
				// $primeiro_operador = $dado["primeiro_operador"];
				 }
				 


$data_tramite= date("Y-m-d");
if ($status_tp	== 2){
	$disc_status_tp = "Em Tratamento";
	$fila = 2;
	$tramite = "Tratando";
	$data_correcao = "0000/00/00";
}
if ($status_tp	== 3){
	$disc_status_tp = "Tratado";
	$fila = 3;
	$tramite = "Tratado";
	$data_correcao = date("Y-m-d");
}
if ($status_tp	== 4){
	$disc_status_tp = "Concluido Manualmente";
	$fila = 3;
	$tramite = "Tratado";
	$data_correcao = "0000/00/00";
}
if ($status_tp	== 5){
	$disc_status_tp = "Cancelado Manualmente";
	$fila = 3;
	$tramite = "Tratado";
	$data_correcao = date("Y-m-d");
}  
$sql_update = "UPDATE base_erros SET
					id = '$id',
					pedido = '$pedido',
					comentario = '$comentario',
					tipo = '$tipo',
					motivo_erro = '$motivo',
					portabilidade = '$portabilidade',
					cliente = '$cliente',
					status = '$status',
					status_do_pedido = '$status_do_pedido',
					revisao = '$revisao',
					regional = '$regional',
					criado_em = '$criado_em',
					alta = '$alta',
					troca = '$troca',
					transferencia_titularidade = '$transferencia_titularidade',
					data_correcao = '$data_correcao',
					ofensor = '$ofensor',
					adabas = '$adabas',										
					usuario = '$login',
					id_tabelao = '$id_tabelao',
					fila = '$fila',
					nome2 = '$nome2',
					tramite = '$tramite',
					data_tramite = '$data_tramite',
					turno = '$turno',
					status_tp = '$status_tp',
					disc_status_tp = '$disc_status_tp',
					operador = '$operador'									
					WHERE  id ='$id'";
	
$update = mysql_query($sql_update) or die (mysql_error());

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