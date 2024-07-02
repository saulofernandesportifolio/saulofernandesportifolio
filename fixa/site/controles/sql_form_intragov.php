<?php
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoIntragov.php';
require_once '../fixa/site/classes/Produto.php';
include("../fixa/bd.php");
$tempo = 0;
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
$data_cadastro=date("Y-m-d H:i:s");
?>

<?php
     
    $cripto = new cripto();
    //parametros
    $id_usuario     = $_POST['id_usuario']; 
    $id_usuario     = $cripto->decodificar($id_usuario);
    $id_solicitacao = $_POST['id_solicitacao'];
    $revisao        = $_POST['revisao'];
  
    $SolicitacaoIntragovOperador = new SolicitacaoIntragov();
    $SolicitacaoIntragovOperador->data_recebimento  = $SolicitacaoIntragovOperador->buscaDataRecebimentoSolicitacao($id_solicitacao,$id_usuario,$revisao);
    $SolicitacaoIntragovOperador->id_solicitacao = $id_solicitacao;
    $SolicitacaoIntragovOperador->revisao = $revisao;
    $SolicitacaoIntragovOperador->id_usuario_intragov = $id_usuario;
?>

<?php

    //constroi dados de acordo com inputs do usuario
    $SolicitacaoIntragovOperador->constroiSolicitacaoIntragov($SolicitacaoIntragovOperador, $_POST['n_gs'], $_POST['devolucao'], $_POST['canal_entrada'], $_POST['produtoIntragov'], $_POST['servicoIntragov'], $_POST['qtd_acessos'], $_POST['cnpj'], $_POST['razao_social'], $_POST['data_abert_gestao'], $_POST['data_encerramento'], $_POST['status_solicitacao'], $data_cadastro, $_POST['complementoServicoIntragov'], $_POST['obs']);

     //valida campos obrigatórios
     $retornoValidacaoItensObrigatorios = $SolicitacaoIntragovOperador->validaCamposObrigatorios($SolicitacaoIntragovOperador);

     if($retornoValidacaoItensObrigatorios == 1)
     {
          echo" <script> 
              alert('Por favor preencher todos os campos obrigatórios !');
              history.back();
            </script>
            "; 
            exit();               
      }

      if($_POST['status_solicitacao'] == 15 && $_POST['data_encerramento'] == ""){
         echo" <script> 
              alert('Campo data de encerramento é obrigatório!');
              history.back();
            </script>
            "; 
            exit();     
      }


    //valida campos obrigatorios iniciados - devolucao
     if (isset($_POST['motivo_devolucao']) && isset($_POST['descricao_motivo_devolucao']) && isset($_POST['area_devolucao']) &&isset($_POST['data_devolucao']))
     {
          //caso haja algum em branco informa ao usuario se nao tiver manda dados ao objeto
          if($SolicitacaoIntragovOperador->validaItensDevolucao($_POST['motivo_devolucao'], $_POST['descricao_motivo_devolucao'], $_POST['area_devolucao'], $_POST['data_devolucao']) == 1)
          {
             echo" <script> 
              alert('Todos os campos de devolução devem ser preenchidos!');
              history.back();
            </script>"; 
            exit();  
          }
          else
          {
              $SolicitacaoIntragovOperador->motivo_devolucao           = $_POST['motivo_devolucao'];
              $SolicitacaoIntragovOperador->descricao_motivo_devolucao = $_POST['descricao_motivo_devolucao'];
              $SolicitacaoIntragovOperador->area_solicitante           = $_POST['area_devolucao'];
              $SolicitacaoIntragovOperador->data_devolucao             = $_POST['data_devolucao'];
              if(isset($_POST['motivo_cancelamento']))
              {
                  if($_POST['motivo_cancelamento'] == "")
                  {
                      echo" <script> 
                            alert('Campo motivo cancelamento deve ser preenchido!');
                            history.back();
                          </script>"; 
                          exit();  
                  } 
                  else
                  {
                      $SolicitacaoIntragovOperador->motivo_cancelamento = $_POST['motivo_cancelamento'];
                  }      
              }
          }  
     }

      //cria objeto Produto
      $Produto = new Produto();
      $Produto = $Produto->buscaProdutoById($Produto, $_POST['produtoIntragov']);

    //valida data se o item estiver entrando pela primeira vez
    if($_POST['solicitacaoNova'] == 1)
    {
        //valida data
        if($SolicitacaoIntragovOperador->validaDatas($SolicitacaoIntragovOperador) == 1)
        {
            echo" <script> 
                  alert('Data de abertura do GS deve ser maior ou igual a data de recebimento da solicita\u00e7\u00e3o!');
                  history.back();
                </script>"; 
                exit();  
        }

        if($_POST['devolucao'] == 'Nao')
        {
            if($SolicitacaoIntragovOperador->validaDatas($SolicitacaoIntragovOperador) == 2)
            {
               echo" <script> 
                      alert('Data de abertura do GS deve ser menor ou igual a data de encerramento!');
                      history.back();
                    </script>"; 
                    exit(); 
            }
        }
    }

    if(isset($_POST['data_pedido_cancelamento_cliente']))
    {
        $SolicitacaoIntragovOperador->data_pedido_cancelamento_cliente = $_POST['data_pedido_cancelamento_cliente'];
    }
    else
    {
        $SolicitacaoIntragovOperador->data_pedido_cancelamento_cliente = '';
    }

    //se serviço for retirada ou cancelamento data_pedido_cancelamento_cliente é obrigatório
    if($SolicitacaoIntragovOperador->servico_intragov == 'Retirada' || $SolicitacaoIntragovOperador->servico_intragov == 'Cancelamento')
    {
        if($SolicitacaoIntragovOperador->data_pedido_cancelamento_cliente == '')
        {
           echo" <script> 
                alert('Data do pedido de cancelamento do cliente deve ser preenchido');
                history.back();
              </script>"; 
              exit();  
        }
    } 


     //valida se gs nao esta associdado a outro protocolo
    if($SolicitacaoIntragovOperador->n_gestao_servicos != 0)
    {
        if($SolicitacaoIntragovOperador->validaGsProtocolo($SolicitacaoIntragovOperador) != '')
        {
            echo" <script> 
                      alert('Este gs está associado ao protocolo: " . $SolicitacaoIntragovOperador->validaGsProtocolo($SolicitacaoIntragovOperador) . "');
                      history.back();
                    </script>"; 
                    exit();  
        }
    }

    //insere dados em variavel para proc
    $dadosProc = '&'. str_replace("&","E",$SolicitacaoIntragovOperador->id_usuario_intragov) 
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->data_recebimento)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->devolucao)  
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->id_canal_entrada)
               . '&'. str_replace("&","E",$Produto->id_produto)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->servico_intragov)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->complemento_servico) 
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->qtd_acessos )              
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->motivo_cancelamento)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->cnpj) 
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->razao_social)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->n_gestao_servicos )     
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->data_abertura_gestao)  
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->motivo_devolucao)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->area_solicitante ) 
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->data_devolucao)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->data_encerramento)     
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->status)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->reg_dt_entrada)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->revisao)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->descricao_motivo_devolucao)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->obs)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->id_solicitacao)
               . '&'. str_replace("&","E",$SolicitacaoIntragovOperador->data_pedido_cancelamento_cliente);       
 


    $sql_exec="CALL solicitacao_intragov('$dadosProc');";

    $acao_exec= mysql_query($sql_exec) or die (mysql_error());

  echo" <script> 
    alert('Solicitação cadastrada com sucesso!');
       document.location.href='principal.php?id=" . $cripto->codificar($id_usuario) . "&t=views/home.php'
    </script>
    ";
                                      
    exit();
   
?>


