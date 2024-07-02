<?php

date_default_timezone_set("Brazil/East");
$dataatual = date("H:i:s");
$data_hoje = date("Y/m/d");

if (!isset($_COOKIE['valida_log']) || ($_COOKIE['valida_log'] == "")) {
    echo "<br><font color='#999999' face='arial' size='2'>Favor fazer o login corretamente.</font>";
    echo "<hr><input type='button' name='voltar' value='<< Voltar' onclick =" .
        "window.location='index.php'" . ">";
    exit;
}
?>
<html>
<head>
<refresh></refresh>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<title>Controle de Ponto On-Line</title>
<body>


<div id="menu">
<?php 

include("menu.php");

?>

</div>
<div id="divconteudo">
<?php
 
 if(isset($_GET['t'])){
  include("forms/{$_GET['t']}"); }
 
 ?>
 </div>
 
</body>
</html>