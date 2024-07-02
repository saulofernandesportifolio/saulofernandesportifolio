<?php
//echo "<script>alert('Logout realizado com sucesso!');
setcookie('id',"");
      die("<script>
                alert('Logout realizado com sucesso!');
                document.location.replace('index.php');
         </script>"); 
      //window.top.close('index.php','Toolbar'); </script>\n";
?>