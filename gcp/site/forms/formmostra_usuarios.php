
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
  
 
 

ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );







/*if(empty($_POST["ling"])){
    
 echo "
       <script type=\"text/javascript\">
        alert('Selecione alguma cotação !');
        history.back();
	    </script>
 ";   
    
    
 exit();   
}*/






$sql = "SELECT * FROM ativos a  INNER JOIN cip_nv.tbl_usuarios b 
        ON a.login=b.usuario WHERE fila IN (1)                 
        ORDER BY nome_completo ASC LIMIT 0,20000 ";




$acao = mysql_query($sql,$conecta) or die (mysql_error());

 $num= mysql_num_rows($acao);
?>
</p>
<div id="filtroservicousuario" class="form bradius">
<div class="divformusuario">

<p></p>

<form name="form1" method="post" action="principal.php?&t=forms/formcriar_usuarios2.php" id="frm-filtro">

<p align="center"><b><font color="#a0873c" size="5" face="Gotham Light">Usuários</font></b></p>
<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Lista de <?php echo $num ?> usuários para criação de acesso com sucesso</strong></font></p>
<br />





      
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>

   <br /><br /><br /><br />
  
    <table border="0"  class="lista-clientes">
    <thead> 
    <tr>
    <th>NOME COMPLETO</th>
    <th>LOGIN</th>
    <th>CPF</th>
    <th>SETOR</th>
  </tr>
    </thead>
         <tbody>
    
    <?php
 

while($linha_user = mysql_fetch_assoc($acao))
{
	$id            = $linha_user["id"];
  $nome_completo = $linha_user["nome_completo"];
	$login	       = $linha_user["login"];
  $cpf		   = $linha_user["CPF"];
	$disc_perfil   = $linha_user["disc_perfil"];


?>

     <tr bgcolor="#f5f5f5"> 
    <td class="tdconteudo"><?php echo "$nome_completo" ?></td>
    <td class="tdconteudo"><?php echo "$login" ?></td>
    <td class="tdconteudo"><?php echo "$cpf" ?></td>
    <td class="tdconteudo"><?php echo "$disc_perfil" ?></td>
    
    </tr>
    <?php
  	}
      
	?>
    </tbody>
  </table>
  
  <br />
<p>
  <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?filtro=%&t=forms/formhome_operacao.php'" class="sb2 bradius" />

  <input type="submit" name="Submit" value="Avançar" class="sb2 bradius" />
 </p>
</form>
</div>
</div>

 <?php

  mysql_free_result($acao_operador,$acao);
  mysql_close($conecta);  

  ?>


</body>
</html>

