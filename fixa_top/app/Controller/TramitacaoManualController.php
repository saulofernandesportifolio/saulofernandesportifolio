<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/TramitacaoManual.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/bd.php");


if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereSolicitacaoTramitacaoManual':
        {
            $motivo_devolucao           =  isset($_POST['motivo_devolucao']) ? $_POST['motivo_devolucao'] : '';
            $descricao_motivo_devolucao =  isset($_POST['descricao_motivo_devolucao']) ? $_POST['descricao_motivo_devolucao'] : '';
            $id_usuario                 =  $_POST['id_usuario'];
          
          echo insertNewTramitacaoRequestManual($cripto, $id_usuario, $id_solicitacao, $produto, '', $canal_entrada, $servico, $complemento_servico, $qtd_acessos, $cnpj_cpf, $razao_social, $status_solicitacao, $oportunidade, $proposta, $obs, $revisao, $escritorio_gn, $motivo_devolucao, $descricao_motivo_devolucao); 
          break;
        }
         case 'buscaProtocoloSolicitacao':
        {
          echo getProtocoloSolicitacao($tipo);
          break;
        } 
    } 
}



function insertNewTramitacaoRequestManual(Cripto $cripto, $id_usuario, $id_solicitacao, $produto, $data_entrada_siscom, $canal_entrada, $servico, $complemento_servico, $qtd_acessos, $cnpj, $razao_social, $status_solicitacao, $oportunidade, $proposta, $obs, $revisao, $escritorioGn, $motivo_devolucao, $descricao_motivo_devolucao)
{
    $operadorTramitacao = $cripto->decodificar($id_usuario);

    //cria solicitacao
    $tramitacao = new TramitacaoManual($operadorTramitacao, $id_solicitacao, $produto, $data_entrada_siscom, $canal_entrada, $servico, $complemento_servico, $qtd_acessos, $cnpj, $razao_social, $status_solicitacao, $oportunidade, $proposta, $obs, $revisao, $escritorioGn, $motivo_devolucao, $descricao_motivo_devolucao); 

    //pega data recebimento da solicitacao(data em que supervisor distribui para o mesmo)
    $tramitacao->dataRecebimentoSolicitacao = $tramitacao->buscaDataRecebimentoSolicitacao($id_solicitacao, $operadorTramitacao, $revisao);

    //valida campos obrigatórios

      if($tramitacao->validaCamposObrigatoriosManual($tramitacao) == 1)
      {
              echo" <script> 
                      alert('Por favor preencher todos os campos obrigatórios !');
                      history.back();
                    </script>
                    "; 
                    exit();   
      }

      //valida itens obrigatorios devolucao
      if($tramitacao->status != 12 && $tramitacao->status != 28 && $tramitacao->status != 0)
      {
          if($tramitacao->validaCamposObrigatoriosDevolucao($tramitacao) == 1)
          {
                  echo" <script> 
                          alert('Por favor preencher todos os campos obrigatórios!');
                          history.back();
                        </script>
                        "; 
                        exit();   
          }
      }
      
       //envia para o banco
      if($tramitacao->enviaDadosBase($tramitacao)==1)
      {
         echo" <script> 
            alert('Solicitação cadastrada com sucesso!');
               document.location.href='principal.php?id=" . $id_usuario . "&t=View/home.php'
            </script>
            ";                                       
        exit();

      };
}


function getProtocoloSolicitacao($tipo)
{
     if($tipo == "tramitacao")
      {

        $buscaUltimoIdGerado = mysql_query("SELECT Max(id_tramitacao) ultimoid FROM tramitacao");

        if(mysql_affected_rows() > 0)
        {

            while($row_li=mysql_fetch_array($buscaUltimoIdGerado))
            {
                $ultimoid  = $row_li['ultimoid'];
            }

            $ultimoid = $ultimoid + 1;
            $protocoloSolicitacao = "ST" . $ultimoid;
          }
          //insere na tabela novo id
        $insereNovaSolicitacao = "INSERT INTO tramitacao(siscom)VALUES('$protocoloSolicitacao')";
            $executaNovaInsercao= mysql_query($insereNovaSolicitacao) or die (mysql_error());
      }

      echo json_encode($protocoloSolicitacao);
}  
?>