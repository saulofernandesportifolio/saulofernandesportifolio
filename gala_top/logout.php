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
$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");
  
$data_log_sai=date("Y-m-d H:i:s");

ob_start();

setcookie("salva",$_COOKIE['idtbl_usuario'],time()-28800);
setcookie("idtbl_usuario","");



 include("bd.php");


$queryupdate=mysql_query("UPDATE tbl_usuarios SET logado='0',data_log_sai='$data_log_sai' WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'");

/*if(mysql_affected_rows() == 0)
{ 
    echo"
       <script type=\"text/javascript\">
        alert('Não foi encontrado o nome se usuario !');
		 document.location.replace('index.php');
        </script>
 ";
  exit();
 
}*/
 //redireciona para a tela principal do sistema


 
    echo utf8_encode("
       <script type=\"text/javascript\">
        alert('Usuário deslogado do sistema !');
		 document.location.replace('index.php');
        </script>
 ");
  exit();
   
 
?>

</body>
</html>