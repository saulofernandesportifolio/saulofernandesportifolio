<?php 

setcookie('filtro',$_COOKIE['filtro'],time() - 28800);
setcookie('filtro2',$_COOKIE['filtro2'],time() - 28800);
setcookie('filtro3',$_COOKIE['filtro3'],time() - 28800);

function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}



$sql_limpa="TRUNCATE bd_erros_pn.relatoriogeral_1";
$result = mysql_query($sql_limpa,$conecta) or die(mysql_error()); 

?>

  <script type="text/javascript">
    function PreventMultipleSubmit(){
      document.getElementById("btSubmit").disabled=true;
      document.getElementById("btSubmit").style.backgroundColor = "#000";
    }


function carregandobase(){
    $('#carregandobase').css('visibility', 'visible');
    return true;
};

  </script>

<br/>

<div class="divorientacoes2 bradius">
  <p align="center">ORIENTAÇÕES:</p> 
  <p align="center">Importante:</p>

  <div style="padding: 3px 3px 3px 3px; width: 500px; left: 20%; position:relative; z-index: 0;" class="bradius">
  <p><font color="#FF0000" >1º - Abrir a base  do siebel.</font></p>
  <P><font color="#FF0000" >2º - Salvar todas as bases com a codificação UTF8. E apoś efetuar a carga conforme abaixo.</font></p>
  </div>


<div class="divformcarrega">
<hr>
<form style="background:transparent;" class="bradius" action="principal.php?&t=controles/carregar_base_pn.php" 
method="post" enctype="multipart/form-data" name="form1" onsubmit="PreventMultipleSubmit();carregandobase();">
  <p align="center"><b><font color="#337ab7" size="4" face="Verdana, Arial, Helvetica, sans-serif">Atualiza&ccedil;&atilde;o 
    da Base de Dados - PN</font></b></p><br>
  
  <p>Selecione o 1º arquivo CO.txt:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="file"/></p><br>
  <p>Selecione o 2º arquivo LESTE.txt:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="file2"/></p><br>
  <p>Selecione o 3º arquivo MG.txt:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;<input type="file" name="file3"/></p><br>
  <p>Selecione o 4º arquivo N.txt:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="file4"/></p><br>
  <p>Selecione o 5º arquivo NE.txt:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="file5"/></p><br>
  <p>Selecione o 6º arquivo SP.txt:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="file6"/></p><br>
  <p>Selecione o 7º arquivo SUL.txt:&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="file7"/></p><br>
  <p>Selecione o 8º arquivo TODAS_UF.txt: <input type="file" name="file8"/></p><br>
  
   <input type="submit" name="Submit" value="   Enviar  " class="sb2 bradius" id="btSubmit"/>
	<input type="button" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&t=forms/formhome_operacao.php'" class="sb2 bradius"/>
    

 </form>
    
</div>
</div>

<div align="center" class="barraloaderimgatualizar">

 <img id="carregandobase" src="site/forms/img/load.gif" />

</div>

</body>
</html>
