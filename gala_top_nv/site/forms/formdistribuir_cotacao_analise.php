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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 ){
    
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




//echo $_POST["status_ci"];

 //$sql="CALL visao_analise_distribuicao("."'3,27'".")";
 $sql="CALL visao_analise_distribuicao("."'3'".")";
 //$sql="CALL visao_analise_distribuicao("."'27'".")";


?>
</p>

<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="principal.php?&t=forms/formdistribuir_cotacao_analise2.php" method="post" id="frm-filtro">

<p align="center"><b><font color="#a0873c" size="5" face="Gotham Light">Análise</font></b></p>
<br />

<p><font color="#a0873c" size="4" face="Gotham Light"><strong>Lista de Cotações a distribuir</strong></font></p>
<br />
<?php
$acao = mysql_query($sql) or die (mysql_error());
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
    <th>REVISAO</th>
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
    <th>ABRIR</th>
	<th>EXCLUIR</th>
  </tr>
    </thead>
         <tbody>
    
    <?php


//$acao = mysql_query($sql) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
	$id_cotacao			 = $linha_atv["id_cotacao"];
 
   
  $cotacao_principal	  = $linha_atv["cotacao_principal"];
  $revisao2              = $linha_atv["revisao"];
  $regional			        = $linha_atv["regional_atribuida"];
  $uf 	     		        = $linha_atv["uf"];
  $criado_em      		  = $linha_atv["criado_em"];
  $tipo					        = $linha_atv["carteira"];
  $cliente				      = $linha_atv["cliente"];
  $status_cota_vivocorp	= $linha_atv["status_da_cotacao"];
  $sub_status_vivocorp	=$linha_atv["substatus_da_cotacao"];
  $status_vivocorp    	=$linha_atv["status"];
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
  $TIPO_SERVICO		      = $linha_atv["TIPO_SERVICO"];
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
  $TIPO_COTACAO          = $linha_atv["TIPO_COTACAO"];

$criado_em=arrumadatahora($criado_em);


if($vencimento =='2'){

$cor = '#FF0000';
}
else
{
$cor = '#464646';
}
	

 


?>

    <tr bgcolor="#f5f5f5"> 
    <td class="tdconteudo">
    <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo $id_cotacao; ?>"  /></td>
    <td class="tdconteudo"><?php echo "$cotacao_principal"?></td>
    <td class="tdconteudo"><?php echo "$revisao2"?></td>
    <td class="tdconteudo"><?php echo arrumadatahora($visao_ilha); ?></td> 
    <td class="tdconteudo"><?php echo  arrumadatahora($vencimento); ?></td>
    <td class="tdconteudo"><?php echo "$PRAZO_DIAS" ?></td>
    <td class="tdconteudo"><?php echo "$SLA_DIAS" ?></td>
    <td class="tdconteudo"><?php echo "$sub_status_vivocorp" ?></td>
    <td class="tdconteudo"><?php echo "$disc_status_cip" ?></td>
    <td class="tdconteudo"><?php echo "$TIPO_LINHA" ?></td>
    <td class="tdconteudo">
    <a href="javascript:abrir('site/forms/formdetalhes_linhas_cotacao.php?&id_cotacao=<?php echo $id_cotacao ?>');">
    <?php echo "$total_linhas_cip" ?></a></td> 
    <td class="tdconteudo"><?php echo "$tipo"?></td>
    <td class="tdconteudo"><?php echo "$cliente" ?></td>
    <td class="tdconteudo"><?php echo "$TIPO_COTACAO" ?></td>
    
   <td><a href="principal.php?id_cotacao=<?php echo $id_cotacao ?>&t=forms/formdistribuir_cotacao_servico1_analise.php">ABRIR</a>
   
   
    </td>
	<td>
    <a href="principal.php?id_cotacao=<?php echo $id_cotacao ?>&t=controles/sql_excluir_distribuicao_cotacao_analise.php">EXCLUIR</a></td>
    </tr>
    <?php


  	}
	?>
    </tbody>
  </table>
  <br />

  <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php'" class="sb2 bradius" />

    <input type="submit" name="Submit" value="Avançar" class="sb2 bradius" />

</form>
</div>
</div>
</body>
</html>

