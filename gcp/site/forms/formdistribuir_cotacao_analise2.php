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
  var height = 250;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>


<script language="JavaScript">
function abrirrevisao(URL) {
 
  var width = 1024;
  var height = 600;
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
$acao_operador = mysql_query($sql_operador,$conecta);
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 4 && $perfil != 18 && $perfil != 21){
    
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



ini_set ( 'mysql.connect_timeout' ,  '30' ); 
ini_set ( 'default_socket_timeout' ,  '30' );



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
</p>
<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" method="post" action="principal.php?&t=controles/sql_distribuir_cotacao_analise4.php" id="frm-filtro">

<p align="center"><b><font color="#337ab7" size="5" face="Gotham Light">Análise</font></b></p>
<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Lista de Cotações a distribuir</strong></font></p>
<br />
    <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
    </p>

   <br /><br /><br /><br />
      
   <p>


   <font color="#000000" size="2" face="Gotham Light">
    Selecione o turno:</font> 
      <select name="id_filtro" id="id_filtro" class="txt2comboboxpequeno">
                  <option value="0" selected="selected">Selecione</option>
          <?php
                     $sql = "SELECT * FROM cip_nv.tbl_turno ORDER BY id DESC ";
                     $qr = mysql_query($sql,$conecta);
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id_filtro'].'">'.$ln['turno'].'</option>';
                     }
                     ?>
                     </select>


    <font color="#000000" size="2" face="Gotham Light">
    operador:</font> 
    <select class="txt2comboboxgrande" class="sb" name="login_operador_analise" id="login_operador_analise">
      <option value="0" selected="selected">Selecione</option>
    </select>

   


</p>
<br /><br />
   
    <table border="0"  class="lista-clientes">
    <thead> 
    <tr>
    <th>
    </th>
    <th>PRINCIPAL</th>
    <th>CLIENTE TIPO</th>
    <th>REVISAO</th>
    <th>VISAO ILHA</th>
    <th>VENCIMENTO</th>
    <th>STATUS SLA</th>
    <th>SLA DIAS</th>
    <th>SUB-STATUS COTAÇÃO</th>
    <th>STATUS CIP</th> 
    <th>TIPO LINHA</th>
	  <th>TIPO SERVIÇOS</th>
    <th>TOTAL LINHAS</th>
    <th>TIPO</th>
    <th>CLIENTE</th>
    <th>TIPO COTAÇÃO</th>
	  <th>INFORM.</th>
    <th>OFERTA SMART VIVO CORPORATE</th>
  </tr>
    </thead>
         <tbody>
    
    <?php
	
//$idcota='';	
foreach($_POST["ling"] as $id_cotacao)
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

$sql = "SELECT  a.id_cotacao,
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
				        a.informacoes,
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
                a.cpf_cnpj as cpf_cnpj,
                a.cliente_tipo,
                b.status_cip_analise,
                b.disc_status_cip_analise,
                b.data_assinaturacontrato,
                b.documento,
                a.oferta_smart_vivo 
                FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_analise b 
                ON a.id_cotacao=b.id_cotacao                 
                WHERE  b.status_cip_analise in (3,27) and a.id_cotacao='$id_cotacao' 
         GROUP BY a.vencimento_ilha,a.revisao,a.n_da_cotacao ASC LIMIT 0,2000 ";



$acao = mysql_query($sql,$conecta);

while($linha_atv = mysql_fetch_assoc($acao))
{
	
  $id_cotacao            = $linha_atv["id_cotacao"];

  /*
   //contagem sla
   include("site/controles/sql.sla.php");*/


  $cotacao_principal    = $linha_atv["cotacao_principal"];
  $revisao2              = $linha_atv["revisao"];
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
  $status_cip           = $linha_atv["status_cip_analise"];
  $disc_status_cip      = $linha_atv["disc_status_cip_analise"];
  $total_linhas_cip     = $linha_atv["total_linhas_cip"];
  $dia                  = $linha_atv["dia"];
  $TEMPO                = $linha_atv["TEMPO"];
  $TIPO_PROCESSO        = $linha_atv["TIPO_PROCESSO"];
  $TIPO_LINHA           = $linha_atv["TIPO_DE_LINHA"];
  $SLA_DIAS             = $linha_atv["SLA_DIAS"];
  $PRAZO_DIAS           = $linha_atv["PRAZO_DIAS"];
  $visao_ilha           = $linha_atv["visao_ilha"];
  $vencimento           = $linha_atv["vencimento_ilha"];
  $status_cip           = $linha_atv["status_cip_analise"];
  $disc_status_cip      = $linha_atv["disc_status_cip_analise"];
  $total_linhas_cip     = $linha_atv["total_linhas_cip"];
  $TIPO_COTACAO         = $linha_atv["TIPO_COTACAO"];
  $informacoes            = $linha_atv["informacoes"];
  $cpf_cnpj           = $linha_atv["cpf_cnpj"];
  $cliente_tipo        = $linha_atv["cliente_tipo"];
  $oferta_smart_vivo   = $linha_atv["oferta_smart_vivo"];

  $criado_em=arrumadatahora($criado_em);

  if(empty($oferta_smart_vivo)){

  $oferta_smart_vivo ="_";
  $cor = '#464646';
 
}else{

  $oferta_smart_vivo=$oferta_smart_vivo;
   $cor = '#FF0000';

}

if(empty($cliente_tipo)){

  $cliente_tipo='Não';
  $cor = '#464646';
 
}else{

  $cliente_tipo=$cliente_tipo;
   $cor = '#FF0000';

}

	
?>

     <tr bgcolor="#f5f5f5"> 
     <td class="tdconteudo">
      <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id_cotacao" ?>" checked readonly="True"/></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cotacao_principal</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente_tipo</font>" ?></td>
           <td class="tdconteudo">
        <a href="javascript:abrirrevisao('site/forms/formdetalhes_visao_cotacao_revisoesanteriores.php?cotacao_principal=<?php echo $cotacao_principal; ?>&setor=<?php echo 'Analise' ?>');">
          <?php echo "<font size='1' color='$cor' face='Arial'>$revisao2</font>" ?></a></td> 
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>".arrumadatahora($visao_ilha)."</font>"; ?></td> 
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>".arrumadatahora($vencimento)."</font>"; ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$PRAZO_DIAS</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$SLA_DIAS</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$sub_status_vivocorp</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$disc_status_cip</font>" ?></td>
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
        </tr>
    <?php
  	}
}



	?>
    </tbody>
  </table>
  <br />

<p>
<input type="hidden" name="cart" value="<?php echo $_POST['cart']; ?>"/>
 <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&carteira=<?php echo $_POST['cart'] ?>&t=forms/formdistribuir_cotacao_analise.php'" class="sb2 bradius" />

  <input type="submit" name="Submit" value="Distribuir" class="sb2 bradius" />
 </p>
</form>
</div>
</div>

<?php
  mysql_free_result($acao_operador,$acao,$acao_atv,$qr);
  mysql_close($conecta);  
  mysql_next_result($conecta);
  ?>
</body>
</html>

