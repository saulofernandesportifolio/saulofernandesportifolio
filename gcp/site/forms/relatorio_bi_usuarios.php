
<!-- link calendar resources -->
    <link rel="stylesheet" type="text/css" href="calendar/tcal.css" />
    <script type="text/javascript" src="calendar/tcal.js"></script> 
<?php 

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta);
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $idtbl_usuario != 256 && $perfil != 18 && $perfil != 21 && $perfil != 22 && $perfil != 23){
    
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
    <form id="form_rel" name="dados" method="POST" action="principal.php?t=forms/gera_relatorio_bi_usuarios.php">
      <br />
        <p align="center"><b><font color="#FF0000">Obs.:&nbsp;Para baixar a base consolidada deixar o campo data inicial e data final em branco.</font></b></p>
          <br />
        <h3 align="center">
            <strong>Gerar Relat&#243;rio</strong>
        </h3>
        <p align="center">&nbsp;</p>
        <p>
            <strong>Tipo</strong>: 
             <input name="pesquisa" id="1" type="radio" value="1" onclick="HabCamposrel()" value="1" checked=""/>
            <font color="464646" size="2" face="Arial, Helvetica, sans-serif">Data Cadastro</font>
            <input name="pesquisa" id="5" type="radio" value="5" onclick="HabCamposrel()" />
            <font color="464646" size="2" face="Arial, Helvetica, sans-serif">Data Atualização</font>
            <br /><br />
        <p>
            <strong>Data Inicial:</strong> 
            <input name="data_1" type="text" id="data_1" size="15" maxlength="10"  class="tcal bradius" value="" 
            onkeyup="Formatadata(this,event);"/>
          
        </p>
        <br />
        <p>
            <strong>Data Final:</strong> &nbsp;
            <input name="data_2" type="text" id="data_2" size="15" maxlength="10"  class="tcal bradius" value="" 
            onkeyup="Formatadata(this,event);"/>
        </p>
         <br />
           <p>
              <strong>Turno:</strong> &nbsp;
                <select name="turno" id="turno"  class="txt2comboboxpequeno bradius">
                    <option value="%">Todos</option>
                    <?php
                    //conecta no SGBD MySQL
                      
                                
                      //seleciona a base de dados para uso
                       $query= "SELECT * FROM cip_nv.tbl_turno  WHERE id <> 4 ORDER BY  turno ";
                       $result= mysql_query($query,$conecta);
                       while($dado= mysql_fetch_array($result)){
                             echo "<option value=\"{$dado['id_filtro']}\">
                                   {$dado['turno']}</option>";
                       }
                    ?>
                </select>
              
             </p>
               <br />
             <p>
              <strong>Status:</strong> &nbsp;
                <select name="status" id="status"  class="txt2comboboxpequeno bradius">
                    <option value="%">Todos</option>
                    <option value="1">Ativo</option>
                    <option value="0">Desativo</option>

                </select>
              
             </p>
            <p> 
        <br />

        <?php 

         mysql_free_result($result,$acao_operador);   
         mysql_close($conecta);

         ?>


            <input type="submit" name="bt_enviar" id="bt_enviar" value="Gerar" class="sb2 bradius" />
            <input type="button" name="Submit2" value="Voltar" class="sb2 bradius" onclick="window.location='principal.php?&t=forms/relatorio_tramitacao_principal.php'" />
      </p>
       <br />
    </form>
</div>

