<?php 
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/Siscom.php");
?>
<?php

class SiscomVenda extends Siscom
{
	public $nroSolicitacao;	
	public $produtoDescricao;
	public $quantidade;
	public $motivoCancIndisp;
	public $numOrdem;
	public $numPedido;
	public $dataEmissao;
	public $motivoCritica;
	public $tipoReplica;
	public $regDataEntrada;
	public $revisao;
	public $dataEntradaSiscomAtualizada;

	function __construct($cnpj, $razaoSocial, $gerenteNegocio, $escritorioGn, $status, $nroSolicitacao, $produtoDescricao, $quantidade, $motivoCancIndisp, $numOrdem, $numPedido, $dataEmissao, $motivoCritica, $tipoReplica, $dataEntradaSiscomAtualizada)
	{
			parent::__construct($cnpj, $razaoSocial, $gerenteNegocio, $escritorioGn, '', $status);
			$this->nroSolicitacao 				= $nroSolicitacao;	
			$this->produtoDescricao 			= $produtoDescricao;
			$this->quantidade 					= $quantidade;
			$this->motivoCancIndisp 			= $motivoCancIndisp;
			$this->numOrdem 					= $numOrdem;
			$this->numPedido 					= $numPedido;
			$this->dataEmissao 				    = $dataEmissao;
			$this->motivoCritica 				= $motivoCritica;
			$this->tipoReplica 					= $tipoReplica;
			$this->regDataEntrada 				= date("Y-m-d H:i:s");
			$this->dataEntradaSiscomAtualizada 	= $dataEntradaSiscomAtualizada;
	}

	function enviaSolicitacaoBase(SiscomVenda $venda, $id_usuario)
	{	
	  	//busca revisao atual
	  	$buscaRevisao=mysql_query("SELECT IFNULL(MAX(revisao),0) AS revisao FROM siscom_vendas WHERE siscom = '$venda->nroSolicitacao'");

		while($rowBr=mysql_fetch_array($buscaRevisao))
		{
			$revisao = $rowBr['revisao'];
		}

		//adiciona + 1
		$revisao = $revisao + 1;

		 $dadosProc = str_replace("&","E",$id_usuario)
	              . '&'. str_replace("'"," ",str_replace("&","E",$revisao))
		 		  . '&'. str_replace("'"," ",str_replace("&","E",$venda->cnpj))  
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->razaoSocial))                
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->gerenteNegocio)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->escritorioGn)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->status)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->nroSolicitacao)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->produtoDescricao)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->quantidade)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->motivoCancIndisp)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->numOrdem))
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->numPedido)) 
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->dataEmissao))
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->motivoCritica))
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->tipoReplica))
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->regDataEntrada))
	              . '&'. str_replace("'"," ",str_replace("&","E",$venda->dataEntradaSiscomAtualizada));
    	   
            $sql_exec="CALL SP_SISCOM_VENDAS('$dadosProc');";

            $acao_exec= mysql_query($sql_exec) or die (mysql_error());

	}

}

?>