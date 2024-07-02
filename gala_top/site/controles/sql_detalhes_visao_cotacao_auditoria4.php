<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  

 include("../../bd.php");


 $login_operador;

echo '<br>';

if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhuma atividade selecionada.'); window.history.go(-1); </script>\n";
	exit;
}
if("$login_operador_auditoria" == '0'){ 

echo "<script>alert('Por favor selecionar o usuario.'); window.history.go(-1); </script>\n";
	exit;

}
else
{

foreach($_POST["ling"] as $id_cotacao)
{

   $sql_valida = "SELECT id_cotacao,status_cip_auditoria     
                             FROM tbl_auditoria
                             WHERE id_cotacao = $id_cotacao";
                   
              $acao_valida = mysql_query($sql_valida) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $status_cip_auditoria = $linha_status_cip['status_cip_auditoria'];


   if($status_cip_auditoria == 13){
              $sql_valida = "SELECT id_cotacao     
                             FROM tbl_auditoria
                             WHERE id_cotacao = $id_cotacao";
                   
                  $acao_valida = mysql_query($sql_valida) or die (mysql_error());

                  $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     
                       $sql_valida9 = "DELETE FROM tbl_auditoria
                                       WHERE id_cotacao=$id_cotacao";
                      $acao_valida9 = mysql_query($sql_valida9) or die (mysql_error()); 
                    
                         
                    
                  }  



       	 			 
        //Monta SQL para INSERT
        $sql_inserir ="INSERT INTO tbl_auditoria(id_cotacao,
                                               status_cip_auditoria,
                                               disc_status_cip_auditoria,
                                               setor)
                                                VALUES('$id_cotacao',
                                                       '14',
                                                       'Distribuido',
                                                       'Auditoria'
                                                       )";
        $result = mysql_query($sql_inserir) or die(mysql_error()); 



$usuario_op="SELECT * FROM tbl_usuarios WHERE idtbl_usuario ='$login_operador_auditoria'";
$acao_op=mysql_query($usuario_op,$conecta);
while($linha_op = mysql_fetch_assoc($acao_op)) 
{
$login  =	$linha_op["idtbl_usuario"];
$nome  =	$linha_op["usuario"];
}	

$sql_update1 = "UPDATE tbl_auditoria SET
					dt_distribuicao = '$dt_distribuicao',
					idtbl_usuario_auditoria = '$login'
				  	WHERE id_cotacao = $id_cotacao";
	
$acao_update1 = mysql_query($sql_update1) or die (mysql_error());
}else{
    
 $usuario_op="SELECT * FROM tbl_usuarios WHERE idtbl_usuario ='$login_operador_auditoria'";
$acao_op=mysql_query($usuario_op,$conecta);
while($linha_op = mysql_fetch_assoc($acao_op)) 
{
$login  =	$linha_op["idtbl_usuario"];
$nome  =	$linha_op["usuario"];
}	

$sql_update1 = "UPDATE tbl_auditoria SET
                    status_cip_auditoria=14,
                    disc_status_cip_auditoria='Distribuido',
					dt_distribuicao = '$dt_distribuicao',
					idtbl_usuario_auditoria = '$login',
                    setor='Auditoria'   
				  	WHERE id_cotacao = $id_cotacao";  
                       
$acao_update1 = mysql_query($sql_update1) or die (mysql_error());    
  }
    
    
}	

echo "<script>alert('Pedidos distribuidos para o login: $nome'); 
	              alert('Data/Hora Da Distribuição: $dt_distribuicao2');	
	             document.location.replace('../forms/formdetalhes_visao_cotacao_auditoria.php?canal={$canal}&status_cip_auditoria={$status_cip_auditoria}');
                  </script>\n";
	exit;

}

?>	


</body>
</html>