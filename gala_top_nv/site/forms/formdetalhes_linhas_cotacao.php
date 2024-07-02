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
 
  var width = 1024;
  var height =800;
 
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
  
 
//include("../../gala/bd.php");
include("../../bd.php");



$sql = "SELECT  a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.total_linhas_cip
                FROM tbl_cotacao a  
               WHERE a.id_cotacao = '".$_GET['id_cotacao']."'                
 
              ORDER BY a.id_cotacao ";






?>

<div id="resolucao">
<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="../forms/formdetalhes_visao_cotacao_analise2.php" method="post" id="frm-filtro">

<p align="center"><b><font color="#a0873c" size="5" face="Gotham Light">Tipo de linhas</font></b></p>
<br />
<br />
<?php
$acao = mysql_query($sql) or die (mysql_error());
$num_ = mysql_num_rows($acao);
?>

  
    <table border="0" class="lista-clientesvisaoanalise" width="10%">
    <thead> 
    
    <tr>
    <th>PRINCIPAL</th>
    <th>COMPLEMENTAR</th>
    <th>ALTAS</th>
    <th>PORTAB.</th>
    <th>MIGRACAO</th>
    <th>TROCAS</th>
    <th>TT</th>
    <th>BACKUP</th>
    <th>M_2_M</th>
    <th>FIXA</th>
    <th>PRE POS</th> 
    <th>MIGRACAO TROCA</th>     
    <th>TOTAL LINHAS</th>
    
  </tr>
    </thead>
         <tbody>
    
    <?php


$acao = mysql_query($sql) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
	$id_cotacao            = $linha_atv["id_cotacao"];
  $cotacao_principal    = $linha_atv["cotacao_principal"];
  $n_da_cotacao         = $linha_atv["n_da_cotacao"];
  $ALTAS                =$linha_atv['ALTAS'];
  $PORTABILIDADE        =$linha_atv['PORTABILIDADE2'];
  $MIGRACAO             =$linha_atv['MIGRACAO'];
  $TROCAS               =$linha_atv['TROCAS'];
  $TT                   =$linha_atv['TT'];
  $BACKUP               =$linha_atv['BACKUP'];
  $M_2_M                =$linha_atv['M_2_M'];
  $FIXA                 =$linha_atv['FIXA'];
  $PRE_POS              = $linha_atv["PRE_POS"]; 
  $MIGRACAO_TROCA       = $linha_atv["MIGRACAO_TROCA"];     
  $TIPO_SERVICO         = $linha_atv["TIPO_SERVICO"];
  $total_linhas_cip    = $linha_atv["total_linhas_cip"];

	
?>
     <tr>
    <td><?php echo "$cotacao_principal"?></td>
     <td><?php echo "$n_da_cotacao"?></td>
    <td><?php echo "$ALTAS" ?></td> 
    <td><?php echo "$PORTABILIDADE" ?></td> 
    <td><?php echo "$MIGRACAO" ?></td>
    <td><?php echo "$TROCAS" ?></td>
    <td><?php echo "$TT" ?></td> 
    <td><?php echo "$BACKUP" ?></td>
    <td><?php echo "$M_2_M" ?></td> 
    <td><?php echo "$FIXA" ?></td> 
    <td><?php echo "$PRE_POS" ?></td>
    <td><?php echo "$MIGRACAO_TROCA" ?></td>    
    <td><?php echo "$total_linhas_cip" ?></td> 
    
    </tr>
    <?php
  	}
	?>
    </tbody>
  </table>
  <br />

  <input type="button" name="Submit2" value="Fechar" onclick="window.close();" class="sb2 bradius" />
</form>
</div>
</div>
</div>
</body>
</html>

