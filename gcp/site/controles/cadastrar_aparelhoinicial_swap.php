<head>
<script>
function redireciona() {
window.close();
opener.location.href="../../principal.php?id_swap=<?php echo $_POST['id_swap'] ?>&t=forms/form_swaptt.php";
}
</script>
</head>
<?php

include '../../bd.php';


$perfil=$_POST['perfil'];

if($perfil != 1 && $perfil != 20){
    
setcookie('salva',$_COOKIE['idtbl_usuario'],time() - 28800);
setcookie('idtbl_usuario',"");
    
echo "
       <script type=\"text/javascript\">
        alert('Usu\u00e1rio inv\u00e1lido!');
        window.close();
      </script>
 ";
  exit(); 
    
    
    
} 
	$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");
  $calcula_data = date("d/m/Y");	
  $dt_dia = date("Y-m-d");


if(empty($_POST['ap_inicial']) 
  || empty($_POST['de_qtd'])){



 echo"
    <script type=\"text/javascript\">
    alert('Verificar se todos os campos estão preenchidos corretamente !');
    history.back();
    </script>
    ";

   exit();

}


  

  
?>
 
<div id="principal">
<?php

$sql="SELECT * FROM cip_nv.tbl_swap_aparelho WHERE aparelho='{$_POST['ap_inicial']}' ";	
$result = mysql_query($sql) or die(mysql_error());
$num=mysql_num_rows($result);

/*if($num != 0){

echo"
		<script type=\"text/javascript\">
		alert('Nome ja cadastrado!');
		window.close();
		</script>
 		";

exit();

}*/

  $sql = "SELECT 
        CASE WHEN MAX(revisao_ap) IS NULL 
             THEN 0
             ELSE MAX(revisao_ap)
        END +1 as revisao_ap2
        FROM cip_nv.tbl_swap_aparelho  
        WHERE id_swap ='{$_POST['id_swap']}' AND tipo='inicial' ";
 $consulta = mysql_fetch_assoc(mysql_query($sql)) or die(mysql_error().$sql." erro #SQL_2");
 $revisao_ap2=  $consulta['revisao_ap2'];



 $query="INSERT INTO cip_nv.tbl_swap_aparelho(
                                      id_swap,
                                      aparelho,
                                      qtd,
                                      tipo,
                                      revisao_ap

				    ) 
				   VALUES(
				   '{$_POST['id_swap']}',	
				   '{$_POST['ap_inicial']}',	
				   '{$_POST['de_qtd']}',
				   'inicial',
				   '$revisao_ap2'			      
				   )";
(!mysql_query($query,$conecta)); 


$queryup="UPDATE cip_nv.tbl_swap 
        SET de_aparelho_inicial='{$_POST['ap_inicial']}',	
			de_qtd ='{$_POST['de_qtd']}'
        WHERE id_swap= '{$_POST['id_swap']}' ";
(!mysql_query($queryup,$conecta)); 




	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
	       redireciona();
               window.close();
		</script>
 		";
          exit();
          
          
?>    
</div>
</body>
</html>