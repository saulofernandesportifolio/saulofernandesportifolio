<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>

<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">

<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<div id="principal">

            <div id="menu">
           <?php include("../../tp/menu.php") ?>
            </div>
    
    <div id="caixa">
    
      <div id="conteudo">
        
            <p id="p_padrao">Bem Vindo <?php echo $nome; ?>.</p><br>
           
 
  <table id="table_conteudo"  align="center" border="0">
               		<form action="altera_Senha.php">
                    <tr>
                    <td id="t_td" >Alterar Senha :</td> 
                    <td id="t_td" ><input name="Submit" type="submit" class="botao_padrao"  value="Alterar"></input></td>
      				</tr>
                    </form>
  </table>


   		 </div>
      
        
  </div>
     
</div>

</body>
</html>