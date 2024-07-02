
<?php

function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,7,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."-".substr($string,7,2)."-".substr($string,0,2);   
    }

 return $data;
}


include '../../bd.php';

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        echo $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
  
        }




if($perfil != 1 && $perfil != 16){
    
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
  $dt_dia = date("Y-m-d H:i:s");
 
if(empty($_POST['linha_pn']) 
  || empty($_POST['dtjanela'])){



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

$sql="SELECT * FROM bd_erros_pn.tbl_linha_chave_pn 
      WHERE linha_pn='{$_POST['linha_pn']}' AND data_janela='".arrumadata($_POST['dtjanela'])."' ";	
$result = mysql_query($sql) or die(mysql_error());
$num=mysql_num_rows($result);

if($num != 0){

echo"
		<script type=\"text/javascript\">
		alert('Numero e janela com o mesmos status ja cadastrados!');
		history.back();
		</script>
 		";

exit();

}


 $query="INSERT INTO bd_erros_pn.tbl_linha_chave_pn(
                                      protocolo,
                                      linha_pn,
                                      data_janela,
                                      usuario,
                                      data_cadastro
				    ) 
				   VALUES(
				   '{$_POST['protocolo']}',
				   '{$_POST['linha_pn']}',
                                   '".arrumadata($_POST['dtjanela'])."',
				   '$nome',
                                   '$dt_dia'
				   )";
(!mysql_query($query,$conecta)); 



$protocolo=$_POST['protocolo'];

echo"
<script>
document.location.replace('../../site/forms/form_cadastro_linhas_pn.php?perfil={$perfil}&protocolo={$protocolo}');
</script>
 	";
 
  
          
?>    
</div>
</body>
</html>