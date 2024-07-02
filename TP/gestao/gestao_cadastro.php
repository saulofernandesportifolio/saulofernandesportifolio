<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
</head>
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
</script>


<body id="logar">

<?php
	if($_SESSION["operador_gestao"] == 0){  
    	
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
?>
  
<div id="principal">

    <div id="menu">
   <?php include("../menu.php") ?>
    </div>
    
    <div id="caixa" style="height:460px;">
    
        <div id="conteudo">        
             <p id="p_padrao">Gestão - Operador : <?php echo $_SESSION["nome"]; ?>.</p>

            <form action="gestao_valida_cadastro.php" method="post">
              <table id="table_conteudo"  align="center" border="0">
              <tr>
                <td id="t_td">Pedido</td>
                <td><span id="sprytextfield1">
                  <label for="pedido"></label>
                  <input type="text" name="pedido" id="pedido"class="textbox_padrao" />
                <span class="textfieldRequiredMsg"><br />
                Campo obrigatório!</span></span></td>
                <td id="t_td">Regional</td>
                <td><span id="spryselect1">
                  <label for="regional"></label>
                <select name="regional" id="regional" class="combobox_padrao">
                  <option value="0">Selecione...</option>
                  <option value="LESTE">LESTE</option>
                  <option value="SUL">SUL</option>
                  <option value="NE">NE</option>
                  <option value="NORTE">NORTE</option>
                  <option value="SP">SP</option>
                  <option value="MG">MG</option>
                  </select>
                  <span class="selectInvalidMsg"><br />
                  Selecione uma opção válida!</span><span class="selectRequiredMsg">Selecione uma opção válida!</span></span></td>
              </tr>
              
              
              <tr>
              <td id="t_td">Revisão</td>
              <td id="t_td"><span id="sprytextfield2">
                <label for="revisao"></label>
                <input type="text" name="revisao" id="revisao" class="textbox_padrao"/>
                <span class="textfieldRequiredMsg"><br />
                Campo obrigatório!</span></span></td>
              <td id="t_td">Canal</td>
              <td id="t_td"><span id="spryselect5">
               <select name="canal" id="canal" class="combobox_padrao">
                 <option value="0" selected="selected">Selecione...</option>
                 <option value="VPG">VPG</option>
                 <option value="VPG GOV">VPG GOV</option>                 
               </select>
                <br />
                <span class="selectInvalidMsg"><br />
                  Selecione uma opção válida!</span><span class="selectRequiredMsg">Selecione uma opção válida!</span></span></td>
              </tr>
             
             <tr>
             <td id="t_td">Adabas</td>
             <td id="t_td"><span id="sprytextfield6">
               <label for="codigo_adabas"></label>
               <input type="text" name="codigo_adabas" id="codigo_adabas"class="textbox_padrao" />
               <br />
               <span class="textfieldRequiredMsg">Campo obrigatório!</span></span></td>
             <td id="t_td">Cliente</td>
             <td id="t_td"><span id="sprytextfield5">
               <label for="cliente"></label>
               <input type="text" name="cliente" id="cliente"class="textbox_padrao" />
               <span class="textfieldRequiredMsg"><br />
               Campo obrigatório!</span></span></td>
             </tr>
             
             <tr>
             <td id="t_td">Status Cliente</td>
             <td id="t_td"><span id="spryselect6">
               <select name="status_cliente" id="status_cliente" class="combobox_padrao">
                 <option value="0" selected="selected">Selecione...</option>
                 <option value="Aguardando Autorização PORTIN">Aguardando Autorização PORTIN</option>
                 <option value="Backoffice aprovado">Backoffice aprovado</option>
                 <option value="Cancelado">Cancelado</option>
                 <option value="Cancelado SEFAZ">Cancelado SEFAZ</option>
                 <option value="Concluído">Concluído</option>
                 <option value="Concluído Manualmente">Concluído Manualmente</option>
                 <option value="Executado parcialmente">Executado parcialmente</option>
                 <option value="Logistica concluída">Logistica concluída</option>
                 <option value="Portabilidade Negada">Portabilidade Negada</option>
                 <option value="Validando PORTIN">Validando PORTIN</option>                 
               </select>
                <br />
                <span class="selectInvalidMsg"><br />
                  Selecione uma opção válida!</span><span class="selectRequiredMsg">Selecione uma opção válida!</span></span></td>
             <td id="t_td">termino</td>
             <td id="t_td"><span id="sprytextfield7">
             <label for="termino_efetivo"></label>
             <input type="text" name="termino_efetivo" id="termino_efetivo"class="textbox_padrao"onKeyUp='Formatadata(this,event)' />
             <span class="textfieldRequiredMsg"><br />
             Campo obrigatório!</span><span class="textfieldInvalidFormatMsg"><br />
             Formato inválido!</span></span></td>
             </tr>
             
             <tr>
             <td id="t_td">Ação</td>
             <td id="t_td"><span id="sprytextfield8">
               <label for="acao"></label>
               <input type="text" name="acao" id="acao"class="textbox_padrao" />
               <span class="textfieldRequiredMsg"><br />
               Campo obrigatório!</span></span></td>
             <td id="t_td">Status</td>
             <td id="t_td"><span id="spryselect2">
               <label for="status"></label>
               <select name="status" id="status" class="combobox_padrao">
                 <option value="0" selected="selected">Selecione...</option>
                 <option value="Ja cadastrado">Já cadastrado</option>
                 <option value="Login criado">Login criado</option>
                 <option value="Nenhum registro encontrado">Nenhum registro encontrado</option>
               </select>
               <span class="selectInvalidMsg"><br />
               Selecione uma opção válida!</span><span class="selectRequiredMsg">Selecione uma opção válida!</span></span></td>
             </tr>
             
             <tr>
             <td id="t_td">E-Mail</td>
             <td id="t_td"><span id="sprytextfield9">
             <label for="email"></label>
             <input type="text" name="email" id="email" class="textbox_padrao"/>
             <span class="textfieldRequiredMsg"><br />
Campo obrigatório!</span><span class="textfieldInvalidFormatMsg">Email inválido!</span></span></td>
             <td id="t_td">GC</td>
             <td id="t_td">
               <label for="gc"></label>
               <input type="text" name="gc" id="gc"class="textbox_padrao" />
               </td>
             </tr>
             
             
             <tr>	
             <td id="t_td">Login</td>
             <td id="t_td"><span id="sprytextfield10">
               <label for="login"></label>
               <input type="text" name="login_gestao" id="login_gestao" class="textbox_padrao"/>
               <span class="textfieldRequiredMsg"><br />
               Campo obrigatório!</span></span></td>
             <td id="t_td">Senha</td>
             <td id="t_td"><span id="sprytextfield11">
               <label for="senha"></label>
               <input type="text" name="senha" id="senha" value="1234" class="textbox_padrao" />
               <br />
               <span class="textfieldRequiredMsg">Campo obrigatório!</span></span></td>
             </tr>
             
             <tr>	
             <td id="t_td">Comentário</td>
             <td id="t_td" colspan="3"><span id="sprytextarea1">
               <label for="comentario"></label>
               <textarea name="comentario" id="comentario" cols="56" rows="3"></textarea>
               <br />
               <span class="textareaRequiredMsg">Campo obrigatório!</span></span></td>

             </tr>
             
              <tr align="center" >
                <td></td>
                <td colspan="1"><input name="enviar"type="submit"value="Enviar"class="botao_padrao" /></td>
                <td><input name="limpar" type="reset" value="Limpar" class="botao_padrao" /></td>
                <td><?php $login = $_SESSION["login"]; $nome = $_SESSION["nome"];?></td>
              </tr>
              </table>
            </form>	
        
    	</div>
    </div>
    
</div>
            <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur", "change"], invalidValue:"0"});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {validateOn:["blur", "change"], invalidValue:"0"});
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6", {validateOn:["blur", "change"], invalidValue:"0"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur", "change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {validateOn:["blur", "change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["blur", "change"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "date", {format:"dd/mm/yyyy", validateOn:["blur", "change"]});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {validateOn:["blur", "change"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["change", "blur"], invalidValue:"0"});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "email", {validateOn:["blur", "change"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {validateOn:["blur", "change"]});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "none", {validateOn:["blur", "change"]});

var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur"]});
            </script>
</body>
</html>