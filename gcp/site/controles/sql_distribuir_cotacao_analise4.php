<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  




 $login_operador;


if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhuma atividade selecionada.'); window.history.go(-1); </script>\n";
	exit;
}
if($_POST['login_operador_analise'] == '0'){ 

echo "<script>alert('Por favor selecionar o usuario.'); window.history.go(-1); </script>\n";
	exit;

}
else
{

foreach($_POST["ling"] as $id_cotacao)
{

   $sql_valida = "SELECT id_cotacao,status_cip_analise     
                             FROM cip_nv.tbl_analise
                             WHERE id_cotacao = $id_cotacao ";
                   
              $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $status_cip_analise = $linha_status_cip['status_cip_analise'];


if($status_cip_analise == 3){

              $sql_valida = "SELECT id_cotacao     
                             FROM cip_nv.tbl_analise
                             WHERE id_cotacao = $id_cotacao";
                   
                  $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());

                  $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     
                       $sql_valida9 = "DELETE FROM cip_nv.tbl_analise
                                       WHERE id_cotacao=$id_cotacao";
                      $acao_valida9 = mysql_query($sql_valida9,$conecta) or die (mysql_error()); 
                    
                         
                    
                  }  



       	 			 
        //Monta SQL para INSERT
        $sql_inserir ="INSERT INTO cip_nv.tbl_analise(id_cotacao,
                                               status_cip_analise,
                                               disc_status_cip_analise,
                                               setor)
                                                VALUES('$id_cotacao',
                                                       '4',
                                                       'Distribuido',
                                                       'Analise'
                                                       )";
        $result = mysql_query($sql_inserir,$conecta) or die(mysql_error()); 



$usuario_op="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario ='{$_POST['login_operador_analise']}'";
$acao_op=mysql_query($usuario_op,$conecta);
while($linha_op = mysql_fetch_assoc($acao_op)) 
{
$login  =	$linha_op["idtbl_usuario"];
$nome  =	$linha_op["nome"];
}	

$sql_update1 = "UPDATE cip_nv.tbl_analise SET
					                         dt_distribuicao = '$dt_distribuicao',
					                         idtbl_usuario_analise = '$login'
				  	WHERE id_cotacao = $id_cotacao";
	


	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());

$situacao="Com Cotações";

 $sql_update2 = "UPDATE cip_nv.tbl_usuarios SET  situacao2 = '$situacao' 
				  	   WHERE idtbl_usuario ='$login' ";
	
$acao_update2 = mysql_query($sql_update2,$conecta) or die (mysql_error());

  }else{
    
 $usuario_op="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario ='{$_POST['login_operador_analise']}'";
$acao_op=mysql_query($usuario_op,$conecta);
while($linha_op = mysql_fetch_assoc($acao_op)) 
{
$login  =	$linha_op["idtbl_usuario"];
$nome  =	$linha_op["nome"];
}	

$sql_update1 = "UPDATE cip_nv.tbl_analise SET
                                    status_cip_analise=4,
                                    disc_status_cip_analise='Distribuido',
					                          dt_distribuicao = '$dt_distribuicao',
					                          idtbl_usuario_analise = '$login',
                                     setor = 'Analise'
				  	    WHERE id_cotacao = $id_cotacao";
	


	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());   
  

$situacao="Com Cotações";

 $sql_update2 = "UPDATE cip_nv.tbl_usuarios SET  situacao2 = '$situacao' 
				  	   WHERE idtbl_usuario ='$login' ";
	
$acao_update2 = mysql_query($sql_update2,$conecta) or die (mysql_error());
 
 }   


 
    
    
}	

//$cart=$_POST['cart'];

echo "<script>alert('Cotacao distribuidos para o login: $nome'); 
	              alert('Data/Hora Da Distribuição: $dt_distribuicao2');	
	               document.location.replace('principal.php?&t=forms/formdistribuir_cotacao_analise.php');
                  </script>\n";
	exit;

}


 mysql_free_result($acao_update2,$acao_op,$acao_update1,$acao_update2,$acao_valida,$acao_valida9,$result);
 mysql_close($conecta);


?>	


</body>
</html>