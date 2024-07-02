<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../tp/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../../tp/SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../tp/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../tp/SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
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

function enviardados()
{

	if (document.dados.data_1.value=="")
	{
			alert( "Preencha o campo de data" );
			document.dados.data_1.focus();
			return false;
	}

	return true;
}

</script>
</head>
<body id="logar">

<?php
	if($_SESSION["operador_direto"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../../tp/logout.php');
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
    
    <div id="caixa" style="height:460px;">
    
        <div id="conteudo">        
          <form action="valida_cadastro_manual.php" method="post">
<table border="0">
<tr><td><br></td><td><br></td></tr>
                    <tr>
                        <td id="t_td">Pedido</td>
                        <td id="t_td"><span id="sprytextfield1">
                          <label for="pedido"></label>
                          <input type="text" name="pedido" id="pedido" class='textbox_padrao'>
                        <span class="textfieldRequiredMsg"><br />Campo obrigatório.</span></span></td>
                        
                      <td id="t_td">Revisão</td>
                        <td id="t_td"><span id="sprytextfield3">
                          <label for="revisao"></label>
                          <input type="text" name="revisao" id="revisao" class='textbox_padrao' >
                        <span class="textfieldRequiredMsg"><br />Campo obrigatório.</span></span></td>
                    </tr>
                    
                	<tr>
                    	<td id="t_td">Regional</td>
                    	<td id="t_td"><span id="spryselect1">
                          <select name="regional" class='textbox_padrao'>
                              <option value="0">Selecione...</option>
                            <option value="Norte">Norte</option>
                            <option value="Leste">Leste</option>
                            <option value="SUL">Sul</option>
                            <option value="MG">MG</option>
                            <option value="NE">NE</option>
                            <option value="CO/N">CO/N</option>
                            <option value="SP">SP</option>
                            </select>
                          <span class="selectInvalidMsg"><br />Campo obrigatório.</span><span class="selectRequiredMsg">Campo obrigatório.</span></span></td>
                        
                 
                        
                      <td id="t_td">Criado em</td>
					  <td><span id="sprytextfield2">
					    <label for="criado_em"></label>
					    <input type="text" name="criado_em" id="criado_em" maxlength='10'class='textbox_padrao' onKeyUp='Formatadata(this,event)'/>
				      <span class="textfieldRequiredMsg"><br />Campo obrigatório.</span></span></td>
                        </td>
                	</tr>
	                
               		
                    <tr>
                    <tr>
                        <td id="t_td">Cliente</td>
                        <td> <span id="sprytextfield4">
                    	<input name="cliente" type="text" size="25" maxlength="20" class="combobox_padrao"><span class="textfieldRequiredMsg"><br />Campo obrigatório.</span></span>
                   	  </td>
                        
                        <td id="t_td">Ilha/GC</td>
                        <td><span id="spryselect2">
                          <select name="ilha" class='textbox_padrao'>
                              <option value="0">Selecione...</option>
                            <option value="ILHA">ILHA</option>
                            <option value="GC">GC</option>
                            </select>
                          <span class="selectInvalidMsg"><br />Campo obrigatório.</span><span class="selectRequiredMsg">Campo obrigatório.</span></span>

                    	</td>
                     
                	</tr>
                		
                    <tr>
                        <td id="t_td" >Comentário</td>
                        <td colspan="3"	><span id="sprytextarea1">
                          <label for="comentario"></label>
                          <textarea name="comentario" id="comentario" cols="56" rows="5"></textarea>
                          <span class="textareaRequiredMsg"><br />
                        Campo obrigatório.</span></span>
                      </td>
                	</tr>
                    <tr>
                    <td>Priorizar para: </td>
                    <td>
                    <?php
					echo "<select name='operador' class='combobox_padrao'>";
                    include "../../tp/conexao.php";
					$query= "SELECT * FROM usuarios WHERE operador_direto = 1 and bi <> 1 order by nome";
                    $result = mysql_query($query) or die (mysql_error());
                    echo "<option value='0'>Nenhum</option>";
					while($dado= mysql_fetch_array($result)){
                    echo "<option value=\"{$dado['login']}\">
                    {$dado['nome']}</option>";
				    }
    ?>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"0"});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"0"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>
</body>
</html>