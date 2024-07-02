<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E - GTQ  - Gestão Tramite Qualidade</title>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <meta name="description" content="jquery"/>
        <meta name="keywords" content="jquery" />
		<meta name="robots" content="all, index, follow" />
		<!--<link href="_style/default.css" rel="stylesheet" type="text/css"/>-->
		<link  href="calendario/_style/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="calendario/_scripts/jquery.js"></script>
		<script type="text/javascript" src="calendario/_scripts/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="calendario/_scripts/exemplo-calendario.js"></script>


<script>
<!-- Marcara para Datas -->

function Formatadata(Campo, teclapres)
			{
				var tecla = teclapres.keyCode;
				var vr = new String(Campo.value);
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				tam = vr.length + 1;
				if (tecla != 8 && tecla != 8)
				{
					if (tam > 0 && tam < 2)
						Campo.value = vr.substr(0, 2) ;
					if (tam > 2 && tam < 4)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
					if (tam > 4 && tam < 7)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
				}
			}

<!-- Função valida campos vazios -->

/*function enviardados()
{

	if (document.dados.data_1.value=="")
	{
			alert("Preencha o campo de data");
			document.dados.data_1.focus();
			return false;
	}

	return true;
}*/

/* Javascript
$('#data_1').focus(function()
{	
$(this).calendario({target:'data_1',top:0,left:130});

});

/* Javascript 
$('#data_2').focus(function()
{	
$(this).calendario({target:'data_2',top:0,left:130});

});*/

/* Javascript */
$('#data_1','#data_2').focus(function()
{	
       $(this).calendario({		
	            target:'data_1',
				target:'data_2',
				closeClick:false
					});
					});
					


</script>
</head>
<body id="logar" background="../../tp/img/background.JPG">
<p>
  
</p>


<?php
//Testa se o perfil está correto.

	if($_SESSION["SUP_SAP"] == 0){  
    	
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
<form name="form1" method="post" action="retornar_para_visao_sap.php">
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
        <option value="regional='Sul' OR regional='SP' OR regional='CO' OR regional='Leste' OR regional='Norte' OR regional='NE' OR regional='MG'" selected="selected">Todos</option>
        <option value="regional='Sul'">SUL</option>
        <option value="regional='SP'">SP</option>
		<option value="regional='CO'">CO</option>
        <option value="regional='Leste'">LESTE</option>
        <option value="regional='Norte'">NORTE</option>
        <option value="regional='NE'">NE</option>
        <option value="regional='MG'">MG</option>
        </select>
      </font></p></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td height="24"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Tramite:</font></td>
    <td><p align="justify"><font color="#003366"></font><font color="#666666" size="2" face="Georgia, Times New Roman, Times, serif">
      <select name="tramite" id="tramite">
        <option value="tramite='Aguardando' OR tramite='Tratando' OR tramite='Tratado'" selected="selected">Todos</option>
        <option value="tramite='Aguardando'">Aguardando</option>
        <option value="tramite='Tratando'">Tratando</option>
        <option value="tramite='Tratado'">Tratado</option>
      </select>
      </font><font color="#003366">
        
      </font></p></td>
  </tr>
   <tr bordercolor="#FFFFFF">
    <td height="24"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Turno:</font></td>
    <td><p align="justify"><font color="#003366"></font><font color="#666666" size="2" face="Georgia, Times New Roman, Times, serif">
    <select name="turno2">
        <option value="turno='dia' OR turno='noite' OR turno='ND'" selected="selected">Todos</option>
        <option value="turno='dia'">Dia</option>
        <option value="turno='noite'">Noite</option>
        </select>
      </font><font color="#003366">
       
      </font></p></td>
  </tr>
  <tr bordercolor="#FFFFFF"> 
      <td>
    <font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Data Inicial</font>:</td>
 <td><input type="text" name="data_1" id="data_1" size="10" maxlength="10"/></td>
 </tr>
 <tr bordercolor="#FFFFFF"> 
 <td>
<font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Data Final</font>:</td>
  <td><input type="text" name="data_2" id="data_2" size="10" maxlength="10"/></td>
     </tr>
     <tr bordercolor="#FFFFFF"> 
      <td>
    <font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Pedido</font>:</td>
 <td><input type="text" name="numero_pedido" size="10" maxlength="12" /></td>
 </tr>

<tr bordercolor="#FFFFFF"> 
 <td>
    <font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Operador</font>:</td>
 <td>
     <?php
					echo "<select name='operador' class='combobox_padrao'>";
                    include "../../tp/conexao.php";
					$query= "SELECT * FROM usuarios WHERE sap_bko = 1 and bi <> 1 order by nome";
                    $result = mysql_query($query) or die (mysql_error());
                    echo "<option value='0'>Selecione...</option>";
					while($dado= mysql_fetch_array($result)){
                    echo "<option value=\"{$dado['login']}\">
                    {$dado['nome']}</option>";
				    }
    ?>
 </td>
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