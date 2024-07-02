<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/Tramitacao.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/Servico.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/bd.php");


if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereSolicitacaoTramitacao': 
        { 
            $motivo_devolucao           =  isset($_POST['motivo_devolucao']) ? $_POST['motivo_devolucao'] : '';
            $descricao_motivo_devolucao =  isset($_POST['descricao_motivo_devolucao']) ? $_POST['descricao_motivo_devolucao'] : '';
            $id_usuario                 =  $_POST['id_usuario'];
            $data_entrada_siscom        =  isset($_POST['data_entrada_siscom']) ? $_POST['data_entrada_siscom'] : '';

           echo insertNewTramitacaoRequest($cripto, $id_usuario, $revisao, $id_solicitacao, $fonte, $servico, $complemento_servico,$produto, $qtd_acessos, $status_solicitacao, $obs, $oportunidade, $proposta, $motivo_devolucao, $descricao_motivo_devolucao, $data_entrada_siscom); 
          break; 
        }
        case 'buscaProtocoloSolicitacao':
        {
          echo getProtocoloSolicitacao($tipo);
          break;
        }
        case 'busca_complemento_solicitacao':
        {
          echo buscaComplementoSolicitacao($servico, $fonte);
          break;
        }
        case 'busca_motivo_devolucao':
        {
          echo buscaMotivoDevolucao($status);
          break;
        } 
    } 
}


function insertNewTramitacaoRequest(Cripto $cripto, $id_usuario, $revisao, $id_solicitacao, $fonte, $servico, $complemento_servico,$produto, $qtd_acessos, $status_solicitacao, $obs, $oportunidade, $proposta, $motivo_devolucao, $descricao_motivo_devolucao, $data_entrada_siscom)
{
      $operadorTramitacao = $cripto->decodificar($id_usuario);

    	//cria solicitacao
    	$tramitacao = new Tramitacao($operadorTramitacao, $id_solicitacao, $revisao,14, $produto, $servico, $complemento_servico, $qtd_acessos,'', '',$status_solicitacao, $obs, $oportunidade, $proposta, $motivo_devolucao, $descricao_motivo_devolucao); 

  
       //pega data recebimento da solicitacao(data em que supervisor distribui para o mesmo)
      $tramitacao->dataRecebimentoSolicitacao = $tramitacao->buscaDataRecebimentoSolicitacao($id_solicitacao, $operadorTramitacao, $revisao);

      //completa objeto com dados vindos da base de vendas e servicos  
      if($fonte == "siscom_servico")
      {
          $tramitacao = $tramitacao->buscaDadosSiscomServico($tramitacao, $id_solicitacao, $revisao);
      }
      else if($fonte == "siscom_vendas")
      {
          $tramitacao = $tramitacao->buscaDadosSiscomVendas($tramitacao, $id_solicitacao, $revisao);
      }
      //validcao temporaria pois data é obrigatoria na importacao, somente casos pendentes
      if($tramitacao->dataEntradaSiscom == "")
      {
        $tramitacao->dataEntradaSiscom = $data_entrada_siscom;
      }
          //valida se item é ag. correcao do analista
      $tramitacao = $tramitacao->validaDataEntradaSiscom($tramitacao);

    	//valida campos obrigatórios
      if($tramitacao->validaCamposObrigatorios($tramitacao) == 1)
      {
              echo" <script> 
                      alert('Por favor preencher todos os campos obrigatórios!');
                      history.back();
                    </script>
                    "; 
                    exit();   
      }

      //valida itens obrigatorios caso item devolucao
      if($tramitacao->status != 12 && $tramitacao->status != 28 && $tramitacao->status != 23 && $tramitacao->status != 0)
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

function buscaComplementoSolicitacao($servico, $fonte)
{
    $obj = new Servico();
    $obj->buscaServicoByDescricao($servico, $fonte);
    
    $array = array();
    $i = 0;
    foreach($obj->servicos as $obj)
    {
        $array[$i] = $obj->complemento_servico;
        $i = $i + 1;
    }

    echo json_encode($array);
}

function buscaMotivoDevolucao($status)
{
    $buscarOperador=mysql_query("SELECT 
                                    descricao_detalhes 
                                FROM motivo_devolucao 
                                WHERE descricao IN 
                                  (SELECT descricao FROM status_solicitacao WHERE id_status_solicitacao = '$status')");

    while($fetch  = mysql_fetch_array($buscarOperador))
    {
        $output[]  = array (
            $fetch[0]
        );
    }

    echo json_encode($output);

}

?>