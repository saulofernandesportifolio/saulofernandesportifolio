<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include($_SERVER['DOCUMENT_ROOT']."/fixa/bd.php");


$parametro_consulta = $_GET['parametro_consulta'];
$campo = $_GET['campo'];

?>

<?php if($campo == "motivo_devolucao"){?>
	<label>Motivo devolução</label>
	<select 
		name="motivo_devolucao" 
		id="motivo_devolucao" 
		class="txt2comboboxpadrao bradius"
		disabled="true"
		onchange="CarregaDescricaoMotivoDevolucao(this.value)">
		<option value=""></option>
		<?php 

			$devolucao=mysql_query("SELECT distinct descricao FROM motivo_devolucao 
									WHERE fase =  '$parametro_consulta' 
									AND area is not null
								");
	        
			while($rowmd=mysql_fetch_array($devolucao)){
	             
		?>
		<option value="<?php echo $rowmd['descricao']; ?>">
			<?php echo $rowmd['descricao']; ?>
		</option>
			<?php 
				}
			?>
	</select>
<?php }else if($campo == "descricao_motivo_devolucao"){?>
	<label>Descrição motivo devolução</label>
	<select 
		name="descricao_motivo_devolucao" 
		id="descricao_motivo_devolucao" 
		class="txt2comboboxpadrao bradius"
		disabled="true">
		<option value=""></option>
		<?php 

			$devolucao=mysql_query("SELECT * FROM motivo_devolucao 
					WHERE descricao = '$parametro_consulta'
					AND area is not null");
	        
			while($rowmd=mysql_fetch_array($devolucao)){
	             
		?>
			<option value="<?php echo $rowmd['id_motivo_devolucao']; ?>">
				<?php echo $rowmd['descricao_detalhes']; ?>
			</option>
			<?php 
				}
			?>
	</select>
<?php }?>
<!--
<option value=""></option>
					   			<option value="Comercial">COMERCIAL</option>
					   			<option value="MKT">MKT</option>
					   			<option value="AG. TELEFONICA">AG. TELEFONICA</option>
					   			-->

