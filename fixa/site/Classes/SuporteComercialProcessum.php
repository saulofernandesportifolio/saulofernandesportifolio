<?php

class SuporteComercialProcessum 
{
    public $operadorSuporteComercialProcessum; 
    public $id_solicitacao;
    public $canal_entrada;
    public $data_recebimento_solicitacao;
    public $categoria_produto;
    public $cnpj_cpf;
    public $razao_social;
    public $gerente_vendas;
    public $gerente_negocio;
    public $obs;
    public $status_solicitacao;
    public $motivo_devolucao;
    public $descricao_motivo_devolucao;
    public $regDataEntrada;

     function __construct($operadorSuporteComercialProcessum, $id_solicitacao, $canal_entrada, $data_recebimento_solicitacao, $categoria_produto, $cnpj_cpf, $razao_social, $gerente_vendas, $gerente_negocio, $obs, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao) 
      {
          $this->operadorSuporteComercialProcessum  = $operadorSuporteComercialProcessum; 
          $this->id_solicitacao                     = $id_solicitacao; 
          $this->canal_entrada                      = $canal_entrada; 
          $this->data_recebimento_solicitacao       = $data_recebimento_solicitacao; 
          $this->categoria_produto                  = $categoria_produto; 
          $this->cnpj_cpf                           = $cnpj_cpf; 
          $this->razao_social                       = $razao_social; 
          $this->gerente_vendas                     = $gerente_vendas; 
          $this->gerente_negocio                    = $gerente_negocio; 
          $this->obs                                = $obs; 
          $this->status_solicitacao                 = $status_solicitacao; 
          $this->motivo_devolucao                   = $motivo_devolucao; 
          $this->descricao_motivo_devolucao         = $descricao_motivo_devolucao;
          $this->regDataEntrada                     = date("Y-m-d H:i:s");
      }


      function validaCamposObrigatoriosManual(SuporteComercialProcessum $suporteComercialProcessum)
      {
           if(
               ($suporteComercialProcessum->id_solicitacao                == "") ||                     
               ($suporteComercialProcessum->canal_entrada                 == "") ||                
               ($suporteComercialProcessum->data_recebimento_solicitacao  == "") || 
               ($suporteComercialProcessum->categoria_produto             == "") ||                     
               ($suporteComercialProcessum->cnpj_cpf                      == "") ||                    
               ($suporteComercialProcessum->razao_social                  == "") ||                 
               ($suporteComercialProcessum->gerente_vendas                == "") ||               
               ($suporteComercialProcessum->gerente_negocio               == "") ||                              
               ($suporteComercialProcessum->status_solicitacao            == "")                                                                                  
             )
            {
              return true;
            }
      }

      function validaCamposObrigatoriosDevolucao(SuporteComercialProcessum $suporteComercialProcessum)
      {
        if(
              ($suporteComercialProcessum->motivo_devolucao == "")                   || 
              ($suporteComercialProcessum->descricao_motivo_devolucao == "")         ||                                         
              ($suporteComercialProcessum->motivo_devolucao == "Selecione o motivo")   
             )
            {
              return true;
            }
      }

      function validaSolicitacao($id_solicitacao)
      {
          //verifica se ja nao existe solicitacao 
          $validaSolicitacaoImportada = mysql_query("SELECT id_solicitacao FROM SCPROCESSUM WHERE id_solicitacao = '$id_solicitacao'");
        
          if(mysql_affected_rows() > 0)
          {
              return true;
          }
      }


      function enviaDadosBase(SuporteComercialProcessum $suporteComercialProcessum)
      {
               $dadosProc =  str_replace("&","E", $suporteComercialProcessum->operadorSuporteComercialProcessum) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->id_solicitacao) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->canal_entrada) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->data_recebimento_solicitacao) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->categoria_produto) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->cnpj_cpf) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->razao_social) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->gerente_vendas) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->gerente_negocio) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->obs) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->status_solicitacao) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->motivo_devolucao) 
                      . '$'. str_replace("&","E", $suporteComercialProcessum->descricao_motivo_devolucao)
                      . '$'. str_replace("&","E", $suporteComercialProcessum->regDataEntrada); 

           $sql_exec="CALL SP_SCPROCESSUM('$dadosProc');";
            
            $acao_exec= mysql_query($sql_exec) or die (mysql_error());
            
            return true;
      }
}
?>