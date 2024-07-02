<?php
set_time_limit(350);
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>

<!--lib export-->


<link rel="stylesheet" type="text/css" media="screen"  href="css/datatablecss/datatables.min.css">
<link rel="stylesheet" type="text/css" media="screen"  href="css/datatablecss/buttons.dataTables.min.css">

<div id="margem_temp" style="margin-top: 60px;"></div>


<script type="text/javascript">
$(document).ready(function() {
  
  document.title = 'Pré-Tramitação Drive' + ' ' + getCurrentDate();

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
           
  });  //Initialize the datatable

  $(window).load(function(){
    var user = $(this).attr('id');
   
    $.ajax({
        url: 'sql_rel_pre_tramitacao_drive.php?method=fetchdata',
        dataType: 'json',
        type:'post',
        success: function(s){
        //console.log(s);
            oTable.fnClearTable();
              for(var i = 0; i < s.length; i++) {
                           oTable.fnAddData([
                                    s[i][0], //Indicação de data e hora
                                    s[i][1], //Analista pré
                                    s[i][2], //SISCOM
                                    s[i][3], //Categoria produto
                                    s[i][4], //Devolução?
                                    s[i][5], //CANAL DE ENTRADA
                                    s[i][6], //DATA RECEBIMENTO DA SOLICITAÇÃO
                                    s[i][7], //NÚMERO DO PACOTE DO SISCOM
                                    s[i][8], //PRODUTO
                                    s[i][9], //TIPO DA SOLICITAÇÃO / CATEGORIA
                                    s[i][10], //SERVIÇOS 
                                    s[i][11], //CNPJ
                                    s[i][12], //Razão Social
                                    s[i][13], //Quantidade de acessos
                                    s[i][14], //Número gestão de serviços
                                    s[i][15], //Data abertura gestão
                                    s[i][16], //Motivo devolução
                                    s[i][17], //Área devolução
                                    s[i][18], //Data de devolução
                                    s[i][19], //STATUS
                                    s[i][20] //Observações
                               ]);                    
                      } // End For
                      
        },
        error: function(e){
           //console.log(e.responseText); 
        }
      });
  });

                             


});
</script>


<h2 class="titulo_table_result">Pré-Tramitação</h2>
<table border="0" id="tabela3"  width="auto" class="display table_tramitacao">
        <thead>
            <tr>
               <th>Indicação de data e hora</th>
               <th>Analista pré</th>
               <th>SISCOM</th>
               <th>Categoria produto</th>
               <th>Devolução?</th>
               <th>CANAL DE ENTRADA</th>
               <th>DATA RECEBIMENTO DA SOLICITAÇÃO</th>
               <th>NÚMERO DO PACOTE DO SISCOM</th>
               <th>PRODUTO</th>
               <th>TIPO DA SOLICITAÇÃO / CATEGORIA</th>
               <th>SERVIÇOS</th>
               <th>CNPJ</th>
               <th>Razão Social</th>
               <th>Quantidade de acessos</th>
               <th>Número gestão de serviços</th>
               <th>Data abertura gestão</th>
               <th>Motivo Devolução</th>
               <th>Área Devolução</th>
               <th>Data Devolução</th>
               <th>Status</th>
               <th>Obs</th>
            </tr>
        </thead>
    </table>
</div>
   