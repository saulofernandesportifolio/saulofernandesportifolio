<?php
  
  include("../fixa/bd.php");
  

  function arrumadata($string) {
      if($string == ''){
      $data= substr($string,8,2)."".substr($string,5,2)."".substr($string,0,4);   
          
      }else{
          
      $data= substr($string,8,2)."/".substr($string,5,2)."/".substr($string,0,4);   
      }

      return $data;
  }


  function arrumadatahora($string2) {
      
      if($string2 == ''){
      $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
         }else{
          
        $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
          
         }
      return $data2;
  }


  function validaCpf($cpf_usuario, $idusuario){
        //busca cpf
        $checkInfo = mysql_query("SELECT cpf FROM usuario WHERE id_usuario = '$idusuario'");

        while($row_user=mysql_fetch_array($checkInfo)){ 
           $cpf  = $row_user['cpf'];
        }

        //verifica se usuario alterou cpf
        if($cpf_usuario != $cpf){

            //valida cpf novo
            $query_valida_cpf = mysql_query("SELECT cpf FROM usuario WHERE cpf = '$cpf_usuario'");

            if(mysql_affected_rows() > 0){

               echo" <script> 
                      alert('CPF já cadastrado na base de dados !');
                      history.back();
                    </script>
                    "; 
                  exit();   
            }
        }
  }

  function atualizaSupervisor($perfil_post, $nome_post, $cpf_post,  $idusuario){
  
      //busca informacoes supervisor
      $buscaInfoSup = mysql_query("SELECT id_supervisor FROM supervisor WHERE id_usuario = '$idusuario'");

      while($row_data=mysql_fetch_array($buscaInfoSup)){ 
         $id_supervisor  = $row_data['id_supervisor'];
      }

      //atualiza informações caso usuario deixe de ser supervisor
      if($perfil_post != 3){

        //usuario que respodiam a supervisor removido ficam o status de supervisor não informado
        $sql_atualiza_dados = "UPDATE usuario SET id_supervisor = 1  WHERE id_supervisor = $id_supervisor";

        $executa_query= mysql_query($sql_atualiza_dados) or die (mysql_error());

        //deleta supervisor da tabela de supervisores
        $sql_atualiza_dados_sup = "DELETE FROM supervisor WHERE id_supervisor = $id_supervisor";
        $executa_query_sup= mysql_query($sql_atualiza_dados_sup) or die (mysql_error());
      }else{

           $sql_atualiza_supervisor = "UPDATE Supervisor
                                       SET 
                                          nome = '$nome_post' 
                                          ,cpf  = '$cpf_post'
                                      WHERE id_usuario = $idusuario";  
       
          $acao_insere_sup= mysql_query($sql_atualiza_supervisor) or die (mysql_error());
      }                         
  }

  function criaNovoSupervisor($nome_post, $cpf_post, $idusuario){

      $sql_insere_supervisor = ("INSERT INTO Supervisor(nome, cpf, id_usuario)
                                VALUES('$nome_post', '$cpf_post', $idusuario)");

       $executa_query_sup= mysql_query($sql_insere_supervisor) or die (mysql_error());
  }

  function criptografaId(){

    require_once '../fixa/site/classes/cripto.php';

    $cripto = new cripto();

    $id_usuario= $_GET['id'];

    $id_usuario = $cripto->decodificar($id_usuario);
  }

  function formataDataBD($data){

    if($data != ""){
      //FORMATAR DATA
      $data = explode("/", $data);
      $dia = $data[0];
      $mes = $data[1];
      $ano = $data[2];

      $data = $ano . '-' . $mes . '-' . $dia;
    }else{
      $data = "";
    }

    return $data;

  }

   


?>