<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("../fixa/bd.php");

$tempo = 0;

set_time_limit($tempo);

require_once '../fixa/site/classes/cripto.php';

$cripto = new cripto();

$id_usuario= $_GET['id'];

$id_usuario = $cripto->decodificar($id_usuario);

$senha=$_POST['senha'];

if(strlen($senha) < '4')
{
 echo" <script> 
      alert('Senha deve ter pelo menos 4 digitos!');
      history.back();
      </script>
      ";                                        
    exit();   
    
}

 $sql_insere="UPDATE usuario 
              SET senha  = '{$_POST['senha']}'
              WHERE id_usuario = '$id_usuario' ";

$acao_insere= mysql_query($sql_insere) or die (mysql_error());
 
        
echo" <script> 
        alert('Senha alterada com sucesso!');
        alert('Ser\u00E1 nescess\u00E1rio logar novamente !');
        document.location.replace('../fixa/logout.php');
      </script>
      ";                                        
    exit();
    
?>