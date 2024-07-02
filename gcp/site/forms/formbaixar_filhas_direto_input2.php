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



?>


<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="#" method="post" id="frm-filtro">
<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Lista de cotações complementares vinculadas a principal</strong></font></p>
<br />

   
    <table border="0" class="lista-clientes" >
    <thead> 
    
    <tr>
    <th>
    <input type="checkbox" name="checkbox" id="checkbox" value="2" onclick="return selecionar_todas(this.checked);"/>
   </th>
    <th><font size='1'  face='Arial'>PRINCIPAL</font></th>
    <th><font size='1'  face='Arial'>COMPLEMENTAR</font></th>
    <th><font size='1'  face='Arial'>REVISAO</font></th>
    <th><font size='1'  face='Arial'>REGIONAL</font></th>
    <th><font size='1'  face='Arial'>UF</font></th>
    <th><font size='1'  face='Arial'>TIPO</font></th>
    <th><font size='1'  face='Arial'>CLIENTE</font></th>
    <th><font size='1'  face='Arial'>CRIADO EM</font></th>
    <th><font size='1'  face='Arial'>STATUS VIOCORP</font></th>
    <th><font size='1'  face='Arial'>SUB-STATUS VIOCORP</font></th>
    <th><font size='1'  face='Arial'>TIPO COTAÇÃO</font></th>
    <th><font size='1'  face='Arial'>STATUS</font></th>
    <th><font size='1'  face='Arial'>SUB-STATUS</font></th>   
  </tr>
    </thead>
         <tbody>
    
    <?php


   


foreach($_POST["ling"] as $id_cotacao2)
{



 $sql ="SELECT a.id_cotacao,
                a.id_complementar_da_principal,
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
                a.dt_inclusao_bd_cip,
                a.total_linhas_cip,
                a.TIPO_COTACAO
                FROM cip_nv.tbl_cotacao a             
                WHERE  a.id_complementar_da_principal='$id_complementar_da_principal' 
                AND a.id_cotacao='$id_cotacao2'   
                AND a.TIPO_COTACAO='Complementar' 
                AND a.substatus_da_cotacao='Input' 
        GROUP BY a.n_da_cotacao
        ORDER BY a.id_cotacao DESC LIMIT 0,20000 ";


$acao = mysql_query($sql,$conecta) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
	$id_cotacao           = $linha_atv["id_cotacao"];
  //echo '<br>';
  $cotacao_principal    = $linha_atv["cotacao_principal"];
  $n_da_cotacao         = $linha_atv["n_da_cotacao"];
  $revisao              = $linha_atv["revisao"];
  $regional             = $linha_atv["regional_atribuida"];
  $uf                   = $linha_atv["uf"];
  $criado_em            = $linha_atv["criado_em"];
  $dt_inclusao_bd_cip   = $linha_atv["dt_inclusao_bd_cip"];
  $tipo                 = $linha_atv["carteira"];
  $cliente              = $linha_atv["cliente"];
  $status_cota_vivocorp = $linha_atv["status_da_cotacao"];
  $sub_status_vivocorp  = $linha_atv["substatus_da_cotacao"];
  $status_vivocorp      = $linha_atv["status"];
  $TIPO_COTACAO         = $linha_atv["TIPO_COTACAO"];
  $id_complementar_da_principal = $linha_atv["id_complementar_da_principal"];

$criado_em=arrumadatahora($criado_em);
$dt_inclusao_bd_cip=arrumadatahora($dt_inclusao_bd_cip);


foreach($_POST["substatus"] as $substatus){ 
  if($substatus != 0 && $id_cotacao != 0){
   echo "$substatus";
    echo '<br/>';
  
    }

  }
  
  



?>
     <tr>
     <td>
    <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id_cotacao2" ?>" checked readonly="True"/>
    
    </td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$cotacao_principal</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$n_da_cotacao</font>"?></td>
     <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$revisao</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$regional</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$uf</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$tipo</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$cliente</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' face='Arial'>$criado_em</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$status_vivocorp</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$sub_status_vivocorp</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>$TIPO_COTACAO</font>" ?></td>
    <td class="tdconteudo"><select name="substatus" id="substatus" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxmedio bradius" disabled="true">


  <option value="<?php echo $substatus ?>"><?php echo $substatus ?></option>
  
   <?php

     
    //conecta no SGBD MySQL

      
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.tbl_substatus WHERE setor='input' ORDER BY id_status";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id_status']}\">
               {$dado['substatus']}</option>";
   }

  

   
 ?> </select></td>

  <td class="tdconteudo"><select name="motivodaacao" id="motivodaacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxmedio bradius" >
  <option value="0">Selecione....</option>
   <?php  
  
    //conecta no SGBD MySQL

      
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.tbl_motivos_da_acao where setor='input'  ORDER BY id";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
            {$dado['motivo_da_acao']}</option>";
   }
 ?> </select></td>

     </tr>
    
    </tr>
    <?php
  	}
  
} 
	?>
    </tbody>
  </table>
  <br />

 <input type="hidden" value="<?php echo $id_complementar_da_principal ?>"" name="id_complementar_da_principal"/>
 <input type="submit" name="Submit" value="Avançar" class="sb2 bradius" />
  <input type="button" name="Submit2" value="Voltar" onclick="window.location='../forms/formbaixar_filhas_direto_input.php?id_complementar_da_principal=<?php echo $id_complementar_da_principal ?>'" class="sb2 bradius" />

</form>
</div>
</div>

</body>
</html>

