<?php
  

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
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

 
  
  function arrumadata($string) {
    if($string == ''){
    $data= substr($string,8,2)."".substr($string,5,2)."".substr($string,0,4);   
        
    }else{
        
    $data= substr($string,8,2)."/".substr($string,5,2)."/".substr($string,0,4);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}
  
     function arrumadata2($string3) {
    if($string3 == ''){
    $data= substr($string3,6,4)."".substr($string3,3,2)."".substr($string3,0,2);   
        
    }else{
        
    $data= substr($string3,6,4)."/".substr($string3,3,2)."/".substr($string3,0,2);   
    }

 return $data;
} 

if(empty($_POST['n_da_cotacao']) ){ 
    
   
   
echo "
       <script type=\"text/javascript\">
        alert('É nescessário digitar uma cotação !');
       document.location.replace('principal.php?&t=forms/formconsulta_cotacoes_diretoria.php');
      </script>
 ";
  exit();

}

/*$sql333="SELECT  * FROM cip_nv.tbl_cotacao a 
      WHERE a.cotacao_principal= '{$_POST['n_da_cotacao']}'*/
echo '<br>';

$sqlva="CALL cip_nv.visao_diretoria_tramite_atual_cip("."'{$_POST['n_da_cotacao']}'".")";


$acaova = mysql_query($sqlva,$conecta) or die (mysql_error());
$num_va = mysql_num_rows($acaova);
$num_va1 = mysql_fetch_array($acaova);

/*echo '<br>';

echo "este é o numero: ".$num_va;

echo '<br>';

echo "este é a revisao: ".$num_va1['id_cotacao'].' '.$num_va1['revisao'];

echo '<br>';*/



if( $num_va <= 0){

    
echo "<script>
           alert('Esta cotação não encontra-se tramitando na base do gcp cotações.');
            document.location.replace('principal.php?t=forms/formconsulta_cotacoes_diretoria.php');
         </script>";

exit();
}


$id_cota=$num_va1['id_cotacao']; 

echo "<script>
          document.location.replace('principal.php?&id_cota=$id_cota&t=forms/formconsulta_cotacoes_diretoria2.php');
         </script>";

