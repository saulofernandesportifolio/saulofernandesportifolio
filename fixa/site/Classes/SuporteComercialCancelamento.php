<?php

class SuporteComercialCancelamento
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
    public $obs; 
    public $status_solicitacao; 
    public $motivo_devolucao; 
    public $descricao_motivo_devolucao;
    public $regDataEntrada;

     function __construct($id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $servico, $complemento_servico, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $uf, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao) 
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
          $this->obs                          = $obs; 
          $this->status_solicitacao           = $status_solicitacao; 
          $this->motivo_devolucao             = $motivo_devolucao; 
          $this->descricao_motivo_devolucao   = $descricao_motivo_devolucao;
          $this->regDataEntrada               = date("Y-m-d H:i:s");
      }


      function validaCamposObrigatoriosManual(SuporteComercialCancelamento $suporteComercialCancelamento)
      {
           if(
                ($suporteComercialCancelamento->id_solicitacao               == "")                                   ||
                ($suporteComercialCancelamento->data_recebimento_solicitacao == "")                                   ||
                ($suporteComercialCancelamento->canal_entrada                == "")                                   ||
                ($suporteComercialCancelamento->categoria_produto            == "")                                   ||
                ($suporteComercialCancelamento->produto                      == "")                                   ||
                ($suporteComercialCancelamento->servico                      == "")                                   ||
                ($suporteComercialCancelamento->servico                      == "Selecione o serviço")                ||
                ($suporteComercialCancelamento->complemento_servico          == "Selecione o complemento do serviço")||
                ($suporteComercialCancelamento->complemento_servico          == "")                                   ||
                ($suporteComercialCancelamento->quantidade                   == "")                                   ||
                ($suporteComercialCancelamento->cnpj_cpf                     == "")                                   ||
                ($suporteComercialCancelamento->razao_social                 == "")                                   ||
                ($suporteComercialCancelamento->gerente_vendas               == "")                                   ||
                ($suporteComercialCancelamento->gerente_negocio              == "")                                   ||
                ($suporteComercialCancelamento->uf                           == "")                                   ||
                ($suporteComercialCancelamento->status_solicitacao           == "")                                             
             )
            {
              return true;
            }
      }

      function validaCamposObrigatoriosDevolucao(SuporteComercialCancelamento $suporteComercialCancelamento)
      {
        if(
              ($suporteComercialCancelamento->motivo_devolucao == "")                   || 
              ($suporteComercialCancelamento->descricao_motivo_devolucao == "")         ||                                         
              ($suporteComercialCancelamento->motivo_devolucao == "Selecione o motivo")   
             )
            {
              return true;
            }
      }

      function validaSolicitacao($id_solicitacao)
      {
          //verifica se ja nao existe solicitacao 
          $validaSolicitacaoImportada = mysql_query("SELECT id_solicitacao FROM SCCANCELAMENTO WHERE id_solicitacao = '$id_solicitacao'");
        
          if(mysql_affected_rows() > 0)
          {
              return true;
          }
      }


      function enviaDadosBase(SuporteComercialCancelamento $suporteComercialCancelamento)
      {

             $dadosProc =  str_replace("&","E", $suporteComercialCancelamento->id_usuario)                  
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->id_solicitacao)              
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->data_recebimento_solicitacao)
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->canal_entrada)               
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->categoria_produto)           
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->produto)                     
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->servico)                     
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->complemento_servico)         
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->quantidade)                  
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->cnpj_cpf)                    
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->razao_social)                
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->gerente_vendas)              
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->gerente_negocio)             
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->uf)         
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->obs)                         
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->status_solicitacao)          
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->motivo_devolucao)            
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->descricao_motivo_devolucao)  
                    . '$'. str_replace("&","E", $suporteComercialCancelamento->regDataEntrada);


           $sql_exec="CALL SP_SCCANCELAMENTO('$dadosProc');";
            
            $acao_exec= mysql_query($sql_exec) or die (mysql_error());
            
            return true;
      }
}
?>