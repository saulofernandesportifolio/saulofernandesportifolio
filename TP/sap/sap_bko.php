<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<script type="text/javascript" src="../../tp/jquery.js"></script>

<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=motivo]").html('<option value="0">Carregando...</option>');
            $.post("../../tp/sap/processa_sap_enviado.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=motivo]").html(valor);
					 $teste=$ln['motivo'];	
				  }
                  )
         })
      })
	   
</script>

<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=motivo2]").html('<option value="0">Carregando...</option>');
            $.post("../../tp/sap/processa_sap_motivopendentes.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=motivo2]").html(valor);
					 $teste=$ln['motivo2'];	
				  }
                  )
         })
      })
	   
</script>

<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=motivo3]").html('<option value="$status_tp">Carregando...</option>');
            $.post("../../tp/sap/processa_sap_corrigido.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=motivo3]").html(valor);
					 $teste=$ln['motivo3'];	
				  }
                  )
         })
      })
	   
</script>

</head>
<body id="logar">

<?php
	if($_SESSION["sap_bko"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
?>
  
<?php 

$id1 = $id_sap;

//Pesquisa e retorna os campos declarado nas variáveis.
        include("../conexao.php");
		
		if($id1 = $id_sap)
		{
                 $sql_pn = "select * from diario_sap_bko WHERE id_sap ='$id1'";
		         $result = mysql_query($sql_pn,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $id_sapa = $dado["id_sap"];
				 $pedido = $dado["pedido"];
				 $adabas = $dado["adabas"];
				 $ov = $dado["ov"];
				 $qtde_linhas_pedido = $dado["qtde_linhas_pedido"];
				 $regional = $dado["regional"];
				 $ofensor = $dado["ofensor"];
				 $solicitado_por = $dado["solicitado_por"];
				 $operador = $dado["operador"];
				 $material_antigo = $dado["material_antigo"];
				 $cliente = $dado["cliente"];
				 $tipo_de_solicitacao = $dado["tipo_de_solicitacao"];
				 $motivo = $dado["motivo"];
				 $data_cadastro = $dado["data_cadastro"];
				 $tipo_ov = $dado["tipo_ov"];
				 $qtde_linhas_ov = $dado["qtde_linhas_ov"];
				 $nova_ov = $dado["nova_ov"];
                 $material_novo = $dado["material_novo"];
				 $comentario = $dado["comentario"];
				 $status_tp = $dado["status_tp"];
                 $motivo_pendente = $dado["motivo_pendente"];
                 $enviado_para = $dado["enviado_para"];
                 $acao_ov = $dado["acao_ov"];
				 }
		}
		else 
		{
			echo "id diferente";
		}
        //Verifica se as variáveis foram inicializadas.
        if(!isset($motivo_pendente) || empty($motivo_pendente))$motivo_pendente=0;
        if(!isset($enviado_para) || empty($enviado_para))$enviado_para=0;
        if(!isset($acao_ov) || empty($acao_ov))$acao_ov=0;
        
   // $_SESSION["id_sap"] = $id1;
	$data_cadastro = explode('-', $data_cadastro);
	$data_cad = $data_cadastro[2].'/'.$data_cadastro[1].'/'.$data_cadastro[0];

 ?>  
  
<div id="principal">

    <div id="menu">
   <?php include("../menu.php") ?>
    </div>
    
    <div id="caixa" style="height:578px;">
    
        <div id="conteudo" >
        
            <p id="p_padrao">SAP - Operador : <?php echo $_SESSION["nome"]; ?>.</p>
            
            <form action="sap_update_cadastro.php" method="post">
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                        <td id="t_td">Tipo de solicitação </td>
                        <td id="t_td">
                      	<?php echo "$tipo_de_solicitacao" ?>
                        </td>
                        <td></td>
                	</tr>
                    <tr><td><br /></td><td><br /></td></tr>
                    <tr>
                        <td id="t_td">Pedido</td>
                        <td id="t_td">
                      	<?php echo "$pedido" ?>
                        </td>
                        <td id="t_td">Adabas</td>
                        <td id="t_td">
						<?php 
						if ($adabas == ''){
                       echo "<input name='adabas' type='text'  class='input' maxlength='10'>";
					   }else echo "<input name='adabas' type='text' readonly='readonly' class='input' value='$adabas' maxlength='10'>";
					   ?>
                        </td>
                    </tr>
                    <tr>
                    	<td id="t_td">OV</td>	
                        <td id="t_td">
                       		<?php echo "$ov" ?>
                        </td>
                         <td id="t_td">Nova OV</td>	
                    	<td>
                    <?php 
						if ($nova_ov == ''){
                       echo "<input name='nova_ov' type='text'  class='input' maxlength='10'>";
					   }else echo "<input name='nova_ov' type='text' readonly='readonly' class='input' value='$nova_ov' maxlength='10'>";
					   ?>
                    	</td>
                    </tr>
                    <tr>
                    	<td id="t_td">QTD Linhas (Pedido)</td>
                    	<td id="t_td">
                    <?php 
						if ($qtde_linhas_pedido == '' or $qtde_linhas_pedido == '0'){
                       echo "<input name='qtde_linhas_pedido' type='text'  class='input' maxlength='10'>";
					   }else echo "<input name='qtde_linhas_pedido' type='text' readonly='readonly' class='input' value='$qtde_linhas_pedido' maxlength='10'>";
					   ?>
                    	</td>
                    	<td id="t_td">QTD Linhas (OV)</td>
                    	<td>
                       <?php 
					   if ($qtde_linhas_ov == '' or $qtde_linhas_ov == '0'){
                       echo "<input name='qtde_linhas_ov' type='text'  class='input' maxlength='10'>";
					   }else echo "<input name='qtde_linhas_ov' type='text' readonly='readonly' class='input' value='$qtde_linhas_ov' maxlength='10'>";
					   ?>
                    	</td>
                    </tr>	
                	<tr>
                    	<td id="t_td">Regional</td>
                    	<td id="t_td">
                    		<?php echo "$regional" ?>
                    	</td>
                       
                        <td id="t_td">Ofensor</td>
                    	<td id="t_td">
                    	<?php 
					   if ($ofensor == ''){
                       echo "<select name='ofensor' class='combobox_padrao' >
                            <option value='0'>Selecione...</option>
                            <option value='BKO'>BKO</option>
                            <option value='Input'>Input</option>
                            <option value='Logistica'>Logistica	</option>
                            <option value='Sistema'>Sistema</option>
                            </select>";
					   }else echo "<input name='ofensor' type='text' readonly='readonly' class='input' value='$ofensor' maxlength='10'>";
					   ?>
                    	</td>
                        </td>
                	</tr>
	                
               		<tr>
                        <td id="t_td">Solicitado por</td>
                    	<td id="t_td">
                    		<?php echo "$solicitado_por" ?>
                    	</td>
               		
               		<!-- INSERIR OS OPERADORES DA TABELA  -->
                        <td id="t_td">Operador</td>
                    	<td id="t_td">
                    	<?php 
					   if ($operador == ''){
						   $sql_operador = mysql_query("SELECT nome FROM funcionarios_emp WHERE nome NOT LIKE '%*%'ORDER BY nome ASC");
						   $num_operador = mysql_num_rows($sql_operador);
						   echo "<select name='operador' class='combobox_tam_auto' >";
						   echo "<option value='0'>Nenhum</option>";
						   for($i;$i < $num_operador ; $i++){
							   $operador_option = mysql_fetch_assoc($sql_operador);
                       			echo "<option value='".$operador_option["nome"]."'>".$operador_option["nome"]."</option>";
						   }
						   echo "</select>";
					   }else echo "<input name='operador' type='text' readonly='readonly' class='input' value='$operador' maxlength='10'>";
					   ?>
                    	</td>
                	</tr>
                    <tr>
                        <td id="t_td">Material antigo</td>
                    	<td id="t_td">
                    	<?php 
					   if ($material_antigo == ''){
                       echo "<input name='material_antigo' type='text'  class='input' maxlength='12'>";
					   }else echo "<input name='material_antigo' type='text' readonly='readonly' class='input' value='$material_antigo' maxlength='10'>";
					   ?>
                    	</td>
                	<td id="t_td">Material novo</td>
                        <td>
						<?php 
					   if ($material_novo == ''){
                       echo "<input name='material_novo' type='text'  class='input' maxlength='12'>";
					   }else echo "<input name='material_novo' type='text' readonly='readonly' class='input' value='$material_novo' maxlength='10'>";
					   ?>
                    	</td>
                	</tr>
                    
                    <tr>
                        <td id="t_td">Código do cliente</td>
                    	<td id="t_td">
                    	<?php 
					   if ($cliente == ''){
                       echo "<input name='cliente' type='text'  class='input' maxlength='10'>";
					   }else echo "<input name='cliente' type='text' readonly='readonly' class='input' value='$cliente' maxlength='10'>";
					   ?>
                    	</td>
                	
                    
                        <td id="t_td">Data de cadastro</td>
                        <td id="t_td">
                    	<?php 
					   if ($data_cad == ''){
                       echo "<input name='data_cadastro' type='text'  class='input' maxlength='10'>";
					   }else echo "<input name='data_cadastro' type='text' readonly='readonly' class='input' value='$data_cad' maxlength='10'>";
					   ?>
                    	</td>
                	</tr>
                    <tr>
                    <tr>
                        <td id="t_td">Tipo de OV</td>
                    	<td id="t_td">
                    <?php 
					   if ($tipo_ov == ''){
                       echo "<select name=\"tipo_ov\" class=\"combobox_padrao\" >
                            <option  value=0 >Selecione...</option>
                            <option value=\"Venda\">Venda</option>
                            <option value=\"Comodato\">Comodato</option>
                            <option value=\"gai\">GAI</option>
                            <option value=\"Doação\">Doação</option>
                            </select>";
				 }else echo "<input name='tipo_ov' type='text' readonly='readonly' class='input' value='$tipo_ov' maxlength='10'>";
					   ?>
                    	</td>

                	</tr>
                    <tr>
                        <td id="t_td">Motivo</td>
                    	<td id="t_td" colspan="3">
                    		<?php echo "$motivo" ?>
                    	</td>

                	</tr>
                    <tr>
                        <td id="t_td" >Comentário</td>
                        <td colspan="3"	>
			<textarea name="comentario_antigo" readonly readonlycols="56" style="width:470" rows="3"><?php echo $comentario; ?>
            </textarea>
                        </td>
                	</tr>
                    <tr>
                        <td id="t_td" >Novo Comentário</td>
                        <td colspan="3"	>
                    
		                <span id="sprytextfield1">
  						<label for="text1"></label>
 						<input type="text" style='width:470' name="comentario_novo" id="comentario_novo">
 					    <span class="textfieldRequiredMsg">Campo obrigatório.</span></span>

                        </td>
                	</tr>
                    <tr><td><br></td></tr>
               	  <tr>
                        <td id="t_td">Status</td>
                        <td id="t_td">
                        <?php
                       if($status_tp == 1)
						{
						$status_t2p="0";
						$status_tp="Selecione";
						}
						if($status_tp == 2)
						{
						$status_tp="Pendente";
						$status_tp2="2";
						}
						?>
                    <label for="tipos"></label>
        			<select name="id_filtro" id="id_filtro" class="combobox_padrao">
          		    <option value="<?php echo "$status_tp2" ?>" selected="selected"><?php echo "$status_tp" ?></option>
					<?php
                     include '../conexao.php';
					 
                     $sql = "SELECT * FROM tipos_sap_pendente_corrigido";
                     $qr = mysql_query($sql) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id_filtro'].'">'.$ln['tipo'].'</option>';
                     }
                     ?>
                     </select>
                     </td>
                     </tr>
                        <tr>
                    <td id="t_td">Motivos Pendentes:</td>
                      <?php
                       if($status_tp == 1)
						{
						$status_t2p="0";
						$status_tp="Selecione";
						}
						if($status_tp == 2)
						{
						$status_tp="Pendente";
						$status_tp2="2";
						}
						
						?>                        
                    <td colspan="3">         
                    <select name="motivo2" class="combobox_padrao_grande" id="motivo2">
                    <option value="0"><?php if($motivo_pendente!=0)echo "Selecione...";else{echo $motivo_pendente;}?></option>
                    </select>
                    </td>
                   </tr>
                     <tr>
                    <td id="t_td">Enviado para:</td>                        
                    <td colspan="3">         
                    <select name="motivo" class="combobox_padrao_grande" id="motivo">
                    <option value="0"><?php if(!$enviado_para!=0)echo "Selecione...";else{echo $enviado_para;}?></option>
                    </select>
                    </td>
                   </tr>
                      <tr>
                    <td id="t_td">Ação ov:</td>                        
                    <td colspan="3">         
                    <select name="motivo3" class="combobox_padrao_grande" id="motivo3">
                    <option value="0"><?php if(!$acao_ov!=0)echo "Selecione...";else{echo $acao_ov;}?></option>
                    </select>
                    </td>
                   </tr>
                   <tr>
                   <td><br /></td>
                   <td><input name="id_sap" style="visibility:hidden" type="text"  class="input" value="<?php echo "$id1" ?>" maxlength="10"></td>
                	</tr>
                	<tr align="center" >
                    	<td></td>
                    	<td colspan="1">
                    		<input name="salvar" type="submit" value="Salvar" class="botao_padrao" />
                 		</td>
                        <td>
                    		<input name="limpar" type="reset" value="Limpar" class="botao_padrao" />
                    	</td>
                        <td><?php $login = $_SESSION["login"]; $nome = $_SESSION["nome"];?></td>
                  </tr>
                </table>
                <?php "$id1" ?>
            </form>
        
        </div>
        
    </div>
    
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>