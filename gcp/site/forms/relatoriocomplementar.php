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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $perfil != 18 && $perfil != 21 && $perfil != 22 && $perfil != 23){
    
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
    <form id="form_rel" name="dados" method="post" action="principal.php?t=forms/gera_relatoriocomplementar.php">
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
            <font color="464646" size="2" face="Arial, Helvetica, sans-serif">Geral</font>
            <input name="pesquisa" id="4" type="radio" value="4" onclick="HabCamposrel()" />
            <font color="464646" size="2" face="Arial, Helvetica, sans-serif">Data Criado em</font>
            <input name="pesquisa" id="5" type="radio" value="5" onclick="HabCamposrel()" />
            <font color="464646" size="2" face="Arial, Helvetica, sans-serif">Data inclus&atilde;o banco</font>
            <input name="pesquisa" id="3" type="radio" value="3" onclick="HabCamposrel()"/>
            <font color="464646" size="2" face="Arial, Helvetica, sans-serif">Data tratamento</font>
             <br /><br />
            <span id="campos" style="display:none">
                <strong>Operador</strong>:&nbsp;&nbsp;&nbsp;
                <select name="operador" id="select" >
                    <option value="%">Selecine</option>
                      <?php
                      
                        $sql_operador = "SELECT * 
                                         FROM cip_nv.tbl_usuarios 
                                         WHERE  perfil NOT IN(1,4) and 
                                                status = 1 
                                         ORDER BY nome";
                		$acao_operador = mysql_query($sql_operador,$conecta);
                		while($linha_operador = mysql_fetch_assoc($acao_operador))
                		{
                    		$login_operador 	= $linha_operador["idtbl_usuario"];
                    		$nome_operador	 	= $linha_operador["nome"];
                    		echo "<option value='$login_operador'";
                    		echo ">$nome_operador</option>";			
                	    }
                      ?>
                </select>
            </span>
        </p>
        <br />
        <p>
            <strong>Data Inicial:</strong> 
            <input name="data_1" type="text" id="data_1" size="15" maxlength="10"  class="txt2data bradius"
            onkeyup="Formatadata(this,event);" 
            onclick="displayCalendar(document.getElementById('data_1'),'dd/mm/yyyy',this,true);"/>
        </p>
        <br />
        <p>
            <strong>Data Final:</strong> &nbsp;
            <input name="data_2" type="text" id="data_2" size="15" maxlength="10"  class="txt2data bradius" 
            onkeyup="Formatadata(this,event);" 
            onclick="displayCalendar(document.getElementById('data_2'),'dd/mm/yyyy',this,true);"/>
        </p>
         <br />
        <span id="oculta" style="display:''">
            <p>
            
                <strong>sub-status:</strong> &nbsp;
                <select name="substatus" id="substatus"  class="txt2comboboxpadrao bradius">
                    <option value="%">Todos</option>
                    <option value="2">Quantificar</option>
                    <option value="3">Distribuir - Analise</option>
                    <option value="7">Distribuir - Input</option>
                    <option value="13">Distribuir - Auditoria</option>
                    <option value="20">Distribuir - Correção</option>
                    <option value="4">Distribuido - Analise</option>
                    <option value="8">Distribuido - Input</option>
                    <option value="14">Distribuido - Auditoria</option>
                    <option value="21">Distribuido - Correcao</option>
                    <?php
                    //conecta no SGBD MySQL
                      
                    			
                      //seleciona a base de dados para uso
                       $query= "SELECT * FROM cip_nv.tbl_substatus where setor <> '-' ORDER BY setor";
                       $result= mysql_query($query,$conecta);
                       while($dado= mysql_fetch_array($result)){
                             echo "<option value=\"{$dado['id_status']}\">
                                   {$dado['substatus']}-({$dado['setor']})</option>";
                       }
                    ?>
                </select>
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
              <strong>Setor:</strong> &nbsp;
                <select name="setor" id="setor"  class="txt2comboboxpequeno bradius">
                    <option value="%">Todos</option>
                    <option value="Analise">Análise</option>
                    <option value="Input">Input</option>
                    <option value="Auditoria">Auditoria</option>
                    <option value="Correcao">Correção</option>
                    <option value="Chamado">Chamado</option>
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

