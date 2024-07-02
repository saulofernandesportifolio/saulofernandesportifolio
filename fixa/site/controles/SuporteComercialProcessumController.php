<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa/site/Classes/SuporteComercialProcessum.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");


if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereSolicitacaoSuporteComercialProcessum':
        {
            $motivo_devolucao           =  isset($_POST['motivo_devolucao']) ? $_POST['motivo_devolucao'] : '';
            $descricao_motivo_devolucao =  isset($_POST['descricao_motivo_devolucao']) ? $_POST['descricao_motivo_devolucao'] : '';
            $id_usuario                 =  $_POST['id_usuario'];
          
          echo insertNewSolicitacaoComercialProcessum($cripto, $id_usuario, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $categoria_produto, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 
          break;
        }
    } 
}


function insertNewSolicitacaoComercialProcessum(Cripto $cripto, $id_usuario, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $categoria_produto, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao)
{
    $operadorSuporteComercialProcessum = $cripto->decodificar($id_usuario);

    //cria solicitacao
    $suporteComercialProcessum = new SuporteComercialProcessum($operadorSuporteComercialProcessum, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $categoria_produto, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 


    //valida campos obrigatórios
      if($suporteComercialProcessum->validaCamposObrigatoriosManual($suporteComercialProcessum) == 1)
      {
              echo" <script> 
                      alert('Por favor preencher todos os campos obrigatórios !');
                      history.back();
                    </script>
                    "; 
                    exit();   
      }

      //valida itens obrigatorios devolucao
      if($suporteComercialProcessum->validaSolicitacao($suporteComercialProcessum->id_solicitacao)==1)
      {
             echo" <script> 
                  alert('Solicitação já cadastrada!');
                  history.back();
                </script>
                "; 
                exit();   
      }
      
       //envia para o banco
      if($suporteComercialProcessum->enviaDadosBase($suporteComercialProcessum)==1)
      {
         echo" <script> 
            alert('Solicitação cadastrada com sucesso!');
               document.location.href='principal.php?id=" . $id_usuario . "&t=views/home.php'
            </script>
            ";                                       
        exit();

      };
}
