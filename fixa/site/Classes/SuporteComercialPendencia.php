<?php

class SuporteComercialPendencia 
{
	  public $operadorSuporteComercialPendencia; 
    public $id_solicitacao; 
    public $data_recebimento_solicitacao; 
    public $canal_entrada; 
    public $categoria_produto; 
    public $produto; 
    public $cnpj_cpf; 
    public $razao_social; 
    public $gerente_senior; 
    public $gerente_negocio; 
    public $diretor; 
    public $data_base; 
    public $prazo_contratual; 
    public $valor_pendencia; 
    public $fup_envio; 
    public $obs; 
    public $status_solicitacao; 
    public $devido;
    public $motivo_devolucao;
    public $descricao_motivo_devolucao;
    public $regDataEntrada;

     function __construct($operadorSuporteComercialPendencia, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $categoria_produto, $produto, $cnpj_cpf, $razao_social, $gerente_senior, $gerente_negocio, $diretor, $data_base, $prazo_contratual, $valor_pendencia, $fup_envio, $obs, $status_solicitacao, $devido,$motivo_devolucao,$descricao_motivo_devolucao) 
      {
          $this->operadorSuporteComercialPendencia = $operadorSuporteComercialPendencia; 
          $this->id_solicitacao                    = $id_solicitacao; 
          $this->data_recebimento_solicitacao      = $data_recebimento_solicitacao; 
          $this->canal_entrada                     = $canal_entrada; 
          $this->categoria_produto                 = $categoria_produto; 
          $this->produto                           = $produto; 
          $this->cnpj_cpf                          = $cnpj_cpf; 
          $this->razao_social                      = $razao_social; 
          $this->gerente_senior                    = $gerente_senior; 
          $this->gerente_negocio                   = $gerente_negocio; 
          $this->diretor                           = $diretor; 
          $this->data_base                         = $data_base; 
          $this->prazo_contratual                  = $prazo_contratual; 
          $this->valor_pendencia                   = $valor_pendencia; 
          $this->fup_envio                         = $fup_envio; 
          $this->obs                               = $obs; 
          $this->status_solicitacao                = $status_solicitacao; 
          $this->devido                            = $devido;
          $this->motivo_devolucao                  = $motivo_devolucao;
          $this->descricao_motivo_devolucao        = $descricao_motivo_devolucao;
          $this->regDataEntrada                    = date("Y-m-d H:i:s");
      }


      function validaCamposObrigatoriosManual(SuporteComercialPendencia $suporteComercialPendencia)
      {
           if(
                 ($suporteComercialPendencia->operadorSuporteComercialPendencia == "")  ||
                 ($suporteComercialPendencia->id_solicitacao    == "")                  ||                
                 ($suporteComercialPendencia->data_recebimento_solicitacao   == "")     ||   
                 ($suporteComercialPendencia->canal_entrada     == "")                  ||                
                 ($suporteComercialPendencia->categoria_produto   == "")                ||              
                 ($suporteComercialPendencia->produto  == "")                           ||                         
                 ($suporteComercialPendencia->cnpj_cpf   == "")                         ||                       
                 ($suporteComercialPendencia->razao_social == "")                       ||                     
                 ($suporteComercialPendencia->gerente_senior  == "")                    ||                  
                 ($suporteComercialPendencia->gerente_negocio  == "")                   ||                 
                 ($suporteComercialPendencia->diretor  == "")                           ||                         
                 ($suporteComercialPendencia->data_base  == "")                         ||                       
                 ($suporteComercialPendencia->prazo_contratual  == "")                  ||                
                 ($suporteComercialPendencia->valor_pendencia   == "")                  ||                
                 ($suporteComercialPendencia->fup_envio  == "")                         ||                       
                 ($suporteComercialPendencia->status_solicitacao  == "")                ||              
                 ($suporteComercialPendencia->devido    == "")                               
         
             )
            {
              return true;
            }
      }

      function validaCamposObrigatoriosDevolucao(SuporteComercialPendencia $suporteComercialPendencia)
      {
        if(
              ($suporteComercialPendencia->motivo_devolucao == "")                   || 
              ($suporteComercialPendencia->descricao_motivo_devolucao == "")         ||                                         
              ($suporteComercialPendencia->motivo_devolucao == "Selecione o motivo")   
             )
            {
              return true;
            }
      }

      function validaSolicitacao($id_solicitacao)
      {
          //verifica se ja nao existe solicitacao 
          $validaSolicitacaoImportada = mysql_query("SELECT id_solicitacao FROM SCPENDENCIA WHERE id_solicitacao = '$id_solicitacao'");
        
          if(mysql_affected_rows() > 0)
          {
              return true;
          }
      }


      function enviaDadosBase(SuporteComercialPendencia $suporteComercialPendencia)
      {

             $dadosProc =  str_replace("&","E", $suporteComercialPendencia->operadorSuporteComercialPendencia) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->id_solicitacao) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->data_recebimento_solicitacao) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->canal_entrada) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->categoria_produto) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->produto) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->cnpj_cpf) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->razao_social) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->gerente_senior) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->gerente_negocio) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->diretor) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->data_base) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->prazo_contratual) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->valor_pendencia) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->fup_envio) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->obs) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->status_solicitacao) 
                    . '$'. str_replace("&","E", $suporteComercialPendencia->devido)
                    . '$'. str_replace("&","E", $suporteComercialPendencia->motivo_devolucao)
                    . '$'. str_replace("&","E", $suporteComercialPendencia->descricao_motivo_devolucao)
                    . '$'. str_replace("&","E", $suporteComercialPendencia->regDataEntrada);

           $sql_exec="CALL SP_SCPENDENCIA('$dadosProc');";
            
            $acao_exec= mysql_query($sql_exec) or die (mysql_error());
            
            return true;
      }
}
?>