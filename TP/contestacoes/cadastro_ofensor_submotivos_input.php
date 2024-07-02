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

 

 if($_SESSION["contestacoes_atv_sup"] == 0){    	
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
    include("../../tp/menu.php") ?>
    </div>
   
    <div id="caixa" style="height:460px;">
       <div id="conteudo">   
            
            <form action="cadastro_submotivos_input.php" method="post">
              <table id="table_conteudo"  align="center" border="0">
                <tr><td colspan="2"><h3>Cadastro Submotivo</h3></td></tr>
                
                   <tr>
                  <td id="t_td">Selecione o ofensor:</td>
                  
                  <?php ?>
                  <td id="t_td" colspan=""><select name='ofensor' class='combobox_grandre' >
                            <option value='0'>Selecione...</option>
                            <option value='2'>ANÁLISE</option>
                            <option value='3'>INPUT</option>
                            <option value='4'>GN GUARDIAO</option>
                            <option value='19'>INDEVIDO</option>
                            </select>
                  </td>
                 </tr>                             
                
                </table>
                 <table id="table_conteudo"  align="center" border="0">
              <tr>
              <td id="t_td"><hr/><br/><input name="Enviar" type="submit" value="enviar" class="botao_padrao"/><br/></td>
              <td id="t_td"><hr/><br/><input name="Limpar" type="reset" value="limpar" class="botao_padrao"/><br /></td>
              <td id="t_td"><hr/><br/> <input type="button" name="Submit2" value="Voltar" class="botao_padrao"  onclick="javascript: history.go(-1);"><br /></td>
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