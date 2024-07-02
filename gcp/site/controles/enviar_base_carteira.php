
 <script type="text/javascript">
function showCarga()
               {
            document.getElementById('carga').style.display="block";
                }
        function hideCarga()
        {
            document.getElementById('carga').style.display="none";
        } 
   
   </script>

<div class="divformcarrega">
<div class="loading" id="carga">
<img class="imgloading" src="..//site/forms/img/carregando.gif">
</div>
<body onload="showCarga();">
<?php
    $tempo = 0;

  set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");


           
   $sqldel="DELETE FROM  cip_nv.carteira ";   
            
   $resultdel = mysql_query($sqldel,$conecta) or die(mysql_error()); 
   
     $sqldel2="DELETE FROM  cip_nv.carteira2 ";   
            
   $resultdel2 = mysql_query($sqldel2,$conecta) or die(mysql_error());          


function arrumaStringAspassimples($string22){

return preg_replace( '/[`^\\~\'"´]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string22)); 

}


function arrumaString($string) {

$str=$string;
// assume $str esteja em UTF-8
$map = array(
    'á' => 'a',
    'à' => 'a',
    'ã' => 'a',
    'â' => 'a',
    'é' => 'e',
    'ê' => 'e',
    'í' => 'i',
    'ó' => 'o',
    'ô' => 'o',
    'õ' => 'o',
    'ú' => 'u',
    'ü' => 'u',
    'ç' => 'c',
    'Á' => 'A',
    'À' => 'A',
    'Ã' => 'A',
    'Â' => 'A',
    'É' => 'E',
    'Ê' => 'E',
    'Í' => 'I',
    'Ó' => 'O',
    'Ô' => 'O',
    'Õ' => 'O',
    'Ú' => 'U',
    'Ü' => 'U',
    'Ç' => 'C',
    '/' => '/',
    '\\' => '/',
    '^' => ' ',
    '~' => ' ',
    '\''=> ' ',
    '\"'=> ' ',
    '\´'=> ' '
);
 


return strtr($str, $map); // funciona corretamente;

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


function corrigedatas($date){


  $dia=substr($date,0,2) ;
  $mes=substr($date,3,2);
  $ano=substr($date,6,4);

  /*data correta estiver correta */
  if(strlen($date) == 18)
  {
     
      $dia=substr($date,0,2);
      $mes=substr($date,2,2);
      $ano=substr($date,5,4);
      $hora=substr($date,10,9);
  } 
  /*data correta estiver correta */
  if(strlen($date) == 19)
  {
      $hora=substr($date,10,9);
  } 

  /*se a data não estivber correta*/ 
   if(strlen($date) == 17)
    {
        $dia=substr($date,0,2);
        $mes=substr($date,2,2);
        $ano=substr($date,4,4);
        $hora=substr($date,9,9);
    }

     /*realiza o tratamento do dia e mes*/
       if(substr($dia,1,1) == "/")
        {
          $dia='0'.substr($dia,0,1);
        }

 
        if(substr($mes,1,1) == "/" )
        {
          $mes='0'.substr($mes,0,1);
        }

        if(substr($mes,0,1) == "/" )
        {
          $mes='0'.substr($mes,1,1);
        }
        

   $date=$ano."-".$mes."-".$dia." ".$hora;

///echo '<br>';



 return $date;

}



  $data_inclusao_bd = date("Y/m/d H:i:s");
  $data_inclusao_bd2 = date("Y/m/d");
  $data_inclusao_bd2_mes = date("Y/m/d H:i:s");

 $data2 = date("d-m-Y"); 
 $h=date("H");
 $m=date("i");
 $s=date("s");

$data=$data2." ".$h."h-".$m."m-".$s."s";

$Y= date("Y");
$m=date("m");
$i='0';

for($i=0;$i< 3;$i++)

$m2=$m-$i;

if(strlen($m2) == 1)
{
$zero='0';
$m2= $zero.$m2;
}
else
{
    $m2;
}

$data3=$Y."-".$m2."-"."01";



//inicia conexão com o banco de dados
 include("../bd.php");
    $tempo = 0;
  set_time_limit($tempo);
  
ini_set ( 'mysql.connect_timeout' ,  '120' ); 
ini_set ( 'default_socket_timeout' ,  '120' );
ini_set('memory_limit', '-1'); 

//Pegar o nome temporário do arquivo a ser importado
$nome_temporario=$_FILES["file"]["tmp_name"]; 

$row = 0;
$handle = fopen ("$nome_temporario","r");
$valores = array();
while (($data = fgetcsv($handle,4096, ";")) !== FALSE) {
    if($row == 0){
        $cabecalhos = array();
        foreach($data as $idx=>$vlr){
           array_push($cabecalhos,$vlr);
           $cabecalhos[$idx]=preg_replace('/[^A-Za-z0-9\-\s]/', '',$vlr);
          //echo '<br>';
        }
        }else{        
          for($cont = 0;$cont < count($data);$cont++){
              $valores[$cabecalhos[$cont]]= $data[$cont]; 
             }
                        
            
                         $legenda =array('Cliente'                       => 'Cliente',
                                         'Carteira'                      => 'carteira',
                                         'Tipo de cliente'               => 'tipo_de_cliente',
                                         'Cdigo do cliente'              => 'codigo_do_cliente',
                                         'Status'                        => 'status',
                                         'Cdigo do grupo'                => 'codigo_do_grupo',
                                         'CNAE'                          => 'CNAE',
                                         'Prdio prprio'                  => 'prédio',
                                         'Quanto tempo no endereo atual' => 'quanto_tempo_no_endereço_atual',
                                         'Total de funcionrios'          => 'total_de_funcionários',
                                         'Endereo'                       => 'endereço',
                                         'Nmero'                         => 'numero',
                                         'Complemento'                   => 'complemento',
                                         'Regio'                         => 'regional',
                                         'CEP'                           => 'cep',
                                         'Cidade'                        => 'cidade',
                                         'Estado'                        => 'estado',
                                         'Pas'                           => 'pais',
                                         'Telefone principal'            => 'telefone_principasl',
                                         'Ramal'                         => 'ramal',
                                         'Fax'                           => 'fax',
                                         'CNPJCPF do grupo econmico'     => 'CNPJ_CPF_do_grupo_economico',
                                         'CPFCNPJ'                       => 'cpf_cnpj',
                                         'Tipo de sociedade'             => 'tipo_de_sociedade',
                                         'Inscrio estadual'              => 'inscricao_estadual',
                                         'Capital social'                => 'capital_social',
                                         'Cliente outra operadora'       => 'cliente_outra_operadora',
                                         'Fundao'                        => 'fundacao',
                                         'Folha de pagamento'            => 'folha_de_pagamento',
                                         'Despesas imvel'                => 'despesas_imovel',
                                         'Equipe da conta'               => 'equipe_da_conta',
                                         'Cdigo da CSA'                  => 'codigo_da_csa',
                                         'Contatos do Cliente'           => 'contatos_do_cliente',
                                         'Receita anual'                 => 'receita_anual',
                                         'Nmero do cliente do atlys'     => 'numero_do_cliente_do_atlys',
                                         'Pr-labore'                     => 'pro_labore',
                                         'Erro integrao'                 => 'erro_integracao',
                                         'Lista'                         => 'lista',
                                         'Anos em Atividade'             => 'anos_em_atividade',
                                         'Organizao'                     => 'organizacao',
                                         'Parceiro'                      => 'parceiro',
                                         'Concorrente'                   => 'concorrente',
                                         'Cliente saltador'              => 'cliente_saltador',
                                         'Time'                          => 'time',
                                         'Desativar Mala Direta'         => 'desativar_mala_direta',
                                         'Desativar Telemarketing'       => 'desativar_telemarkenting',
                                         'Viso segmento corporativo'     => 'visao_segmento_coprporativo',
                                         'Viso segmento global'          => 'visao_segmento_global',
                                         'Agrupamento de segmento'       => 'agrupamento_de_segmento',
                                         'Segmento valor'                => 'segmento_valor',
                                         'Atendimento Valor'             => 'atendimento_valor',
                                         'mbito'                         => 'ambito',
                                         'CAR 30'                        => 'car_30',
                                         'ISC'                           => 'ISC',
                                         'Data ISC'                      => 'data_isc',
                                         'Novo'                          => 'novo',
                                         'Cliente-pai'                   => 'cliente_pai',
                                         'Tipo de empresa'               => 'tipo_empreza',
                                         'Linha suspensa'                => 'linha_suspensa',
                                         'Cliente Compartilhado'         => 'cliente_compartilhado',
                                         'Nome do grupo econmico'        => 'nome_do_grupo_economico',
                                         'CC 4 dgitos'                   => 'cc_4_digitos',
                                         'Prioridade'                    => 'MNC',
                                         'Tipo MNC'                      => 'tipo_mmc'

                                         );
   


   
   foreach($valores as $idx => $vlr){
            
    $idx." - ";
              }
   
   
   
           /* for($i=0;$i< $idx;$i++){
                
             echo $legenda[$idx].'<br>'; 
   
              }
   
              /* for($cont2 = 0;$cont2 < count($legenda);$con++){
               $cont2; 
                             
                }
                              
               if($cont < $cont2){
                          
                 
                die("<script>alert('Base faltando colunas redefinir padroes no vivocorp tentar novamente!')
                             history.back();</script>");
                
                }*/
         
            
$cb='';
$dados='';
$naocarregar='';
     foreach($valores as $idx => $vlr){
            
              if($legenda[$idx] == 'Cliente' OR
                 $legenda[$idx] == 'carteira' OR
                 $legenda[$idx] == 'tipo_de_cliente' OR
                 $legenda[$idx] == 'CNPJ_CPF_do_grupo_economico' OR
                 $legenda[$idx] == 'cpf_cnpj'         
               )
               {             
          
          
           
               
          
          
          
          
            $cb.=$legenda[$idx].",";
              
              if($$legenda[$idx] == 'Cliente' OR $legenda[$idx] == 'Tipo de cliente'){
             
                $vlr=arrumaString($vlr);

            
                
                }     
            
            $dados.= "'$vlr'".",";
               
              
                                     
              }
        }

        
        
      $cb= substr($cb, 0, strlen($cb) - 1); 
      $dados=substr($dados, 0, strlen($dados) - 1);
      
 
      
      
    
               
                  $sql_atualiza ="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '$idtbl_usuario'";
                  $acao_atualiza = mysql_query($sql_atualiza,$conecta) or die(mysql_error()); 
                  while($linha_atualiza = mysql_fetch_assoc($acao_atualiza))
                       { 
	                     $nome2 = $linha_atualiza["nome"];
   	                  
	   
	                     }
                       
         
      
                       
                $sql="INSERT IGNORE INTO cip_nv.carteira ({$cb},
                                                         data_carga,
                                                          carregado_por_cip
                                                         )VALUES({$dados},
                                                       	 '$data_inclusao_bd',
                                                         '$nome2')";   
            
                $result = mysql_query($sql,$conecta) or die(mysql_error()); 
       
       
             


       
       
            
     } 
   

        $row++;
                 
   //  }
     //       }           

// fim - Atualiza o tipo das atividades na tabela tratamento 

    
        
}fclose ($handle);



$sql_atualiza2 ="SELECT DISTINCT carteira FROM cip_nv.carteira ";
$acao_atualiza2 = mysql_query($sql_atualiza2,$conecta) or die(mysql_error()); 


    while($linha_atualiza2 = mysql_fetch_assoc($acao_atualiza2))
                       { 
                      
                      $carteira= $linha_atualiza2["carteira"];
                      
     

$sql2="INSERT INTO cip_nv.carteira2(carteira)VALUES('$carteira')";   
            
$result2 = mysql_query($sql2,$conecta) or die(mysql_error()); 


                       }

  echo "<div class='divmsg bradius' style='background:#D4D4D4;'>";                                                 
  echo "<font color='#000000' face='arial' size='2'>Base carteira VPG atualizada com sucesso!.<br>";
    
      echo "<div/>";    		
				
 //mysql_free_result($acao_atualiza,$result,$result2,$result3);
 mysql_close($conecta);			
				
				
   
?>	

<script language="javascript" type="text/javascript">
hideCarga();
</script>
<p>
    <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?t=forms/formatualizar_carteira.php'" />

</div>    
</body>
</html>