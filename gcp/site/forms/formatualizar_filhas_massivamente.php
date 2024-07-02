<?php 

/*
setcookie('filtro',$_COOKIE['filtro'],time() - 28800);
setcookie('filtro2',$_COOKIE['filtro2'],time() - 28800);
setcookie('filtro3',$_COOKIE['filtro3'],time() - 28800);

*/

function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}
include("../../bd.php");

  $sqlcria="CALL cip_nv.carga_filhas_diretoria()";
  $resultcria = mysql_query($sqlcria,$conecta);   

?>

<link rel="StyleSheet" href="../../css/padrao.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../../js/funcoesJs.js"></script>
<link rel="shortcut icon" href="../../css/imagem/Icone_Empreza.jpg" type="image/x-icon" />

<script type="text/javascript" src="../../js/jquery2.js"></script>




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
  <p align="center">FILTRO PARA BAIXAR BASE DO VIVOCORP</p>

  <p align="center">Importante:</p>

  <div style="padding: 3px 3px 3px 3px; width: 500px; left: 20%; position:relative; z-index: 0;" class="bradius">
  <p><font color="#FF0000" >1º - Ir na aba cotações -> Lista atividades.</font></p>
  <P><font color="#FF0000" >2º - mudar para Todas as cotações das organizações .</font></p>
  <p><font color="#FF0000" >3º - No menu em colunas exibinas no vivocorp redefinir para padrões.</font></p>
  </div>
  

<div class="divformcarrega">
<hr>
<form style="background:transparent;" class="bradius" action="principal.php?&t=controles/enviar_base_filhas_massivamente.php" 
method="post" enctype="multipart/form-data" name="form1" onsubmit="PreventMultipleSubmit();carregandobase();">
  <p align="center"><b><font color="#337ab7" size="4" face="Verdana, Arial, Helvetica, sans-serif">Caregar complementares - TOP</font></b></p>
     
  <p>&nbsp;</p>
  <p>Selecione o arquivo (extens&atilde;o .txt): <input type="file" name="file"/>
    </p>
   <p>Obs: Somente arquivos de extens&otilde;es txt e codifica&ccedil;&atilde;o UTF- 8</font></p>

    <br />
    <input type="hidden" name="idpri" value="<?php echo $_GET['idpri'] ?>"/>
    <input type="submit" name="Submit" value="   Enviar  " class="sb2 bradius" id="btSubmit"/>
	  <input type="button" name="Submit2" value="Cancelar" onclick="window.close()" class="sb2 bradius"/><br><br>

 </form>
 
</div>
<div align="center" class="barraloaderimgatualizar">

 <img id="carregandobase" src="site/forms/img/load.gif" />

</div>
 
    <?php

   /* mysql_free_result($result,$result2);
    mysql_close($conecta);
   */
     ?>


</div>
</body>
</html>
