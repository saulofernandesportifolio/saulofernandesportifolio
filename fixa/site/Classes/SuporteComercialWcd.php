<?php

class SuporteComercialWcd 
{
    public $operadorSuporteComercialWcd; 
    public $id_solicitacao; 
    public $canal_entrada; 
    public $data_recebimento_solicitacao; 
    public $categoria_produto; 
    public $produto; 
    public $quantidade; 
    public $cnpj_cpf; 
    public $razao_social; 
    public $gerente_vendas; 
    public $gerente_negocio; 
    public $oportunidade; 
    public $valor_proposta; 
    public $obs; 
    public $status_solicitacao; 
    public $motivo_devolucao; 
    public $descricao_motivo_devolucao;
    public $regDataEntrada;

     function __construct($operadorSuporteComercialWcd, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $categoria_produto, $produto, $quantidade, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $oportunidade, $valor_proposta, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao) 
      {
          $this->operadorSuporteComercialWcd    = $operadorSuporteComercialWcd; 
          $this->id_solicitacao                 = $id_solicitacao; 
          $this->canal_entrada                  = $canal_entrada; 
          $this->data_recebimento_solicitacao   = $data_recebimento_solicitacao; 
          $this->categoria_produto              = $categoria_produto; 
          $this->produto                        = $produto; 
          $this->quantidade                     = $quantidade; 
          $this->cnpj_cpf                       = $cnpj_cpf; 
          $this->razao_social                   = $razao_social; 
          $this->gerente_vendas                 = $gerente_vendas; 
          $this->gerente_negocio                = $gerente_negocio; 
          $this->oportunidade                   = $oportunidade; 
          $this->valor_proposta                 = $valor_proposta; 
          $this->obs                            = $obs; 
          $this->status_solicitacao             = $status_solicitacao; 
          $this->motivo_devolucao               = $motivo_devolucao; 
          $this->descricao_motivo_devolucao     = $descricao_motivo_devolucao;
          $this->regDataEntrada                 = date("Y-m-d H:i:s");
      }


      function validaCamposObrigatoriosManual(SuporteComercialWcd $suporteComercialwcd)
      {
           if(
               ($suporteComercialwcd->id_solicitacao                == "") ||                     
               ($suporteComercialwcd->canal_entrada                 == "") ||                
               ($suporteComercialwcd->data_recebimento_solicitacao  == "") || 
               ($suporteComercialwcd->categoria_produto             == "") ||            
               ($suporteComercialwcd->produto                       == "") ||                      
               ($suporteComercialwcd->quantidade                    == "") ||                   
               ($suporteComercialwcd->cnpj_cpf                      == "") ||                    
               ($suporteComercialwcd->razao_social                  == "") ||                 
               ($suporteComercialwcd->gerente_vendas                == "") ||               
               ($suporteComercialwcd->gerente_negocio               == "") ||              
               ($suporteComercialwcd->oportunidade                  == "") ||                 
               ($suporteComercialwcd->valor_proposta                == "") ||                               
               ($suporteComercialwcd->status_solicitacao            == "")                                                                                  
             )
            {
              return true;
            }
      }

      function validaCamposObrigatoriosDevolucao(SuporteComercialWcd $suporteComercialwcd)
      {
        if(
              ($suporteComercialwcd->motivo_devolucao == "")                   || 
              ($suporteComercialwcd->descricao_motivo_devolucao == "")         ||                                         
              ($suporteComercialwcd->motivo_devolucao == "Selecione o motivo")   
             )
            {
              return true;
            }
      }

      function validaSolicitacao($id_solicitacao)
      {
          //verifica se ja nao existe solicitacao 
          $validaSolicitacaoImportada = mysql_query("SELECT id_solicitacao FROM SCWCD WHERE id_solicitacao = '$id_solicitacao'");
        
          if(mysql_affected_rows() > 0)
          {
              return true;
          }
      }


      function enviaDadosBase(SuporteComercialWcd $suporteComercialwcd)
      {
               $dadosProc =  str_replace("&","E", $suporteComercialwcd->operadorSuporteComercialWcd) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->id_solicitacao) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->canal_entrada) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->data_recebimento_solicitacao) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->categoria_produto) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->produto) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->quantidade) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->cnpj_cpf) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->razao_social) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->gerente_vendas) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->gerente_negocio) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->oportunidade) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->valor_proposta) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->obs) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->status_solicitacao) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->motivo_devolucao) 
                      . '$'. str_replace("&","E", $suporteComercialwcd->descricao_motivo_devolucao)
                      . '$'. str_replace("&","E", $suporteComercialwcd->regDataEntrada); 

           $sql_exec="CALL SP_SCWCD('$dadosProc');";
            
            $acao_exec= mysql_query($sql_exec) or die (mysql_error());
            
            return true;
      }
}
?>