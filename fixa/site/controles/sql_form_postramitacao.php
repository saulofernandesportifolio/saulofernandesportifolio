<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("../fixa/bd.php");
include("../fixa/site/funcoes/f_geral.php");
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoPosTramitacao.php';
?>

<?php
$tempo = 0;
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
$data_cadastro=date("Y-m-d H:i:s");
?>

<?php
    $id_usuario     = $_POST['id_usuario']; 
    $id_usuario     = $cripto->decodificar($id_usuario);
    $id_solicitacao = $_POST['id_solicitacao'];
    $revisao        = $_POST['revisao'];

    $SolicitacaoPosTramitacao = new SolicitacaoPosTramitacao();
    $SolicitacaoPosTramitacao->constroiSolicitacaoPosTramitacao($SolicitacaoPosTramitacao, $id_usuario, $id_solicitacao, $_POST['oportunidade'], $_POST['proposta'], $_POST['contrato_mae'], $_POST['data_recebimento_pos'], $_POST['data_finalizado'], $_POST['obs'], $_POST['status_solicitacao_postramitacao'], $data_cadastro, $_POST['data_assinatura_contrato'], $_POST['qtd_contrato_analisados']);


    //valida campos obrigatórios
    if($SolicitacaoPosTramitacao->validaInputsObrigatorios($SolicitacaoPosTramitacao) == 1) 
    {
      echo" <script> 
              alert('Por favor preencher todos os campos obrigatórios !');
              history.back();
            </script>
            "; 
            exit();   
    }

    //valida campos obrigatorios iniciados - devolucao
    if(isset($_POST['motivo_devolucao']))
    {
        if($SolicitacaoPosTramitacao->validaItensDevolucao($_POST['motivo_devolucao']) == 1)
        {
           echo" <script> 
              alert('Por favor preencher o campos de devolução!');
              history.back();
            </script>
            "; 
            exit();  
        }
        else
        {
            $SolicitacaoPosTramitacao->motivo_devolucao = $_POST['motivo_devolucao'];
        }
    }
 
     //formata campos data
     //$SolicitacaoPosTramitacao->data_recebimento_pos = formataDataBD($SolicitacaoPosTramitacao->data_recebimento_pos);
     //$SolicitacaoPosTramitacao->data_finalizado      = formataDataBD($SolicitacaoPosTramitacao->data_finalizado);

     $SolicitacaoPosTramitacao->revisao =  $revisao;


     //busca dados ja cadastrados na fase de tramitacao(dados)
     $SolicitacaoPosTramitacao = $SolicitacaoPosTramitacao->buscaObjetoByIdSolicitacao($SolicitacaoPosTramitacao, $SolicitacaoPosTramitacao->id_solicitacao, $revisao);

    //valida data
    if($SolicitacaoPosTramitacao->validaDatas($SolicitacaoPosTramitacao) == 1)
    {
        echo" <script> 
              alert('Data finalizado deve ser maior ou igual a data de recebimento!');
              history.back();
            </script>"; 
            exit();  
    }


    //insere dados em variavel para proc
    $dadosProc = '&'. str_replace("&","E",$SolicitacaoPosTramitacao->id_solicitacao)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->id_usuario_pos_tramitacao)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->motivo_devolucao)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->oportunidade)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->proposta)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->contrato_mae)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->data_recebimento_pos)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->data_finalizado)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->obs)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->status)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->reg_dt_entrada)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->id_canal_entrada)  
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->id_produto)         
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->tipo_solicitacao)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->complemento_tipo_solicitacao)        
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->cnpj)          
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->razao_social)      
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->qtd_acessos)       
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->n_gestao_servicos) 
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->data_entrada_id_solicitacao)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->revisao)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->data_assinatura_contrato)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->qtd_contrato_analisados)
               . '&'. str_replace("&","E",$SolicitacaoPosTramitacao->data_pedido_cancelamento_cliente);

 
    $sql_exec="CALL solicitacao_postramitacao('$dadosProc');";

    $acao_exec= mysql_query($sql_exec) or die (mysql_error());

   
      echo" <script> 
        alert('Solicitação cadastrada com sucesso!');
           document.location.href='principal.php?id=" . $cripto->codificar($id_usuario) . "&t=views/home.php'
        </script>
        ";                                       
    exit();
   
?>

