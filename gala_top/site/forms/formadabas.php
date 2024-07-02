<?php

$sql_operador="SELECT * FROM tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 4){
    
setcookie('salva',$_COOKIE['idtbl_usuario'],time() - 28800);
setcookie('idtbl_usuario',"");
    
echo "
       <script type=\"text/javascript\">
        alert('Usu\u00e1rio inv\u00e1lido!');
        document.location.replace('index.php');
	    </script>
 ";
  exit(); 
    
    
    
} 

?>
<div class="divrel bradius">
    <form id="form_rel" name="dados" method="post" action="principal.php?&t=controles/sql_cadastro_abadas4.php" onsubmit="enviardados()">
        <p align="center">&nbsp;</p>
        <h3 align="center">
            <strong>Cadastro codigo abadas</strong>
        </h3>
        <br />
       <p>Insira o codigo adabas:&nbsp;<input type="text" value="" name="adabas" class="txt2comboboxpequeno bradius" /></p>
          <br />
            <input type="submit" name="bt_enviar" id="bt_enviar" value="Cadastrar" class="sb2 bradius" />
            <input type="button" name="Submit2" value="Voltar" class="sb2 bradius" onclick="window.location='principal.php?filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php'" />
      </p>
       <br />
    </form>
</div>

