<?php

$tempo = 0;

set_time_limit($tempo);
  
	
	
if(empty($_POST['senha']))
{

echo "<script>alert('Por favor preencher o campo com a nova senha'); 
document.location.replace('../forms/formalterar_senha.php); </script>";
}
else
{

$id = (int) $_GET['id'];

 $usuario_update="UPDATE cip_nv.tbl_usuarios SET  senha = '{$_POST['senha']}'
                                                WHERE idtbl_usuario='$id' ";
										   
$acao_update=mysql_query($usuario_update,$conecta);

echo "<script>alert('Senha alterada com sucesso'); 
              
document.location.replace('principal.php'); </script>";
}

mysql_free_result($acao_update);
mysql_close($conecta);


?>


