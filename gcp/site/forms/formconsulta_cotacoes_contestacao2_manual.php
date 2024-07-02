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
    var frm = document.myform;
    for(i = 0; i < frm.length; i++) {        
        if(frm.elements[i].type == "checkbox") {
            frm.elements[i].checked = retorno;
        }
     }
}


</script>

<script language="javascript">
function submitForm(){
    var val = document.myform.category.value;
    if(val!=-1){
        document.myform.submit();
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
  
if($perfil != 1 && $perfil != 14){
    
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
  
     function arrumadata2($string3) {
    if($string3 == ''){
    $data= substr($string3,6,4)."".substr($string3,3,2)."".substr($string3,0,2);   
        
    }else{
        
    $data= substr($string3,6,4)."/".substr($string3,3,2)."/".substr($string3,0,2);   
    }

 return $data;
} 

if(empty($_POST['n_da_cotacao']) && $_POST['contestacao_status_cip'] == '%' 
        || !empty($_POST['n_da_cotacao']) && empty($_POST['contestacao_status_cip']) 
        || empty($_POST['n_da_cotacao']) && empty($_POST['contestacao_status_cip'])){  
    
echo "
       <script type=\"text/javascript\">
        alert('É nescessário digitar uma cotação !');
        history.back();
      </script>
 ";
  exit();     
    
}  

if($_POST['contestacao_status_cip'] == 1 
        || $_POST['contestacao_status_cip'] == 2 
        || $_POST['contestacao_status_cip'] == 3){ 
    
$_POST['n_da_cotacao']='%';  
    
}


if($_POST['contestacao_status_cip'] == '%'){

$sql="CALL cip_nv.visao_pesquisa_contestacao_manual("."'{$_POST['n_da_cotacao']}'".")";

}

if($_POST['contestacao_status_cip'] == 1 
        || $_POST['contestacao_status_cip'] == 2 
        || $_POST['contestacao_status_cip'] == 3 
        || $_POST['contestacao_status_cip'] == 4){

$sql="CALL cip_nv.visao_pesquisa_contestacao_manual1("."'{$_POST['n_da_cotacao']}'".","."'{$_POST['contestacao_status_cip']}'".")";

  }
  
$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);

if( $num_ == 0){

echo "<script>
            alert('Não encontra-se na base esta cotação.');
            document.location.replace('principal.php?t=forms/formconsulta_cotacoes_contestacao.php');
         </script>";

}


?>

<table class="tablepadrao" >
<td>
<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">

<p></p>

<p align="center">


<form name="myform" action="#" method="post" id="frm-filtro">

<p align="center"><b><font color="#337ab7" size="3" face="Gotham Light">Resumo Contestacoes Por Setor</font></b></p>
<br />

<p><font color="#a0873c" size="2" face="Gotham Light"><strong>Lista de Cotações</strong></font></p>
<br />


 <p><?php echo "<font color='#000000' size='2' face='Gotham Light'>Total de  $num_ cota&ccedil;&otilde;es</font>"?>:</font></p>
  <br />
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>

   <br /><br /><br /><br />
   
    <table border="0" class="lista-clientes">
    <thead> 
    
    <tr>
    <th>COPTACAO/ATIVIDADE/PEDIDO</th>
    <th>CLIENTE TIPO</th>
    <th>REVISÃO</th>
    <th>DATA INICIO TRATATIVA</th>
    <th>STATUS</th>
    <th>OPERADOR</th>
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
    <th>TIPO</th>
    <th>CLIENTE</th>
    <th>TIPO COTAÇÃO</th>
    <th>INFORM.</th>
    <th>SETOR</th>
  </tr>
    </thead>
         <tbody>
    
    <?php




while($linha_atv = mysql_fetch_assoc($acao))
{
    
  $id_contestacao_cotacao   = $linha_atv["id_contestacao_cotacao"];
  $cotacao_atividade_pedido = $linha_atv["cotacao_atividade_pedido"];
  $revisao2             = $linha_atv["revisao"];
  $regional             = $linha_atv["regional"];
  $uf                   = $linha_atv["uf"];
  $criado_em            = $linha_atv["criado_em"];
  $tipo                 = $linha_atv["segmento"];
  $cliente              = $linha_atv["cliente"];
  $status_vivocorp      = $linha_atv["status"];
  $ALTAS                = $linha_atv['ALTAS'];
  $PORTABILIDADE        = $linha_atv['PORTABILIDADE'];
  $MIGRACAO             = $linha_atv['MIGRACAO'];
  $TROCAS               = $linha_atv['TROCAS'];
  $TT                   = $linha_atv['TT'];
  $BACKUP               = $linha_atv['BACKUP'];
  $M_2_M                = $linha_atv['M2M'];
  $FIXA                 = $linha_atv['FIXA'];
  $PRE_POS              = $linha_atv["PRE_POS"]; 
  $MIGRACAO_TROCA       = $linha_atv["MIGRACAO_TROCA"];     
  $total_linhas_cip     = $linha_atv["TOTAL_LINHAS"];
  $inicio_da_tratativa  = $linha_atv["inicio_da_tratativa"];
  $dia                  = $linha_atv["dia"];
  $TEMPO                = $linha_atv["TEMPO"];
  $TIPO_PROCESSO        = $linha_atv["TIPO_PROCESSO"];
  $TIPO_LINHA           = $linha_atv["TIPO_DE_LINHA"];
  $SLA_DIAS             = $linha_atv["SLA_DIAS"];
  $PRAZO_DIAS           = $linha_atv["PRAZO_DIAS"];
  $visao_ilha           = $linha_atv["visao_ilha"];
  $vencimento           = $linha_atv["vencimento_ilha"];
  //$usuario_analise      = $linha_atv["idtbl_usuario_analise"];
  $TIPO_COTACAO         = $linha_atv["TIPO_COTACAO"];
  $setor                = $linha_atv["setor"]; 
  $revisao              = $linha_atv["revisao"];   
  $cpf_cnpj             = $linha_atv["cpf_cnpj"];
  $raiz_grupo           = $linha_atv["raiz_grupo"];
  $grupo                = $linha_atv["grupo"];  
    
    
$criado_em         =arrumadatahora($criado_em);
$inicio_da_tratativa =arrumadatahora($inicio_da_tratativa );
//$dt_tratamento     =arrumadatahora($dt_tratamento);

 if($raiz_grupo == $cpf_cnpj ){

     $e2e= $grupo;
     $cor = '#FF0000';

     //echo $cpf_cnpj;
  
    }else{ 
      $e2e= "-"; 
      $cor = '#464646';

     // echo $cpf_cnpj;
    } 
	

 if($setor == 'Auditoria'){

      $setor="Análise de input";
    }

  if($setor == 'Analise/Auditoria'){

      $setor=utf8_encode("Analise/Análise de input");
    }
 

?>


     
     <tr>
  
     <td class="tdconteudo"><?php echo "<a href='principal.php?id_contestacao_cotacao=$id_contestacao_cotacao&setor=$setor&t=forms/formcadastromanual_cotacoes_contestacao2.php'><font size='1' color='$cor' face='Arial'>$cotacao_atividade_pedido</font></a>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$e2e</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$revisao2</font>"?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$inicio_da_tratativa</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$status_vivocorp</font>" ?></td>
       <td><?php echo "<font size='1' color='$cor' face='Arial'>".$linha_atv['nome']."</font>"; ?></td>
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$ALTAS</font>" ?></td> 
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$PORTABILIDADE</font>" ?></td> 
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$MIGRACAO</font>" ?></td>
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$TROCAS</font>" ?></td>
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$TT</font>" ?></td> 
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$BACKUP</font>" ?></td>
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$M_2_M</font>" ?></td> 
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$FIXA</font>" ?></td> 
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$PRE_POS</font>" ?></td>
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$MIGRACAO_TROCA</font>" ?></td> 
       <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$total_linhas_cip</font>" ?></td> 
          <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tipo</font>"?></td>
          <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente</font>" ?></td>
          <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$TIPO_COTACAO</font>" ?></td>
          <td class="tdconteudo"><?php  if(empty($informacoes)){ echo  "<font size='1' color='$cor' face='Arial'>".$informacoes= "-"."</font>"; }else{ echo "<font size='1' color='$cor' face='Arial'>".$informacoes."</font>"; } ?></td>

     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$setor</font>" ?></td>
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

  <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&t=forms/formconsulta_cotacoes_contestacao.php'" class="sb2 bradius" />



</form>
</div>
</div>
</td>
</table>
</body>
</html>

