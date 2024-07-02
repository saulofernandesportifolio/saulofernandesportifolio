<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
<script src="../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<head>

<style type="text/css">
div#caixa1{
	position: absolute;
	margin-left: 55px;
	width: 484px;
	height: 470px;
	border: 0px;
	border-color: rgb(0,0,204);
	border-style: solid;
	float: left;
	margin-top: 80px;
	}
/* conteudo da página */
div#conteudo1{
	position: absolute;
	margin-left: 20px;
	width: 458px;
	height: 439px;
	border: 0px;
	border-style: solid;
	float: left;
	margin-top: 20px;
}
table{
	font:Verdana, Geneva, sans-serif;
	font-size:14px;
	color:rgb(0,0,0);
	background-color:EDEDED;
	width:350px;
	
}
.botao_padrao{
	width:100;
}

/*  PRINCIPAL -> */

</style>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">


<div id="principal">

            <div id="menu">
           <?php  include("../../tp/menu.php") ?>
            </div>    
    <div id="caixa1" >
    
      <div id="conteudo1">
        
            <p id="p_padrao">Bem Vindo <?php echo $nome; ?>.</p><br>
           
 
  <table align="center" border="0" >
               		<form action="altera_senha2.php" method="post">

                    <tr>
                    <td  >Nova senha :</td> 
                    <td  >
                      <span id="sprypassword1">
                        <label for="senha1"></label>
                        <input type="password" name="senha1" id="senha1">
                        <span class="passwordRequiredMsg">Campo obrigatório.</span></span>
       </td></tr>
					<tr>
                    <td >Repita senha :</td> 
        <td  >
          <span id="spryconfirm1">
            <label for="senha2"></label>
            <input type="password" name="senha2" id="senha2">
            <span class="confirmRequiredMsg">Campo obrigatório.</span><span class="confirmInvalidMsg"><br>Senhas não combinam!</span></span>
       </td></tr>
                   
                   <tr>
                   <td   colspan="2" >
                   <input type="submit" name="enviar" id="enviar" value="Alterar" class="botao_padrao">
                   <input name="limpar" type="reset" value="Limpar" class="botao_padrao">
                   <input name="voltar" type="button" value="Voltar" onClick="javascript: history.go(-1);" class="botao_padrao">
                   </td>
                   
                   </tr>

  </table>
 </form>

	  </div>
      
        
  </div>
     
</div>
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "senha1");
</script>
</body>

</html>