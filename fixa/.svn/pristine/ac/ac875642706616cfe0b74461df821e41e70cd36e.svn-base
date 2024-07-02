<?php

class Produto {
	 public $id_produto; 
     public $descricao; 
     public $categoria_produto; 

	function buscaProdutoById(Produto $produto, $id_produto){
	//busca cp
	  	$fetchProduto = mysql_query("SELECT * FROM produto WHERE id_produto = $id_produto");

	  	if(mysql_affected_rows() > 0)
        {
			while($row_prod=mysql_fetch_array($fetchProduto))
			{ 
			    $produto->id_produto = $row_prod['id_produto'];
			    $produto->descricao  = $row_prod['descricao'];
			    $produto->categoria_produto  = $row_prod['categoria_produto'];
			}
		}	
	  
	  return $produto;

	}

	function buscaProdutoByDescricao(Produto $produto, $descricao){
	//busca cp
	  	$fetchProduto = mysql_query("SELECT * FROM produto WHERE descricao LIKE '%$descricao%'");

	  	if(mysql_affected_rows() > 0)
        {
			while($row_prod=mysql_fetch_array($fetchProduto))
			{ 
			    $produto->id_produto = $row_prod['id_produto'];
			    $produto->descricao  = $row_prod['descricao'];
			    $produto->categoria_produto  = $row_prod['categoria_produto'];
			}
		}	
	  
	  return $produto;

	}


}
?>