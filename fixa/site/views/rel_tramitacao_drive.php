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
  
  document.title = 'Tramitação Drive' + ' ' + getCurrentDate();

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
        url: 'sql_rel_tramitacao_drive.php?method=fetchdata',
        dataType: 'json',
        type:'post',
        success: function(s){
        //console.log(s);
            oTable.fnClearTable();
              for(var i = 0; i < s.length; i++) {
                           oTable.fnAddData([
                                    s[i][0], //reg_dt_entrada
                                    s[i][1], //usuario_tramitacao
                                    s[i][2], //devolucao
                                    s[i][3], //siscom
                                    s[i][4], //data_entrada_siscom
                                    s[i][5], //canal_entrada
                                    s[i][6], //produto
                                    s[i][7], //tipo_solicitacao
                                    s[i][8], //servicos
                                    s[i][9], //qtd_acessos
                                    s[i][10], //numero_de_pacotes
                                    s[i][11], // cnpj
                                    s[i][12], //razao_social
                                    s[i][13], //n_gestao_servicos
                                    s[i][14], //data_abertura_gestao
                                    s[i][15], //categoria
                                    s[i][16], //data_devolucao
                                    s[i][17], //data_encerramento
                                    s[i][18], //status
                                    s[i][19] //obs
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


<h2 class="titulo_table_result">Tramitação</h2>
<table border="0" id="tabela3"  width="auto" class="display table_tramitacao">
        <thead>
            <tr>
               <th>Data</th>
               <th>Analista</th>
               <th>Devolução</th>
               <th>Siscom</th>
               <th>Data Entrada Siscom</th>
               <th>Canal de Entrada</th>
               <th>Produto</th>
               <th>Tipo de Solicitação</th>
               <th>Serviços</th>
               <th>Qtde de acessos</th>
               <th>Nº Pacotes</th>
               <th>CNPJ</th>
               <th>Razão social</th>
               <th>Nº GS</th>
               <th>Data abertura gestão</th>
               <th>Categoria</th>
               <th>Data Devolução</th>
               <th>Data Encerramento</th>
               <th>Status</th>
               <th>Obs</th>
            </tr>
        </thead>
    </table>
</div>
   