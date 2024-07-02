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

//valida perfil
$checkSupervisor = mysql_query("SELECT * FROM supervisor WHERE id_usuario = $id_usuario");

if(mysql_affected_rows() > 0){

    while($row_sup=mysql_fetch_array($checkSupervisor)){
        $id_supervisor  = $row_sup['id_supervisor'];
    }

    //atualiza informações caso usuario deixe de ser supervisor
    if($id_supervisor != ""){

      //usuario que respodiam a supervisor a ser removido ficam o status de supervisor não informado
      $sql_atualiza_dados = "UPDATE usuario SET id_supervisor = 1  WHERE id_supervisor = '{$id_supervisor}'";
      $executa_query= mysql_query($sql_atualiza_dados) or die (mysql_error());

      //deleta supervisor da tabela de supervisores
      $sql_atualiza_dados_sup = "DELETE supervisor WHERE id_usuario = '{$id_usuario}'";
      $executa_query_sup= mysql_query($sql_atualiza_dados_sup) or die (mysql_error());
    }
}

$sql_deleta="DELETE FROM  
                usuario 
              WHERE 
              	id_usuario = '$id_usuario' ";
                 
$acao_insere= mysql_query($sql_deleta) or die (mysql_error());
 
        
echo" <script> 
	      alert('Usu\u00E1rio deletado com sucesso!');
	      document.location.href='principal.php?id=" . $id_usuario_logado . "&t=View/home.php'
      </script>
      ";                                        
    exit();
    
?>