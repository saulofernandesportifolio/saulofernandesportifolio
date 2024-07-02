<?php

class SolicitacaoPreTramitacao {
	 public $id_usuario; 
     public $id_solicitacao; 
     public $cat_prod; 
     public $devolucao; 
     public $canal_entrada;
     public $data_receb;
     public $produto;
     public $tipo_solicitacao;
     public $servicos;
     public $cnpj;
     public $razao_social;
     public $qtd_acessos;
     public $n_gs;
     public $data_abertura_gestao;
     public $area_devolucao;
     public $motivo_devolucao;
     public $data_devolucao;
     public $status_solicitacao;
     public $obs;
     public $aprovacao;
     public $data_entrada_siscom;
     public $descricao_motivo_devolucao;
     public $chamado_remedy;
     public $revisao;
     public $status_id_solicitacao;
     public $complemento_tipo_solicitacao;
     public $data_pedido_cancelamento_cliente;

     //construtor solicitacoes manuais	
	  function constroiSolicitacaoManual(SolicitacaoPreTramitacao $solicitacao, $cat_prod, $devolucao, $canal_entrada, $produto, $tipo_solicitacao, $servicos, $cnpj, $razao_social, $qtd_acessos, $n_gs, $data_abertura_gestao, $status_solicitacao, $obs, $aprovacao, $complemento_tipo_solicitacao) 
	  {
	    	$solicitacao->cat_prod 				           = $cat_prod; 
     		$solicitacao->devolucao 			           = $devolucao; 
     		$solicitacao->canal_entrada 		           = $canal_entrada;
       	    $solicitacao->produto 				           = $produto;
     		$solicitacao->tipo_solicitacao 		           = $tipo_solicitacao;
     		$solicitacao->servicos 				           = $servicos;
     		$solicitacao->cnpj 					           = $cnpj;
     		$solicitacao->razao_social 			           = $razao_social;
     		$solicitacao->qtd_acessos 			           = $qtd_acessos;
     		$solicitacao->n_gs 					           = $n_gs;
     		$solicitacao->data_abertura_gestao 	           = $data_abertura_gestao;
     		$solicitacao->status_solicitacao 	           = $status_solicitacao;
     		$solicitacao->obs 					           = $obs;
     		$solicitacao->aprovacao 			           = $aprovacao;
            $solicitacao->complemento_tipo_solicitacao     = $complemento_tipo_solicitacao;

     		return $solicitacao;
	  }

	  //construtor solicitacoes importadas
	  function constroiSolicitacaoid_solicitacao(SolicitacaoPreTramitacao $solicitacao, $tipo_solicitacao, $n_gs, $data_abertura_gestao, $status_solicitacao, $aprovacao, $obs, $devolucao, $complemento_tipo_solicitacao, $qtd_acessos)
	  {
      	    $solicitacao->tipo_solicitacao                 = $tipo_solicitacao;
     		$solicitacao->n_gs 					           = $n_gs;
     		$solicitacao->data_abertura_gestao             = $data_abertura_gestao;
     		$solicitacao->status_solicitacao	           = $status_solicitacao;
     		$solicitacao->aprovacao 			           = $aprovacao;
     		$solicitacao->obs 					           = $obs;
     		$solicitacao->devolucao                        = $devolucao;	
            $solicitacao->complemento_tipo_solicitacao     = $complemento_tipo_solicitacao;
            $solicitacao->qtd_acessos                      = $qtd_acessos;

     		return $solicitacao;
	  }

    //SOLICITACAO MANUAL
    function buscaRevisaoByIdSolicitacao($ids)
    {
        //busca revisao atual
        $buscaRevisao=mysql_query("SELECT MAX(revisao) AS revisao FROM pre_tramitacao WHERE id_solicitacao = '$ids'");

         if(mysql_affected_rows() > 0)
         {
            while($rowBr=mysql_fetch_array($buscaRevisao))
            {
              $revisao = $rowBr['revisao'];
            }

            //adiciona + 1
            $revisao = $revisao + 1;
         }
         else
         {
            $revisao = 1;
         }

         return $revisao;
     
    }

     function buscaObjetoByIdsolicitacao(SolicitacaoPreTramitacao $solicitacao, $ids, $revisao)
     {
          $buscarsolicitacao=mysql_query("SELECT  
                                            pt.id_usuario_pre,          
                                            pt.id_solicitacao,              
                                            pt.cat_produto,            
                                            pt.id_canal_entrada,       
                                            pt.data_receb_solicitacao,          
                                            pt.id_produto,             
                                            pt.tipo_solicitacao,    
                                            pt.id_servicos,            
                                            pt.cnpj,                
                                            pt.razao_social,        
                                            pt.qtd_acessos,         
                                            pt.n_gestao_servicos,                
                                            pt.data_abert_gestao,
                                            pt.id_status_solicitacao,  
                                            pt.obs,                 
                                            sp.motivo,    
                                            sp.area,      
                                            pt.data_devolucao,      
                                            pt.devolucao,           
                                            pt.aprovado,           
                                            pt.data_entrada_siscom,
                                            sp.motivo_descricao,
                                            spc.chamado_remedy,
                                            pt.revisao,
                                            pt.complemento_tipo_solicitacao  
                                          FROM pre_tramitacao pt
                                          LEFT JOIN solicitacoes_pendentes sp
                                            ON  pt.id_solicitacao = sp.nro_solicitacao
                                          AND pt.revisao = sp.revisao
                                          LEFT JOIN solicitacoes_pendentes_chamados spc
                                            ON  pt.id_solicitacao = spc.nro_solicitacao
                                          WHERE pt.id_solicitacao = '$ids' AND pt.revisao = $revisao
                                          ");
              
              if(mysql_affected_rows() > 0)
              {
                    while($linha=mysql_fetch_array($buscarsolicitacao))
                    {      
                         $solicitacao->id_usuario                   = $linha['id_usuario_pre'];                    
                         $solicitacao->id_solicitacao               = $linha['id_solicitacao'];                            
                         $solicitacao->cat_prod                     = $linha['cat_produto'];                       
                         $solicitacao->canal_entrada                = $linha['id_canal_entrada'];                  
                         $solicitacao->data_receb                   = $linha['data_receb_solicitacao'];                               
                         $solicitacao->produto                      = $linha['id_produto'];                        
                         $solicitacao->tipo_solicitacao             = $linha['tipo_solicitacao'];         
                         $solicitacao->servicos                     = $linha['id_servicos'];                       
                         $solicitacao->cnpj                         = $linha['cnpj'];                              
                         $solicitacao->razao_social                 = $linha['razao_social'];                      
                         $solicitacao->qtd_acessos                  = $linha['qtd_acessos'];                       
                         $solicitacao->n_gs                         = $linha['n_gestao_servicos'];                 
                         $solicitacao->data_abertura_gestao         = $linha['data_abert_gestao'];                
                         $solicitacao->status_solicitacao           = $linha['id_status_solicitacao'];             
                         $solicitacao->obs                          = $linha['obs'];                               
                         $solicitacao->motivo_devolucao             = $linha['motivo'];
                         $solicitacao->descricao_motivo_devolucao   = $linha['motivo_descricao'];             
                         $solicitacao->area_devolucao               = $linha['area'];                    
                         $solicitacao->data_devolucao               = $linha['data_devolucao'];                    
                         $solicitacao->devolucao                    = $linha['devolucao'];                         
                         $solicitacao->aprovacao                    = $linha['aprovado'];                          
                         $solicitacao->data_entrada_siscom          = $linha['data_entrada_siscom'];
                         $solicitacao->chamado_remedy               = $linha['chamado_remedy'];
                         $solicitacao->revisao                      = $linha['revisao'];
                         $solicitacao->complemento_tipo_solicitacao = $linha['complemento_tipo_solicitacao']; 
                    }
              }

              return $solicitacao;
      }

	  function mostraObjeto() 
	  { 
        print "id_usuario "    		        . $this->id_usuario 			     . "<br/>";
    		print "id_solicitacao " 	   		          . $this->id_solicitacao 				     . "<br/>";
    		print "cat_prod " 	   		        . $this->cat_prod 				     . "<br/>";
    		print "devolucao "     		        . $this->devolucao 				     . "<br/>";
    		print "canal_entrada " 		        . $this->canal_entrada 			     . "<br/>";
    		print "data_receb "    		        . $this->data_receb 			     . "<br/>";
    		print "produto" 			        . $this->produto 				     . "<br/>";
    		print "tipo_solicitacao" 	        . $this->tipo_solicitacao 		     . "<br/>";
    		print "servicos" 			        . $this->servicos 				     . "<br/>";
    		print "cnpj" 				        . $this->cnpj 					     . "<br/>";
    		print "razao_social" 		        . $this->razao_social 			     . "<br/>";
    		print "qtd_acessos" 		        . $this->qtd_acessos 			     . "<br/>";
    		print "n_gs" 				        . $this->n_gs 					     . "<br/>";
    		print "data_abertura_gestao"        . $this->data_abertura_gestao	     . "<br/>";
    		print "area_devolucao" 		        . $this->area_devolucao 		     . "<br/>";
    		print "motivo_devolucao" 	        . $this->motivo_devolucao 		     . "<br/>";
    		print "data_devolucao" 		        . $this->data_devolucao 		     . "<br/>";
    		print "status_solicitacao" 	        . $this->status_solicitacao		     . "<br/>";
    		print "obs" 				        . $this->obs 					     . "<br/>";
    		print "aprovacao" 			        . $this->aprovacao				     . "<br/>";
    		print "data entrada id_solicitacao"         . $this->data_entrada_siscom         . "<br/>";
        print "descricao motivo devolucao"  . $this->descricao_motivo_devolucao  . "<br/>";
        print "chamado remedy"              . $this->chamado_remedy              . "<br/>";
      }

      function validaInputsObrigatorios(SolicitacaoPreTramitacao $solicitacao, $form)
      {
      		if($form == 'Manual')
      		{
		  		//valida campos obrigatórios
		        if(
		            ($solicitacao->id_solicitacao == "")               	                       ||
		            empty($solicitacao->cat_prod)             	                               ||
		            empty($solicitacao->canal_entrada)        	                               ||
		            empty($solicitacao->data_receb)    			                               ||
		            empty($solicitacao->produto)				                               ||
		            empty($solicitacao->tipo_solicitacao)		                               ||
		            empty($solicitacao->servicos)				                               ||
		            empty($solicitacao->cnpj)					                               || 
		            ($solicitacao->razao_social  == "")			                               ||
	            	($solicitacao->qtd_acessos  == "")			                               ||
		            ($solicitacao->n_gs == "")                	                               ||
		            empty($solicitacao->data_abertura_gestao)	                               ||
		            empty($solicitacao->status_solicitacao)		                               ||
		            empty($solicitacao->aprovacao)			                                   ||
                    empty($solicitacao->complemento_tipo_solicitacao)                          ||
                    ($solicitacao->tipo_solicitacao == "Selecione o serviço")                  ||
                    ($solicitacao->produto == "Selecione o produto")                           
		        ) 
		        {
		          return true;   
		        }
	        }
	        else if($form == 'Import')
	        {
	        	if(
	                empty($solicitacao->tipo_solicitacao)                                      ||
	                ($solicitacao->n_gs == "")                                                 ||
	                empty($solicitacao->data_abertura_gestao)                                  ||
	                empty($solicitacao->status_solicitacao)                                    ||
	                ($solicitacao->aprovacao == "")		                                       ||
                    empty($solicitacao->complemento_tipo_solicitacao)                          ||
                    ($solicitacao->tipo_solicitacao == "Selecione o serviço")                  ||
                    ($solicitacao->produto == "Selecione o produto")                           
                )
            	{
            		return true;
            	} 
	        }
	   }

	   function validaid_solicitacao($id_solicitacao)
	   {
		   //valida id_solicitacao
	        $query_valida_id_solicitacao = mysql_query("SELECT id_solicitacao FROM pre_tramitacao WHERE id_solicitacao != 0 AND id_solicitacao = '{$id_solicitacao}'");

	        //verifica na base se valor ja foi inserido
	        if(mysql_affected_rows() > 0)
	        {
	         	return true;  
	        }
        }

        function validaGs($ngs)
        {
	        //valida gestao servicos
	        $query_valida_gs = mysql_query("SELECT n_gestao_servicos FROM pre_tramitacao WHERE n_gestao_servicos != 0 and n_gestao_servicos = '{$ngs}'");

	        //valida numero do gs 
	        if(mysql_affected_rows() > 0)
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


        function buscaIdServicoByDescricao($servico)
        {
        	$buscarIdServico=mysql_query("SELECT id_servicos FROM servicos WHERE descricao LIKE '%$servico%'");
            if(mysql_affected_rows() > 0)
            {
                while($linhaServico=mysql_fetch_array($buscarIdServico))
                {
                    $servico = $linhaServico['id_servicos'];
                }

                return $servico;
            }

        }

        function buscaIdProdutoByDescricao($produto)
        {
        	$buscarIdProduto=mysql_query("SELECT id_produto FROM produto WHERE descricao LIKE '%$produto%'");
            if(mysql_affected_rows() > 0)
            {
                
                while($linhaProduto=mysql_fetch_array($buscarIdProduto))
                {
                    $produto = $linhaProduto['id_produto'];
          		  }

                return $produto;
            }

        }


        /***** Métodos para as solicitacoes que entraram via bases de id_solicitacao Vendas e id_solicitacao Servicos *****/

        //busca data que o supervisor distribuiu para o operador
        function buscaDataRecebimentoSolicitacao($ids, $id_usuario, $revisao)
        {
	       	$busca_data_receb_solicitacao = mysql_query("SELECT date_format(reg_data,'%d/%m/%Y') AS reg_data FROM usuario_solicitacao WHERE id_solicitacao = '$ids' AND id_usuario = $id_usuario AND revisao = $revisao");

       	  	if(mysql_affected_rows() > 0)
          	{
	            while($linhaSolicitacao=mysql_fetch_array($busca_data_receb_solicitacao))
	            { 
	                $data_receb_solicitacao  = $linhaSolicitacao['reg_data'];
	            }

	            return $data_receb_solicitacao;
            } 
        }

        function buscaDadosSiscomServico(SolicitacaoPreTramitacao $solicitacao, $ids, $revisao)
        {
        	$buscarsolicitacaoid_solicitacaoServico=mysql_query("SELECT * FROM siscom_servico WHERE nro_solicitacao = '$ids' AND revisao = $revisao");
                
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

                          $data = $ano . '/' . $mes . '/' . $dia;
                        }else{
                          $data = "";
                        }

                        $solicitacao->data_entrada_siscom      = $data;         
	                    $solicitacao->cnpj       		       = $linha['cnpj_cpf_cliente'];
	                    $solicitacao->razao_social             = $linha['razao_social_cliente'];
	                    $solicitacao->servicos                 = $linha['evento'];
                        $solicitacao->status_id_solicitacao            = $linha['status'];
	                  }
                }

                return $solicitacao;
        }

        function buscaDadosSiscomVendas(SolicitacaoPreTramitacao $solicitacao, $ids, $revisao)
        {
        	$buscarSolicitacaoid_solicitacaoVendas=mysql_query("SELECT * FROM siscom_vendas WHERE pacote = '$ids' AND revisao = $revisao");

                if(mysql_affected_rows() > 0)
                {
                    while($linha=mysql_fetch_array($buscarSolicitacaoid_solicitacaoVendas))
                    {
                      	$solicitacao->data_entrada_siscom 	  = $linha['data'];   
                        $solicitacao->cnpj  				  = $linha['cnpj_cpf_cliente'];      
                        $solicitacao->razao_social      	  = $linha['razao_social'];      
                        $solicitacao->servicos			      = $linha['servico'];      
                        $solicitacao->produto				  = $linha['produto'];      
                        $solicitacao->status_id_solicitacao   = $linha['status'];
                    }
                }

                return $solicitacao; 
        }

        function validaStatusSolicitacao(SolicitacaoPreTramitacao $solicitacao)
        {
            //se for voz o status somente podera ser ag. aprovação comercial quando for mais de 200 acessos
            if($solicitacao->status_solicitacao == 1 && $solicitacao->cat_prod == "Voz" && $solicitacao->qtd_acessos < 200)
            {
                return true;
            }
        }

        function validaDatas(SolicitacaoPreTramitacao $solicitacao)
        {
              $data_abertura_gestao = $solicitacao->data_abertura_gestao;
              $data_abertura_gestao = explode("/", $data_abertura_gestao);
              $data_abertura_gestao = $data_abertura_gestao[2] . "-" . $data_abertura_gestao[1] . "-" . $data_abertura_gestao[0];
              $data_abertura_gestao = strtotime($data_abertura_gestao);
              $data_abertura_gestao = date( "Y-m-d H:i:s", $data_abertura_gestao);

              $data_receb = $solicitacao->data_receb;
              $data_receb = explode("/", $data_receb);
              $data_receb = $data_receb[2] . "-" . $data_receb[1] . "-" . $data_receb[0];
              $data_receb = strtotime($data_receb);
              $data_receb = date( "Y-m-d H:i:s", $data_receb);

            //Data de recebimento da solicitação =< data de abertura do gestão
            if($data_abertura_gestao < $data_receb)
            {
                return true;
            }
        }

         function verificaSituacaoSolicitacao($id_solicitacao, $revisao)
         {

               $verificaSolicitacao = mysql_query("SELECT * FROM pre_tramitacao WHERE id_solicitacao = '$id_solicitacao' and revisao = $revisao and id_usuario_pre is not null
                                                    UNION SELECT * FROM pre_tramitacao WHERE id_solicitacao = '$id_solicitacao' and revisao = $revisao-1 and id_usuario_pre is not null");

               if(mysql_affected_rows() > 0)
               {
                 return true;
               }
         }

         function buscaUltimaSolicitacaoCompletaByIdRevisao(SolicitacaoPreTramitacao $solicitacao, $id_solicitacao, $revisao)
         {
              
              $busca_solicitacao_redistribuida = mysql_query("SELECT sf.id_solicitacao, sf.pre_tramitacao, sp.situacao  FROM solicitacao_fases sf
                                                                    LEFT JOIN solicitacoes_pendentes sp
                                                                    ON sf.id_solicitacao = sp.id_solicitacao
                                                                    WHERE 
                                                                    sf.id_solicitacao = '$id_solicitacao'
                                                                    AND sf.pre_tramitacao = 'Com operador' 
                                                                    AND sp.situacao = 'Corrigido' 
                                                              UNION
                                                              SELECT sf.id_solicitacao, sf.pre_tramitacao, sp.situacao  FROM solicitacao_fases sf
                                                                    LEFT JOIN solicitacoes_pendentes sp
                                                                    ON sf.id_solicitacao = sp.id_solicitacao
                                                                    WHERE 
                                                                    sf.id_solicitacao = '$id_solicitacao'
                                                                    AND sf.pre_tramitacao = 'Com operador' 
                                                                    AND sp.situacao IS NULL ");  
              //solicitacao redistribuida 
              if(mysql_affected_rows() > 0)
              {
                  //se for reentrada de item reprovado
                  $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM pre_tramitacao_historico 
                                                                            WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao
                                                                            ORDER BY revisao DESC 
                                                                            LIMIT 1");
                   if(mysql_affected_rows() > 0)
                    {
                           while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                           {                  
                                 $solicitacao->cat_prod                         = $rsc['cat_produto'];  
                                 $solicitacao->canal_entrada                    = $rsc['id_canal_entrada'];
                                 $solicitacao->data_receb                       = $rsc['data_receb_solicitacao'];
                                 $solicitacao->produto                          = $rsc['id_produto'];
                                 $solicitacao->tipo_solicitacao                 = $rsc['tipo_solicitacao'];
                                 $solicitacao->servicos                         = $rsc['id_servicos'];
                                 $solicitacao->cnpj                             = $rsc['cnpj'];
                                 $solicitacao->razao_social                     = $rsc['razao_social'];
                                 $solicitacao->qtd_acessos                      = $rsc['qtd_acessos'];
                                 $solicitacao->n_gs                             = $rsc['n_gestao_servicos'];
                                 $solicitacao->data_abertura_gestao             = $rsc['data_abert_gestao'];    
                                 $solicitacao->status_solicitacao               = $rsc['id_status_solicitacao'];
                                 $solicitacao->obs                              = $rsc['obs'];
                                 $solicitacao->data_entrada_siscom              = $rsc['data_entrada_siscom'];
                                 $solicitacao->complemento_tipo_solicitacao     = $rsc['complemento_tipo_solicitacao'];
                           }

                           return $solicitacao;
                    }
              }
              else
              {    
                  //se for reentrada de item reprovado
                  $buscaUltimaSolicitacaoCompletaByIdRevisao = mysql_query("SELECT * FROM pre_tramitacao_historico 
                                                                            WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao - 1
                                                                            ORDER BY revisao DESC 
                                                                            LIMIT 1");
                   if(mysql_affected_rows() > 0)
                    {
                           while($rsc=mysql_fetch_array($buscaUltimaSolicitacaoCompletaByIdRevisao))
                           {                  
                                 $solicitacao->cat_prod                         = $rsc['cat_produto'];  
                                 $solicitacao->canal_entrada                    = $rsc['id_canal_entrada'];
                                 $solicitacao->data_receb                       = $rsc['data_receb_solicitacao'];
                                 $solicitacao->produto                          = $rsc['id_produto'];
                                 $solicitacao->tipo_solicitacao                 = $rsc['tipo_solicitacao'];
                                 $solicitacao->servicos                         = $rsc['id_servicos'];
                                 $solicitacao->cnpj                             = $rsc['cnpj'];
                                 $solicitacao->razao_social                     = $rsc['razao_social'];
                                 $solicitacao->qtd_acessos                      = $rsc['qtd_acessos'];
                                 $solicitacao->n_gs                             = $rsc['n_gestao_servicos'];
                                 $solicitacao->data_abertura_gestao             = $rsc['data_abert_gestao'];    
                                 $solicitacao->status_solicitacao               = $rsc['id_status_solicitacao'];
                                 $solicitacao->obs                              = $rsc['obs'];
                                 $solicitacao->data_entrada_siscom              = $rsc['data_entrada_siscom'];
                                 $solicitacao->complemento_tipo_solicitacao     = $rsc['complemento_tipo_solicitacao'];
                           }

                           return $solicitacao;
                    }
                    else
                    {
                         $solicitacao->cat_prod                         = null;
                         $solicitacao->canal_entrada                    = null;
                         $solicitacao->data_receb                       = null;
                         $solicitacao->produto                          = null;
                         $solicitacao->tipo_solicitacao                 = null;
                         $solicitacao->servicos                         = null;
                         $solicitacao->cnpj                             = null;
                         $solicitacao->razao_social                     = null;
                         $solicitacao->qtd_acessos                      = null;
                         $solicitacao->n_gs                             = null;
                         $solicitacao->data_abertura_gestao             = null;
                         $solicitacao->status_solicitacao               = null;
                         $solicitacao->obs                              = null;
                         $solicitacao->data_entrada_siscom              = null;
                         $solicitacao->complemento_tipo_solicitacao     = null;

                        return $solicitacao;
                    }
              }
          }

          function consultaNumeroSolicitacoesPendentesPre($id_usuario)
          {
             $buscaNumeroSolicitacoesPendentesPre = mysql_query("SELECT  
                                                                        count(*) AS numero_solicitacoes
                                                                    FROM(
                                                                        SELECT  
                                                                            date_format(DATA,'%d/%m/%Y') AS DATA, 
                                                                            hora, 
                                                                            nro_solicitacao AS id_solicitacao, 
                                                                            importacao_data,
                                                                            cnpj_cpf_cliente AS cnpj,
                                                                            razao_social_cliente AS razao_social,
                                                                            '' AS e2e,
                                                                            status,
                                                                            acessos,
                                                                            revisao,
                                                                            'Siscom Servico' AS fonte,
                                                                            importacao_usuario,
                                                                            distribuido,
                                                                            '' AS produto
                                                                        FROM siscom_servico
                                                                        UNION ALL
                                                                        SELECT 
                                                                            DATA, 
                                                                            hora, 
                                                                            pacote  AS id_solicitacao,
                                                                            importacao_data,
                                                                            cnpj_cpf_cliente AS cnpj,
                                                                            razao_social AS razao_social,
                                                                            '' AS e2e,
                                                                            status,
                                                                            qtd AS acessos,
                                                                            revisao,
                                                                            'Siscom Vendas' AS fonte, 
                                                                            importacao_usuario,
                                                                            distribuido,
                                                                            produto
                                                                        FROM siscom_vendas
                                                                        WHERE produto IN(SELECT descricao FROM produto 
                                                                                    WHERE SUBSTRING(categoria_produto,1,5) 
                                                                                        IN(SELECT projeto FROM supervisor WHERE id_supervisor 
                                                                                            IN(SELECT id_supervisor FROM supervisor WHERE id_usuario = $id_usuario
                                                                                                UNION 
                                                                                                -- allow analista lider 
                                                                                                SELECT id_supervisor FROM usuario WHERE id_usuario = $id_usuario AND id_perfil in(4)
                                                                                               )
                                                                                           )
                                                                                        )
                                                                    ) AS siscom_solicitacoes
                                                                    INNER JOIN usuario u ON siscom_solicitacoes.importacao_usuario = u.id_usuario
                                                                    WHERE distribuido IS NULL");

                   
                           while($bnspp=mysql_fetch_array($buscaNumeroSolicitacoesPendentesPre))
                           {                  
                                 $numero_solicitacoes = $bnspp['numero_solicitacoes'];
                           }

                           return $numero_solicitacoes;
            }   

            function validaGsProtocolo(SolicitacaoPreTramitacao $solicitacao)
            {
                 $verificaGsProtocolo = mysql_query("SELECT * FROM pre_tramitacao 
                                                    WHERE n_gestao_servicos = '$solicitacao->n_gs' ORDER BY revisao DESC 
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