﻿<?php
$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");
  
$data_log_sai=date("Y-m-d H:i:s");

setcookie('salva',$_COOKIE['id_usuario'],time() + 28800);
setcookie('id_usuario',"");


include("bd.php");

$queryupdate=mysql_query("UPDATE usuario SET logado='0',data_log_sai='$data_log_sai' WHERE id_usuario='{$_COOKIE['id_usuario']}'");

if(mysql_affected_rows() == 0)
{ 
    echo"
       <script type=\"text/javascript\">
        alert('Não foi encontrado o nome se usuario !');
		      document.location.replace('index.php');
        </script>
    ";
  exit();
 
}
 //redireciona para a tela principal do sistema
 
   echo"
       <script type=\"text/javascript\">
		      document.location.replace('index.php');
        </script>
      ";
  exit();
?>