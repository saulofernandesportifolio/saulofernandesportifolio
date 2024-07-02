<?php

class SiscomServico extends Siscom
{
	public $clienteEspecial;
	public $dataSiscom;
	public $codigoCliente;
	public $descricao;
	public $evento;
	public $nroSolicitacao;
	public $regDataEntrada;
	public $revisao;

	function __construct($cnpj, $razaoSocial, $gerenteNegocio, $escritorioGn, $responsavelGnCanal, $status, $clienteEspecial, $dataSiscom, $codigoCliente, $descricao, $evento, $nroSolicitacao, $dataSiscomAtualizada)
	{
			parent::__construct($cnpj, $razaoSocial, $gerenteNegocio, $escritorioGn, $responsavelGnCanal, $status);
			$this->clienteEspecial = $clienteEspecial; 
			$this->dataSiscom = $dataSiscom; 
			$this->codigoCliente = $codigoCliente; 
			$this->descricao = $descricao; 
			$this->evento = $evento; 
			$this->nroSolicitacao = $nroSolicitacao; 
			$this->regDataEntrada = date("Y-m-d H:i:s");

			if($dataSiscomAtualizada != "")
			{
				$this->dataSiscom = $dataSiscomAtualizada;
			}
	}

	function enviaSolicitacaoBase(SiscomServico $servico, $id_usuario)
	{

		//busca revisao atual
	  	$buscaRevisao=mysql_query("SELECT IFNULL(MAX(revisao),0) AS revisao FROM siscom_servicos WHERE siscom = '$servico->nroSolicitacao'");

		while($rowBr=mysql_fetch_array($buscaRevisao))
		{
			$revisao = $rowBr['revisao'];
		}

		//adiciona + 1
		$revisao = $revisao + 1;

		 $dadosProc = $id_usuario
		 		  . '&'. $revisao  
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->cnpj)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->razaoSocial))                
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->gerenteNegocio)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->escritorioGn)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->responsavelGnCanal)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->status)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->clienteEspecial)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->dataSiscom)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->codigoCliente)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->descricao)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->evento)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->nroSolicitacao))
	              . '&'. str_replace("'"," ",str_replace("&","E",$servico->regDataEntrada));

 
            $sql_exec="CALL SP_SISCOM_SERVICOS('$dadosProc');";
     
            $acao_exec= mysql_query($sql_exec) or die (mysql_error());
            
	}

}

?>