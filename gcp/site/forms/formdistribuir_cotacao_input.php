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
function abrir2(URL) {
 
  var width = 1024;
  var height = 600;
 
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



/*ini_set ( 'mysql.connect_timeout' ,  '60' ); 
ini_set ( 'default_socket_timeout' ,  '120' );  
ini_set('memory_limit', '-1'); */


  

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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $perfil != 18 && $perfil != 21){
    
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



function dif_datas($dt_inicial, $dt_final){ 

list($dia_i, $mes_i, $ano_i) = explode("/", $dt_inicial); //Data inicial 
list($dia_f, $mes_f, $ano_f) = explode("/", $dt_final); //Data final 
$mk_i = mktime(0, 0, 0, $mes_i, $dia_i, $ano_i); // obtem tempo unix no formato timestamp 
$mk_f = mktime(0, 0, 0, $mes_f, $dia_f, $ano_f); // obtem tempo unix no formato timestamp 

$diferenca = $mk_f - $mk_i; //Acha a diferença entre as datas 

if($diferenca == 0 ){ 
return 'É a mesma data'; 
}elseif($diferenca > 0 ){ 

return 1; 
}elseif($diferenca < 0 ){ 
return 0; 
} 
} 


 
$sqlvenc="SELECT 
a.id_cotacao,
a.TIPO_PROCESSO,
a.dia,
a.TEMPO,
a.SLA_DIAS,
a.VENCIMENTODIAS,
a.visao_ilha,
a.vencimento_ilha
FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_input b ON b.id_cotacao=a.id_cotacao AND ( b.status_cip_input= 7 OR b.status_cip_input= 8 )";
$consulta_venc= mysql_query($sqlvenc,$conecta) or die (mysql_error());

while($tipovenc = mysql_fetch_array($consulta_venc)){ 

$diasUteis  = $tipovenc['SLA_DIAS'];
$QtdDia     = $tipovenc['dia'];
$id_cotacao = $tipovenc['id_cotacao'];
$PRAZO_DIAS  = $tipovenc['PRAZO_DIAS'];

$diasUteis  = $tipovenc['SLA_DIAS'];

$QtdDia     = $tipovenc['dia']; 

$filtrovc   = $QtdDia-$diasUteis;


$id_cotacao = $tipovenc['id_cotacao'];



  
$vencimento_ilha=substr($tipovenc['visao_ilha'],0,10);


$venci=substr($tipovenc['vencimento_ilha'],0,10);


               $diavc1=substr($venci,8,2);
               $mesvc1=substr($venci,5,2);  
               $anovc1=substr($venci,0,4);

 $venci1=$diavc1."/".$mesvc1."/".$anovc1;


$data1=$venci1;
$data2=date("d/m/Y");

$data1=explode("/",$data1);
$data2=explode("/",$data2);

$d1=strtotime("$data1[2]-$data1[1]-$data1[0]");
$d2=strtotime("$data2[2]-$data2[1]-$data2[0]");

$data_final=($d2-$d1)/86400;

if($data_final < 0){

  $data_final= $data_final * -1;
}

$data_final;


$datava=date("Y-m-d");
$semanavalida  = date('w', strtotime($datava));



if($data_final == 0 ){

  //echo "igual";
  $Vence = "1.Vence Hoje";
  $criterio= "Dentro do prazo";

}
if($data_final == 1 ){

  //echo "nao é igual";

 $Vence="2.Vence D+1";
 $criterio= "Dentro do prazo"; 
}

if($data_final  == 2){

  //echo "nao é igual";

  $Vence="3.Vence D+2";
  $criterio= "Dentro do prazo";
}

if($data_final > 2 ){

  //echo "nao é igual";

  $Vence="4.Vence D>2";
  $criterio= "Dentro do prazo";
}



if($PRAZO_DIAS == 'Fora do Prazo'){
   
   $Vence="Backlog";
   $criterio= "Fora do prazo";

}



$datavetor=date("d/m/Y");

//Exemplo chamada função 
 $filtrovetor = dif_datas($venci1, $datavetor); 

 $testefora=$filtrovetor.$semanavalida; 
 //echo '<br>';


if($testefora == 16 || $testefora == 10 ){
    
     //echo $testefora;
   
     $Vence="Backlog";
     $criterio= "Fora do prazo";
  
}


$date1f=date("Y-m-d");
$date2f=$venci;

$semanavalida2  = date('w', strtotime($date1f));

if(strtotime($date1f) > strtotime($date2f) AND $semanavalida2 != 6 
        || strtotime($date1f) > strtotime($date2f) AND $semanavalida2 != 0 ){
//echo 'Fora do prazo';
$Vence="Backlog";
$criterio= "Fora do prazo";

}     


$query_linhav="UPDATE cip_nv.tbl_cotacao a 
              SET a.VENCIMENTODIAS ='".$Vence."',
                  a.PRAZO_DIAS    ='".$criterio."'                                
              WHERE a.id_cotacao  = '".$id_cotacao."' ";

                                //a.setor          ='analise'
$consulta_servico2v = mysql_query($query_linhav,$conecta) or die (mysql_error());

}



// include_once 'site/controles/sql.sla.php';



/*
* Calculando datas no futuro com o PHP a partir de datas definidas
* /
*/
// Pega a data que está salva no banco de dados
$data = date("Y-m-d H:i:s");

// Calcula uma data daqui 2 dias e 2 mêses
$timestamp = strtotime($data . "-4 months 0 days");
// Exibe o resultado
 $data_1 =date('Y-m-d', $timestamp); // 
 $data_2=date('Y-m-d');




//echo "este é o post ".$_POST['carteira'];

 if($_COOKIE['carteira'] <> $_POST['carteira'] && !empty($_POST['carteira'])){
    $_COOKIE['carteira']=$_POST['carteira'];

    //echo "ok";
    }

  setcookie('carteira',$_COOKIE['carteira'],time() + 28800);


/*echo "este é o cookie ".*/ $carteira=$_COOKIE['carteira'];



 /*

if(empty($_POST['carteira'])){
$carteira=$carteira;
}else{

$carteira=$_POST['carteira'];

}
 */

 //$sql="CALL visao_input_distribuicao("."'7'".","."'{$carteira}'".")";
 //$sql="CALL visao_input_distribuicao("."'27'".")";



//echo $carteira;


if($carteira == '%'){
 $sql="CALL cip_nv.visao_input_distribuicao_TODOS("."'7'".","."'{$carteira}'".","."'{$data_1}'".","."'{$data_2}'".")";
 //$sql="CALL visao_input_distribuicao("."'27'".")";
}elseif($carteira == 'GOV'){
 $sql="CALL cip_nv.visao_input_distribuicao_GOV("."'7'".","."'{$carteira}'".","."'{$data_1}'".","."'{$data_2}'".")";
 //$sql="CALL visao_input_distribuicao("."'27'".")";
}elseif($carteira == 'TOP'){
 $sql="CALL cip_nv.visao_input_distribuicao_TOP("."'7'".","."'{$carteira}'".","."'{$data_1}'".","."'{$data_2}'".")";
 //$sql="CALL visao_input_distribuicao("."'27'".")";
}elseif($carteira == 'VIP'){
 $sql="CALL cip_nv.visao_input_distribuicao_VIP("."'7'".","."'{$carteira}'".","."'{$data_1}'".","."'{$data_2}'".")";
 //$sql="CALL visao_input_distribuicao("."'27'".")";
}elseif($carteira == 'TOPVIP'){
 $sql="CALL cip_nv.visao_input_distribuicao_TOP_VIP("."'7'".","."'{$carteira}'".","."'{$data_1}'".","."'{$data_2}'".")";
 //$sql="CALL visao_input_distribuicao("."'27'".")";
}





 
?>
</p>
<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="principal.php?&t=forms/formdistribuir_cotacao_input2.php" method="post" id="frm-filtro">

<p align="center"><b><font color="#337ab7" size="5" face="Gotham Light">Input</font></b></p>
<br />

<p><font color="#337ab7" size="3" face="Gotham Light"><strong>Lista de Cotações a distribuir</strong></font></p>
<br />
<?php
$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);
?>

 <p>Voc&ecirc; tem um total de <?php echo "$num_ cota&ccedil;&otilde;es"?> 
    na sua vis&atilde;o:</font></p>
  <br />
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>

   <br /><br /><br /><br />
   
   
   

   
    <table border="0" class="lista-clientes">
    <thead> 
    <tr>
    <th>
    <input type="checkbox" name="checkbox" id="checkbox" value="1" onclick="return selecionar_todas(this.checked);" /></th>
    <th>PRINCIPAL</th>
    <th>COMPLEMENTAR</th>
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
    <th>ABRIR</th>
	<th>EXCLUIR</th>
  </tr>
    </thead>
         <tbody>
    
    <?php




while($linha_atv = mysql_fetch_assoc($acao))
{
  $id_cotacao           = $linha_atv["id_cotacao"];
  $cotacao_principal    = $linha_atv["cotacao_principal"];
  $n_da_cotacao         = $linha_atv["n_da_cotacao"];
  $revisao2             = $linha_atv["revisao"];
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
  $status_cip           = $linha_atv["status_cip_input"];
  $disc_status_cip      = $linha_atv["disc_status_cip_input"];
  $total_linhas_cip     = $linha_atv["total_linhas_cip"];
  $dia                  = $linha_atv["dia"];
  $TEMPO                = $linha_atv["TEMPO"];
  $TIPO_PROCESSO        = $linha_atv["TIPO_PROCESSO"];
  $TIPO_LINHA           = $linha_atv["TIPO_DE_LINHA"];
  $SLA_DIAS             = $linha_atv["SLA_DIAS"];
  $PRAZO_DIAS           = $linha_atv["PRAZO_DIAS"];
  $visao_ilha           = $linha_atv["visao_ilha"];
  $vencimento           = $linha_atv["vencimento_ilha"];
  $TIPO_COTACAO         = $linha_atv["TIPO_COTACAO"];
  $revisao              = $linha_atv["revisao"];
  $informacoes          = $linha_atv["informacoes"];
  $cpf_cnpj             = $linha_atv["cpf_cnpj"];
  //$raiz_grupo         = $linha_atv["raiz_grupo"];
  //$grupo              = $linha_atv["grupo"];
  $cliente_tipo         = $linha_atv["cliente_tipo"];
  $oferta_smart_vivo    = $linha_atv["oferta_smart_vivo"];

  $criado_em=arrumadatahora($criado_em);

	

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


if(strpos($informacoes, 'GIOVANNI') !== false 
   || $informacoes == 'PRIORIDADE GIOVANNI ANAN'){


  //$cor = '#A110EA';
  $cor='#A40DA4';
 
}
if(strpos($informacoes, 'Giovanni') !== false){

     //$cor = '#A110EA';
     $cor='#A40DA4';

}

//require_once='principal.php?t=controles/sql.sla.php';

?>

     <tr> 
     <td>
      <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo $id_cotacao; ?>"  /></td>
        <td class="tdconteudo"><?php echo "<a href='javascript:abrir2(\"site/forms/formdistribuir_filhas_visao_cotacao_input.php?cotacao_principal=$cotacao_principal\");'><font size='1' color='$cor' face='Arial'>$cotacao_principal</font></a>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$n_da_cotacao</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente_tipo</font>" ?></td>
        <td class="tdconteudo">
        <a href="javascript:abrirrevisao('site/forms/formdetalhes_visao_cotacao_revisoesanteriores.php?cotacao_principal=<?php echo $cotacao_principal; ?>&setor=<?php echo 'Input' ?>');">
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


    <td><a href="principal.php?id_cotacao=<?php echo $id_cotacao ?>&cart=<?php echo $carteira ?>&t=forms/formdistribuir_cotacao_servico1_input.php">ABRIR</a>
   
   
    </td>
	  <td>
    <a href="principal.php?id_cotacao=<?php echo $id_cotacao ?>&t=controles/sql_excluir_distribuicao_cotacao_input.php">EXCLUIR</a></td>  

    </tr>
    <?php

    	
  	}

	?>
    </tbody>
  </table>
  <br />

<?php
  mysql_free_result($acao_operador,$acao);
  mysql_close($conecta);  

  ?>

  
<input type="hidden" name="cart" value="<?php echo $carteira; ?>"/>
  <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&t=forms/formfiltro_distribuicao_input.php'" class="sb2 bradius" />

  <input type="submit" name="Submit" value="Avançar" class="sb2 bradius" />

</form>
</div>
</div>
</body>
</html>

