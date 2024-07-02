
<?php

if($perfil != 1 && $perfil != 15){
    
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
<div id="filtroservicousuario" class="form bradius">
<div class="divformusuario">

<form name="formulario" action="principal.php?t=controles/cadastrar_remetente_ponto_focal2.php" method="post">
 
   <p align="center"><b><font color="#337ab7" size="4" face="Gotham Light">Cadastro Solicitante Vivo/Atento <?php echo $page2; ?></font></b></p>
      <br />
                 
              		
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Nome:&nbsp;<input type="text" name="remetente" id="remetente" class="txtgrande bradius" /></label> 
</p>
<br>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Email:&nbsp;<input type="text" name="email" id="email" class="txtgrande bradius" /></label> 
</p>

 <br />



              <div style="padding-left:100px;">
                <input name="enviar" type="submit" value="Enviar" class="botao_padrao" >
                      
                <input name="limpar" type="reset" value="Limpar" class="botao_padrao">
                      
               <input type="button" name="Submit2" value="Voltar" class="botao_padrao" onClick="javascript: history.go(-1);"> 
              </div>
                      
            </form>
        </div>
    </div>
</div>
</body>
</html>