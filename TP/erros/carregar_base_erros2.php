<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../../tp/css/padrao.css" rel="stylesheet" type="text/css">
 <script>
    <!--
    function Carregado() {
      Msg_Carregando.style.display='none';
      pagina.style.display='block';
    }
    -->
    </script>
</head>
<body OnLoad="Carregado()" background="../../tp/img/background.JPG">
    <div id="Msg_Carregando">
      <script>
      <!--
      document.write('<img src = "../img/carregando.gif"> Carregando...')
      -->
      </script>
      </div>
      <script>
      <!--
      document.write('<div id="pagina" style="display: none;">')
      -->
      </script>
 
        
<?php

$tempo = 0;

set_time_limit($tempo);

  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");

//inicia conexão com o banco de dados
include "../conexao.php";

//Recebe o nome do arquivo enviado
//$nome_temporario=$_FILES["file"]["tmp_name"]; 
$nome_arquivo = $tempor;
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

                 for($i=0;$i < $linha[6];$i++){
                  
                      $sql = "INSERT IGNORE INTO base_erros_linhas ( pedido,
														          revisao)VALUES('$linha[6]',
															                     '$linha[9]'
															                               )";
                       $result = mysql_query($sql) or die(mysql_error());
                                 
                   }
                                  
                 
                 
				 
$sql_valida2 ="SELECT pedido,revisao from base_erros_linhas where pedido='$linha[6]' and revisao = '$linha[9]'";
			$acao_valida2 = mysql_query($sql_valida2) or die (mysql_error());	
								
				$dado= mysql_fetch_array($acao_valida2);
				{
				$pedido = $dado["pedido"];
				}
				$contlinhas=mysql_num_rows($acao_valida2);	 
   				 
          
				/*echo $pedido."=".$contlinhas;
				echo "<br>";*/				 
		 
$sql_valida4 ="UPDATE base_erros_linhas set linhas = '$contlinhas' where pedido='$linha[6]' and revisao = '$linha[9]'";
$acao_valida4 = mysql_query($sql_valida4) or die (mysql_error());	

			 
$sql_valida6 ="UPDATE base_erros set linhas = '$contlinhas' where pedido='$linha[6]' and revisao = '$linha[9]'";
$acao_valida6 = mysql_query($sql_valida6) or die (mysql_error());	


                       
}
}

 }
                 	


echo "<br><font color='#999999' face='arial' size='2'>Base atualizada com sucesso!</font>";
/*
echo"
		<script type=\"text/javascript\">
		alert('Base Carregada efetuado!');
		document.location.replace('../../tp/erros/adm_erros.php');
		</script>
 		";*/

?>
	

     <script>
    <!--
    document.write('</div>')
    -->
    </script>

</body>
</html>