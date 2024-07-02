<div class="divformcarrega">
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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7){
    
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

<div id="resolucao">
	<div id="filtro" class="form bradius">
    <form action="principal.php?t=forms/formeditar_usuarios.php" method="POST">
        <h3 align="center" style="background: #735D25"><font color="#FFFFFF">SELECIONE O FILTRO EDITAR</font></h3><br />
        <div class="acomodar">
        <p>Selecione o supervisor:
        <select name="sup" id="sup">
        <option value="%">todos</option>
       <?php
        //conecta no SGBD MySQL
         

			
        //seleciona a base de dados para uso
        $query= "SELECT * FROM tbl_supervisor WHERE projeto NOT IN('saiu','GERENTE','B.I')  ORDER BY nome";
        $result= mysql_query($query,$conecta);
        while($dado= mysql_fetch_array($result)){
            echo "<option value=\"{$dado['id']}\">
               {$dado['nome']}</option>";
         }
      ?>
     </select></p>
      <br/>
      <p>Setor:
      <select name="setor" id="setor">
      <option value="%">todos</option>
      <option value="1" >Supervisor</option>
      <option value="2" >An&aacute;lise</option>
      <option value="3">Input</option>
      <option value="5">Análise de input</option>
      <option value="6">Corre&ccedil;&atilde;o</option>
      <option value="12">Operador - CO </option>
     </select></p>
      <br />
            <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="       OK       "  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php?filtro=%&t=forms/formhome_operacao.php'" />

            </form>
        <!--principal-->
        </div>

     
               
    </div>
</div>






</body>
</html>