<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../tp/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />

<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../tp/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>

<style type="text/css">
<!--
.style5 {
	font-size: 11px;
	font-family: Arial, Helvetica, sans-serif;
}
.style6 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
  <?php
  
  //Testa se o perfil está correto.

	if($_SESSION["bi"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
  
  
  
include("../conexao.php");
?>

<div id="principal">

   <div id="menu">
   <?php include("../menu.php") ?>

    </div>
    
    <div id="caixa" style="height:610px;">
    
     <div id="conteudo">
        
            <p id="p_padrao">B.I - Usuário: <?php echo $_SESSION["nome"]; ?>.</p>

<form name="form1" method="post" action="valida_filtro.php">


<p>&nbsp;</p>
<p>&nbsp;</p>
  <table width="34%" border="1" align="center">
  <tr bordercolor="#FFFFFF"> 
	   <td colspan="2"><div align="center"> 
          <p><font color="#000000" size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Gerar 
            Bases</strong></font><font color="#a0873c" size="2" face="Arial, Helvetica, sans-serif" class="regra2"></font></p>
          </div></td>
  </tr>
    <tr bordercolor="#FFFFFF"> 
      <td colspan="2"> 
        <div align="center">
      <hr noshade="noshade" />
      <font color="#000000" size="2" face="Arial, Helvetica, sans-serif" class="regra2"><strong>SELECIONE 
      A BASE</strong></font> 
      <hr noshade="noshade" />
    </div></td>
  </tr>
  <tr bordercolor="#FFFFFF">
   
    <td width="40%">
       </font><font color="#003366">&nbsp;
      
      </font>
    </td>
  </tr>
  <tr bordercolor="#FFFFFF">
      <td  align="right" bordercolor="#FFFFFF" class="style4"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Base:</font>
	  </td>
	  <td width="57%">
        <select name="validador" id="validaddor" onChange="form.submit()">
          <option value="0" selected="selected">Selecione</option>
		  <option value="1">SAP</option>
          <option value="2">ERROS</option>
          <option value="3">PN</option>
          <option value="4">DIRETO</option>
          <option value="5">INDIRETO</option>
          <option value="6">GESTÃO</option>
          <option value="7">DIRETORIA</option>
          <option value="8">TREINAMENTO</option>
          <option value="9">TSA</option>
        </select>
      </td>
	  <td width="3%"></td>
  </tr>
  
  <tr bordercolor="#FFFFFF"> 
      <td colspan="2"> 
        <div align="center" class="regra2">
      <hr noshade="noshade" />
        <input type="button" name="Submit2" value="Voltar" onClick="window.location='../home.php'">
          
        </div></td>
  </tr>
</table>
<p>&nbsp;</p>

</form>



</div>
        
</div>
    
</div>




</body>
</html>
