<?php

 include("../../bd.php");

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_tratamento = date("Y-m-d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  
/*echo $_POST['id_pn'];

echo '<br>';

echo $_POST['status_cip'];

echo '<br>';*/

if(empty($_GET['cpf_cnpj'])){

echo" <script> 
      alert('informar selecionar o tipo !');
       redireciona();
       window.close();
      </script>
      ";                                        
    exit();


}



$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_POST['id_user']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
    
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             = $linha_operador["perfil"];
        $nome               = $linha_operador["nome"];
        $logado             = $linha_operador["logado"];
        $canal              = $linha_operador["tramite"];
        $cpf              = $linha_operador["cpf"];
        $turno              = $linha_operador["turno"];
    }


$sql_update="DELETE FROM bd_erros_pn.carteira 
             WHERE cpf_cnpj      = '{$_GET['cpf_cnpj']}' ";
$acao_update= mysql_query($sql_update,$conecta2) or die (mysql_error());

 
       
echo" <script> 
      alert('Excluido comsucesso!');
       document.location.replace('principal.php?&t=forms/form_atualizar_carteira_erros.php');
   
      </script>
      ";                                        
    exit();


 mysql_free_result($acao_operador,$acao_update);
 mysql_close($conecta,$conecta2);
 mysql_next_result($conecta,$conecta2);

?>	


</body>
</html>
