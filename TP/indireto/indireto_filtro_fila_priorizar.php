<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../TP/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../TP/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../../TP/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">

<?php
//Testa se o perfil está correto.
	if($_SESSION["prioriza_indireto"] == 0){  
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../../tp/logout.php');
			</script>
 		";
	}
include "../../tp/conexao.php";

$tempo = 0;

 set_time_limit($tempo);
 date_default_timezone_set("Brazil/East");
 $data_dia= date("Y/m/d"); 
 
  $data_1 = substr($data_1,6,4)."/".substr($data_1,3,2)."/".substr($data_1,0,2);

if($data_2 <> '')
{
	$data_2 = substr($data_2,6,4)."/".substr($data_2,3,2)."/".substr($data_2,0,2);
}

else
{

	$data_2 = date("Y/m/d");
}

//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario

if (empty($_POST["regional"]))
{
echo "<script>alert('Nenhuma regional selecionada.'); document.location.replace('../../tp/indireto/indireto_fila_prioriza.php'); </script>\n";
exit;
}
//Regional
$nome = $_SESSION["nome"];
$login2 = $_SESSION["login"];
$turno = $_SESSION["turno"];
$tipo = $_POST['regional']; 
$regionais = ''; 
foreach($tipo as $k => $v){ 
$regionais.= ",or, "."regional="."'".$v."'";
}
//DELETE($valores,1,2);
$regionais = "teste".$regionais;
$regiao = explode(",", $regionais);
$regiao2 = array_slice($regiao,2,55);
$novavar2 = implode("", $regiao2);
//usuario e data tramite



//Revisão
$tipo = $_POST['revisao']; 
$revisao = ''; 
foreach($tipo as $k => $v){ 
$revisao.= ",or, "."revisao"." ".$v." ";
}
//DELETE($valores,1,2);
$revisao = "teste".$revisao;
$revi = explode(",", $revisao);
$revi2 = array_slice($revi,2,55);
$novavar3 = implode("", $revi2);

if($pedido <> 0)
{
$sql_consulta="SELECT * from ilha_reversao_indireto_bko WHERE (fila = 1) and ($novavar2) and ($novavar3) and criado_em BETWEEN '$data_1' and '$data_2' and pedido='$pedido' ORDER BY criado_em ASC";
}
else
{
$sql_consulta="SELECT * from ilha_reversao_indireto_bko WHERE (fila = 1) and ($novavar2) and ($novavar3) and criado_em BETWEEN '$data_1' and '$data_2' ORDER BY criado_em ASC";
}

//echo $sql_consulta;
$sql_verifca = "$sql_consulta";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());
$_SESSION["sql_consulta"] = $sql_consulta;


echo "<script type=\"text/javascript\">document.location.replace('../../tp/indireto/filtro_prioriza_indireto.php');
		</script>";
        exit;
		
?>
</body>
</html>