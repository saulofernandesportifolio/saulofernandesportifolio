<?php
include("../fixa/bd.php");
include("../fixa/site/funcoes/f_geral.php");
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoTramitacao.php';

$tempo = 0;
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
$data_cadastro=date("Y-m-d H:i:s");
?>

<?php
    $id_usuario     =  $_POST['id_usuario'];
    $id_solicitacao =  $_POST['id_solicitacao'];
    $id_usuario     =  $cripto->decodificar($id_usuario);   
    $revisao        =  $_POST['revisao'];

?>

<?php
    $cripto = new cripto();
    $SolicitacaoTramitacao = new SolicitacaoTramitacao();

    //constroi solicitacao
    $SolicitacaoTramitacao->constroiSolicitacaoTramitacao($SolicitacaoTramitacao, $id_usuario, $id_solicitacao, $_POST['devolucao'], $_POST['status_solicitacao'], $_POST['aprovacao'], $_POST['data_encerramento'], $_POST['n_oport_proposta'], $_POST['obs'], $data_cadastro);

    //valida campos obrigatórios
    if($SolicitacaoTramitacao->validaCamposObrigatorios($SolicitacaoTramitacao) == 1)
    {
            echo" <script> 
                    alert('Por favor preencher todos os campos obrigatórios !');
                    history.back();
                  </script>
                  "; 
                  exit();   
    }
   
   
    //valida campos obrigatorios iniciados - devolucao
     if (isset($_POST['motivo_devolucao']) && isset($_POST['descricao_motivo_devolucao']) && isset($_POST['area_devolucao']) &&isset($_POST['data_devolucao']))
     {
          //caso haja algum em branco informa ao usuario se nao tiver manda dados ao objeto
          if($SolicitacaoTramitacao->validaItensDevolucao($_POST['motivo_devolucao'], $_POST['descricao_motivo_devolucao'], $_POST['area_devolucao'], $_POST['data_devolucao']) == 1)
          {
             echo" <script> 
              alert('Todos os campos de devolução devem ser preenchidos!');
              history.back();
            </script>"; 
            exit();  
          }
          else
          {
              $SolicitacaoTramitacao->motivo_devolucao           = $_POST['motivo_devolucao'];
              $SolicitacaoTramitacao->descricao_motivo_devolucao = $_POST['descricao_motivo_devolucao'];
              $SolicitacaoTramitacao->area_devolucao             = $_POST['area_devolucao'];
              $SolicitacaoTramitacao->data_devolucao             = $_POST['data_devolucao'];
              if(isset($_POST['chamado_remedy']))
              {
                $SolicitacaoTramitacao->chamado_remedy           = $_POST['chamado_remedy'];
              }
              else
              {
                  $SolicitacaoTramitacao->chamado_remedy         = '';
              }
          }  
     }

    //busca revisao
    $SolicitacaoTramitacao->revisao = $revisao;
    
    //busca informacoes ja inseridas na fase de pretramitacao
    $SolicitacaoTramitacao = $SolicitacaoTramitacao->buscaObjetoByIdsolicitacao($SolicitacaoTramitacao, $SolicitacaoTramitacao->id_solicitacao, $revisao);


    if($_POST['devolucao'] == 'Nao')
    {
      if($SolicitacaoTramitacao->data_encerramento != "")
      {
          //valida data
          if($SolicitacaoTramitacao->validaDatas($SolicitacaoTramitacao) == 1)
          {
              echo" <script> 
                    alert('Data de encerramento deve ser maior ou igual a data de abertura do GS!');
                    history.back();
                  </script>"; 
                  exit();  
          }
      }
    }

    //insere dados em variavel para proc
    $dadosProc = '&'. str_replace("&","E",$SolicitacaoTramitacao->id_usuario_tramitacao)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->id_solicitacao)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->data_encerramento)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->id_status_solic_tramitacao)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->data_devolucao)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->devolucao)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->aprovado)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->reg_dt_entrada)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->n_oportunidade_propostas)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->obs)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->cat_produto)            
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->id_canal_entrada)         
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->id_produto)              
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->tipo_solicitacao)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->complemento_tipo_solicitacao )             
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->cnpj)                    
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->razao_social)             
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->qtd_acessos)              
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->n_gestao_servicos)       
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->data_abertura_gestao)     
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->data_entrada_siscom)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->chamado_remedy)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->revisao)
               . '&'. str_replace("&","E",$SolicitacaoTramitacao->data_pedido_cancelamento_cliente);      

   
    $sql_exec="CALL solicitacao_tramitacao('$dadosProc');";

    $acao_exec= mysql_query($sql_exec) or die (mysql_error());

   
      echo" <script> 
        alert('Solicitação cadastrada com sucesso!');
           document.location.href='principal.php?id=" . $cripto->codificar($id_usuario) . "&t=views/home.php'
        </script>
        ";                                       
    exit();
   
?>