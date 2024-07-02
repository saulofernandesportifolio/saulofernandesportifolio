<?php
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/Aprovacao.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/bd.php");


if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'insereSolicitacaoAprovacao': 
        { 
          $id_usuario                 =  isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
          $motivo_devolucao           =  isset($_POST['motivo_devolucao']) ? $_POST['motivo_devolucao'] : '';
          $descricao_motivo_devolucao =  isset($_POST['descricao_motivo_devolucao']) ? $_POST['descricao_motivo_devolucao'] : '';
          $data_devolucao             =  isset($_POST['data_devolucao']) ? $_POST['data_devolucao'] : '';

          echo insertNewAprovacaoRequest($cripto, $id_usuario, $revisao, $siscom, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao, $data_devolucao, $data_recebimento_aprovacao); 
          break; 
        }
    } 
}


function insertNewAprovacaoRequest(Cripto $cripto, $id_usuario, $revisao, $siscom,$obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao, $data_devolucao, $data_recebimento_aprovacao)
{
	$operadorAprovacao = $cripto->decodificar($id_usuario);

	//cria solicitacao
	$aprovacao = new Aprovacao($operadorAprovacao, $revisao, $siscom, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao, $data_devolucao, $data_recebimento_aprovacao);

	   //valida campos obrigatórios
    if($aprovacao->validaCamposObrigatorios($aprovacao) == 1)
    {
            echo" <script> 
                    alert('Por favor preencher todos os campos obrigatórios !');
                    history.back();
                  </script>
                  "; 
                  exit();   
    }

    //valida itens obrigatorios caso item devolucao
      if($aprovacao->status_solicitacao_aprovacao != 23 && $aprovacao->status_solicitacao_aprovacao && $aprovacao->status_solicitacao_aprovacao != 28 && $aprovacao->status_solicitacao_aprovacao != 0)
      {
          if($aprovacao->validaCamposObrigatoriosDevolucao($aprovacao) == 1)
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
    if($aprovacao->enviaDadosBase($aprovacao)==1)
    {
    	 echo" <script> 
	        alert('Solicitação cadastrada com sucesso!');
	           document.location.href='principal.php?id=" . $id_usuario . "&t=View/home.php'
	        </script>
	        ";                                       
    	exit();

    };
} 
?>