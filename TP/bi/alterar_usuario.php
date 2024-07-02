<?php   
@session_start(); 

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">



<?php
//Testa se o perfil está correto.

$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];

	if($_SESSION["bi"] == 0){  
    	
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
    include("../menu.php") ?>
    </div>
   
    <div id="caixa" style="height:460px;">
       <div id="conteudo">   
            
            <form action="valida_altera_usuario.php" method="post">
                <table id="table_conteudo"  align="center" border="0">
                <tr><td colspan="2"><h3>Alteração de usuário</h3></td></tr>
               		<tr >
                      <td id="t_td">Login do usuário</td>
                      <td id="t_td" colspan=""><span id="sprytextfield1">
                     <select name="login_usuario" id="login_usuario" class="combobox_padrao_grande">
          <option value="0" selected>Selecione</option>
          <?php
 //conecta no SGBD MySQL
  include "../conexao.php";
			
  //seleciona a base de dados para uso
  $query= "SELECT * FROM usuarios ORDER BY nome";
  $result = mysql_query($query) or die (mysql_error());
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['login']}\">
               {$dado['nome']}</option>";
   }
 ?>
        </select>
            <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>
                      </td>
                    </tr>
                 
              <tr>
              <td id="t_td"><br/><br/></td>
              <td id="t_td"><br/>
              <input name="Enviar" type="submit" value="enviar" class="botao_padrao"/>
              <input name="Limpar" type="reset" value="limpar" class="botao_padrao"/>
              <input name="Voltar" type="button" value="voltar"class="botao_padrao"/><br /></td>
              </tr>
              
              </table>
                    
</form>
        
        </div>
    </div>
</div>
<script type="text/javascript">
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>
</body>
</html>