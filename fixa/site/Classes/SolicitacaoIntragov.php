<?php

class SolicitacaoIntragov {
	   public $id_usuario_intragov;      
     public $devolucao;                  
     public $id_canal_entrada;               
     public $id_produto_intragov;            
     public $servico_intragov;               
     public $qtd_acessos;                    
     public $motivo_cancelamento;            
     public $cnpj;                           
     public $razao_social;                   
     public $n_gestao_servicos;              
     public $data_abertura_gestao;          
     public $motivo_devolucao;               
     public $area_solicitante;               
     public $data_devolucao;                
     public $data_encerramento;              
     public $status;                         
     public $reg_dt_entrada;                
     public $revisao;                        
     public $complemento_servico;
     public $data_recebimento;
     public $descricao_motivo_devolucao;
     public $obs;
     public $id_solicitacao;
     public $data_pedido_cancelamento_cliente;

     function constroiSolicitacaoIntragov(SolicitacaoIntragov $solicitacao, $n_gestao_servicos, $devolucao, $canal_entrada, $produtoIntragov, $servicoIntragov, $qtd_acessos, $cnpj, $razao_social, $data_abertura_gestao, $data_encerramento, $status_solicitacao_intragov, $reg_dt_entrada, $complemento_servico, $obs)
     {
          $solicitacao->n_gestao_servicos                 = $n_gestao_servicos;
          $solicitacao->devolucao                         = $devolucao;                  
          $solicitacao->id_canal_entrada                  = $canal_entrada;               
          $solicitacao->id_produto_intragov               = $produtoIntragov;            
          $solicitacao->servico_intragov                  = $servicoIntragov;               
          $solicitacao->qtd_acessos                       = $qtd_acessos;                    
          $solicitacao->cnpj                              = $cnpj;                           
          $solicitacao->razao_social                      = $razao_social;                   
          $solicitacao->data_abertura_gestao              = $data_abertura_gestao;          
          $solicitacao->data_encerramento                 = $data_encerramento;              
          $solicitacao->status                            = $status_solicitacao_intragov;                         
          $solicitacao->reg_dt_entrada                    = $reg_dt_entrada;                
          $solicitacao->complemento_servico               = $complemento_servico;
          $solicitacao->obs                               = $obs;

          return $solicitacao;
     }

      //busca data que o operador habilitou a solicitacao
     function buscaDataRecebimentoSolicitacao($id_solicitacao, $id_usuario, $revisao)
     {
          $busca_data_receb_solicitacao = mysql_query("SELECT 
                                                            date_format(reg_data,'%d/%m/%Y') AS reg_data 
                                                       FROM usuario_solicitacao 
                                                       WHERE id_solicitacao = '$id_solicitacao' AND id_usuario = $id_usuario AND revisao = $revisao
                                                  ");

          if(mysql_affected_rows() > 0)
          {
                 while($linhaSolicitacao=mysql_fetch_array($busca_data_receb_solicitacao))
                 { 
                     $data_receb_solicitacao  = $linhaSolicitacao['reg_data'];
                 }

                 return $data_receb_solicitacao;
          } 
     }

     function validaCamposObrigatorios(SolicitacaoIntragov $solicitacao)
     {
          //valida campos obrigatórios
          if(
               ($solicitacao->n_gestao_servicos == "")                    ||
               empty($solicitacao->id_canal_entrada)                      ||
               empty($solicitacao->id_produto_intragov)                   ||
               empty($solicitacao->servico_intragov)                      ||
               ($solicitacao->qtd_acessos == "")                          ||    
               empty($solicitacao->cnpj)                                  ||
               ($solicitacao->razao_social  == "")                        ||
               empty($solicitacao->data_abertura_gestao)                  ||
               empty($solicitacao->status)                                ||
               ($solicitacao->devolucao == "")                            ||
               ($solicitacao->servico_intragov == "Selecione o serviço")  
          )
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

      //busca data que o operador habilitou a solicitacao
     function verificaSolicitacaoPendente($id_solicitacao, $revisao)
     {
          $busca_solicitacao_tabela_pendentes = mysql_query("SELECT 
                                                            date_format(reg_data,'%d/%m/%Y') AS reg_data 
                                                       FROM usuario_solicitacao 
                                                       WHERE id_solicitacao = '$id_solicitacao' AND id_usuario = $id_usuario AND revisao = $revisao
                                                  ");

          if(mysql_affected_rows() > 0)
          {
                 while($linhaSolicitacao=mysql_fetch_array($busca_data_receb_solicitacao))
                 { 
                     $data_receb_solicitacao  = $linhaSolicitacao['reg_data'];
                 }

                 return $data_receb_solicitacao;
          } 
     }


     function verificaSituacaoSolicitacao($id_solicitacao, $revisao)
     {

           $verificaSolicitacao = mysql_query("SELECT * FROM intragov WHERE id_solicitacao = '$id_solicitacao' and revisao = $revisao and id_usuario_intragov is not null
                                                UNION SELECT * FROM intragov WHERE id_solicitacao = '$id_solicitacao' and revisao = $revisao-1 and id_usuario_intragov is not null");

           if(mysql_affected_rows() > 0)
           {
             return true;
           }
     }

     function buscaUltimaSolicitacaoCompletaByIdRevisao(SolicitacaoIntragov $solicitacao, $id_solicitacao, $revisao)
     {
          
          $busca_solicitacao_redistribuida = mysql_query("SELECT sf.id_solicitacao, sf.intragov, sp.situacao  FROM solicitacao_fases sf
                                                                LEFT JOIN solicitacoes_pendentes sp
                                                                ON sf.id_solicitacao = sp.id_solicitacao
                                                                WHERE 
                                                                sf.id_solicitacao = '$id_solicitacao'
                                                                AND sf.intragov = 'Com operador' 
                                                                AND sp.situacao = 'Corrigido' 
                                                          UNION
                                                          SELECT sf.id_solicitacao, sf.intragov, sp.situacao  FROM solicitacao_fases sf
                                                                LEFT JOIN solicitacoes_pendentes sp
                                                                ON sf.id_solicitacao = sp.id_solicitacao
                                                                WHERE 
                                                                sf.id_solicitacao = '$id_solicitacao'
                                                                AND sf.intragov = 'Com operador' 
                                                                AND sp.situacao IS NULL ");  
          //solicitacao redistribuida 
          if(mysql_affected_rows() > 0)
          {
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM intragov_historico 
                                                                        WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                  
                            $solicitacao->id_canal_entrada                  = $rsc['id_canal_entrada'];               
                            $solicitacao->id_produto_intragov               = $rsc['id_produto_intragov'];            
                            $solicitacao->servico_intragov                  = $rsc['servico_intragov'];               
                            $solicitacao->qtd_acessos                       = $rsc['qtd_acessos'];                    
                            $solicitacao->motivo_cancelamento               = $rsc['motivo_cancelamento'];            
                            $solicitacao->cnpj                              = $rsc['cnpj'];                           
                            $solicitacao->razao_social                      = $rsc['razao_social'];                   
                            $solicitacao->n_gestao_servicos                 = $rsc['n_gestao_servicos'];              
                            $solicitacao->data_abertura_gestao              = $rsc['data_abertura_gestao'];          
                            $solicitacao->motivo_devolucao                  = $rsc['motivo_devolucao'];               
                            $solicitacao->area_solicitante                  = $rsc['area_solicitante'];               
                            $solicitacao->data_devolucao                    = $rsc['data_devolucao'];                
                            $solicitacao->data_encerramento                 = $rsc['data_encerramento'];              
                            $solicitacao->status                            = $rsc['status'];   
                            $solicitacao->complemento_servico               = $rsc['complemento_servico'];
                            $solicitacao->obs                               = $rsc['obs'];
                       }

                       return $solicitacao;
                }
          }
          else
          {    
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM intragov_historico 
                                                                        WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao - 1
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                  
                            $solicitacao->id_canal_entrada                  = $rsc['id_canal_entrada'];               
                            $solicitacao->id_produto_intragov               = $rsc['id_produto_intragov'];            
                            $solicitacao->servico_intragov                  = $rsc['servico_intragov'];               
                            $solicitacao->qtd_acessos                       = $rsc['qtd_acessos'];                    
                            $solicitacao->motivo_cancelamento               = $rsc['motivo_cancelamento'];            
                            $solicitacao->cnpj                              = $rsc['cnpj'];                           
                            $solicitacao->razao_social                      = $rsc['razao_social'];                   
                            $solicitacao->n_gestao_servicos                 = $rsc['n_gestao_servicos'];              
                            $solicitacao->data_abertura_gestao              = $rsc['data_abertura_gestao'];          
                            $solicitacao->motivo_devolucao                  = $rsc['motivo_devolucao'];               
                            $solicitacao->area_solicitante                  = $rsc['area_solicitante'];               
                            $solicitacao->data_devolucao                    = $rsc['data_devolucao'];                
                            $solicitacao->data_encerramento                 = $rsc['data_encerramento'];              
                            $solicitacao->status                            = $rsc['status'];   
                            $solicitacao->complemento_servico               = $rsc['complemento_servico'];
                            $solicitacao->obs                               = $rsc['obs']; 
                       }

                       return $solicitacao;
                }
                else
                {
                      $solicitacao->id_canal_entrada                  = null;         
                      $solicitacao->id_produto_intragov               = null;         
                      $solicitacao->servico_intragov                  = null;         
                      $solicitacao->qtd_acessos                       = null;         
                      $solicitacao->motivo_cancelamento               = null;         
                      $solicitacao->cnpj                              = null;         
                      $solicitacao->razao_social                      = null;         
                      $solicitacao->n_gestao_servicos                 = null;         
                      $solicitacao->data_abertura_gestao              = null;        
                      $solicitacao->motivo_devolucao                  = null;         
                      $solicitacao->area_solicitante                  = null;         
                      $solicitacao->data_devolucao                    = null;        
                      $solicitacao->data_encerramento                 = null;         
                      $solicitacao->status                            = null;
                      $solicitacao->complemento_servico               = null;
                      $solicitacao->obs                               = null;


                       return $solicitacao;
                }
          }
      }

      function validaDatas(SolicitacaoIntragov $solicitacao)
      {
          $data_abertura_gestao = $solicitacao->data_abertura_gestao;
          $data_abertura_gestao = explode("/", $data_abertura_gestao);
          $data_abertura_gestao = $data_abertura_gestao[2] . "-" . $data_abertura_gestao[1] . "-" . $data_abertura_gestao[0];
          $data_abertura_gestao = strtotime($data_abertura_gestao);
          $data_abertura_gestao = date( "Y-m-d H:i:s", $data_abertura_gestao);

          $data_recebimento = $solicitacao->data_recebimento;
          $data_recebimento = explode("/", $data_recebimento);
          $data_recebimento = $data_recebimento[2] . "-" . $data_recebimento[1] . "-" . $data_recebimento[0];
          $data_recebimento = strtotime($data_recebimento);
          $data_recebimento = date( "Y-m-d H:i:s", $data_recebimento);

          if($solicitacao->data_encerramento != '')
          {
            $data_encerramento = $solicitacao->data_encerramento;
            $data_encerramento = explode("/", $data_encerramento);
            $data_encerramento = $data_encerramento[2] . "-" . $data_encerramento[1] . "-" . $data_encerramento[0];
            $data_encerramento = strtotime($data_encerramento);
            $data_encerramento = date( "Y-m-d H:i:s", $data_encerramento);
          }

          if($data_abertura_gestao < $data_recebimento)
          {
              //Data de recebimento da solicitação =< data de abertura do gestão
              return 1;
          }
          
          if($solicitacao->data_encerramento != '')
          {
            if($data_abertura_gestao > $data_encerramento)
            {
                //Data de abertura do gestão =< Data de encerramento
                return 2;
            }
          }
      }


      function validaGsProtocolo(SolicitacaoIntragov $solicitacao)
      {

           $verificaGsProtocolo = mysql_query("SELECT * FROM intragov 
                                              WHERE n_gestao_servicos = '$solicitacao->n_gestao_servicos' ORDER BY revisao DESC 
                                              LIMIT 1");
          if(mysql_affected_rows() > 0)
          {
             while($vgsp=mysql_fetch_array($verificaGsProtocolo))
             {                  
                   $gs             = $vgsp['n_gestao_servicos'];
                   $id_solicitacao = $vgsp['id_solicitacao'];
             }

             if($solicitacao->id_solicitacao != $id_solicitacao)
             {
                  return $id_solicitacao;
             }
             else
             {
                  return '';
             }
         }
         else
         {
              return '';
         }
      }
}
