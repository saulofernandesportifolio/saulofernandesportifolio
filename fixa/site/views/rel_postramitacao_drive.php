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
  
  document.title = 'Pós- Tramitação Drive' + ' ' + getCurrentDate();

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
        url: 'sql_rel_pos_tramitacao_drive.php?method=fetchdata',
        dataType: 'json',
        type:'post',
        success: function(s){
        //console.log(s);
            oTable.fnClearTable();
              for(var i = 0; i < s.length; i++) {
                           oTable.fnAddData([
                                    s[i][0], //reg_dt_entrada
                                    s[i][1], //usuario_pos_tramitacao
                                    s[i][2], //siscom
                                    s[i][3], //data_entrada_siscom
                                    s[i][4], //canal_entrada
                                    s[i][5], //produto
                                    s[i][6], //tipo_solicitacao
                                    s[i][7], //servico
                                    s[i][8], //qtd_acessos
                                    s[i][9], //cnpj
                                    s[i][10], //razao_social
                                    s[i][11], //n_gestao_servicos
                                    s[i][12], //motivo_devolucao
                                    s[i][13], //oportunidade
                                    s[i][14], //proposta
                                    s[i][15], //data_recebimento_pos
                                    s[i][16], //data_finalizado
                                    s[i][17], //contrato_mae
                                    s[i][18], //obs
                                    s[i][19] //status
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


<h2 class="titulo_table_result">Pós-Tramitação</h2>
<table border="0" id="tabela3"  width="auto" class="display table_tramitacao">
        <thead>
            <tr>
               <th>Data</th>
               <th>Analista</th>
               <th>Siscom</th>
               <th>Data Entrada Siscom</th>
               <th>Canal Entrada</th>
               <th>Produto</th>
               <th>Tipo Solicitação</th>
               <th>Serviço</th>
               <th>Qtde Acessos</th>
               <th>CNPJ</th>
               <th>Razão Social</th>
               <th>Nº GS</th>
               <th>Motivo Devolução</th>
               <th>Oportunidade</th>
               <th>Proposta</th>
               <th>Data Recebimento</th>
               <th>Data Finalizado</th>
               <th>Contrato Mãe</th>
               <th>Obs</th>
               <th>Status</th>
            </tr>
        </thead>
    </table>
</div>
   