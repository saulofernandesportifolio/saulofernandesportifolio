<?php

class Tramitacao {
     public $operador;
	   public $siscom;           
     public $dataEntradaSiscom;
     public $canalEntrada;                          
     public $produto;
     public $servico;
     public $complementoServico;
     public $quantidadeAcessos;
     public $cnpj;
     public $razaoSocial;
     public $dataEncerramento;
     public $status;
     public $obs;
     public $regDataEntrada;
     public $dataRecebimento;
     public $revisao;
     public $escritorio_gn;
     public $oportunidade;
     public $proposta;
     public $motivo_devolucao; 
     public $descricao_motivo_devolucao;
     public $data_devolucao;
     public $dataRecebimentoSolicitacao;
     public $substatusCip;


      function __construct($operador, $siscom, $revisao, $canalEntrada, $produto, $servico, $complementoServico, $quantidadeAcessos, $cnpj, $razaoSocial, $status, $obs, $oportunidade, $proposta, $motivo_devolucao, $descricao_motivo_devolucao) 
      {
         $this->operador                    = $operador;
         $this->siscom                      = $siscom;
         $this->canalEntrada                = $canalEntrada;
         $this->produto                     = $produto;
         $this->servico                     = $servico;
         $this->complementoServico          = $complementoServico;
         $this->quantidadeAcessos           = $quantidadeAcessos;
         $this->cnpj                        = $cnpj;
         $this->razaoSocial                 = $razaoSocial;
         $this->dataEncerramento            = '';
         $this->status                      = $status;
         $this->obs                         = $obs;
         $this->regDataEntrada              = date("Y-m-d H:i:s");
         $this->revisao                     = $revisao;
         $this->oportunidade                = $oportunidade;
         $this->proposta                    = $proposta;
         $this->motivo_devolucao            = $motivo_devolucao;
         $this->descricao_motivo_devolucao  = $descricao_motivo_devolucao;
         $this->data_devolucao              = '';
      }

  
     function validaCamposObrigatorios(Tramitacao $tramitacao)
      {
           if(
              ($tramitacao->servico == "") || 
              ($tramitacao->complementoServico == "") ||                                         
              ($tramitacao->quantidadeAcessos == "")  ||         
              ($tramitacao->oportunidade == "")       ||
              ($tramitacao->proposta == "")           ||                
              ($tramitacao->status == "")             ||
              ($tramitacao->complementoServico == "Selecione o complemento do serviço") ||
              ($tramitacao->dataEntradaSiscom == "")              
             )
            {
              return true;
            }
      }

      function validaCamposObrigatoriosDevolucao(Tramitacao $tramitacao)
      {
        if(
              ($tramitacao->motivo_devolucao == "")                   || 
              ($tramitacao->descricao_motivo_devolucao == "")         ||                                         
              ($tramitacao->motivo_devolucao == "Selecione o motivo")   
             )
            {
              return true;
            }
      }

      function enviaDadosBase(Tramitacao $tramitacao)
      {

          //substatus cip
          switch ($tramitacao->status) 
          {
            case 12:
                $tramitacao->substatusCip = "Enviado Aprovação";
                break;
            case 25:
            case 26:
            case 27:
                 $tramitacao->substatusCip = "Reprovado";
                break;
            case 28:
            case 23:
                $tramitacao->substatusCip = "Concluído";
                break;
            case 29:
                $tramitacao->substatusCip = "Pendente";
                break;
          }



            $dadosProc = str_replace("&","E",$tramitacao->operador) 
                       . '$'. str_replace("&","E",$tramitacao->siscom)                    
                       . '$'. str_replace("&","E",$tramitacao->dataEntradaSiscom)
                       . '$'. str_replace("&","E",$tramitacao->canalEntrada)         
                       . '$'. str_replace("&","E",$tramitacao->produto)                   
                       . '$'. str_replace("&","E",$tramitacao->servico)                   
                       . '$'. str_replace("&","E",$tramitacao->complementoServico)               
                       . '$'. str_replace("&","E",$tramitacao->quantidadeAcessos)         
                       . '$'. str_replace("&","E",$tramitacao->cnpj)                      
                       . '$'. str_replace("&","E",$tramitacao->razaoSocial)
                       . '$'. str_replace("&","E",$tramitacao->dataEncerramento)               
                       . '$'. str_replace("&","E",$tramitacao->status)
                       . '$'. str_replace("&","E",$tramitacao->obs)
                       . '$'. str_replace("&","E",$tramitacao->oportunidade)
                       . '$'. str_replace("&","E",$tramitacao->proposta)
                       . '$'. str_replace("&","E",$tramitacao->motivo_devolucao)
                       . '$'. str_replace("&","E",$tramitacao->descricao_motivo_devolucao)
                       . '$'. str_replace("&","E",$tramitacao->data_devolucao)
                       . '$'. str_replace("&","E",$tramitacao->regDataEntrada)
                       . '$'. str_replace("&","E",$tramitacao->escritorio_gn)
                       . '$'. str_replace("&","E",$tramitacao->revisao)
                       . '$'. str_replace("&","E",$tramitacao->dataRecebimentoSolicitacao)
                       . '$'. str_replace("&","E",$tramitacao->substatusCip);            
       
            $sql_exec="CALL SP_TRAMITACAO('$dadosProc');";
            
            $acao_exec= mysql_query($sql_exec) or die (mysql_error());
            
            return true;
      }

         

       /***** Métodos para as solicitacoes que entraram via bases de id_solicitacao Vendas e id_solicitacao Servicos *****/

        //busca data que o supervisor distribuiu para o operador
        function buscaDataRecebimentoSolicitacao($ids, $id_usuario, $revisao)
        {
          $busca_data_receb_solicitacao = mysql_query("SELECT date_format(reg_data,'%d/%m/%Y %H:%i:%s') AS reg_data FROM usuario_solicitacao WHERE id_solicitacao = '$ids' AND id_usuario = $id_usuario AND revisao = $revisao");

            if(mysql_affected_rows() > 0)
            {
              while($linhaSolicitacao=mysql_fetch_array($busca_data_receb_solicitacao))
              { 
                  $data_receb_solicitacao  = $linhaSolicitacao['reg_data'];
              }

              return $data_receb_solicitacao;
            } 
        }

        function buscaDadosSiscomServico(Tramitacao $solicitacao, $ids, $revisao)
        {
          $buscarsolicitacaoid_solicitacaoServico=mysql_query("SELECT 
                                                                  SUBSTRING(data,1,10) AS data, 
                                                                  SUBSTRING(data,12,8) AS hora,
                                                                  cnpj,
                                                                  razao_social_cliente,
                                                                  evento,
                                                                  escritorio_gn,
                                                                  servico
                                                                FROM 
                                                                  siscom_servicos 
                                                                WHERE siscom = '$ids' AND revisao = $revisao");
                
                if(mysql_affected_rows() > 0)
                {
                    while($linha=mysql_fetch_array($buscarsolicitacaoid_solicitacaoServico))
                    {   
                        $data = $linha['data']; 
                        if($data != ""){

                          //FORMATA DATA
                          $data = explode("/", $data);
                          $dia = $data[0];
                          $mes = $data[1];
                          $ano = $data[2];

                          $data = $ano . '/' . $mes . '/' . $dia . ' ' . $linha['hora'];
                        }else{
                          $data = "";
                        }

                        $solicitacao->dataEntradaSiscom = $data;  
                        $solicitacao->cnpj = $linha['cnpj'];          
                        $solicitacao->razaoSocial = $linha['razao_social_cliente'];
                        $solicitacao->complemento_servico = $linha['evento'];            
                        $solicitacao->escritorio_gn = $linha['escritorio_gn'];
                        $solicitacao->produto = $linha['servico'];  
                    }
                }

                return $solicitacao;
        }

        function buscaDadosSiscomVendas(Tramitacao $solicitacao, $ids, $revisao)
        {
          $buscarSolicitacaoid_solicitacaoVendas=mysql_query("SELECT  
                                                                descricao_produto,
                                                                cnpj,
                                                                razao_social,
                                                                escritorio_gn,
                                                                date_format(dataSiscom, '%d/%m/%Y %H:%i:%s') AS dataSiscom
                                                              FROM siscom_vendas WHERE siscom = '$ids' AND revisao = $revisao");
               if(mysql_affected_rows() > 0)
                {
                    while($linha=mysql_fetch_array($buscarSolicitacaoid_solicitacaoVendas))
                    {   
                        $solicitacao->produto = $linha['descricao_produto'];  
                        $solicitacao->cnpj = $linha['cnpj'];          
                        $solicitacao->razaoSocial = $linha['razao_social'];           
                        $solicitacao->escritorio_gn = $linha['escritorio_gn'];
                        $solicitacao->dataEntradaSiscom = $linha['dataSiscom'];
                    }
                }



              return $solicitacao;
        }


      function buscaItensPendentesTram()
      {
         $buscaNumeroSolicitacoesPendentesPre = mysql_query("SELECT COUNT(*) AS numero_solicitacoes 
                                                                  FROM(
                                                                        SELECT
                                                                          IFNULL(sv.siscom, '') AS siscom
                                                                        FROM siscom_vendas sv
                                                                        WHERE distribuido IS NULL  
                                                                        UNION ALL
                                                                        SELECT
                                                                          IFNULL(ss.siscom, '') AS siscom
                                                                        FROM siscom_servicos ss
                                                                        WHERE distribuido IS NULL
                                                                        UNION ALL
                                                                        SELECT 
                                                                          a.siscom
                                                                        FROM solicitacao_fases sf
                                                                          INNER JOIN aprovacao a ON sf.id_solicitacao = a.siscom AND sf.revisao = a.revisao
                                                                        WHERE  tramitacao = 'Fila de distribuição'
                                                                  ) AS table_siscom
                                                              ");

                   
                           while($bnspp=mysql_fetch_array($buscaNumeroSolicitacoesPendentesPre))
                           {                  
                                 $numero_solicitacoes = $bnspp['numero_solicitacoes'];
                           }

                           return $numero_solicitacoes;
        
      }

      function validaDataEntradaSiscom(Tramitacao $solicitacao)
      {
        //verifica se item é ag correcao do analista, se sim, data siscom nao mudara
        $buscaItemAprovacao = mysql_query("SELECT * FROM aprovacao 
                                            WHERE siscom = '$solicitacao->siscom' AND revisao = '$solicitacao->revisao'
                                              AND id_status = 9");

          if(mysql_affected_rows() > 0)
          {
              while($bnspp=mysql_fetch_array($buscaItemAprovacao))
             {                  
                   $data_entrada_siscom = $bnspp['data_entrada_siscom'];
             }
             //pega data antiga
             $solicitacao->dataEntradaSiscom = $data_entrada_siscom;
          }

          return $solicitacao;
      }

}
?>
    