<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("Y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  




$_POST["ling"];

if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhum usuario selecionado.'); window.history.go(-1); </script>\n";
	exit;
}

else
{
   
   foreach($_POST["ling"] as $id)
  {


        //Monta SQL para update
       $sql_update ="UPDATE tbl_usuarios 
                      SET 
                      status=1
                     WHERE idtbl_usuario='$id' ";
       $result = mysql_query($sql_update) or die(mysql_error()); 
   }
    
$sup= $_POST["sup"];
 $setor=$_POST["setor"];


    
           echo "<script>alert('Ativa\u00e7\u00e3o efetuada com sucesso!'); 
                document.location.replace('principal.php?&sup={$sup}&setor={$setor}&t=forms/formativar_usuarios.php');
                       </script>\n";
     	exit; 

} 

?>	


</body>
</html>