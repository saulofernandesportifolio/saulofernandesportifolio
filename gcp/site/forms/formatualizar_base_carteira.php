<?php 
function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}



$sql_dtbase="SELECT data_carga,carregado_por_cip  FROM cip_nv.carteira ORDER BY data_carga DESC LIMIT 1 ";
$result2 = mysql_query($sql_dtbase,$conecta) or die(mysql_error()); 
$linha_atv = mysql_fetch_assoc($result2);
    
 
 $database = $linha_atv['data_carga'];
 $carregado = $linha_atv['carregado_por_cip'];
 
 $database2 = arrumadatahora($database);





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

<div class="divorientacoes bradius" >
  <p align="center">ORIENTAÇÕES:</p> 
  <p align="center">FILTRO PARA BAIXAR BASE DO VIVOCORP</p>

  <p align="center">Importante:</p>

  <div style="padding: 3px 3px 3px 3px; width: 500px; left: 20%; position:relative; z-index: 0;" class="bradius">
  <p><font color="#FF0000" >1º - Ir na aba Clientes -> Lista de clientes.</font></p>
  <P><font color="#FF0000" >2º - mudar para todos os clientes organizações.</font></p>
  <p><font color="#FF0000" >3º - No menu em colunas exibinas no vivocorp redefinir para padrões.</font></p>
  </div>
 <p align="center">Colocar a descrição em vermelho no vivocorp conforme nome do campo abaixo:</p>
<p align="center">Carteira: <font color="#FF0000" >*VPG* OR *TOP* OR *VPK* OR *MASSIVO*</font><p>
<p align="center">localizar e substituir :<font color="#FF0000" > apas simples por espaço (precionando a tecla esoaço uma vez) </font><p>



<div class="divformcarrega">
<hr> 

<form style="background:transparent;" class="bradius" action="principal.php?&t=controles/enviar_base_carteira.php" 
method="post" enctype="multipart/form-data" name="form1" onsubmit="PreventMultipleSubmit();carregandobase();">
  <p align="center"><b><font color="#000000" size="4" face="Verdana, Arial, Helvetica, sans-serif">Atualiza&ccedil;&atilde;o 
    da Base de Dados - Carteira VPG</font></b></p>

  <p>Selecione o arquivo (extens&atilde;o .txt): <input type="file" name="file"/>
    </p>
  <p>Obs: Somente arquivos de extens&otilde;es txt e codifica&ccedil;&atilde;o UTF- 8</font></p>
  <p align="left">
  <font color="#FF0000" >Ultima atualiza&ccedil;&atilde;o : <?php echo $database2; ?> - <?php echo $carregado; ?></font>
  </p>
    <br />
    <input type="submit" name="Submit" value="   Enviar  " class="sb2 bradius" id="btSubmit"/>
	<input type="button" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php'" class="sb2 bradius"/>
    

 </form>
    
</div>
</div>

<div align="center" class="barraloaderimgatualizar">

 <img id="carregandobase" src="site/forms/img/load.gif" />

</div>

<?php

 mysql_free_result($result,$result2);
 mysql_close($conecta);

?>



</body>
</html>
