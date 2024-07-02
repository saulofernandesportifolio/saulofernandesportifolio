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
      
      $('form').submit(function(e){ e.preventDefault(); });
      
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
  
    
if($perfil!= 3){
    
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
ini_set('memory_limit', '-1');



/*
* Calculando datas no futuro com o PHP a partir de datas definidas
* /
*/
// Pega a data que está salva no banco de dados
$data = date("Y-m-d H:i:s");

// Calcula uma data daqui 2 dias e 2 mêses
$timestamp = strtotime($data . "-3 months 0 days");
// Exibe o resultado
 $data_1 =date('Y-m-d', $timestamp); // 
 $data_2=date('Y-m-d');
 


$sql_cotainput="CALL cip_nv.fila_input("."'{$_COOKIE['idtbl_usuario']}'".","."'{$data_1}'".","."'{$data_2}'".")";

$acao_cotacoesinput = mysql_query($sql_cotainput,$conecta) or die (mysql_error());
$num_input = mysql_num_rows($acao_cotacoesinput);

if($num_input <= 0)
{


    echo "<script type=\"text/javascript\">
            alert('Voce nao possui cotações em sua visão. Por favor entre em contato com a distribuição.');
      document.location.replace('principal.php');
       </script>";
        exit;
    
}
else{



?>


<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">



<p></p>
<p><b><font color="#337ab7" size="3" face="Gotham Light">Lista 
  de cota&ccedil;&otilde;es para serem inputadas</b></font></p>
<br />
<p><b><font color="#000000" size="2" face="Gotham Light">
  Voc&ecirc; tem um total de <?php echo "$num_input cota&ccedil;&otilde;es"?> 
    na sua vis&atilde;o. Clique 
    em Abrir para analisar:</b></font></p>
    <br />
   <form method="POST" action="exemplo.html" id="frm-filtro">
      <p>
        
      <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>
    </form>
   <br /><br /><br /><br />
   
    <table border="0"  class="lista-clientes">
   
    <thead> 
    <tr>
    <th>PRINCIPAL</th>
    <th>COMPLEMENTAR</th>
    <th>CLIENTE TIPO</th>
	  <th><?php echo utf8_encode("REVISÃO"); ?></th>
    <th>VISAO ILHA</th>
    <th>VENCIMENTO</th>
    <th>STATUS SLA</th>
    <th>SLA DIAS</th>
    <th>SUB-STATUS COTAÇÃO</th>
    <th>STATUS CIP</th> 
    <th>TIPO LINHA</th>
    <th>TOTAL LINHAS</th>
    <th>TIPO</th>
    <th>CLIENTE</th>
    <th>TIPO COTAÇÃO</th>      
	  <th>OFERTA SMART VIVO CORPORATE</th>  
  </tr>
    </thead>
     <tbody>
  <?php



while($linha_atv = mysql_fetch_assoc($acao_cotacoesinput))
{
	$id_cotacao      = $linha_atv["id_cotacao"];
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
  $dia                  = $linha_atv["dia"];
  $TEMPO                = $linha_atv["TEMPO"];
  $TIPO_PROCESSO        = $linha_atv["TIPO_PROCESSO"];
  $TIPO_LINHA           = $linha_atv["TIPO_DE_LINHA"];
  $SLA_DIAS             = $linha_atv["SLA_DIAS"];
  $PRAZO_DIAS           = $linha_atv["PRAZO_DIAS"];
  $visao_ilha           = $linha_atv["visao_ilha"];
  $vencimento           = $linha_atv["vencimento_ilha"];
  $TIPO_COTACAO         = $linha_atv["TIPO_COTACAO"];
  $status_cip           = $linha_atv["status_cip_input"];
  $disc_status_cip      = $linha_atv["disc_status_cip_input"];
  $cpf_cnpj             = $linha_atv["cpf_cnpj"];
  $cliente_tipo         = $linha_atv["cliente_tipo"];
  $oferta_smart_vivo    = $linha_atv["oferta_smart_vivo"];
  $id_input             = $linha_atv["id_input"];

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
?>
  <tr bgcolor="#f5f5f5"> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>
    <a href='principal.php?id_cotacao=$id_cotacao&id_input=$id_input&t=forms/form_cotacoes_input.php'>$cotacao_principal</a></font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>
    <a href='principal.php?id_cotacao=$id_cotacao&id_input=$id_input&t=forms/form_cotacoes_input.php'>$n_da_cotacao</a></font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente_tipo</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$revisao</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>".arrumadatahora($visao_ilha)."</font>"; ?></td> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>".arrumadatahora($vencimento)."</font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$PRAZO_DIAS</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$SLA_DIAS</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$sub_status_vivocorp</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$disc_status_cip</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$TIPO_LINHA</font>" ?></td>
    <td class="tdconteudo">
      <a href="javascript:abrir('site/forms/formdetalhes_linhas_cotacao.php?id_cotacao=<?php echo $id_cotacao; ?>');">
        <?php echo "<font size='1' color='$cor' face='Arial'>$total_linhas_cip</font>" ?></a></td> 
        <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tipo</font>"?></td>
        <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente</font>" ?></td>
        <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$TIPO_COTACAO</font>" ?></td>
	      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$oferta_smart_vivo</font>" ?></td>
 </tr>
  <?php
  }
}

  ?>

</tbody>    
</table>

<br />


<p align="left">
  <input type="hidden" name="canal" value="<?php echo $canal ?>" />
 

  <input type="button" name="Submit2" class="sb2 bradius" value="Voltar" onclick="window.location='principal.php'"/>
</p>
   </div>

    </div>

<?php

 mysql_free_result($acao_operador,$acao_cotacoesinput,$acao_query);
 mysql_close($conecta);
 mysql_next_result($conecta,$conecta2);
?>


</body>
</html>
