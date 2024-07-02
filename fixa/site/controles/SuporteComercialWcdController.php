<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa/site/Classes/SuporteComercialWcd.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");


if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereSolicitacaoSuporteComercialWcd':
        {
            $motivo_devolucao           =  isset($_POST['motivo_devolucao']) ? $_POST['motivo_devolucao'] : '';
            $descricao_motivo_devolucao =  isset($_POST['descricao_motivo_devolucao']) ? $_POST['descricao_motivo_devolucao'] : '';
            $id_usuario                 =  $_POST['id_usuario'];
          
          echo insertNewSolicitacaoComercialWcd($cripto, $id_usuario, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $categoria_produto, $produto, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $oportunidade, $valor_proposta, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 
          break;
        }
    } 
}


function insertNewSolicitacaoComercialWcd(Cripto $cripto, $id_usuario, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $categoria_produto, $produto, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $oportunidade, $valor_proposta, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao)
{
    $operadorSuporteComercialWcd = $cripto->decodificar($id_usuario);

    //cria solicitacao
    $suporteComercialWcd = new SuporteComercialWcd($operadorSuporteComercialWcd, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $categoria_produto, $produto, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $oportunidade, $valor_proposta, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 


    //valida campos obrigatórios
      if($suporteComercialWcd->validaCamposObrigatoriosManual($suporteComercialWcd) == 1)
      {
              echo" <script> 
                      alert('Por favor preencher todos os campos obrigatórios !');
                      history.back();
                    </script>
                    "; 
                    exit();   
      }

      //valida itens obrigatorios devolucao
      if($suporteComercialWcd->validaSolicitacao($suporteComercialWcd->id_solicitacao)==1)
      {
             echo" <script> 
                  alert('Solicitação já cadastrada!');
                  history.back();
                </script>
                "; 
                exit();   
      }
      
       //envia para o banco
      if($suporteComercialWcd->enviaDadosBase($suporteComercialWcd)==1)
      {
         echo" <script> 
            alert('Solicitação cadastrada com sucesso!');
               document.location.href='principal.php?id=" . $id_usuario . "&t=views/home.php'
            </script>
            ";                                       
        exit();

      };
}
