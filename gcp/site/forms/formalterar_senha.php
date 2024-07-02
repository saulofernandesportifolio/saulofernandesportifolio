
<?php


$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
        $login             =$linha_operador["usuario"];
        $cpf             =$linha_operador["cpf"];
		}
?>
<div id="filtroservicousuario" class="form bradius">
<div class="divformusuario bradius">

<form style="background:#D4D4D4;"  name="form1" method="POST" action="principal.php?&id=<?php echo $idtbl_usuario ?>&t=controles/sql.alterar_senha.php">

<p align="center"><b><font color="#337ab7" size="3" face="Gotham Light">ALTERAR SENHA</font></b></p>
<br />
 
<p style="border: #FFFFFF  solid; padding: 3px 3px 3px 3px;" class="bradius">
Nome:&nbsp;<?php echo $nome ?></p>
<br />
<p style="border: #FFFFFF  solid; padding: 3px 3px 3px 3px;" class="bradius">	  
CPF:&nbsp;<?php echo $cpf ?></p>
<br />
<p style="border: #FFFFFF  solid; padding: 3px 3px 3px 3px;" class="bradius">	  
Nova Senha:&nbsp;<input  id="senha" type="password" class="txt bradius" name="senha" value="" placeholder="Digitar nova senha"/></p>
<br />
<input type="submit" name="Submit" value="Cadastrar" class="sb2 bradius"/>
  <?php if($perfil == 1 || $perfil == 4 || $perfil == 7){ 
    $link="principal.php?&t=forms/formhome_operacao.php";
    }else{
    $link="principal.php";    
    }
    ?>


<?php

 mysql_free_result($acao_operador);
 mysql_close($conecta);

?>


<input type="button" name="Submit2" value="Cancelar" onclick="window.location='<?php echo $link ?> '" class="sb2 bradius"/>


</form>
<br />
</div>
</div>


</body>
</html>
