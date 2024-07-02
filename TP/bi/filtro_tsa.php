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

	if($_SESSION["bi"] == 0 && $_SESSION["tsa"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
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
        
            <p id="p_padrao">B.I - Usuário: <?php echo $nome; ?>.</p><br>
           
           
    <?php        
   include "../conexao.php";
	$tempo = 0;

	 set_time_limit($tempo);
 	date_default_timezone_set("Brazil/East");
	$data_dia= date("y/m/d"); 
	?>
<form name="form1" method="post" action="gerar_excel_tsa.php">
<input name="login" type="hidden"  value="<?php echo $_SESSION["login"];?>" />

<p>&nbsp;</p>
<p>&nbsp;</p>
  <table border="1" align="center">
  <tr bordercolor="#FFFFFF"> 
      <td width="100%" colspan="4"> 
        <div align="center">
          <hr noshade="noshade" />
          <font color="#000000" size="2" face="Arial, Helvetica, sans-serif" class="regra2"><strong>FILTRO TSA</strong></font> 
          <hr noshade="noshade" />
        </div>
      </td>
  </tr>
  <tr bordercolor="#FFFFFF"> 
      <td width="100%" colspan="4"> 
        <div align="center">
        <hr noshade="noshade" />
          <font color="#000000" size="2" face="Arial, Helvetica, sans-serif" class="regra2"><strong>SELECIONE 
          O FILTRO </strong></font> 
          <hr noshade="noshade" />
      </div>
      </td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td width="20%" colspan="2" id="t_td">Ação</td>
    <td width="80%" colspan="2">
        <select name="acao" class="combobox_padrao" id="acao">
            <option value="%">Tudo</option>
            <?php
    		 include '../conexao.php';
             $sql = "SELECT opcao FROM tp.tsa_menu WHERE indice = 'Ação';";
             $qr = mysql_query($sql) or die(mysql_error());
             while($ln = mysql_fetch_assoc($qr)){
             echo '<option value="'.$ln['opcao'].'">'.$ln['opcao'].'</option>';
             }
         	 ?>
        </select>
    </td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td width="20%" colspan="2" id="t_td">Erro</td>
    <td width="80%" colspan="2">               
        <select name="erro" class="combobox_padrao" id="erro" >
            <option value="%">Todos</option>
            <?php
    		 include '../conexao.php';
             $sql = "SELECT indice FROM tp.tsa_menu WHERE classe = 'erro' GROUP BY indice;";
             $qr = mysql_query($sql) or die(mysql_error());
             while($ln = mysql_fetch_assoc($qr)){
             echo '<option value="'.$ln['indice'].'">'.$ln['indice'].'</option>';
             }
         	 ?>
        </select>
    </td>
  </tr>
   <tr bordercolor="#FFFFFF">
    <td width="20%" colspan="2" id="t_td">Análise BKO</td>
    <td width="80%" colspan="2">
        <select name="analise_bko" class="combobox_padrao" id="analise_bko">
            <option value="%">Tudo</option>
            <?php
    		 include '../conexao.php';
             $sql = "SELECT opcao FROM tp.tsa_menu WHERE indice = 'Análise BKO';";
             $qr = mysql_query($sql) or die(mysql_error());
             while($ln = mysql_fetch_assoc($qr)){
             echo '<option value="'.$ln['opcao'].'">'.$ln['opcao'].'</option>';
             }
         	 ?>
        </select>
    </td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td id="t_td" colspan="4"><center>Data da auditoria:</center></td>
  </tr>
  <tr bordercolor="#FFFFFF">
    <td width="30%" id="t_td">Data inicial:</td>
    <td width="20%"><input type="text" name="data_1" id="data_1" size="10" maxlength="10"/></td>

    <td width="30%" id="t_td"><p align="right">Data Final: </p></td>
    <td width="20%"><input type="text" name="data_2" id="data_2" size="10" maxlength="10"/></td>
 </tr>    
 <tr bordercolor="#FFFFFF"> 
    <td colspan="4"> 
    <div align="center" class="regra2">
    <hr noshade="noshade" />
    <input type="submit" name="Submit" value="Gerar Base" />
    <input type="button" name="Submit2" value="Cancelar" onClick="window.location='relatorios.php'" />
    </div></td>
 </tr>
</table>
<p>&nbsp;</p>

</form>
    </div>
      
        
  </div>
     
</div>
<?php
$filename = '../../TP/bi/relatorios/Base_SAP.xls';

if (file_exists($filename)) {
   // echo "O arquivo $filename existe";
	unlink("relatorios/Base_SAP.xls");
} else {
   // echo "O arquivo $filename não existe";
}
?>

</body>
</html>