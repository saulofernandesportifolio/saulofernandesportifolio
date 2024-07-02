<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("../fixa_top/bd.php");

$tempo = 0;

require_once '../fixa_top/app/Model/cripto.php';

$cripto = new cripto();

$id_usuario_logado = $_GET['idl'];
$id_usuario= $_GET['id'];

$id_usuario = $cripto->decodificar($id_usuario);

set_time_limit($tempo);

 $sql_insere="UPDATE usuario 
              SET senha  = 'empreza'
              WHERE id_usuario = '$id_usuario' ";
                 
                                      
$acao_insere= mysql_query($sql_insere) or die (mysql_error());
 
        
echo" <script> 
	      alert('Senha padrao gerada!');
	      document.location.href='principal.php?id=" . $id_usuario_logado . "&t=View/home.php'
      </script>
      ";                                        
    exit();
    
?>