<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  


 $login_operador;

echo '<br>';

if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhuma atividade selecionada.'); window.history.go(-1); </script>\n";
	exit;
}
if($_POST['login_operador_input'] == '0'){ 

echo "<script>alert('Por favor selecionar o usuario.'); window.history.go(-1); </script>\n";
	exit;

}
else
{
 foreach($_POST["ling"] as $id_cotacao)
{   
 
              $sql_valida = "SELECT id_cotacao,status_cip_input      
                             FROM cip_nv.tbl_input
                             WHERE id_cotacao = $id_cotacao";
                   
              $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $status_cip_input = $linha_status_cip['status_cip_input'];
    




if($status_cip_input == 7){

              $sql_valida = "SELECT id_cotacao     
                             FROM cip_nv.tbl_input
                             WHERE id_cotacao = $id_cotacao";
                   
                  $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());

                  $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     
                       $sql_valida9 = "DELETE FROM cip_nv.tbl_input
                                       WHERE id_cotacao=$id_cotacao";
                      $acao_valida9 = mysql_query($sql_valida9,$conecta) or die (mysql_error()); 
                    
                         
                    
                  }  



       	 			 
        //Monta SQL para INSERT
        $sql_inserir ="INSERT INTO cip_nv.tbl_input(id_cotacao,
                                               status_cip_input,
                                               disc_status_cip_input,
                                               motivo_da_acao,
                                               disc_motivo_da_acao,
                                               setor)
                                                VALUES('$id_cotacao',
                                                       '8',
                                                       'Distribuido',
                                                       '8',
                                                       'Distribuido',
                                                       'Input'
                                                       )";
        $result = mysql_query($sql_inserir,$conecta) or die(mysql_error()); 



$usuario_op="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario ='{$_POST['login_operador_input']}'";
$acao_op=mysql_query($usuario_op,$conecta);
while($linha_op = mysql_fetch_assoc($acao_op)) 
{
$login  =	$linha_op["idtbl_usuario"];
$nome  =	$linha_op["nome"];
}	

$sql_update1 = "UPDATE cip_nv.tbl_input SET
					                       dt_distribuicao = '$dt_distribuicao',
					                       idtbl_usuario_input = '$login'
				  	    WHERE id_cotacao = $id_cotacao";
	


	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());


 $query_complementar="SELECT  a.TIPO_COTACAO,
                              a.id_cotacao,
                              a.id_complementar_da_principal
       
                             FROM cip_nv.tbl_cotacao a 
   
                              WHERE a.id_complementar_da_principal='$id_cotacao'  
                              AND a.substatus_da_cotacao='Input' 
                              AND a.substatus_da_cotacao <> 'Analise de input' 
                              AND TIPO_COTACAO='Complementar'  
                              GROUP BY a.id_cotacao ";
          $consulta_complementar= mysql_query($query_complementar,$conecta) or die (mysql_error());
          $numf= mysql_num_rows($consulta_complementar); 

   while($linha_comp = mysql_fetch_array($consulta_complementar)){

          $id_cotacaocp=$linha_comp['id_cotacao'];

           $sql_update1 = "UPDATE cip_nv.tbl_input a SET
                                 a.status_cip_input=8,
                                 a.disc_status_cip_input='Distribuido',
                                 a.dt_distribuicao = '$dt_distribuicao',
                                 a.idtbl_usuario_input = '$login'
                WHERE a.id_cotacao = $id_cotacaocp";
  


  
           $acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());

    }





$situacao="Com Cotações";

 $sql_update2 = "UPDATE cip_nv.tbl_usuarios SET  situacao2 = '$situacao' 
				  	   WHERE idtbl_usuario ='$login' ";
	
$acao_update2 = mysql_query($sql_update2,$conecta) or die (mysql_error());
 
 }else{
 
 
$usuario_op="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario ='{$_POST['login_operador_input']}'";
$acao_op=mysql_query($usuario_op,$conecta);
while($linha_op = mysql_fetch_assoc($acao_op)) 
{
$login  =	$linha_op["idtbl_usuario"];
$nome  =	$linha_op["nome"];
}	

$sql_update1 = "UPDATE cip_nv.tbl_input SET 
                                 status_cip_input=8,
                                 disc_status_cip_input='Distribuido',
					                       dt_distribuicao = '$dt_distribuicao',
					                       idtbl_usuario_input = '$login',
                                 setor='Input'
				  	    WHERE id_cotacao = $id_cotacao";
	


	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());


 $query_complementar="SELECT  a.TIPO_COTACAO,
                              a.id_cotacao,
                              a.id_complementar_da_principal
       
                             FROM cip_nv.tbl_cotacao a 
   
                              WHERE a.id_complementar_da_principal='$id_cotacao' 
                              AND TIPO_COTACAO='Complementar'  
                               AND a.substatus_da_cotacao='Input' 
                              AND a.substatus_da_cotacao <> 'Analise de input' 
                              GROUP BY a.id_cotacao ";
          $consulta_complementar= mysql_query($query_complementar,$conecta) or die (mysql_error());
          $numf= mysql_num_rows($consulta_complementar); 

   while($linha_comp = mysql_fetch_array($consulta_complementar)){

          $id_cotacaocp=$linha_comp['id_cotacao'];

           $sql_update1 = "UPDATE cip_nv.tbl_input a SET
                                 a.status_cip_input=8,
                                 a.disc_status_cip_input='Distribuido',
                                 a.dt_distribuicao = '$dt_distribuicao',
                                 a.idtbl_usuario_input = '$login'
                WHERE a.id_cotacao = $id_cotacaocp";
  


  
           $acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());

    }





$situacao="Com Cotações";

 $sql_update2 = "UPDATE cip_nv.tbl_usuarios SET  situacao2 = '$situacao' 
				  	   WHERE idtbl_usuario ='$login' ";
	
$acao_update2 = mysql_query($sql_update2,$conecta) or die (mysql_error());
   
 } 
 
    
    
}	
//$cart=$_POST['cart'];

echo "<script>alert('Cotacoes distribuidos para o login: $nome'); 
	              alert('Data/Hora Da Distribuição: $dt_distribuicao2');
                alert('Se houver complementar sera distribuida automaticamente junto com a principal');	
	               document.location.replace('principal.php?&t=forms/formdistribuir_cotacao_input.php');
                  </script>\n";
	exit;

}

mysql_free_result($acao_update2,$acao_op,$acao_update1,$acao_update2,$acao_valida,$acao_valida9,$result);
mysql_close($conecta);

?>	


</body>
</html>