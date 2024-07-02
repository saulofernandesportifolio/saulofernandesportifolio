<?php
include("bd.php");//conecta banco de dado
require_once '../fixa_top/app/Model/cripto.php';
$cripto = new cripto();
 ?>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
 <?php
  //document.location.replace('index.php');
 if($_POST['cpf'] == '' || $_POST['senha'] == '')
 {
 echo "<script>   
      history.back();
      </script>";
    
 }
 
 
 //monta a consulta sql
 $query = "SELECT * FROM usuario
		   WHERE cpf ='{$_POST['cpf']}' AND
		         senha =('{$_POST['senha']}')";
				
 //envia a consulta sql para MySQL
 $result= mysql_query($query,$conecta);
 
 //conta quantas linhas foram retornadas
 //qualquer coisa diferente de 1 nega o acesso
 if(mysql_num_rows($result) != 1){
   echo"
       <script type=\"text/javascript\">
        alert('Cpf ou senha inválidos!');
		 document.location.replace('index.php');
        </script>
 ";
  exit();
   }
   //pega o resultado da consulta slq e devolve como um array
   $dado= mysql_fetch_array($result);   
    if($dado['id_status'] == 1)
   {
    
     echo"
       <script type=\"text/javascript\">
        alert('Usuário desativado falar com a supervisão !');
		 document.location.replace('index.php');
        </script>
 ";
  exit();
   }  
$tempo = 0;

set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
  
$data_log_ent=date("Y-m-d H:i:s");
   
  $queryupdate=mysql_query("UPDATE usuario SET logado='0',data_log_ent='$data_log_ent',data_log_sai='' WHERE cpf='{$_POST['cpf']}'");
  
    //monta a consulta sql
     $query2 = "SELECT * FROM usuario
		       WHERE cpf ='{$dado['cpf']}'AND
		               senha =('{$dado['senha']}')";
				
 //envia a consulta sql para MySQL
  $result= mysql_query($query2,$conecta);
   //cria a coockie de controle do sistema
  $dado= mysql_fetch_array($result);
   setcookie('id_usuario',$dado['id_usuario'],time() + 28800);

$id_usuario = $dado['id_usuario'];

 $redirect = "principal.php?id=".$cripto->codificar($id_usuario)."&t=View/home.php";
 
 #abaixo, chamamos a função header() com o atributo location: apontando para a variavel $redirect, que por 
 #sua vez aponta para o endereço de onde ocorrerá o redirecionamento
 header("location:$redirect");
  
?>
