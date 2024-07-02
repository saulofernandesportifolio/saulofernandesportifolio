<?php

class ApoioManual {
     public $operador;  
	   public $id_solicitacao;
     public $canalEntrada;                          
     public $produto;
     public $servico;
     public $complementoServico;
     public $escritorio_gn;
     public $quantidadeAcessos;
     public $cnpj;
     public $razaoSocial;
     public $status;
     public $obs;
     public $regDataEntrada;
     public $motivo_devolucao;
     public $descricao_motivo_devolucao;
     public $data_recebimento_solicitacao;

      function __construct($id_usuario, $id_solicitacao, $data_recebimento_solicitacao, $canal_entrada, $produto, $servico, $complemento_servico, $escritorio_gn, $qtd_acessos, $obs, $cnpj_cpf, $razao_social, $status_solicitacao, $motivo_devolucao, $descricao_motivo_devolucao) 
      {
          $this->operador                     = $id_usuario; 
          $this->id_solicitacao               = $id_solicitacao; 
          $this->canalEntrada                 = $canal_entrada; 
          $this->produto                      = $produto;
          $this->servico                      = $servico; 
          $this->complementoServico           = $complemento_servico; 
          $this->escritorio_gn                = $escritorio_gn; 
          $this->quantidadeAcessos            = $qtd_acessos; 
          $this->cnpj                         = $cnpj_cpf;
          $this->razaoSocial                  = $razao_social; 
          $this->status                       = $status_solicitacao;
          $this->obs                          = $obs;
          $this->regDataEntrada               = date("Y-m-d H:i:s");
          $this->data_recebimento_solicitacao = $data_recebimento_solicitacao;
          $this->motivo_devolucao             = $motivo_devolucao;
          $this->descricao_motivo_devolucao   = $descricao_motivo_devolucao;
      }

      function validaCamposObrigatoriosManual(ApoioManual $apoioManual)
      {
           if(
              ($apoioManual->id_solicitacao == "") ||                    
              ($apoioManual->canalEntrada == "") ||            
              ($apoioManual->produto == "") ||                   
              ($apoioManual->servico  == "") ||
              ($apoioManual->servico  == "Selecione o serviço") ||
              ($apoioManual->complementoServico == "") ||
              ($apoioManual->complementoServico == "Selecione o complemento do serviço") ||
              ($apoioManual->escritorio_gn == "") ||        
              ($apoioManual->quantidadeAcessos == "") ||         
              ($apoioManual->cnpj == "") ||                      
              ($apoioManual->razaoSocial == "") ||                 
              ($apoioManual->status == "")  ||
              ($apoioManual->data_recebimento_solicitacao == "")                    
             )
            {
              return true;
            }
      }

      function validaCamposObrigatoriosDevolucao(ApoioManual $apoioManual)
      {
        if(
              ($apoioManual->motivo_devolucao == "")                   || 
              ($apoioManual->descricao_motivo_devolucao == "")         ||                                         
              ($apoioManual->motivo_devolucao == "Selecione o motivo")   
             )
            {
              return true;
            }
      }

      function validaSolicitacao($id_solicitacao)
      {
          //verifica se ja nao existe solicitacao 
          $validaSolicitacaoImportada = mysql_query("SELECT id_solicitacao FROM apoio WHERE id_solicitacao = '$id_solicitacao'");
        
          if(mysql_affected_rows() > 0)
          {
              return true;
          }
      }


      function enviaDadosBase(ApoioManual $apoioManual)
      {
            $dadosProc =  str_replace("&","E", $apoioManual->operador)  
                  . '$'. str_replace("&","E", $apoioManual->id_solicitacao)
                  . '$'. str_replace("&","E", $apoioManual->canalEntrada)                   
                  . '$'. str_replace("&","E", $apoioManual->produto)
                  . '$'. str_replace("&","E", $apoioManual->servico)
                  . '$'. str_replace("&","E", $apoioManual->complementoServico)
                  . '$'. str_replace("&","E", $apoioManual->escritorio_gn)
                  . '$'. str_replace("&","E", $apoioManual->quantidadeAcessos)
                  . '$'. str_replace("&","E", $apoioManual->cnpj)
                  . '$'. str_replace("&","E", $apoioManual->razaoSocial)
                  . '$'. str_replace("&","E", $apoioManual->status)
                  . '$'. str_replace("&","E", $apoioManual->obs)
                  . '$'. str_replace("&","E", $apoioManual->regDataEntrada)
                  . '$'. str_replace("&","E", $apoioManual->motivo_devolucao)
                  . '$'. str_replace("&","E", $apoioManual->descricao_motivo_devolucao)
                  . '$'. str_replace("&","E", $apoioManual->data_recebimento_solicitacao);


           $sql_exec="CALL SP_APOIO('$dadosProc');";
            
            $acao_exec= mysql_query($sql_exec) or die (mysql_error());
            
            return true;
      }
}
?>
    
