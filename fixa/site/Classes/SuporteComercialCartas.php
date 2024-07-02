<?php

class SuporteComercialCartas 
{
    public $operadorSuporteComercialCartas; 
    public $id_solicitacao; 
    public $canal_entrada; 
    public $data_recebimento_solicitacao; 
    public $tipo_documento; 
    public $cnpj_cpf; 
    public $razao_social; 
    public $gerente_vendas; 
    public $gerente_negocio; 
    public $data_envio_cliente; 
    public $endereco_envio; 
    public $obs; 
    public $status_solicitacao; 
    public $motivo_devolucao; 
    public $descricao_motivo_devolucao;    
    public $regDataEntrada;

     function __construct($operadorSuporteComercialCartas, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $tipo_documento, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $data_envio_cliente, $endereco_envio, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao) 
      {
          $this->operadorSuporteComercialCartas     = $operadorSuporteComercialCartas; 
          $this->id_solicitacao                     = $id_solicitacao; 
          $this->canal_entrada                      = $canal_entrada; 
          $this->data_recebimento_solicitacao       = $data_recebimento_solicitacao; 
          $this->tipo_documento                     = $tipo_documento; 
          $this->cnpj_cpf                           = $cnpj_cpf; 
          $this->razao_social                       = $razao_social; 
          $this->gerente_vendas                     = $gerente_vendas; 
          $this->gerente_negocio                    = $gerente_negocio;
          $this->data_envio_cliente                 = $data_envio_cliente;
          $this->endereco_envio                     = $endereco_envio; 
          $this->obs                                = $obs; 
          $this->status_solicitacao                 = $status_solicitacao; 
          $this->motivo_devolucao                   = $motivo_devolucao; 
          $this->descricao_motivo_devolucao         = $descricao_motivo_devolucao;
          $this->regDataEntrada                     = date("Y-m-d H:i:s");
      }


      function validaCamposObrigatoriosManual(SuporteComercialCartas $suporteComercialCartas)
      {
           if(
               ($suporteComercialCartas->id_solicitacao                == "") ||                     
               ($suporteComercialCartas->canal_entrada                 == "") ||                
               ($suporteComercialCartas->data_recebimento_solicitacao  == "") || 
               ($suporteComercialCartas->tipo_documento                == "") ||                     
               ($suporteComercialCartas->cnpj_cpf                      == "") ||                    
               ($suporteComercialCartas->razao_social                  == "") ||                 
               ($suporteComercialCartas->gerente_vendas                == "") ||               
               ($suporteComercialCartas->gerente_negocio               == "") ||
               ($suporteComercialCartas->data_envio_cliente            == "") ||
               ($suporteComercialCartas->endereco_envio                == "") ||                               
               ($suporteComercialCartas->status_solicitacao            == "")                                                                                  
             )
            {
              return true;
            }
      }

      function validaCamposObrigatoriosDevolucao(SuporteComercialCartas $suporteComercialCartas)
      {
        if(
              ($suporteComercialCartas->motivo_devolucao == "")                   || 
              ($suporteComercialCartas->descricao_motivo_devolucao == "")         ||                                         
              ($suporteComercialCartas->motivo_devolucao == "Selecione o motivo")   
             )
            {
              return true;
            }
      }

      function validaSolicitacao($id_solicitacao)
      {
          //verifica se ja nao existe solicitacao 
          $validaSolicitacaoImportada = mysql_query("SELECT id_solicitacao FROM SCCARTAS WHERE id_solicitacao = '$id_solicitacao'");
        
          if(mysql_affected_rows() > 0)
          {
              return true;
          }
      }


      function enviaDadosBase(SuporteComercialCartas $suporteComercialCartas)
      {
               $dadosProc =  str_replace("&","E", $suporteComercialCartas->operadorSuporteComercialCartas) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->id_solicitacao) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->canal_entrada) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->data_recebimento_solicitacao) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->tipo_documento) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->cnpj_cpf) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->razao_social) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->gerente_vendas) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->gerente_negocio)
                      . '$'. str_replace("&","E", $suporteComercialCartas->data_envio_cliente) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->endereco_envio)  
                      . '$'. str_replace("&","E", $suporteComercialCartas->obs) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->status_solicitacao) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->motivo_devolucao) 
                      . '$'. str_replace("&","E", $suporteComercialCartas->descricao_motivo_devolucao)
                      . '$'. str_replace("&","E", $suporteComercialCartas->regDataEntrada); 

           $sql_exec="CALL SP_SCCARTAS('$dadosProc');";
            
            $acao_exec= mysql_query($sql_exec) or die (mysql_error());
            
            return true;
      }
}
?>