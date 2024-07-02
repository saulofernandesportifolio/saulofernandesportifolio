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
 
  /*if($_POST['setor_user'] == 1){
    
     $disc_perfil="Supervisor";
     $tipo="%";   
    
     }*/

    $nome = strtoupper($_POST['nome']);      
/*
$sql_adabas="SELECT count(A.CPF) as total FROM ativos A 
             INNER JOIN tbl_usuarios B ON A.CPF= B.cpf
             WHERE B.cpf ='{$_POST['cpf']}' ";
$acao_adabas = mysql_query($sql_adabas) or die (mysql_error());
$count = mysql_fetch_array($acao_adabas);
$num=$count['total']; */
 

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
                                                                      '1',
                                                             'Supervisor',
                                                                     NULL,
                                                                      '0',
                                                       '$dt_distribuicao',
                                                                      '1',
                                                        '{$_POST['cpf']}',
                                            '{$_POST['supervisor_user']}',
                                                                      '%',
                                                                     NULL,
                                                 '{$_POST['turno_user']}',
                                                 '$regional1'        
                                                                         )";
     $result = mysql_query($sql_inserir,$conecta) or die(mysql_error()); 
       
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
