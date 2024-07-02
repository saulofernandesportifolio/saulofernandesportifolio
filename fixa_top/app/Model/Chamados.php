<?php

class Chamados{
	public $id_solicitacao;                    
	public $nro_chamado;                      
	public $sistema;                           
	public $motivo_devolucao;                  
	public $descricao_motivo_devolucao;        
	public $status;
	public $reg_data;                    
	public $reg_usuario;                 
	public $revisao;      
	public $obs;
	public $parecerTi;
	public $dataRetornoTi;
  public $comentario_chamado;

	function constroiChamados(Chamados $chamado, $id_solicitacao, $nro_chamado, $sistema, $motivo_devolucao, $descricao_motivo_devolucao, $status, $reg_data, $reg_usuario, $revisao, $obs, $comentario_chamado)
	{
		$chamado->id_solicitacao 			        = $id_solicitacao;
		$chamado->nro_chamado 				        = $nro_chamado;
		$chamado->sistema 					          = $sistema;
		$chamado->motivo_devolucao 			      = $motivo_devolucao;
		$chamado->descricao_motivo_devolucao  = $descricao_motivo_devolucao;
		$chamado->status 					            = $status;
		$chamado->reg_data					          = $reg_data;
		$chamado->reg_usuario 			          = $reg_usuario;
		$chamado->revisao 					          = $revisao;
		$chamado->obs 						            = $obs;
    $chamado->parecerTi                   = '';
    $chamado->dataRetornoTi               = '';
    $chamado->comentario_chamado          = $comentario_chamado;
	}

	 function validaCamposObrigatorios(Chamados $chamado)
     {
          //valida campos obrigatórios
          if(
               ($chamado->nro_chamado == "")    						||
               ($chamado->sistema == "")        						||
               ($chamado->motivo_devolucao == "")        				||
               ($chamado->descricao_motivo_devolucao == "")     		||
               ($chamado->status == "")        							||
               ($chamado->motivo_devolucao == "Selecione o motivo")     ||
               ($chamado->descricao_motivo_devolucao == "Selecione a descricao") 
          )
          {
               return true;
          }     
     }

     function buscaChamadoExistente(Chamados $chamado, $id_solicitacao, $nro_chamado, $revisao)
     {
     	 $buscaChamadoExistente = mysql_query("SELECT * FROM chamados 
 												WHERE id_solicitacao = '$id_solicitacao' 
 												AND revisao = $revisao
 												AND nro_chamado = '$nro_chamado'
                                              ");

          if(mysql_affected_rows() > 0)
          {
                 while($rowsChamado=mysql_fetch_array($buscaChamadoExistente))
                 { 
                      $chamado->id_solicitacao = $id_solicitacao;
                      $chamado->nro_chamado  = $rowsChamado['nro_chamado'];
                      $chamado->sistema = $rowsChamado['sistema'];
                      $chamado->motivo_devolucao = $rowsChamado['motivo_devolucao'];
                      $chamado->descricao_motivo_devolucao = $rowsChamado['descricao_motivo_devolucao'];
                 	    $chamado->status = $rowsChamado['status'];
                 	    $chamado->reg_data = $rowsChamado['reg_data'];
                 	    $chamado->reg_usuario = $rowsChamado['reg_usuario'];
                 	    $chamado->obs = $rowsChamado['obs'];
                      $chamado->revisao = $revisao;
                 }

                 return $chamado;
          } 
     }

     function validaDadosTI(Chamados $chamado)
     {
     	//valida campos obrigatórios
          if(
               ($chamado->status == "")        ||
               ($chamado->parecerTi == "")	   ||
               ($chamado->dataRetornoTi == "") 
          )
          {
               return true;
          }     
     }

     function verificaFaseSolicitacao($id_solicitacao, $revisao)
     {
        $verificaFaseSolicitacaoAgChamado = mysql_query("SELECT fase FROM solicitacoes_pendentes WHERE id_solicitacao = '$id_solicitacao' AND revisao = $revisao");
        if(mysql_affected_rows() > 0)
        {
               while($rowsFase=mysql_fetch_array($verificaFaseSolicitacaoAgChamado))
               {
                  $fase = $rowsFase['fase'];
               }
         }

         return $fase; 
     }
     
}


?>