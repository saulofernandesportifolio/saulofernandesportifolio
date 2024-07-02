<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">

<?php
//Testa se o perfil está correto.

	if( $_SESSION["prioriza_erros"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
?>
<?php
include "../conexao.php";


if (empty($_POST["tipo"]))
{
echo "<script>alert('Nenhum erro selecionado.'); document.location.replace('erros_filtro_prioriza.php'); </script>\n";
exit;
}
if (empty($_POST["regional"]))
{
echo "<script>alert('Nenhuma regional selecionada.'); document.location.replace('erros_filtro_prioriza.php'); </script>\n";
exit;
}
if (empty($_POST["carteira"]))
{
echo "<script>alert('Nenhuma carteira selecionada.'); document.location.replace('erros_filtro_prioriza.php'); </script>\n";
exit;
}


$carteira = $_POST["carteira"];
$contador = count($carteira);

if ($contador == 2){
	$filtro_carteira = "(vpe='Nao') or (vpe='sim')";	
	}
if($carteira[0] == "vpe" and $contador != 2){
	$filtro_carteira = "(vpe='sim')";
	}

if($carteira[0] == "vpg" and $contador != 2){
	$filtro_carteira = "(vpe='Nao')";
	}
	
//echo $filtro_carteira;

$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];

$tipo = $_POST['tipo']; 
$valores = ''; 
foreach($tipo as $k => $v){ 
$valores.= ",or, "."tipo="."'".$v."'";
}
//DELETE($valores,1,2);
$valores = "teste".$valores.") and (status_tp = 1";
$lista = explode(",", $valores);
$lista2 = array_slice($lista,2,55);
$novavar = implode("", $lista2);
//$sql_consulta="SELECT * FROM controle_pn_bko WHERE $novavar ORDER BY data_inicial ASC";
//print $sql_consulta; 

$tipo = $_POST['regional']; 
$regionais = ''; 
foreach($tipo as $k => $v){ 
$regionais.= ", or, "."regional="."'".$v."'";
}
//DELETE($valores,1,2);
$regionais = "teste".$regionais;
$regiao = explode(",", $regionais);
$regiao2 = array_slice($regiao,2,55);
$novavar2 = implode("", $regiao2);


$sql_consulta="SELECT * FROM base_erros  WHERE (fila = 1) and ($novavar) and ($novavar2) and ($filtro_carteira)";

$sql_consulta;
$tempo = 0;


  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("y/m/d"); 

//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario

$sql_verifca = "$sql_consulta";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());
$_SESSION["sql_consulta"] = $sql_consulta;


echo "<script type=\"text/javascript\">document.location.replace('../../tp/erros/priorizar_pedido_erros.php');</script>";
exit;

?>
</body>
</html>