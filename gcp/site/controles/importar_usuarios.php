<div class="divformcarrega">
    <script>
        <!--
        //Criado por: Saulo de assis       
        function Carregado(){
          Msg_Carregando.style.display='none';
          pagina.style.display='block';
        }
        -->
    </script>
</head>

    <div id="Msg_Carregando">
    <script>
        <!--
      //  document.write('<img src = "../img/carregando.gif"> Carregando...')
        -->
    </script>
    </div>
    <script>
        <!--
       // document.write('<div id="pagina" style="display: none;">')
        -->
    </script>
<?php
    $tempo = 0;

  set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");
  
  
  function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}


function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,7,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."/".substr($string,7,2)."/".substr($string,0,2);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,6,4)."".substr($string2,7,2)."".substr($string2,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,6,4)."/".substr($string2,7,2)."/".substr($string2,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}


//inicia conexão com o banco de dados

    $tempo = 0;
  set_time_limit($tempo);
  
ini_set('mysql.connect_timeout' ,  '60' ); 
ini_set('default_socket_timeout' ,  '60' );
ini_set('memory_limit', '-1'); 

//Recebe o nome do arquivo enviado
$nome_temporario=$_FILES["file"]["tmp_name"]; 
$nome_arquivo = $nome_temporario;
//Abre o arquivo CSV



$abraArq = fopen("$nome_arquivo", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq)
	{
    	echo ("<p>Arquivo n&atilde;o encontrado</p>");
	}

else
	{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    	while ($linha = fgetcsv ($abraArq, 4096, ";"))
    	{
        	if($headerLine)
        	{
            $headerLine = false;
        	}

        	else
        	{


           $nome=$linha[0];
           $login=$linha[1];
           $cpf=$linha[2];

$sql_adabas="SELECT count(CPF) as total FROM cip_nv.ativos WHERE CPF='$cpf'";
$acao_adabas = mysql_query($sql_adabas,$conecta) or die (mysql_error());
$count = mysql_fetch_array($acao_adabas);
$num=$count['total']; 
  
  
$sql_adabas="SELECT count(CPF) as total FROM cip_nv.ativos WHERE  login='$login'";
$acao_adabas = mysql_query($sql_adabas,$conecta) or die (mysql_error());
$count = mysql_fetch_array($acao_adabas);
$num2=$count['total'];           
           
  if($num == 0 && $num2 == 0 ){         


			$sql = "INSERT IGNORE INTO cip_nv.ativos (nome_completo,
                                         login,
                                          CPF)VALUES('$nome',
															                       '$login',
                                                       '$cpf')";

      $result = mysql_query($sql,$conecta) or die(mysql_error());
				   
				   //    echo $sql;
				   
				 }
}
}
}
// Fecha arquivo aberto
fclose($abraArq);

 echo "<div class='divmsg bradius' style='background:#E7E4D1;'>"; 
if($num == 0 && $num2 == 0){            
                                                        
echo "<font color='#000000' face='arial' size='2'>Base usuarios atualizada com sucesso!.<br>";

}elseif($num != 0 && $num2 == 0){   
    echo "<font color='#000000' face='arial' size='2'>Usuarios já constam na base ativos por gentileza verificar cpf divergente!.<br>";
 }elseif($num2 != 0 && $num == 0){   
    echo "<font color='#000000' face='arial' size='2'>Usuarios já constam na base ativos por gentileza verificar login divergente !.<br>";
 }elseif($num != 0 && $num2 != 0 ){   
    echo "<font color='#000000' face='arial' size='2'>Usuarios já constam na base ativos por gentileza verificar o cpf e o login !.<br>";
 }
echo "<div/>";


 mysql_free_result($acao_adabas,$result);
 mysql_close($conecta);   
 
?>
<br /><br /><br /><br />	 
<p>
    <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?t=forms/formcarga_usuarios.php'" />
     <script>
        <!--
    //    document.write('</div>')
        -->
    </script>
    
</div>    
</body>
</html>
