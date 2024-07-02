 <?php 
include("../bd.php");

/*setcookie('salva',$_COOKIE['idtbl_usuario'],time() + 28800);
setcookie('idtbl_usuario',"");*/

//echo $canal;
//echo '<br>';

$sql_valida1 = "DELETE FROM tbl_cotacao_vpe";
$acao_valida1 = mysql_query($sql_valida1) or die (mysql_error());
 echo "<script>
        document.location.replace('principal.php?&t=forms/atualizar_base_vpe.php');
		</script>";
?>