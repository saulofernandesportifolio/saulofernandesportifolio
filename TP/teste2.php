<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/padrao.css" rel="stylesheet" style="text/css">

<?php
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$texto = $_POST['texto'];
$textarea = ($texto);
?>
                <table id="table_conteudo"  align="center" border="0">
               		<tr >
                      <td id="t_td">Email</td>
                      <td id="t_td"> <?php echo $email ?>
                      </td>
                    </tr>
                    <tr >
                      <td id="t_td">Assunto</td>
                  	   <td id="t_td"> <?php echo $assunto ?>
                       </td>
                    </tr>
                    <tr >
                      <td id="t_td">Texto</td>
                  	   <td id="t_td"> <?php   print "<p>".nl2br($texto)."</p>" ?>
                       </td>
                    </tr>
                    <tr><td id="t_td"></td>
                    <td id="t_td">
     <a href="mailto:<?php echo $email ?>?subject=<?php echo $assunto ?>&body=email teste /n teste">Email</a> 
                    </td>
                    </tr>
  </table>