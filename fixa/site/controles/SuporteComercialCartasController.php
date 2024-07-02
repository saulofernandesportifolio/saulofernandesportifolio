<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa/site/Classes/SuporteComercialCartas.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");


if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereSolicitacaoSuporteComercialCartas':
        {
            $motivo_devolucao           =  isset($_POST['motivo_devolucao']) ? $_POST['motivo_devolucao'] : '';
            $descricao_motivo_devolucao =  isset($_POST['descricao_motivo_devolucao']) ? $_POST['descricao_motivo_devolucao'] : '';
            $id_usuario                 =  $_POST['id_usuario'];
          
          echo insertNewSolicitacaoComercialCartas($cripto, $id_usuario, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $tipo_documento, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $data_envio_cliente, $endereco_envio, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 
          break;
        }
    } 
}


function insertNewSolicitacaoComercialCartas(Cripto $cripto, $id_usuario, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $tipo_documento, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $data_envio_cliente, $endereco_envio, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao)
{
    $operadorSuporteComercialCartas = $cripto->decodificar($id_usuario);

    //cria solicitacao
    $suporteComercialCartas = new SuporteComercialCartas($operadorSuporteComercialCartas, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $tipo_documento, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $data_envio_cliente, $endereco_envio, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 


    //valida campos obrigatórios
      if($suporteComercialCartas->validaCamposObrigatoriosManual($suporteComercialCartas) == 1)
      {
              echo" <script> 
                      alert('Por favor preencher todos os campos obrigatórios !');
                      history.back();
                    </script>
                    "; 
                    exit();   
      }

      //valida itens obrigatorios devolucao
      if($suporteComercialCartas->validaSolicitacao($suporteComercialCartas->id_solicitacao)==1)
      {
             echo" <script> 
                  alert('Solicitação já cadastrada!');
                  history.back();
                </script>
                "; 
                exit();   
      }
      
       //envia para o banco
      if($suporteComercialCartas->enviaDadosBase($suporteComercialCartas)==1)
      {
         echo" <script> 
            alert('Solicitação cadastrada com sucesso!');
               document.location.href='principal.php?id=" . $id_usuario . "&t=views/home.php'
            </script>
            ";                                       
        exit();

      };
}
