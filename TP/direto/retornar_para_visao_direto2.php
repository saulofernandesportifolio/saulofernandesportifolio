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

	if($_SESSION["supervisor_direto"] == 0){  
    	
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
        
            <p id="p_padrao">Supervisão - &nbsp; <?php echo $nome; ?>.</p><br>
           <p id="p_padrao" align="center">Retornar para Visão do operador.</p>
    <?php        
   include "../conexao.php";
   
  /* echo $tramite;
   echo "<br>";
   echo $turno2;
    echo "<br>";
	 echo $regional;
    echo "<br>";*/
   
   
	$tempo = 0;

	 set_time_limit($tempo);
 	date_default_timezone_set("Brazil/East");
	$data_dia= date("y/m/d");
	
if (empty($_POST["ling"]))
{
echo "<script>alert('Nenhuma atividade selecionada.'); 
 window.history.go(-2)\n;</script>";
exit;

}	
 

	 
 foreach($_POST["ling"] as $id)
{  

$sql1 = "SELECT * FROM ilha_reversao_direto_bko WHERE id_reversaoind = '$id'";
$acao2 = mysql_query($sql1) or die (mysql_error());
while ($dado=mysql_fetch_array($acao2))
			{
				$id_reversaoind = $dado["id_reversaoind"];
				$soma= 1;
				$teste[] = $soma;			
				$num =array_sum($teste);
				
			}

}

?>
	     
    <p id="p_padrao">Você tem <?php echo "$num" ?> Solicitações pendente.

           
    <form name="form1" method="post" action="retornar_para_visao_direto3.php">
    <input name="tramite" type="hidden" value="<?php echo "$tramite" ?>" />
    <input name="turno2" type="hidden"  value="<?php echo "$turno2" ?>" />
    <input name="regional" type="hidden" id="regional" value="<?php echo "$regional" ?>" />
    <input name="login" type="hidden"  value="<?php echo $_SESSION["login"];?>" />
    
	   <table bgcolor="D6CA98" align="left" border="0">
              <tr>
        <td  id="t_td" width="3%"> 
        <input type="checkbox" name="checkbox" id="checkbox" value="1" onClick="return selecionar_todas(this.checked);" />
       </td> 
        <td id="t_td" width="17%">
        <strong><font color="#000000" size="2">Pedido</font></strong>
        </td>
        <td id="t_td" width="17%">
        <strong><font color="#000000" size="2">Revisao</font></strong>
        </td>
        <td id="t_td" width="8%">
        <strong><font color="#000000" size="2">Criado Em</font></strong>
        </td>
		<td id="t_td" width="5%">
        <strong><font color="#000000" size="2">Regional</font></strong>
        </td>

       	<td id="t_td" width="5%">
        <strong><font color="#000000" size="2">Data Tramite</font></strong>
        </td>
		<td id="t_td" width="3%">
        <strong><font color="#000000" size="2">Tramite</font></strong>
        </td> 
        <td id="t_td" width="3%">
        <strong><font color="#000000" size="2">Status</font></strong>
        </td>  
        <td id="t_td" width="25%">
        <strong><font color="#000000" size="2">Operador</font></strong>
        </td>
         <td id="t_td" width="5%">
        <strong><font color="#000000" size="2">Turno</font></strong>
        </td>                                 
		</tr>
	  <?php 
  
 foreach($_POST["ling"] as $id)
{  
    
$sql = "SELECT * FROM ilha_reversao_direto_bko WHERE id_reversaoind = '$id' ORDER BY criado_em DESC";
$acao = mysql_query($sql,$conecta) or die (mysql_error());
       
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado=mysql_fetch_array($acao))
			{
				$id_reversaoind = $dado["id_reversaoind"];
				$regional = $dado["regional"];
				$criado_em = $dado["criado_em"];
				$pedido = $dado ["pedido"];
				$revisao = $dado["revisao"];
				//$status_pedido = $dado["status_pedido"];
				//$nome_cliente = $dado ["nome_cliente"];
				//$ultima_atualizacao_status = $dado["ultima_atualizacao_status"];
				$codigo_adabas = $dado["codigo_adabas"];
				//$cpf_cnpj_cliente = $dado["cpf_cnpj_cliente"];
               // $canal = $dado["canal"];
				//$pn = $dado["pn"];
				$disc_status_tp= $dado["disc_status_tp"];
				$nome2 = $dado["nome2"];
				$tramite = $dado["tramite"];
				$data_tramite = $dado["data_tramite"];
				$turno = $dado["turno"];
				
				//VARIAVEL COM A DATA NO FORMATO AMERICANO
				$data_americano = "$criado_em";

				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_inicial2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
				
				if( $data_tramite == 0000-00-00)
				{
					$data_tramite3 = "";
				}
				else
				{				
				$data_americano2 = "$data_tramite";
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
			}
                  ?>
		 	 <tr align="left" bordercolor="#FFFFFF" bgcolor="#f5f5f5"> 
              <td> 
             <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id_reversaoind" ?>"checked readonly>
              </td>
             
                  	<td id="t_td1" bgcolor=<?php echo $cor ?>>
                    <font color="#000000" size="2"><?php echo $pedido ?></font></td>
                    <td id="t_td1" bgcolor=<?php echo $cor ?>>
                    <font color="#000000" size="2"><?php echo $revisao ?></font></td>
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $data_inicial2 ?></font></td>
                  	<td id="t_td1" bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $regional ?></font></td>
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					
					<font color="#000000" size="2"><?php echo $data_tramite3 ?></font></td>
				  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $tramite ?></font></td>
                    <td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $disc_status_tp ?></font></td>
                    <td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $nome2 ?></font></td>
                    <td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $turno ?></font></td>
   		  </tr>
                    <?php }
					
					     
					        ?>
                             
         		   
      <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <input type="button" name="Submit2" value="Voltar" onClick=
        <?php 
		$regional="0";
		$tramite="0";
		$turno2 ="0";
		?>
		"window.location='retornar_para_visao_direto.php?regional=<?php echo $regional ?>&tramite=<?php echo $tramite?>&turno2=<?php echo $turno2 ?>'"/><input type="submit" name="Submit" value="Retornar" />
          
         </td>
        </table> 
        
        </form>
<p>
	     
        </div>
        
    </div>
    
</div>
</body>
</html>