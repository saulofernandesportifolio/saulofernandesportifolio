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
                      senha='empreza'
                     WHERE idtbl_usuario='$id' ";
       $result = mysql_query($sql_update) or die(mysql_error()); 
   }
    
           echo "<script>alert('Reset efetuado com sucesso!'); 
                document.location.replace('principal.php?t=forms/formreset_usuarios.php');
                       </script>\n";
     	exit; 

} 

?>	


</body>
</html>