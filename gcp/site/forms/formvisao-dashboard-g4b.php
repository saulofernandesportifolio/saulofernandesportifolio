

<?php
//$data_1=arrumadata($data_1);
//$data_2=arrumadata($data_2);




function geraTabela6($rsvisaob, $headersvisaob)
   {
      $s = "<table class='lista-clientesdashboard' cellspacing='0' cellpadding='0'>";
      $s.="<tr>";
      $s.="<th colspan='5'>Visao Atento</th>";
      $s.="</tr>";
    $s.= "<tr>";
    foreach ($headersvisaob as $headervisaob){
      $s.=  "<th>$headervisaob</th>";
    }
 
    $s.= "</tr>";      
    while ($row = mysql_fetch_object($rsvisaob)){
      $s.= "<tr>";
      foreach ($row as $data){
          if($data == '1.Altas'){
           $data="Alta";
        }
        if($data == '2.1Trocas 01 até 50'){
           $data="Trocas 01 ate 50";
        }
        if($data == '2.2Trocas 51 até 100'){
           $data="Trocas 51 ate 100";
        }
        if($data == '2.3Trocas 101 até 200'){
           $data="Trocas 101 ate 200";
        } 
        if($data == '2.4Trocas 201 até 400'){
           $data="Trocas 201 ate 400";
        }
        if($data == '2.5Trocas 401 ou maior'){
           $data="Trocas 401 ou maior";
        }
        if($data == '3.1TT 01 até 50'){
           $data="TT 01 ate 50";
        }
        if($data == '3.2TT 51 até 100'){
           $data="TT 51 ate 100";
        }
         if($data == '3.3TT 101 até 200'){
           $data="TT 101 ate 200";
        }
         if($data == '3.4TT 201 até 400'){
           $data="TT 201 ate 400";
        }
        if($data == '3.5TT 401 ou maior'){
           $data="TT 401 ou maior";
        }
        if($data == '4.1Migração 01 até 50'){
           $data="Migração 01 ate 50";
        }
        if($data == '4.2Migração 51 até 100'){
           $data="Migração 51 ate 100";
        }
        if($data == '4.3Migração 101 até 200'){
           $data="Migração 101 ate 200";
        }
        if($data == '4.4Migração 201 até 400'){
           $data="Migração 201 ate 400";
        }
        if($data == '4.5Migração 401 ou maior'){
           $data="Migração 401 ou maior";
        }
         if($data == '5.1Quantificar'){
           $data="Quantificar";
        }


        $s.=  "<td>$data</td>";
      }     
      $s.= "</tr>";            
    }

     $s.= "<tr>";   
     $s.=  "<th colspan='5'>&nbsp;&nbsp;&nbsp;&nbsp;</th>";
     $s.= "</tr>";

    $s.= "</table>";   
 
    echo $s;
   }

/* Conecta com o banco de dados */ 
$conecta44=mysql_connect('10.119.243.23:3306', 'root', 'atento') or die('Erro ao conectar');
$select44=mysql_select_db('cip_nv') or die('Erro ao selecionar banco de dados');


$sql="CALL cip_nv.cria_consulta_visaoempzb_tipo_de_processo("."'{$data_1}'".","."'{$data_2}'".")";
$acao_opalta = mysql_query($sql) or die (mysql_error());




/* Executa a query */
$rsvisaob = mysql_query("SELECT Dentro_do_Prazo,Em_Tratativa,Aguardando_Chamado,Pendente_Chamado FROM cip_nv.tbl_acumulada_visaoempzb GROUP BY Tipo_de_Processo ASC ");
$headersvisaob = array('Dentro_do_Prazo','Em_Tratativa','Aguardando_Chamado','Pendente_Chamado'); 

/* Chama a função */
geraTabela6($rsvisaob, $headersvisaob);
   
	mysql_close($conecta44);	
?>
