<?php
require_once '../fixa/site/classes/cripto.php';
require_once '../fixa/site/classes/SolicitacaoPreTramitacao.php';
require_once '../fixa/site/classes/Produto.php';
include("../fixa/site/funcoes/f_geral.php");
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
    $acao           = $_POST['acao'];
    $fonte          = $_POST['fonte'];
    
    /*****SOLICITAÇÃO MANUAL******/ 
    if($acao == 'nfm')
    {
         //cria objeto com todos os inputs do usuario
         $SolicitacaoPreTramitacaoManual = new SolicitacaoPreTramitacao();

         //passa para o objeto id solicitacao e id do usuario e revisao da solicitacao
         $SolicitacaoPreTramitacaoManual->id_solicitacao = $id_solicitacao;
         $SolicitacaoPreTramitacaoManual->id_usuario = $id_usuario;
         $SolicitacaoPreTramitacaoManual->revisao = $revisao;


         $SolicitacaoPreTramitacaoManual = $SolicitacaoPreTramitacaoManual->constroiSolicitacaoManual($SolicitacaoPreTramitacaoManual, $_POST['cat_prod'] ,$_POST['devolucao'], $_POST['canal_entrada'], $_POST['produto_manual'], $_POST['tipo_solicitacao'], 'servico_desconsiderar', $_POST['cnpj'], $_POST['razao_social'], $_POST['qtd_acessos'], $_POST['n_gs'], $_POST['data_abertura_gestao'], $_POST['status_solicitacao'], $_POST['obs'], $_POST['aprovacao'], $_POST['complemento_tipo_solicitacao']);


          //pega data recebimento da solicitacao(data em que supervisor distribui para o mesmo)
          $data_receb_solicitacao = $SolicitacaoPreTramitacaoManual->buscaDataRecebimentoSolicitacao($id_solicitacao, $id_usuario, $revisao);

          $SolicitacaoPreTramitacaoManual->data_receb = $data_receb_solicitacao;

         //valida campos obrigatórios
         $retornoValidacaoItensObrigatorios = $SolicitacaoPreTramitacaoManual->validaInputsObrigatorios($SolicitacaoPreTramitacaoManual, 'Manual');

         if($retornoValidacaoItensObrigatorios == 1)
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
              if($SolicitacaoPreTramitacaoManual->validaItensDevolucao($_POST['motivo_devolucao'], $_POST['descricao_motivo_devolucao'], $_POST['area_devolucao'], $_POST['data_devolucao']) == 1)
              {
                 echo" <script> 
                  alert('Todos os campos de devolução devem ser preenchidos!');
                  history.back();
                </script>"; 
                exit();  
              }
              else
              {
                  $SolicitacaoPreTramitacaoManual->motivo_devolucao           = $_POST['motivo_devolucao'];
                  $SolicitacaoPreTramitacaoManual->descricao_motivo_devolucao = $_POST['descricao_motivo_devolucao'];
                  $SolicitacaoPreTramitacaoManual->area_devolucao             = $_POST['area_devolucao'];
                  $SolicitacaoPreTramitacaoManual->data_devolucao             = $_POST['data_devolucao'];
              }  
         }


          $SolicitacaoPreTramitacaoManual->produto = $SolicitacaoPreTramitacaoManual->buscaIdProdutoByDescricao($SolicitacaoPreTramitacaoManual->produto);


          //valida regra status voz
          if($SolicitacaoPreTramitacaoManual->validaStatusSolicitacao($SolicitacaoPreTramitacaoManual) == 1)
          {
              echo" <script> 
                    alert('Somente status Ag. Aprova\u00e7\u00e3o Comercial quando for mais de 200 acessos!');
                    history.back();
                  </script>"; 
                  exit();  
          }

          //valida data se o item estiver entrando pela primeira vez
          if($_POST['solicitacaoNova'] == 1)
          {
              if($SolicitacaoPreTramitacaoManual->validaDatas($SolicitacaoPreTramitacaoManual) == 1)
              {
                  echo" <script> 
                        alert('Data de abertura do GS deve ser maior ou igual a data de recebimento da solicita\u00e7\u00e3o!');
                        history.back();
                      </script>"; 
                      exit();  
              }
          }

          if(isset($_POST['data_pedido_cancelamento_cliente']))
          {
              $SolicitacaoPreTramitacaoManual->data_pedido_cancelamento_cliente = $_POST['data_pedido_cancelamento_cliente'];
          }
          else
          {
              $SolicitacaoPreTramitacaoManual->data_pedido_cancelamento_cliente = '';
          }

          //valida se gs nao esta associdado a outro protocolo
          if($SolicitacaoPreTramitacaoManual->n_gs != 0)
          {
              if($SolicitacaoPreTramitacaoManual->validaGsProtocolo($SolicitacaoPreTramitacaoManual) != '')
              {
                  echo" <script> 
                            alert('Este gs está associado ao protocolo: " . $SolicitacaoPreTramitacaoManual->validaGsProtocolo($SolicitacaoPreTramitacaoManual) . "');
                            history.back();
                          </script>"; 
                          exit();  
              }
          }

          //se serviço for retirada ou cancelamento data_pedido_cancelamento_cliente é obrigatório
          if($SolicitacaoPreTramitacaoManual->tipo_solicitacao == 'Retirada' || $SolicitacaoPreTramitacaoManual->tipo_solicitacao == 'Cancelamento')
          {
              if($SolicitacaoPreTramitacaoManual->data_pedido_cancelamento_cliente == '')
              {
                 echo" <script> 
                      alert('Data do pedido de cancelamento do cliente deve ser preenchido');
                      history.back();
                    </script>"; 
                    exit();  
              }
          } 
          
      
           //passa objeto para proc
           $dadosProc =  '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->id_usuario)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->id_solicitacao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->cat_prod)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->canal_entrada)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->data_receb)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->produto) 
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->tipo_solicitacao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->complemento_tipo_solicitacao)  
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->cnpj)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->razao_social)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->qtd_acessos)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->n_gs)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->data_abertura_gestao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->status_solicitacao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->obs)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->motivo_devolucao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->area_devolucao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->data_devolucao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->devolucao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->aprovacao)
                       . '&'. str_replace("&","E",$data_cadastro)
                       . '&'. str_replace("&","E",'')
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->descricao_motivo_devolucao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->chamado_remedy)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->revisao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoManual->data_pedido_cancelamento_cliente);                   

          //atualiza tabela solcitacao fases e chama proc
          if ($acao == "nfm")
          {
              //verifica se item ja existe na tabela solicitacao de fases
              $checkSolicitacaoFases=mysql_query("SELECT * FROM solicitacao_fases WHERE id_solicitacao = '$SolicitacaoPreTramitacaoManual->id_solicitacao'");

              if(mysql_affected_rows() > 0)
              {
                  $sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
                                                      SET 
                                                        pre_tramitacao  = 'Com operador', 
                                                        id_usuario_resp = $SolicitacaoPreTramitacaoManual->id_usuario,
                                                        revisao     = $SolicitacaoPreTramitacaoManual->revisao
                                                      WHERE id_solicitacao = '$SolicitacaoPreTramitacaoManual->id_solicitacao'"; 
              }
              else
              {
                  $sql_atualiza_status_fase_edicao = "INSERT INTO solicitacao_fases(id_solicitacao, pre_tramitacao, id_usuario_resp, revisao) 
                                                    VALUES('$SolicitacaoPreTramitacaoManual->id_solicitacao', 'Com operador', '$SolicitacaoPreTramitacaoManual->id_usuario', '$SolicitacaoPreTramitacaoManual->revisao')";
              }                   

              $acao_atualiza_status_fase_edicao = mysql_query($sql_atualiza_status_fase_edicao) or die (mysql_error());

              //chama proc
              $sql_exec="CALL solicitacao_pretramitacao('$dadosProc', 'pre_tramitacao');";
          } 
  

          $acao_exec= mysql_query($sql_exec) or die (mysql_error());

          if ($acao == "nfm") 
          {
            echo" <script> 
              alert('Solicitação cadastrada com sucesso!');
                 document.location.href='principal.php?id=" . $cripto->codificar($id_usuario) . "&t=views/home.php'
              </script>
              ";
          }
    /*****SOLICITAÇÃO IMPORTADA******/ 
    }
    else if($acao == "nf")
    {

             //cria objeto 
             $SolicitacaoPreTramitacaoImport = new SolicitacaoPreTramitacao();

             //passa para o objeto id solicitacao e id do usuario e revisao da solicitacao
             $SolicitacaoPreTramitacaoImport->id_solicitacao = $id_solicitacao;
             $SolicitacaoPreTramitacaoImport->id_usuario = $id_usuario;
             $SolicitacaoPreTramitacaoImport->revisao = $revisao;

             //passa informaçoes para objeto
             $SolicitacaoPreTramitacaoImport = $SolicitacaoPreTramitacaoImport->constroiSolicitacaoid_solicitacao($SolicitacaoPreTramitacaoImport, $_POST['tipo_solicitacao'], $_POST['n_gs'], $_POST['data_abertura_gestao'], $_POST['status_solicitacao'], $_POST['aprovacao'], $_POST['obs'], $_POST['devolucao'], $_POST['complemento_tipo_solicitacao'], $_POST['qtd_acessos']);


             //pega data recebimento da solicitacao(data em que supervisor distribui para o mesmo)
             $data_receb_solicitacao = $SolicitacaoPreTramitacaoImport->buscaDataRecebimentoSolicitacao($id_solicitacao, $id_usuario, $revisao);

             $SolicitacaoPreTramitacaoImport->data_receb = $data_receb_solicitacao;


            //valida campos obrigatórios
             $retornoValidacaoItensObrigatorios = $SolicitacaoPreTramitacaoImport->validaInputsObrigatorios($SolicitacaoPreTramitacaoImport, 'Import');

             if($retornoValidacaoItensObrigatorios == 1)
             {
                  echo" <script> 
                      alert('Por favor preencher todos os campos obrigatórios !');
                      history.back();
                    </script>
                    "; 
                    exit();               
             }


             //valida campos obrigatorios iniciados - devolucao
             if (isset($_POST['motivo_devolucao']) && isset($_POST['descricao_motivo_devolucao']) && isset($_POST['area_devolucao']) && isset($_POST['data_devolucao']))
             {
                  //caso haja algum em branco informa ao usuario se nao tiver manda dados ao objeto
                  if($SolicitacaoPreTramitacaoImport->validaItensDevolucao($_POST['motivo_devolucao'], $_POST['descricao_motivo_devolucao'], $_POST['area_devolucao'], $_POST['data_devolucao']) == 1)
                  {
                     echo" <script> 
                      alert('Todos os campos de devolução devem ser preenchidos!');
                      history.back();
                    </script>"; 
                    exit();  
                  }
                  else
                  {
                      $SolicitacaoPreTramitacaoImport->descricao_motivo_devolucao = $_POST['descricao_motivo_devolucao'];
                      $SolicitacaoPreTramitacaoImport->area_devolucao             = $_POST['area_devolucao'];
                      $SolicitacaoPreTramitacaoImport->data_devolucao             = $_POST['data_devolucao'];
                      $SolicitacaoPreTramitacaoImport->motivo_devolucao           = $_POST['motivo_devolucao'];
                      if(isset($_POST['chamado_remedy']))
                      {
                          $SolicitacaoPreTramitacaoImport->chamado_remedy         = $_POST['chamado_remedy'];
                      }
                      else
                      {
                          $SolicitacaoPreTramitacaoImport->chamado_remedy         = '';
                      }
                  }
             }


            //busca valores automaticamente preenchidos
            if($fonte == "siscom_servico")
            {
                $SolicitacaoPreTramitacaoImport = $SolicitacaoPreTramitacaoImport->buscaDadosSiscomServico($SolicitacaoPreTramitacaoImport, $id_solicitacao, $revisao);
                $SolicitacaoPreTramitacaoImport->produto = $SolicitacaoPreTramitacaoImport->buscaIdProdutoByDescricao($_POST['produto_servico']); 
                $SolicitacaoPreTramitacaoImport->canal_entrada = 14;
            }
            else if($fonte == "siscom_vendas")
            {
               $SolicitacaoPreTramitacaoImport = $SolicitacaoPreTramitacaoImport->buscaDadosSiscomVendas($SolicitacaoPreTramitacaoImport, $id_solicitacao, $revisao);
               $SolicitacaoPreTramitacaoImport->produto = $SolicitacaoPreTramitacaoImport->buscaIdProdutoByDescricao($SolicitacaoPreTramitacaoImport->produto);
               $SolicitacaoPreTramitacaoImport->canal_entrada = 14;
            }

             //cria objeto Produto
            $Produto = new Produto();
            $Produto = $Produto->buscaProdutoById($Produto, $SolicitacaoPreTramitacaoImport->produto);

            $SolicitacaoPreTramitacaoImport->cat_prod = $Produto->categoria_produto;

            //valida regra status voz
            if($SolicitacaoPreTramitacaoImport->validaStatusSolicitacao($SolicitacaoPreTramitacaoImport) == 1)
            {
                echo" <script> 
                      alert('Somente status Ag. Aprova\u00e7\u00e3o Comercial quando for mais de 200 acessos!');
                      history.back();
                    </script>"; 
                    exit();  
            }

          if(isset($_POST['data_pedido_cancelamento_cliente']))
          {
              $SolicitacaoPreTramitacaoImport->data_pedido_cancelamento_cliente = $_POST['data_pedido_cancelamento_cliente'];
          }
          else
          {
              $SolicitacaoPreTramitacaoImport->data_pedido_cancelamento_cliente = '';
          }

          //se serviço for retirada ou cancelamento data_pedido_cancelamento_cliente é obrigatório
          if($SolicitacaoPreTramitacaoImport->tipo_solicitacao == 'Retirada' || $SolicitacaoPreTramitacaoImport->tipo_solicitacao == 'Cancelamento')
          {
              if($SolicitacaoPreTramitacaoImport->data_pedido_cancelamento_cliente == '')
              {
                 echo" <script> 
                      alert('Data do pedido de cancelamento do cliente deve ser preenchido');
                      history.back();
                    </script>"; 
                    exit();  
              }
          } 

            //manda dados do objeto pra proc
            $dadosProc = '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->id_usuario)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->id_solicitacao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->cat_prod)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->canal_entrada)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->data_receb)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->produto )
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->tipo_solicitacao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->complemento_tipo_solicitacao ) 
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->cnpj)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->razao_social)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->qtd_acessos)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->n_gs)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->data_abertura_gestao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->status_solicitacao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->obs)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->motivo_devolucao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->area_devolucao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->data_devolucao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->devolucao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->aprovacao)
                       . '&'. str_replace("&","E",$data_cadastro)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->data_entrada_id_solicitacao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->descricao_motivo_devolucao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->chamado_remedy)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->revisao)
                       . '&'. str_replace("&","E",$SolicitacaoPreTramitacaoImport->data_pedido_cancelamento_cliente);

          if ($acao == "nf") 
          {
              $sql_exec="CALL solicitacao_pretramitacao('$dadosProc', 'pre_tramitacao');";
          }

          $acao_exec= mysql_query($sql_exec) or die (mysql_error()); 

          if ($acao == "nf") 
          {
            echo" <script> 
              alert('Solicitação cadastrada com sucesso!');
                 document.location.href='principal.php?id=" . $cripto->codificar($id_usuario) . "&t=views/home.php'
              </script>
              ";
          }

      }
                     
?>


