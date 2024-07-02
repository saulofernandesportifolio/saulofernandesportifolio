<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa/site/Classes/SuporteComercialCancelamento.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");


if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereSolicitacaoSuporteComercialCancelamento':
        {
            $motivo_devolucao           =  isset($_POST['motivo_devolucao']) ? $_POST['motivo_devolucao'] : '';
            $descricao_motivo_devolucao =  isset($_POST['descricao_motivo_devolucao']) ? $_POST['descricao_motivo_devolucao'] : '';
            $id_usuario                 =  $_POST['id_usuario'];
          
          echo insertNewSolicitacaoComercialCancelamento($cripto, $id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $servico, $complemento_servico, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $uf, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 
          break;
        }
    } 
}


function insertNewSolicitacaoComercialCancelamento(Cripto $cripto, $id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $servico, $complemento_servico, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $uf, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao)
{
    $operadorSuporteComercialCancelamento = $cripto->decodificar($id_usuario);

    //cria solicitacao
    $suporteComercialCancelamento = new SuporteComercialCancelamento($operadorSuporteComercialCancelamento, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $servico, $complemento_servico, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $uf, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 


    //valida campos obrigatórios
      if($suporteComercialCancelamento->validaCamposObrigatoriosManual($suporteComercialCancelamento) == 1)
      {
              echo" <script> 
                      alert('Por favor preencher todos os campos obrigatórios !');
                      history.back();
                    </script>
                    "; 
                    exit();   
      }

      //valida itens obrigatorios devolucao
      if($suporteComercialCancelamento->validaSolicitacao($suporteComercialCancelamento->id_solicitacao)==1)
      {
             echo" <script> 
                  alert('Solicitação já cadastrada!');
                  history.back();
                </script>
                "; 
                exit();   
      }
      
       //envia para o banco
      if($suporteComercialCancelamento->enviaDadosBase($suporteComercialCancelamento)==1)
      {
         echo" <script> 
            alert('Solicitação cadastrada com sucesso!');
               document.location.href='principal.php?id=" . $id_usuario . "&t=views/home.php'
            </script>
            ";                                       
        exit();

      };
}
