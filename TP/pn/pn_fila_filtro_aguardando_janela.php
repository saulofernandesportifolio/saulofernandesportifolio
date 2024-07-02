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

	if($_SESSION["pn_bko"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
?>
<?php

include "../../tp/conexao.php";

$tempo = 0;


  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("y/m/d"); 
 
 $data_1 = substr($data_1,6,4)."/".substr($data_1,3,2)."/".substr($data_1,0,2);

if($data_2 <> '')
{
	$data_2 = substr($data_2,6,4)."/".substr($data_2,3,2)."/".substr($data_2,0,2);
}

else
{

	$data_2 = date("Y/m/d");
}	

//echo $data_1;

//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario
if (empty($_POST["tipos"]))
{
echo "<script>alert('Nenhuma erro selecionado.'); document.location.replace('../../tp/pn/pn_filtro_aguardando_janela.php'); </script>\n";
exit;
}
if (empty($_POST["regional"]))
{
echo "<script>alert('Nenhuma regional selecionada.'); document.location.replace('../../tp/pn/pn_filtro_aguardando_janela.php'); </script>\n";
exit;
}
if (empty($_POST["canal"]))
{
echo "<script>alert('Nenhuma regional selecionada.'); document.location.replace('../../tp/pn/pn_filtro_aguardando_janela.php'); </script>\n";
exit;
}

$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];

$tipo = $_POST['tipos'];
$valores = ''; 

foreach($tipo as $k => $v){ 

//echo $v;
if($v == 'Aguardando Janela')
{

$valores.= ",or, "."status_spn="."'".$v."'"." "."and tratamento ='Corrigido'";

}
else
{
$valores.= ",or, "."status_pedido="."'".$v."'"." "."and tratamento='Em tratamento'";
}

}

	
//DELETE($valores,1,2);
$valores = "teste".$valores;
$lista = explode(",", $valores);
$lista2 = array_slice($lista,2,55);
$novavar = implode("", $lista2);
//$sql_consulta="SELECT * FROM controle_pn_bko WHERE $novavar ORDER BY data_inicial ASC";
//print $sql_consulta; 


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$canal = $_POST['canal'];
$valores = ''; 
foreach($canal as $k => $v){ 
$valores.= ",or, "."canal="."'".$v."'";
}
//DELETE($valores,1,2);
$valores = "teste".$valores;
$lista = explode(",", $valores);
$lista2 = array_slice($lista,2,55);
$novavar3 = implode("", $lista2);
//$sql_consulta="SELECT * FROM controle_pn_bko WHERE $novavar ORDER BY data_inicial ASC";
//print $sql_consulta; 


//////////////////////////////////////////////////////////////////////////////////////////////////////////////




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


$sql_consulta="SELECT *  FROM controle_pn_bko WHERE ($novavar2) and ($novavar) and ($novavar3) and (data_janela BETWEEN '$data_1' and '$data_2') ORDER BY data_inicial";

$_SESSION["sql_consulta"] = $sql_consulta;

$sql_verifca = "$sql_consulta";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());


//echo $sql_consulta;

echo "<script type=\"text/javascript\">
       document.location.replace('../../tp/pn/pedidos_pn_bko_aguardando_janela.php');
 		</script>";
        exit;

?>
    

</body>
</html>