<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 1.01 Frameset//EN" "http://www.w3.org/TR/html1/frameset.dtd">

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


<script language="JavaScript">
function abrir3(URL) {
 
  var width = 780;
  var height = 300;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>


</head>

  <?php
  

 
  
  function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,1)."".substr($string,3,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,1)."/".substr($string,3,2)."/".substr($string,0,2);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,1)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,1)." ".substr($string2,10,9);
        
       }
return $data2;
}
  
 
//include("../../gala/bd.php");
 include("../../bd.php");
ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );


 $sql = "SELECT 
                a.id_cotacao_filha,
                a.uf, 
                a.cotacao_principal,
                a.n_da_cotacao,
                a.revisao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status,
                a.substatus,
                b.total_linhas,
                a.altas,
                a.portabilidade,
                a.migracao,
                a.trocas,
                a.tt,
                a.backup,
                a.m2m,
                a.fixa,
                a.pre_pos,
                a.migracao_troca,
                a.qtd_linhas_negociacao,
                a.DDD,
                a.tipo_servico
                FROM cip_nv.base_diretoria_complementar a 
                LEFT JOIN cip_nv.base_diretoria b 
                ON b.id='{$_GET['idpri']}' 
                WHERE a.id_cotacao_filha='{$_GET['id_cotacao_filha']}' 
                               
        GROUP BY a.n_da_cotacao ASC
        ";






?>


<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="../controles/sql_atualiza_diretoria_complementar.php" method="post" id="frm-filtro">
<br />

<p><font color="#337ab7" size="2" face="Gotham Light"><strong>Lista de cotações complementares vinculadas a principal</strong></font></p>
<br />
<?php
$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);
?>

 <p>Voc&ecirc; tem um total de <?php echo "$num_ cota&ccedil;&otilde;es"?> vinculadas a principal  
    na sua vis&atilde;o:</font></p>
   <br /><br />  

   
    <table border="0" class="lista-clientesfocal" >
    <thead> 
    
    <tr>
    <th>PRINCIPAL</th>
    <th>COMPLEMENTAR</th>
    <th>REVISAO</th>
    <th>UF</th>
    <th>STATUS</th> 
    <th>QTD LINHAS(Negociação)</th>
    <th>QTD LINHAS(Cotação)</th>
    <th>DDD</th>
    <th>ALTAS</td>
    <th>PORTABILIDADE</td>
    <th>MIGRACAO</td>
    <th>TROCAS</td>
    <th>TT</td>
     <th>BACKUP</td> 
     <th>M 2 M</td>
     <th>FIXA</td>
     <th>PRÉ POS</td>
     <th>MIGRAÇÃO TROCA</td>
  </tr>
    </thead>
         <tbody>
    
    <?php




while($linha_atv= mysql_fetch_assoc($acao))
{
	
  $cotacao_principal    = $linha_atv["cotacao_principal"];
  $n_da_cotacao         = $linha_atv["n_da_cotacao"];
  $revisao              = $linha_atv["revisao"];
  $uf                   = $linha_atv["uf"];
  $criado_em            = $linha_atv["criado_em"];
  $tipo                 = $linha_atv["carteira"];
  $cliente              = $linha_atv["cliente"];
  $status_cota_vivocorp = $linha_atv["status"];
  $sub_status_vivocorp  = $linha_atv["substatus"];
  $total_linhas         = $linha_atv["total_linhas"];
  $id_cotacao_filha     = $linha_atv["id_cotacao_filha"];
  

$criado_em=arrumadatahora($criado_em);




?>

    <input type="hidden" name="cotacaopri" value="<?php echo $_GET['cotacaopri'];  ?>"/>
    <input type="hidden" name="id_cotacao_filha" value="<?php echo $id_cotacao_filha;  ?>"/>
    <input type="hidden" name="idpri" value="<?php echo $_GET['idpri'];  ?>"/>

     <tr>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$cotacao_principal</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$n_da_cotacao</font>"?></td>
     <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$revisao</font>"?></td>
     <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$uf</font>"?></td>
     <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$sub_status_vivocorp</font>"?></td>
    <td class="tdconteudo"><input type=text name="total_linhas" value="<?php echo $total_linhas ?>" 
      class="linhas bradius"></td>
    <td class="tdconteudo"><input type="text" name="qtdlinhascomp" class="linhas bradius"/></td>
    <td class="tdconteudo"><input type="text" name="ddd" class="linhas bradius"/></td>
       <td><input name="altas" type="text" id="altas" size="1" maxlength="6" value="<?php if($linha_atv['altas'] == 0){ echo $linha_atv['altas']=""; }else{ echo $linha_atv['altas']; } ?> "
        class="linhas bradius"/>
        </td>
      <td> 
          <input name="portabilidade" type="text" id="portabilidade" size="1" maxlength="6" value="<?php if($linha_atv['portabilidade'] == 0){ echo $linha_atv['portabilidade']=""; }else{ echo $linha_atv['portabilidade']; }?> " class="linhas bradius"/>
        </td>
      <td>
          <input name="migracao" type="text" id="migracao" size="1" maxlength="6" value="<?php if($linha_atv['migracao'] == 0){ echo $linha_atv['migracao']=""; }else{ echo $linha_atv['migracao']; }?> " class="linhas bradius"/>
        </td>
      <td> 
          <input name="trocas" type="text" id="trocas" size="1" maxlength="6" value="<?php if($linha_atv['trocas']==0){ echo $linha_atv['trocas']=""; }else{echo $linha_atv['trocas'];}?> "
          class="linhas bradius"/>
       </td>
      <td>
          <input name="tt" type="text" id="tt" size="1" maxlength="6" value="<?php if($linha_atv['tt'] == 0){ echo $linha_atv['tt']=""; }else{echo $linha_atv['tt'];}?>" class="linhas bradius"/>
        </td>
    
        <td>
          <input name="backup" type="text" id="backup" size="1" maxlength="6" value="<?php if($linha_atv['backup'] == 0){echo $linha_atv['backup']="";}else{echo $linha_atv['backup'];}?>" 
          class="linhas bradius"/>
        </td>
        
        <td>
          <input name="m_2_m" type="text" id="m_2_m" size="1" maxlength="6" value="<?php if($linha_atv['m2m'] == 0){echo $linha_atv['m2m']="";}else{echo $linha_atv['m2m'];}?>" 
          class="linhas bradius"/>
        </td>
        
        <td>
          <input name="fixa" type="text" id="fixa" size="1" maxlength="6" value="<?php if($linha_atv['fixa'] == 0){echo $linha_atv['fixa']="";}else{echo $linha_atv['fixa'];}?>" 
          class="linhas bradius"/>
        </td>
       <td>
          <input name="pre_pos" type="text" id="pre_pos" size="1" maxlength="6" value="<?php if($linha_atv['pre_pos'] == 0){echo $linha_atv['pre_pos']="";}else{echo $linha_atv['pre_pos'];}?>" class="linhas bradius" />
        </td> 
      <td>
          <input name="migracao_troca" type="text" id="migracao_troca" size="1" maxlength="6" value="<?php if($linha_atv['migracao_troca'] == 0){echo $linha_atv['migracao_troca']="";}else{echo $linha_atv['migracao_troca'];}?>" 
          class="linhas bradius" />
        </td>
 
   </tr>
     <?php

  	}
	?>
    </tbody>
  </table>
  <br />
 
   <input type="Submit" name="Submit2" value="Atualizar"  class="sb2 bradius" />
  <input type="button" name="Submit2" value="Voltar" onclick="history.go(-1);" class="sb2 bradius" />
 
</form>
<?php if($num_ > 0){ ?>
<!--<p>Cotenação para pesquisa pedidos: <?php echo $n_da_cotacao." OR ".$cotacao_principal; ?></p>-->
<?php } ?> 

</div>
</div>

</body>
</html>

