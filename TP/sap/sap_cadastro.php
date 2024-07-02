<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<title>E-GTQ - Gestão  Tramite Qualidade</title>


<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=motivo]").html('<option value="0">Carregando...</option>');
            $.post("processa.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=motivo]").html(valor);
					 $teste=$ln['motivo'];	
				  }
                  )
         })
      })
</script>

</head>
<body id="logar">

<?php
	if($_SESSION["sap_bko"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
	
	include("../../tp/conexao.php");

$sql_user="SELECT * FROM usuarios WHERE login = '$login'";
$acao_op=mysql_query($sql_user,$conecta);
while($dado= mysql_fetch_array($acao_op)){
					    
$login = $dado["login"];
						}
//echo $login;

;
?>
  
<div id="principal">

    <div id="menu">
   <?php 
    include("../menu.php") ?>
    </div>
    
    <div id="caixa" style="height:460px;">
    
        <div id="conteudo">        
            <p id="p_padrao">SAP - Operador : <?php echo $_SESSION["nome"]; ?>.</p>

            <form action="sap_valida_cadastro.php" method="post">
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                        <td id="t_td">Tipo de solicitação </td>
                        <td colspan="3">
                      
      <span id="spryselect1">                  
   <select name="id_filtro" class="combobox_padrao" id="id_filtro">
       <option value="0">Selecione...</option>
        <?php
		 include '../conexao.php';
         $sql = "SELECT * FROM tipos_sap";
         $qr = mysql_query($sql) or die(mysql_error());
         while($ln = mysql_fetch_assoc($qr)){
         echo '<option value="'.$ln['id_filtro'].'">'.$ln['tipo'].'</option>';
         }
     	 ?>
    </select>
    <span class="selectInvalidMsg">Selecione um tipo válido.</span></span>
                    </td>
                    <td></td>
                	</tr>
                    <tr><td><br></td><td><br></td></tr>
                    <tr>
                        <td id="t_td">Pedido</td>
                        <td> <span id="sprytextfield1">
                      		<input name="pedido" type="text" class="textbox_padrao"  maxlength="20"><br>
                             <span class="textfieldMinCharsMsg">Pedido inválido.</span><span class="textfieldMaxCharsMsg">Pedido inválido.</span></span>
                        </td>
                        <td id="t_td">Adabas</td>
                        <td>
                       		<input name="adabas" type="text"  class="textbox_padrao" maxlength="20">
                        </td>
                    </tr>
                    <tr>
                    	<td id="t_td">OV</td>	
                    	<td><span id="sprytextfield2">
                    		<input name="ov" type="text"  class="textbox_padrao" maxlength="20"><br>
                            <span class="textfieldMinCharsMsg">OV inválida.</span><span class="textfieldMaxCharsMsg">OV inválida.</span></span>
                    	</td>
                         <td id="t_td">QTD Linhas (Pedido)</td>	
                    	<td>
                    		<input name="qtd_linhas_pedido" type="text"  class="textbox_padrao" maxlength="20">
                    	</td>
                    </tr>
	
                	<tr>
                    	<td id="t_td">Regional</td>
                    	<td><span id="spryselect2">   
                            <select name="regional" class="combobox_padrao">
                              <option value="0">Selecione...</option>
                            <option value="Norte">Norte</option>
                            <option value="Nordeste">Nordeste</option>
                            <option value="Leste">Leste</option>
                            <option value="SUL">Sul</option>
                            <option value="MG">MG</option>
                            <option value="CO/N">CO/N</option>
                            <option value="SP">SP</option>
                            </select>
                            <span class="selectInvalidMsg">Selecione uma regional válida.</span></span>
                    	</td>
                        <td id="t_td">Ofensor</td>
						<td><span id="spryselect3">
                            <select name="ofensor" class="combobox_padrao" >
                              <option value="0">Selecione...</option>
                            <option value="BKO">BKO</option>
                            <option value="Input">Input</option>
                            <option value="Logistica">Logistica	</option>
                            <option value="Sistema">Sistema</option>
                            </select>
                            <span class="selectInvalidMsg">Selecione um ofensor válido.</span></span>
                    	</td>
                        </td>
                	</tr>
	                
               		<tr>
                        <td id="t_td">Solicitado por</td>
                         <td>
                    		<input name="solicitado_por" type="text" size="25" maxlength="20"class="textbox_padrao">
                    	 </td>
               		
               		
                        <td id="t_td">Operador</td>
                        <td>
                    		<input name="operador" type="text" size="25" maxlength="20"class="textbox_padrao">
                    	</td>
                	</tr>
                    <tr>
                        <td id="t_td">Material antigo</td>
                        <td>
                    		<input name="material_antigo" type="text" size="25" maxlength="20"class="textbox_padrao">
                    	</td>
                	 	<td id="t_td">Tipo de OV</td>
                    
                        <td>
                    	    <select name="tipo_ov" class="combobox_padrao" >
                            <option  value=0 >Selecione...</option>
                            <option value="Venda">Venda</option>
                            <option value="Comodato">Comodato</option>
                            <option value="gai">GAI</option>
                            <option value="Doação">Doação</option>
                            </select>
                            
                    	</td>
                	</tr>
                    <tr>
                    <tr>
                        <td id="t_td">Código do cliente</td>
                        <td>
                    		<input name="codigo_do_cliente" type="text" size="25" maxlength="20"class="textbox_padrao">
                    	</td>
                        
                        <td id="t_td"></td>
                        <td>

                    	</td>
                     
                	</tr>
                	<tr>
                        <td id="t_td" >Motivo</td>
                        <td colspan="3"	>
                            <select name="motivo"  class="combobox_padrao_grande" >
                            <option value="Tipo de erro" >Selecione...</option>
                            
                            </select>
                    	</td>
                	</tr> 
                    <tr>
                        <td id="t_td" >Comentário</td>
                        <td colspan="3"	>
                              <textarea name="sap_comentario" id="sap_comentario" cols="56" rows="3"></textarea>
                        </td>
                	</tr>
					<tr align="center" >
                    	<td></td>
                    	<td colspan="1">
                    		<input name="enviar" type="submit" value="Enviar" class="botao_padrao" >
                 		</td>
                        <td>
                    		<input name="limpar" type="reset" value="Limpar" class="botao_padrao">
                    	</td>
                        <td><?php $login = $_SESSION["login"]; $nome = $_SESSION["nome"];?></td>
                	</tr>
                	</table>
                    
            </form>
        
        </div>
        
    </div>
    
</div>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"0", isRequired:false});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"0", isRequired:false});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {invalidValue:"0", isRequired:false});

var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:12, maxChars:15, validateOn:["blur", "change"], isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {minChars:10, maxChars:10, validateOn:["blur", "change"], isRequired:false});
</script>
</body>
</html>