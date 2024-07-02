<?php

class SolicitacaoGcom {           
	public $id_usuario_gcom;          
	public $data_receb_documento;     
	public $tipo_entrada;             
	public $id_contrato_mae;          
	public $data_assinatura_doc;      
	public $numero_documento;         
	public $id_sistema_validacao;     
	public $n_vantive;                
	public $id_produto;               
	public $data_tratativa;             
	public $nome_solicitante ;        
	public $n_gestao_servicos;        
	public $numero_wcd;               
	public $razao_social;             
	public $cnpj;                     
	public $plano_solicitado;         
	public $qtde_acesso;              
	public $data_encerramento;         
	public $reg_dt_entrada;           
	public $revisao;
	public $id_solicitacao;
  public $area_devolucao;
  public $motivo_devolucao;
  public $data_devolucao;
  public $devolucao; 
  public $aprovacao;
  public $status_solicitacao;
  public $data_assinatura_contrato;
  public $qtd_contrato_analisados;
 

	function constroiSolicitacaoGcom(SolicitacaoGcom $solicitacao, $n_gestao_servicos, $tipo_entrada, $id_contrato_mae, $data_assinatura_doc, $numero_documento, $id_sistema_validacao, $n_vantive, $id_produto, $data_tratativa, $nome_solicitante, $numero_wcd, $razao_social,$cnpj, $plano_solicitado, $qtde_acesso, $data_encerramento, $reg_dt_entrada, $devolucao, $aprovacao, $status_solicitacao, $data_assinatura_contrato, $qtd_contrato_analisados)
	{
  		$solicitacao->n_gestao_servicos 	             = $n_gestao_servicos;
  		$solicitacao->tipo_entrada			               = $tipo_entrada;             
  		$solicitacao->id_contrato_mae	  	             = $id_contrato_mae;          
  		$solicitacao->data_assinatura_doc	             = $data_assinatura_doc;      
  		$solicitacao->numero_documento		             = $numero_documento;         
  		$solicitacao->id_sistema_validacao	           = $id_sistema_validacao;     
  		$solicitacao->n_vantive				                 = $n_vantive;                
  		$solicitacao->id_produto			                 = $id_produto;               
  		$solicitacao->data_tratativa		               = $data_tratativa;             
  		$solicitacao->nome_solicitante 		             = $nome_solicitante;        
  		$solicitacao->numero_wcd			                 = $numero_wcd;               
  		$solicitacao->razao_social			               = $razao_social;             
  		$solicitacao->cnpj					                   = $cnpj;                     
  		$solicitacao->plano_solicitado		             = $plano_solicitado;         
  		$solicitacao->qtde_acesso			                 = $qtde_acesso;              
  		$solicitacao->data_encerramento		             = $data_encerramento;         
  		$solicitacao->reg_dt_entrada		               = $reg_dt_entrada;
      $solicitacao->devolucao                        = $devolucao;
	    $solicitacao->aprovacao                        = $aprovacao;
      $solicitacao->status_solicitacao               = $status_solicitacao;
      $solicitacao->motivo_devolucao                 = ''; 
      $solicitacao->descricao_motivo_devolucao       = ''; 
      $solicitacao->area_devolucao                   = ''; 
      $solicitacao->data_assinatura_contrato         = $data_assinatura_contrato;
      $solicitacao->qtd_contrato_analisados          = $qtd_contrato_analisados;                
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

     function validaCamposObrigatorios(SolicitacaoGcom $solicitacao)
     {
          //valida campos obrigatórios
          if(
          	   ($solicitacao->n_gestao_servicos == "")                     ||
               ($solicitacao->tipo_entrada == "")      		                 ||
               ($solicitacao->id_contrato_mae == "")                       ||
               ($solicitacao->data_assinatura_doc == "")   	               ||
               ($solicitacao->numero_documento == "")    	                 ||
       		     ($solicitacao->id_sistema_validacao == "")                  ||
               ($solicitacao->n_vantive == "")             	               ||    
               ($solicitacao->id_produto == "")                            ||
               ($solicitacao->data_tratativa == "")                        ||
               ($solicitacao->nome_solicitante == "")                      ||
               ($solicitacao->numero_wcd == "")                            ||
               ($solicitacao->razao_social == "")                          ||
               ($solicitacao->cnpj == "")                                  ||
               ($solicitacao->plano_solicitado == "")                      ||
               ($solicitacao->qtde_acesso == "")                           ||
               ($solicitacao->devolucao == "")                             ||
               ($solicitacao->aprovacao == "")                             ||
               ($solicitacao->status_solicitacao == "")                    ||
               ($solicitacao->data_assinatura_contrato == "")              ||
               ($solicitacao->qtd_contrato_analisados == "")      
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

           $verificaSolicitacao = mysql_query("SELECT * FROM gcom WHERE id_solicitacao = '$id_solicitacao' and revisao = $revisao and id_usuario_gcom is not null
                                                UNION SELECT * FROM gcom WHERE id_solicitacao = '$id_solicitacao' and revisao = $revisao-1 and id_usuario_gcom is not null");

           if(mysql_affected_rows() > 0)
           {
             return true;
           }
     }

     function buscaUltimaSolicitacaoCompletaByIdRevisao(SolicitacaoGcom $solicitacao, $id_solicitacao, $revisao)
     {
          
          $busca_solicitacao_redistribuida = mysql_query("SELECT sf.id_solicitacao, sf.gcom, sp.situacao  FROM solicitacao_fases sf
                                                                LEFT JOIN solicitacoes_pendentes sp
                                                                ON sf.id_solicitacao = sp.id_solicitacao
                                                                WHERE 
                                                                sf.id_solicitacao = '$id_solicitacao'
                                                                AND sf.gcom = 'Com operador' 
                                                                AND sp.situacao = 'Corrigido' 
                                                          UNION
                                                          SELECT sf.id_solicitacao, sf.gcom, sp.situacao  FROM solicitacao_fases sf
                                                                LEFT JOIN solicitacoes_pendentes sp
                                                                ON sf.id_solicitacao = sp.id_solicitacao
                                                                WHERE 
                                                                sf.id_solicitacao = '$id_solicitacao'
                                                                AND sf.gcom = 'Com operador' 
                                                                AND sp.situacao IS NULL ");  
          //solicitacao redistribuida 
          if(mysql_affected_rows() > 0)
          {
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM gcom_historico 
                                                                        WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                   
                							$solicitacao->tipo_entrada 			               = $rsc['tipo_entrada'];             
                							$solicitacao->id_contrato_mae 		             = $rsc['id_contrato_mae'];          
                							$solicitacao->data_assinatura_doc              = $rsc['data_assinatura_doc'];      
                							$solicitacao->numero_documento 		             = $rsc['numero_documento'];         
                							$solicitacao->id_sistema_validacao             = $rsc['id_sistema_validacao'];     
                							$solicitacao->n_vantive 			                 = $rsc['n_vantive'];                
                							$solicitacao->id_produto 			                 = $rsc['id_produto'];               
                							$solicitacao->data_tratativa 		               = $rsc['data_trativa'];             
                							$solicitacao->nome_solicitante  	             = $rsc['nome_solicitante'];        
                							$solicitacao->n_gestao_servicos 	             = $rsc['n_gestao_servicos'];        
                							$solicitacao->numero_wcd 			                 = $rsc['numero_wcd'];               
                							$solicitacao->razao_social 			               = $rsc['razao_social'];             
                							$solicitacao->cnpj 					                   = $rsc['cnpj'];                     
                							$solicitacao->plano_solicitado 		             = $rsc['plano_solicitado'];         
                							$solicitacao->qtde_acesso 			               = $rsc['qtde_acesso'];              
                							$solicitacao->data_encerramento                = $rsc['data_finalizacao'];         
                							$solicitacao->reg_dt_entrada 		               = $rsc['reg_dt_entrada'];           
                							$solicitacao->revisao 				                 = $rsc['revisao'];
                							$solicitacao->id_solicitacao 		               = $rsc['id_solicitacao'];
                              $solicitacao->data_assinatura_contrato         = $rsc['data_assinatura_contrato'];
                              $solicitacao->qtd_contrato_analisados          = $rsc['qtd_contrato_analisados'];
                       }

                       return $solicitacao;
                }
          }
          else
          {    
              //se for reentrada de item reprovado
              $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM gcom_historico 
                                                                        WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao - 1
                                                                        ORDER BY revisao DESC 
                                                                        LIMIT 1");
               if(mysql_affected_rows() > 0)
                {
                       while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                       {                  
                           	 $solicitacao->tipo_entrada 			              = $rsc['tipo_entrada'];             
							               $solicitacao->id_contrato_mae 		              = $rsc['id_contrato_mae'];          
							               $solicitacao->data_assinatura_doc 	            = $rsc['data_assinatura_doc'];      
							               $solicitacao->numero_documento 		            = $rsc['numero_documento'];         
							               $solicitacao->id_sistema_validacao             = $rsc['id_sistema_validacao'];     
							               $solicitacao->n_vantive 			                  = $rsc['n_vantive'];                
							               $solicitacao->id_produto 			                = $rsc['id_produto'];               
							               $solicitacao->data_tratativa 		              = $rsc['data_trativa'];             
							               $solicitacao->nome_solicitante  	              = $rsc['nome_solicitante'];        
							               $solicitacao->n_gestao_servicos 	              = $rsc['n_gestao_servicos'];        
							               $solicitacao->numero_wcd 			                = $rsc['numero_wcd'];               
							               $solicitacao->razao_social 			              = $rsc['razao_social'];             
							               $solicitacao->cnpj 					                  = $rsc['cnpj'];                     
							               $solicitacao->plano_solicitado 		            = $rsc['plano_solicitado'];         
							               $solicitacao->qtde_acesso 			                = $rsc['qtde_acesso'];              
							               $solicitacao->data_encerramento 		            = $rsc['data_finalizacao'];         
							               $solicitacao->reg_dt_entrada 		              = $rsc['reg_dt_entrada'];           
							               $solicitacao->revisao 				                  = $rsc['revisao'];
							               $solicitacao->id_solicitacao 		              = $rsc['id_solicitacao'];
                             $solicitacao->data_assinatura_contrato         = $rsc['data_assinatura_contrato'];
                             $solicitacao->qtd_contrato_analisados          = $rsc['qtd_contrato_analisados'];
                       }

                       return $solicitacao;
                }
                else
                {
                      	$solicitacao->tipo_entrada 			                = null;      
            						$solicitacao->id_contrato_mae 		              = null;      
            						$solicitacao->data_assinatura_doc 	            = null;      
            						$solicitacao->numero_documento 		              = null;      
            						$solicitacao->id_sistema_validacao 	            = null;     
            						$solicitacao->n_vantive 			                  = null;      
            						$solicitacao->id_produto 			                  = null;      
            						$solicitacao->data_tratativa 		                = null;      
            						$solicitacao->nome_solicitante  	              = null;     
            						$solicitacao->n_gestao_servicos 	              = null;      
            						$solicitacao->numero_wcd 			                  = null;      
            						$solicitacao->razao_social 			                = null;      
            						$solicitacao->cnpj 					                    = null;      
            						$solicitacao->plano_solicitado 		              = null;      
            						$solicitacao->qtde_acesso 			                = null;      
            						$solicitacao->data_encerramento 		            = null;      
            						$solicitacao->reg_dt_entrada 		                = null;      
            						$solicitacao->revisao 				                  = null;
            						$solicitacao->id_solicitacao 		                = null;
                        $solicitacao->data_assinatura_contrato          = null;
                        $solicitacao->qtd_contrato_analisados           = null;


                       return $solicitacao;
                }
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

      function validaDatas(SolicitacaoGcom $solicitacao)
      {

          $data_receb_documento = $solicitacao->data_receb_documento;
          $data_receb_documento = explode("/", $data_receb_documento);
          $data_receb_documento = $data_receb_documento[2] . "-" . $data_receb_documento[1] . "-" . $data_receb_documento[0];
          $data_receb_documento = strtotime($data_receb_documento);
          $data_receb_documento = date( "Y-m-d H:i:s", $data_receb_documento);

          $data_tratativa = $solicitacao->data_tratativa;
          $data_tratativa = explode("/", $data_tratativa);
          $data_tratativa = $data_tratativa[2] . "-" . $data_tratativa[1] . "-" . $data_tratativa[0];
          $data_tratativa = strtotime($data_tratativa);
          $data_tratativa = date( "Y-m-d H:i:s", $data_tratativa);

          $data_encerramento = $solicitacao->data_encerramento;
          $data_encerramento = explode("/", $data_encerramento);
          $data_encerramento = $data_encerramento[2] . "-" . $data_encerramento[1] . "-" . $data_encerramento[0];
          $data_encerramento = strtotime($data_encerramento);
          $data_encerramento = date( "Y-m-d H:i:s", $data_encerramento);


          if($data_receb_documento > $data_tratativa)
          {
              //Data de recebimento documento =< data tratativa
              return 1;
          }
          else if($data_encerramento < $data_receb_documento)
          {
              //Data de recebimento documento =< data tratativa
              return 2;
          }
      }

      function validaGsProtocolo(SolicitacaoGcom $solicitacao)
      {

           $verificaGsProtocolo = mysql_query("SELECT * FROM gcom 
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
?>
