<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<head>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php
	if($_SESSION["controle_atividades"] == 0){  
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
?>
  
<div id="principal">
       <div id="menu">
       <?php 
       //require_once("menu.php");
       include("../../tp/menu.php") ?>
       </div>
  
    <div id="caixa" style="height:280px;">
    
        <div id="conteudo">        
            <p id="p_padrao">Controle de atividades- Operador : <?php echo $_SESSION["nome"]; ?>.</p>

            <form action="pendentes_valida_cadastro.php" method="post">
			<table border="0" >
            <tr>
            	<td>
                Tipo de atividade:
                </td>
            	<td colspan="3">
               	  <span id="spryselect5">
                    <label for="tipo"></label>
                    <select name="tipo" class="combobox_padrao_grande" id="tipo">
                    <option value="0" selected="selected">Selecione</option>
					<option value="Erro de criação cliente/conta">Erro de criação cliente/conta</option>
                    <option value="Erro de ativação de serviço">Erro de ativação de serviço</option>
                    <option value="Não consta atividade de erro">Não consta atividade de erro</option>
                    <option value="Erro de ativação de linha">Erro de ativação de linha</option>
                    <option value="Erro de geração de OV">Erro de geração de OV</option>
                    </select><br>
		            <span class="selectInvalidMsg">Campo obrigatório.</span></span>
                
                </td>
            </tr>
            	
            
            <tr>
            	<td>
                Regional:
                </td>
            	<td>
                	<span id="spryselect2">
                    
                    <select name="regional" id="regional" class="combobox_padrao">
                    <option value="0" selected="selected">Selecione</option>
                    <option value="SUL">SUL</option>
                    <option value="NORTE">NORTE</option>
                    <option value="NORDESTE">NORDESTE</option>
                    <option value="LESTE">LESTE</option>
                    <option value="CO">CO</option>
                    <option value="MG">MG</option>
                    <option value="SP">SP</option>
                    </select><br>
		            <span class="selectInvalidMsg">Campo obrigatório.</span></span>
                
                </td>
              	 <td>Número do pedido</td>
            	 <td><span id="sprytextfield1">
			        <label for="pedido"></label>
			        <input type="text" name="pedido" id="pedido" class="textbox_padrao"/><br>
				    <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>
                </td>
            </tr>


            <tr>
            	<td>
                Solicitado Por:
                </td>
            	<td><span id="sprytextfield2">
			        <label for="solicitado_por"></label>
			        <input name="solicitado_por" type="text" class="textbox_padrao" id="solicitado_por" /><br>
				    <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>                
                </td>
              	<td>Ação</td>
            	<td>
               	  <span id="spryselect3">
                    <label for="acao"></label>
                    <select name="acao" class="combobox_padrao" id="acao">
                    <option value="0" selected="selected">Selecione</option>
                    <option value="Concluido">Concluido</option>
                    <option value="Cancelado">Cancelado</option>
                    </select><br>
		            <span class="selectInvalidMsg">Campo obrigatório.</span></span>
                </td>
            </tr>
            
            <tr>
                <td>Motivo</td>
            	<td colspan="3"	>
               	  <span id="spryselect4">
                    <label for="motivo_do_erro"></label>
                    <select name="motivo_do_erro" class="combobox_padrao_grande" id="motivo_do_erro">
                    <option value="0" selected="selected">Selecione</option>
                    <option value="Atividade concluída porém status permanece pendente">Atividade concluída porém status permanece pendente</option>
                    <option value="Não consta pistolagem no VIVO CORP">Não consta pistolagem no VIVO CORP</option>
                    <option value="Erro de comunicação entre SPN e VIVO CORP">Erro de comunicação entre SPN e VIVO CORP</option>
                    <option value="Pedido atendido por ordem manual">Pedido atendido por ordem manual</option>
                    <option value="Atividade Concluída">Atividade Concluída</option>
                    
                    <option value="Atividade Concluída">Falta de estoque</option>
                    <option value="Atividade Concluída">Cliente solicitou</option>
                    <option value="Atividade Concluída">PN negada</option>
                    <option value="Erro de input">Erro de input</option>
                    <option value="Reencerção de novo pedido">Reencerção de novo pedido</option>
                    </select><br>
		            <span class="selectInvalidMsg">Campo obrigatório.</span></span>
                </td>
            </tr>
            
            
                        <tr>
                <td>Comentario</td>
            	<td colspan="3"	><span id="sprytextarea1">
            	  <label for="comentario"></label>
            	  <textarea name="comentario" id="comentario" cols="56" rows="5"></textarea>
            	  <span class="textareaRequiredMsg">Campo obrigatório.</span></span>
               
                </td>
            </tr>
            
                        
            <tr>
            <td></td>
            <td><input type="submit" name="enviar" id="enviar" value="Enviar"class="botao_padrao"></td>
            <td><input type="reset" name="Reset" id="button" value="Reset" class="botao_padrao"/></td>
            <td></td>
            </tr>
            </table>    
            </form>
        
        </div>
        
    </div>
    
</div>
<script type="text/javascript">
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {invalidValue:"0", isRequired:false, validateOn:["change"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"0", isRequired:false, validateOn:["change"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {invalidValue:"0", isRequired:false, validateOn:["change"]});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {invalidValue:"0", isRequired:false, validateOn:["change"]});

var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur"]});
</script>
</body>
</html>