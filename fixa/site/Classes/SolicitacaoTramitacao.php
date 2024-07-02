<?php

class SolicitacaoTramitacao {
	   public $id_usuario_tramitacao;           
     public $id_solicitacao;                          
     public $cat_produto;                     
     public $id_canal_entrada;                
     public $data_entrada_siscom;             
     public $id_produto;                      
     public $tipo_solicitacao;       
     public $id_servicos;                     
     public $cnpj;                            
     public $razao_social;                    
     public $qtd_acessos;                     
     public $n_gestao_servicos;               
     public $data_encerramento;               
     public $id_status_solic_tramitacao ;     
     public $data_abertura_gestao;            
     public $obs;                             
     public $data_devolucao;                  
     public $devolucao;                       
     public $aprovado;                        
     public $reg_dt_entrada;                 
     public $n_oportunidade_propostas;
     public $chamado_remedy;
     public $revisao;
     public $complemento_tipo_solicitacao;
     public $data_pedido_cancelamento_cliente;

     function constroiSolicitacaoTramitacao(SolicitacaoTramitacao $solicitacao, $id_usuario_tramitacao, $id_solicitacao, $devolucao, $status_solicitacao_tramitacao, $aprovacao, $data_encerramento, $n_oport_proposta, $obs, $reg_dt_entrada)
     {
          $solicitacao->id_usuario_tramitacao          = $id_usuario_tramitacao;
          $solicitacao->id_solicitacao                 = $id_solicitacao;
          $solicitacao->devolucao                      = $devolucao;
          $solicitacao->id_status_solic_tramitacao     = $status_solicitacao_tramitacao;
          $solicitacao->aprovado                       = $aprovacao;
          $solicitacao->data_encerramento              = $data_encerramento;
          $solicitacao->n_oportunidade_propostas       = $n_oport_proposta;
          $solicitacao->reg_dt_entrada                 = $reg_dt_entrada;
          $solicitacao->obs                            = $obs;

          return $solicitacao;
     }

     function validaCamposObrigatorios(SolicitacaoTramitacao $solicitacao)
     {
          if(empty($solicitacao->id_status_solic_tramitacao) || empty($solicitacao->aprovado) || ($solicitacao->n_oportunidade_propostas == ""))
          {
               return true;
          }
     }

       function validaItensDevolucao($motivo_devolucao, $descricao_motivo_devolucao, $area_devolucao, $data_devolucao)
        {
          //se for devolucao nenhum dos campos pode estar em branco(se 1 estiver mostrara erro ao usuario)
              if(
                empty($motivo_devolucao)                                 || 
                empty($descricao_motivo_devolucao)                       || 
                empty($area_devolucao)                                   || 
                empty($data_devolucao)                                   ||
                ($motivo_devolucao == "Selecione o motivo")              ||
                ($descricao_motivo_devolucao == "Selecione a descricao") 
               )
              {
                return true;
              }
        }


     function buscaObjetoByIdsolicitacao(SolicitacaoTramitacao $solicitacao, $ids, $revisao)
     {
          $buscarsolicitacao=mysql_query("SELECT * FROM pre_tramitacao WHERE id_solicitacao = '$ids' AND revisao = $revisao");
                
           if(mysql_affected_rows() > 0)
           {
                 while($linha=mysql_fetch_array($buscarsolicitacao))
                 {      
                    $solicitacao->cat_produto                        =  $linha['cat_produto'];
                    $solicitacao->id_canal_entrada                   =  $linha['id_canal_entrada'];
                    $solicitacao->id_produto                         =  $linha['id_produto'];
                    $solicitacao->tipo_solicitacao                   =  $linha['tipo_solicitacao'];
                    $solicitacao->complemento_tipo_solicitacao       =  $linha['complemento_tipo_solicitacao'];
                    $solicitacao->cnpj                               =  $linha['cnpj'];
                    $solicitacao->razao_social                       =  $linha['razao_social'];
                    $solicitacao->qtd_acessos                        =  $linha['qtd_acessos'];
                    $solicitacao->n_gestao_servicos                  =  $linha['n_gestao_servicos'];
                    $solicitacao->data_abertura_gestao               =  $linha['data_abert_gestao'];
                    $solicitacao->data_entrada_siscom                =  $linha['data_entrada_siscom'];
                    $solicitacao->data_pedido_cancelamento_cliente   =  $linha['data_pedido_cancelamento_cliente'];
                 }
           }

           return $solicitacao;
     }

     function buscaObjetoCompletoByIdSolicitacao(SolicitacaoTramitacao $solicitacao, $ids, $revisao)
     {
          $buscarsolicitacao=mysql_query("SELECT 
                                              t.id_solicitacao,
                                              t.cat_produto,
                                              t.id_canal_entrada,
                                              t.data_entrada_siscom,
                                              t.id_produto,
                                              t.tipo_solicitacao,
                                              t.id_servicos,
                                              t.cnpj,
                                              t.razao_social,
                                              t.qtd_acessos,
                                              t.n_gestao_servicos,
                                              t.data_encerramento,
                                              t.id_status_solic_tramitacao,
                                              t.data_abertura_gestao,
                                              t.obs,
                                              t.data_devolucao,
                                              t.devolucao,
                                              t.aprovado,
                                              t.reg_dt_entrada,
                                              t.n_oportunidade_propostas,
                                              spc.chamado_remedy
                                          FROM tramitacao t
                                            LEFT JOIN solicitacoes_pendentes_chamados spc
                                              ON  t.id_solicitacao = spc.nro_solicitacao
                                              AND t.revisao = spc.revisao
                                          WHERE t.id_solicitacao = '$ids' AND t.revisao = $revisao");
                
           if(mysql_affected_rows() > 0)
           {
                 while($linha=mysql_fetch_array($buscarsolicitacao))
                 {  
                    $solicitacao->id_solicitacao                     = $linha['id_solicitacao'];
                    $solicitacao->cat_produto                        = $linha['cat_produto'];
                    $solicitacao->id_canal_entrada                   = $linha['id_canal_entrada'];
                    $solicitacao->data_entrada_siscom                = $linha['data_entrada_siscom'];
                    $solicitacao->id_produto                         = $linha['id_produto'];
                    $solicitacao->tipo_solicitacao                   = $linha['tipo_solicitacao'];
                    $solicitacao->id_servicos                        = $linha['id_servicos'];
                    $solicitacao->cnpj                               = $linha['cnpj'];
                    $solicitacao->razao_social                       = $linha['razao_social'];
                    $solicitacao->qtd_acessos                        = $linha['qtd_acessos'];
                    $solicitacao->n_gestao_servicos                  = $linha['n_gestao_servicos'];
                    $solicitacao->data_encerramento                  = $linha['data_encerramento'];
                    $solicitacao->id_status_solic_tramitacao         = $linha['id_status_solic_tramitacao'];
                    $solicitacao->data_abertura_gestao               = $linha['data_abertura_gestao'];
                    $solicitacao->obs                                = $linha['obs'];
                    $solicitacao->data_devolucao                     = $linha['data_devolucao'];
                    $solicitacao->devolucao                          = $linha['devolucao'];
                    $solicitacao->aprovado                           = $linha['aprovado'];
                    $solicitacao->reg_dt_entrada                     = $linha['reg_dt_entrada'];
                    $solicitacao->n_oportunidade_propostas           = $linha['n_oportunidade_propostas'];
                    $solicitacao->chamado_remedy                     = $linha['chamado_remedy'];
                    $solicitacao->data_pedido_cancelamento_cliente   = $linha['data_pedido_cancelamento_cliente'];
                 }
           }

           return $solicitacao;
     }

      function verificaSituacaoSolicitacao($id_solicitacao, $revisao)
       {

             $verificaSolicitacao = mysql_query("SELECT * FROM tramitacao WHERE id_solicitacao = '$id_solicitacao' and revisao = $revisao and id_usuario_tramitacao is not null
                                                  UNION SELECT * FROM tramitacao WHERE id_solicitacao = '$id_solicitacao' and revisao = $revisao-1 and id_usuario_tramitacao is not null");

             if(mysql_affected_rows() > 0)
             {
               return true;
             }
       }

     function buscaUltimaSolicitacaoCompletaByIdRevisao(SolicitacaoTramitacao $solicitacao, $id_solicitacao, $revisao)
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
                                                                        WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                  
                               $solicitacao->id_status_solic_tramitacao = $rsc['id_status_solic_tramitacao']; 
                               $solicitacao->data_encerramento          = $rsc['data_encerramento'];      
                               $solicitacao->n_oportunidade_propostas   = $rsc['n_oportunidade_propostas'];
                               $solicitacao->obs                        = $rsc['obs'];                                                       
                       }

                       return $solicitacao;
                }
          }
          else
          {    
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM tramitacao 
                                                                        WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao - 1
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                  
                              $solicitacao->id_status_solic_tramitacao = $rsc['id_status_solic_tramitacao']; 
                              $solicitacao->data_encerramento          = $rsc['data_encerramento'];      
                              $solicitacao->n_oportunidade_propostas   = $rsc['n_oportunidade_propostas'];
                              $solicitacao->obs                        = $rsc['obs'];
                       }

                       return $solicitacao;
                }
                else
                {
                     $solicitacao->id_status_solic_tramitacao = null; 
                     $solicitacao->data_encerramento          = null;      
                     $solicitacao->n_oportunidade_propostas   = null; 
                     $solicitacao->obs   = null; 

                    return $solicitacao;
                }
          }
      }

      function consultaNumeroSolicitacoesPendentesTramitacao($id_usuario)
      {
          $buscaNumeroSolicitacoesPendentesTramitacao=mysql_query("SELECT   
                                                                    count(*) AS numero_solicitacoes
                                                                    FROM(
                                                                      SELECT sf.id_solicitacao, sf.id_gestao_servicos, sf.pre_tramitacao,sf.data_ultima_acao AS reg_dt_entrada,sf.revisao, sf.tramitacao
                                                                      FROM solicitacao_fases sf  
                                                                      WHERE sf.pre_tramitacao = 'Concluído' AND sf.tramitacao IS NULL AND sf.id_usuario_resp IN
                                                                        (
                                                                          SELECT id_usuario FROM usuario WHERE id_supervisor in  (SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario UNION  
                                                                            SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario AND id_perfil in(4)) 
                                                                        )
                                                                      UNION
                                                                      SELECT sf.id_solicitacao, sf.id_gestao_servicos, sf.pre_tramitacao, sf.data_ultima_acao AS reg_dt_entrada,sf.revisao,sf.tramitacao
                                                                      FROM solicitacao_fases sf  WHERE sf.pre_tramitacao = 'Concluído' AND sf.tramitacao = 'Fila de distribuição' AND sf.id_usuario_resp IN
                                                                        (
                                                                          SELECT id_usuario FROM usuario WHERE id_supervisor in  (SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario
                                                                                        UNION SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario AND id_perfil in(4))
                                                                        ) 
                                                                    ) AS solicitacao_tramitacao");
              while($bnspt=mysql_fetch_array($buscaNumeroSolicitacoesPendentesTramitacao))
             {                  
                   $numero_solicitacoes = $bnspt['numero_solicitacoes'];
             }

             return $numero_solicitacoes;

      }

      function NumeroSolicitacoesDiasTratativaAtraso($id_usuario)
      {
          $sql = mysql_query("CALL proc_distribuir_solicitacoes_tram_pos($id_usuario,'tramitacao')");

           $numerosdta = 0; 
           while($nsdta=mysql_fetch_array($sql))
           {                  
                 $numero_solicitacoes = $nsdta['qtde_dias_tratativa_total'];
                  if($numero_solicitacoes > 2)
                  {
                      $numerosdta = $numerosdta + 1;
                  }
           }

           return $numerosdta;
      }

      function validaDatas(SolicitacaoTramitacao $solicitacao)
      {
          $data_abertura_gestao = $solicitacao->data_abertura_gestao;
          $data_abertura_gestao = explode("/", $data_abertura_gestao);
          $data_abertura_gestao = $data_abertura_gestao[2] . "-" . $data_abertura_gestao[1] . "-" . $data_abertura_gestao[0];
          $data_abertura_gestao = strtotime($data_abertura_gestao);
          $data_abertura_gestao = date( "Y-m-d H:i:s", $data_abertura_gestao);

          $data_encerramento = $solicitacao->data_encerramento;
          $data_encerramento = explode("/", $data_encerramento);
          $data_encerramento = $data_encerramento[2] . "-" . $data_encerramento[1] . "-" . $data_encerramento[0];
          $data_encerramento = strtotime($data_encerramento);
          $data_encerramento = date( "Y-m-d H:i:s", $data_encerramento);

          //Data de abertura do gestão =< Data de encerramento
          if($data_abertura_gestao > $data_encerramento)
          {
              return true;
          }
      }
}

?>