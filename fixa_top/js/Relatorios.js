
function carregaRelatorio(){
     $('#tabela3').dataTable().fnClearTable();
    $('#loader').css('visibility', 'visible');

    if($('#mesRelatorioTramitacao').length == 1){
        var mes = $('#mesRelatorioTramitacao').val();
        var url = 'sql_rel_tramitacao.php?method=fetchdata';
        var rel = 'tram';
    }else if($('#mesRelatorioAprovacao').length == 1){
        var mes = $('#mesRelatorioAprovacao').val();
        var url = 'sql_rel_aprovacao.php?method=fetchdata';
        var rel = 'aprov';
    }else if($('#mesRelatorioApoio').length == 1){
        var mes = $('#mesRelatorioApoio').val();
        var url = 'sql_rel_apoio.php?method=fetchdata';
        var rel = 'apoio';
    }
   
   //busca dados
    $.ajax({
        url: url,
        dataType: 'json',
        type:'post',
        data: {mes: mes},
        success: function(s){
        //console.log(s);
            $('#tabela3').dataTable().fnClearTable();
              for(var i = 0; i < s.length; i++) {
                  if(rel == 'tram')
                  {
                      $('#tabela3').dataTable().fnAddData([
                            s[i][0], //Data
                            s[i][1], //Operador                  
                            s[i][2], //Siscom                    
                            s[i][3], //Data Entrada Siscom
                            s[i][4], //Data reb solicitação       
                            s[i][5], //Canal Entrada             
                            s[i][6], //Produto                   
                            s[i][7], //Serviço                   
                            s[i][8], //Complemento Serviço       
                            s[i][9], //Qtde Acessos          
                            s[i][10], //CNPJ                      
                            s[i][11], //Razão Social              
                            s[i][12], //Data Encerramento         
                            s[i][13], //status 
                            s[i][14], //obs                    
                            s[i][15], //oportunidade          
                            s[i][16], //proposta,
                            s[i][17], //escritorio_gn,
                            s[i][18], //motivo devolucao,       
                            s[i][19], //complem devolucao,   
                            s[i][20], //data devolucao, 
                            s[i][21] //revisao
                         ]);
                  }
                  else if(rel == 'aprov'){
                      $('#tabela3').dataTable().fnAddData([
                            s[i][0], // data;
                            s[i][1], // operador; 
                            s[i][2], // siscom; 
                            s[i][3], // data_entrada_siscom;
                            s[i][4], // data receb solicitacao;
                            s[i][5], // canal_entrada; 
                            s[i][6], // produto; 
                            s[i][7], // servico; 
                            s[i][8], // complemento_servico;
                            s[i][9], // qtd_acessos; 
                            s[i][10], // cnpj; 
                            s[i][11], // razao_social; 
                            s[i][12], // oportunidade; 
                            s[i][13], // proposta; 
                            s[i][14], // data_finalizado; 
                            s[i][15], // obs; 
                            s[i][16], // status_solicitacao_aprovacao;
                            s[i][17], // motivo_devolucao;
                            s[i][18], // comp motivo_devolucao;
                            s[i][19], // data devolucao
                            s[i][20]  //revisao

                      ]);
                  }
                  else if(rel == 'apoio'){
                      $('#tabela3').dataTable().fnAddData([
                             s[i][0],  // Operador;
                             s[i][1],  //Solicitação                   
                             s[i][2],  //Data receb. solicitação                     
                             s[i][3],  // Canal Entrada            
                             s[i][4],  // Produto          
                             s[i][5],  // Serviço                   
                             s[i][6],  // Complemento Serviço                  
                             s[i][7],  //Escritório GN 
                             s[i][8],  // Qtde Acessos       
                             s[i][9],  // CNPJ        
                             s[i][10], // Razão Social                      
                             s[i][11], // Status                   
                             s[i][12], // Obs                    
                             s[i][13], // Motivo Devolução
                             s[i][14], //Compl. Motivo Devolução
                             s[i][15]  //Data Cadastro
                      ]);
                  }                                                    
            } // End For
                      
        },
        error: function(e){
           $('#tabela3').dataTable().fnClearTable();
        },
          complete: function(){
             $('#loader').css('visibility', 'hidden');
          }
      });
}