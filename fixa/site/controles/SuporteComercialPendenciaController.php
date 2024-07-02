<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa/site/Classes/SuporteComercialPendencia.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");


if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereSolicitacaoSuporteComercialPendencia':
        {
            $motivo_devolucao           =  isset($_POST['motivo_devolucao']) ? $_POST['motivo_devolucao'] : '';
            $descricao_motivo_devolucao =  isset($_POST['descricao_motivo_devolucao']) ? $_POST['descricao_motivo_devolucao'] : '';
            $id_usuario                 =  $_POST['id_usuario'];
          
          echo insertNewSolicitacaoComercialPendencia($cripto, $id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $cnpj_cpf, $razao_social, $gerente_senior, $gerente_negocio, $diretor, $data_base, $prazo_contratual, $valor_pendencia, $fup_envio, $obs, $status_solicitacao, $devido,$motivo_devolucao,$descricao_motivo_devolucao); 
          break;
        }
    } 
}


function insertNewSolicitacaoComercialPendencia(Cripto $cripto, $id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $cnpj_cpf, $razao_social, $gerente_senior, $gerente_negocio, $diretor, $data_base, $prazo_contratual, $valor_pendencia, $fup_envio, $obs, $status_solicitacao, $devido,$motivo_devolucao,$descricao_motivo_devolucao)
{
    $operadorSuporteComercialPendencia = $cripto->decodificar($id_usuario);

    //cria solicitacao
    $suporteComercialPendencia = new SuporteComercialPendencia($operadorSuporteComercialPendencia, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $cnpj_cpf, $razao_social, $gerente_senior, $gerente_negocio, $diretor, $data_base, $prazo_contratual, $valor_pendencia, $fup_envio, $obs, $status_solicitacao, $devido,$motivo_devolucao,$descricao_motivo_devolucao); 


    //valida campos obrigatórios
      if($suporteComercialPendencia->validaCamposObrigatoriosManual($suporteComercialPendencia) == 1)
      {
              echo" <script> 
                      alert('Por favor preencher todos os campos obrigatórios !');
                      history.back();
                    </script>
                    "; 
                    exit();   
      }

      //valida itens obrigatorios devolucao
      if($suporteComercialPendencia->validaSolicitacao($suporteComercialPendencia->id_solicitacao)==1)
      {
             echo" <script> 
                  alert('Solicitação já cadastrada!');
                  history.back();
                </script>
                "; 
                exit();   
      }
      
       //envia para o banco
      if($suporteComercialPendencia->enviaDadosBase($suporteComercialPendencia)==1)
      {
         echo" <script> 
            alert('Solicitação cadastrada com sucesso!');
               document.location.href='principal.php?id=" . $id_usuario . "&t=views/home.php'
            </script>
            ";                                       
        exit();

      };
}
