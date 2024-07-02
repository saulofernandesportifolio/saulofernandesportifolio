<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("../fixa_top/bd.php");

require_once '../fixa_top/app/Model/cripto.php';

$cripto = new cripto();

$id_usuario_logado = $_GET['idl'];
$id_usuario= $_GET['id'];
$id_usuario = $cripto->decodificar($id_usuario);
 

$tempo = 0;

set_time_limit($tempo);

date_default_timezone_set("Brazil/East");
$data_desativado=date("Y-m-d H:i:s");



 $sql_insere="UPDATE usuario 
              SET 
              	id_status  = '1',
              	data_desativado = '$data_desativado'
              WHERE 
              	id_usuario = '$id_usuario' ";
                 
                 
                                                   
 $acao_insere= mysql_query($sql_insere) or die (mysql_error());
 
        
echo" <script> 
      alert('Usu\u00E1rio desativado com sucesso!');
      document.location.href='principal.php?id=" . $id_usuario_logado . "&t=View/home.php'
      </script>
      ";                                        
    exit();
    
?>