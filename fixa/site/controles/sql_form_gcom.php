<?php
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoGcom.php';
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

    $SolicitacaoGcomOperador = new SolicitacaoGcom();
    $SolicitacaoGcomOperador->data_receb_documento  = $SolicitacaoGcomOperador->buscaDataRecebimentoSolicitacao($id_solicitacao,$id_usuario,$revisao);
    $SolicitacaoGcomOperador->id_solicitacao = $id_solicitacao;
    $SolicitacaoGcomOperador->revisao = $revisao;
    $SolicitacaoGcomOperador->id_usuario_Gcom = $id_usuario;
?>

<?php
 //constroi dados de acordo com inputs do usuario
    $SolicitacaoGcomOperador->constroiSolicitacaoGcom($SolicitacaoGcomOperador, $_POST['n_gs'], $_POST['tipo_entrada'], $_POST['contrato_mae'], $_POST['data_assinatura_doc'], $_POST['n_documento'], $_POST['sistema_validacao'], $_POST['n_vantive'], $_POST['produto'], $_POST['data_tratativa'], $_POST['nome_solicitante'], $_POST['numero_wcd'], $_POST['razao_social'], $_POST['cnpj'], $_POST['plano_solicitado'], $_POST['qtde_acesso'], $_POST['data_encerramento'], $data_cadastro, $_POST['devolucao'], $_POST['aprovacao'],$_POST['status_solicitacao'], $_POST['data_assinatura_contrato'], $_POST['qtd_contrato_analisados']);

     //valida campos obrigatórios
     $retornoValidacaoItensObrigatorios = $SolicitacaoGcomOperador->validaCamposObrigatorios($SolicitacaoGcomOperador);

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
            if($SolicitacaoGcomOperador->validaItensDevolucao($_POST['motivo_devolucao'], $_POST['descricao_motivo_devolucao'], $_POST['area_devolucao'], $_POST['data_devolucao']) == 1)
            {
               echo" <script> 
                alert('Todos os campos de devolução devem ser preenchidos!');
                history.back();
              </script>"; 
              exit();  
            }
            else
            {

                $SolicitacaoGcomOperador->motivo_devolucao           = $_POST['motivo_devolucao'];
                $SolicitacaoGcomOperador->descricao_motivo_devolucao = $_POST['descricao_motivo_devolucao'];
                $SolicitacaoGcomOperador->area_devolucao             = $_POST['area_devolucao'];
                $SolicitacaoGcomOperador->data_devolucao             = $_POST['data_devolucao'];
            }  
       }

    //valida data se o item estiver entrando pela primeira vez
    if($_POST['solicitacaoNova'] == 1)
    {
         //valida data
        if($SolicitacaoGcomOperador->validaDatas($SolicitacaoGcomOperador) == 1)
        {
            echo" <script> 
                  alert('Data de tratativa deve ser maior ou igual a data de recebimento do documento!');
                  history.back();
                </script>"; 
                exit();  
        }
        else if($SolicitacaoGcomOperador->validaDatas($SolicitacaoGcomOperador) == 2)
        {
            echo" <script> 
                  alert('Data de encerramento deve ser maior ou igual a data de recebimento do documento!');
                  history.back();
                </script>"; 
                exit();  
        }
    }    

    //valida se gs nao esta associdado a outro protocolo
    if($SolicitacaoGcomOperador->n_gestao_servicos != 0)
    {
        if($SolicitacaoGcomOperador->validaGsProtocolo($SolicitacaoGcomOperador) != '')
        {
            echo" <script> 
                      alert('Este gs está associado ao protocolo: " . $SolicitacaoGcomOperador->validaGsProtocolo($SolicitacaoGcomOperador) . "');
                      history.back();
                    </script>"; 
                    exit();  
        }
    }
   

    //insere dados em variavel para proc
    $dadosProc = '&'. str_replace("&","E",$SolicitacaoGcomOperador->id_usuario_Gcom)  
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->data_receb_documento)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->tipo_entrada)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->id_contrato_mae)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->data_assinatura_doc) 
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->numero_documento)       
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->id_sistema_validacao)  
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->n_vantive)      
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->id_produto)         
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->data_tratativa)    
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->nome_solicitante)   
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->n_gestao_servicos)        
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->numero_wcd)       
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->razao_social)       
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->cnpj)           
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->plano_solicitado)        
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->qtde_acesso)         
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->data_encerramento)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->reg_dt_entrada)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->revisao)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->id_solicitacao)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->motivo_devolucao)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->descricao_motivo_devolucao)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->area_devolucao)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->data_devolucao)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->devolucao)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->aprovacao)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->status_solicitacao)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->data_assinatura_contrato)
               . '&'. str_replace("&","E",$SolicitacaoGcomOperador->qtd_contrato_analisados);      
 
    $sql_exec="CALL solicitacao_gcom('$dadosProc');";

    $acao_exec= mysql_query($sql_exec) or die (mysql_error());

  echo" <script> 
    alert('Solicitação cadastrada com sucesso!');
       document.location.href='principal.php?id=" . $cripto->codificar($id_usuario) . "&t=views/home.php'
    </script>
    ";
                                      
    exit();
   
?>
