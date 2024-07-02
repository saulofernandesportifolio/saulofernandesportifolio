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

	if($_SESSION["SUP_PN"] == 0){  
    	
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
	
$data_1 = substr($data_1,6,4)."/".substr($data_1,3,2)."/".substr($data_1,0,2);

if($data_2 <> '')
{
	$data_2 = substr($data_2,6,4)."/".substr($data_2,3,2)."/".substr($data_2,0,2);
}

else
{

	$data_2 = date("Y/m/d");
}	
	
if (empty($_POST["regional"]))
{
echo "<script>alert('Nenhum regional selecionado.'); document.location.replace('filtro_retornar_para_visao_pn.php'); </script>\n";
exit;
}
if (empty($_POST["tramite"]))
{
echo "<script>alert('Nenhuma tramite selecionada.'); document.location.replace('filtro_retornar_para_visao_pn.php'); </script>\n";
exit;
}
if (empty($_POST["turno2"]))
{
echo "<script>alert('Nenhuma turno selecionada.'); document.location.replace('filtro_retornar_para_visao_pn.php'); </script>\n";
exit;
}	

$regional = $_POST['regional']; 
$tramite = $_POST["tramite"];
$turno=$_POST["turno2"];

if($data_1 <> ''){
$sql_consulta="SELECT * FROM controle_pn_bko WHERE ($regional) and ($tramite) and ($turno) and data_inicial BETWEEN '$data_1' and '$data_2' ORDER BY data_inicial";
$sql=$sql_consulta; 
$acao = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($acao);
}

if($data_1 == ''){
$sql_consulta="SELECT * FROM controle_pn_bko WHERE ($regional) and ($tramite) and ($turno) and data_inicial BETWEEN '$data_1' and '$data_2' ORDER BY data_inicial";
$sql=$sql_consulta; 
$acao = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($acao);
}

if($numero_pedido <> 0){
$sql_consulta="SELECT * FROM controle_pn_bko WHERE numero_pedido='$numero_pedido' ORDER BY data_inicial";
$sql=$sql_consulta; 
$acao = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($acao);
}

if($operador <> '0'){
$sql_consulta="SELECT * FROM controle_pn_bko WHERE ($regional) and ($tramite) and ($turno) and data_inicial BETWEEN '$data_1' and '$data_2' and login = '$operador' ORDER BY data_inicial";
$sql=$sql_consulta; 
$acao = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($acao);
}

if($num <= 0)
{
echo "<script>alert('Nenhum pedido com este status.'); document.location.replace('filtro_retornar_para_visao_pn.php'); </script>\n";
exit;
}
//echo $sql;
?>
 
    <p id="p_padrao">Você tem <?php echo "$num" ?> Solicitações pendente.
          
    <form name="form1" method="post" action="retornar_para_visao_pn2.php">
    <input name="tramite" type="hidden"  value="<?php echo "$tramite" ?>" />
    <input name="turno2" type="hidden"  value="<?php echo "$turno2" ?>" />
    <input name="regional" type="hidden" id="regional" value="<?php echo "$regional" ?>" />
    <input name="login" type="hidden"  value="<?php echo $_SESSION["login"];?>" />
   	         
		<table bgcolor="D6CA98" align="left" border="0">
        <tr>
        <td  id="t_td" width="3%"> 
        <input type="checkbox" name="checkbox" id="checkbox" value="1" onClick="return selecionar_todas(this.checked);" />
       </td> 
		<td id="t_td" width="35%">
        <strong><font color="#000000" size="2">Pedido</font></strong>
        </td>
        <td id="t_td" width="4%">
        <strong><font color="#000000" size="2">
        Data inicial</font></strong>
        </td>
		<td id="t_td" width="5%">
        <strong><font color="#000000" size="2">Regional</font></strong>
        </td>
        <td id="t_td" width="25%">
        <strong><font color="#000000" size="2">Status Pedido</font></strong>
		</td>
       	<td id="t_td" width="5%">
        <strong><font color="#000000" size="2">Data Tramite</font></strong>
        </td>
		<td id="t_td" width="3%">
        <strong><font color="#000000" size="2">tramite</font></strong>
        </td>  
        <td id="t_td" width="23%">
        <strong><font color="#000000" size="2">Operador</font></strong>
        </td>
         <td id="t_td" width="23%">
        <strong><font color="#000000" size="2">Turno</font></strong>
        </td>                 
		</tr>
	 <?php         
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado=mysql_fetch_array($acao))
			{
				$id_pn = $dado["id_pn"];
				$regional = $dado["regional"];
				$data_inicial = $dado["data_inicial"];
				$numero_pedido = $dado ["numero_pedido"];
				$revisao = $dado["revisao"];
				$status_pedido = $dado["status_pedido"];
				$nome_cliente = $dado ["nome_cliente"];
				$ultima_atualizacao_status = $dado["ultima_atualizacao_status"];
				$codigo_adabas = $dado["codigo_adabas"];
				$cpf_cnpj_cliente = $dado["cpf_cnpj_cliente"];
                $canal = $dado["canal"];
				$pn = $dado["pn"];
				$nome2 = $dado["nome2"];
				$tramite = $dado["tramite"];
				$data_tramite2 = $dado["data_tramite2"];
				$turno = $dado["turno"];
				
				//VARIAVEL COM A DATA NO FORMATO AMERICANO
				$data_americano = "$data_inicial";

				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_inicial2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
				
				if( $data_tramite2 == 0000-00-00)
				{
					$data_tramite3 = "";
				}
				else
				{				
				$data_americano2 = "$data_tramite2";
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data2 = explode(" ",$data_americano2);
				$data2="$partes_da_data2[0]";
				
				$datatransf2 = explode("-",$data2);
				$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
				//$datacompleta = $data;
				
				$data_tramite3 = $data2;
				//$linha['visao_ilha']=$visao_ilha2;
				}
				?>
	
				<?php
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}
                  ?>
		 	 <tr align="left" bordercolor="#FFFFFF" bgcolor="#f5f5f5"> 
              <td> 
             <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id_pn" ?>">
              </td>
             
                  	<td id="t_td1" bgcolor=<?php echo $cor ?>>
                    <font color="#000000" size="2"><?php echo $numero_pedido ?></font></td>
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $data_inicial2 ?></font></td>
                  	<td id="t_td1" bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $regional ?></font></td>
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $status_pedido ?></font></td> 
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $data_tramite3 ?></font></td>
				  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $tramite ?></font></td>
                    <td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $nome2 ?></font></td>
                    <td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $turno ?></font></td>
   		  </tr>
                   <?php }?>
                  
                   
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td> </td>
        <td>
          <input type="button" name="Submit2" value="Voltar" onClick="window.location='filtro_retornar_para_visao_pn.php'"/><input type="submit" name="Submit" value="Avançar" />
          </td>
          </tr>
       
          </table>
          
         </form>
    </div>
      
        
  </div>
     
</div>

</body>
</html>