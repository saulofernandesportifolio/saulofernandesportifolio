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


  
  
       $usuario_op="SELECT * FROM cip_nv.ativos WHERE id ='$id'";
       $acao_op=mysql_query($usuario_op,$conecta);
       while($linha_user = mysql_fetch_assoc($acao_op)) 
       {
	     $id            = $linha_user["id"];
       $nome_completo = $linha_user["nome_completo"];
	     $login	        = $linha_user["login"];
       $cpf		        = $linha_user["CPF"];
	
  
  
  
        //Monta SQL para INSERT
       $sql_inserir ="INSERT INTO cip_nv.tbl_usuarios(usuario,
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
                                                id_ativos)VALUES('$login',
                                                                'empreza',
                                                         '$nome_completo',
                                                 '{$_POST['setor_user']}',
                                                           '$disc_perfil',
                                                                     NULL,
                                                                      '0',
                                                       '$dt_distribuicao',
                                                                      '1',
                                                                   '$cpf',
                                            '{$_POST['supervisor_user']}',
                                                                    'VPE',
                                                                     NULL,
                                                 '{$_POST['turno_user']}',
                                                                    '$id'                                                                 
                                                                         )";
               $result = mysql_query($sql_inserir,$conecta) or die(mysql_error()); 
           }
              $sql_update ="UPDATE cip_nv.ativos 
                      SET fila=1 
                      WHERE id='$id' ";
              $result1 = mysql_query($sql_update,$conecta) or die(mysql_error());  

          
       }
    
           echo "<script>alert('Criado com sucesso!'); 
              alert('Login padrão CPF do colaborador!');
              alert('Senha: empreza!');  
	          document.location.replace('principal.php?t=forms/formmostra_usuarios.php');
            </script>\n";
	       exit;
  

}



 mysql_free_result($result,$acao_op);
 mysql_close($conecta);

?>	


</body>
</html>