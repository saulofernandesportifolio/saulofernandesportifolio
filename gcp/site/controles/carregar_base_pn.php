
<?php 

function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"´]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}

function tiraaspasimples($valor){
  $result = addslashes($valor);
  $virgula = "\'";
  $result2 = str_replace($virgula, ".", $result);
  return $result2;

  //echo $result;

}

$tempo = 0;

set_time_limit($tempo);
date_default_timezone_set("Brazil/East");

  //$data_inclusao_bd = date("Y/m/d H:i:s");
 $dt_dia = date("Y/m/d");

//inicia conexão com o banco de dados
include "../bd.php";

 ini_set('memory_limit', '-1'); 



/*******************************BLOCO ARQUIVO CO*****************************************/

//Recebe o nome do arquivo enviado
$nome_temporario=$_FILES["file"]["tmp_name"]; 
$nome_arquivo = $nome_temporario;
//echo '<br/>';

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

                $sql_valida = "SELECT * FROM bd_erros_pn.controle_pn  
                                   WHERE numero_pedido = '$linha[3]' and status_pedido = '$linha[5]' ";
                $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);
			
				 $teste = "$linha_valida";	
				
										
                //echo $teste;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0)
                {
                  
  


                }else{
                //Se não localizado, realiza a inclusão em banco de dados

                 $linha[9]= tiraaspasimples($linha[9]);
                 $linha[11]= tiraaspasimples($linha[11]);
                 $linha[13]= tiraaspasimples($linha[13]);
                 $linha[32]= tiraaspasimples($linha[32]);
                 $linha[62]= tiraaspasimples($linha[62]);
                 $linha[63]= tiraaspasimples($linha[63]);
                 
           
                 
            if(strstr($linha[22],'MPJ') || strpos($linha[22],'8000')){
                
               if(strstr($linha[7],'VPE - GOV')){
               
                 $site='VPE GOV'; 
                 
                }elseif(!strstr($linha[7],'VPE - GOV') && strstr($linha[7],'GOV')){
                   
                       $site='TOP GOV';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] == 'SP' ){
                   
                       $site='TOP SP';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] != 'SP' ){
                   
                       $site='TOP FSP';
                   
                    }elseif(strstr($linha[7],'VPE') && !strstr($linha[7],'GOV')){
                   
                       $site='VPE';
                   
                    }
               
                 
               if($linha[3] == 'Backoffice aprovado' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Executado parcialmente' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Validando PORTIN' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Erro Portabilidade' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Aguardando Autorização PORTIN' && strpos($linha[27],'portabilidade')  
                  || $linha[3] == 'Portabilidade Negada' && strpos($linha[27],'portabilidade') ){
    
             
                      $sql="CALL bd_erros_pn.carrega_relatoriogeral1('$site',
                                                                  '$linha[0]',
                                                                  '$linha[1]',
								  '$linha[2]',
								  '$linha[3]',
								  '$linha[4]', 
								  '$linha[5]', 
								  '$linha[6]',
								  '$linha[7]', 
								  '$linha[8]', 
								  '$linha[9]',  
								  '$linha[10]',
								  '$linha[11]',
								  '$linha[12]', 
								  '$linha[13]', 
								  '$linha[14]',
								  '$linha[15]',
                                                                  '$linha[16]', 
								  '$linha[17]',
								  '$linha[18]', 
								  '$linha[19]', 
								  '$linha[20]', 
								  '$linha[21]', 
								  '$linha[22]', 
								  '$linha[23]', 
								  '$linha[24]', 
								  '$linha[25]', 
								  '$linha[26]',
								  '$linha[27]',
                                                                  '$linha[28]',
                                                                  '$linha[29]',
                                                                  '$linha[30]',
                                                                  '$linha[31]',
                                                                  '$linha[32]',
                                                                  '$linha[33]',
                                                                  '$linha[34]',
                                                                  '$linha[35]',
                                                                  '$linha[36]',
                                                                  '$linha[37]',
                                                                  '$linha[38]',
                                                                  '$linha[39]',
                                                                  '$linha[40]',
                                                                  '$linha[41]',
                                                                  '$linha[42]',
                                                                  '$linha[43]',
                                                                  '$linha[44]',
                                                                  '$linha[45]',
                                                                  '$linha[46]',
                                                                  '$linha[47]',
                                                                  '$linha[48]',
                                                                  '$linha[49]',
                                                                  '$linha[50]',
                                                                  '$linha[51]',
                                                                  '$linha[52]',
                                                                  '$linha[53]',
                                                                  '$linha[54]',
                                                                  '$linha[55]',
                                                                  '$linha[56]',
                                                                  '$linha[57]',
                                                                  '$linha[58]',
                                                                  '$linha[59]',
                                                                  '$linha[60]',
                                                                  '$linha[61]',
                                                                  '$linha[62]',
                                                                  '$linha[63]' )"; 
                    
                        $result = mysql_query($sql,$conecta2) or die(mysql_error());
                    		   
                    }			      
		
                }
                
                                
 			   
            }

                                   
        }
    }
 
}

/*******************************BLOCO ARQUIVO CO*****************************************/




/*******************************BLOCO ARQUIVO LESTE*****************************************/
//Recebe o nome do arquivo enviado
$nome_temporario2=$_FILES["file2"]["tmp_name"]; 
$nome_arquivo2 = $nome_temporario2;
//echo '<br/>';
//Abre o arquivo CSV
$abraArq2 = fopen("$nome_arquivo2", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq2)
{
    echo ("<p>Arquivo n&atilde;o encontrado</p>");
}

else
{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    while ($linha = fgetcsv ($abraArq2, 4096, ";"))
    {
        if($headerLine)
        {
            $headerLine = false;
        }

        else
        {

                $sql_valida = "SELECT * FROM bd_erros_pn.controle_pn  
                                   WHERE numero_pedido = '$linha[3]' and status_pedido = '$linha[5]' ";
                $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);
			
				 $teste = "$linha_valida";	
				
										
                //echo $teste;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0)
                {
                  
  


                }else{
                //Se não localizado, realiza a inclusão em banco de dados

                 $linha[9]= tiraaspasimples($linha[9]);
                 $linha[11]= tiraaspasimples($linha[11]);
                 $linha[13]= tiraaspasimples($linha[13]);
                 $linha[32]= tiraaspasimples($linha[32]);
                 $linha[62]= tiraaspasimples($linha[62]);
                 $linha[63]= tiraaspasimples($linha[63]);
    
             if(strstr($linha[22],'MPJ') || strpos($linha[22],'8000')){ 
                 
               if(strstr($linha[7],'VPE - GOV')){
               
                 $site='VPE GOV'; 
                 
                }elseif(!strstr($linha[7],'VPE - GOV') && strstr($linha[7],'GOV')){
                   
                       $site='TOP GOV';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] == 'SP' ){
                   
                       $site='TOP SP';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] != 'SP' ){
                   
                       $site='TOP FSP';
                   
                    }elseif(strstr($linha[7],'VPE') && !strstr($linha[7],'GOV')){
                   
                       $site='VPE';
                   
                    }
               
                 
                if($linha[3] == 'Backoffice aprovado' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Executado parcialmente' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Validando PORTIN' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Erro Portabilidade' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Aguardando Autorização PORTIN' && strpos($linha[27],'portabilidade')  
                  || $linha[3] == 'Portabilidade Negada' && strpos($linha[27],'portabilidade') ){
       
                      $sql="CALL bd_erros_pn.carrega_relatoriogeral1('$site',
                                                                  '$linha[0]',
                                                                  '$linha[1]',
								  '$linha[2]',
								  '$linha[3]',
								  '$linha[4]', 
								  '$linha[5]', 
								  '$linha[6]',
								  '$linha[7]', 
								  '$linha[8]', 
								  '$linha[9]',  
								  '$linha[10]',
								  '$linha[11]',
								  '$linha[12]', 
								  '$linha[13]', 
								  '$linha[14]',
								  '$linha[15]',
                                                                  '$linha[16]', 
								  '$linha[17]',
								  '$linha[18]', 
								  '$linha[19]', 
								  '$linha[20]', 
								  '$linha[21]', 
								  '$linha[22]', 
								  '$linha[23]', 
								  '$linha[24]', 
								  '$linha[25]', 
								  '$linha[26]',
								  '$linha[27]',
                                                                  '$linha[28]',
                                                                  '$linha[29]',
                                                                  '$linha[30]',
                                                                  '$linha[31]',
                                                                  '$linha[32]',
                                                                  '$linha[33]',
                                                                  '$linha[34]',
                                                                  '$linha[35]',
                                                                  '$linha[36]',
                                                                  '$linha[37]',
                                                                  '$linha[38]',
                                                                  '$linha[39]',
                                                                  '$linha[40]',
                                                                  '$linha[41]',
                                                                  '$linha[42]',
                                                                  '$linha[43]',
                                                                  '$linha[44]',
                                                                  '$linha[45]',
                                                                  '$linha[46]',
                                                                  '$linha[47]',
                                                                  '$linha[48]',
                                                                  '$linha[49]',
                                                                  '$linha[50]',
                                                                  '$linha[51]',
                                                                  '$linha[52]',
                                                                  '$linha[53]',
                                                                  '$linha[54]',
                                                                  '$linha[55]',
                                                                  '$linha[56]',
                                                                  '$linha[57]',
                                                                  '$linha[58]',
                                                                  '$linha[59]',
                                                                  '$linha[60]',
                                                                  '$linha[61]',
                                                                  '$linha[62]',
                                                                  '$linha[63]' )"; 
                    
                      $result = mysql_query($sql,$conecta2) or die(mysql_error());
                   		   
                    }			      
               }
               
	   
				   
            }

                                   
        }
    }
 
}

/*******************************BLOCO ARQUIVO LESTE*****************************************/





/*******************************BLOCO ARQUIVO MG*****************************************/
//Recebe o nome do arquivo enviado
$nome_temporario3=$_FILES["file3"]["tmp_name"]; 
$nome_arquivo3 = $nome_temporario3;
//echo '<br/>';
//Abre o arquivo CSV
$abraArq3 = fopen("$nome_arquivo3", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq3)
{
    echo ("<p>Arquivo n&atilde;o encontrado</p>");
}

else
{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    while ($linha = fgetcsv ($abraArq3, 4096, ";"))
    {
        if($headerLine)
        {
            $headerLine = false;
        }

        else
        {

                $sql_valida = "SELECT * FROM bd_erros_pn.controle_pn  
                                   WHERE numero_pedido = '$linha[3]' and status_pedido = '$linha[5]' ";
                $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);
			
				 $teste = "$linha_valida";	
				
										
                //echo $teste;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0)
                {
                  
  


                }else{
                //Se não localizado, realiza a inclusão em banco de dados

                 $linha[9]= tiraaspasimples($linha[9]);
                 $linha[11]= tiraaspasimples($linha[11]);
                 $linha[13]= tiraaspasimples($linha[13]);
                 $linha[32]= tiraaspasimples($linha[32]);
                 $linha[62]= tiraaspasimples($linha[62]);
                 $linha[63]= tiraaspasimples($linha[63]);
    
             if(strstr($linha[22],'MPJ') || strpos($linha[22],'8000')){  
                 
               if(strstr($linha[7],'VPE - GOV')){
               
                 $site='VPE GOV'; 
                 
                }elseif(!strstr($linha[7],'VPE - GOV') && strstr($linha[7],'GOV')){
                   
                       $site='TOP GOV';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] == 'SP' ){
                   
                       $site='TOP SP';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] != 'SP' ){
                   
                       $site='TOP FSP';
                   
                    }elseif(strstr($linha[7],'VPE') && !strstr($linha[7],'GOV')){
                   
                       $site='VPE';
                   
                    }
               
                 
               if($linha[3] == 'Backoffice aprovado' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Executado parcialmente' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Validando PORTIN' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Erro Portabilidade' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Aguardando Autorização PORTIN' && strpos($linha[27],'portabilidade')  
                  || $linha[3] == 'Portabilidade Negada' && strpos($linha[27],'portabilidade') ){
    
         
                      $sql="CALL bd_erros_pn.carrega_relatoriogeral1('$site',
                                                                  '$linha[0]',
                                                                  '$linha[1]',
								  '$linha[2]',
								  '$linha[3]',
								  '$linha[4]', 
								  '$linha[5]', 
								  '$linha[6]',
								  '$linha[7]', 
								  '$linha[8]', 
								  '$linha[9]',  
								  '$linha[10]',
								  '$linha[11]',
								  '$linha[12]', 
								  '$linha[13]', 
								  '$linha[14]',
								  '$linha[15]',
                                                                  '$linha[16]', 
								  '$linha[17]',
								  '$linha[18]', 
								  '$linha[19]', 
								  '$linha[20]', 
								  '$linha[21]', 
								  '$linha[22]', 
								  '$linha[23]', 
								  '$linha[24]', 
								  '$linha[25]', 
								  '$linha[26]',
								  '$linha[27]',
                                                                  '$linha[28]',
                                                                  '$linha[29]',
                                                                  '$linha[30]',
                                                                  '$linha[31]',
                                                                  '$linha[32]',
                                                                  '$linha[33]',
                                                                  '$linha[34]',
                                                                  '$linha[35]',
                                                                  '$linha[36]',
                                                                  '$linha[37]',
                                                                  '$linha[38]',
                                                                  '$linha[39]',
                                                                  '$linha[40]',
                                                                  '$linha[41]',
                                                                  '$linha[42]',
                                                                  '$linha[43]',
                                                                  '$linha[44]',
                                                                  '$linha[45]',
                                                                  '$linha[46]',
                                                                  '$linha[47]',
                                                                  '$linha[48]',
                                                                  '$linha[49]',
                                                                  '$linha[50]',
                                                                  '$linha[51]',
                                                                  '$linha[52]',
                                                                  '$linha[53]',
                                                                  '$linha[54]',
                                                                  '$linha[55]',
                                                                  '$linha[56]',
                                                                  '$linha[57]',
                                                                  '$linha[58]',
                                                                  '$linha[59]',
                                                                  '$linha[60]',
                                                                  '$linha[61]',
                                                                  '$linha[62]',
                                                                  '$linha[63]' )"; 
                    
                      $result = mysql_query($sql,$conecta2) or die(mysql_error());
                   		   
                   }			      
                }
	   

				   
            }

                                   
        }
    }
 
}

/*******************************BLOCO ARQUIVO MG*****************************************/



/*******************************BLOCO ARQUIVO N*****************************************/
//Recebe o nome do arquivo enviado
$nome_temporario4=$_FILES["file4"]["tmp_name"]; 
$nome_arquivo4 = $nome_temporario4;
//echo '<br/>';
//Abre o arquivo CSV
$abraArq4 = fopen("$nome_arquivo4", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq4)
{
    echo ("<p>Arquivo n&atilde;o encontrado</p>");
}

else
{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    while ($linha = fgetcsv ($abraArq4, 4096, ";"))
    {
        if($headerLine)
        {
            $headerLine = false;
        }

        else
        {

                $sql_valida = "SELECT * FROM bd_erros_pn.controle_pn  
                                   WHERE numero_pedido = '$linha[3]' and status_pedido = '$linha[5]' ";
                $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);
			
				 $teste = "$linha_valida";	
				
										
                //echo $teste;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0)
                {
                  
  


                }else{
                //Se não localizado, realiza a inclusão em banco de dados

                 $linha[9]= tiraaspasimples($linha[9]);
                 $linha[11]= tiraaspasimples($linha[11]);
                 $linha[13]= tiraaspasimples($linha[13]);
                 $linha[32]= tiraaspasimples($linha[32]);
                 $linha[62]= tiraaspasimples($linha[62]);
                 $linha[63]= tiraaspasimples($linha[63]);
    
            if(strstr($linha[22],'MPJ') || strpos($linha[22],'8000')){  
                
               if(strstr($linha[7],'VPE - GOV')){
               
                 $site='VPE GOV'; 
                 
                }elseif(!strstr($linha[7],'VPE - GOV') && strstr($linha[7],'GOV')){
                   
                       $site='TOP GOV';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] == 'SP' ){
                   
                       $site='TOP SP';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] != 'SP' ){
                   
                       $site='TOP FSP';
                   
                    }elseif(strstr($linha[7],'VPE') && !strstr($linha[7],'GOV')){
                   
                       $site='VPE';
                   
                    }
                
               if($linha[3] == 'Backoffice aprovado' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Executado parcialmente' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Validando PORTIN' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Erro Portabilidade' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Aguardando Autorização PORTIN' && strpos($linha[27],'portabilidade')  
                  || $linha[3] == 'Portabilidade Negada' && strpos($linha[27],'portabilidade') ){
     
                      $sql="CALL bd_erros_pn.carrega_relatoriogeral1('$site',
                                                                  '$linha[0]',
                                                                  '$linha[1]',
								  '$linha[2]',
								  '$linha[3]',
								  '$linha[4]', 
								  '$linha[5]', 
								  '$linha[6]',
								  '$linha[7]', 
								  '$linha[8]', 
								  '$linha[9]',  
								  '$linha[10]',
								  '$linha[11]',
								  '$linha[12]', 
								  '$linha[13]', 
								  '$linha[14]',
								  '$linha[15]',
                                                                  '$linha[16]', 
								  '$linha[17]',
								  '$linha[18]', 
								  '$linha[19]', 
								  '$linha[20]', 
								  '$linha[21]', 
								  '$linha[22]', 
								  '$linha[23]', 
								  '$linha[24]', 
								  '$linha[25]', 
								  '$linha[26]',
								  '$linha[27]',
                                                                  '$linha[28]',
                                                                  '$linha[29]',
                                                                  '$linha[30]',
                                                                  '$linha[31]',
                                                                  '$linha[32]',
                                                                  '$linha[33]',
                                                                  '$linha[34]',
                                                                  '$linha[35]',
                                                                  '$linha[36]',
                                                                  '$linha[37]',
                                                                  '$linha[38]',
                                                                  '$linha[39]',
                                                                  '$linha[40]',
                                                                  '$linha[41]',
                                                                  '$linha[42]',
                                                                  '$linha[43]',
                                                                  '$linha[44]',
                                                                  '$linha[45]',
                                                                  '$linha[46]',
                                                                  '$linha[47]',
                                                                  '$linha[48]',
                                                                  '$linha[49]',
                                                                  '$linha[50]',
                                                                  '$linha[51]',
                                                                  '$linha[52]',
                                                                  '$linha[53]',
                                                                  '$linha[54]',
                                                                  '$linha[55]',
                                                                  '$linha[56]',
                                                                  '$linha[57]',
                                                                  '$linha[58]',
                                                                  '$linha[59]',
                                                                  '$linha[60]',
                                                                  '$linha[61]',
                                                                  '$linha[62]',
                                                                  '$linha[63]' )"; 
                    
                      $result = mysql_query($sql,$conecta2) or die(mysql_error());
                    		   
                    }			      
               }
	       

				   
            }

                                   
        }
    }
 
}

/*******************************BLOCO ARQUIVO N*****************************************/





/*******************************BLOCO ARQUIVO NE*****************************************/
//Recebe o nome do arquivo enviado
$nome_temporario5=$_FILES["file5"]["tmp_name"]; 
$nome_arquivo5 = $nome_temporario5;
//echo '<br/>';
//Abre o arquivo CSV
$abraArq5 = fopen("$nome_arquivo5", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq5)
{
    echo ("<p>Arquivo n&atilde;o encontrado</p>");
}

else
{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    while ($linha = fgetcsv ($abraArq5, 4096, ";"))
    {
        if($headerLine)
        {
            $headerLine = false;
        }

        else
        {

                $sql_valida = "SELECT * FROM bd_erros_pn.controle_pn  
                                   WHERE numero_pedido = '$linha[3]' and status_pedido = '$linha[5]' ";
                $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);
			
				 $teste = "$linha_valida";	
				
										
                //echo $teste;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0)
                {
                  
  


                }else{
                //Se não localizado, realiza a inclusão em banco de dados

                 $linha[9]= tiraaspasimples($linha[9]);
                 $linha[11]= tiraaspasimples($linha[11]);
                 $linha[13]= tiraaspasimples($linha[13]);
                 $linha[32]= tiraaspasimples($linha[32]);
                 $linha[62]= tiraaspasimples($linha[62]);
                 $linha[63]= tiraaspasimples($linha[63]);
    
            if(strstr($linha[22],'MPJ') || strpos($linha[22],'8000')){ 
                
               if(strstr($linha[7],'VPE - GOV')){
               
                 $site='VPE GOV'; 
                 
                }elseif(!strstr($linha[7],'VPE - GOV') && strstr($linha[7],'GOV')){
                   
                       $site='TOP GOV';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] == 'SP' ){
                   
                       $site='TOP SP';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] != 'SP' ){
                   
                       $site='TOP FSP';
                   
                    }elseif(strstr($linha[7],'VPE') && !strstr($linha[7],'GOV')){
                   
                       $site='VPE';
                   
                    }
                
               if($linha[3] == 'Backoffice aprovado' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Executado parcialmente' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Validando PORTIN' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Erro Portabilidade' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Aguardando Autorização PORTIN' && strpos($linha[27],'portabilidade')  
                  || $linha[3] == 'Portabilidade Negada' && strpos($linha[27],'portabilidade') ){
    
              
                        $sql="CALL bd_erros_pn.carrega_relatoriogeral1('$site',
                                                                  '$linha[0]',
                                                                  '$linha[1]',
								  '$linha[2]',
								  '$linha[3]',
								  '$linha[4]', 
								  '$linha[5]', 
								  '$linha[6]',
								  '$linha[7]', 
								  '$linha[8]', 
								  '$linha[9]',  
								  '$linha[10]',
								  '$linha[11]',
								  '$linha[12]', 
								  '$linha[13]', 
								  '$linha[14]',
								  '$linha[15]',
                                                                  '$linha[16]', 
								  '$linha[17]',
								  '$linha[18]', 
								  '$linha[19]', 
								  '$linha[20]', 
								  '$linha[21]', 
								  '$linha[22]', 
								  '$linha[23]', 
								  '$linha[24]', 
								  '$linha[25]', 
								  '$linha[26]',
								  '$linha[27]',
                                                                  '$linha[28]',
                                                                  '$linha[29]',
                                                                  '$linha[30]',
                                                                  '$linha[31]',
                                                                  '$linha[32]',
                                                                  '$linha[33]',
                                                                  '$linha[34]',
                                                                  '$linha[35]',
                                                                  '$linha[36]',
                                                                  '$linha[37]',
                                                                  '$linha[38]',
                                                                  '$linha[39]',
                                                                  '$linha[40]',
                                                                  '$linha[41]',
                                                                  '$linha[42]',
                                                                  '$linha[43]',
                                                                  '$linha[44]',
                                                                  '$linha[45]',
                                                                  '$linha[46]',
                                                                  '$linha[47]',
                                                                  '$linha[48]',
                                                                  '$linha[49]',
                                                                  '$linha[50]',
                                                                  '$linha[51]',
                                                                  '$linha[52]',
                                                                  '$linha[53]',
                                                                  '$linha[54]',
                                                                  '$linha[55]',
                                                                  '$linha[56]',
                                                                  '$linha[57]',
                                                                  '$linha[58]',
                                                                  '$linha[59]',
                                                                  '$linha[60]',
                                                                  '$linha[61]',
                                                                  '$linha[62]',
                                                                  '$linha[63]' )"; 
                    
                       $result = mysql_query($sql,$conecta2) or die(mysql_error());
                 	   
                    }			      
		
                }
                

				   
            }

                                   
        }
    }
 
}

/*******************************BLOCO ARQUIVO NE*****************************************/






/*******************************BLOCO ARQUIVO SP*****************************************/
//Recebe o nome do arquivo enviado
$nome_temporario6=$_FILES["file6"]["tmp_name"]; 
$nome_arquivo6 = $nome_temporario6;
//echo '<br/>';
//Abre o arquivo CSV
$abraArq6 = fopen("$nome_arquivo6", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq6)
{
    echo ("<p>Arquivo n&atilde;o encontrado</p>");
}

else
{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    while ($linha = fgetcsv ($abraArq6, 4096, ";"))
    {
        if($headerLine)
        {
            $headerLine = false;
        }

        else
        {

                $sql_valida = "SELECT * FROM bd_erros_pn.controle_pn  
                                   WHERE numero_pedido = '$linha[3]' and status_pedido = '$linha[5]' ";
                $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);
			
				 $teste = "$linha_valida";	
				
										
                //echo $teste;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0)
                {
                  
  


                }else{
                //Se não localizado, realiza a inclusão em banco de dados

                 $linha[9]= tiraaspasimples($linha[9]);
                 $linha[11]= tiraaspasimples($linha[11]);
                 $linha[13]= tiraaspasimples($linha[13]);
                 $linha[32]= tiraaspasimples($linha[32]);
                 $linha[62]= tiraaspasimples($linha[62]);
                 $linha[63]= tiraaspasimples($linha[63]);
    
            if(strstr($linha[22],'MPJ') || strpos($linha[22],'8000')){   
                
               if(strstr($linha[7],'VPE - GOV')){
               
                 $site='VPE GOV'; 
                 
                }elseif(!strstr($linha[7],'VPE - GOV') && strstr($linha[7],'GOV')){
                   
                       $site='TOP GOV';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] == 'SP' ){
                   
                       $site='TOP SP';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] != 'SP' ){
                   
                       $site='TOP FSP';
                   
                    }elseif(strstr($linha[7],'VPE') && !strstr($linha[7],'GOV')){
                   
                       $site='VPE';
                   
                    }
               
                
               if($linha[3] == 'Backoffice aprovado' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Executado parcialmente' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Validando PORTIN' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Erro Portabilidade' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Aguardando Autorização PORTIN' && strpos($linha[27],'portabilidade')  
                  || $linha[3] == 'Portabilidade Negada' && strpos($linha[27],'portabilidade') ){
    
                            
                      $sql="CALL bd_erros_pn.carrega_relatoriogeral1('$site',                                                                  '$linha[0]',
                                                                  '$linha[1]',
								  '$linha[2]',
								  '$linha[3]',
								  '$linha[4]', 
								  '$linha[5]', 
								  '$linha[6]',
								  '$linha[7]', 
								  '$linha[8]', 
								  '$linha[9]',  
								  '$linha[10]',
								  '$linha[11]',
								  '$linha[12]', 
								  '$linha[13]', 
								  '$linha[14]',
								  '$linha[15]',
                                                                  '$linha[16]', 
								  '$linha[17]',
								  '$linha[18]', 
								  '$linha[19]', 
								  '$linha[20]', 
								  '$linha[21]', 
								  '$linha[22]', 
								  '$linha[23]', 
								  '$linha[24]', 
								  '$linha[25]', 
								  '$linha[26]',
								  '$linha[27]',
                                                                  '$linha[28]',
                                                                  '$linha[29]',
                                                                  '$linha[30]',
                                                                  '$linha[31]',
                                                                  '$linha[32]',
                                                                  '$linha[33]',
                                                                  '$linha[34]',
                                                                  '$linha[35]',
                                                                  '$linha[36]',
                                                                  '$linha[37]',
                                                                  '$linha[38]',
                                                                  '$linha[39]',
                                                                  '$linha[40]',
                                                                  '$linha[41]',
                                                                  '$linha[42]',
                                                                  '$linha[43]',
                                                                  '$linha[44]',
                                                                  '$linha[45]',
                                                                  '$linha[46]',
                                                                  '$linha[47]',
                                                                  '$linha[48]',
                                                                  '$linha[49]',
                                                                  '$linha[50]',
                                                                  '$linha[51]',
                                                                  '$linha[52]',
                                                                  '$linha[53]',
                                                                  '$linha[54]',
                                                                  '$linha[55]',
                                                                  '$linha[56]',
                                                                  '$linha[57]',
                                                                  '$linha[58]',
                                                                  '$linha[59]',
                                                                  '$linha[60]',
                                                                  '$linha[61]',
                                                                  '$linha[62]',
                                                                  '$linha[63]' )"; 
                    
                      $result = mysql_query($sql,$conecta2) or die(mysql_error());
               	   
                    }			      
		
                }
                
                                

				   
            }

                                   
        }
    }
 
}

/*******************************BLOCO ARQUIVO SP*****************************************/






/*******************************BLOCO ARQUIVO SUL*****************************************/
//Recebe o nome do arquivo enviado
$nome_temporario7=$_FILES["file7"]["tmp_name"]; 
$nome_arquivo7 = $nome_temporario7;
//echo '<br/>';
//Abre o arquivo CSV
$abraArq7 = fopen("$nome_arquivo7", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq7)
{
    echo ("<p>Arquivo n&atilde;o encontrado</p>");
}

else
{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    while ($linha = fgetcsv ($abraArq7, 4096, ";"))
    {
        if($headerLine)
        {
            $headerLine = false;
        }

        else
        {

                $sql_valida = "SELECT * FROM bd_erros_pn.controle_pn  
                                   WHERE numero_pedido = '$linha[3]' and status_pedido = '$linha[5]' ";
                $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);
			
				 $teste = "$linha_valida";	
				
										
                //echo $teste;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0)
                {
                  
  


                }else{
                //Se não localizado, realiza a inclusão em banco de dados

                 $linha[9]= tiraaspasimples($linha[9]);
                 $linha[11]= tiraaspasimples($linha[11]);
                 $linha[13]= tiraaspasimples($linha[13]);
                 $linha[32]= tiraaspasimples($linha[32]);
                 $linha[62]= tiraaspasimples($linha[62]);
                 $linha[63]= tiraaspasimples($linha[63]);
    
           if(strstr($linha[22],'MPJ') || strpos($linha[22],'8000')){  
               
               if(strstr($linha[7],'VPE - GOV')){
               
                 $site='VPE GOV'; 
                 
                }elseif(!strstr($linha[7],'VPE - GOV') && strstr($linha[7],'GOV')){
                   
                       $site='TOP GOV';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] == 'SP' ){
                   
                       $site='TOP SP';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] != 'SP' ){
                   
                       $site='TOP FSP';
                   
                    }elseif(strstr($linha[7],'VPE') && !strstr($linha[7],'GOV')){
                   
                       $site='VPE';
                   
                    }
               
               if($linha[3] == 'Backoffice aprovado' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Executado parcialmente' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Validando PORTIN' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Erro Portabilidade' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Aguardando Autorização PORTIN' && strpos($linha[27],'portabilidade')  
                  || $linha[3] == 'Portabilidade Negada' && strpos($linha[27],'portabilidade') ){
    
         
                      
                       $sql="CALL bd_erros_pn.carrega_relatoriogeral1('$site',
                                                                  '$linha[0]',
                                                                  '$linha[1]',
								  '$linha[2]',
								  '$linha[3]',
								  '$linha[4]', 
								  '$linha[5]', 
								  '$linha[6]',
								  '$linha[7]', 
								  '$linha[8]', 
								  '$linha[9]',  
								  '$linha[10]',
								  '$linha[11]',
								  '$linha[12]', 
								  '$linha[13]', 
								  '$linha[14]',
								  '$linha[15]',
                                                                  '$linha[16]', 
								  '$linha[17]',
								  '$linha[18]', 
								  '$linha[19]', 
								  '$linha[20]', 
								  '$linha[21]', 
								  '$linha[22]', 
								  '$linha[23]', 
								  '$linha[24]', 
								  '$linha[25]', 
								  '$linha[26]',
								  '$linha[27]',
                                                                  '$linha[28]',
                                                                  '$linha[29]',
                                                                  '$linha[30]',
                                                                  '$linha[31]',
                                                                  '$linha[32]',
                                                                  '$linha[33]',
                                                                  '$linha[34]',
                                                                  '$linha[35]',
                                                                  '$linha[36]',
                                                                  '$linha[37]',
                                                                  '$linha[38]',
                                                                  '$linha[39]',
                                                                  '$linha[40]',
                                                                  '$linha[41]',
                                                                  '$linha[42]',
                                                                  '$linha[43]',
                                                                  '$linha[44]',
                                                                  '$linha[45]',
                                                                  '$linha[46]',
                                                                  '$linha[47]',
                                                                  '$linha[48]',
                                                                  '$linha[49]',
                                                                  '$linha[50]',
                                                                  '$linha[51]',
                                                                  '$linha[52]',
                                                                  '$linha[53]',
                                                                  '$linha[54]',
                                                                  '$linha[55]',
                                                                  '$linha[56]',
                                                                  '$linha[57]',
                                                                  '$linha[58]',
                                                                  '$linha[59]',
                                                                  '$linha[60]',
                                                                  '$linha[61]',
                                                                  '$linha[62]',
                                                                  '$linha[63]' )"; 
                    
                         $result = mysql_query($sql,$conecta2) or die(mysql_error());
                    }		   
                }
                
                                

            }

                                   
        }
    }
 
}

/*******************************BLOCO ARQUIVO SUL*****************************************/








/*******************************BLOCO ARQUIVO TODAS_UF*****************************************/
//Recebe o nome do arquivo enviado
$nome_temporario8=$_FILES["file8"]["tmp_name"]; 
$nome_arquivo8 = $nome_temporario8;
//echo '<br/>';
//Abre o arquivo CSV
$abraArq8 = fopen("$nome_arquivo8", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq8)
{
    echo ("<p>Arquivo n&atilde;o encontrado</p>");
}

else
{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    while ($linha = fgetcsv ($abraArq8, 4096, ";"))
    {
        if($headerLine)
        {
            $headerLine = false;
        }

        else
        {

                $sql_valida = "SELECT * FROM bd_erros_pn.controle_pn  
                                   WHERE numero_pedido = '$linha[3]' and status_pedido = '$linha[5]' ";
                $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);
			
				 $teste = "$linha_valida";	
				
										
                //echo $teste;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0)
                {
                  
  


                }else{
                //Se não localizado, realiza a inclusão em banco de dados

                 $linha[9]= tiraaspasimples($linha[9]);
                 $linha[11]= tiraaspasimples($linha[11]);
                 $linha[13]= tiraaspasimples($linha[13]);
                 $linha[32]= tiraaspasimples($linha[32]);
                 $linha[62]= tiraaspasimples($linha[62]);
                 $linha[63]= tiraaspasimples($linha[63]);
    
           if(strstr($linha[22],'MPJ') || strpos($linha[22],'8000')){     
                
               if(strstr($linha[7],'VPE - GOV')){
               
                 $site='VPE GOV'; 
                 
                }elseif(!strstr($linha[7],'VPE - GOV') && strstr($linha[7],'GOV')){
                   
                       $site='TOP GOV';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] == 'SP' ){
                   
                       $site='TOP SP';
                   
                    }elseif(strstr($linha[7],'VPG') && !strstr($linha[7],'GOV') && $linha[1] != 'SP' ){
                   
                       $site='TOP FSP';
                   
                    }elseif(strstr($linha[7],'VPE') && !strstr($linha[7],'GOV')){
                   
                       $site='VPE';
                   
                    }
               
               if($linha[3] == 'Backoffice aprovado' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Executado parcialmente' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Validando PORTIN' && strpos($linha[27],'portabilidade')   
                  || $linha[3] == 'Erro Portabilidade' && strpos($linha[27],'portabilidade') 
                  || $linha[3] == 'Aguardando Autorização PORTIN' && strpos($linha[27],'portabilidade')  
                  || $linha[3] == 'Portabilidade Negada' && strpos($linha[27],'portabilidade') ){
         
                      $sql="CALL bd_erros_pn.carrega_relatoriogeral1('$site',
                                                                  '$linha[0]',
                                                                  '$linha[1]',
								  '$linha[2]',
								  '$linha[3]',
								  '$linha[4]', 
								  '$linha[5]', 
								  '$linha[6]',
								  '$linha[7]', 
								  '$linha[8]', 
								  '$linha[9]',  
								  '$linha[10]',
								  '$linha[11]',
								  '$linha[12]', 
								  '$linha[13]', 
								  '$linha[14]',
								  '$linha[15]',
                                                                  '$linha[16]', 
								  '$linha[17]',
								  '$linha[18]', 
								  '$linha[19]', 
								  '$linha[20]', 
								  '$linha[21]', 
								  '$linha[22]', 
								  '$linha[23]', 
								  '$linha[24]', 
								  '$linha[25]', 
								  '$linha[26]',
								  '$linha[27]',
                                                                  '$linha[28]',
                                                                  '$linha[29]',
                                                                  '$linha[30]',
                                                                  '$linha[31]',
                                                                  '$linha[32]',
                                                                  '$linha[33]',
                                                                  '$linha[34]',
                                                                  '$linha[35]',
                                                                  '$linha[36]',
                                                                  '$linha[37]',
                                                                  '$linha[38]',
                                                                  '$linha[39]',
                                                                  '$linha[40]',
                                                                  '$linha[41]',
                                                                  '$linha[42]',
                                                                  '$linha[43]',
                                                                  '$linha[44]',
                                                                  '$linha[45]',
                                                                  '$linha[46]',
                                                                  '$linha[47]',
                                                                  '$linha[48]',
                                                                  '$linha[49]',
                                                                  '$linha[50]',
                                                                  '$linha[51]',
                                                                  '$linha[52]',
                                                                  '$linha[53]',
                                                                  '$linha[54]',
                                                                  '$linha[55]',
                                                                  '$linha[56]',
                                                                  '$linha[57]',
                                                                  '$linha[58]',
                                                                  '$linha[59]',
                                                                  '$linha[60]',
                                                                  '$linha[61]',
                                                                  '$linha[62]',
                                                                  '$linha[63]' )"; 
                    
                      $result = mysql_query($sql,$conecta2) or die(mysql_error());
                   }   
                    
                }
                
            }

         

            
        }
    }
 
}

/*******************************BLOCO ARQUIVO TODAS_UF*****************************************/

$sql_pn="CALL bd_erros_pn.carrega_base_pn";
$resultpn = mysql_query($sql_pn,$conecta2) or die(mysql_error()); 
               
           
                
echo "<br><br><br>";
echo "<div class='divmsg bradius' style='background:#D4D4D4; align:center;'>"; 
echo "<br><font color='#000000' face='arial' size='2'>Base atualizada com sucesso!</font>";
echo "<div/>";  			
echo "<br><br><br>";

/*
$sql_valida2 = "DELETE FROM bd_erros_pn.controle_pn WHERE status_pedido ='Concluído Manualmente' OR status_pedido ='Portabilidade Negada' OR status_pedido ='Erro Criação Conta Atlys' OR status_pedido = 'Erro Criação Cliente Atlys' OR status_pedido ='Concluído' OR status_pedido ='Em trâmite' OR status_pedido ='Cancelado SEFAZ' OR status_pedido ='Validando'";
$acao_valida2 = mysql_query($sql_valida2,$conecta2) or die (mysql_error());
	
   $sql_valida = "UPDATE bd_erros_pn.controle_pn SET 
                                          disc_status_tp = 'Aberta'
										  WHERE status_tp = 1";
   $acao_valida = mysql_query($sql_valida,$conecta2) or die (mysql_error());

 
  mysql_free_result($acao_valida2,$acao_valida);
 mysql_close($conecta2);*/
 
?>
<p><input type="button" name="Submit2" value="Voltar" onClick="window.location='principal.php?t=forms/formatualizar_base_pn.php'">	


</body>
</html>
