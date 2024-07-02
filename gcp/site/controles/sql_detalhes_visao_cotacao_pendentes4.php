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
if($_POST['login_operador_analise'] == 0 && $_POST['login_operador_input'] == 0 && $_POST['login_operador_auditoria'] == 0 && $_POST['login_operador_correcao'] == 0){ 

echo "<script>alert('Por favor selecionar o usuario.'); window.history.go(-1); </script>\n";
	exit;

}
else
{
if(!empty($_POST['login_operador_analise'])){
    
    $id_userop=$_POST['login_operador_analise'];
    
}elseif(!empty($_POST['login_operador_input'])){
    
    $id_userop=$_POST['login_operador_input'];
    
}elseif(!empty($_POST['login_operador_auditoria'])){
    
    $id_userop=$_POST['login_operador_auditoria'];
    
}elseif(!empty($_POST['login_operador_correcao'])){
    
    $id_userop=$_POST['login_operador_correcao'];
}
    
$sql_operador="SELECT * FROM cip_nv.tbl_usuarios  
               WHERE idtbl_usuario='$id_userop' ";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}   
    

foreach($_POST["ling"] as $id_cotacao)
{
      if($_POST['setor'] == 'Análise'){
    
                $sql_update1 = "UPDATE cip_nv.tbl_analise SET
		                dt_distribuicao = '$dt_distribuicao',
	                        idtbl_usuario_analise = '{$_POST['login_operador_analise']}'
	                        WHERE id_cotacao = $id_cotacao";
	        $acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());
                   
        echo "<script type=\"text/javascript\">
            alert('Cota\xE7\xF5es distribuidos para o login: $nome'); 
            alert('Data/Hora Da Distribui\xE7\xE3o: $dt_distribuicao2');	
            window.close();
            </script>"; 
      	exit(); 
     
      }elseif($_POST['setor'] == 'Input'){

            $sql_update1 = "UPDATE cip_nv.tbl_input SET 
                            status_cip_input=8,
                            disc_status_cip_input='Distribuido',
		            dt_distribuicao = '$dt_distribuicao',
		            idtbl_usuario_input = '{$_POST['login_operador_input']}',
                            setor='Input'
		   WHERE id_cotacao = $id_cotacao";
	


	
           $acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());
   
          
         
              echo "<script type=\"text/javascript\">
                   alert('Cota\xE7\xF5es distribuidos para o login: $nome'); 
	               alert('Data/Hora Da Distribui\xE7\xE3o: $dt_distribuicao2');	
	               window.close();
                  </script>"; 
            	exit(); 
                 
       }elseif($_POST['setor'] == 'Auditoria'){

           $sql_update1 = "UPDATE cip_nv.tbl_auditoria SET
                    status_cip_auditoria=14,
                    disc_status_cip_auditoria='Distribuido',
		    dt_distribuicao = '$dt_distribuicao',
		    idtbl_usuario_auditoria = '{$_POST['login_operador_auditoria']}',
                    setor='Auditoria'   
		    WHERE id_cotacao = $id_cotacao";  
                       
           $acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());    
    
    
            echo "<script type=\"text/javascript\">
                     alert('Cota\xE7\xF5es distribuidos para o login: $nome'); 
	              alert('Data/Hora Da Distribui\xE7\xE3o: $dt_distribuicao2');	
	              window.close();
                  </script>"; 
            	exit();
          
      }elseif($_POST['setor'] == 'Correcao'){

        $sql_update1 = "UPDATE cip_nv.tbl_correcao SET
                      status_cip_correcao=21,
                      disc_status_cip_correcao='Distribuido',
         	      dt_distribuicao = '$dt_distribuicao',
                      idtbl_usuario_correcao ='{$_POST['login_operador_correcao']}',
                      setor='Correcao'
		      WHERE id_cotacao = $id_cotacao";
	
           $acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());    
    
    
     
        
        
            echo "<script type=\"text/javascript\">
                  alert('Cota\xE7\xF5es distribuidos para o login: $nome'); 
	              alert('Data/Hora Da Distribui\xE7\xE3o: $dt_distribuicao2');	
	              window.close();
                  </script>"; 
            	exit(); 
                
         }        
  }
}
      

 mysql_free_result($result,$acao_op,$acao_update1,$acao_valida,$acao_valida9);
 mysql_close($conecta);


?>	


</body>
</html>