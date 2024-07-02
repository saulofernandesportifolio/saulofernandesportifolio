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



$sql_limpa="TRUNCATE bd_erros_pn.tamp_cargapn;";
$result = mysql_query($sql_limpa,$conecta2) or die(mysql_error()); 

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

<div class="divorientacoes bradius">
  <p align="center">ORIENTAÇÕES:</p> 
  <p align="center">Importante:</p>

  <div style="padding: 3px 3px 3px 3px; width: 500px; left: 20%; position:relative; z-index: 0;" class="bradius">
  <p><font color="#FF0000" >1º - Abrir a planilha recebida pela area de relatorios no excel.</font></p>
  <P><font color="#FF0000" >2º - Salvar como formato CSV.</font></p>
  <p><font color="#FF0000" >3º - Clic de direita na planilha salva em formato CSV e "abrir com" e escolher bloco de notas </font></p>
  <p><font color="#FF0000" >4º - Salvar com a codificação UTF8. E efetuar a carga.</font></p>
  </div>


<div class="divformcarrega">
<hr>
<form style="background:transparent;" class="bradius" action="principal.php?&t=controles/carregar_base_pn2.php" 
method="post" enctype="multipart/form-data" name="form1" onsubmit="PreventMultipleSubmit();carregandobase();">
  <p align="center"><b><font color="#337ab7" size="4" face="Verdana, Arial, Helvetica, sans-serif">Atualiza&ccedil;&atilde;o 
    da Base de Dados - PN</font></b></p><br><br>  
  <p>Selecione o arquivo Controle Tramites de PN VPG.csv:&nbsp;<input type="file" name="file"/></p><br><br>
  
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
