<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../bd.php"; 

$n_chamado = (mysql_fetch_assoc(mysql_query('SELECT n_chamado FROM tbl_chamados ORDER BY n_chamado DESC limit 1')));
$n_chamado= $n_chamado['n_chamado']+1;
 
?>

<table id="table" class="menu">
	<tr bordercolor="#FFFFFF"> 
	  <td colspan="3">
      <H2>M&oacute;dulo de inser&ccedil;&atilde;o de chamado</H2>
	  </td>
	</tr>
	<tr> 
	  <td align="center" colspan="3"> 
	  <hr/>
		<center><p class="rigth"><strong>INSERIR CHAMADO</strong></p></center>
	  </td>
	</tr>
	<tr>
	  <td width="5%">
		Nome:
	  </td>
	  <td width="60%">
		<?php echo $nome ?>
	  </td>
	  <td>
		Chamado nº <?php echo $n_chamado;?>
	  </td>
	</tr>
	<tr>
	  <td>
		Login:
	  </td>
	  <td>
		<?php echo $login ?>
	  </td>
	</tr>
	<tr>
	  <td colspan="2">
	  </br><strong>Solicitação:</strong></br>
        <input value="RELATORIO" id="relatorio" name="solicitacao" type="radio" onclick="HabCampos()"/>Relat&oacute;rio</option>
		<input value="SISTEMA" id="sistema" name="solicitacao" type="radio" onclick="HabCampos()"/> Sistema</option>
		<input value="PROJETO" id="projeto" name="solicitacao" type="radio" onclick="HabCampos()"/>Projeto</option>
        <input value="SEGURANCA" id="seguranca" name="solicitacao" type="radio" onclick="HabCampos()"/>Seguran&ccedil;a L&oacute;gica</option>
	  </td>
	</tr>
	<tr bordercolor="#FFFFFF"> 
	  <td colspan="3">
      
	    <!-- OPÇÃO RELATÓRIOS-->
		<label id="campo_relatorio" style="display:none">
		<form enctype="multipart/form-data" name="form1" method="post" action="envia_chamado.php?ide=<?php echo $idusuario?>">
			</br><strong>Tipo de relat&oacute;rio:</strong></br>
			<input value="INPUT" id="select" name="tipo" type="radio" onc />Input
			<input value="TRAMITACAO" id="tramitacao" name="tipo" type="radio" />Tramita&ccedil;&atilde;o
			<input value="QUALIDADE" id="qualidade" name="tipo" type="radio" />Qualidade
                          
            <!-- ÁREA DE SUBMISSÃO DE DADOS -->
            <div align="center">
        	</br></br><strong>Descri&ccedil;&atilde;o:</strong></br>
			<textarea id="descricao" name="descricao" cols="50" rows="8"></textarea>
			<hr noshade="noshade" />
			<input type="hidden" name="n_chamado" id="n_chamado" value="<?php echo ($n_chamado)?>" />
			<input type="hidden" name="login" id="login" value="<?php echo ($login)?>" />
	        <input type="hidden" name="solicitacao" id="solicitacao" value="RELATORIO" />
	        <input type="hidden" name="dt_solic" id="dt_solic" value="<?php echo date("d/m/Y") ?>" />
			<input type="button" name="Submit2" value="Cancelar" onclick="window.location="menu_1.php?m=0&ide=<?php echo $idusuario?>""/>
			<input type="submit" name="Submit" value="Avan&ccedil;ar >>" />
			</div>
	        <div align="left">
    	    </br><font >Anexar arquivo:</br>(Arquivo .jpg ou <strong>.xls</strong>):</font></br>
	    	<input name="arquivo" type="file"/>
	        </font>
       	    </div>
        </form>
        </label>
        
        <!-- OPÇÃO SISTEMA-->
             
        <label id="campo_sistema" style="display:none">
        	<form enctype="multipart/form-data" name="form1" method="post" action="envia_chamado.php?ide=<?php echo $idusuario?>">
			    </br><strong>Servi&ccedil;o:</strong></br>
							
				<input value="MANUTENCAO" id="manutencao" name="tipo" type="radio" />Manuten&ccedil;&atilde;o
				<input value="ALTERACAO" id="alteracao" name="tipo" type="radio" />Altera&ccedil;&atilde;o
				<input value="CRIACAO" id="criacao" name="tipo" type="radio" />Cria&ccedil;&atilde;o
	            
	            </br></br><strong>Sistema:</strong></br>
            	<input value="CIP" id="cip" name="sistema" type="radio" />CIP
				<input value="EGTQ" id="egtq" name="sistema" type="radio" />E-GTQ
                <input value="SCS" id="scs" name="sistema" type="radio" />SCS
                <input value="INTRANET" id="intranet" name="sistema" type="radio" />INTRANET
              
	            <!-- ÁREA DE SUBMISSÃO DE DADOS -->
	            <div align="center">
		        </br><strong>Descri&ccedil;&atilde;o:</strong></br>
				<textarea id="descricao" name="descricao" cols="50" rows="8"></textarea>
				<hr noshade="noshade" />
				<input type="hidden" name="n_chamado" id="n_chamado" value="<?php echo ($n_chamado)?>" />
		 		<input type="hidden" name="solicitacao" id="solicitacao" value="SISTEMA" />
				<input type="hidden" name="login" id="login" value="<?php echo ($login)?>" />
		        <input type="hidden" name="dt_solic" id="dt_solic" value="<?php echo date("d/m/Y") ?>" />
				<input type="button" name="Submit2" value="Cancelar" onclick="window.location="menu_1.php?m=0&ide=<?php echo $idusuario?>""/>
				<input type="submit" name="Submit" value="Avan&ccedil;ar >>" />
			</div>
	        <div align="left">
    	    <font >Anexar arquivo:</br>(Arquivo .jpg ou <strong>.xls</strong>):</font></br>
	    	<input name="arquivo" type="file"/>
	        </font>
       	    </div>
 
		   </form>
        </label>
        
        <!-- OPÇÃO PROJETO-->
        <label id="campo_projeto" style="display:none">
	        <form enctype="multipart/form-data" name="form1" method="post" action="envia_chamado.php?ide=<?php echo $idusuario?>">
			    </br><strong>Titulo do projeto:</strong></br>
				<input id="titulo" name="tipo" type="text" />
	            </br>
                        
    	       <!-- ÁREA DE SUBMISSÃO DE DADOS -->
	            <div align="center">
		        </br></br><strong>Descri&ccedil;&atilde;o:</strong></br>
				<textarea id="descricao" name="descricao" cols="50" rows="8"></textarea>
				<hr noshade="noshade" />
				<input type="hidden" name="n_chamado" id="n_chamado" value="<?php echo ($n_chamado)?>" />
				<input type="hidden" name="login" id="login" value="<?php echo ($login)?>" />
				<input type="hidden" name="solicitacao" id="solicitacao" value="PROJETO" />
		        <input type="hidden" name="dt_solic" id="dt_solic" value="<?php echo date("Y-m-d") ?>" />
				<input type="button" name="Submit2" value="Cancelar" onclick="window.location="menu_1.php?m=0&ide=<?php echo $idusuario?>""/>
				<input type="submit" name="Submit" value="Avan&ccedil;ar >>" />
			</div>
	        <div align="left">
    	    </br><font >Anexar arquivo:</br>(Arquivo .jpg ou <strong>.xls</strong>):</font></br>
	    	<input name="arquivo" type="file"/>
	        </font>
       	    </div>
 
        	</form>
        </label>
        
        <!-- OPÇÃO SEGURANÇA LÓGICA-->
        
     	<label id="campo_seguranca" style="display:none">
			<form enctype="multipart/form-data" name="form1" method="post" action="envia_chamado.php?ide=<?php echo $idusuario?>">
		    	</br><strong>Tipo de opera&ccedil;&atilde;o:</strong></br>
				<input value="CRIACAO" id="criacao" name="tipo" type="radio" onc />Cria&ccedil;&atilde;o
				<input value="RESET" id="reset" name="tipo" type="radio" />Reset de senha
				<input value="EXCLUSAO" id="exclusao" name="tipo" type="radio" />Exclus&atilde;o de registro
                          
    	        <!-- ÁREA DE SUBMISSÃO DE DADOS -->
	       	    <div align="center">
		        </br></br><strong>Descri&ccedil;&atilde;o:</strong></br>
				<textarea id="descricao" name="descricao" cols="50" rows="8"></textarea>
				<hr noshade="noshade" />
				<input type="hidden" name="n_chamado" id="n_chamado" value="<?php echo ($n_chamado)?>" />
				<input type="hidden" name="login" id="login" value="<?php echo ($login)?>" />
		        <input type="hidden" name="solicitacao" id="solicitacao" value="SEGURANCA" />
		        <input type="hidden" name="dt_solic" id="dt_solic" value="<?php echo date("d/m/Y") ?>" />
				<input type="button" name="Submit2" value="Cancelar" onclick="window.location="menu_1.php?m=0&ide=<?php echo $idusuario?>""/>
				<input type="submit" name="Submit" value="Avan&ccedil;ar >>" />
			</div>
	        <div align="left">
    	    </br><font >Anexar arquivo:</br>(Arquivo .jpg ou <strong>.xls</strong>):</font></br>
	    	<input name="arquivo" type="file"/>
	        </font>
       	    </div>
	        </form>
        </label>
     </td>
      <td>
      </td>
	</tr>
  </table>


