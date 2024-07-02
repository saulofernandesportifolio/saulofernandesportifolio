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
if($_POST['nu_pedido'] == ""){
    $nu_pedido = "%";
}else{
    $nu_pedido = $_POST['nu_pedido'];
}
if($_SESSION["operador_gestao"] == 0){
	echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../logout.php');
		</script>
	";
}
include "../conexao.php";

if (empty($_POST["regional"]) && empty($_POST["nu_pedido"]))
{
echo "<script>alert('Nenhuma regional selecionada.'); document.location.replace('gestao_filtro.php'); </script>\n";
exit;
}

$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];

if($nu_pedido == "%"){
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

   $sql_consulta="UPDATE base_gestao 
                   SET  fila = 2, 
                        usuario ='$login', 
                        nome2 = '$nome', 
                        tramite = 'Tratando',
                        disc_status_tp = 'Aberto' 
                   WHERE (fila = 1) and 
                        (usuario = 'Aguardando Operador') and 
                        (nome2 = 'Aguardando Operador') and 
                        (tramite = 'Aguardando') and 
                        ($novavar2)  
                   ORDER BY termino_efetivo ASC";
}else{
     $sql_consulta="UPDATE base_gestao 
                   SET  fila = 2, 
                        usuario ='$login', 
                        nome2 = '$nome', 
                        tramite = 'Tratando',
                        disc_status_tp = 'Aberto' 
                   WHERE pedido = '$nu_pedido' and status_tp = 1 
                   ORDER BY termino_efetivo ASC";
}
$tempo = 0;
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
$data_dia= date("y/m/d"); 
//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario
$sql_verifca = "$sql_consulta";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());
if(mysql_affected_rows() > 0){
    echo "<script type=\"text/javascript\">
        document.location.replace('../../tp/gestao/pedido_gestao_bko.php');
        </script>";
    exit;
}else{
    echo "<script type=\"text/javascript\">
        alert('Nenhum pedido foi encontrado!');
        history.back();
        </script>";
}
?>
</body>
</html>