<?php 
function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}


$sql_limpa="DELETE FROM bd_erros_pn.base_pedidos_erros_vpe";
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

<div style="border: #735D25 solid; padding: 3px 3px 3px 3px; width: 800px; left: 20%; position:relative; z-index: 0;" class="bradius">
  <p align="center">ORIENTAÇÕES:</p> <br/>
  <p align="center">Importante:</p><br/>

  <div style="padding: 3px 3px 3px 3px; width: 500px; left: 20%; position:relative; z-index: 0;" class="bradius">
  <p><font color="#FF0000" >1º - Efetuar download na aba Pedidos->Lista->na caixa de seleção selecionar Todos os pedidos das organizações no VIVOCORP com o FILTRO:</font></p>
     <br/>
  <p><font color="#FF0000" >
   campo Criado em: >=dd/mm/aaaa 
   (digitar a data conforme formato a partir do 
   inicio do periodo que deseja baixar a base) </font></p>
   <br/>
   <p><font color="#FF0000" >
   campo Status: Validando PORTIN OR Erro solicitação de PORTIN OR Aguard. cancelamento port. OR Erro Portabilidade OR Aguardando Autorização PORTIN OR Cancelado pendente port.</font></p>
   <br/> 
   <p><font color="#FF0000" >
   campo Alçada: Gerente de Negócios</font></p>
   <br/>
   <p><font color="#FF0000" >
   campo Carteira: *VPE* OR *VPK* OR *VPG* </font></p>
   <br/>
  <P><font color="#FF0000" >2º - efetuar o download com o formato de saída: arquivo de texto com delimitador ( ; ) no VIVOCORP.</font></p>
  <br/>
  <p><font color="#FF0000" >3º - abrir o arquivo.txt e salvar com a codificação UTF8. E efetuar a carga.</font></p>
  </div>
  <br/>

</div>



<div class="divformcarrega">

<form style="background:#E7E4D1;" class="bradius" action="principal.php?&t=controles/carregar_base_errospedidos_pn.php" 
method="post" enctype="multipart/form-data" name="form1" onsubmit="PreventMultipleSubmit();carregandobase();">
  <p align="center"><b><font color="#a0873c" size="4" face="Verdana, Arial, Helvetica, sans-serif">Atualiza&ccedil;&atilde;o 
    da Base de Dados - Erros Pedidos PN</font></b></p>
      <br />


  <p>&nbsp;</p>
  <p>Selecione o arquivo (extens&atilde;o .txt): <input type="file" name="file"/>
    </p>
      <br />
  <p>&nbsp;</p>
  <p>Obs: Somente arquivos de extens&otilde;es txt e codifica&ccedil;&atilde;o UTF- 8</font></p><br />
  
    <br />
    <input type="submit" name="Submit" value="   Enviar  " class="sb2 bradius" id="btSubmit"/>
	<input type="button" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&t=forms/formhome_operacao.php'" class="sb2 bradius"/>
    

 </form>
    
</div>
<br><br><br>

<div align="center">

 <img id="carregandobase" src="site/forms/img/carregando6.gif" />

</div>

</body>
</html>
