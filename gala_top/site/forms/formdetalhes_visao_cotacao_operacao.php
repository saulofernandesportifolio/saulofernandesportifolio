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



$sql_operador="SELECT * FROM tbl_usuarios WHERE idtbl_usuario='$id_user'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  

if($perfil == 2){

 $sql = "SELECT a.id_cotacao,
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
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                b.dt_distribuicao,
                b.status_cip_analise as status_cip,
                b.disc_status_cip_analise as disc_status_cip,
                b.idtbl_usuario_analise as idtbl_usuario
                FROM tbl_cotacao a INNER JOIN tbl_analise b 
                ON a.id_cotacao=b.id_cotacao
                INNER JOIN tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_analise                
                WHERE a.carteira LIKE '$canal' 
                and b.idtbl_usuario_analise='$idtbl_usuario' 
                and b.status_cip_analise IN (4)  
        GROUP BY a.cotacao_principal
        ORDER BY a.id_cotacao,b.dt_distribuicao DESC LIMIT 0,20000 ";
        
        
        $setor="Análise";


}


if($perfil == 3){

$sql = "SELECT   a.id_cotacao,
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
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                b.dt_distribuicao,
                b.status_cip_input as status_cip,
                b.disc_status_cip_input as disc_status_cip,
                b.idtbl_usuario_input as idtbl_usuario
                FROM tbl_cotacao a INNER JOIN tbl_input b 
                ON a.id_cotacao=b.id_cotacao
                INNER JOIN tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_input                
                WHERE a.carteira LIKE '$canal' 
                and b.idtbl_usuario_input='$idtbl_usuario'  
                 and b.status_cip_input IN (8) 
        GROUP BY a.cotacao_principal
        ORDER BY a.id_cotacao,b.dt_distribuicao DESC LIMIT 0,20000 ";


 $setor="Input";

}


if($perfil == 5){

$sql = "SELECT   a.id_cotacao,
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
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                b.dt_distribuicao,
                b.status_cip_auditoria as status_cip,
                b.disc_status_cip_auditoria as disc_status_cip,
                b.idtbl_usuario_auditoria as idtbl_usuario
                FROM tbl_cotacao a INNER JOIN tbl_auditoria b 
                ON a.id_cotacao=b.id_cotacao
                INNER JOIN tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_auditoria                
                WHERE a.carteira LIKE '$canal' 
                and b.idtbl_usuario_auditoria='$idtbl_usuario' 
                 and b.status_cip_auditoria IN (14)   
        GROUP BY a.cotacao_principal
        ORDER BY a.id_cotacao,b.dt_distribuicao DESC LIMIT 0,20000 ";

 $setor="Auditoria";
}



if($perfil == 6){

$sql = "SELECT  a.id_cotacao,
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
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                b.dt_distribuicao,
                b.status_cip_correcao as status_cip,
                b.disc_status_cip_correcao as disc_status_cip,
                b.idtbl_usuario_correcao as idtbl_usuario
                FROM tbl_cotacao a INNER JOIN tbl_correcao b 
                ON a.id_cotacao=b.id_cotacao
                INNER JOIN tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_correcao               
                WHERE a.carteira LIKE '$canal' 
                and b.idtbl_usuario_correcao='$idtbl_usuario' 
                 and b.status_cip_correcao IN (21)  
        GROUP BY a.cotacao_principal
        ORDER BY a.id_cotacao,b.dt_distribuicao DESC LIMIT 0,20000 ";

 $setor="Correção";
}

if($perfil == 13){

$sql = "SELECT  a.id_cotacao,
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
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                b.dt_distribuicao,
                b.status_cip_chamado as status_cip,
                b.disc_status_cip_chamado as disc_status_cip,
                b.idtbl_usuario_chamado as idtbl_usuario
                FROM tbl_cotacao a INNER JOIN tbl_chamado b 
                ON a.id_cotacao=b.id_cotacao
                INNER JOIN tbl_usuarios c 
                ON c.idtbl_usuario= b.idtbl_usuario_chamado              
                WHERE a.carteira LIKE '$canal' 
                and b.idtbl_usuario_chamado='$idtbl_usuario' 
                 and b.status_cip_chamado IN (31)  
        GROUP BY a.cotacao_principal
        ORDER BY a.id_cotacao,b.dt_distribuicao DESC LIMIT 0,20000 ";

 $setor="Chamado";
}
?>

<table class="tablepadrao" >
<td>
<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="../forms/formdetalhes_visao_cotacao_operacao2.php?id_user=<?php echo $id_user ?>&setor=<?php echo $setor ?>" method="post" id="frm-filtro">

<p align="center"><b><font color="#a0873c" size="5" face="Gotham Light"><?php echo $setor; ?></font></b></p>
<br />

<p><font color="#a0873c" size="4" face="Gotham Light"><strong>Lista de cotações a redistribuir</strong></font></p>
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
   
   
   

   
    <table border="0" class="lista-clientesvisaoanalise" width="10%">
    <thead> 
    
    <tr>
    <th>
    </th>
    <th>PRINCIPAL</th>
    <?php if($setor != "Análise"){?> 
    <th>COMPLEMENTAR</th>
    <?php } ?>
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
    <th>TOTAL LINHAS</th>
    <th>TIPO</th>
    <th>CLIENTE</th>
    <th>TIPO COTAÇÃO</th>
    
  </tr>
    </thead>
         <tbody>
    
    <?php


$acao = mysql_query($sql) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
	$id_cotacao           = $linha_atv["id_cotacao"];
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

$criado_em=arrumadatahora($criado_em);
$dt_distribuicao=arrumadatahora($dt_distribuicao);

if($status_cip =='2'){

$cor = '#FF0000';
}
else
{
$cor = '#464646';
}
if($perfil == 2){	
 $sql = "SELECT a.id_cotacao,
                a.cotacao_principal,
                a.n_da_cotacao,
                b.dt_distribuicao,
                b.id_cotacao,
                b.status_cip_analise,
                b.idtbl_usuario_analise,
                c.usuario,
                c.nome,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_analise b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario= b.idtbl_usuario_analise                            
               WHERE a.carteira LIKE '$canal' 
               and b.idtbl_usuario_analise='$idtbl_usuario' 
               and b.status_cip_analise IN (4)  
         GROUP BY a.cotacao_principal
        ORDER BY a.id_cotacao,b.dt_distribuicao DESC LIMIT 0,20000 ";
        
}        
   
if($perfil == 3){	
 $sql = "SELECT a.id_cotacao,
                a.cotacao_principal,
                a.n_da_cotacao,
                b.dt_distribuicao,
                b.id_cotacao,
                b.status_cip_input,
                b.idtbl_usuario_input,
                c.usuario,
                c.nome,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_input b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario= b.idtbl_usuario_input                           
               WHERE a.carteira LIKE '$canal' 
               and b.idtbl_usuario_input='$idtbl_usuario' 
               and b.status_cip_input IN (8) 
         GROUP BY a.cotacao_principal
        ORDER BY a.id_cotacao,b.dt_distribuicao DESC LIMIT 0,20000 ";
        
}    
   
 if($perfil == 5){	
 $sql = "SELECT a.id_cotacao,
                a.cotacao_principal,
                a.n_da_cotacao,
                b.dt_distribuicao,
                b.id_cotacao,
                b.status_cip_auditoria,
                b.idtbl_usuario_auditoria,
                c.usuario,
                c.nome,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_auditoria b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario= b.idtbl_usuario_auditoria                           
               WHERE a.carteira LIKE '$canal' 
               and b.idtbl_usuario_auditoria ='$idtbl_usuario' 
               and b.status_cip_auditoria IN (14)
         GROUP BY a.cotacao_principal
        ORDER BY a.id_cotacao,b.dt_distribuicao DESC LIMIT 0,20000 ";
        
}    


if($perfil == 6){	
 $sql = "SELECT a.id_cotacao,
                a.cotacao_principal,
                a.n_da_cotacao,
                b.dt_distribuicao,
                b.id_cotacao,
                b.status_cip_correcao,
                b.idtbl_usuario_correcao,
                c.usuario,
                c.nome,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_correcao b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario= b.idtbl_usuario_correcao                          
               WHERE a.carteira LIKE '$canal' 
               and b.idtbl_usuario_correcao='$idtbl_usuario' 
               and b.status_cip_correcao IN (21)
         GROUP BY a.cotacao_principal
        ORDER BY a.id_cotacao,b.dt_distribuicao DESC LIMIT 0,20000 ";
        
}    

if($perfil == 13){	
 $sql = "SELECT a.id_cotacao,
                a.cotacao_principal,
                a.n_da_cotacao,
                b.dt_distribuicao,
                b.id_cotacao,
                b.status_cip_chamado,
                b.idtbl_usuario_chamado,
                c.usuario,
                c.nome,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_chamado b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario= b.idtbl_usuario_chamado                          
               WHERE a.carteira LIKE '$canal' 
               and b.idtbl_usuario_chamado='$idtbl_usuario' 
               and b.status_cip_chamado IN (31)
         GROUP BY a.cotacao_principal
        ORDER BY a.id_cotacao,b.dt_distribuicao DESC LIMIT 0,20000 ";
        
}        
        
$acao2 = mysql_query($sql) or die (mysql_error());
$linha_atv = mysql_fetch_assoc($acao2);

?>
     <tr>
     <td>
      <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo $id_cotacao; ?>"  /></td>
  <td class="tdconteudo"><?php echo "$cotacao_principal"?></td>
   <?php if($setor != "Análise"){?>
    <td class="tdconteudo"><?php echo "$n_da_cotacao"?></td>
    <?php } ?>
     <td class="tdconteudo"><?php echo "$revisao"?></td>
    <td class="tdconteudo"><?php echo arrumadatahora($visao_ilha); ?></td> 
    <td class="tdconteudo"><?php echo  arrumadatahora($vencimento); ?></td>
    <td class="tdconteudo"><?php echo "$PRAZO_DIAS" ?></td>
    <td class="tdconteudo"><?php echo "$SLA_DIAS" ?></td>
    <td class="tdconteudo"><?php echo"$dt_distribuicao" ?></td>
    <td class="tdconteudo"><?php echo "$sub_status_vivocorp" ?></td>
    <td class="tdconteudo"><?php echo "$disc_status_cip" ?></td>
    <td><?php echo $linha_atv['nome']; ?></td>
    <td class="tdconteudo"><?php echo "$TIPO_LINHA" ?></td>
    <td class="tdconteudo">
    <a href="javascript:abrir('formdetalhes_linhas_cotacao.php?id_cotacao=<?php echo $id_cotacao; ?>');">
    <?php echo "$total_linhas_cip" ?></a></td> 
    <td class="tdconteudo"><?php echo "$tipo"?></td>
    <td class="tdconteudo"><?php echo "$cliente" ?></td>
    <td class="tdconteudo"><?php echo "$TIPO_COTACAO" ?></td>
    </tr>
    <?php
  	}
	?>
    </tbody>
  </table>
  <br />
  <input type="hidden" name="status_cip" value="<?php echo $status_cip ?>"/>
  <input type="button" name="Submit2" value="Fechar" onclick="window.close();" class="sb2 bradius" />

    <input type="submit" name="Submit" value="Avançar" class="sb2 bradius" />

</form>
</div>
</div>
</td>
</table>
</body>
</html>

