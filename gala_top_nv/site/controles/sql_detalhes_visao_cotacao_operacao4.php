<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  

 include("../../bd.php");


// $login_operador;
 
//echo '<br>';

if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhuma atividade selecionada.'); window.history.go(-1); </script>\n";
	exit;
}
if("$login_operador_analise" == '0'){ 

echo "<script>alert('Por favor selecionar o usuario.'); window.history.go(-1); </script>\n";
	exit;

}
else
{


foreach($_POST["ling"] as $id_cotacao)
{
         if($_POST['status_cip'] == 4){
    
              $sql_valida = "SELECT id_cotacao,status_cip_analise     
                             FROM tbl_analise
                             WHERE id_cotacao = $id_cotacao";
                   
              $acao_valida = mysql_query($sql_valida) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $status_cip_analise = $linha_status_cip['status_cip_analise'];

              if($status_cip_analise == 3){


                     $sql_valida = "SELECT id_cotacao     
                             FROM tbl_analise
                             WHERE id_cotacao = $id_cotacao";
                    
                     $acao_valida = mysql_query($sql_valida) or die (mysql_error());

                     $linha_valida = mysql_num_rows($acao_valida);
  

                     //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                     if($linha_valida > 0)
                     {
                    
                     
                       $sql_valida9 = "DELETE FROM tbl_analise
                                       WHERE id_cotacao=$id_cotacao";
                      $acao_valida9 = mysql_query($sql_valida9) or die (mysql_error()); 
                    
                         
                    
                     }  



       	 			 
                    //Monta SQL para INSERT
                    $sql_inserir ="INSERT INTO tbl_analise(id_cotacao,
                                               status_cip_analise,
                                               disc_status_cip_analise,
                                               setor)
                                                VALUES('$id_cotacao',
                                                       '4',
                                                       'Distribuido',
                                                       'Analise'
                                                       )";
                    $result = mysql_query($sql_inserir) or die(mysql_error()); 


  
                   $usuario_op="SELECT * FROM tbl_usuarios WHERE idtbl_usuario ='$login_operador_analise'";
                   $acao_op=mysql_query($usuario_op,$conecta);
                   while($linha_op = mysql_fetch_assoc($acao_op)) 
                   {
                   $login  =	$linha_op["idtbl_usuario"];
                   $nome  =	$linha_op["nome"];
                   $canal =    $linha_op["tramite"];
                   }	

                   $sql_update1 = "UPDATE tbl_analise SET
			                                                dt_distribuicao = '$dt_distribuicao',
			    		                                        idtbl_usuario_analise = '$login'
				     	                     WHERE id_cotacao = $id_cotacao";
	


	
                   $acao_update1 = mysql_query($sql_update1) or die (mysql_error());
                }else{
    
                  $usuario_op="SELECT * FROM tbl_usuarios WHERE idtbl_usuario ='$login_operador_analise'";
                   $acao_op=mysql_query($usuario_op,$conecta);
                   while($linha_op = mysql_fetch_assoc($acao_op)) 
                   {
                   $login  =	$linha_op["idtbl_usuario"];
                   $nome  =	$linha_op["nome"];
                   $canal =    $linha_op["tramite"];
                   }	

                    $sql_update1 = "UPDATE tbl_analise SET
                                                        status_cip_analise=4,
                                                        disc_status_cip_analise='Distribuido',
				                                                dt_distribuicao = '$dt_distribuicao',
				                                                idtbl_usuario_analise = '$login',
                                                        setor = 'Analise'
				                   WHERE id_cotacao = $id_cotacao";
                     $acao_update1 = mysql_query($sql_update1) or die (mysql_error());  
              
           
             
      

                 }   
            echo "<script type=\"text/javascript\">
                   alert('Cota\xE7\xF5es distribuidos para o login: $nome'); 
	               alert('Data/Hora Da Distribui\xE7\xE3o: $dt_distribuicao2');	
	               window.close();
                  </script>"; 
            	exit(); 
     
          }
       
       

elseif($_POST['status_cip'] == 8){

              $sql_valida = "SELECT id_cotacao,status_cip_input     
                             FROM tbl_input
                             WHERE id_cotacao = $id_cotacao";
                   
              $acao_valida = mysql_query($sql_valida) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $status_cip_input = $linha_status_cip['status_cip_input'];
    




      if($status_cip_input == 7){

              $sql_valida = "SELECT id_cotacao     
                             FROM tbl_input
                             WHERE id_cotacao = $id_cotacao";
                   
                  $acao_valida = mysql_query($sql_valida) or die (mysql_error());

                  $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     
                       $sql_valida9 = "DELETE FROM tbl_input
                                       WHERE id_cotacao=$id_cotacao";
                      $acao_valida9 = mysql_query($sql_valida9) or die (mysql_error()); 
                    
                         
                    
                  }  



       	 			 
                //Monta SQL para INSERT
                $sql_inserir ="INSERT INTO tbl_input(id_cotacao,
                                               status_cip_input,
                                               disc_status_cip_input,
                                               setor)
                                                VALUES('$id_cotacao',
                                                       '8',
                                                       'Distribuido',
                                                       'Input'
                                                       )";
                $result = mysql_query($sql_inserir) or die(mysql_error()); 



              $usuario_op="SELECT * FROM tbl_usuarios WHERE idtbl_usuario ='$login_operador_input'";
              $acao_op=mysql_query($usuario_op,$conecta);
              while($linha_op = mysql_fetch_assoc($acao_op)) 
               {
                $login  =	$linha_op["idtbl_usuario"];
                $nome  =	$linha_op["nome"];
               }	

              $sql_update1 = "UPDATE tbl_input SET
				        	                               dt_distribuicao = '$dt_distribuicao',
			        		                               idtbl_usuario_input = '$login'
				                     WHERE id_cotacao = $id_cotacao";
	


	
              $acao_update1 = mysql_query($sql_update1) or die (mysql_error());
 
       }else{
 
 
           $usuario_op="SELECT * FROM tbl_usuarios WHERE idtbl_usuario ='$login_operador_input'";
           $acao_op=mysql_query($usuario_op,$conecta);
           while($linha_op = mysql_fetch_assoc($acao_op)) 
           {
           $login  =	$linha_op["idtbl_usuario"];
           $nome  =	$linha_op["usuario"];
           }	

            $sql_update1 = "UPDATE tbl_input SET 
                                              status_cip_input=8,
                                              disc_status_cip_input='Distribuido',
					                                    dt_distribuicao = '$dt_distribuicao',
					                                    idtbl_usuario_input = '$login',
                                              setor='Input'
				  	              WHERE id_cotacao = $id_cotacao";
	


	
           $acao_update1 = mysql_query($sql_update1) or die (mysql_error());
   
         }  
         
              echo "<script type=\"text/javascript\">
                   alert('Cota\xE7\xF5es distribuidos para o login: $nome'); 
	               alert('Data/Hora Da Distribui\xE7\xE3o: $dt_distribuicao2');	
	               window.close();
                  </script>"; 
            	exit(); 
     
        
            
  }	


elseif($_POST['status_cip'] == 14){

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
                $nome  =	$linha_op["nome"];
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
    
        echo "<script type=\"text/javascript\">
                  alert('Cota\xE7\xF5es distribuidos para o login: $nome'); 
	              alert('Data/Hora Da Distribui\xE7\xE3o: $dt_distribuicao2');	
	              window.close();
                  </script>"; 
            	exit(); 
}	

elseif($_POST['status_cip'] == 21){
              $sql_valida = "SELECT id_cotacao,status_cip_correcao     
                             FROM tbl_correcao
                             WHERE id_cotacao = $id_cotacao";
                   
              $acao_valida = mysql_query($sql_valida) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $status_cip_correcao = $linha_status_cip['status_cip_correcao'];


        if($status_cip_correcao == 20){

                  $sql_valida = "SELECT id_cotacao     
                             FROM tbl_correcao
                             WHERE id_cotacao = $id_cotacao";
                   
                  $acao_valida = mysql_query($sql_valida) or die (mysql_error());

                  $linha_valida = mysql_num_rows($acao_valida);


                  //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                  if($linha_valida > 0)
                  {
                    
                     
                       $sql_valida9 = "DELETE FROM tbl_correcao
                                       WHERE id_cotacao=$id_cotacao";
                      $acao_valida9 = mysql_query($sql_valida9) or die (mysql_error()); 
                    
                         
                    
                  }  



       	 			 
                 //Monta SQL para INSERT
                 $sql_inserir ="INSERT INTO tbl_correcao(id_cotacao,
                                               status_cip_correcao,
                                               disc_status_cip_correcao,
                                               setor)
                                                VALUES('$id_cotacao',
                                                       '21',
                                                       'Distribuido',
                                                       'correcao'
                                                       )";
                $result = mysql_query($sql_inserir) or die(mysql_error()); 



               $usuario_op="SELECT * FROM tbl_usuarios WHERE idtbl_usuario ='$login_operador_correcao'";
               $acao_op=mysql_query($usuario_op,$conecta);
               while($linha_op = mysql_fetch_assoc($acao_op)) 
               {
               $login  =	$linha_op["idtbl_usuario"];
               $nome  =	$linha_op["nome"];
               }	

              $sql_update1 = "UPDATE tbl_correcao SET
					                                        dt_distribuicao = '$dt_distribuicao',
					                                        idtbl_usuario_correcao = '$login'
				  	                  WHERE id_cotacao = $id_cotacao";
	


	
             $acao_update1 = mysql_query($sql_update1) or die (mysql_error());

        }else{
    
        $usuario_op="SELECT * FROM tbl_usuarios WHERE idtbl_usuario ='$login_operador_correcao'";
        $acao_op=mysql_query($usuario_op,$conecta);
        while($linha_op = mysql_fetch_assoc($acao_op)) 
        {
        $login  =	$linha_op["idtbl_usuario"];
        $nome  =	$linha_op["usuario"];
        }	

        $sql_update1 = "UPDATE tbl_correcao SET
                      status_cip_correcao=21,
                      disc_status_cip_correcao='Distribuido',
		        	        dt_distribuicao = '$dt_distribuicao',
					            idtbl_usuario_correcao = '$login',
                      setor='Correcao'
				  	  WHERE id_cotacao = $id_cotacao";
	


	
           $acao_update1 = mysql_query($sql_update1) or die (mysql_error());    
    
    
    
        }   
        
        
            echo "<script type=\"text/javascript\">
                  alert('Cota\xE7\xF5es distribuidos para o login: $nome'); 
	              alert('Data/Hora Da Distribui\xE7\xE3o: $dt_distribuicao2');	
	              window.close();
                  </script>"; 
            	exit(); 
     }

       
  


          
  } 
  
  
    
  }       




?>	


</body>
</html>