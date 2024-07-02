<?php

class SolicitacaoPosTramitacao {
	   public $id_usuario_pos_tramitacao;      
     public $id_solicitacao;                     
     public $id_canal_entrada;           
     public $id_produto;                 
     public $tipo_solicitacao;        
     public $id_servicos;                
     public $cnpj;                       
     public $razao_social;               
     public $qtd_acessos;               
     public $n_gestao_servicos;          
     public $motivo_devolucao;        
     public $obs;                        
     public $data_entrada_id_solicitacao;        
     public $oportunidade;               
     public $proposta;                   
     public $contrato_mae;               
     public $data_recebimento_pos;      
     public $data_finalizado;           
     public $status;                     
     public $reg_dt_entrada;
     public $revisao;
     public $complemento_tipo_solicitacao;
     public $data_assinatura_contrato;                 
     public $qtd_contrato_analisados;          
     public $data_pedido_cancelamento_cliente;

     //constroi solicitacao
     function constroiSolicitacaoPosTramitacao(SolicitacaoPosTramitacao $solicitacao, $id_usuario_pos_tramitacao, $id_solicitacao, $oportunidade, $proposta, $contrato_mae, $data_recebimento_pos, $data_finalizado, $obs, $status, $reg_dt_entrada, $data_assinatura_contrato, $qtd_contrato_analisados)
     {
          $solicitacao->id_usuario_pos_tramitacao        = $id_usuario_pos_tramitacao;
          $solicitacao->id_solicitacao                   = $id_solicitacao;
          $solicitacao->oportunidade                     = $oportunidade;
          $solicitacao->proposta                         = $proposta;
          $solicitacao->contrato_mae                     = $contrato_mae;
          $solicitacao->data_recebimento_pos             = $data_recebimento_pos;
          $solicitacao->data_finalizado                  = $data_finalizado;
          $solicitacao->obs                              = $obs;
          $solicitacao->status                           = $status;
          $solicitacao->reg_dt_entrada                   = $reg_dt_entrada;
          $solicitacao->data_assinatura_contrato         = $data_assinatura_contrato;
          $solicitacao->qtd_contrato_analisados          = $qtd_contrato_analisados;

          return $solicitacao;
     }

     function validaInputsObrigatorios(SolicitacaoPosTramitacao $SolicitacaoPosTramitacao)
     {


          if(
             ($SolicitacaoPosTramitacao->oportunidade== "")               ||
             ($SolicitacaoPosTramitacao->proposta== "")                   ||
             ($SolicitacaoPosTramitacao->contrato_mae== "")               ||
             empty($SolicitacaoPosTramitacao->data_recebimento_pos)       ||
             empty($SolicitacaoPosTramitacao->data_finalizado)            ||
             empty($SolicitacaoPosTramitacao->status)                     ||
             ($SolicitacaoPosTramitacao->data_assinatura_contrato == "")   ||
             ($SolicitacaoPosTramitacao->qtd_contrato_analisados == "")                         
          )
          {
               return true;
          } 
     }

     function validaItensDevolucao($motivo_devolucao)
     {
          if(empty($motivo_devolucao))
          {
               return true;
          }
     }

     function buscaObjetoByIdSolicitacao(SolicitacaoPosTramitacao $solicitacao, $ids, $revisao)
     {
          $buscarsolicitacao=mysql_query("SELECT * FROM pos_tramitacao WHERE id_solicitacao = '$ids' AND revisao = $revisao");
                
           if(mysql_affected_rows() > 0)
           {
                 while($linha=mysql_fetch_array($buscarsolicitacao))
                 {      
                    $solicitacao->id_canal_entrada                 =  $linha['id_canal_entrada'];            
                    $solicitacao->id_produto                       =  $linha['id_produto'];                  
                    $solicitacao->tipo_solicitacao                 =  $linha['tipo_solicitacao'];         
                    $solicitacao->complemento_tipo_solicitacao     =  $linha['complemento_tipo_solicitacao'];                 
                    $solicitacao->cnpj                             =  $linha['cnpj'];                       
                    $solicitacao->razao_social                     =  $linha['razao_social'];                
                    $solicitacao->qtd_acessos                      =  $linha['qtd_acessos'];                 
                    $solicitacao->n_gestao_servicos                =  $linha['n_gestao_servicos'];                   
                    $solicitacao->data_entrada_id_solicitacao      =  $linha['data_entrada_siscom'];
                    $solicitacao->data_pedido_cancelamento_cliente =  $linha['data_pedido_cancelamento_cliente'];
                 }
           }

           return $solicitacao;
     }

     function buscaObjetoCompletoByIdSolicitacao(SolicitacaoPosTramitacao $solicitacao, $ids, $revisao)
     {
          $buscarsolicitacao=mysql_query("SELECT * FROM pos_tramitacao WHERE id_solicitacao = '$ids' AND revisao = $revisao");
                
           if(mysql_affected_rows() > 0)
           {
                 while($linha=mysql_fetch_array($buscarsolicitacao))
                 {
                    $solicitacao->id_usuario_pos_tramitacao        = $linha['id_usuario_pos_tramitacao'];     
                    $solicitacao->id_solicitacao                   = $linha['id_solicitacao'];     
                    $solicitacao->id_canal_entrada                 = $linha['id_canal_entrada'];     
                    $solicitacao->id_produto                       = $linha['id_produto'];     
                    $solicitacao->tipo_solicitacao                 = $linha['tipo_solicitacao'];     
                    $solicitacao->id_servicos                      = $linha['id_servicos'];     
                    $solicitacao->cnpj                             = $linha['cnpj'];     
                    $solicitacao->razao_social                     = $linha['razao_social'];     
                    $solicitacao->qtd_acessos                      = $linha['qtd_acessos'];     
                    $solicitacao->n_gestao_servicos                = $linha['n_gestao_servicos'];     
                    $solicitacao->motivo_devolucao                 = $linha['motivo_devolucao'];     
                    $solicitacao->obs                              = $linha['obs'];     
                    $solicitacao->data_entrada_id_solicitacao      = $linha['data_entrada_id_solicitacao'];     
                    $solicitacao->oportunidade                     = $linha['oportunidade'];     
                    $solicitacao->proposta                         = $linha['proposta'];     
                    $solicitacao->contrato_mae                     = $linha['contrato_mae'];     
                    $solicitacao->data_recebimento_pos             = $linha['data_recebimento_pos'];     
                    $solicitacao->data_finalizado                  = $linha['data_finalizado'];     
                    $solicitacao->status                           = $linha['status'];     
                    $solicitacao->reg_dt_entrada                   = $linha['reg_dt_entrada'];
                    $solicitacao->revisao                          = $linha['revisao'];
                    $solicitacao->data_assinatura_contrato         = $linha['data_assinatura_contrato'];
                    $solicitacao->qtd_contrato_analisados          = $linha['qtd_contrato_analisados'];
                    $solicitacao->data_pedido_cancelamento_cliente = $linha['data_pedido_cancelamento_cliente'];  
                 }
           }

           return $solicitacao;
     }

     function verificaSituacaoSolicitacao($id_solicitacao, $revisao)
     {

           $verificaSolicitacao = mysql_query("SELECT * FROM pos_tramitacao WHERE id_solicitacao = '$id_solicitacao' and revisao = $revisao and id_usuario_pos_tramitacao is not null
                                                UNION SELECT * FROM pos_tramitacao WHERE id_solicitacao = '$id_solicitacao' and revisao = $revisao-1 and id_usuario_pos_tramitacao is not null");

           if(mysql_affected_rows() > 0)
           {
             return true;
           }
     }

     function buscaUltimaSolicitacaoCompletaByIdRevisao(SolicitacaoPosTramitacao $solicitacao, $id_solicitacao, $revisao)
     {
          
          $busca_solicitacao_redistribuida = mysql_query("SELECT sf.id_solicitacao, sf.pos_tramitacao, sp.situacao  FROM solicitacao_fases sf
                                                                LEFT JOIN solicitacoes_pendentes sp
                                                                ON sf.id_solicitacao = sp.id_solicitacao
                                                                WHERE 
                                                                sf.id_solicitacao = '$id_solicitacao'
                                                                AND sf.pos_tramitacao = 'Com operador' 
                                                                AND sp.situacao = 'Corrigido' 
                                                          UNION
                                                          SELECT sf.id_solicitacao, sf.pos_tramitacao, sp.situacao  FROM solicitacao_fases sf
                                                                LEFT JOIN solicitacoes_pendentes sp
                                                                ON sf.id_solicitacao = sp.id_solicitacao
                                                                WHERE 
                                                                sf.id_solicitacao = '$id_solicitacao'
                                                                AND sf.pos_tramitacao = 'Com operador' 
                                                                AND sp.situacao IS NULL ");  
          //solicitacao redistribuida 
          if(mysql_affected_rows() > 0)
          {
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM pos_tramitacao 
                                                                        WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                  
                               $solicitacao->oportunidade             = $rsc['oportunidade'];               
                               $solicitacao->proposta                 = $rsc['proposta'];                   
                               $solicitacao->contrato_mae             = $rsc['contrato_mae'];               
                               $solicitacao->data_recebimento_pos     = $rsc['data_recebimento_pos']; 
                               $solicitacao->data_finalizado          = $rsc['data_finalizado'];     
                               $solicitacao->status                   = $rsc['status']; 
                               $solicitacao->obs                      = $rsc['obs'];
                               $solicitacao->data_assinatura_contrato = $rsc['data_assinatura_contrato']; 
                               $solicitacao->qtd_contrato_analisados  = $rsc['qtd_contrato_analisados'];                                                   
                       }

                       return $solicitacao;
                }
          }
          else
          {    
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM pos_tramitacao 
                                                                        WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao - 1
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                  
                               $solicitacao->oportunidade             = $rsc['oportunidade'];               
                               $solicitacao->proposta                 = $rsc['proposta'];                   
                               $solicitacao->contrato_mae             = $rsc['contrato_mae'];               
                               $solicitacao->data_recebimento_pos     = $rsc['data_recebimento_pos']; 
                               $solicitacao->data_finalizado          = $rsc['data_finalizado'];     
                               $solicitacao->status                   = $rsc['status']; 
                               $solicitacao->obs                      = $rsc['obs'];
                               $solicitacao->data_assinatura_contrato = $rsc['data_assinatura_contrato']; 
                               $solicitacao->qtd_contrato_analisados  = $rsc['qtd_contrato_analisados'];  
                       }

                       return $solicitacao;
                }
                else
                {
                     $solicitacao->oportunidade             = null;       
                     $solicitacao->proposta                 = null;       
                     $solicitacao->contrato_mae             = null;       
                     $solicitacao->data_recebimento_pos     = null; 
                     $solicitacao->data_finalizado          = null;
                     $solicitacao->status                   = null;
                     $solicitacao->obs                      = null;
                     $solicitacao->data_assinatura_contrato = null;
                     $solicitacao->qtd_contrato_analisados  = null;

                    return $solicitacao;
                }
          }
      }

      function consultaNumeroSolicitacoesPendentesPos($id_usuario)
      {
          $buscaNumeroSolicitacoesPendentesPos=mysql_query("SELECT count(*) AS numero_solicitacoes FROM solicitacao_fases sf
                                                              WHERE 
                                                                sf.tramitacao = 'Concluído'
                                                                AND sf.pos_tramitacao IS NULL
                                                                AND sf.id_usuario_resp IN
                                                                (
                                                                  SELECT id_usuario FROM usuario 
                                                                  WHERE id_supervisor in  (
                                                                                          SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario
                                                                                          UNION 
                                                                                          SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario AND id_perfil in(4)
                                                                                       ) 
                                                                )");

              while($bnsppos=mysql_fetch_array($buscaNumeroSolicitacoesPendentesPos))
               {                  
                     $numero_solicitacoes = $bnsppos['numero_solicitacoes'];
               }

               return $numero_solicitacoes;
      }

      function validaDatas(SolicitacaoPosTramitacao $solicitacao)
      {
          $data_finalizado = $solicitacao->data_finalizado;
          $data_finalizado = explode("/", $data_finalizado);
          $data_finalizado = $data_finalizado[2] . "-" . $data_finalizado[1] . "-" . $data_finalizado[0];
          $data_finalizado = strtotime($data_finalizado);
          $data_finalizado = date( "Y-m-d H:i:s", $data_finalizado);

          $data_recebimento_pos = $solicitacao->data_recebimento_pos;
          $data_recebimento_pos = explode("/", $data_recebimento_pos);
          $data_recebimento_pos = $data_recebimento_pos[2] . "-" . $data_recebimento_pos[1] . "-" . $data_recebimento_pos[0];
          $data_recebimento_pos = strtotime($data_recebimento_pos);
          $data_recebimento_pos = date( "Y-m-d H:i:s", $data_recebimento_pos);

          //data de recebimento pós =< Data finalizado
          if($data_finalizado < $data_recebimento_pos)
          {
              return true;
          }
      }

}
?>