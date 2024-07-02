<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("Y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  




if($_POST['nome'] == '0'){ 

echo "<script>alert('Por favor preencher o nome.'); window.history.go(-1); </script>\n";
	exit;

}
if($_POST['cpf'] == '0'){ 

echo "<script>alert('Por favor preencher o cpf.'); window.history.go(-1); </script>\n";
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
 
  if($_POST['setor_user'] == 1){
    
     $disc_perfil="Supervisor";
     $tipo="%";   
    
     }

       if($_POST['setor_user'] == 2){
    
       $disc_perfil="Análise";
       $tipo="%";    
    
       }   
       if($_POST['setor_user'] == 3){
    
       $disc_perfil="Input";
       $tipo="%";    
    
       }     
       if($_POST['setor_user'] == 5){
    
       $disc_perfil="Auditoria";
       $tipo="%";    
    
       }     
       if($_POST['setor_user'] == 6){
    
       $disc_perfil="Correção"; 
       $tipo="%";   
    
       }
       
        if($_POST['setor_user'] == 12){
    
       $disc_perfil="Analise/Auditoria"; 
      $tipo="%"; 
        
       }
       if($_POST['setor_user'] == 13){
    
       $disc_perfil="Chamado"; 
      $tipo="%"; 
        
       }
       
       
       
    /*  if($_POST['setor_user'] == 7){
    
     $disc_perfil="Supervisor";
     $tipo="VPE";   
    
     }

       if($_POST['setor_user'] == 8){
    
       $disc_perfil="Análise";
       $tipo="VPE";    
    
       }   
       if($_POST['setor_user'] == 9){
    
       $disc_perfil="Input";
       $tipo="VPE";    
    
       }     
       if($_POST['setor_user'] == 10){
    
       $disc_perfil="Auditoria";
       $tipo="VPE";    
    
       }     
       if($_POST['setor_user'] == 11){
    
       $disc_perfil="Correção"; 
       $tipo="VPE"; 
        
       }*/  
    $nome = strtoupper($_POST['nome']);      

$sql_adabas="SELECT count(A.CPF) as total FROM ativos A 
             INNER JOIN tbl_usuarios B ON A.CPF= B.cpf
             WHERE B.cpf ='{$_POST['cpf']}' ";
$acao_adabas = mysql_query($sql_adabas) or die (mysql_error());
$count = mysql_fetch_array($acao_adabas);
$num=$count['total']; 
 
  
  if($num == 0){
        //Monta SQL para INSERT
       $sql_inserir ="INSERT INTO tbl_usuarios(    
                                                   senha,
                                                    nome,
                                                  perfil,
                                             disc_perfil,
                                                situacao,
                                                  logado,
                                           data_cadastro,
                                                  status,
                                                     cpf,
                                           id_supervisor,
                                                 tramite,
                                               situacao2,
                                                   turno)VALUES(
                                                                'empreza',
                                                                  '$nome',
                                                 '{$_POST['setor_user']}',
                                                           '$disc_perfil',
                                                                     NULL,
                                                                      '0',
                                                       '$dt_distribuicao',
                                                                      '1',
                                                                   '$cpf',
                                            '{$_POST['supervisor_user']}',
                                                                    '$tipo',
                                                                     NULL,
                                                 '{$_POST['turno_user']}'                                                                
                                                                         )";
               $result = mysql_query($sql_inserir) or die(mysql_error()); 
       
      }
          
    if($num == 0){
    
           echo "<script>alert('Criado com sucesso!'); 
              alert('Login padrão CPF do colaborador!');
              alert('Senha: empreza!');  
	          document.location.replace('principal.php?t=forms/formmostra_usuarios_cadastro.php');
            </script>\n";
	       exit();
    }elseif($num > 0){
    echo "<script>
              alert('Colaborador já cadastrado na base !');
              document.location.replace('principal.php?t=forms/formmostra_usuarios_cadastro.php');
            </script>\n";
	       exit();
           
     }      
}
?>	


</body>
</html>