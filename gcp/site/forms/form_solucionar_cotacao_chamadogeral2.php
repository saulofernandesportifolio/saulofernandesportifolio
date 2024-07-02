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
 
  var width = 780;
  var height = 300;
 
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



  <?php


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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $perfil != 13){
    
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
  
 
 


ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );







if(empty($_POST["ling"])){
    
 echo "
       <script type=\"text/javascript\">
        alert('Selecione alguma cotação !');
        history.back();
	    </script>
 ";   
    
    
 exit();   
}



?>


<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" method="post" action="principal.php?&t=controles/sql_solucionar_cotacao_chamadogeral4.php" id="frm-filtro">

<p align="center"><b><font color="#337ab7" size="5" face="Gotham Light">Chamado Geral</font></b></p>
<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Lista de cotações a solucionar</strong></font></p>
<br /><br /><br />
<p>
<input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
</p>
<br><br><br><br>
<p>
 <label style="padding-left: 5px;">Observação para chamado geral:<br />&nbsp;
 <textarea style="background-color: #E7E4D1;" name="obs_chamadogeral" class="txt2textarea bradius" ></textarea></label>   
</p>
<br /><br />

    <table border="0" class="lista-clientes" >
    <thead> 
    <tr> 
    <th>
    </th>
    <th>PRINCIPAL</th>
     <th>COMPLEMENTAR</th>
    <th>E2E</th>
    <th>REVISAO</th>
    <th>VISAO ILHA</th>
    <th>VENCIMENTO</th>
    <th>STATUS SLA</th>
    <th>SLA DIAS</th>
    <th>DATA DISTRIBUIÇÃO</th>
    <th>SUB-STATUS COTAÇÃO</th>
    <th>STATUS CIP</th> 
    <th>OPERADOR</th>
    <th>TIPO LINHA</th>
	  <th>TIPO SERVIÇOS</th>
    <th>TOTAL LINHAS</th>
    <th>TIPO</th>
    <th>CLIENTE</th>
    <th>TIPO COTAÇÃO</th>
	  <th>INFORM.</th>
    <th>SADMIN</th>
    <th>SETOR ORIGEM</th>
  </tr>
    </thead>
         <tbody>
    
    <?php
foreach($_POST["ling"] as $id_chamado)
{


    $query= "SELECT * FROM cip_nv.tbl_usuarios WHERE perfil = 1 and 
                   idtbl_usuario = '$idtbl_usuario '";
    $acao_atv=mysql_query($query,$conecta);
    
    while($linha_user = mysql_fetch_assoc($acao_atv))
    {
    $login	=	$linha_user["usuario"];
    $nome   =	$linha_user["nome"];
    $canal =  $linha_user["tramite"]; 
    //$situacao = $linha_op["situacao"];
    $usuario="$login";
    //$regional2 = $linha_user["regional"];	
    }


//echo $_POST["status_ci"];
$sql = "SELECT a.id_cotacao, 
a.cotacao_principal, 
a.n_da_cotacao, 
a.cliente_tipo, 
a.revisao, 
a.visao_ilha, 
a.vencimento_ilha, 
a.PRAZO_DIAS, 
a.SLA_DIAS, 
b.dt_distribuicao as dt_distribuicao, 
a.substatus_da_cotacao, 
b.status_cip_chamado, 
c.nome as nome, 
a.TIPO_PROCESSO, 
a.TIPO_DE_LINHA, 
a.total_linhas_cip, 
a.carteira, 
a.cliente, 
a.TIPO_COTACAO, 
a.informacoes, 
a.oferta_smart_vivo, 
b.setor_origem, 
b.idtbl_usuario_chamado, 
b.id_chamado 
FROM cip_nv.tbl_cotacao a 
INNER JOIN cip_nv.tbl_chamado b ON a.id_cotacao=b.id_cotacao 
LEFT JOIN cip_nv.tbl_usuarios c ON c.idtbl_usuario= b.idtbl_usuario_chamado 
WHERE b.id_chamado='$id_chamado' AND b.setor_origem <> 'Swap'  

UNION 
 SELECT
  tbl_swap.id_swap AS id_cotacao,
  tbl_swap.cotacaopedido AS cotacao_principal,
  tbl_swap.cotacaopedido AS n_da_cotacao,
  CASE 
  WHEN  a.cliente_tipo <> ' ' THEN a.cliente_tipo =' '  END AS cliente_tipo ,
  tbl_swap.revisao_swap AS revisao,
  CONCAT(tbl_swap.data_da_solicitacao,' ', tbl_swap.hora_da_solicitacao) AS visao_ilha,
  CASE 
   WHEN  a.vencimento_ilha <> ' ' THEN a.vencimento_ilha =' '  END AS vencimento_ilha,
   CASE
   WHEN a.PRAZO_DIAS <> ' '  THEN a.PRAZO_DIAS = ' '  END AS PRAZO_DIAS,
   CASE
   WHEN  a.SLA_DIAS <> ' ' THEN  a.SLA_DIAS  = ' '  END AS SLA_DIAS,
   b.dt_distribuicao,
   tbl_swap.`status` AS substatus_da_cotacao,
   b.status_cip_chamado,
   c.nome as nome, 
   CASE
   WHEN  a.TIPO_PROCESSO <> ' ' THEN a.TIPO_PROCESSO = ' '  END  TIPO_PROCESSO,
   CASE
   WHEN  a.TIPO_DE_LINHA <> ' ' THEN a.TIPO_DE_LINHA = ' '  END TIPO_DE_LINHA ,
   tbl_swap.total_de_linhas AS total_linhas_cip,
   tbl_swap.carteira,
    CASE
    WHEN  a.cliente <> ' ' THEN a.cliente = ' '  END cliente,
    CASE
    WHEN  a.TIPO_COTACAO <> ' ' THEN a.TIPO_COTACAO = ' '  END TIPO_COTACAO,
    CASE
    WHEN  a.informacoes <> ' ' THEN a.informacoes= ' '  END informacoes,
    CASE
    WHEN  a.oferta_smart_vivo <> ' ' THEN a.oferta_smart_vivo= ' '  END oferta_smart_vivo,
     b.setor_origem,
     b.idtbl_usuario_chamado,
     b.id_chamado
FROM
cip_nv.tbl_swap 

LEFT JOIN cip_nv.tbl_cotacao a 
ON a.id_cotacao=tbl_swap.id_swap
INNER JOIN cip_nv.tbl_chamado b
ON b.id_cotacao =tbl_swap.id_swap
LEFT JOIN cip_nv.tbl_usuarios c 
 ON b.idtbl_usuario_chamado=c.idtbl_usuario   

WHERE b.id_chamado='$id_chamado' AND b.setor_origem = 'Swap'    


ORDER BY dt_distribuicao DESC LIMIT 0,20000";




$acao = mysql_query($sql,$conecta) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
    
  $id_cotacao           = $linha_atv["id_cotacao"];
  $cotacao_principal    = $linha_atv["cotacao_principal"];
  $n_da_cotacao         = $linha_atv["n_da_cotacao"];
  $cliente_tipo         = $linha_atv["cliente_tipo"];
  $revisao2             = $linha_atv["revisao"];
  $visao_ilha           = $linha_atv["visao_ilha"];
  $vencimento           = $linha_atv["vencimento_ilha"];
  $SLA_DIAS             = $linha_atv["SLA_DIAS"];
  $PRAZO_DIAS           = $linha_atv["PRAZO_DIAS"];
  $dt_distribuicao      = $linha_atv["dt_distribuicao"];
  $sub_status_vivocorp  = $linha_atv["substatus_da_cotacao"];
  $status_cip           = $linha_atv["status_cip_chamado"];
  $nome                 = $linha_atv["nome"];
  $TIPO_PROCESSO        = $linha_atv["TIPO_PROCESSO"];
  $TIPO_LINHA           = $linha_atv["TIPO_DE_LINHA"];
  $total_linhas_cip     = $linha_atv["total_linhas_cip"];
  $tipo                 = $linha_atv["carteira"];
  $cliente              = $linha_atv["cliente"];
  $TIPO_COTACAO         = $linha_atv["TIPO_COTACAO"];
  $informacoes          = $linha_atv["informacoes"];
  $oferta_smart_vivo    = $linha_atv["oferta_smart_vivo"];
  $setor_origem         = $linha_atv["setor_origem"];
  $usuario_chamado      = $linha_atv["idtbl_usuario_chamado"];
  $id_chamado           = $linha_atv["id_chamado"];
  

$dt_distribuicao=arrumadatahora($dt_distribuicao);

if(empty($oferta_smart_vivo)){

  $oferta_smart_vivo ="_";
  $cor = '#464646';
 
}else{

  $oferta_smart_vivo=$oferta_smart_vivo;
   $cor = '#FF0000';

}



if(empty($cliente_tipo)){

  $cliente_tipo="Não";
  $cor = '#464646';
 
}else{

  $cliente_tipo=$cliente_tipo;
   $cor = '#FF0000';

}
	
if(empty($vencimento)){
    
  $vencimento='-';  
}
else{
    
 $vencimento=arrumadatahora($vencimento);
}

if(empty($SLA_DIAS)){
    
    $SLA_DIAS='-';
    
}
if(empty($PRAZO_DIAS)){
    
    $PRAZO_DIAS='-';
    
}
if(empty($TIPO_LINHA)){
    
    $TIPO_LINHA='-';
    
}
if(empty($cliente)){
    
    $cliente='-';
    
}
if(empty($TIPO_COTACAO)){
    
    $TIPO_COTACAO='-';
    
}


?>
 
     <tr> 
     <td>
      <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id_chamado" ?>" checked readonly="True"/></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cotacao_principal</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$n_da_cotacao</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente_tipo</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$revisao2</font>"?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>".arrumadatahora($visao_ilha)."</font>"; ?></td> 
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$vencimento</font>"; ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$PRAZO_DIAS</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$SLA_DIAS</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$dt_distribuicao</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$sub_status_vivocorp</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$disc_status_cip</font>" ?></td>
      <td><?php echo "<font size='1' color='$cor' face='Arial'>".$linha_atv['nome']."</font>"; ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$TIPO_LINHA</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$TIPO_SERVICO</font>" ?></td>
      <td class="tdconteudo">
        <a href="javascript:abrir('site/forms/formdetalhes_linhas_cotacao.php?id_cotacao=<?php echo $id_cotacao; ?>');">
          <?php echo "<font size='1' color='$cor' face='Arial'>$total_linhas_cip</font>" ?></a></td> 
          <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tipo</font>"?></td>
          <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente</font>" ?></td>
          <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$TIPO_COTACAO</font>" ?></td>
          <td class="tdconteudo"><?php  if(empty($informacoes)){ echo  "<font size='1' color='$cor' face='Arial'>".$informacoes= "-"."</font>"; }else{ echo "<font size='1' color='$cor' face='Arial'>".$informacoes."</font>"; } ?></td>
          <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$oferta_smart_vivo</font>" ?></td>
         <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$setor_origem</font>" ?></td>
     </tr>
    <?php
  	}
       }
   
	?>
    </tbody>
  </table>
 
  <br />

  <?php

  mysql_free_result($acao,$acao_operador,$acao2,$qr,$acao_atv);
  mysql_close($conecta);  

  ?>

  
<p>
  
  <input type="button" name="Submit2" value="Voltar" onclick="history.back();" class="sb2 bradius" />

  <input type="submit" name="Submit" value="Solucionar" class="sb2 bradius" />
 </p>
</form>
</div>
</div>


