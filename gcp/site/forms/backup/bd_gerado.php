

<div class="divbkpgerado bradius">
 <p align="center"><b>
  <font color="#337ab7" size="4" face="Verdana, Arial, Helvetica, sans-serif">Lista de backups gerados</font></b></p><br/>
<p align="center">
<?php

// Define o tempo máximo de execução em 0 para as conexões lentas
set_time_limit(0);

function get_files_dir($dir, $tipos = null){
      if(file_exists($dir)){
          $dh =  opendir($dir);
          while (false !== ($filename = readdir($dh))) {
              if($filename != '.' && $filename != '..'){
                  if(is_array($tipos)){
                      $extensao = get_extensao_file($filename);
                      if(in_array($extensao, $tipos)){
                          $files[] = $filename;
                      }
                  }
                  else{
                      $files[] = $filename;
                  }
              }
          }
          if(is_array($files)){
              sort($files);
          }
          return $files;
      }
      else{
          return false;
      }
}
function get_extensao_file($nome){
    $verifica = explode('.', $nome);
    return $verifica[count($verifica) - 1];
} 
  
// Arqui você faz as validações e/ou pega os dados do banco de dados
   $path = "site/forms/backup/backup_banco/";
  /* $diretorio = dir($path);
    
     
    while($arquivo = $diretorio -> read()){
     



    echo "<p style='border: #735D25 solid; padding: 3px 3px 3px 3px;' class='bradius' align='center'><a href='".$path.$arquivo."'>".$arquivo."</a></p><br />";
      
      }
    
   $diretorio -> close();*/



$extensoes = array('zip','sql');
$nomes = get_files_dir($path, $extensoes);
 
if(is_array($nomes)){
    foreach ($nomes as $nome){
   echo "<p style='border: #ffffff solid; padding: 3px 3px 3px 3px;' class='bradius' align='center'>
   <a href='".$path.$nome."'>".$nome."</a></p><br />";
    }
}



  ?>
</P>
  <br/>
  <p align="center">
<input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php'" class="sb2 bradius"/>
 </p><br/> 
  </div>