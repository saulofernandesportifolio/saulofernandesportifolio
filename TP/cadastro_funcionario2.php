<?php   
@session_start(); 

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>TQ</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">



<?php
//Testa se o perfil está correto.

$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];

 

	if($_SESSION["valida"] <> 1){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('index.php');
			</script>
 		";
	}

?>

<div id="principal">
    <div id="menu">
<?php 
    include("../tp/menu.php") ?>
    </div>
   
    <div id="caixa" style="height:460px;">
       <div id="conteudo">   
            
            <form action="valida_cadastro_funcionario.php" method="post">
              <table id="table_conteudo"  align="center" border="0">
                <tr><td colspan="2"><h3>Cadastro Funcionário</h3></td></tr>
               		<tr >
                      <td id="t_td">Nome:</td>
                      <td id="t_td" colspan="3"><span id="sprytextfield1">
                      <label for="nome_usuario"></label>
                      <input type="text" name="nome_usuario" id="nome_usuario" class="combobox_padrao_grande"></BR>
                      <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>
                      </td>
                    </tr>
                    
                   <tr>
                  <td id="t_td">Turno</td>
                  <td id="t_td" colspan="3"><select name='turno_cadastro' class='combobox_padrao' >
                            <option value='0'>Selecione...</option>
                            <option value='DIURNO'>Dia</option>
                            <option value='INTERMEDIARIO'>Intermediário</option>
                            <option value='NOTURNO'>Noite</option>
                            </select>
                  </td>
                  </tr>
                </table>
                 <table id="table_conteudo"  align="center" border="0">
              <tr>
              <td id="t_td"><hr><br/><input name="Enviar" type="submit" value="enviar" class="botao_padrao"/><br/></td>
              <td id="t_td"><hr><br/><input name="Limpar" type="reset" value="limpar" class="botao_padrao"/><br /></td>
              <td id="t_td"><hr><br/> <input type="button" name="Submit2" value="Voltar" class="botao_padrao" onClick="javascript: history.go(-1);"><br /></td>
              </tr>
              
              </table>
                    
</form>
        
        </div>
    </div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>
</body>
</html>