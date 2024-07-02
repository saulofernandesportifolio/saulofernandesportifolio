
<?php




$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $dt_tratamento_input= date("Y/m/d"); 
 $hora_tratamento_input=date("H:i:s");

  function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}



 $idtbl_usuario=$_COOKIE['idtbl_usuario'];


if(empty($adabas)){
    
echo" <script> 
      alert('Por favor preencher o formulario com todos os dados !');
      history.back();
      </script>
      "; 
      exit();   
    
}


$sql_adabas="SELECT count(codigo_adabas) as total FROM tbl_adabas WHERE codigo_adabas='$adabas'";
$acao_adabas = mysql_query($sql_adabas) or die (mysql_error());
$count = mysql_fetch_array($acao_adabas);
$num=$count['total'];		

if($num == 0 ){


   $sql_inserir3 ="INSERT INTO tbl_adabas(codigo_adabas)
                                                VALUES('$adabas'
                                                       )";
             $result3 = mysql_query($sql_inserir3) or die(mysql_error());

 
 
        
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/formadabas.php');
      </script>
      ";                                        
    exit();
    
    }else{
    echo" <script> 
      alert('Cadastro existente!');
      document.location.replace('principal.php?&t=forms/formadabas.php');
      </script>
      ";                                        
    exit();    
        
    }
    
?>