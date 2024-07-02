<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("Y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  

$_POST["ling"];

if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhum usuario selecionado.'); window.history.go(-1); </script>\n";
	exit;
}
if($_POST['setor_user'] == '0'){ 

echo "<script>alert('Por favor selecionar o setor.'); window.history.go(-1); </script>\n";
	exit;

}
if($_POST['turno_user'] == '0'){ 

echo "<script>alert('Por favor selecionar o turno.'); window.history.go(-1); </script>\n";
	exit;

}
else
{
   
 

  foreach($_POST["ling"] as $id)
  {


    $id ."-"." ";


   if($_POST['setor_user'] == 1){
    
     $disc_perfil="Supervisor";   
    
     }
    if($_POST['setor_user'] == 2){
    
     $disc_perfil="Análise";   
    
     }   
     if($_POST['setor_user'] == 3){
    
      $disc_perfil="Input";   
    
     }     
     if($_POST['setor_user'] == 5){
    
     $disc_perfil="Auditoria";   
    
     }     
     if($_POST['setor_user'] == 6){
    
     $disc_perfil="Correção";   
    
     }
      if($_POST['setor_user'] == 12){
    
       $disc_perfil="Analise/Auditoria"; 
 
        
       }   
	   
	   if($_POST['setor_user'] == 13){
    
       $disc_perfil="Chamado"; 
              
       }

       if($_POST['setor_user'] == 14){
    
       $disc_perfil="Contestacao"; 
         
       }

       if($_POST['setor_user'] == 15){
    
       $disc_perfil="Diretoria"; 
        
       }


       if($_POST['setor_user'] == 16){
    
       $disc_perfil="Portabilidade"; 
        
       }
       
       
       if($_POST['setor_user'] == 17){
    
       $disc_perfil="Erros-TT"; 

       }


       if($_POST['setor_user'] == 18){
    
       $disc_perfil="Analista-lider"; 
        
       }

       if($_POST['setor_user'] == 19){
    
       $disc_perfil="Erros"; 
            
       }

       if($_POST['setor_user'] == 20){
    
       $disc_perfil="Swap"; 
            
       }

       if($_POST['setor_user'] == 21){
    
       $disc_perfil="Coordenador"; 
            
       }


       if($_POST['setor_user'] == 22){
    
       $disc_perfil="Instrutor"; 
            
       }

       if($_POST['setor_user'] == 23){
    
       $disc_perfil="Desenvolvimento"; 
            
       }

        //Monta SQL para update
       $sql_update ="UPDATE cip_nv.tbl_usuarios 
                      SET 
                      perfil        ='{$_POST['setor_user']}',
                      disc_perfil   ='$disc_perfil',
                      id_supervisor ='{$_POST['supervisor_user']}',
                      turno         = '{$_POST['turno_user']}',
                      data_atualizacao_perfil='$dt_distribuicao',
                      usuario_atualizacao_perfil='{$_POST['nome_atualiza_perfil']}' 
                     WHERE idtbl_usuario='$id' ";
       $result = mysql_query($sql_update,$conecta) or die(mysql_error()); 
   }
    
           echo "<script>alert('Alterado com sucesso!'); 
                document.location.replace('principal.php?t=forms/formfiltro_edita_usuario.php');
                       </script>\n";
     	exit; 

} 


mysql_free_result($result);
mysql_close($conecta);


?>	


</body>
</html>