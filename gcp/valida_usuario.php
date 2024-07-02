<?php

include("bd.php");//conecta banco de dado

 ?>
 <?php
$page="GALA - VPG";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<head>
	<title><?php echo $page; ?> </title>
   
    <link rel="StyleSheet" href="css/padrao.css" type="text/css" />
    
    
   
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    
 <script> 
  function resizePage() {
        document.getElementById("resolucao").style.height = (document.body.clientHeight - 100) * 0.9;
        document.getElementById("resolucao").style.width = (document.body.clientWidth - 100) * 0.9;
      }

</script> 


    
</head>
<body>
 
 <?php
  //document.location.replace('index.php');
 if($_POST['cpf'] == '' || $_POST['senha'] == '')
 {
 echo "<script>   
      history.back();
      </script>";
    
 }
 
 
 
 
 //monta a consulta sql
 $query = "SELECT * FROM cip_nv.tbl_usuarios a
		   WHERE a.cpf ='{$_POST['cpf']}' AND
		         a.senha =('{$_POST['senha']}')";
				
 //envia a consulta sql para MySQL
 $result= mysql_query($query,$conecta);
 
 //conta quantas linhas foram retornadas
 //qualquer coisa diferente de 1 nega o acesso
 if(mysql_num_rows($result) != 1){
   echo"
       <script type=\"text/javascript\">
        alert('Usuário ou senha inválidos!');
		 document.location.replace('index.php');
        </script>
 ";
  exit();
   }
   //pega o resultado da consulta slq e devolve como um array
   $dado= mysql_fetch_array($result);   
    if($dado['status'] == 0)
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
   
  $queryupdate=mysql_query("UPDATE cip_nv.tbl_usuarios SET logado='0',data_log_ent='$data_log_ent',data_log_sai='' WHERE cpf ='{$_POST['cpf']}'");
  
    //monta a consulta sql
     $query2 = "SELECT * FROM cip_nv.tbl_usuarios
		       WHERE cpf ='{$_POST['cpf']}' AND
		               senha =('{$dado['senha']}')";
				
 //envia a consulta sql para MySQL
  $result= mysql_query($query2,$conecta);
   //cria a coockie de controle do sistema
  $dado= mysql_fetch_array($result);
   setcookie('idtbl_usuario',$dado['idtbl_usuario'],time() + 28800);

   //redireciona para a tela principal do sistema
   
   
$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$dado['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
     
		}
   
 if($perfil != 1 && $perfil != 4){
    
    echo"
       <script>
        document.location.replace('principal.php');
        </script>
 ";
  exit();
   }else{
   
echo"
       <script>
        document.location.replace('principal.php');
        </script>
 ";
  exit();
}
 
?>
</body>
</html>
