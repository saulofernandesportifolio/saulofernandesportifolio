<?php
//parametros
$id_usuario = $_GET['idu']; 
$fase = $_GET['solicitacao_pendentes']; 
?>
<body onload="buscaSolicitacoesAguardo()">
      <label class="textoParagrafo">Siscom</label>
        <input class="inputsTextTabelas" type="text" id="n_solicitacao"></input>
        <a href="#" class="estiloLupa" id="consultaItensPendentesFasesOperador"><i class="fa fa-search"></a></i>
   <br/>
  <div id="wrapper">
  		<table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
			<caption class="textoParagrafo"><h2 style="color: #7b682e;">Itens em aguardo</h2></caption>
	        <thead>
	          <tr>
	            <th><span>Siscom</span></th>
				<th><span>Data Distribuição</span></th>
				<th><span>Data Aguardo</span></th>
	            <th><span>CNPJ</span></th>
	            <th><span>Razão Social</span></th>
	            <th><span>Qtde Acessos</span></th>
	            <th><span>Status</span></th>
	            <th><span>Obs</span></th>
	            <th><span>Motivo Devolução</span></th>
	            <th><span>Complemento</span></th>
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
