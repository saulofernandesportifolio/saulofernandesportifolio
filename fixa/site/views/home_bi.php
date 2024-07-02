<body onload="consultaFilaItensPendentes();">
 <label class="textoParagrafo">Protocolo Solicitação:</label>
        <input class="inputsTextTabelas" type="text" id="n_solicitacao"></input>
        <a href="#" class="estiloLupa" id="consultaFilaItensPendentes" onclick="consultaFilaItensPendentes();"><i class="fa fa-search"></a></i>
   <br/>
<div id="wrapper">
  <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th style="width: 1%;"><span>Fase</span></th>
          <th style="width: 1%;"><span>Operador</span></th>
          <th style="width: 1%;"><span>Protocolo</span></th>
          <th style="width: 1%;"><span>GS</span></th>
          <th style="width: 1%;"><span>Data Início</span></th>
          <th style="width: 1%;"><span>Revisão</span></th>
          <th style="width: 1%;"><span>Situação</span></th>
        </tr>
      </thead>
      <tbody id="rowItensFilaPendentes">
      </tbody>
  </table>
 </div> 
</body>
