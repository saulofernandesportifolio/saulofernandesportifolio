
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
	$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");
  $calcula_data = date("d/m/Y");	
  $dt_dia = date("Y-m-d");
?>
 
<div id="principal">
<?php

$sql="SELECT * FROM cip_nv.remetente_diretoria WHERE nome='{$_POST['remetente']}' ";	
$result = mysql_query($sql) or die(mysql_error());
$num=mysql_num_rows($result);

if($num != 0){

echo"
		<script type=\"text/javascript\">
		alert('Nome ja cadastrado!');
		document.location.replace('principal.php?t=forms/form_cadastro_remetente_ponto_focal.php');
		</script>
 		";

exit();

}



$query="INSERT INTO cip_nv.remetente_diretoria(
                    nome
				    ) 
				   VALUES(
				   '{$_POST['remetente']}'				      
				   )";
(!mysql_query($query,$conecta)); 

	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('principal.php?t=forms/form_cadastro_remetente_ponto_focal.php');
		</script>
 		";
		
?>    
</div>
</body>
</html>