<?php
//parametros
$id_usuario = $_GET['idu']; 
$fase = $_GET['solicitacao_pendentes']; 
?>
<body onload="buscaSolicitacoesPendentes()">
      <label class="textoParagrafo">Protocolo da Solicitação:</label>
        <input class="inputsTextTabelas" type="text" id="n_solicitacao"></input>
        <a href="#" class="estiloLupa" id="consultaItensPendentesFasesOperador"><i class="fa fa-search"></a></i>
   <br/>
  <div id="wrapper">
  		<table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
			<caption class="textoParagrafo"><h2 style="color: #7b682e;">Itens a preencher</h2></caption>
	        <thead>
	          <tr>
	            <th><span>Protocolo Solicitação</span></th>
	            <th><span>Nº GS</span></th>
	            <th><span>Data Início Solicitação</span></th>
				<th><span>Data Final. Fase Anterior</span></th>
	            <th><span>Data Abert. GS</span></th>
	            <th><span>Quantidade Acessos</span></th>
	            <th><span>Quantidade dias tratativa</span></th>  
	            <th><span>Revisão</span></th>  
	            <th><span>Ação</span></th>
	          </tr>
	        </thead>
	        <tbody id="rowSolicitacoes">
	        </tbody>
	    </table>
   </div> 
</body>
<input type="hidden" value="<?php echo $fase?>" id="fase"></input>
<input type="hidden" value="<?php echo $id_usuario?>" id="id_usuario"></input>

          