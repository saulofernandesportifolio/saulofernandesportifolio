<?php
//parametros
$id_usuario = $_GET['id']; 
?>
<body>
      <label class="textoParagrafo">Solicitação/Siscom:</label>
        <input class="inputsTextTabelas" type="text" id="n_solicitacao"></input>
        <a href="#" class="estiloLupa" id="ConsultaSolicitacoesHistorico"><i class="fa fa-search"></a></i>
   <br/>
   <div id="wrapper">    
    <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th><span>Data</span></th>
            <th><span>Operador</span></th>
            <th><span>CPF</span></th>  
            <th><span>Nº Solic./Siscom</span></th>
            <th><span>Fase</span></th>
            <th><span>Status</span></th>
            <th><span>Cnpj</span></th>
            <th><span>Razão Social</span></th>
            <th><span>Qtde Acessos</span></th>
            <th><span>Revisão</span></th>
          </tr>
        </thead>
        <tbody id="rowSolicitacoes">
        </tbody>
    </table>
   </div> 
</body>

