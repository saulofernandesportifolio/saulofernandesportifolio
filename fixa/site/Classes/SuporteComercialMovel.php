<?php

class SuporteComercialMovel 
{
	  public $operadorSuporteComercialMovel; 
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
    public $simulacao;
    public $uf; 
    public $valor; 
    public $obs; 
    public $status_solicitacao; 
    public $motivo_devolucao; 
    public $descricao_motivo_devolucao;    
    public $regDataEntrada;

     function __construct($operadorSuporteComercialMovel, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $servico, $complemento_servico, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $simulacao,$uf, $valor, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao) 
      {
          $this->operadorSuporteComercialMovel  = $operadorSuporteComercialMovel; 
          $this->id_solicitacao                 = $id_solicitacao; 
          $this->data_recebimento_solicitacao   = $data_recebimento_solicitacao; 
          $this->canal_entrada                  = $canal_entrada; 
          $this->categoria_produto              = $categoria_produto; 
          $this->produto                        = $produto; 
          $this->servico                        = $servico; 
          $this->complemento_servico            = $complemento_servico; 
          $this->quantidade                     = $quantidade; 
          $this->cnpj_cpf                       = $cnpj_cpf; 
          $this->razao_social                   = $razao_social; 
          $this->gerente_vendas                 = $gerente_vendas; 
          $this->gerente_negocio                = $gerente_negocio; 
          $this->simulacao                      = $simulacao;
          $this->uf                             = $uf; 
          $this->valor                          = $valor; 
          $this->obs                            = $obs; 
          $this->status_solicitacao             = $status_solicitacao; 
          $this->motivo_devolucao               = $motivo_devolucao; 
          $this->descricao_motivo_devolucao     = $descricao_motivo_devolucao;    
          $this->regDataEntrada                 = date("Y-m-d H:i:s");
      }


      function validaCamposObrigatoriosManual(SuporteComercialMovel $suporteComercialMovel)
      {
           if(
                ($suporteComercialMovel->id_solicitacao               == "")                                   ||
                ($suporteComercialMovel->data_recebimento_solicitacao == "")                                   ||
                ($suporteComercialMovel->canal_entrada                == "")                                   ||
                ($suporteComercialMovel->categoria_produto            == "")                                   ||
                ($suporteComercialMovel->produto                      == "")                                   ||
                ($suporteComercialMovel->servico                      == "")                                   ||
                ($suporteComercialMovel->servico                      == "Selecione o serviço")                ||
                ($suporteComercialMovel->complemento_servico          == "Selecione o complemento do serviço") ||
                ($suporteComercialMovel->complemento_servico          == "")                                   ||
                ($suporteComercialMovel->quantidade                   == "")                                   ||
                ($suporteComercialMovel->cnpj_cpf                     == "")                                   ||
                ($suporteComercialMovel->razao_social                 == "")                                   ||
                ($suporteComercialMovel->gerente_vendas               == "")                                   ||
                ($suporteComercialMovel->gerente_negocio              == "")                                   ||
                ($suporteComercialMovel->simulacao                    == "")                                   ||
                ($suporteComercialMovel->uf                           == "")                                   ||
                ($suporteComercialMovel->valor                        == "")                                   ||
                ($suporteComercialMovel->status_solicitacao           == "")                                             
             )
            {
              return true;
            }
      }

      function validaCamposObrigatoriosDevolucao(SuporteComercialMovel $suporteComercialMovel)
      {
        if(
              ($suporteComercialMovel->motivo_devolucao == "")                   || 
              ($suporteComercialMovel->descricao_motivo_devolucao == "")         ||                                         
              ($suporteComercialMovel->motivo_devolucao == "Selecione o motivo")   
             )
            {
              return true;
            }
      }

      function validaSolicitacao($id_solicitacao)
      {
          //verifica se ja nao existe solicitacao 
          $validaSolicitacaoImportada = mysql_query("SELECT id_solicitacao FROM SCMOVEL WHERE id_solicitacao = '$id_solicitacao'");
        
          if(mysql_affected_rows() > 0)
          {
              return true;
          }
      }


      function enviaDadosBase(suporteComercialMovel $suporteComercialMovel)
      {

             $dadosProc =  str_replace("&","E", $suporteComercialMovel->operadorSuporteComercialMovel)                  
                    . '$'. str_replace("&","E", $suporteComercialMovel->id_solicitacao)              
                    . '$'. str_replace("&","E", $suporteComercialMovel->data_recebimento_solicitacao)
                    . '$'. str_replace("&","E", $suporteComercialMovel->canal_entrada)               
                    . '$'. str_replace("&","E", $suporteComercialMovel->categoria_produto)           
                    . '$'. str_replace("&","E", $suporteComercialMovel->produto)                     
                    . '$'. str_replace("&","E", $suporteComercialMovel->servico)                     
                    . '$'. str_replace("&","E", $suporteComercialMovel->complemento_servico)         
                    . '$'. str_replace("&","E", $suporteComercialMovel->quantidade)                  
                    . '$'. str_replace("&","E", $suporteComercialMovel->cnpj_cpf)                    
                    . '$'. str_replace("&","E", $suporteComercialMovel->razao_social)                
                    . '$'. str_replace("&","E", $suporteComercialMovel->gerente_vendas)              
                    . '$'. str_replace("&","E", $suporteComercialMovel->gerente_negocio)
                    . '$'. str_replace("&","E", $suporteComercialMovel->simulacao)              
                    . '$'. str_replace("&","E", $suporteComercialMovel->uf)                          
                    . '$'. str_replace("&","E", $suporteComercialMovel->valor)              
                    . '$'. str_replace("&","E", $suporteComercialMovel->obs)                         
                    . '$'. str_replace("&","E", $suporteComercialMovel->status_solicitacao)          
                    . '$'. str_replace("&","E", $suporteComercialMovel->motivo_devolucao)            
                    . '$'. str_replace("&","E", $suporteComercialMovel->descricao_motivo_devolucao)  
                    . '$'. str_replace("&","E", $suporteComercialMovel->regDataEntrada);


           $sql_exec="CALL SP_SCMOVEL('$dadosProc');";
            
            $acao_exec= mysql_query($sql_exec) or die (mysql_error());
            
            return true;
      }
}
?>