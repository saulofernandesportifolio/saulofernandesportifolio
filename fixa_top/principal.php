﻿<?php

//habilita controle de erros
error_reporting(0);
ini_set(“display_errors”, 0 );



if(!isset($_COOKIE['salva']) && !isset($_COOKIE['id_usuario']))
{
   $_COOKIE['salva']='';
   $_COOKIE['id_usuario']='';
   $logado='';
  //die ('teste');
}

 if(!isset($_COOKIE['id_usuario'])){

    include("../fixa_top/bd.php");
    
     
     setcookie('id_usuario',$_COOKIE['salva'],time() + 28800);
     
     $queryupdate=mysql_query("UPDATE usuario SET logado='0' WHERE id_usuario='{$_COOKIE['id_usuario']}'");
      
 }



include("../fixa_top/bd.php");


setcookie('id_usuario',$_COOKIE['id_usuario'],time() + 28800);
  
$queryupdate=mysql_query("UPDATE usuario SET logado='0' WHERE id_usuario='{$_COOKIE['id_usuario']}'");
      

$sql_operador="SELECT * FROM v_geral_usuario_info WHERE id_usuario='{$_COOKIE['id_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
          $id_usuario      = $linha_operador["id_usuario"];
          $perfil          = $linha_operador["perfil"];
          $nome            = $linha_operador["nome"];
          $logado          = $linha_operador["logado"];
          $projeto         = $linha_operador["projeto"];
		    }


$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");


$hora2=date("H:i:s");


?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="css/imagem/title_empz.png" type="image/x-icon" />
  <link href="../fixa_top/css/menu.css" rel="stylesheet" style="text/css"/>
  <link href="../fixa_top/css/style.css" rel="stylesheet" style="text/css"/>
  <title><?php echo $perfil;?></title>

  <!-- Linkando a biblioteca javascript jQuery -->
  <script type="text/javascript" src="js/lib/jquery-1.12.0.min.js" ></script>
  <script type="text/javascript" src="js/mask/jquery.mask.js"></script>
  <script type="text/javascript" src="js/mask/jquery.mask.min.js"></script>
 
 <!-- Linkando a biblioteca datatable -->
<script type="text/javascript" src="js/jquery.dataTables.js"></script>


 <!-- Linkando css tabelas -->
<link href="../fixa_top/css/tabelas.css" rel="stylesheet" style="text/css"/>

  <!-- Linkando o arquivo que terá as funções javascript - functions.js -->
  <script type="text/javascript" src="js/functions.js"></script>
  <script type="text/javascript" src="js/funcoesJs.js"></script>
  <script type="text/javascript" src="js/Solicitacao.js"></script>

  <!-- Funções para validação de CPF e CNPJ -->
  <script type="text/javascript" src="js/valida_cpf_cnpj.js"></script>

  <script type="text/javascript" src="js/sorttable.js"></script>

<!--CSS icons-->  
<link rel="stylesheet" href="../fixa_top/css/font-awesome-4.5.0/css/font-awesome.min.css">

<!--Pagination-->
<script type='text/javascript' src='js/slimtable.min.js'></script>

<!--Charts library-->
<script type="text/javascript" src="js/flot-0.8.3/flot/jquery.flot.js"></script>
<script type="text/javascript" src="js/flot-0.8.3/flot/jquery.flot.time.js"></script>
<script type="text/javascript" src="js/flot-0.8.3/flot/jquery.flot.symbol.js"></script>
<script type="text/javascript" src="js/flot-0.8.3/flot/jquery.flot.axislabels.js"></script>
<script type="text/javascript" src="js/flot-0.8.3/flot/jquery.flot.pie.js"></script>


<!-- Linkando css tabelas -->
<link href="../fixa_top/css/graficos.css" rel="stylesheet" style="text/css"/>

</head>
<body onbeforeunload="location.assign('logout.php');" class="divctl">
<!--controla o conteúdo-->
<div id="resolucao">
  <?php require_once 'menu.php'; ?>  

   <?php
   
   if(isset($_GET['t'])){
    include("app/{$_GET['t']}");
   }
  
  ?>

</div>

</body>
</html>