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

	if($_SESSION["prioriza_erros"] == 0){  
    	
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
 window.history.go(-2); </script>\n;</script>";
exit;
}	
	 
 foreach($_POST["ling"] as $id)
{  

$sql1 = "SELECT * FROM base_erros WHERE id = '$id'";
$acao2 = mysql_query($sql1) or die (mysql_error());
while($dado=mysql_fetch_assoc($acao2))
	
           {
				$id_pn = $dado["id"];
				$soma= 1;
				$teste[] = $soma;			
				$num =array_sum($teste);
				
			}
    }

 
	    

?>
	     
    <p id="p_padrao">Você tem <?php echo "$num" ?> Solicitações pendente.

           
    <form name="form1" method="post" action="priorizar_pedido_erros3.php">
    <input name="tramite" type="hidden" value="<?php echo "$tramite" ?>" />
    <input name="turno2" type="hidden"  value="<?php echo "$turno2" ?>" />
    <input name="regional" type="hidden" id="regional" value="<?php echo "$regional" ?>" />
    <input name="login" type="hidden"  value="<?php echo $_SESSION["login"];?>" />
    
	   <table bgcolor="D6CA98" align="left" border="0">
        <tr>
        <td  id="t_td" width="3%"> 
        <input type="checkbox" name="checkbox" id="checkbox" value="1" onClick="return selecionar_todas(this.checked);" />
       </td> 
		<td id="t_td" width="18%">
        <strong><font color="#000000" size="2">Pedido</font></strong>
        </td>
        <td id="t_td" width="15%">
        <strong><font color="#000000" size="2">
        Data Cadastro</font></strong>
        </td>
		<td id="t_td" width="5%">
        <strong><font color="#000000" size="2">Regional</font></strong>
        </td>
        <td id="t_td" width="15%">
        <strong><font color="#000000" size="2">Motivo</font></strong>
		</td>
       	<td id="t_td" width="15%">
        <strong><font color="#000000" size="2">Data Tramite</font></strong>
        </td>
		<td id="t_td" width="3%">
        <strong><font color="#000000" size="2">tramite</font></strong>
        </td>  
        <td id="t_td" width="18%">
        <strong><font color="#000000" size="2">Operador</font></strong>
        </td>
         <td id="t_td" width="8%">
        <strong><font color="#000000" size="2">Turno</font></strong>
        </td>           
		</tr>
	  <?php 
  
 foreach($_POST["ling"] as $id)
{  
    
$sql = "SELECT * FROM base_erros WHERE  id = '$id' ORDER BY criado_em DESC";
$acao = mysql_query($sql,$conecta) or die (mysql_error());
       
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado=mysql_fetch_array($acao))
			{
				$id = $dado["id"];
				$pedido = $dado["pedido"];
				$tipo = $dado["tipo"];
				$portabilidade = $dado["portabilidade"];
				$cliente = $dado["cliente"];
				$status_do_pedido = $dado["status_do_pedido"];
				$revisao = $dado["revisao"];
				$regional = $dado["regional"];
				$criado_em = $dado["criado_em"];
				$alta = $dado["alta"];
				$troca = $dado["troca"];
				$transferencia_titularidade = $dado["transferencia_titularidade"];
				$data_correcao = $dado["data_correcao"];
				$adabas = $dado["adabas"];
				$id_tabelao = $dado["id_tabelao"];
				$fila = $dado["fila"];
				$status = $dado["status"];
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
				
				$criado_em2 = $data;
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


	
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}
			}
                  ?>
		 	 <tr align="left" bordercolor="#FFFFFF" bgcolor="#f5f5f5"> 
              <td> 
             <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id" ?>" checked readonly>
              </td>
             
                   </td>
             
                  	<td id="t_td1" bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $pedido ?></font></td>
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $criado_em2 ?></font></td>
                  	<td id="t_td1" bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $regional ?></font></td>
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $tipo ?></font></td> 
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $data_tramite3 ?></font></td>
				  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $tramite ?></font></td>
                    <td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $nome2 ?></font></td>
                    <td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $turno ?></font></td>
   		  </tr>
                    <?php }
		
	                         ?>
                             
         	<tr>
            <td colspan="3">                         
    <span id="spryselect1">
    <?php
					echo "<select name='operador' class='combobox_padrao'>";
                    include "../../tp/conexao.php";
					$query= "SELECT * FROM usuarios WHERE erros_bko = 1 and bi <> 1 order by nome";
                    $result = mysql_query($query) or die (mysql_error());
                    echo "<option value='0'>Selecione...</option>";
					while($dado= mysql_fetch_array($result)){
                    echo "<option value=\"{$dado['login']}\">
                    {$dado['nome']}</option>";
				    }
    ?>
    <br>
    <span class="selectInvalidMsg">Selecione um operador.</span><span class="selectRequiredMsg">Selecione um operador.</span></span>       		   
    	</td>	   
      <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        
        <td>
               
         <input type="button" name="Submit2" value="Cancelar" onClick="history.go(-2)"/><input type="submit" name="Submit" value="Priorizar" />
          
         </td>
        </table> 
        
        </form>
<p>
	     
        </div>
        
    </div>
    
</div>
</body>
</html>