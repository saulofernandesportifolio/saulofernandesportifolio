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
 
  var width = 1024;
  var height = 800;
 
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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7){
    
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
  
 
 

//ini_set ( 'mysql.connect_timeout' ,  '500' ); 
//ini_set ( 'default_socket_timeout' ,  '500' );
//ini_set('memory_limit', '-1');

    $query= "SELECT * FROM tbl_usuarios WHERE perfil = '$perfil' and 
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
    	
$statusfila=2;         

$sql="CALL fila_quantificacao("."'$statusfila'".")";


$acao = mysql_query($sql) or die (mysql_error());
$num_ = mysql_num_rows($acao);


?>

<table class="tablepadrao" >
<td>

<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">

<p></p>
<p><p align="center"><b><font color="#a0873c" size="5" face="Gotham Light">Lista 
  de Cota&ccedil;&otilde;es Para Atualizar Servi&ccedil;o</font></p>
<br />
<p><font color="#000000" size="3" face="Gotham Light">Voc&ecirc; tem um total de <?php echo "$num_ cota&ccedil;&otilde;es"?> 
    na sua vis&atilde;o. Clique 
    em &quot;<strong>Abrir &quot; para atualizar o servi&ccedil;o :</font></p>
    <br />
    
    <p align="left"><font color="#000000" size="3" face="Gotham Light">Em caso de carregamento duplicado 
    clicar neste link para limpar a base e carregar novamente:<a href="principal.php?t=controles/sql_excluir_carregamento_duplicado.php">Limpar Base Duplicada</a>.</font></p>
    
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
    <th>COTA&Ccedil;&Atilde;O</th>
    <th>REVISÃO</th>
    <th>REGIONAL</th>
    <th>UF</th>
    <th>TIPO</th>
    <th>CLIENTE</th>
    <th>CRIADO EM</th>
    <th>STATUS VIOCORP</th>
    <th>SUB-STATUS VIOCORP</th>
	  <th>STATUS CIP</th>	
    <th>ABRIR</th>
	  <th>EXCLUIR</th> 
    
  </tr>
    </thead>
     <tbody>
  <?php

//$acao = mysql_query($sql) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
	$id_cotacao			= $linha_atv["id_cotacao"];
	$cotacao_principal	= $linha_atv["cotacao_principal"];
	$revisao			= $linha_atv["revisao"];
  $regional			= $linha_atv["regional_atribuida"];
	$uf 	     		= $linha_atv["uf"];
	$criado_em      		= $linha_atv["criado_em"];
 	$tipo					= $linha_atv["carteira"];
	$cliente				= $linha_atv["cliente"];
	$status_vivocorp		= $linha_atv["status_da_cotacao"];
  $sub_status_vivocorp	=$linha_atv["substatus_da_cotacao"];
	$TIPO_SERVICO		    = $linha_atv["TIPO_SERVICO"];
	$status_cip              = $linha_atv["status_cip_analise"];
  $disc_status_cip         = $linha_atv["disc_status_cip_analise"];

  $criado_em=arrumadatahora($criado_em);    

if($status_cip == '2'){

$cor = '#FF0000';
}
else
{
$cor = '#464646';
}

?>
  <tr> 
    <td><?php echo "$cotacao_principal"?></td>
    <td><?php echo "$revisao"?></td>
    <td><?php echo "$regional"?></td>
    <td><?php echo "$uf"?></td>
    <td><?php echo "$tipo"?></td>
    <td><?php echo "$cliente" ?></td>
    <td><?php echo "$criado_em" ?></td>
    <td><?php echo "$status_vivocorp" ?></td>
    <td><?php echo "$sub_status_vivocorp" ?></td>
	<td><?php echo "$disc_status_cip" ?></td>
    <td>
   
    <a href="principal.php?id_cotacao=<?php echo $id_cotacao ?>&t=forms/formdistribuir_cotacao_servico1.php">ABRIR</a>
   
   
    </td>
	<td>
    <a href="principal.php?id_cotacao=<?php echo $id_cotacao ?>&t=controles/sql_excluir_distribuicao_cotacao_servico.php">EXCLUIR</a></td>	
  </tr>
  <?php
  }
  ?>

</tbody>    
</table>

<br />
<p align="left">
  <input type="hidden" name="canal" value="<?php echo $canal ?>" />
 

  <input type="button" name="Submit2" class="sb2 bradius" value="Voltar" onclick="window.location='principal.php?filtro=%&t=forms/formhome_operacao.php'"/>
</p>
   </div>

    </div>
</div>

</td>
</table>

</body>
</html>
