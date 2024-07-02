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
	if($_SESSION["sap_bko"] == 0){  
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
	$id_filtro=			$_POST["id_filtro"];
	$pedido= 			$_POST["pedido"];
	$adabas= 			$_POST["adabas"];
	$ov=				$_POST["ov"];
	//$nova_ov=			$_POST["nova_ov"];
	$qtd_linhas_pedido= $_POST["qtd_linhas_pedido"];
	//$qtd_linhas_ov= 	$_POST["qtd_linhas_ov"];
	$regional= 			$_POST["regional"];
	$ofensor= 			$_POST["ofensor"];
	$solicitado_por= 	$_POST["solicitado_por"];
	$operador= 			$_POST["operador"];
	$material_antigo= 	$_POST["material_antigo"];
	//$material_novo=		$_POST["material_novo"];
	$codigo_do_cliente=	$_POST["codigo_do_cliente"];
	$motivo= 			$_POST["motivo"];
	$tipo_ov= 			$_POST["tipo_ov"];
	$nome= 				$_SESSION["nome"];
	$sap_comentario= 	$_POST["sap_comentario"];
$data_cadastro = date("Y-m-d");	
$data_cadastro_comentario = date('d/m/Y');	

$login = $_SESSION["login"];
$nome1 = $_SESSION["nome"];
$turno = $_SESSION["turno"];

$comentario = $data_cadastro_comentario." : ".trim($sap_comentario)." "."-"." ".$nome1;

if ($id_filtro==1){
	$tipo_de_solicitacao = 'Desbloqueio de OV';
}
if ($id_filtro==2){
	$tipo_de_solicitacao = 'Geração de OV';
}
if ($id_filtro==3){
	$tipo_de_solicitacao = 'Eliminação de OV';
}
if ($id_filtro==4){
	$tipo_de_solicitacao = 'Correção de cliente';
}

	if($pedido =='' and $ov =='' and $codigo_do_cliente ==''){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('É obrigatório informar o Pedido/OV/Cliente!');
			document.location.replace('sap_cadastro.php');
			</script>
 		";
	}
else{
$query="INSERT INTO diario_sap_bko(
                   regional,
				   adabas,
				   pedido,
				   ov,
				   nova_ov,
				   tipo_ov,
				   qtde_linhas_pedido,
				   qtde_linhas_ov,
				   data_do_desbloqueio,
				   motivo,
				   solicitado_por,
				   ofensor,
				   operador,
				   material_antigo,
				   material_novo,
				   tratado_por,
				   status_tp,
				   disc_status_tp,
				   cliente,
				   tipo_de_solicitacao,
				   data_cadastro,
				   comentario,
				   fila,
				   login,
				   nome2,
				   tramite,
				   data_tramite,
				   turno,
				   cadastro_manual
				    ) 
				   VALUES				   
				   ('$regional',
				   '$adabas',
				   '$pedido',
				   '$ov',
				   '',
				   '$tipo_ov',
				   '$qtd_linhas_pedido',
				   '',
				   '',
				   '$motivo',
				   '$solicitado_por',
				   '$ofensor',
				   '$operador',
				   '$material_antigo',
				   '',
				   '$nome',
				   '1',
				   'Aberto',
				   '$codigo_do_cliente',
				   '$tipo_de_solicitacao',
				   '$data_cadastro',
				   '$comentario',
				   2,
				   '$login',
				   '$nome1',
				   'Tratando',
				   '$dt_dia',
				   '$turno',
				   'Sim'				   
				   )";
(!mysql_query($query,$conecta)); 
	//echo $query;
	
	   echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('../../tp/sap/pedido_sap_bko.php');
		</script>
 		";
		
}
?>
    
</div>
</body>
</html>