<?php

class TramitacaoManual {
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
     public $oportunidade;
     public $proposta;
     public $status;
     public $obs;
     public $regDataEntrada;
     public $dataRecebimento;
     public $revisao;
     public $escritorio_gn;
     public $motivo_devolucao;
     public $descricao_motivo_devolucao;
     public $data_devolucao;
     public $dataRecebimentoSolicitacao;
     public $substatusCip;

      function __construct($id_usuario, $id_solicitacao, $produto, $data_entrada_siscom, $canal_entrada, $servico, $complemento_servico, $qtd_acessos, $cnpj, $razao_social, $status_solicitacao, $oportunidade, $proposta, $obs, $revisao, $escritorioGn, $motivo_devolucao, $descricao_motivo_devolucao) 
      {
         $this->operador                   = $id_usuario;
         $this->siscom                     = $id_solicitacao;
         $this->produto                    = $produto;
         $this->dataEntradaSiscom          = $data_entrada_siscom;
         $this->canalEntrada               = $canal_entrada;
         $this->servico                    = $servico;
         $this->complementoServico         = $complemento_servico;
         $this->quantidadeAcessos          = $qtd_acessos;
         $this->cnpj                       = $cnpj;
         $this->razaoSocial                = $razao_social;
         $this->dataEncerramento           = '';
         $this->status                     = $status_solicitacao;
         $this->oportunidade               = $oportunidade;
         $this->proposta                   = $proposta;
         $this->obs                        = $obs;
         $this->revisao                    = $revisao;
         $this->escritorio_gn              = $escritorioGn;
         $this->regDataEntrada             = date("Y-m-d H:i:s");
         $this->motivo_devolucao           = $motivo_devolucao;
         $this->descricao_motivo_devolucao = $descricao_motivo_devolucao;
         $this->data_devolucao             = '';
      }

      function validaCamposObrigatoriosManual(TramitacaoManual $tramitacao)
      {
           if(
              ($tramitacao->siscom == "") ||                    
              ($tramitacao->canalEntrada == "") ||            
              ($tramitacao->produto == "") ||                   
              ($tramitacao->servico  == "") ||
              ($tramitacao->servico  == "Selecione o serviço") ||
              ($tramitacao->complementoServico == "") ||
              ($tramitacao->complementoServico == "Selecione o complemento do serviço") ||
              ($tramitacao->escritorio_gn == "") ||        
              ($tramitacao->quantidadeAcessos == "") ||
              ($tramitacao->oportunidade == "") ||  
              ($tramitacao->proposta == "") ||           
              ($tramitacao->cnpj == "") ||                      
              ($tramitacao->razaoSocial == "") ||                 
              ($tramitacao->status == "")                    
             )
            {
              return true;
            }
      }

      function validaCamposObrigatoriosDevolucao(TramitacaoManual $tramitacao)
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

      function enviaDadosBase(TramitacaoManual $tramitacao)
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

      function verificaSituacaoSolicitacao($id_solicitacao, $revisao)
     {

           $verificaSolicitacao = mysql_query("SELECT * FROM tramitacao WHERE siscom = '$id_solicitacao' and revisao = $revisao and id_tramitacao is not null
                                                UNION SELECT * FROM tramitacao WHERE siscom = '$id_solicitacao' and revisao = $revisao-1 and id_tramitacao is not null");

           if(mysql_affected_rows() > 0)
           {
             return true;
           }
     }

     function buscaUltimaSolicitacaoCompletaByIdRevisao(TramitacaoManual $solicitacao, $id_solicitacao, $revisao)
     {
          $busca_solicitacao_redistribuida = mysql_query("SELECT sf.id_solicitacao, sf.tramitacao, sp.situacao  FROM solicitacao_fases sf
                                                                LEFT JOIN solicitacoes_pendentes sp
                                                                ON sf.id_solicitacao = sp.id_solicitacao
                                                                WHERE 
                                                                sf.id_solicitacao = '$id_solicitacao'
                                                                AND sf.tramitacao = 'Com operador' 
                                                                AND sp.situacao = 'Corrigido' 
                                                          UNION
                                                          SELECT sf.id_solicitacao, sf.tramitacao, sp.situacao  FROM solicitacao_fases sf
                                                                LEFT JOIN solicitacoes_pendentes sp
                                                                ON sf.id_solicitacao = sp.id_solicitacao
                                                                WHERE 
                                                                sf.id_solicitacao = '$id_solicitacao'
                                                                AND sf.tramitacao = 'Com operador' 
                                                                AND sp.situacao IS NULL ");  
          //solicitacao redistribuida 
          if(mysql_affected_rows() > 0)
          {
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM tramitacao 
                                                                        WHERE siscom = '$id_solicitacao' AND revisao = $revisao
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {        
                              $solicitacao->operador                    = $rsc['id_usuario_tramitacao'];
                              $solicitacao->siscom                      = $rsc['siscom'];          
                              $solicitacao->dataEntradaSiscom           = $rsc['data_entrada_siscom'];
                              $solicitacao->canalEntrada                = $rsc['id_canal_entrada'];    
                              $solicitacao->produto                     = $rsc['produto'];
                              $solicitacao->servico                     = $rsc['servico'];
                              $solicitacao->complementoServico          = $rsc['complemento_servico'];
                              $solicitacao->quantidadeAcessos           = $rsc['quantidade_acessos'];
                              $solicitacao->cnpj                        = $rsc['cnpj'];
                              $solicitacao->razaoSocial                 = $rsc['razao_social'];
                              $solicitacao->dataEncerramento            = $rsc['data_encerramento'];
                              $solicitacao->oportunidade                = $rsc['oportunidade'];
                              $solicitacao->proposta                    = $rsc['proposta'];
                              $solicitacao->status                      = $rsc['id_status'];
                              $solicitacao->obs                         = $rsc['obs'];
                              $solicitacao->regDataEntrada              = $rsc['reg_dt_entrada'];
                              $solicitacao->revisao                     = $rsc['revisao'];
                              $solicitacao->escritorio_gn               = $rsc['escritorio_gn'];
                              $solicitacao->dataRecebimentoSolicitacao  = $rsc['data_recebimento_solicitacao_manual'];                                
                       }

                       return $solicitacao;
                }
          }
          else
          {    
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM tramitacao_historico 
                                                                        WHERE siscom = '$id_solicitacao' AND revisao = $revisao - 1
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                  
                            $solicitacao->siscom                      = $rsc['siscom'];          
                            $solicitacao->dataEntradaSiscom           = $rsc['data_entrada_siscom'];
                            $solicitacao->canalEntrada                = $rsc['id_canal_entrada'];    
                            $solicitacao->produto                     = $rsc['produto'];
                            $solicitacao->servico                     = $rsc['servico'];
                            $solicitacao->complementoServico          = $rsc['complemento_servico'];
                            $solicitacao->quantidadeAcessos           = $rsc['quantidade_acessos'];
                            $solicitacao->cnpj                        = $rsc['cnpj'];
                            $solicitacao->razaoSocial                 = $rsc['razao_social'];
                            $solicitacao->dataEncerramento            = $rsc['data_encerramento'];
                            $solicitacao->oportunidade                = $rsc['oportunidade'];
                            $solicitacao->proposta                    = $rsc['proposta'];
                            $solicitacao->status                      = $rsc['id_status'];
                            $solicitacao->obs                         = $rsc['obs'];
                            $solicitacao->regDataEntrada              = $rsc['reg_dt_entrada'];
                            $solicitacao->revisao                     = $rsc['revisao'];
                            $solicitacao->escritorio_gn               = $rsc['escritorio_gn'];
                            $solicitacao->dataRecebimentoSolicitacao  = $rsc['data_recebimento_solicitacao_manual']; 
                       }

                       return $solicitacao;
                }
                else
                {
                          $solicitacao->dataEntradaSiscom          = null; 
                          $solicitacao->canalEntrada               = null; 
                          $solicitacao->produto                    = null; 
                          $solicitacao->servico                    = null; 
                          $solicitacao->complementoServico         = null; 
                          $solicitacao->quantidadeAcessos          = null; 
                          $solicitacao->cnpj                       = null; 
                          $solicitacao->razaoSocial                = null; 
                          $solicitacao->dataEncerramento           = null; 
                          $solicitacao->oportunidade               = null;
                          $solicitacao->proposta                   = null; 
                          $solicitacao->status                     = null; 
                          $solicitacao->obs                        = null; 
                          $solicitacao->regDataEntrada             = null; 
                          $solicitacao->revisao                    = null; 
                          $solicitacao->escritorio_gn              = null;
                          $solicitacao->dataRecebimentoSolicitacao = null;  
      
                    return $solicitacao;
                }
          }
      }
}
?>
    