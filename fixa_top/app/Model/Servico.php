<?php

class Servico 
{
	public $id_servico; 
    public $servico_descricao; 
    public $complemento_servico; 
	public $servicos;
 
    public function Servico()
    {
        $servicos = array();
    }

    //Adiciona usuarios a sistema
    public function addServico($servico)
    {
        $this->servicos[] = $servico;
    }

	function buscaServicoByDescricao($servico, $fonte)
    {
   
    	$buscaServicos = mysql_query("SELECT * FROM servicos WHERE descricao = '$servico'");
       
        while($row_sup=mysql_fetch_array($buscaServicos))
        {  
            $servico = new Servico();
            $servico->servico_descricao = $row_sup['descricao'];
            $servico->complemento_servico = $row_sup['complemento'];

            $this->addServico($servico);
        }

        return $this->servicos;      
    }
}
?>

