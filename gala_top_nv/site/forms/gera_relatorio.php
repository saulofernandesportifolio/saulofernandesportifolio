<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<script src="js/jquery.tablesorter.min.js"></script>
<script src="js/jquery.tablesorter.pager.js"></script>

<script>
    $(function(){
      
      $('table > tbody > tr:odd').addClass('odd');
      
      $('table > tbody > tr').hover(function(){
        $(this).toggleClass('hover');
      });
      
      $('#marcar-todos').click(function(){
        $('table > tbody > tr > td > :checkbox')
          .attr('checked', $(this).is(':checked'))
          .trigger('change');
      });
      
      $('table > tbody > tr > td > :checkbox').bind('click change', function(){
        var tr = $(this).parent().parent();
        if($(this).is(':checked')) $(tr).addClass('selected');
        else $(tr).removeClass('selected');
      });
      
      //$('form').submit(function(e){ e.preventDefault(); });
      
      $('#pesquisar').keydown(function(){
        var encontrou = false;
        var termo = $(this).val().toLowerCase();
        $('table > tbody > tr').each(function(){
          $(this).find('td').each(function(){
            if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
          });
          if(!encontrou) $(this).hide();
          else $(this).show();
          encontrou = false;
        });
      });
      
      $("table") 
        .tablesorter({
          dateFormat: 'uk',
          headers: {
            0: {
              sorter: false
            },
            5: {
              sorter: false
            }
          }
        }) 
        .tablesorterPager({container: $("#pager")})
        .bind('sortEnd', function(){
          $('table > tbody > tr').removeClass('odd');
          $('table > tbody > tr:odd').addClass('odd');
        });
      
    });
    </script>


        <meta name="description" content="jquery"/>
        <meta name="keywords" content="jquery" />
		<meta name="robots" content="all, index, follow" />



<script language="JavaScript">
function abrir(URL) {
 
  var width = 1024;
  var height = 800;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>

<script>
var actionButton = document.querySelector('.action');
actionButton.addEventListener('click', myFunction);

/* Usando jQuery */
$('.action').on('click', myFunction);

</script>


<script>

<!-- Função Checkbox selecionar todos -->

function selecionar_todas(retorno) {
    var frm = document.myform;
    for(i = 0; i < frm.length; i++) {        
        if(frm.elements[i].type == "checkbox") {
            frm.elements[i].checked = retorno;
        }
     }
}


</script>

<script language="javascript">
function submitForm(){
    var val = document.myform.category.value;
    if(val!=-1){
        document.myform.submit();
    }
}
</script>
<br /><br />
<?php

function arrumadata($string) {
    if($string == ''){
    $data=substr($string,8,3)."".substr($string,5,2)."".substr($string,0,4);   
        
    }else{
        
    $data=substr($string,8,3)."/".substr($string,5,2)."/".substr($string,0,4);   
    }

 return $data;
}  



function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}

/*function diasemana($datafiltro){
	$ano =  substr("$datafiltro", 0, 4);
	$mes =  substr("$datafiltro", 5, -3);
	$dia =  substr("$datafiltro", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($diasemana) {
		case"0": $diasemana = utf8_encode("Domingo");       
                          break;
		case"1": $diasemana = utf8_encode("Segunda-Feira");
                             break;
		case"2": $diasemana = utf8_encode("Terça-Feira");   
                                break;
		case"3": $diasemana = utf8_encode("Quarta-Feira");  
                                   break;
		case"4": $diasemana = utf8_encode("Quinta-Feira");  
                                       break;
		case"5": $diasemana = utf8_encode("Sexta-Feira");   
                                           break;
		case"6": $diasemana = utf8_encode("Sábado");        
                                                 break;
	}


	echo $diasemana;
}*/




$sql_operador="SELECT * FROM tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 4){
    
setcookie('salva',$_COOKIE['idtbl_usuario'],time() - 28800);
setcookie('idtbl_usuario',"");
    
echo "
       <script type=\"text/javascript\">
        alert('Usu\u00e1rio inv\u00e1lido!');
        document.location.replace('index.php');
	    </script>
 ";
  exit(); 
    
    
    
} 

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

//$data = date("d-m-Y H:i:s");
$datarel = date("d-m-Y H-i-s"); 

   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("../site/forms/relatorios/relatorio_$datarel.xls ");

    if($excel==false){
        echo $excel->error;
   }
   

//Escreve o nome dos campos de uma tabela
   $myArr=array( 
      'COTA&Ccedil;&Atilde;O',
      'REGIONAL',
      'UF',
      'TIPO',
      'REVIS&Atilde;O',
      'CLIENTE',
      'CRIADO EM',
      'STATUS VIVOCORP',
      'SUB-STATUS VIVOCORP',
	  'STATUS GALA',
      'DISC STATUS GALA',
      'OPERADOR',	
      'DATA INCLUS&Atilde;O GALA',
      'DATA TRATAMENTO', 
      'HORA TRATAMENTO', 
 	  'TIPO SERVI&Ccedil;OS', 
      'ALTAS',
      'PORTAB.',
      'MIGRACOES',
      'TROCAS',
      'TT',
      'BACKUP',
      'M_2_M',
      'FIXA',
      'PRE POS',
      'MIGRACAO TROCA',
      'TOTAL LINHAS',
      'SETOR',
      'TURNO',
      'DIA',
      'TEMPO',
      'TIPO PROCESSO',
      'TIPO DE LINHA',
      'SLA DIAS',
      'PRAZO_DIAS',
      'SLA HORAS',
      'PRAZO_HORAS',
      'VISAO_ILHA',
      'VENCIMENTO'
       );
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
   include("../gala/bd.php");
    
 $sql_servico ="SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.revisao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
                a.ALTAS,
                a.PORTABILIDADE2,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,
                a.PRE_POS,
                a.MIGRACAO_TROCA,                 
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dt_inclusao_bd_cip,
                b.status_cip_analise as ds_status_cip, 
                b.disc_status_cip_analise as ds_disc_status_cip,
                c.nome as nome,
                b.dt_tratamento_analise as ds_tratamento,
                b.hora_tratamento_analise as ds_hora_tratamento,
                b.setor,
                b.id_cotacao,
                d.turno as turno             
                FROM tbl_cotacao a 
                LEFT JOIN tbl_analise b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN tbl_usuarios c 
                ON c.idtbl_usuario=b.idtbl_usuario_analise
                LEFT JOIN tbl_turno d 
                ON d.id=c.turno
                WHERE b.setor='Analise'
                GROUP BY a.cotacao_principal,a.id_cotacao,a.dt_inclusao_bd_cip DESC LIMIT 0,20000 
          UNION
          SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.revisao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
                a.ALTAS,
                a.PORTABILIDADE2,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,
                a.PRE_POS,
                a.MIGRACAO_TROCA,                 
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dt_inclusao_bd_cip,
                b.status_cip_input as ds_status_cip, 
                b.disc_status_cip_input as ds_disc_status_cip,
                c.nome as nome,
                b.dt_tratamento_input as ds_tratamento,
                b.hora_tratamento_input as ds_hora_tratamento,
                b.setor,
                b.id_cotacao,
                d.turno as turno             
                FROM tbl_cotacao a 
                LEFT JOIN tbl_input b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN tbl_usuarios c 
                ON c.idtbl_usuario=b.idtbl_usuario_input
                LEFT JOIN tbl_turno d 
                ON d.id=c.turno
                WHERE b.setor='Input'
                GROUP BY a.cotacao_principal,a.id_cotacao,a.dt_inclusao_bd_cip DESC LIMIT 0,20000   
         UNION
          SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.revisao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
                a.ALTAS,
                a.PORTABILIDADE2,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,
                a.PRE_POS,
                a.MIGRACAO_TROCA,                 
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dt_inclusao_bd_cip,
                b.status_cip_auditoria as ds_status_cip, 
                b.disc_status_cip_auditoria as ds_disc_status_cip,
                c.nome as nome,
                b.dt_tratamento_auditoria as ds_tratamento,
                b.hora_tratamento_auditoria as ds_hora_tratamento,
                b.setor,
                b.id_cotacao,
                d.turno as turno             
                FROM tbl_cotacao a 
                LEFT JOIN tbl_auditoria b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN tbl_usuarios c 
                ON c.idtbl_usuario=b.idtbl_usuario_auditoria
                LEFT JOIN tbl_turno d 
                ON d.id=c.turno
                WHERE b.setor='Auditoria'
                GROUP BY a.cotacao_principal,a.id_cotacao,a.dt_inclusao_bd_cip DESC LIMIT 0,20000  
         UNION
         SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.revisao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
                a.ALTAS,
                a.PORTABILIDADE2,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,
                a.PRE_POS,
                a.MIGRACAO_TROCA,                 
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dt_inclusao_bd_cip,
                b.status_cip_correcao as ds_status_cip, 
                b.disc_status_cip_correcao as ds_disc_status_cip,
                c.nome as nome,
                b.dt_tratamento_correcao as ds_tratamento,
                b.hora_tratamento_correcao as ds_hora_tratamento,
                b.setor,
                b.id_cotacao,
                d.turno as turno             
                FROM tbl_cotacao a 
                LEFT JOIN tbl_correcao b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN tbl_usuarios c 
                ON c.idtbl_usuario=b.idtbl_usuario_correcao
                LEFT JOIN tbl_turno d 
                ON d.id=c.turno
                WHERE b.setor IN ('Correcao','Correcao') 
                GROUP BY a.cotacao_principal,a.id_cotacao,a.dt_inclusao_bd_cip DESC LIMIT 0,20000  ";
    
         
    
    /*$sql_servico .= $criterios; 
    $sql_servico .="ORDER BY s.idtbl_driver DESC";*/
    //Executa SQL para consulta dos serviços
    $consulta_servico = mysql_query($sql_servico) or die (mysql_error());
     if($consulta_servico ==true){
    
   
      while($linha = mysql_fetch_array($consulta_servico)){
       
        /*if($linha['turno'] == 1)
                    { 
                        $linha['turno']="Diurno";
                    }
                    elseif($linha['turno'] == 2)
                        { 
                        $linha['turno']=utf8_encode("Intermediário");
                        } 
                    elseif($linha['turno'] == 3)
                        { 
                        $linha['turno']="Noturno";
                        }*/
                    
         $soma= $linha['ALTAS']+$linha['BACKUP']+$linha['PORTABILIDADE2'];
             if($linha['ALTAS']== $linha['total_linhas_cip']){
                  $linha['tipo_de_linha']="ALTA";
              }else
                  if( $linha['BACKUP']== $linha['total_linhas_cip']){
                     $linha['tipo_de_linha']="ALTA";
                   }else
                  if( $linha['PORTABILIDADE2']== $linha['total_linhas_cip']){
                     $linha['tipo_de_linha']="ALTA";
                   }else
                     if($soma== $linha['total_linhas_cip']){
                        $linha['tipo_de_linha']="ALTA";
                       }else
                          if($linha['TROCAS'] == $linha['total_linhas_cip']){
                            $linha['tipo_de_linha']="TROCA";                     
                           }else
                           if($linha['TT'] == $linha['total_linhas_cip']){
                            $linha['tipo_de_linha']="TT";                     
                           }else{
                               $linha['tipo_de_linha']="TROCA + MIGRACAO"; 
                                }
                                
         /* inicio bloco altapura*/                       
         /*if($linha['tipo_de_linha'] == "alta pura" ){
            $linha['tipo_processo']="Input de todas linhas";
            $linha['criterio']="Ate 1 dias uteis";
            $linha['dias']="1"; 
           }*/
           if($linha['tipo_de_linha'] == "ALTA" and $linha['total_linhas_cip'] < '51'  ){
            $linha['tipo_processo']="ate 50 Linhas";
            $linha['criterio']="Ate 1 dias uteis"; 
            $linha['dias']="1";
           }else
           if($linha['tipo_de_linha'] == "ALTA" and $linha['total_linhas_cip'] > '50' and $linha['tipo_de_linha'] == "ALTA" and $linha['total_linhas_cip'] < '101'){
            $linha['tipo_processo']="de 51 a 100 Linhas";
            $linha['criterio']="Ate 2 dias uteis"; 
            $linha['dias']="2";
           }else
           if($linha['tipo_de_linha'] == "ALTA" and $linha['total_linhas_cip'] > '100' and $linha['tipo_de_linha'] == "ALTA" and $linha['total_linhas_cip'] < '201'){
            $linha['tipo_processo']="de 101 a 200 Linhas";
            $linha['criterio']="Ate 3 dias uteis"; 
            $linha['dias']="3";
           }else
           if($linha['tipo_de_linha'] == "ALTA" and $linha['total_linhas_cip'] > '200' and $linha['tipo_de_linha'] == "ALTA" and $linha['total_linhas_cip'] < '401'){
            $linha['tipo_processo']="de 201 a 400 Linhas";
            $linha['criterio']="Ate 3 dias uteis"; 
            $linha['dias']="3";
           }else
            if($linha['tipo_de_linha'] == "ALTA" and $linha['total_linhas_cip'] > '400'){
            $linha['tipo_processo']="> 400 Linhas";
            $linha['criterio']="Ate 4 dias uteis"; 
            $linha['dias']="4";
            } 
          /* fimbloco altapura*/  
           
           else
           if($linha['tipo_de_linha'] == "TROCA" and $linha['total_linhas_cip'] < '51'  ){
            $linha['tipo_processo']="ate 50 Linhas";
            $linha['criterio']="Ate 1 dias uteis"; 
            $linha['dias']="1";
           }else
           if($linha['tipo_de_linha'] == "TROCA" and $linha['total_linhas_cip'] > '50' and $linha['tipo_de_linha'] == "TROCA" and $linha['total_linhas_cip'] < '101'){
            $linha['tipo_processo']="de 51 a 100 Linhas";
            $linha['criterio']="Ate 2 dias uteis"; 
            $linha['dias']="2";
           }else
           if($linha['tipo_de_linha'] == "TROCA" and $linha['total_linhas_cip'] > '100' and $linha['tipo_de_linha'] == "TROCA" and $linha['total_linhas_cip'] < '201'){
            $linha['tipo_processo']="de 101 a 200 Linhas";
            $linha['criterio']="Ate 3 dias uteis"; 
            $linha['dias']="3";
           }else
           if($linha['tipo_de_linha'] == "TROCA" and $linha['total_linhas_cip'] > '200' and $linha['tipo_de_linha'] == "TROCA" and $linha['total_linhas_cip'] < '401'){
            $linha['tipo_processo']="de 201 a 400 Linhas";
            $linha['criterio']="Ate 3 dias uteis"; 
            $linha['dias']="3";
           }else
          /* if($linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_cip'] > '400' and $linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_cip'] < '701'){
            $linha['tipo_processo']="Input  acima de 400 linhas";
            $linha['criterio']="Ate 4 dias uteis"; 
            $linha['dias']="4";
           }else
      
           if($linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_cip'] > '700' and $linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_cip'] < '1001'){
            $linha['tipo_processo']="Input  acima de 700 linhas";
            $linha['criterio']="Ate 9 dias uteis"; 
            $linha['dias']="9";
           }else
           if($linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_cip'] > '1000'){
            $linha['tipo_processo']="Input  acima de 1000 linhas";
            $linha['criterio']="Ate 4 dias uteis"; 
            $linha['dias']="4";
           }*/
           
           if($linha['tipo_de_linha'] == "TROCA" and $linha['total_linhas_cip'] > '400'){
            $linha['tipo_processo']="> 400 Linhas";
            $linha['criterio']="Ate 4 dias uteis"; 
            $linha['dias']="4";
           /* fim bloco troca pura*/ 
            
           }else
           
           /* inicio bloco TT*/ 
           if($linha['tipo_de_linha'] == "TT" and $linha['total_linhas_cip'] < '51'  ){
            $linha['tipo_processo']="ate 50 linhas";
            $linha['criterio']="Ate 3 dias uteis"; 
            $linha['dias']="3";
           }else
           if($linha['tipo_de_linha'] == "TT" and $linha['total_linhas_cip'] > '30' and $linha['tipo_de_linha'] == "TT" and $linha['total_linhas_cip'] < '101'){
            $linha['tipo_processo']="de 51 e 100 linhas";
            $linha['criterio']="Ate 4 dias uteis"; 
            $linha['dias']="4";
           }else
           if($linha['tipo_de_linha'] == "TT" and $linha['total_linhas_cip'] > '100' and $linha['tipo_de_linha'] == "TT" and $linha['total_linhas_cip'] < '201'){
            $linha['tipo_processo']="de 101 à 200 Linhas";
            $linha['criterio']="Ate 6 dias uteis"; 
            $linha['dias']="6";
           }else
           if($linha['tipo_de_linha'] == "TT" and $linha['total_linhas_cip'] > '200' and $linha['tipo_de_linha'] == "TT" and $linha['total_linhas_cip'] < '401'){
            $linha['tipo_processo']="de 201 à 400 Linhas";
            $linha['criterio']="Ate 7 dias uteis"; 
            $linha['dias']="7";
           }else
           /*if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_cip'] > '400' and $linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_cip'] < '701'){
            $linha['tipo_processo']="Input  acima de 400 linhas";
            $linha['criterio']="Ate 13 dias uteis"; 
            $linha['dias']="13";
           }else
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_cip'] > '700' and $linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_cip'] < '1001'){
            $linha['tipo_processo']="Input  acima de 700 linhas";
            $linha['criterio']="Ate 16 dias uteis"; 
            $linha['dias']="16";
           }else
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_cip'] > '1000'){
            $linha['tipo_processo']="Input  acima de 1000 linhas";
            $linha['criterio']="Ate 22 dias uteis"; 
            $linha['dias']="22";
           }  */             
                    
            if($linha['tipo_de_linha'] == "TT" and $linha['total_linhas_cip'] > '400'){
            $linha['tipo_processo']="> 400 Linhas";
            $linha['criterio']="Ate 8 dias uteis"; 
            $linha['dias']="8";
           }                       
           /* fim bloco TT*/
       
          
          else
           
           /* inicio bloco migração*/ 
           if($linha['tipo_de_linha'] == "TROCA + MIGRACAO" and $linha['total_linhas_cip'] < '51'  ){
            $linha['tipo_processo']="ate 50 linhas";
            $linha['criterio']="Ate 3 dias uteis"; 
            $linha['dias']="3";
           }else
           if($linha['tipo_de_linha'] == "TROCA + MIGRACAO" and $linha['total_linhas_cip'] > '30' and $linha['tipo_de_linha'] == "TROCA + MIGRACAO" and $linha['total_linhas_cip'] < '101'){
            $linha['tipo_processo']="de 51 a 100 linhas";
            $linha['criterio']="Ate 4 dias uteis"; 
            $linha['dias']="4";
           }else
           if($linha['tipo_de_linha'] == "TROCA + MIGRACAO" and $linha['total_linhas_cip'] > '100' and $linha['tipo_de_linha'] == "TROCA + MIGRACAO" and $linha['total_linhas_cip'] < '201'){
            $linha['tipo_processo']="de 101 a 200 Linhas";
            $linha['criterio']="Ate 6 dias uteis"; 
            $linha['dias']="6";
           }else
           if($linha['tipo_de_linha'] == "TROCA + MIGRACAO" and $linha['total_linhas_cip'] > '200' and $linha['tipo_de_linha'] == "TROCA + MIGRACAO" and $linha['total_linhas_cip'] < '401'){
            $linha['tipo_processo']="de 201 a 400 Linhas";
            $linha['criterio']="Ate 7 dias uteis"; 
            $linha['dias']="7";
           }else
           /*if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_cip'] > '400' and $linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_cip'] < '701'){
            $linha['tipo_processo']="Input  acima de 400 linhas";
            $linha['criterio']="Ate 13 dias uteis"; 
            $linha['dias']="13";
           }else
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_cip'] > '700' and $linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_cip'] < '1001'){
            $linha['tipo_processo']="Input  acima de 700 linhas";
            $linha['criterio']="Ate 16 dias uteis"; 
            $linha['dias']="16";
           }else
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_cip'] > '1000'){
            $linha['tipo_processo']="Input  acima de 1000 linhas";
            $linha['criterio']="Ate 22 dias uteis"; 
            $linha['dias']="22";
           }  */             
                    
            if($linha['tipo_de_linha'] == "TROCA + MIGRACAO" and $linha['total_linhas_cip'] > '400'){
            $linha['tipo_processo']="> 400 Linhas";
            $linha['criterio']="Ate 8 dias uteis"; 
            $linha['dias']="8";
           }                       
           /* fim bloco migração*/





//pegar o dia da semana
//$datafiltro1='2016-02-28 17:01:01';
$datafiltro1=$linha['criado_em'];
$datafiltro=substr($datafiltro1,0,10);
$horafiltro=substr($datafiltro1,10,10);
//diasemana($datatestando);



	$ano =  substr("$datafiltro", 0, 4);
	$mes =  substr("$datafiltro", 5, -3);
	$dia =  substr("$datafiltro", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($diasemana) {
		case"0": $diasemana = utf8_encode("Domingo");       
                          break;
		case"1": $diasemana = utf8_encode("Segunda-Feira");
                             break;
		case"2": $diasemana = utf8_encode("Terça-Feira");   
                                break;
		case"3": $diasemana = utf8_encode("Quarta-Feira");  
                                   break;
		case"4": $diasemana = utf8_encode("Quinta-Feira");  
                                       break;
		case"5": $diasemana = utf8_encode("Sexta-Feira");   
                                           break;
		case"6": $diasemana = utf8_encode("Sábado");        
                                                 break;
   	}


echo $diasemana;
echo "<br>";    
    
    if($diasemana == utf8_encode("Sábado")){
    
    $dia =  substr("$datafiltro", 8, 9)+2;
    
    
    
}elseif($diasemana == utf8_encode("Domingo")){
    
   $dia =  substr("$datafiltro", 8, 9)+1;
    
    
}else{
    
    
 $dia= substr("$datafiltro", 8, 9);  
    
}

echo "Visao: ".$data_atual1=$ano."-".$mes."-".$dia." ".$horafiltro;




     
/* inicio calculo de sla */       
//$calcula_datahorafutura= date("Y-m-d H:i:s"); 
$calcula_datahorafutura= '2016-02-29 17:01:01';            
$horateste= date("H:i:s"); 
echo '<br>';      
echo "Data hoje: ". $DataFuturo = $calcula_datahorafutura;
echo '<br>';
$DataAtual =$data_atual1;
//echo $DataAtual = $linha['criado_em'];
echo '<br>';
$date_time  = new DateTime( $DataAtual );
$diff       = $date_time->diff( new DateTime( $DataFuturo ) );
echo $teste= $diff->format( '%y anos, %m mes, %d dias, %H horas, %i minutos and %s segundos' );   
echo '<br>';
$dias1=$diff->format('%d');
$hora=$diff->format('%H:%i:%s');
/*echo "hora atual :".$horateste;*/
echo '<br>';
echo "hora sistema: ".$hora=$diff->format('%H:%i:%s');
echo '<br>';

    

if($dias1 == 0 ){
    
 //$acumulado=$hora;   
 
$h2=substr($hora,0,2);
echo "hora igual a ". $h2= str_replace(":","",$h2);
echo '<br>';
$m2=substr($hora,3,2);
echo "minutos igual a ".$m2= str_replace(":","",$m2);
echo '<br>';
$s2=substr($hora,5,3);
echo "segundos igual a ".$s2= str_replace(":","",$s2);
echo '<br>';

echo '<br>';

echo "horas qtd caracter: ".strlen($h2);
echo '<br>';
echo "minutos qtd caracter: ".strlen($m2);
echo '<br>';
echo "segundos qtd caracter: ".strlen($s2);

echo '<br>';

/*
if(strlen($m2) == 2 && strlen($s2) == 1 ){
$s2=substr($hora,4,2);
 echo $s2= str_replace(":","",$s2);   
  echo "achou";
     
}
if(strlen($m2) == 2 && strlen($s2) == 2 ){
    
    $s2=substr($hora,6,2);
    $s2= str_replace(":","",$s2);
}

if(strlen($m2) == 1 && strlen($s2) == 1 ){
    
    $s2=substr($hora,4,2);
    $s2= str_replace(":","",$s2);
}*/

/*if($h2 >= 0 && $h2 <= 9 ){
                
               $hb="0".$h2;
                
               }else{
                
                $hb=$h2;
               }
  if($m2 >= 0 && $m2 <= 9 ){
                
                $mb="0".$m2;
                
               }else{
                
                $mb=$m2;
               }
   if($s2 >= 0 && $s2 <= 9 ){
                
                $sb="0".$s2;
                
               }else{
                
                $sb=$s2;
               } */

$hb=$h2;
$mb=$m2;
$sb=$S2;
$H1=$hb;
$M1=$mb;
$S1=$sb;

$H2=$H1;
$M2=$M1;
$S2=$S2;
/*if($H1 >= 0 && $H1 <= 9 ){
                
               $H2="0".$H1;
                
               }else{
                
                $H2=$H1;
               }*/
  if($M1 >= 0 && $M1 <= 9 ){
                
                $M2="0".$M1;
                
               }else{
                
                $M2=$M1;
               }
  /* if($S1 >= 0 && $S1 <= 9 ){
                
                $S2="0".$S1;
                
               }else{
                
                $S2=$S1;
               } */


$acumulado= $H2.":".$M2.":".$S2;
 

 
 
 
    
}elseif($dias1 > 0){
    
$acumulado=($dias1 * 24 ); 
$acumulado2= $acumulado.":"."00".":"."00";

$h1=substr($acumulado,0,2);
$m1=substr($acumulado,3,2);
$s1=substr($acumulado,5,2);
echo '<br>';
$h2=substr($hora,0,2);
echo "hora igual a ". $h2= str_replace(":","",$h2);
echo '<br>';
$m2=substr($hora,3,2);
echo "minutos igual a ".$m2= str_replace(":","",$m2);
echo '<br>';
$s2=substr($hora,5,3);
echo "segundos igual a ".$s2= str_replace(":","",$s2);
echo '<br>';


echo "segundos qtd caracter: ".strlen($s2);

if(strlen($m2) == 2 && strlen($s2) == 1 ){
$s2=substr($hora,6,2);
 echo $s2= str_replace(":","",$s2);   
  echo "achou";
     
}
if(strlen($m2) == 2 && strlen($s2) == 2 ){
    
    $s2=substr($hora,6,2);
    $s2= str_replace(":","",$s2);
}

if(strlen($m2) == 1 && strlen($s2) == 1 ){
    
    $s2=substr($hora,4,2);
    $s2= str_replace(":","",$s2);
}

if($h1 >= 0 && $h1 <= 9 ){
                
               $ha="0".$h1;
                
               }else{
                
                $ha=$h1;
               }
  if($m1 >= 0 && $m1 <= 9 ){
                
                $ma="0".$m1;
                
               }else{
                
                $ma=$m1;
               }
   if($s1 >= 0 && $s1 <= 9 ){
                
                $sa="0".$s1;
                
               }else{
                
                $sa=$s1;
               } 

if($h2 >= 0 && $h2 <= 9 ){
                
               $hb="0".$h2;
                
               }else{
                
                $hb=$h2;
               }
  if($m2 >= 0 && $m2 <= 9 ){
                
                $mb="0".$m2;
                
               }else{
                
                $mb=$m2;
               }
   if($s2 >= 0 && $s2 <= 9 ){
                
                $sb="0".$s2;
                
               }else{
                
                $sb=$s2;
               } 


$H1=$ha + $hb;
$M1=$ma + $mb;
$S1=$sa + $sb;


if($H1 >= 0 && $H1 <= 9 ){
                
               $H2="0".$H1;
                
               }else{
                
                $H2=$H1;
               }
  if($M1 >= 0 && $M1 <= 9 ){
                
                $M2="0".$M1;
                
               }else{
                
                $M2=$M1;
               }
   if($S1 >= 0 && $S1 <= 9 ){
                
                $S2="0".$S1;
                
               }else{
                
                $S2=$S1;
               } 


$acumulado= $H2.":".$M2.":".$S2;
} 
 
echo '<br>'; 
echo "Acumulado: ".$acumulado;  
echo '<br>';       
echo '<hr>';    
if($dias1 <= $linha["dias"]){
   $criterio= "Dentro do prazo";
    
}
else{
    
  $criterio= "Fora do prazo";  
  } 
  if($acumulado < '24:00:00'){
   $criterio2= "Dentro do prazo";
     echo "<br>";
    echo "Dias para vencimento: ".$DD=$linha["dias"];
    echo "<br>";   


  echo  "Vencimento: ". $vencimento= date('Y-m-d H:i:s', strtotime("+$DD  days",strtotime($data_atual1)));
     
  echo "<br>";  

  for($i=0;$i < $linha["dias"];$i++){
  //echo $dia2= substr("$vencimento", 8, 9)+$i;
  
  echo  "Datas ate Vencimento: ". $vencimento2= date('Y-m-d', strtotime("+$i  days",strtotime($data_atual1)));
  
  	$ano =  substr("$vencimento2", 0, 4);
   	$mes =  substr("$vencimento2", 5, -3);
  	$dia =  substr("$vencimento2", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($diasemana) {
		case"0": $diasemana = utf8_encode("Domingo");       
                          break;
		case"1": $diasemana = utf8_encode("Segunda-Feira");
                             break;
		case"2": $diasemana = utf8_encode("Terça-Feira");   
                                break;
		case"3": $diasemana = utf8_encode("Quarta-Feira");  
                                   break;
		case"4": $diasemana = utf8_encode("Quinta-Feira");  
                                       break;
		case"5": $diasemana = utf8_encode("Sexta-Feira");   
                                           break;
		case"6": $diasemana = utf8_encode("Sábado");        
                                                 break;
   	}

echo "<br>"; 
echo $diasemana;
echo "<br>";    
    
    if($diasemana == utf8_encode("Sábado")){
    
    $dia =  substr("$vencimento2", 8, 9)+2;
    
    
    
}elseif($diasemana == utf8_encode("Domingo")){
    
   $dia =  substr("$vencimento2", 8, 9)+1;
    
    
}else{
    
    
 $dia= substr("$vencimento2", 8, 9);  
    
}
echo "<br>"; 
echo "Visao novo vencimento: ".$data_atual1=$ano."-".$mes."-".$dia." ".$horafiltro;
  
  echo "<br>"; 
  }


      
}elseif($acumulado > '24:00:00'){
    
    $criterio2= "Fora do prazo"; 
  echo "<br>";
  echo "Dias para vencimento: ". $DD=$linha["dias"];
  
  echo "<br>";
  
  echo  "Vencimento: ". $vencimento= date('Y-m-d H:i:s', strtotime("+$DD  days",strtotime($data_atual1)));
 
 
  echo "<br>"; 

    echo "<br>"; 
   for($i=0;$i < $linha["dias"];$i++){
 // echo $dia2= substr("$vencimento", 8, 9)+$i;
  
echo  "Datas ate Vencimento: ". $vencimento2= date('Y-m-d', strtotime("+$i  days",strtotime($data_atual1)));

	 $ano =  substr("$vencimento2", 0, 4);
	 $mes =  substr("$vencimento2", 5, -3);
     $dia =  substr("$vencimento2", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($diasemana) {
		case"0": $diasemana = utf8_encode("Domingo");       
                          break;
		case"1": $diasemana = utf8_encode("Segunda-Feira");
                             break;
		case"2": $diasemana = utf8_encode("Terça-Feira");   
                                break;
		case"3": $diasemana = utf8_encode("Quarta-Feira");  
                                   break;
		case"4": $diasemana = utf8_encode("Quinta-Feira");  
                                       break;
		case"5": $diasemana = utf8_encode("Sexta-Feira");   
                                           break;
		case"6": $diasemana = utf8_encode("Sábado");        
                                                 break;
   	}

echo "<br>"; 
echo $diasemana;
echo "<br>";    
    
    if($diasemana == utf8_encode("Sábado")){
    
    $dia =  substr("$vencimento2", 8, 9)+2;
    
    
    
}elseif($diasemana == utf8_encode("Domingo")){
    
   $dia =  substr("$vencimento2", 8, 9)+1;
    
    
}else{
    
    
 $dia= substr("$vencimento2", 8, 9);  
    
}
echo "<br>"; 
echo "Visao novo vencimento: ".$data_atual1=$ano."-".$mes."-".$dia." ".$horafiltro;




  
  echo "<br>"; 
  }


}

//echo "Vencimento: ".$vencimento;
/*echo "<br>";

for($i=0;$i < $linha["dias"];$i++){
    
  echo "<br>";
  
   $dia2 =  substr("$datafiltro", 8, 9)+$i;
   
 
   echo "vencimento atualizado: ". $vencimento2=$ano."-".$mes."-".$dia2." ".$horafiltro;
  
    
  echo "<br>"; 
  
}*/




 
/* fim calculo de sla */   
      
      $myArr=array( $linha['cotacao_principal'],
                    $linha['regional_atribuida'],
	                $linha['uf'],
                    $linha['carteira'],
                    $linha['revisao'],
                    $linha['cliente'],
	                arrumadatahora($linha['criado_em']),
 	                $linha['status_da_cotacao'],
                 	$linha['substatus_da_cotacao'],
                    $linha['ds_status_cip'],
                    $linha['ds_disc_status_cip'],
                    $linha['nome'],
                    arrumadatahora($linha['dt_inclusao_bd_cip']),
                    arrumadata($linha['ds_tratamento']),
                    $linha['ds_hora_tratamento'],
                    $linha['TIPO_SERVICO'],
                    $linha['ALTAS'],
                    $linha['PORTABILIDADE2'],
                    $linha['MIGRACAO'],
                    $linha['TROCAS'],
                    $linha['TT'],
                    $linha['BACKUP'],
                    $linha['M_2_M'],
                    $linha['FIXA'],
                    $linha['PRE_POS'],
                    $linha['MIGRACAO_TROCA'], 
                    $linha['total_linhas_cip'],
                    $linha['setor'], 
                    $linha['turno'],
                    $linha['dias'],
                    $linha['criterio'],
                    $linha['tipo_processo'],
                    $linha['tipo_de_linha'],
                    $dias1,
                    $criterio,
                    $acumulado,
                    $criterio2,
                    arrumadatahora($DataAtual),
                    arrumadatahora($vencimento)
                                         
                    );
         $excel->writeLine($myArr);
      
      }
    }
    $excel->close();

	?>
   
     
</tbody>
</table>

  <?php
    echo utf8_encode(
    "<hr>
      <div align='center'><font size='2' color='#666666'>
            <a  target=\"_blank\" href=\"../site/forms/relatorios/relatorio_$datarel.xls\">
                Abrir relatório em formato Excel.
            </a>
        </font></div>
    <hr>");
    ?>

