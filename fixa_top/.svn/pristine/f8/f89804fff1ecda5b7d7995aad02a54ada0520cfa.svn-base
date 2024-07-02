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
  
  document.title = 'Gcon Drive' + ' ' + getCurrentDate();

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
        url: 'sql_rel_gcom_drive.php?method=fetchdata',
        dataType: 'json',
        type:'post',
        success: function(s){
        //console.log(s);
            oTable.fnClearTable();
              for(var i = 0; i < s.length; i++) {
                           oTable.fnAddData([
                                      s[i][0] , //reg_dt_entrada(data) 
                                      s[i][1] , //data_receb_documento      
                                      s[i][2] , //tipo_entrada             
                                      s[i][3] , //contrato_mae          
                                      s[i][4] , //data_assinatura_doc    
                                      s[i][5] , //numero_documento       
                                      s[i][6] , //sistema_validacao     
                                      s[i][7] , //n_vantive              
                                      s[i][8] , //produto               
                                      s[i][9] , //data_trativa           
                                      s[i][10], //nome_solicitante
                                      s[i][11], //analista       
                                      s[i][12], //n_gestao_servicos                 
                                      s[i][13], //razao_social           
                                      s[i][14], //cnpj                   
                                      s[i][15], //plano_solicitado       
                                      s[i][16], //qtde_acesso            
                                      s[i][17], //data_finalizacao
                                      s[i][18], //ngs
                                      s[i][19], //numero_wcd
                                      s[i][20] //contrato      
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
            </tr>
        </thead>
    </table>
</div>
   