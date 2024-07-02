<?php
  
  require_once '../fixa/site/classes/cripto.php';

  $cripto = new cripto();

?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>

<!--lib export-->


<link rel="stylesheet" type="text/css" media="screen"  href="css/datatablecss/datatables.min.css">
<link rel="stylesheet" type="text/css" media="screen"  href="css/datatablecss/buttons.dataTables.min.css">

<div id="margem_temp" style="margin-top: 60px;"></div>
<label class="textoParagrafo">Selecione o mês:</label>
<select 
    name="mesRelatorioGcon" 
    id="mesRelatorioGcon"  
    class="txt2comboboxpadrao bradius"
    required
    style="width: 40px;"
    >
    <option value="01">1</option>
    <option value="02">2</option>
    <option value="03">3</option>
    <option value="04">4</option>
    <option value="05">5</option>
    <option value="06">6</option>
    <option value="07">7</option>
    <option value="08">8</option>
    <option value="09">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
</select>
<a href="#" class="estiloLupa" onClick="carregaRelatorio()"><i class="fa fa-search"></a></i>
<img id="loader" src="../fixa/images/loading.gif"/>

<script type="text/javascript">
$(document).ready(function() {
  
  document.title = 'Gcon' + ' ' + getCurrentDate();

  var oTable = $('#tabela3').dataTable({
        "oLanguage": {
        "sProcessing": "Aguarde enquanto os dados s&atilde;o carregados ...",
        "sLengthMenu": "Mostrar _MENU_ registros por pagina",
        "sZeroRecords": "Nenhum registro encontrado",
        "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
        "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
        "sInfoFiltered": "",
        "sSearch": "Procurar",
        "oPaginate": {
           "sFirst":    " Primeiro ",
           "sPrevious": " Anterior ",
           "sNext":     " Próximo ",
           "sLast":     " Anterior "
        }
      }, 
      "processing": true,
      "dom": 'lBfrtip',
      "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel',
                    'csv'
                ]
            }
        ]     
  });  
});
</script>


<h2 class="titulo_table_result">Gcon</h2>
<table border="0" id="tabela3"  width="auto" class="display table_intragov">
        <thead>
            <tr>
              <th>Data</th>
              <th>Data Rec. Doc.</th>
              <th>Tipo de Entrada</th>
              <th>Contrato Mãe</th>
              <th>Data Assinatura Doc.</th>
              <th>Nº Doc.</th>
              <th>Sistema de Validação</th>
              <th>Nº Vantive</th>
              <th>Produto</th>
              <th>Data Tratativa</th>
              <th>Nome Solicitante</th>
              <th>Analista</th>
              <th>Nº GS</th>
              <th>Razão Social</th>
              <th>CNPJ</th>
              <th>Plano Solicitado</th>
              <th>Qtde Acesso</th>  
              <th>Data Finalização</th>
              <th>Nº GS</th>     
              <th>Nº WCD</th>
              <th>Contrato</th>
              <th>Revisão</th> 
              <th>Protocolo Solicitação</th>
              <th>Devolução</th> 
              <th>Motivo Devolução</th> 
              <th>Area Devolução</th> 
              <th>Data Devolução</th> 
              <th>Status</th>
              <th>Data Assinatura Contrato</th>
              <th>Qtde Contratos Analisados</th>     
            </tr>
        </thead>
    </table>
</div>
   