<?php

class SuporteComercialSiscom 
{
	  public $id_usuario; 
    public $id_solicitacao; 
    public $data_recebimento_solicitacao; 
    public $canal_entrada; 
    public $categoria_produto; 
    public $produto; 
    public $servico; 
    public $complemento_servico; 
    public $quantidade; 
    public $cnpj_cpf; 
    public $razao_social; 
    public $gerente_vendas; 
    public $gerente_negocio; 
    public $uf; 
    public $valor_proposta; 
    public $obs; 
    public $status_solicitacao; 
    public $motivo_devolucao; 
    public $descricao_motivo_devolucao;
    public $regDataEntrada;

     function __construct($id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $servico, $complemento_servico, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $uf, $valor_proposta, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao) 
      {
          $this->id_usuario                   = $id_usuario;
          $this->id_solicitacao               = $id_solicitacao; 
          $this->data_recebimento_solicitacao = $data_recebimento_solicitacao; 
          $this->canal_entrada                = $canal_entrada; 
          $this->categoria_produto            = $categoria_produto; 
          $this->produto                      = $produto; 
          $this->servico                      = $servico; 
          $this->complemento_servico          = $complemento_servico; 
          $this->quantidade                   = $quantidade; 
          $this->cnpj_cpf                     = $cnpj_cpf; 
          $this->razao_social                 = $razao_social; 
          $this->gerente_vendas               = $gerente_vendas; 
          $this->gerente_negocio              = $gerente_negocio; 
          $this->uf                           = $uf; 
          $this->valor_proposta               = $valor_proposta; 
          $this->obs                          = $obs; 
          $this->status_solicitacao           = $status_solicitacao; 
          $this->motivo_devolucao             = $motivo_devolucao; 
          $this->descricao_motivo_devolucao   = $descricao_motivo_devolucao;
          $this->regDataEntrada               = date("Y-m-d H:i:s");
      }


      function validaCamposObrigatoriosManual(SuporteComercialSiscom $suporteComercialSiscom)
      {
           if(
                ($suporteComercialSiscom->id_solicitacao               == "")                                   ||
                ($suporteComercialSiscom->data_recebimento_solicitacao == "")                                   ||
                ($suporteComercialSiscom->canal_entrada                == "")                                   ||
                ($suporteComercialSiscom->categoria_produto            == "")                                   ||
                ($suporteComercialSiscom->produto                      == "")                                   ||
                ($suporteComercialSiscom->servico                      == "")                                   ||
                ($suporteComercialSiscom->servico                      == "Selecione o serviço")                ||
                ($suporteComercialSiscom->complemento_servico           == "Selecione o complemento do serviço") ||
                ($suporteComercialSiscom->complemento_servico          == "")                                   ||
                ($suporteComercialSiscom->quantidade                   == "")                                   ||
                ($suporteComercialSiscom->cnpj_cpf                     == "")                                   ||
                ($suporteComercialSiscom->razao_social                 == "")                                   ||
                ($suporteComercialSiscom->gerente_vendas               == "")                                   ||
                ($suporteComercialSiscom->gerente_negocio              == "")                                   ||
                ($suporteComercialSiscom->uf                           == "")                                   ||
                ($suporteComercialSiscom->valor_proposta               == "")                                   ||
                ($suporteComercialSiscom->status_solicitacao           == "")                                             
             )
            {
              return true;
            }
      }

      function validaCamposObrigatoriosDevolucao(SuporteComercialSiscom $suporteComercialSiscom)
      {
        if(
              ($suporteComercialSiscom->motivo_devolucao == "")                   || 
              ($suporteComercialSiscom->descricao_motivo_devolucao == "")         ||                                         
              ($suporteComercialSiscom->motivo_devolucao == "Selecione o motivo")   
             )
            {
              return true;
            }
      }

      function validaSolicitacao($id_solicitacao)
      {
          //verifica se ja nao existe solicitacao 
          $validaSolicitacaoImportada = mysql_query("SELECT id_solicitacao FROM SCSISCOM WHERE id_solicitacao = '$id_solicitacao'");
        
          if(mysql_affected_rows() > 0)
          {
              return true;
          }
      }


      function enviaDadosBase(SuporteComercialSiscom $suporteComercialSiscom)
      {

             $dadosProc =  str_replace("&","E", $suporteComercialSiscom->id_usuario)                  
                    . '$'. str_replace("&","E", $suporteComercialSiscom->id_solicitacao)              
                    . '$'. str_replace("&","E", $suporteComercialSiscom->data_recebimento_solicitacao)
                    . '$'. str_replace("&","E", $suporteComercialSiscom->canal_entrada)               
                    . '$'. str_replace("&","E", $suporteComercialSiscom->categoria_produto)           
                    . '$'. str_replace("&","E", $suporteComercialSiscom->produto)                     
                    . '$'. str_replace("&","E", $suporteComercialSiscom->servico)                     
                    . '$'. str_replace("&","E", $suporteComercialSiscom->complemento_servico)         
                    . '$'. str_replace("&","E", $suporteComercialSiscom->quantidade)                  
                    . '$'. str_replace("&","E", $suporteComercialSiscom->cnpj_cpf)                    
                    . '$'. str_replace("&","E", $suporteComercialSiscom->razao_social)                
                    . '$'. str_replace("&","E", $suporteComercialSiscom->gerente_vendas)              
                    . '$'. str_replace("&","E", $suporteComercialSiscom->gerente_negocio)             
                    . '$'. str_replace("&","E", $suporteComercialSiscom->uf)                          
                    . '$'. str_replace("&","E", $suporteComercialSiscom->valor_proposta)              
                    . '$'. str_replace("&","E", $suporteComercialSiscom->obs)                         
                    . '$'. str_replace("&","E", $suporteComercialSiscom->status_solicitacao)          
                    . '$'. str_replace("&","E", $suporteComercialSiscom->motivo_devolucao)            
                    . '$'. str_replace("&","E", $suporteComercialSiscom->descricao_motivo_devolucao)  
                    . '$'. str_replace("&","E", $suporteComercialSiscom->regDataEntrada);


           $sql_exec="CALL SP_SCSISCOM('$dadosProc');";
            
            $acao_exec= mysql_query($sql_exec) or die (mysql_error());
            
            return true;
      }
}
?>