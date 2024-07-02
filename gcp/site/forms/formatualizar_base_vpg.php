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

$sql_limpa="DELETE FROM cip_nv.tbl_cotacao_vpg";
$result = mysql_query($sql_limpa,$conecta) or die(mysql_error()); 

$sql_dtbase="SELECT dt_inclusao_bd_cip,carregado_por_cip  FROM cip_nv.tbl_cotacao WHERE TIPO_COTACAO='Principal' ORDER BY dt_inclusao_bd_cip DESC LIMIT 1 ";
$result2 = mysql_query($sql_dtbase,$conecta) or die(mysql_error()); 
$linha_atv = mysql_fetch_assoc($result2);
    
 
 $database = $linha_atv['dt_inclusao_bd_cip'];
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

<div class="divorientacoes bradius">
  <p align="center">ORIENTAÇÕES:</p>
  <p align="center">FILTRO PARA BAIXAR BASE DO VIVOCORP</p>

  <p align="center">Importante:</p>

  <div style="padding: 3px 3px 3px 3px; width: 500px; left: 20%; position:relative; z-index: 0;" class="bradius">
  <p><font color="#FF0000" >1º - Ir na aba Atividades -> Lista atividades.</font></p>
  <P><font color="#FF0000" >2º - mudar Minhas atividades para Atividades da minha esquipe.</font></p>
  <p><font color="#FF0000" >3º - No menu em colunas exibinas no vivocorp redefinir para padrões.</font></p>
  </div>
  <p align="center">Colocar a descrição em vermelho no vivocorp conforme nome do campo abaixo:</p>
  <p align="center">Tipo: <font color="#FF0000" >Análise documentação or Ilha de Input or Análise de input or Correção input</font><p>

<p align="center">Status da cotação: <font color="#FF0000" >Enviado ilha de input</font><p> 

<p align="center">Status da atividade : <font color="#FF0000" >Pendente</font><p>       
<br>
<div class="divformcarrega">
<hr>
<form style="background:transparent;" class="bradius" action="principal.php?&t=controles/enviar_base_vpg.php" 
method="post" enctype="multipart/form-data" name="form1" onsubmit="PreventMultipleSubmit();carregandobase();">
  <p align="center"><b><font color="#337ab7" size="4" face="Verdana, Arial, Helvetica, sans-serif">Atualiza&ccedil;&atilde;o 
    da Base de Dados - VPG</font></b></p>
     
  <p>&nbsp;</p>
  <p>Selecione o arquivo (extens&atilde;o .txt): <input type="file" name="file"/>
    </p>
   <p>Obs: Somente arquivos de extens&otilde;es txt e codifica&ccedil;&atilde;o UTF- 8</font></p>
  <p align="left">
  <font color="#FF0000" >Ultima atualiza&ccedil;&atilde;o : <?php echo $database2; ?> - <?php echo $carregado; ?></font>
  </p>
    <br />
    <input type="submit" name="Submit" value="   Enviar  " class="sb2 bradius" id="btSubmit"/>
	  <input type="button" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&t=forms/formhome_operacao.php'" class="sb2 bradius"/><br><br>

 </form>
 
</div>
<div align="center" class="barraloaderimgatualizar">

 <img id="carregandobase" src="site/forms/img/load.gif" />

</div>
 
    <?php

    mysql_free_result($result,$result2);
    mysql_close($conecta);

     ?>


</div>
</body>
</html>
