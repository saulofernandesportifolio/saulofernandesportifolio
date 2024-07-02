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
       if($_POST['setor_user'] == 14){
    
       $disc_perfil="Contestacao"; 
       $tipo="%"; 
        
       }

       if($_POST['setor_user'] == 15){
    
       $disc_perfil="Diretoria"; 
       $tipo="%"; 
        
       }


       if($_POST['setor_user'] == 16){
    
       $disc_perfil="Portabilidade"; 
       $tipo="%"; 
        
       }
       
       
       if($_POST['setor_user'] == 17){
    
       $disc_perfil="Erros-TT"; 
       $tipo="%"; 
        
       }


       if($_POST['setor_user'] == 18){
    
       $disc_perfil="Analista-lider"; 
       $tipo="%"; 
        
       }

       if($_POST['setor_user'] == 19){
    
       $disc_perfil="Erros"; 
       $tipo="%"; 
       }

      if($_POST['setor_user'] == 20){
    
       $disc_perfil="Swap"; 
       $tipo="%"; 
        
       }

       if($_POST['setor_user'] == 22){
    
       $disc_perfil="Instrutor"; 
       $tipo="%"; 
        
       }

       if($_POST['setor_user'] == 23){
    
       $disc_perfil="Desenvolvimento"; 
       $tipo="%"; 
        
       }

    
    $nome = strtoupper($_POST['nome']);      

$sql_adabas="SELECT count(A.CPF) as total FROM cip_nv.tbl_usuarios A 
             INNER JOIN cip_nv.tbl_usuarios B ON A.CPF= B.cpf
             WHERE B.cpf ='{$_POST['cpf']}' ";
$acao_adabas = mysql_query($sql_adabas,$conecta) or die (mysql_error());
$count = mysql_fetch_array($acao_adabas);
$num=$count['total']; 
 
  
  if($num == 0){

     $sqlv="SELECT * FROM cip_nv.tbl_coordenador WHERE id='{$_POST['supervisor_user']}' ";
     $resultv = mysql_query($sqlv,$conecta) or die(mysql_error());
     $dado=mysql_fetch_array($resultv);
     $regional1=$dado['regional'];


        //Monta SQL para INSERT
        $sql_inserir ="INSERT INTO cip_nv.tbl_usuarios(    
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
                                                   turno,
                                                   regional)VALUES(
                                                                'atento',
                                                                  '$nome',
                                                 '{$_POST['setor_user']}',
                                                           '$disc_perfil',
                                                                     NULL,
                                                                      '0',
                                                       '$dt_distribuicao',
                                                                      '1',
                                                        '{$_POST['cpf']}',
                                            '{$_POST['supervisor_user']}',
                                                                  '$tipo',
                                                                     NULL,
                                                 '{$_POST['turno_user']}',
                                                 '$regional1'                               
                                                                         )";
               $result = mysql_query($sql_inserir,$conecta) or die(mysql_error()); 
       
      }

  if($num == 0 && $_POST['setor_user'] == 16 || $num == 0 && $_POST['setor_user'] == 19 ){


//Arquivo para conexão com a base de daddos 

$host_vpg = "10.119.243.217";
$user_bd_vpg = "root";
$senha_bd_vpg = "atento";
//$senha_bd = "";
$base_dados_vpg = "cip_nv";

//Realizando a conexão com o banco de dados

$conecta_vpg = mysql_connect ($host_vpg, $user_bd_vpg, $senha_bd_vpg) or die ("Erro de conexao com o banco de dados, por favor entre em contato com a area de desenvolvimento B.I");

//Seleciona a base de dados

$banco_dados_vpg = mysql_select_db($base_dados_vpg, $conecta_vpg) or die ("Erro de conexao com a base de dados, por favor entre em contato com a area de desenvolvimento B.I");


$sql_adabas_vpg ="SELECT count(A.CPF) as total FROM cip_nv.tbl_usuarios A 
             INNER JOIN cip_nv.tbl_usuarios B ON A.CPF= B.cpf
             WHERE B.cpf ='{$_POST['cpf']}' ";
$acao_adabas_vpg = mysql_query($sql_adabas_vpg,$conecta_vpg) or die (mysql_error());
$count_vpg = mysql_fetch_array($acao_adabas_vpg);
$num_vpg=$count_vpg['total']; 

if($num_vpg == 0){
     $sqlv="SELECT * FROM cip_nv.tbl_coordenador WHERE id='{$_POST['supervisor_user']}' ";
     $resultv = mysql_query($sqlv,$conecta) or die(mysql_error());
     $dado=mysql_fetch_array($resultv);
     $regional1=$dado['regional'];
   
        //Monta SQL para INSERT
      $sql_inserir_vpg ="INSERT INTO cip_nv.tbl_usuarios(    
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
                                                   turno,
                                                   regional)VALUES(
                                                                'atento',
                                                                  '$nome',
                                                 '{$_POST['setor_user']}',
                                                           '$disc_perfil',
                                                                     NULL,
                                                                      '0',
                                                       '$dt_distribuicao',
                                                                      '1',
                                                        '{$_POST['cpf']}',
                                            '{$_POST['supervisor_user']}',
                                                                  '$tipo',
                                                                     NULL,
                                                 '{$_POST['turno_user']}',
                                                 '{$_POST['regional']}'
                                                   )";
               $result_vpg = mysql_query($sql_inserir_vpg,$conecta_vpg) or die(mysql_error()); 

         }      
       
      }



          
    if($num == 0){
    
           echo "<script>alert('Criado com sucesso!'); 
              alert('Login padrão CPF do colaborador!');
              alert('Senha: atento');  
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


 mysql_free_result($result,$acao_adabas);
 mysql_close($conecta);

	
?>	


</body>
</html>
