<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E - GTQ - Gestão Tramite Qualidade</title>
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
        
            <p id="p_padrao">Operador - &nbsp; <?php echo $nome; ?>.</p><br>
           <p id="p_padrao" align="center">Priorizar pedido.</p>
    <?php        
   include "../conexao.php";
   
 	$tempo = 0;

	 set_time_limit($tempo);
 	date_default_timezone_set("Brazil/East");
	$data_dia= date("y/m/d");

$consulta = $_SESSION["sql_consulta"];
//echo $consulta;
$sql = $consulta;

$acao = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($acao);


?>
	     
    <p id="p_padrao">Você tem <?php echo "$num" ?> Solicitações pendente.

           
    <form name="form1" method="post" action="priorizar_pedido_2.php">
    <input name="tramite" type="hidden"  value="<?php echo "$tramite" ?>" />
    <input name="turno2" type="hidden"  value="<?php echo "$turno2" ?>" />
    <input name="regional" type="hidden" id="regional" value="<?php echo "$regional" ?>" />
    <input name="login" type="hidden"  value="<?php echo $_SESSION["login"];?>" />
   	         
		<table bgcolor="D6CA98" align="left" border="0">
        <tr>
        <td  id="t_td" width="3%"> 
        <input type="checkbox" name="checkbox" id="checkbox" value="1" onClick="return selecionar_todas(this.checked);" />
       </td> 
		<td id="t_td" width="15%">
        <strong><font color="#000000" size="2">Pedido</font></strong>
        </td>
        <td id="t_td" width="5%">
        <strong><font color="#000000" size="2">Regional</font></strong>
        </td>
		<td id="t_td" width="20%">
        <strong><font color="#000000" size="2">Tipo</font></strong>
        </td>

       	<td id="t_td" width="5%">
        <strong><font color="#000000" size="2">Linhas</font></strong>
        </td>
		<td id="t_td" width="15%">
        <strong><font color="#000000" size="2">Criado Em</font></strong>
        </td> 
        		<td id="t_td" width="55%">
        <strong><font color="#000000" size="2">Cliente</font></strong>
        </td>              
		</tr>
	 <?php         
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado=mysql_fetch_array($acao))
			{	
				$id           = $dado["id"];
				$pedido       = $dado["pedido"];
				$regional     = $dado["regional"];
				$tipo         = $dado["tipo"];
				$linhas       = $dado["linhas"];
				$criado_em    = $dado["criado_em"];
				$cliente      = $dado["cliente"];
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
             <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id" ?>">
              </td>
             
                  	<td id="t_td1" bgcolor=<?php echo $cor ?>>
                    <font color="#000000" size="2"><?php echo $pedido ?></font></td>
                    
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $regional ?></font></td>
                    
                  	<td id="t_td1" bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $tipo ?></font></td>
                    
                  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>					
					<font color="#000000" size="2"><?php echo $linhas ?></font></td>
                    
				  	<td id="t_td1"  bgcolor=<?php echo $cor ?>>
					<font color="#000000" size="2"><?php echo $criado_em ?></font></td>
                    
                    <td id="t_td1"  bgcolor=<?php echo $cor ?>>
                    <font color="#000000" size="2"><?php echo $cliente ?></font></td>
                    
                    
   		  </tr>
                   <?php }?>
                  
                   
        <tr>
        <td></td>
        <td></td>
        <td></td>
        
<td></td><td></td>
        <td> </td>
        <td>
          <input type="button" name="Submit2" value="Voltar" onClick="window.location='erros_fila_prioriza.php'"/><input type="submit" name="Submit" value="Avançar" />
          </td>
          </tr>
       
      </table>
          
         </form>
    </div>
      
        
  </div>
     
</div>

</body>
</html>