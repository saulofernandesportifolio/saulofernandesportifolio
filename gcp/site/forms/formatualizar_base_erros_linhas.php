<?php 
function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}


$sql_limpa="TRUNCATE bd_erros_pn.base_erros_linhas_filtro_manual";
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
  <p><font color="#FF0000" >1º - Efetuar download na aba atividades no VIVOCORP com o FILTRO:</font></p>
     <br/>
  <p><font color="#FF0000" >
   campo Tipo: Erro de cancelamento de numero OR Erro ativação de serviços OR Erro Ativação Linha Atlys OR Erro Criação Cliente Atlys OR Erro Criação Conta Atlys OR Erro Geração OV OR Erro na troca de serviços OR Pendente de prosseguir OR Erro validação linha PF/Pré</font></p>
   <br/>
    <p><font color="#FF0000" >
   campo Número do pedido: <?php echo $_GET['pedido']; ?></font></p>
   <br/>
   <p><font color="#FF0000" >
   campo Nome do Gestor: *Accenture -*</font></p>
   <br/>
  <P><font color="#FF0000" >2º - efetuar o download com o formato de saída: arquivo de texto com delimitador ( ; ) no VIVOCORP.</font></p>
  <br/>
  <p><font color="#FF0000" >3º - abrir o arquivo.txt e salvar com a codificação UTF8. E efetuar a carga.</font></p>
  </div>
  <br/>

</div>



<div class="divformcarrega">

<form style="background:#E7E4D1;" class="bradius" action="principal.php?&t=controles/carregar_base_erros_linhas.php" 
method="post" enctype="multipart/form-data" name="form1" onsubmit="PreventMultipleSubmit();carregandobase();">
  <p align="center"><b>
   <font color="#a0873c" size="4" face="Verdana, Arial, Helvetica, sans-serif">Carga base pedidos linhas 
    da Base de Dados - linhas Erros</font></b></p>
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

<div align="center" class="barraloaderimgatualizar">

 <img id="carregandobase" src="site/forms/img/load.gif" />

</div>

</body>
</html>
