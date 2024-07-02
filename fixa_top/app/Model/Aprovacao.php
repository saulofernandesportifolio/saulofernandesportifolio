<?php

class Aprovacao {
     public $operador; 
     public $siscom; 
     public $data_entrada_siscom; 
     public $canal_entrada; 
     public $produto; 
     public $servico; 
     public $complemento_servico;
     public $qtd_acessos; 
     public $data_recebimento_aprovacao; 
     public $cnpj; 
     public $razao_social; 
     public $oportunidade; 
     public $proposta; 
     public $data_finalizado; 
     public $obs; 
     public $status_solicitacao_aprovacao;
     public $motivo_devolucao;
     public $descricao_motivo_devolucao;
     public $data_devolucao;
     public $regDataEntrada;
     public $revisao;
     public $substatusCip;

      function __construct($id_usuario, $revisao, $siscom, $obs, $status_solicitacao_aprovacao, $motivo_devolucao, $descricao_motivo_devolucao, $data_devolucao, $data_recebimento_aprovacao) 
      {
          $this->operador                     = $id_usuario; 
          $this->revisao                      = $revisao; 
          $this->siscom                       = $siscom; 
          $this->data_finalizado              = '';
          $this->obs                          = $obs;
          $this->status_solicitacao_aprovacao = $status_solicitacao_aprovacao;
          $this->motivo_devolucao             = $motivo_devolucao;
          $this->descricao_motivo_devolucao   = $descricao_motivo_devolucao;
          $this->data_devolucao               = $data_devolucao;
          $this->regDataEntrada               = date("Y-m-d H:i:s");
          $this->data_recebimento_aprovacao   = $data_recebimento_aprovacao;
      }

  
       function validaCamposObrigatorios(Aprovacao $aprovacao)
        {
             if( 
                ($aprovacao->status_solicitacao_aprovacao == "")               
               )
              {
                return true;
              }
        }

      function validaCamposObrigatoriosDevolucao(Aprovacao $tramitacao)
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

      function enviaDadosBase(Aprovacao $aprovacao)
      {

        //substatus cip
          switch ($aprovacao->status_solicitacao_aprovacao) 
          {
            case 23:
                $aprovacao->substatusCip = "Concluído";
                break;
            case 9:
                 $aprovacao->substatusCip = "Devolvido Tramitação";
                break;
            case 29:
                $aprovacao->substatusCip = "Pendente";
                break;
            case 28:
                $aprovacao->substatusCip = "Concluído";
                break;
          }


          $dadosProc = str_replace("&","E",$aprovacao->operador)
                . '$'. str_replace("&","E",$aprovacao->siscom)     
                . '$'. str_replace("&","E",$aprovacao->data_finalizado)             
                . '$'. str_replace("&","E",$aprovacao->obs)               
                . '$'. str_replace("&","E",$aprovacao->status_solicitacao_aprovacao)
                . '$'. str_replace("&","E",$aprovacao->motivo_devolucao)
                . '$'. str_replace("&","E",$aprovacao->descricao_motivo_devolucao)  
                . '$'. str_replace("&","E",$aprovacao->data_devolucao)              
                . '$'. str_replace("&","E",$aprovacao->regDataEntrada)
                . '$'. str_replace("&","E",$aprovacao->revisao)
                . '$'. str_replace("&","E",$aprovacao->data_recebimento_aprovacao)
                . '$'. str_replace("&","E",$aprovacao->substatusCip);      

              $sql_exec="CALL SP_APROVACAO('$dadosProc');";
        
              $acao_exec= mysql_query($sql_exec) or die (mysql_error());
              
              return true;
      }

    function verificaSituacaoSolicitacao($id_solicitacao, $revisao)
     {

           $verificaSolicitacao = mysql_query("SELECT * FROM aprovacao WHERE siscom = '$id_solicitacao' and revisao = $revisao and id_aprovacao is not null
                                                UNION SELECT * FROM aprovacao WHERE siscom = '$id_solicitacao' and revisao = $revisao-1 and id_aprovacao is not null");

           if(mysql_affected_rows() > 0)
           {
             return true;
           }
     }

     function buscaUltimaSolicitacaoCompletaByIdRevisao(Aprovacao $solicitacao, $id_solicitacao, $revisao)
     {
          $busca_solicitacao_redistribuida = mysql_query("SELECT sf.id_solicitacao, sf.aprovacao, sp.situacao  FROM solicitacao_fases sf
                                                                LEFT JOIN solicitacoes_pendentes sp
                                                                ON sf.id_solicitacao = sp.id_solicitacao
                                                                WHERE 
                                                                sf.id_solicitacao = '$id_solicitacao'
                                                                AND sf.aprovacao = 'Com operador' 
                                                                AND sp.situacao = 'Corrigido' 
                                                          UNION
                                                          SELECT sf.id_solicitacao, sf.aprovacao, sp.situacao  FROM solicitacao_fases sf
                                                                LEFT JOIN solicitacoes_pendentes sp
                                                                ON sf.id_solicitacao = sp.id_solicitacao
                                                                WHERE 
                                                                sf.id_solicitacao = '$id_solicitacao'
                                                                AND sf.aprovacao = 'Com operador' 
                                                                AND sp.situacao IS NULL ");  
          //solicitacao redistribuida 
          if(mysql_affected_rows() > 0)
          {
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM aprovacao_historico 
                                                                        WHERE siscom = '$id_solicitacao' AND revisao = $revisao
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                  
                               $solicitacao->siscom                      = $rsc['siscom']; 
                               $solicitacao->data_entrada_siscom        = $rsc['data_entrada_siscom']; 
                               $solicitacao->canal_entrada              = $rsc['id_canal_entrada']; 
                               $solicitacao->produto                    = $rsc['produto']; 
                               $solicitacao->servico                    = $rsc['servico']; 
                               $solicitacao->complemento_servico        = $rsc['complemento_servico'];
                               $solicitacao->qtd_acessos                = $rsc['quantidade_acessos']; 
                               $solicitacao->data_recebimento_aprovacao = $rsc['data_recebimento_aprovacao']; 
                               $solicitacao->cnpj                       = $rsc['cnpj']; 
                               $solicitacao->razao_social               = $rsc['razao_social']; 
                               $solicitacao->oportunidade               = $rsc['oportunidade']; 
                               $solicitacao->proposta                   = $rsc['proposta']; 
                               $solicitacao->data_finalizado            = $rsc['data_finalizado']; 
                               $solicitacao->obs                        = $rsc['obs'];                                                  
                       }

                       return $solicitacao;
                }
          }
          else
          {    
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM aprovacao_historico 
                                                                        WHERE siscom = '$id_solicitacao' AND revisao = $revisao - 1
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                  
                           $solicitacao->siscom                     = $rsc['siscom']; 
                           $solicitacao->data_entrada_siscom        = $rsc['data_entrada_siscom']; 
                           $solicitacao->canal_entrada              = $rsc['canal_entrada']; 
                           $solicitacao->produto                    = $rsc['produto']; 
                           $solicitacao->servico                    = $rsc['servico']; 
                           $solicitacao->complemento_servico        = $rsc['complemento_servico'];
                           $solicitacao->qtd_acessos                = $rsc['qtd_acessos']; 
                           $solicitacao->data_recebimento_aprovacao = $rsc['data_recebimento_aprovacao']; 
                           $solicitacao->cnpj                       = $rsc['cnpj']; 
                           $solicitacao->razao_social               = $rsc['razao_social']; 
                           $solicitacao->oportunidade               = $rsc['oportunidade']; 
                           $solicitacao->proposta                   = $rsc['proposta']; 
                           $solicitacao->data_finalizado            = $rsc['data_finalizado']; 
                           $solicitacao->obs                        = $rsc['obs']; 
                       }

                       return $solicitacao;
                }
                else
                {
                         $solicitacao->data_entrada_siscom        =    null;
                         $solicitacao->canal_entrada              =    null;
                         $solicitacao->produto                    =    null;
                         $solicitacao->servico                    =    null;
                         $solicitacao->complemento_servico        =    null;
                         $solicitacao->qtd_acessos                =    null;
                         $solicitacao->data_recebimento_aprovacao =    null;
                         $solicitacao->cnpj                       =    null;
                         $solicitacao->razao_social               =    null;
                         $solicitacao->oportunidade               =    null;
                         $solicitacao->proposta                   =    null;
                         $solicitacao->data_finalizado            =    null;
                         $solicitacao->obs                        =    null;
      
                    return $solicitacao;
                }
          }
      }

      function buscaItensPendentesPos()
      {
            $buscaNumeroSolicitacoesPendentesPre = mysql_query("SELECT 
                                                                 COUNT(*) AS numero_solicitacoes
                                                                FROM tramitacao t
                                                                  INNER JOIN status_solicitacao ss ON t.id_status = ss.id_status_solicitacao
                                                                  INNER JOIN usuario u ON t.id_usuario_tramitacao = u.id_usuario 
                                                                  INNER JOIN (
                                                                    SELECT  sf.id_solicitacao, sf.revisao FROM solicitacao_fases sf
                                                                    WHERE sf.tramitacao = 'Concluído'  AND sf.aprovacao IS NULL 
                                                                    ORDER BY sf.data_ultima_acao
                                                                  ) AS tp ON t.siscom =  tp.id_solicitacao AND t.revisao =  tp.revisao
                                                                  ");

                   
                           while($bnspp=mysql_fetch_array($buscaNumeroSolicitacoesPendentesPre))
                           {                  
                                 $numero_solicitacoes = $bnspp['numero_solicitacoes'];
                           }

                           return $numero_solicitacoes;
       }


       function buscarsolicitacao(Aprovacao $aprovacao, $id_solicitacao, $revisao)
       {
             $buscarsolicitacao=mysql_query("SELECT
                                                ap.siscom,                      
                                                ap.data_entrada_siscom,         
                                                ap.id_canal_entrada,            
                                                ap.produto,                  
                                                ap.servico,                     
                                                ap.complemento_servico,         
                                                ap.quantidade_acessos,         
                                                ap.cnpj,                        
                                                ap.razao_social,
                                                date_format(sf.data_ultima_acao, '%d/%m/%Y %H:%i:%s') as data,
                                                ap.oportunidade,
                                                ap.proposta
                                              FROM aprovacao ap
                                                INNER JOIN solicitacao_fases sf 
                                                  ON ap.siscom = sf.id_solicitacao and ap.revisao = sf.revisao 
                                              WHERE ap.siscom = '$id_solicitacao' AND ap.revisao = $revisao");

              while($linha=mysql_fetch_array($buscarsolicitacao))
              { 
                  $aprovacao->siscom                     = $linha['siscom'];                       
                  $aprovacao->data_entrada_siscom        = $linha['data_entrada_siscom'];          
                  $aprovacao->canal_entrada              = $linha['id_canal_entrada'];             
                  $aprovacao->produto                    = $linha['produto'];                   
                  $aprovacao->servico                    = $linha['servico'];                      
                  $aprovacao->complemento_servico        = $linha['complemento_servico'];          
                  $aprovacao->qtd_acessos                = $linha['quantidade_acessos'];           
                  $aprovacao->cnpj                       = $linha['cnpj'];                         
                  $aprovacao->razao_social               = $linha['razao_social'];
                  $aprovacao->data_recebimento_aprovacao = $linha['data'];
                  $aprovacao->oportunidade               = $linha['oportunidade'];   
                  $aprovacao->proposta                   = $linha['proposta'];                          
              }

          return $aprovacao;   
       }

       function verificaSiscom($id_solicitacao)
       {
           $servicos=mysql_query("SELECT * FROM siscom_servicos WHERE siscom = '$id_solicitacao'");

           if(mysql_affected_rows() > 0)
           {
              return "siscom_servicos";
           }
       } 
}
?>
    