<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>

<head>

<link rel="StyleSheet" href="../../css/padrao.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>

<script src="../../js/jquery.tablesorter.min.js"></script>
<script src="../../js/jquery.tablesorter.pager.js"></script>

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
              sorter: false4
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
 
  var width = 600;
  var height = 300;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela2","scrollbars=yes, height=" + height +", width=" +width);
 
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
    var frm = document.form1;
    for(i = 0; i < frm.length; i++) {        
        if(frm.elements[i].type == "checkbox") {
            frm.elements[i].checked = retorno;
        }
     }
}


</script>

</head>

  <?php
  

 
  function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."/".substr($string,3,2)."/".substr($string,0,2);   
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


function tempoData($dataini, $datafim){

	 
 # Split para dia, mes, ano, hora, minuto e segundo da data inicial
 $_split_datehour = explode('  ',$dataini);
 $_split_data = explode("/", $_split_datehour[0]);
 $_split_hour = explode(":", $_split_datehour[1]);
 # Coloquei o parse (integer) caso o timestamp nao tenha os segundos, dai ele fica como 0
 $dtini = mktime ($_split_hour[0], $_split_hour[1], (integer)$_split_hour[2], $_split_data[1], $_split_data[0], $_split_data[2]);
 
 # Split para dia, mes, ano, hora, minuto e segundo da data final
 $_split_datehour = explode(' ',$datafim);
 $_split_data = explode("/", $_split_datehour[0]);
 $_split_hour = explode(":", $_split_datehour[1]);
 $dtfim = mktime ($_split_hour[0], $_split_hour[1], (integer)$_split_hour[2], $_split_data[1], $_split_data[0], $_split_data[2]);
 
 # Diminui a datafim que é a maior com a dataini
 $time = ($dtfim - $dtini);
 
 # Recupera os dias
 $days  = floor($time/86400);
 # Recupera as horas
 $hours = floor(($time-($days*86400))/3600);
 # Recupera os minutos
 $mins  = floor(($time-($days*86400)-($hours*3600))/60);
 # Recupera os segundos
 $secs  = floor($time-($days*86400)-($hours*3600)-($mins*60));
 
 # Monta o retorno no formato
 # 5d 10h 15m 20s
 # somente se os itens forem maior que zero
 $retorno  = "";
 $retorno .= ($days>0)  ?  $days .'d ' : ""  ;
 $retorno .= ($hours>0) ?  $hours .'h ': ""  ;
 $retorno .= ($mins>0)  ?  $mins .'m ' : ""  ;
 $retorno .= ($secs>0)  ?  $secs .'s ' : ""  ;
 
 # Se o dia for maior que 3 fica vermelho
 if($days > 3){
 return "<span style='color:red'>".$retorno."</span>";
 }
 return $retorno;
 
 }
 
 

 date_default_timezone_set("Brazil/East");

 $data2=date('d/m/Y H:i:s');


//include("../../gala/bd.php");
include("../../bd.php");
ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );

//echo $_POST["status_ci"];


/*$sql = "SELECT MAX(a.id_cotacao)as id_cotacao
               FROM tbl_cotacao a INNER JOIN tbl_analise b 
               ON a.id_cotacao=b.id_cotacao
               WHERE a.carteira LIKE '$canal%' and 
                       b.status_cip_analise NOT IN (3)  LIMIT 0,20000 ";
$acao2 = mysql_query($sql) or die (mysql_error());
while($linha_atv = mysql_fetch_assoc($acao2)){
echo $id_cotacafiltro=$linha_atv['id_cotacao'];
echo '<br>';
}*/



if(empty($_POST['filtros']) || empty($_POST['filtros2']) ){
    
  echo "<script type=\"text/javascript\">
        alert('Sem cotações neste critério !');
        history.back();
       </script>";
        exit;
    
    
}




if($_POST['filtros'] == 'Fora do Prazo'){
    
    $criter=" AND a.PRAZO_DIAS='Fora do prazo'";
    
} 
if($_POST['filtros'] == 'Dentro do Prazo'){
    
   $criter=" AND a.PRAZO_DIAS='Dentro do prazo'";
    
}


if($_POST['filtros'] == '1.Vence Hoje'){
    
   $criter=" AND a.VENCIMENTODIAS='1.Vence Hoje'";
    
}


if($_POST['filtros'] == '2.Vence D+1'){
    
    $criter=" AND a.VENCIMENTODIAS='2.Vence D+1'";
    
}

if($_POST['filtros'] == '3.Vence D+2'){
    
    $criter=" AND a.VENCIMENTODIAS='3.Vence D+2'";
    
} 		
if($_POST['filtros'] == '4.Vence D>2'){
    
    $criter=" AND a.VENCIMENTODIAS='4.Vence D>2'";
    
}


if($_POST['filtrar'] == 'analise') {
  $criter1 = '';  
}elseif($_POST['filtros2'] == '(d.status_cip_chamado=30 OR d.status_cip_chamado=31)' ){    
       $criter1 = " AND ".$_POST['filtros2']." "."";
     
     }elseif($_POST['filtros2'] == 'd.status_cip_chamado=33' ){    
        $criter1 = " AND ".$_POST['filtros2']." "."";
     
     }
     else{
         
       $criter1 = '';    
     }
     
     
  





if($_POST['filtrar'] == 'analise' && $_POST['filtros2'] == '%'){

  $sql = "SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_analise as status_cip,
                b.disc_status_cip_analise as disc_status_cip,
                b.idtbl_usuario_analise as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_analise b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_analise                 
                WHERE (b.status_cip_analise=4)   
                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                AND a.TIPO_COTACAO='Principal'  $criter  
                GROUP BY a.n_da_cotacao 
         UNION 
        SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_analise as status_cip,
                b.disc_status_cip_analise as disc_status_cip,
                b.idtbl_usuario_analise as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_analise b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_analise                 
                WHERE (b.status_cip_analise=3 )   
                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                    AND a.TIPO_COTACAO='Principal' $criter 
                 GROUP BY a.n_da_cotacao 
                UNION 
                SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
                a.revisao,
                a.criado_em,
                a.carteira, $criter1
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_analise as status_cip,
                b.disc_status_cip_analise as disc_status_cip,
                b.idtbl_usuario_analise as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_analise b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_analise                 
                WHERE (b.status_cip_analise=2 )   
                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                    AND a.TIPO_COTACAO='Principal' $criter    
                GROUP BY a.n_da_cotacao       
         ";
        
        
        $setor="Análise";

 		
}


if($_POST['filtrar'] == 'input' && $_POST['filtros2'] == '%'){

  $sql = "SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_input as status_cip,
                b.disc_status_cip_input as disc_status_cip,
                b.idtbl_usuario_input as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_input b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_input                 
                WHERE (b.status_cip_input=8 )   
                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                AND (a.TIPO_COTACAO='Principal')  $criter  
                GROUP BY a.n_da_cotacao 
         UNION 
        SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_input as status_cip,
                b.disc_status_cip_input as disc_status_cip,
                b.idtbl_usuario_input as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_input b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario = b.idtbl_usuario_input             
                WHERE (b.status_cip_input=7 )   
                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                AND (a.TIPO_COTACAO='Principal')  $criter  
                GROUP BY a.n_da_cotacao 
                        
         ";
        
        
        $setor="Input";

 		
}


if($_POST['filtrar'] == 'auditoria' && $_POST['filtros2'] == '%'){

 $sql = "SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_auditoria as status_cip,
                b.disc_status_cip_auditoria as disc_status_cip,
                b.idtbl_usuario_auditoria as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_auditoria b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_auditoria                 
                WHERE (b.status_cip_auditoria=14 )   
                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                AND (a.TIPO_COTACAO='Principal' OR a.TIPO_COTACAO='Complementar')   $criter  
                GROUP BY a.n_da_cotacao 
         UNION 
        SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_auditoria as status_cip,
                b.disc_status_cip_auditoria as disc_status_cip,
                b.idtbl_usuario_auditoria as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_auditoria b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_auditoria               
                WHERE (b.status_cip_auditoria=13 )   
                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                    AND (a.TIPO_COTACAO='Principal' OR a.TIPO_COTACAO='Complementar')  $criter   
                GROUP BY a.n_da_cotacao     
                  
         ";
        
        
        $setor="Auditoria";

 		
}


if($_POST['filtrar'] == 'correcao' && $_POST['filtros2'] == '%'){

 $sql = "SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_correcao as status_cip,
                b.disc_status_cip_correcao as disc_status_cip,
                b.idtbl_usuario_correcao as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_correcao b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_correcao                 
                WHERE (b.status_cip_correcao=20 )   
                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                AND (a.TIPO_COTACAO='Principal' OR a.TIPO_COTACAO='Complementar')   $criter  
                GROUP BY a.n_da_cotacao 
         UNION 
        SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_correcao as status_cip,
                b.disc_status_cip_correcao as disc_status_cip,
                b.idtbl_usuario_correcao as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_correcao b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_correcao               
                WHERE (b.status_cip_correcao=21 )   
                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                    AND (a.TIPO_COTACAO='Principal' OR a.TIPO_COTACAO='Complementar')  $criter  
                GROUP BY a.n_da_cotacao     
                  
         ";
        
        
        
        $setor="Correção";

 		
}



if($_POST['filtrar'] == 'input' && $_POST['filtros2'] == '(d.status_cip_chamado=30 OR d.status_cip_chamado=31)' 
             || $_POST['filtrar'] == 'input' && $_POST['filtros2'] == 'd.status_cip_chamado=33' ){

  $sql = " SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                d.status_cip_chamado as status_cip,
                d.status_cip_chamado as disc_status_cip,
                b.idtbl_usuario_input as idtbl_usuario
                FROM cip_nv.tbl_cotacao a 
                INNER JOIN cip_nv.tbl_input b   
                ON a.id_cotacao=b.id_cotacao
                INNER JOIN cip_nv.tbl_chamado d 
                ON b.id_cotacao=d.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_input              
                WHERE (d.status_cip_chamado=30 OR d.status_cip_chamado=31 OR d.status_cip_chamado=33 ) AND d.setor_origem='Input' 

                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                AND (a.TIPO_COTACAO='Principal')  $criter  $criter1 
                GROUP BY a.n_da_cotacao 
            
         ";
        
        
        $setor="Input";

 		
}



if($_POST['filtrar'] == 'auditoria' && $_POST['filtros2'] == '(d.status_cip_chamado=30 OR d.status_cip_chamado=31)' 
             || $_POST['filtrar'] == 'auditoria' && $_POST['filtros2'] == 'd.status_cip_chamado=33' ){

  $sql = "SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_auditoria as status_cip,
                d.status_cip_chamado as disc_status_cip,
                b.idtbl_usuario_auditoria as idtbl_usuario
                FROM cip_nv.tbl_cotacao a 
                INNER JOIN cip_nv.tbl_auditoria b   
                ON a.id_cotacao=b.id_cotacao
                INNER JOIN cip_nv.tbl_chamado d 
                ON b.id_cotacao=d.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_auditoria              
                WHERE (d.status_cip_chamado=30 OR d.status_cip_chamado=31 OR d.status_cip_chamado=33 )  AND d.setor_origem='Auditoria'  

                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                AND (a.TIPO_COTACAO='Principal' OR a.TIPO_COTACAO='Complementar')  $criter $criter1 
                GROUP BY a.n_da_cotacao    
         ";
        
        
        $setor="Auditoria";

 		
}

if($_POST['filtrar'] == 'correcao' && $_POST['filtros2'] == '(d.status_cip_chamado=30 OR d.status_cip_chamado=31)' 
             || $_POST['filtrar'] == 'correcao' && $_POST['filtros2'] == 'd.status_cip_chamado=33'){

  $sql = " SELECT DISTINCT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                a.cliente_tipo,
                a.oferta_smart_vivo,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_correcao as status_cip,
                d.status_cip_chamado as disc_status_cip,
                b.idtbl_usuario_correcao as idtbl_usuario
                FROM cip_nv.tbl_cotacao a 
                INNER JOIN cip_nv.tbl_correcao b   
                ON a.id_cotacao=b.id_cotacao
                INNER JOIN cip_nv.tbl_chamado d 
                ON b.id_cotacao=d.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_correcao              
                WHERE (d.status_cip_chamado=30 OR d.status_cip_chamado=31 OR d.status_cip_chamado=33 )  AND d.setor_origem='Correcao'  

                AND SUBSTRING(a.criado_em,1,10) BETWEEN '{$_POST['data_1']}' AND '{$_POST['data_2']}' 
                AND (a.TIPO_COTACAO='Principal' OR a.TIPO_COTACAO='Complementar')  $criter  $criter1
                GROUP BY a.n_da_cotacao      
         ";
        
        
        
        $setor="Correção";

 		
}


?>

<table class="tablepadrao" >
<td>
<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="../forms/formdetalhes_visao_cotacao_pendentes2.php" method="post" id="frm-filtro">

<p align="center"><b><font color="#337ab7" size="5" face="Gotham Light"><?php echo $setor; ?></font></b></p>
<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Lista de cotações a redistribuir</strong></font></p>
<br />
<?php
$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);

if($num_ <=0 || empty($criter) || empty($_POST['filtros']) || empty($_POST['filtros2']) ){
    
  echo "<script type=\"text/javascript\">
        alert('Sem cotações neste critério !');
        history.back();
       </script>";
        exit;
    
    
}



?>

 <p>Voc&ecirc; tem um total de <?php echo "$num_ cota&ccedil;&otilde;es"?> 
    na sua vis&atilde;o:</font></p>
  <br />
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>

   <br /><br /><br /><br />
   
   
   

   
    <table border="0" class="lista-clientesvisaoanalise" width="10%">
    <thead> 
    
    <tr>
    <th>
    </th>
    <th><font size='1'>PRINCIPAL</font></th>
    <?php if($setor != "Análise"){?> 
    <th><font size='1'>COMPLEMENTAR</font></th>
    <?php } ?>
    <th><font size='1'>CLIENTE TIPO</font></th>
    <th><font size='1'>REVISAO</font></th>
    <th><font size='1'>VISAO ILHA</font></th>
    <th><font size='1'>VENCIMENTO</font></th>
    <th><font size='1'>STATUS SLA</font></th>
    <th><font size='1'>SLA DIAS</font></th>
    <th><font size='1'>DATA DISTRIBUIÇÃO</font></th>
    <th><font size='1'>SUB-STATUS COTAÇÃO</font></th>
    <th><font size='1'>STATUS CIP</font></th>
    <th><font size='1'>OPERADOR</font></th> 
    <th><font size='1'>TIPO LINHA</font></th>
    <th><font size='1'>TOTAL LINHAS</font></th>
    <th><font size='1'>TIPO</font></th>
    <th><font size='1'>CLIENTE</font></th>
    <th><font size='1'>TIPO COTAÇÃO</font></th>
    <th><font size='1'>INFORM.</font></th>
    <th><font size='1'>OFERTA SMART VIVO CORPORATE</font></th>
  </tr>
    </thead>
         <tbody>
    
    <?php




while($linha_atv = mysql_fetch_assoc($acao))
{
  $id_cotacao           = $linha_atv["id_cotacao"];
  $cotacao_principal    = $linha_atv["cotacao_principal"];
  $n_da_cotacao         = $linha_atv["n_da_cotacao"];
  $revisao              = $linha_atv["revisao"];
  $regional             = $linha_atv["regional_atribuida"];
  $uf                   = $linha_atv["uf"];
  $criado_em            = $linha_atv["criado_em"];
  $tipo                 = $linha_atv["carteira"];
  $cliente              = $linha_atv["cliente"];
  $status_cota_vivocorp = $linha_atv["status_da_cotacao"];
  $sub_status_vivocorp  = $linha_atv["substatus_da_cotacao"];
  $status_vivocorp      = $linha_atv["status"];
  $ALTAS                = $linha_atv['ALTAS'];
  $PORTABILIDADE        = $linha_atv['PORTABILIDADE2'];
  $MIGRACAO             = $linha_atv['MIGRACAO'];
  $TROCAS               = $linha_atv['TROCAS'];
  $TT                   = $linha_atv['TT'];
  $BACKUP               = $linha_atv['BACKUP'];
  $M_2_M                = $linha_atv['M_2_M'];
  $FIXA                 = $linha_atv['FIXA'];
  $PRE_POS              = $linha_atv["PRE_POS"]; 
  $MIGRACAO_TROCA       = $linha_atv["MIGRACAO_TROCA"];     
  $TIPO_SERVICO         = $linha_atv["TIPO_SERVICO"];
  $total_linhas_cip     = $linha_atv["total_linhas_cip"];
  $dt_distribuicao      = $linha_atv["dt_distribuicao"];
  $dia                  = $linha_atv["dia"];
  $TEMPO                = $linha_atv["TEMPO"];
  $TIPO_PROCESSO        = $linha_atv["TIPO_PROCESSO"];
  $TIPO_LINHA           = $linha_atv["TIPO_DE_LINHA"];
  $SLA_DIAS             = $linha_atv["SLA_DIAS"];
  $PRAZO_DIAS           = $linha_atv["PRAZO_DIAS"];
  $visao_ilha           = $linha_atv["visao_ilha"];
  $vencimento           = $linha_atv["vencimento_ilha"];
  $status_cip           = $linha_atv["status_cip"];
  $disc_status_cip      = $linha_atv["disc_status_cip"];
  $total_linhas_cip     = $linha_atv["total_linhas_cip"];
  $usuario_analise      = $linha_atv["idtbl_usuario"];
  $TIPO_COTACAO         = $linha_atv["TIPO_COTACAO"];
  $cliente_tipo        = $linha_atv["cliente_tipo"];
  $oferta_smart_vivo   = $linha_atv["oferta_smart_vivo"];
  $nome                = $linha_atv['nome'];

$criado_em=arrumadatahora($criado_em);
$dt_distribuicao=arrumadatahora($dt_distribuicao);
/*
if(!empty($dt_distribuicao)){

$diferenca=tempoData($dt_distribuicao,$data2);

}*/

if($status_cip =='2'){

$cor = '#FF0000';
}
else
{
$cor = '#464646';
}



if(empty($oferta_smart_vivo)){

  $oferta_smart_vivo ="_";
  $cor = '#464646';
 
}else{

  $oferta_smart_vivo=$oferta_smart_vivo;
   $cor = '#FF0000';

}




if(empty($cliente_tipo)){

  $cliente_tipo="TOP";
  $cor = '#464646';
 
}else{

  $cliente_tipo=$cliente_tipo;
   $cor = '#FF0000';

}

/*if(empty($diferenca)){
    
   $diferenca = '-'; 
}*/


if(empty($nome)){
    
   $nome = '-'; 
}


if($linha_atv['disc_status_cip'] == 30 || $linha_atv['disc_status_cip'] == 31){
    
  $disc_status_cip='Aguardando chamado';  
}
if($linha_atv['disc_status_cip'] == 33){
    
  $disc_status_cip='Pendente chamado';  
}




?>
     <tr>
     <td>
     <?php if ($status_cip == 30 || $status_cip == 11  || $status_cip == 17 || $status_cip == 2 || $status_cip == 33 || $status_cip == 31){ ?>
      <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo $id_cotacao; ?>"  disabled="true" />
      <?php }else{ ?>
          <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo $id_cotacao; ?>"/>

       <?php } ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cotacao_principal</font>"?></td>
   <?php if($setor != "Análise"){?>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$n_da_cotacao</font>"?></td>
    <?php } ?>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente_tipo</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$revisao</font>"?></td>
    <td class="tdconteudo"><?php echo  "<font size='1' color='$cor' face='Arial'>".arrumadatahora($visao_ilha)."</font>" ?></td> 
    <td class="tdconteudo"><?php echo  "<font size='1' color='$cor' face='Arial'>".arrumadatahora($vencimento)."</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$PRAZO_DIAS</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$SLA_DIAS</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$dt_distribuicao</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$sub_status_vivocorp</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$disc_status_cip</font>" ?></td>
    <td><?php echo "<font size='1' color='$cor' face='Arial'>$nome</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$TIPO_LINHA</font>" ?></td>
    <td class="tdconteudo">
    <a href="javascript:abrir('formdetalhes_linhas_cotacao.php?id_cotacao=<?php echo $id_cotacao; ?>');">
    <?php echo "<font size='1' color='$cor' face='Arial'>$total_linhas_cip</font>" ?></a></td> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tipo</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$TIPO_COTACAO</font>" ?></td>
    
    <td class="tdconteudo"><?php  if(empty($informacoes)){ echo  "<font size='1' color='$cor' face='Arial'>".$informacoes= "-"."</font>"; }else{ echo "<font size='1' color='$cor' face='Arial'>".$informacoes."</font>"; } ?></td> 

     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$oferta_smart_vivo</font>" ?></td>

    
    </tr>
    <?php
  	}
	?>
    </tbody>
  </table>
  <br />

  <?php 
  if(!empty($cao)){

  mysql_free_result($acao,$acao2,$acao_operador);

  }
  mysql_close($conecta); 

  ?> 
   <input type="hidden" name="filtrar" value="<?php echo $_POST['filtrar'] ?>"/>
   <input type="hidden" name="setor" value="<?php echo $setor ?>"/>
  <input type="hidden" name="status_cip" value="<?php echo $status_cip ?>"/>
  <input type="button" name="Submit2" value="Voltar" onclick="history.back();" class="sb2 bradius" />

    <input type="submit" name="Submit" value="Avançar" class="sb2 bradius" />

</form>
</div>
</div>
</td>
</table>
</body>
</html>

