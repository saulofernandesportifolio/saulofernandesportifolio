<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">

<?php
	if($_SESSION["SUP_SAP"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
?>
  
<?php 

$id1 = $id_sap;

//Pesquisa e retorna os campos declarado nas variáveis.
        include("../conexao.php");
		
		if($id1 = $id_sap)
		{
                 $sql_pn = "select * from diario_sap_bko WHERE id_sap ='$id1'";
		         $result = mysql_query($sql_pn,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $id_sapa = $dado["id_sap"];
				 $pedido = $dado["pedido"];
				 $adabas = $dado["adabas"];
				 $ov = $dado["ov"];
				 $qtde_linhas_pedido = $dado["qtde_linhas_pedido"];
				 $regional = $dado["regional"];
				 $ofensor = $dado["ofensor"];
				 $solicitado_por = $dado["solicitado_por"];
				 $operador = $dado["operador"];
				 $material_antigo = $dado["material_antigo"];
				 $cliente = $dado["cliente"];
				 $tipo_de_solicitacao = $dado["tipo_de_solicitacao"];
				 $motivo = $dado["motivo"];
				 $data_cadastro = $dado["data_cadastro"];
				 $tipo_ov = $dado["tipo_ov"];
				 $qtde_linhas_ov = $dado["qtde_linhas_ov"];
				 $nova_ov = $dado["nova_ov"];
                 $material_novo = $dado["material_novo"];
				 $comentario = $dado["comentario"];
				 }
		}
		else 
		{
			echo "id diferente";
		}
   // $_SESSION["id_sap"] = $id1;
	$data_cadastro = explode('-', $data_cadastro);
	$data_cad = $data_cadastro[2].'/'.$data_cadastro[1].'/'.$data_cadastro[0];

 ?>  
  
<div id="principal">

    <div id="menu">
   <?php include("../menu.php") ?>
    </div>
    
    <div id="caixa" style="height:610px;">
    
        <div id="conteudo" >
        
            <p id="p_padrao">SAP - Operador : <?php echo $_SESSION["nome"]; ?>.</p>
            
            <form action="sap_update_cadastro.php" method="post">
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                        <td id="t_td">Tipo de solicitação </td>
                        <td id="t_td">
                      	<?php echo "$tipo_de_solicitacao" ?>
                        </td>
                        <td></td>
                	</tr>
                    <tr><td><br></td><td><br></td></tr>
                    <tr>
                        <td id="t_td">Pedido</td>
                        <td id="t_td">
                      	<?php echo "$pedido" ?>
                        </td>
                        <td id="t_td">Adabas</td>
                        <td id="t_td">
                       <input name="adabas" type="text"  class="input" value="<?php echo "$adabas" ?>" maxlength="10">
                        </td>
                    </tr>
                    <tr>
                    	<td id="t_td">OV</td>	
                        <td id="t_td">
                       		<?php echo "$ov" ?>
                        </td>
                         <td id="t_td">Nova OV</td>	
                    	<td>
                    		<input name="nova_ov" type="text"  class="input" value="<?php echo "$nova_ov" ?>" maxlength="10">
                    	</td>
                    </tr>
                    <tr>
                    	<td id="t_td">QTD Linhas (Pedido)</td>
                    	<td id="t_td">
                    	<input name="qtde_linhas_pedido" type="text" value="<?php echo "$qtde_linhas_pedido" ?>"  size="25" maxlength="10"class="input">
                    	</td>
                    	<td id="t_td">QTD Linhas (OV)</td>
                    	<td>
                    		<input name="qtde_linhas_ov" type="text" value="<?php echo "$qtde_linhas_ov" ?>"  size="25" maxlength="10"class="input">
                    	</td>
                    </tr>	
                	<tr>
                    	<td id="t_td">Regional</td>
                    	<td id="t_td">
                    		<?php echo "$regional" ?>
                    	</td>
                       
                        <td id="t_td">Ofensor</td>
                    	<td id="t_td">
                    	<input name="ofensor" type="text" value="<?php echo "$ofensor" ?>"  size="25" maxlength="10"class="input">
                    	</td>
                        </td>
                	</tr>
	                
               		<tr>
                        <td id="t_td">Solicitado por</td>
                    	<td id="t_td">
                    		<?php echo "$solicitado_por" ?>
                    	</td>
               		
               		
                        <td id="t_td">Operador</td>
                    	<td id="t_td">
                    	<input name="operador" type="text" value="<?php echo "$operador" ?>"  size="25" maxlength="10"class="input">
                    	</td>
                	</tr>
                    <tr>
                        <td id="t_td">Material antigo</td>
                    	<td id="t_td">
                    		<input name="material_antigo" type="text" value="<?php echo "$material_antigo" ?>"  size="25" maxlength="20"class="input">
                    	</td>
                	<td id="t_td">Material novo</td>
                        <td>
<input name="material_novo" type="text" value="<?php echo "$material_novo" ?>"  size="25" maxlength="20"class="input">
                    	</td>
                	</tr>
                    
                    <tr>
                        <td id="t_td">Código do cliente</td>
                    	<td id="t_td">
                    	<input name="cliente" type="text" value="<?php echo "$cliente" ?>"  size="25" maxlength="20"class="input">
                    	</td>
                	
                    
                        <td id="t_td">Data de cadastro</td>
                        <td id="t_td">
              			 <?php echo "$data_cad" ?>
                    	</td>
                	</tr>
                    <tr>
                    <tr>
                        <td id="t_td">Tipo de OV</td>
                    	<td id="t_td">
                    		<input name="tipo_ov" type="text" value="<?php echo "$tipo_ov" ?>"  size="25" maxlength="20"class="input">
                    	</td>
                	
                    
                         <td id="t_td">Chamado</td>
                    	<td id="t_td">
                    		<input name="0" value="" type="text" size="25" maxlength="10"class="input">
                    	</td>
                	</tr>
                    <tr>
                        <td id="t_td">Motivo</td>
                    	<td id="t_td" colspan="3">
                    		<?php echo "$motivo" ?>
                    	</td>

                	</tr>
                    <tr>
                        <td id="t_td" >Comentário</td>
                        <td colspan="3"	>
			<textarea name="comentario_antigo" readonly readonlycols="56" style="width:470" rows="3"><?php echo $comentario; ?>
            </textarea>
                        </td>
                	</tr>
                    <tr>
                        <td id="t_td" >Novo Comentário</td>
                        <td colspan="3"	>
                    
										    <span id="sprytextfield1">
  						<label for="text1"></label>
 						<input type="text" style='width:470' name="comentario_novo" id="comentario_novo">
 					    <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>

                        </td>
                	</tr>
                    <tr><td><br></td></tr>
               	  <tr>
                        <td id="t_td">Status</td>
                        <td>
                            <select name="status_tp" class="combo_padrao" >
                            <option value="2">Pendente</option>
                            <option value="3">Corrigido</option>
                            </select>
                    	</td>
                	</tr>
                    <tr>
                        <td><br></td>
                        <td><input name="id_sap" style="visibility:hidden" type="text"  class="input" value="<?php echo "$id1" ?>" maxlength="10"></td>
                	</tr>
                	<tr align="center" >
                    	<td></td>
                    	<td colspan="1">
                    		 <input type="button" name="Submit2" value="Voltar" class="botao_padrao" onClick="window.location='pedido_sap_bko_sup.php'">
                 		</td>
                        <td>
                    	
                    	</td>
                        <td><?php $login = $_SESSION["login"]; $nome = $_SESSION["nome"];?></td>
                  </tr>
                </table>
                <?php "$id1" ?>
            </form>
        
        </div>
        
    </div>
    
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>