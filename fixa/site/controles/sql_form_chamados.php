<?php
include("../fixa/bd.php");
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/Chamados.php';
$tempo = 0;
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
$data_cadastro=date("Y-m-d H:i:s");

$cripto = new cripto();
$Chamados = new Chamados();
?>

<?php
    $protocolo        =  $_POST['protocolo'];
    $usuario_chamado  =  $_POST['usuario_chamado'];
    $usuario_chamado  =  $cripto->decodificar($usuario_chamado);
    $revisao          =  $_POST['revisao'];
    $situacao         =  $_POST['situacao'];
    $nro_chamado      =  $_POST['nro_chamado'];  

?>

<?php

   if($situacao == "Pendente de Ação"){
      
        if(isset($_POST['descricao_motivo_devolucao_chamados'])){
          $descricao_motivo_devolucao = $_POST['descricao_motivo_devolucao_chamados'];
        }else{
          $descricao_motivo_devolucao =  '';
        }

        //solicitacao nova
         $Chamados->constroiChamados($Chamados, $protocolo, $_POST['numero_chamado'], $_POST['sistema_chamado'], $_POST['motivo_devolucao_chamado'], $descricao_motivo_devolucao, $_POST['status_solicitacao'], $data_cadastro, $usuario_chamado, $revisao, $_POST['obs'], $_POST['comentario_chamado']);

        if($_POST['status_solicitacao'] == 16)
        {
            //valida campos obrigatórios
            if($Chamados->validaCamposObrigatorios($Chamados) == 1)
            {
                    echo" <script> 
                            alert('Por favor preencher todos os campos obrigatórios !');
                            history.back();
                          </script>
                          "; 
                          exit();   
            }
        }
  }else if($situacao == "Ag. TI"){
      //chamado ja existente
      $Chamados = $Chamados->buscaChamadoExistente($Chamados,$protocolo,$nro_chamado, $revisao);
      
      if(isset($_POST['dataRetornoTI']) || isset($_POST['parecerTI']) || isset($_POST['status_solicitacao_retorno']))
      {
          //insere dados novos de ti
          $Chamados->dataRetornoTi = $_POST['dataRetornoTI'];
          $Chamados->parecerTi = $_POST['parecerTI'];
          $Chamados->status = $_POST['status_solicitacao_retorno'];


          //valida campos obrigatorios
          if($Chamados->validaDadosTI($Chamados) == 1)
          {
                  echo" <script> 
                          alert('Por favor preencher todos os campos obrigatórios !');
                          history.back();
                        </script>
                        "; 
                        exit();   
          }
      }

      $Chamados->comentario_chamado = $_POST['comentario_chamado'];
  }
   
   //busca fase que a solicitacao parou
    $fase = $Chamados->verificaFaseSolicitacao($protocolo, $revisao);
   
    //insere dados em variavel para proc
    $dadosProc = '&'. str_replace("&","E", $Chamados->id_solicitacao)
               . '&'. str_replace("&","E", $Chamados->nro_chamado)
               . '&'. str_replace("&","E", $Chamados->sistema)
               . '&'. str_replace("&","E", $Chamados->motivo_devolucao)
               . '&'. str_replace("&","E", $Chamados->descricao_motivo_devolucao)
               . '&'. str_replace("&","E", $Chamados->status)
               . '&'. str_replace("&","E", $data_cadastro)
               . '&'. str_replace("&","E", $Chamados->reg_usuario)
               . '&'. str_replace("&","E", $Chamados->revisao)
               . '&'. str_replace("&","E", $Chamados->obs)
               . '&'. str_replace("&","E", $Chamados->dataRetornoTi)
               . '&'. str_replace("&","E", $Chamados->parecerTi)
               . '&'. str_replace("&","E", $fase)
               . '&'. str_replace("&","E", $Chamados->comentario_chamado);

    $sql_exec="CALL solicitacao_chamados('$dadosProc');";

     $acao_exec= mysql_query($sql_exec) or die (mysql_error());


   if($_POST['status_solicitacao'] == 16)
   {
      echo" <script> 
        alert('Chamado atualizado com sucesso!');
           document.location.href='principal.php?id=" . $cripto->codificar($usuario_chamado) . "&t=views/home.php'
        </script>
        ";
   }else{
       echo" <script> 
        alert('Solicitação habilitada para entrar no sistema novamente!');
           document.location.href='principal.php?id=" . $cripto->codificar($usuario_chamado) . "&t=views/home.php'
        </script>
        ";
   }                                       
    exit();

   
?>