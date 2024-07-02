 <?php 
 
include("../bd.php");
$sql_valida1 = "DELETE FROM tbl_atividades_tratamento_vpe_petro";
$acao_valida1 = mysql_query($sql_valida1) or die (mysql_error());
  echo "<script>
            document.location.replace('atualizar_base_VPE_Petro.php?usuario={$usuario}');
		</script>";
?>