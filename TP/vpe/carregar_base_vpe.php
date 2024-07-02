<?php @session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E - GTQ  - Gestão Tramite Qualidade</title>
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


$deletar = "delete from base_vpe";
$acao_deletar = mysql_query($deletar) or die (mysql_error());


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


           $cnpj=$linha[0];
           $cnpj33=$linha[1];
           $te=$linha[2];

           //echo $cnpj33;
           
           
           


						 $sql = "INSERT IGNORE INTO base_vpe (cnpj,
                                                              cnpj_raiz,
                                                              te
															   )
                                                               VALUES(
															   '$cnpj',
															   '$cnpj33',
                                                               '$te'
															   	)";

                   $result = mysql_query($sql) or die(mysql_error());
				   
				   echo $sql;
				   
				 }
}
}


     
     


	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('../../tp/home.php');
		</script>
 		";
?>


</body>
</html>