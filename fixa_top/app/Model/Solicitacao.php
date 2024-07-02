<?php

class Solicitacao 
{
    public $operador;
    public $siscom; 
    public $cnpj; 
    public $razaoSocial; 
    public $status;
    public $revisao;
    public $origem;
    public $devolucao;
    public $area_devolucao;
    public $motivo_devolucao; 
    public $descricao_motivo_devolucao;
    public $data_devolucao;

    function __construct($siscom, $cnpj, $razaoSocial, $status, $revisao, $origem, $devolucao, $area_devolucao, $motivo_devolucao, $descricao_motivo_devolucao, $data_devolucao)
    {
          $this->siscom       =  $siscom;
          $this->cnpj         =  $cnpj;
          $this->razaoSocial  =  $razaoSocial;
          $this->status       =  $status;
          $this->revisao      =  $revisao;
          $this->origem       =  $origem;
          $this->devolucao    =  $devolucao;
          $this->area_devolucao = $area_devolucao;
          $this->motivo_devolucao =  $motivo_devolucao;
          $this->descricao_motivo_devolucao =  $descricao_motivo_devolucao;
          $this->data_devolucao =  $data_devolucao;   
    }
}
?>