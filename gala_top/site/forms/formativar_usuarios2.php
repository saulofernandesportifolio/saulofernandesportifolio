
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
  
if($perfil != 1 && $perfil != 4){
    
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

$dados='';

foreach($_POST["ling"] as $id)
{
    
 $dados.=$id.",";    

}
$dados=substr($dados, 0, strlen($dados)-1);   
   
$sql = "SELECT count(idtbl_usuario)as total FROM tbl_usuarios WHERE idtbl_usuario in($dados)               
        ORDER BY nome ASC LIMIT 0,20000 ";
$acao = mysql_query($sql) or die (mysql_error());
 $count = mysql_fetch_array($acao);
 $num=$count['total']; 


?>
</p>
<div id="filtroeditausuario" class="form bradius">
<div class="divformeditausuario">

<p></p>

<form name="form1" method="post" action="principal.php?&t=controles/sql_ativar_usuario4.php" id="frm-filtro">

<p align="center"><b><font color="#a0873c" size="5" face="Gotham Light">Ativar Usuários</font></b></p>
<br />

<p><font color="#a0873c" size="4" face="Gotham Light"><strong>Lista de <?php echo $num ?> usuários para criação de acesso</strong></font></p>
<br />





      
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>

   <br /><br /><br /><br />

   
    <table border="0"  class="lista-clientes">
    <thead> 
    <tr>
    <th>
    <th>NOME COMPLETO</th>
    <th>LOGIN</th>
    <th>CPF</th>
    <th>PERFIL</th>
    <th>TURNO</th>
    <th>SUPERVISOR</th>
  </tr>
    </thead>
         <tbody>
    
    <?php
 


foreach($_POST["ling"] as $id)
{


$sql = "SELECT * FROM tbl_usuarios  
        WHERE  idtbl_usuario='$id'                  
        ORDER BY nome ASC LIMIT 0,20000 ";

$acao = mysql_query($sql) or die (mysql_error());


while($linha_user = mysql_fetch_assoc($acao))
{
	$id            = $linha_user["idtbl_usuario"];
  $nome_completo = $linha_user["nome"];
	$login	       = $linha_user["usuario"];
  $cpf		       = $linha_user["cpf"];
	$disc_perfil   = $linha_user["disc_perfil"];
  $turno         = $linha_user["turno"];
	$id_supervisor = $linha_user["id_supervisor"];

    if($disc_perfil == 'Auditoria'){

      $disc_perfil="Análise de input";
    }

  if($disc_perfil == 'Analise/Auditoria'){

      $disc_perfil="Analise/Análise de input";
    }


?>

     <tr bgcolor="#f5f5f5"> 
     <td class="tdconteudo">
     <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo $id ?>" checked readonly="True"/></td>
    <td class="tdconteudo"><?php echo "$nome_completo" ?></td>
    <td class="tdconteudo"><?php echo "$login" ?></td>
    <td class="tdconteudo"><?php echo "$cpf" ?></td>
    <td class="tdconteudo"><?php echo "$disc_perfil" ?></td>
    <td class="tdconteudo"><?php if( $turno == 1){ 
        echo $turno ="Diurno"; }elseif( $turno == 2)
        { echo $turno ="Intermediário"; }elseif( $turno == 3){ 
            echo $turno ="Noturno"; } ?></td>
      <td class="tdconteudo"><?php     //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM tbl_supervisor WHERE id ='$id_supervisor'";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         $super=$dado['nome'];
   }echo "$super" ?></td> 
    </tr>
    <?php
    
    
    

    
    
  	}
     } 
	?>
    </tbody>
  </table>
  

  <br />
<p>

<input type="hidden" name="sup" value=<?php echo $sup; ?> >
<input type="hidden" name="setor" value=<?php echo $setor; ?> >

  <input type="button" name="Submit2" value="Voltar" onclick="history.back();" class="sb2 bradius" />

  <input type="submit" name="Submit" value="Ativar" class="sb2 bradius" />
 </p>
</form>
</div>
</div>
</body>
</html>

