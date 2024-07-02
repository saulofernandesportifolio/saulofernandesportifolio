<?php 
function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}

$sql_limpa="DELETE FROM tbl_cotacao_vpg";
$result = mysql_query($sql_limpa) or die(mysql_error()); 

$sql_dtbase="SELECT dt_inclusao_bd_cip,carregado_por_cip  FROM tbl_cotacao ORDER BY dt_inclusao_bd_cip DESC LIMIT 1 ";
$result2 = mysql_query($sql_dtbase) or die(mysql_error()); 
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
  </script>

<br/>

<div style="border: #735D25 solid; padding: 3px 3px 3px 3px; width: 800px; left: 20%; position:relative; z-index: 0;" class="bradius">
  <p align="center">ORIENTAÇÕES:</p> <br/>
  <p align="center">FILTRO PARA BAIXAR BASE DO VIVOCORP</p><br/>

  <p align="center">Importante:</p><br/>

  <div style="padding: 3px 3px 3px 3px; width: 500px; left: 20%; position:relative; z-index: 0;" class="bradius">
  <p><font color="#FF0000" >1º - Ir na aba Atividades -> Lista atividades.</font></p>
  <P><font color="#FF0000" >2º - mudar Minhas atividades para Atividades da minha esquipe.</font></p>
  <p><font color="#FF0000" >3º - No menu em colunas exibinas no vivocorp redefinir para padrões.</font></p>
  </div>
  <br/>

 <p align="center">Colocar a descrição em vermelho no vivocorp conforme nome do campo abaixo:</p><br/>
<p align="center">Tipo: <font color="#FF0000" >Análise documentação or Ilha de Input or Análise de input or Correção input</font><p><br/>

<p align="center">Status da cotação: <font color="#FF0000" >Enviado ilha de input</font><p><br/>    

<p align="center">Status da atividade : <font color="#FF0000" >Pendente</font><p><br/>         

</div>



<div class="divformcarrega">

<form style="background:#E7E4D1;" class="bradius" action="principal.php?&t=controles/enviar_base_vpg.php" 
method="post" enctype="multipart/form-data" name="form1" onsubmit="PreventMultipleSubmit();">
  <p align="center"><b><font color="#a0873c" size="4" face="Verdana, Arial, Helvetica, sans-serif">Atualiza&ccedil;&atilde;o 
    da Base de Dados - VPG</font></b></p>
      <br />


  <p>&nbsp;</p>
  <p>Selecione o arquivo (extens&atilde;o .txt): <input type="file" name="file"/>
    </p>
      <br />
  <p>&nbsp;</p>
  <p>Obs: Somente arquivos de extens&otilde;es txt e codifica&ccedil;&atilde;o UTF- 8</font></p><br />
  <p align="left">
  <font color="#FF0000" >Ultima atualiza&ccedil;&atilde;o : <?php echo $database2; ?> - <?php echo $carregado; ?></font>
  </p>
    <br />
    <input type="submit" name="Submit" value="   Enviar  " class="sb2 bradius" id="btSubmit"/>
	<input type="button" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php'" class="sb2 bradius"/>
    

 </form>
    
</div>


</body>
</html>
