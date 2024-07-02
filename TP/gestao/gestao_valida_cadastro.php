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

	$regional= 			$_POST["regional"];
	$pedido= 			$_POST["pedido"];
	$revisao= 			$_POST["revisao"];
	$canal= 			$_POST["canal"];
	$codigo_adabas=		$_POST["codigo_adabas"];
	$cliente= 			$_POST["cliente"];
	$status_do_cliente=	$_POST["status_cliente"];
	$termino_efetivo=	$_POST["termino_efetivo"];
	$acao= 			    $_POST["acao"];
	$gestao_comentario=	arrumaString($_POST["comentario"]);
	$status= 			$_POST["status"];
	$email= 			$_POST["email"];
	$gc= 		    	$_POST["gc"];
	$login= 			$_POST["login_gestao"];
	$senha= 			$_POST["senha"];

// Data do tramite do cadastro
$data_tramite = date('Y/m/d');	

// Data do pedido em vivocorp
$partes_da_data = explode(" ",$termino_efetivo);
$data="$partes_da_data[0]";
$datatransf = explode("/",$data);
$data_efetivo = "$datatransf[2]-$datatransf[1]-$datatransf[0]";

$data_cadastro = date("Y-m-d");	
$data_cadastro_comentario = date('d/m/Y');	
$login = $_SESSION["login"];
$nome1 = $_SESSION["nome"];
$turno = $_SESSION["turno"];

$comentario = $data_cadastro_comentario." : ".trim($gestao_comentario)." "."-"." ".$nome1;

$query="INSERT INTO base_gestao(
                   regional,
				   pedido,
				   revisao,
				   canal,
				   codigo_adabas,
				   cliente,
				   status_do_cliente,
				   termino_efetivo,
				   acao,
				   comentario,
				   status,
				   email_do_cliente,
				   gc,
				   login_gestao,
				   senha,
				   status_tp,
				   disc_status_tp,
				   fila,
				   usuario,
				   nome2,
				   tramite,
				   data_tramite,
				   turno
				    ) 
				   VALUES				   
				   ('$regional',
				   '$pedido',
				   '$revisao',
				   '$canal',
				   '$codigo_adabas',
				   '$cliente',
				   '$status_do_cliente',
				   '$data_efetivo',
				   '$acao',
				   '$comentario',
				   '$status',
				   '$email',
				   '$gc',
				   '$login',
				   '$senha',
				   '1',
				   'Aberta',
				   '1',
				   'Aguardando Operador',
				   'Aguardando Operador',
				   'Aguardando',
				   '$data_tramite',
				   '$turno'				   
				   )";
(!mysql_query($query,$conecta)); 

//echo $query;

	    echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		 window.location.assign('../../tp/gestao/gestao_cadastro.php');
		</script>
 		";

?>
    
</div>
</body>
</html>