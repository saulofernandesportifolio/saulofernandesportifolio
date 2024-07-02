<?php
  
  require_once '../fixa/site/classes/cripto.php';

  $cripto = new cripto();

?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>

<!--lib export-->
<link rel="stylesheet" type="text/css" media="screen"  href="js/media/css/demo_page.css" />
<link rel="stylesheet" type="text/css" media="screen"  href="js/media/css/demo_table.css" />
<link rel="stylesheet" type="text/css" media="screen"  href="css/datatablecss/datatables.min.css">
<link rel="stylesheet" type="text/css" media="screen"  href="css/datatablecss/buttons.dataTables.min.css">

<div id="margem_temp" style="margin-top: 60px;"></div>


<script type="text/javascript">
$(document).ready(function() {
  
  document.title = 'Intragov' + ' ' + getCurrentDate();

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
        url: 'sql_rel_intragov.php?method=fetchdata',
        dataType: 'json',
        type:'post',
        success: function(s){
        //console.log(s);
            oTable.fnClearTable();
              for(var i = 0; i < s.length; i++) {
                           oTable.fnAddData([
                                      s[i][0], // data,
                                      s[i][1], // data_solicitacao,
                                      s[i][2], // analista, 
                                      s[i][3], // devolucao,
                                      s[i][4], // canal_entrada,
                                      s[i][5], // produto,
                                      s[i][6], // servico,
                                      s[i][7], // qtd_acessos,
                                      s[i][8], // motivo_cancelamento,
                                      s[i][9], //cnpj,
                                      s[i][10],// razao_social,
                                      s[i][11],// n_gestao_servicos,
                                      s[i][12],// data_abertura_gestao,
                                      s[i][13],// motivo_devolucao,
                                      s[i][14],// area_solicitante,
                                      s[i][15],// data_devolucao,
                                      s[i][16],// data_encerramento,
                                      s[i][17],// status_solicitacao
                                      s[i][18],// obs
                                      s[i][19],// revisao
                                      s[i][20] // protocolo,
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


<h2 class="titulo_table_result">Intragov</h2>
<table border="0" id="tabela3"  width="auto" class="display table_intragov">
        <thead>
            <tr>
              <th>Data</th>
              <th>Data Solicitação</th> 
              <th>Analista</th>         
              <th>Devolução</th>                   
              <th>Canal Entrada</th>            
              <th>Produto</th>          
              <th>Serviço</th>          
              <th>Qtd. Acessos</th>                  
              <th>Motivo Cancelamento</th>          
              <th>CNPJ</th>                       
              <th>Razão Social</th>                
              <th>Nº Gestão Serviços</th>           
              <th>Data Abert. Gestão</th>        
              <th>Motivo Devolução</th>         
              <th>Area Solicitante</th>             
              <th>Data Devolução</th>              
              <th>Data Encerramento</th>           
              <th>Status</th>
              <th>Obs</th>
              <th>Revisão</th>
              <th>Protocolo Solicitação</th>                        
            </tr>
        </thead>
        <!--<tfoot>
            <tr>
              <th>Data</th>
              <th>Analista</th>          
              <th>Data Solicitação</th>             
              <th>Devolução</th>                   
              <th>Canal Entrada </th>            
              <th>Produto</th>          
              <th>Serviço</th>          
              <th>Qtd. Acessos</th>                  
              <th>Motivo Cancelamento</th>          
              <th>CNPJ</th>                       
              <th>Razão Social</th>                
              <th>Nº Gestão Serviços</th>           
              <th>Data Abertura Gestão</th>        
              <th>Motivo Devolução</th>         
              <th>Area Solicitante</th>             
              <th>Data Devolução</th>              
              <th>Data Encerramento</th>           
              <th>Status</th>       
            </tr>
        </tfoot>-->
    </table>
</div>
   