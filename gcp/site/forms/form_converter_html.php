
<?php

if($perfil != 1 && $perfil != 14 && $perfil != 4){
    
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

?>



<?php

// Include Composer autoloader if not already done.
include 'principal.php?t=vendor/autoload.php';
 
 $doc='principal.php?t=forms/teste.pdf';
// Parse pdf file and build necessary objects.
$parser = new \Smalot\PdfParser\Parser();
$pdf    = $parser->parseFile($doc);
 
$text = $pdf->getText();
echo $text;
 
?>

