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
    
  

<script type="text/javascript" src="../../js/jquery2.js"></script>

 <script> 
 /*filtro operador input por turno*/
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_input]").html('<option value="0">Carregando...</option>');
            $.post("processa_input.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operador_input]").html(valor);
					 $teste=$ln['login_operador_input'];	
				  }
                  )
         })
      }) 
 
 
 /*filtro operador auditoria por turno*/
$(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_auditoria]").html('<option value="0">Carregando...</option>');
            $.post("processa_auditoria.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operador_auditoria]").html(valor);
					 $teste=$ln['login_operador_auditoria'];	
				  }
                  )
         })
      }) 
 
 /*filtro operador analise por turno*/
$(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_analise]").html('<option value="0">Carregando...</option>');
            $.post("processa_analise.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operador_analise]").html(valor);
					 $teste=$ln['login_operador_analise'];	
				  }
                  )
         })
      }) 
 

 /*filtro operador correção por turno*/
$(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_correcao]").html('<option value="0">Carregando...</option>');
            $.post("processa_correcao.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operador_correcao]").html(valor);
					 $teste=$ln['login_operador_correcao'];	
				  }
                  )
         })
      }) 
 
 /*filtro operador correção por turno*/
$(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_chamado]").html('<option value="0">Carregando...</option>');
            $.post("processa_chamado.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operador_chamado]").html(valor);
           $teste=$ln['login_operador_chamado']; 
          }
                  )
         })
      }) 
 

</script> 



</head>
<body>
  <?php
  
  
  function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,7,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."/".substr($string,7,2)."/".substr($string,0,2);   
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



 
include("../../bd.php");

ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );


//$id_user = (int) $_GET['id_user'];
//$setor   = (string) $_GET['setor'];

 
if(empty($_POST["ling"])){
    
 echo "
       <script type=\"text/javascript\">
        alert('Selecione alguma cotação !');
        history.back();
	    </script>
 ";   
    
    
 exit();   
}



$filtrar = (string) $_POST['filtrar'];
$setor   = (string) $_POST['setor'];

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}


                
                
        
                
                if($_POST['status_cip'] == 33 && $_POST['status_cip'] == 7 && $setor == 'Input'){
                    
                   $criterf=' AND  b.status_cip_input=7 ';
                    
                }
                 if($_POST['status_cip'] == 33 && $_POST['status_cip'] == 13 && $setor == 'Auditoria'){
                    
                   $criterf=' AND  b.status_cip_auditoria=13 ';
                    
                }
                 if($_POST['status_cip'] == 33 && $_POST['status_cip'] == 20 && $setor == 'Correcao'){
                    
                     $criterf=' AND  b.status_cip_correcao=20 ';
                    
                }
                   if($_POST['status_cip'] == 30 && $_POST['status_cip'] == 7 && $setor == 'Input'){
                    
                   $criterf=' AND  b.status_cip_input=7 ';
                    
                }
                 if($_POST['status_cip'] == 30 && $_POST['status_cip'] == 13 && $setor == 'Auditoria'){
                    
                     $criterf=' AND  b.status_cip_auditoria=13 ';
                    
                }
                 if($_POST['status_cip'] == 30 && $_POST['status_cip'] == 20 && $setor == 'Correcao'){
                    
                       $criterf=' AND  b.status_cip_correcao=20 ';
                    
                }
                   if($_POST['status_cip'] == 31 && $_POST['status_cip'] == 7 && $setor == 'Input'){
                    
                    $criterf=' AND  b.status_cip_input=7 ';
                    
                }
                 if($_POST['status_cip'] == 31 && $_POST['status_cip'] == 13 && $setor == 'Auditoria'){
                    
                     $criterf=' AND  b.status_cip_auditoria=13 ';
                    
                }
                 if($_POST['status_cip'] == 31 && $_POST['status_cip'] == 20 && $setor == 'Correcao'){
                    
                        $criterf=' AND  b.status_cip_correcao=20 ';
                    
                }
                else{
                    
                  $criterf='';  
                }


?>

<table class="tablepadrao" >
<td>
<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" method="post" action="../controles/sql_detalhes_visao_cotacao_pendentes4.php" id="frm-filtro">

<p align="center"><b><font color="#337ab7" size="5" face="Gotham Light"><?php echo $setor; ?></font></b></p>
<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Lista de cotações a redistribuir</strong></font></p>
<br />


      
<input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
</p>

<br /><br /><br /><br />
   <?php if($setor == "Análise" ){ ?>
   <p>
             <font color="#000000" size="3" face="Gotham Light">
   Selecione o Turno:</font> 
   		<select name="id_filtro" id="id_filtro" class="txt2comboboxpequeno">
          		    <option value="0" selected="selected">Selecione</option>
					<?php
                     					 
                     $sql = "SELECT * FROM cip_nv.tbl_turno ORDER BY id DESC ";
                     $qr = mysql_query($sql,$conecta) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id_filtro'].'">'.$ln['turno'].'</option>';
                     }
                     ?>
                </select>
       
       <font color="#000000" size="3" face="Gotham Light">
    Selecione o operador:</font> 
    <select class="txt2comboboxgrande" class="sb" name="login_operador_analise" id="login_operador_analise">
      <option value="0" selected="selected">Selecione</option>
    </select>
      

   <?php } ?>
   
   <?php if($setor == "Input" ){ ?>
       
   <p>
            <font color="#000000" size="3" face="Gotham Light">
               Selecione Turno:</font> 
   		<select name="id_filtro" id="id_filtro" class="txt2comboboxpequeno">
          		    <option value="0" selected="selected">Selecione</option>
					<?php
                     
					 
                     $sql = "SELECT * FROM cip_nv.tbl_turno ORDER BY id DESC ";
                     $qr = mysql_query($sql,$conecta) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id_filtro'].'">'.$ln['turno'].'</option>';
                     }
                     ?>
                     </select>
       <font color="#000000" size="3" face="Gotham Light">
    Selecione o operador:</font> 
    <select class="txt2comboboxgrande" class="sb" name="login_operador_input" id="login_operador_input">
      <option value="0" selected="selected">Selecione</option>
    </select>
    
 
   <?php } ?>
   
    <?php if($setor == "Auditoria" ){ ?>
   <p>
        <font color="#000000" size="3" face="Gotham Light">
         Selecione Turno:</font> 
   		<select name="id_filtro" id="id_filtro" class="txt2comboboxpequeno">
          		    <option value="0" selected="selected">Selecione</option>
					<?php
                    
					 
                     $sql = "SELECT * FROM cip_nv.tbl_turno ORDER BY id DESC ";
                     $qr = mysql_query($sql,$conecta) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id_filtro'].'">'.$ln['turno'].'</option>';
                     }
                     ?>
                     </select>
    
    
   
       
       <font color="#000000" size="3" face="Gotham Light">
    Selecione o operador:</font> 
    <select class="txt2comboboxgrande" class="sb" name="login_operador_auditoria" id="login_operador_auditoria">
      <option value="0" selected="selected">Selecione</option>
    </select>
    
<?php } ?>
   
 <?php if($setor == "Correção" ){ ?>
       
   <p>
          <font color="#000000" size="3" face="Gotham Light">
            Selecione Turno:</font> 
   		<select name="id_filtro" id="id_filtro" class="txt2comboboxpequeno">
          		    <option value="0" selected="selected">Selecione</option>
					<?php
                   
					 
                     $sql = "SELECT * FROM cip_nv.tbl_turno ORDER BY id DESC ";
                     $qr = mysql_query($sql,$conecta) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id_filtro'].'">'.$ln['turno'].'</option>';
                     }
                     ?>
                     </select>
                     
     
       
       
       <font color="#000000" size="3" face="Gotham Light">           
    Selecione o operador:</font> 
    <select class="txt2comboboxgrande" class="sb" name="login_operador_correcao" id="login_operador_correcao">
      <option value="0" selected="selected">Selecione</option>
    </select>
    
   <?php } ?>


</p>
 

<br /><br />

    <table border="0" class="lista-clientesvisaoanalise" width="10%" >
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
            
   
foreach($_POST["ling"] as $id_cotacao)
{

  

if($filtrar == 'analise'){

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
                a.cliente_tipo,
                a.oferta_smart_vivo,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_analise as status_cip,
                b.disc_status_cip_analise as disc_status_cip,
                b.idtbl_usuario_analise as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_analise b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_analise                
                WHERE a.carteira LIKE '$canal' 
                AND b.id_cotacao='$id_cotacao'   
       ORDER BY b.dt_distribuicao DESC ";
        
        
        $setor="Análise";


}

if($filtrar == 'input'){

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
                a.cliente_tipo,
                a.oferta_smart_vivo,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_input as status_cip,
                b.disc_status_cip_input as disc_status_cip,
                b.idtbl_usuario_input as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_input b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_input                
                WHERE a.carteira LIKE '$canal' 
                AND b.id_cotacao='$id_cotacao' 
       ORDER BY b.dt_distribuicao DESC  ";
        
        
        $setor="Input";


}

if($filtrar == 'auditoria'){

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
                a.cliente_tipo,
                a.oferta_smart_vivo,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_auditoria as status_cip,
                b.disc_status_cip_auditoria as disc_status_cip,
                b.idtbl_usuario_auditoria as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_auditoria b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_auditoria                
                WHERE a.carteira LIKE '$canal' 
                AND b.id_cotacao='$id_cotacao' 
       ORDER BY b.dt_distribuicao DESC  ";
        
        
        $setor="Auditoria";


}


if($filtrar == 'correcao'){

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
                a.cliente_tipo,
                a.oferta_smart_vivo,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                c.nome,
                b.dt_distribuicao,
                b.status_cip_correcao as status_cip,
                b.disc_status_cip_correcao as disc_status_cip,
                b.idtbl_usuario_correcao as idtbl_usuario
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_correcao b 
                ON a.id_cotacao=b.id_cotacao
                LEFT JOIN cip_nv.tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_correcao                
                WHERE a.carteira LIKE '$canal' 
                AND b.id_cotacao='$id_cotacao' 
       ORDER BY b.dt_distribuicao DESC  ";
        
        
        $setor="Correção";


}

$acao = mysql_query($sql,$conecta) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
	
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

if(empty($nome)){
    
   $nome = '-'; 
}


?>
 
     <tr> 
     <td>
      <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id_cotacao" ?>" checked readonly="True"/></td>
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
       }
	?>
    </tbody>
  </table>
 
  <br />

 <?php 
  if(!empty($cao)){
  mysql_free_result($acao,$acao2,$acao_operador,$qr);
  }
  mysql_close($conecta); 

  ?> 

<p>
 <input type="hidden" name="setor" value="<?php echo $setor ?>"/>   
 <input type="hidden" name="status_cip" value="<?php echo $status_cip ?>"/>
  <input type="button" name="Submit2" value="Voltar" onclick="history.back();" class="sb2 bradius" />

  <input type="submit" name="Submit" value="Redistribuir" class="sb2 bradius" />
 </p>
</form>
</div>
</div>

</td>
</table>
