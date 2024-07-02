<?php 
function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}


$sql_limpa="DELETE FROM bd_erros_pn.base_pedidos_erros_top_tt";
$result = mysql_query($sql_limpa,$conecta2) or die(mysql_error());


$sql_dtbase="SELECT data_base,hora_base,operador_base,CONCAT(data_base,' ',hora_base) as dt FROM bd_erros_pn.base_erros_top_tt ORDER BY dt DESC LIMIT 1";
$result2 = mysql_query($sql_dtbase,$conecta2) or die(mysql_error()); 
$linha_atv = mysql_fetch_assoc($result2);
    
 
 $database = $linha_atv['data_base']." ".$linha_atv['hora_base'];
 $carregado = $linha_atv['operador_base'];


 
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
  <p align="center">Importante:</p>
  <div style="padding: 3px 3px 3px 3px; width: 500px; left: 20%; position:relative; z-index: 0;" class="bradius">
  <p><font color="#FF0000" >1º - Efetuar download na aba Pedidos->Lista->na caixa de seleção selecionar Todos os pedidos das organizações no VIVOCORP com o FILTRO:</font></p>
    <p><font color="#FF0000" >
   campo Criado em: >=dd/mm/aaaa 
   (digitar a data conforme formato a partir do 
   inicio do periodo que deseja baixar a base) </font></p>

   <p><font color="#FF0000" >
   campo Status: *Back* OR Executado parcialmente OR BKO Aprov.com falha no envio OR BKO Aprov. com falha no envio</font></p>
 
   <p><font color="#FF0000" >
   campo Alçada: Gerente de Negócios</font></p>
 
   <p><font color="#FF0000" >
   campo CARTEIRA: *VPG* OR *VPK*</font></p>

   <p><font color="#FF0000" >
   Apertar botão "ir" ou botão "enter" </font></p>

   <p><font color="#FF0000" >
   Apertar botão "menu -> exportar</font></p>

  <P><font color="#FF0000" >2º - efetuar o download com o formato de saída: arquivo de texto com delimitador ( ; ) no VIVOCORP.</font></p>

  <p><font color="#FF0000" >3º - abrir o arquivo.txt e salvar com a codificação UTF8. E efetuar a carga, que segue abaixo</font></p>
  </div>


<div class="divformcarrega">
<hr>

  <p align="center"><b><font color="#337ab7" size="4" face="Verdana, Arial, Helvetica, sans-serif">Atualiza&ccedil;&atilde;o 
    da Base de Dados - Erros Pedidos</font></b></p>

<form style="background:transparent;" class="bradius" action="principal.php?&t=controles/carregar_base_errospedidos_top_tt.php" 
method="post" enctype="multipart/form-data" name="form1" onsubmit="PreventMultipleSubmit();carregandobase();">

  <p>Selecione o arquivo (extens&atilde;o .txt): <input type="file" name="file"/>   </p>
  <p>Obs: Somente arquivos de extens&otilde;es txt e codifica&ccedil;&atilde;o UTF- 8</font></p> 
  <p align="left">
  <font color="#FF0000" >Ultima atualiza&ccedil;&atilde;o : <?php echo $database2; ?> - <?php echo $carregado; ?></font>
  </p>
    <br />
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
