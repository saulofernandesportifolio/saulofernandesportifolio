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

$id_sap             = $_POST["id_sap"];
$nova_ov            = $_POST["nova_ov"];
$qtde_linhas_pedido = $_POST["qtde_linhas_pedido"];
$qtde_linhas_ov     = $_POST["qtde_linhas_ov"];
$ofensor            = $_POST["ofensor"];
$operador           = $_POST["operador"];
$material_antigo    = $_POST["material_antigo"];
$material_novo      = $_POST["material_novo"];
$cliente            = $_POST["cliente"];
$tipo_ov            = $_POST["tipo_ov"];
$comentario_antigo  = $_POST["comentario_antigo"];
$comentario_novo    = $_POST["comentario_novo"];
$status_tp          = $_POST["id_filtro"];
$motivo_pendente    = $_POST['motivo2'];
$enviado_para       = $_POST['motivo'];
$acao_ov            = $_POST['motivo3'];

$data_cadastro_comentario = date('d/m/Y');

$login = $_SESSION["login"];
$nome  = $_SESSION["nome"];
$turno = $_SESSION["turno"];

$pula = "\n";
$comentario = $comentario_antigo.$pula.$data_cadastro_comentario." : ".$comentario_novo." "."-"." ".$nome;

$data_cadastro = date("Y-m-d");
$operador=$_SESSION["nome"];
$adabas = $_POST["adabas"];
$sql="SELECT * FROM diario_sap_bko WHERE id_sap='$id_sap'";
        
		         $result = mysql_query($sql,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
				 $pedido                = $dado["pedido"];
				 $ov                    = $dado["ov"];
				 $regional              = $dado["regional"];
				 $solicitado_por        = $dado["solicitado_por"];
				 $tipo_de_solicitacao   = $dado["tipo_de_solicitacao"];
				 $motivo                = $dado["motivo"];
				 $data_cadastro         = $dado["data_cadastro"];
				 $tratado_por           = $dado["tratado_por"];
                 $motivo_pendente_antigo= $dado["motivo_pendente"];
                 $enviado_para_antigo   = $dado["enviado_para"];
                 $acao_ov_antigo        = $dado["acao_ov"];
				 }


    $data_americano = "$data_cadastro";
	$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_cadastro1 = date('Y-d-m');
				//$linha['visao_ilha']=$visao_ilha2;
if ($status_tp	== 2){
	$disc_status_tp = "Em Tratamento";
	$fila = 2;
	$tramite = "Tratando";
}
if ($status_tp	== 3){
	$disc_status_tp = "Tratado";
	$fila = 3;
	$tramite = "Tratado";
}

//TRATAMENTO DOS MOTIVOS
if($motivo_pendente=='0')$motivo_pendente=$motivo_pendente_antigo;
if($enviado_para=='0')$enviado_para=$enviado_para_antigo;
if($acao_ov=='0')$acao_ov=$acao_ov_antigo; 
 
$sql_update = "UPDATE diario_sap_bko SET
					id_sap = '$id_sap',
					regional='$regional',
					adabas='$adabas',
					pedido='$pedido',
					ov='$ov',
					nova_ov='$nova_ov',
					tipo_ov='$tipo_ov',
					qtde_linhas_pedido='$qtde_linhas_pedido',
					qtde_linhas_ov='$qtde_linhas_ov',
					data_do_desbloqueio='$data_cadastro1',
					motivo='$motivo',
					solicitado_por='$solicitado_por',
					ofensor='$ofensor',
					operador='$operador',
					material_antigo='$material_antigo',
					material_novo='$material_novo',
					tratado_por='$tratado_por',
					status_tp='$status_tp',
					disc_status_tp='$disc_status_tp',
					cliente='$cliente',
					tipo_de_solicitacao='$tipo_de_solicitacao',
					data_cadastro='$data_cadastro',
					comentario='$comentario',
					fila ='$fila',
					tramite = '$tramite',
					data_tramite = '$dt_dia',
					turno = '$turno',
                    motivo_pendente = '$motivo_pendente',
                    enviado_para = '$enviado_para',
                    acao_ov = '$acao_ov'						
					WHERE  id_sap ='$id_sap'";
	
$update = mysql_query($sql_update) or die (mysql_error());
//echo $sql_update;
	    echo"
		<script type=\"text/javascript\">
		alert('Registro alterado!');
		document.location.replace('../../tp/sap/pedido_sap_bko.php');
		</script>
 		";
						 
?>
    
</div>
</body>
</html>