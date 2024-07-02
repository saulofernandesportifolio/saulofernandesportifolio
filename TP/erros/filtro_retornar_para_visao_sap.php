<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script>

<!-- Função Checkbox selecionar todos -->

function selecionar_todas(retorno) {
    var frm = document.form1;
    for(i = 0; i < frm.length; i++) {        
        if(frm.elements[i].type == "checkbox") {
            frm.elements[i].checked = retorno;
        }
     }
}
</script>
</head>
<body id="logar" background="../../tp/img/background.JPG">
<p>
  
</p>


<?php
//Testa se o perfil está correto.

	if($_SESSION["adm_erros"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];


//echo $login;

?>

<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
    </div>
    
    <div id="caixa">
    
      <div id="conteudo">
        
            <p id="p_padrao">Supervisão - &nbsp; <?php echo $nome; ?>.</p><br>
           <p id="p_padrao" align="center">Retornar para Visão do operador.</p>
    <?php        
   include "../conexao.php";
	$tempo = 0;

	 set_time_limit($tempo);
 	date_default_timezone_set("Brazil/East");
	$data_dia= date("y/m/d"); 
	?>
<form name="form1" method="post" action="retornar_para_visao_erros.php">
<input name="login" type="hidden"  value="<?php echo $_SESSION["login"];?>" />

<p>&nbsp;</p>
<p>&nbsp;</p>
  <table width="34%" border="1" align="center">
     <tr bordercolor="#FFFFFF"> 
      <td colspan="2"> 
        <div align="center">
      <hr noshade="noshade" />
          <font color="#000000" size="2" face="Arial, Helvetica, sans-serif" class="regra2"><strong>SELECIONE 
          O FILTRO </strong></font> 
          <hr noshade="noshade" />
    </div></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td width="26%" height="24"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Regional:</font></td>
    <td width="74%"><p align="justify"><font color="#003366">
      <select name="regional" id="regional">
        <option value="0" selected="selected">Todos</option>
        <option value="Sul">SUL</option>
        <option value="SP">SP</option>
		<option value="CO">CO</option>
        <option value="Leste">LESTE</option>
        <option value="Norte">NORTE</option>
        <option value="NE">NE</option>
        <option value="MG">MG</option>
        <option value="ND">ND</option>
      </select>
      </font></p></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td height="24"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Tramite:</font></td>
    <td><p align="justify"><font color="#003366"></font><font color="#666666" size="2" face="Georgia, Times New Roman, Times, serif">
      <select name="tramite" id="tramite">
        <option value="0" selected="selected">Todos</option>
        <option value="Aguardando">Aguardando</option>
        <option value="Tratando">Tratando</option>
        <option value="Tratado">Tratado</option>
      </select>
      </font><font color="#003366">
        
      </font></p></td>
  </tr>
   <tr bordercolor="#FFFFFF">
    <td height="24"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Turno:</font></td>
    <td><p align="justify"><font color="#003366"></font><font color="#666666" size="2" face="Georgia, Times New Roman, Times, serif">
      <select name="turno2">
        <option value="0" selected="selected">Todos</option>
        <option value="dia">Dia</option>
        <option value="noite">Noite</option>
      </select>
      </font><font color="#003366">
       
      </font></p></td>
  </tr>
   <tr bordercolor="#FFFFFF"> 
      <td colspan="2"> 
        <div align="center" class="regra2">
      <hr noshade="noshade" />
          <input type="submit" name="Submit" value="Pesquisar" />
          <input type="button" name="Submit2" value="Cancelar" onClick="window.location='../home.php'">
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