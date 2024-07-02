<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa/site/Classes/SuporteComercialSiscom.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");


if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereSolicitacaoSuporteComercialSiscom':
        {
            $motivo_devolucao           =  isset($_POST['motivo_devolucao']) ? $_POST['motivo_devolucao'] : '';
            $descricao_motivo_devolucao =  isset($_POST['descricao_motivo_devolucao']) ? $_POST['descricao_motivo_devolucao'] : '';
            $id_usuario                 =  $_POST['id_usuario'];
          
          echo insertNewSolicitacaoComercialSiscom($cripto, $id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $servico, $complemento_servico, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $uf, $valor_proposta, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 
          break;
        }
    } 
}


function insertNewSolicitacaoComercialSiscom(Cripto $cripto, $id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $servico, $complemento_servico, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $uf, $valor_proposta, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao)
{
    $operadorSuporteComercialSiscom = $cripto->decodificar($id_usuario);

    //cria solicitacao
    $suporteComercialSiscom = new SuporteComercialSiscom($operadorSuporteComercialSiscom, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $servico, $complemento_servico, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $uf, $valor_proposta, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 


    //valida campos obrigatórios
      if($suporteComercialSiscom->validaCamposObrigatoriosManual($suporteComercialSiscom) == 1)
      {
              echo" <script> 
                      alert('Por favor preencher todos os campos obrigatórios !');
                      history.back();
                    </script>
                    "; 
                    exit();   
      }

      //valida itens obrigatorios devolucao
      if($suporteComercialSiscom->validaSolicitacao($suporteComercialSiscom->id_solicitacao)==1)
      {
             echo" <script> 
                  alert('Solicitação já cadastrada!');
                  history.back();
                </script>
                "; 
                exit();   
      }
      
       //envia para o banco
      if($suporteComercialSiscom->enviaDadosBase($suporteComercialSiscom)==1)
      {
         echo" <script> 
            alert('Solicitação cadastrada com sucesso!');
               document.location.href='principal.php?id=" . $id_usuario . "&t=views/home.php'
            </script>
            ";                                       
        exit();

      };
}
