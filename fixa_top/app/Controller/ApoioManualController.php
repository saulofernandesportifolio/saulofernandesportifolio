<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/ApoioManual.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/bd.php");


if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereSolicitacaoApoioManual':
        {
            $motivo_devolucao           =  isset($_POST['motivo_devolucao']) ? $_POST['motivo_devolucao'] : '';
            $descricao_motivo_devolucao =  isset($_POST['descricao_motivo_devolucao']) ? $_POST['descricao_motivo_devolucao'] : '';
            $id_usuario                 =  $_POST['id_usuario'];
          
          echo insertNewApoioRequestManual($cripto, $id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $produto, $servico, $complemento_servico, $escritorio_gn, $qtd_acessos, $obs, $cnpj_cpf, $razao_social, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 
          break;
        }
    } 
}



function insertNewApoioRequestManual(Cripto $cripto, $id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $produto, $servico, $complemento_servico, $escritorio_gn, $qtd_acessos, $obs, $cnpj_cpf, $razao_social, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao)
{
    $operadorApoio = $cripto->decodificar($id_usuario);

    //cria solicitacao
    $apoio = new ApoioManual($operadorApoio, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $produto, $servico, $complemento_servico, $escritorio_gn, $qtd_acessos, $obs, $cnpj_cpf, $razao_social, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao); 


    //valida campos obrigatórios
      if($apoio->validaCamposObrigatoriosManual($apoio) == 1)
      {
              echo" <script> 
                      alert('Por favor preencher todos os campos obrigatórios !');
                      history.back();
                    </script>
                    "; 
                    exit();   
      }

      //valida itens obrigatorios devolucao
      if($apoio->validaSolicitacao($apoio->id_solicitacao)==1)
      {
             echo" <script> 
                  alert('Solicitação já cadastrada!');
                  history.back();
                </script>
                "; 
                exit();   
      }
      
       //envia para o banco
      if($apoio->enviaDadosBase($apoio)==1)
      {
         echo" <script> 
            alert('Solicitação cadastrada com sucesso!');
               document.location.href='principal.php?id=" . $id_usuario . "&t=View/home.php'
            </script>
            ";                                       
        exit();

      };
}
