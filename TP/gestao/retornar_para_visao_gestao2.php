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

	if($_SESSION["supervisor_gestao"] == 0){  
    	
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
 window.history.go(-2)\n;</script>";
exit;

}	
 

	 
 foreach($_POST["ling"] as $id_gestao)
{  

$sql1 = "SELECT * FROM base_gestao WHERE id_gestao= '$id_gestao'";
//echo $sql1;
$acao2 = mysql_query($sql1) or die (mysql_error());
while ($dado=mysql_fetch_array($acao2))
			{
				$id = $dado["id_gestao"];
				$soma= 1;
				$teste[] = $soma;			
				$num =array_sum($teste);
				
			}
//echo $id;
}

?>
	     
    <p id="p_padrao">Você tem <?php echo "$num" ?> Solicitações pendente.

           
    <form name="form1" method="post" action="retornar_para_visao_gestao3.php">
    <input name="tramite" type="hidden" value="<?php echo "$tramite" ?>" />
    <input name="turno2" type="hidden"  value="<?php echo "$turno2" ?>" />
    <input name="regional" type="hidden" id="regional" value="<?php echo "$regional" ?>" />
    <input name="login" type="hidden"  value="<?php echo $_SESSION["login"];?>" />
    
	   <table bgcolor="D6CA98" align="left" border="0">
        <tr>
        <td  id="t_td" width="3%"> 
        <input type="checkbox" name="checkbox" id="checkbox" value="1" onClick="return selecionar_todas(this.checked);" />
       </td> 
		<td id="t_td" width="16%">
        <strong><font color="#000000" size="2">Regional</font></strong>
        </td>
		<td id="t_td" width="20%">
        <strong><font color="#000000" size="2">Pedido</font></strong>
        </td>
        <td id="t_td" width="11%">
        <strong><font color="#000000" size="2">Revisão</font></strong>
		</td>
       	<td id="t_td" width="16%">
        <strong><font color="#000000" size="2">Término efetivo</font></strong>
        </td>
		<td id="t_td" width="16%">
        <strong><font color="#000000" size="2">Data trâmite</font></strong>
        </td>
        <td id="t_td" width="16%">
        <strong><font color="#000000" size="2">Tramite</font></strong>
        </td>
        <td id="t_td" width="16%">
        <strong><font color="#000000" size="2">Status_TQ</font></strong>
        </td>
        <td id="t_td" width="25%">
        <strong><font color="#000000" size="2">Operador</font></strong>
        </td>  
        <td id="t_td" width="23%">
        <strong><font color="#000000" size="2">Status</font></strong>
        </td>                  
		</tr>
	  <?php 
  
 foreach($_POST["ling"] as $id)
{  
    
$sql = "SELECT * FROM base_gestao WHERE fila <> 1 and id_gestao = '$id' ORDER BY termino_efetivo DESC";
$acao = mysql_query($sql,$conecta) or die (mysql_error());
       
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado=mysql_fetch_array($acao))
			{
				//$id_gestao       = $dado["id_gestao"];
				$regional        = $dado["regional"];
				$pedido          = $dado["pedido"];
				$revisao         = $dado["revisao"];
				$termino_efetivo = $dado["termino_efetivo"];
				$data_tramite    = $dado["data_tramite"];
				$tramite          = $dado["tramite"];
				$disc_status_tp   = $dado["disc_status_tp"];
				$nome2           = $dado["nome2"];
				$status           = $dado["status"];
				$id_gestao        = $dado["id_gestao"];
				
				//echo $id_gestao  ;
				?>
	
				<?php
				
	
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}
                $partes_da_data = explode(" ",$termino_efetivo);
				$data="$partes_da_data[0]";
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				$termino_efetivo = $data;
				
                $partes_da_data = explode(" ",$data_tramite);
				$data="$partes_da_data[0]";
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				$data_tramite = $data;
					
					
			}
                  ?>
		 	<tr align="left" bordercolor="#FFFFFF" bgcolor="#f5f5f5"> 
              <td> 
             <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id_gestao" ?>"checked readonly>
              </td>
             
                  	<td id="t_td1" bgcolor=<?php echo $cor ?>>
                    <font color="#000000" size="2"><?php echo $regional ?></font></td>
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $pedido ?></font></td>
                  	<td id="t_td1" bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $revisao ?></font></td>
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $termino_efetivo ?></font></td> 
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $data_tramite ?></font></td>
                    <td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $tramite ?></font></td>
                    <td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $disc_status_tp ?></font></td>
				  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
                    <font color="#000000" size="2"><?php echo $nome2 ?></font></td>
				  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
                    <font color="#000000" size="2"><?php echo $status?></font></td>
				  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
   		  </tr>
                    <?php }
					
					     
					        ?>
                             
         <tr>		   
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
		"window.location='retornar_para_visao_gestao.php?regional=<?php echo $regional ?>&tramite=<?php echo $tramite?>&turno2=<?php echo $turno2 ?>'"/><input type="submit" name="Submit" value="Retornar" />
          
         </td></tr>
        </table> 
        
        </form>
<p>
	     
        </div>
        
    </div>
    
</div>
</body>
</html>