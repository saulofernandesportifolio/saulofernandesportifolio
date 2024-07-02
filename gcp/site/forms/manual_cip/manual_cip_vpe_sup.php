<?php
/*$arquivo = "CIP_VPE_SUP.docx"; //Nome do arquivo
$arquivo = file($arquivo);
$abrir = fopen("$arquivo", "a"); //Abre o arquivo
if (!$abrir){    //Vamos ver se deu certo
echo "Não foi possivel ler as informações!Verifique o script novamente!";  //Msg de erro
}else{
foreach ($arquivo as $texto) { //Lendo o arquivo
echo $texto;
}
}*/

$App = new COM ("palavra.aplicação") or die ("Não foi possível instanciar Palavra");

 

$file->Documentos->Open("myfile.doc");

$content = fread ($fh,filesize ($arquivo));
< p > echo $ content ; 

?>