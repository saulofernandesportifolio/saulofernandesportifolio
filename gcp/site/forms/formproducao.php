
<script language="JavaScript">
function abrirvisao(URL) {
 
  var width = 1024;
  var height = 'auto';
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>

<?php

function arrumadatahora2($string3) {
    
    if($string3 == ''){
    $data3= substr($string3,6,4)."".substr($string3,3,2)."".substr($string3,0,2);
       }else{
        
      $data3= substr($string3,6,4)."-".substr($string3,3,2)."-".substr($string3,0,2);
        
       }
return $data3;
}

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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $perfil != 18 && $perfil != 21 && $perfil != 22 && $perfil != 23){
    
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

ini_set ( 'mysql.connect_timeout' ,  '40000000' ); 
 ini_set ( 'default_socket_timeout' ,  '40000000' );  
ini_set('memory_limit', '-1'); 

$tempo = 0;

set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
  
$dt_dia = date("Y-m-");  
  

 $data_1=arrumadatahora2($_POST['data_1']);
 $data_2=arrumadatahora2($_POST['data_2']);


// $_POST['turno'];

if($_POST['setor']==1){
    
  $sql="SELECT DISTINCT * FROM cip_nv.tbl_analise b 
            INNER JOIN cip_nv.tbl_usuarios a ON b.idtbl_usuario_analise=a.idtbl_usuario 
            INNER JOIN cip_nv.tbl_cotacao c ON c.id_cotacao=b.id_cotacao
WHERE b.dt_tratamento_analise BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%' "; 
 $consulta = mysql_query($sql,$conecta) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}

if($_POST['setor']==2){
/*
  $sql="SELECT * FROM cip_nv.tbl_input b,cip_nv.tbl_usuarios a 
      WHERE b.dt_tratamento_input BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%'  "; */
    
 $sql="SELECT DISTINCT * FROM cip_nv.tbl_input b 
            INNER JOIN cip_nv.tbl_usuarios a ON b.idtbl_usuario_input=a.idtbl_usuario 
            INNER JOIN cip_nv.tbl_cotacao c ON c.id_cotacao=b.id_cotacao
WHERE b.dt_tratamento_input BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%' "; 
 $consulta = mysql_query($sql,$conecta) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}

if($_POST['setor']==3){
    
 /*$sql="SELECT * FROM cip_nv.tbl_auditoria b,cip_nv.tbl_usuarios a 
      WHERE b.dt_tratamento_auditoria BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%'  "; */

$sql="SELECT DISTINCT * FROM cip_nv.tbl_auditoria b 
            INNER JOIN cip_nv.tbl_usuarios a ON b.idtbl_usuario_auditoria=a.idtbl_usuario 
            INNER JOIN cip_nv.tbl_cotacao c ON c.id_cotacao=b.id_cotacao
WHERE b.dt_tratamento_auditoria BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%' ";

 $consulta = mysql_query($sql,$conecta) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}

if($_POST['setor']==4){
    
 $sql="SELECT DISTINCT * FROM cip_nv.tbl_correcao b 
            INNER JOIN cip_nv.tbl_usuarios a ON b.idtbl_usuario_correcao=a.idtbl_usuario 
            INNER JOIN cip_nv.tbl_cotacao c ON c.id_cotacao=b.id_cotacao
WHERE b.dt_tratamento_correcao BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%' "; 
 $consulta = mysql_query($sql,$conecta) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}


if($_POST['setor']==5){
    
 $sql="SELECT DISTINCT * FROM cip_nv.tbl_chamado b 
            INNER JOIN cip_nv.tbl_usuarios a ON b.idtbl_usuario_chamado=a.idtbl_usuario 
            INNER JOIN cip_nv.tbl_cotacao c ON c.id_cotacao=b.id_cotacao
WHERE b.dt_tratamento_chamado BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%' "; 
 $consulta = mysql_query($sql,$conecta) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}

if($_POST['setor']==6){
    
 $sql="SELECT * FROM cip_nv.base_contestacoes_cotacao b, cip_nv.tbl_usuarios a 
      WHERE b.data_tratamento BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%'  "; 
 $consulta = mysql_query($sql,$conecta) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}


if($_POST['setor']==7){
    
$sql="SELECT * FROM cip_nv.base_diretoria b  
      WHERE b.data_tratamento BETWEEN '$data_1' AND '$data_2' AND b.turno LIKE '{$_POST['turno']}%'  "; 
 $consulta = mysql_query($sql,$conecta) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}


if($_POST['setor']==16){
    

$sql="SELECT * FROM bd_erros_pn.controle_pn b, cip_nv.tbl_usuarios a  
      WHERE b.data_tratamento BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%'  "; 
 $consulta = mysql_query($sql,$conecta2) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}


if($_POST['setor']==19){
    
$sql="SELECT * FROM bd_erros_pn.base_erros b, cip_nv.tbl_usuarios a  
      WHERE b.data_tratamento BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%'  "; 
 $consulta = mysql_query($sql,$conecta2) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}



if($_POST['setor']==20){
    
$sql="SELECT * FROM cip_nv.tbl_swap b, cip_nv.tbl_usuarios a  
      WHERE b.data_tratamento_swap_cip BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%'  "; 
 $consulta = mysql_query($sql,$conecta2) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}


if($_POST['setor']==17){
    
 $sql="SELECT * FROM bd_erros_pn.base_erros_top_tt b, cip_nv.tbl_usuarios a  
      WHERE b.data_tratamento BETWEEN '$data_1' AND '$data_2' AND a.turno LIKE '{$_POST['turno']}%'  "; 
 $consulta = mysql_query($sql,$conecta2) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}


 if($num == 0){
    
       echo "
         <script type=\"text/javascript\">
         alert('Sem produ\u00e7\u00e3o contabilizada no mmomento!');
         document.location.replace('principal.php?t=forms/formfiltro_producao.php');
	     </script>
        ";
       exit(); 
  
     }

 function criaPivotTable($sql, $nomeRelatorio, $data1, $data2, $setorf)
 {
    $p=0;
    $total_geral=array();
    $contLinha=1;
    $contCol=1;
    $consulta = mysql_query($sql) or die(mysql_error());
    
    echo "<table class='lista-clientespivot' border='1'>";
    while($campos = mysql_fetch_assoc($consulta)){
       $nomeuser=$campos['nome'];
        if($contLinha == 1){
            echo "<tr>";
            foreach(array_keys($campos) as $idx => $vlr){
                if($contCol == 1){
                    echo "<th>".$nomeRelatorio."</th>";
                    $contCol++;
                }else{
                    $vlr = str_replace("_", " ", $vlr);
                    $cabec = "<th>";
                    $cabec .= $vlr;
                    $cabec .= "</th>";
                    echo $cabec;
                }                
            }
            echo "<th>TOTAL</th></tr>";
            $contLinha = 0;                                                
        }
        echo "<tr>";
        $total =0;
        foreach(array_values($campos) as $idx => $vlr){
            if($contLinha == 0){
                echo "<td>";
                $contLinha++;
            }else{
                if(!isset($total_geral[$p])){
                    $total_geral[$p] = 0;
                }
                $total_geral[$p]+= $vlr;
                $total += $vlr;
                echo "<td>";
                $p++;  
            }
            echo $vlr."</td>";
        }
        $contLinha = 0;

        if($setorf == 20){
           echo "<th><a href=\"javascript:abrirvisao('site/forms/formdetalhes_visao_cotacao_operacao_producao_swap2.php?nomeuser={$nomeuser}&data_1={$data1}&data_2={$data2}&setorf={$setorf}');\"><font size='1' color='#FFFFFF' face='Arial'>$total</font></a></th></tr>";

        }if($setorf == 7 && $setorf == 16 && $setorf=19){
           echo "<th><font size='1' color='#FFFFFF' face='Arial'>$total</font></th></tr>";

        }else{

        echo "<th><a href=\"javascript:abrirvisao('site/forms/formdetalhes_visao_cotacao_operacao_producao.php?nomeuser={$nomeuser}&data_1={$data1}&data_2={$data2}&setorf={$setorf}');\"><font size='1' color='#FFFFFF' face='Arial'>$total</font></a></th></tr>";
       }
        //echo "<th>$total</th></tr>";
        if(!isset($total_geral[$p]))
        {
            $total_geral[$p] = 0;
        }
        $total_geral[$p]+= $total;
        $p=0;
    }
    echo "<tr><th>TOTAL</th>";
    foreach($total_geral as $vlr){
        if($vlr == 0){
            $vlr='';
        }
      echo "<th>$vlr</th>";
    }
    echo "</tr>";
    echo "</table>";
            
    unset($consulta);
    unset($sql);

}





?>
<div id="filtropivot" class="form bradius">
<div class="divformpivot">
<h3 align="center">RESUMO PRODU&Ccedil;&Atilde;O</h3>
  <?php
  if($_POST['setor']==1){
  mysql_query("SET lc_time_names = 'pt_BR';");

 $sql = 'call pivotwizard("c.nome" ,"date_format(b.dt_tratamento_analise,\'%d/%m\')","1", "cip_nv.tbl_cotacao a,cip_nv.tbl_analise b,cip_nv.tbl_usuarios c", "a.id_cotacao=b.id_cotacao and b.idtbl_usuario_analise=c.idtbl_usuario and b.dt_tratamento_analise BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' " );';
  criaPivotTable($sql, "OPERADOR ANALISE",$data_1,$data_2,$_POST['setor']);

 }
 elseif($_POST['setor']==2){
   mysql_query("SET lc_time_names = 'pt_BR';");
  $sql = 'call pivotwizard("c.nome" ,"date_format(b.dt_tratamento_input,\'%d/%m\')","1", "cip_nv.tbl_cotacao a,cip_nv.tbl_input b,cip_nv.tbl_usuarios c", "a.id_cotacao=b.id_cotacao and b.idtbl_usuario_input=c.idtbl_usuario and b.dt_tratamento_input BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' ");';
  criaPivotTable($sql, "OPERADOR INPUT",$data_1,$data_2,$_POST['setor']);
 }
 elseif($_POST['setor']==3){
   mysql_query("SET lc_time_names = 'pt_BR';");
  $sql = 'call pivotwizard("c.nome" ,"date_format(b.dt_tratamento_auditoria,\'%d/%m\')","1", "cip_nv.tbl_cotacao a,cip_nv.tbl_auditoria b,cip_nv.tbl_usuarios c", "a.id_cotacao=b.id_cotacao and b.idtbl_usuario_auditoria=c.idtbl_usuario and b.dt_tratamento_auditoria BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' ");';
  criaPivotTable($sql, "OPERADOR AUDITORIA",$data_1,$data_2,$_POST['setor']);
 } 
 elseif($_POST['setor']==4){
 
   mysql_query("SET lc_time_names = 'pt_BR';");
 $sql = 'call pivotwizard("c.nome" ,"date_format(b.dt_tratamento_correcao,\'%d/%m\')","1", "cip_nv.tbl_cotacao a,cip_nv.tbl_correcao b,cip_nv.tbl_usuarios c", "a.id_cotacao=b.id_cotacao and b.idtbl_usuario_correcao=c.idtbl_usuario and b.dt_tratamento_correcao BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' " );';
   criaPivotTable($sql, "OPERADOR CORRECAO",$data_1,$data_2,$_POST['setor']);
    
 } 
 elseif($_POST['setor']==5){
 
   mysql_query("SET lc_time_names = 'pt_BR';");
 $sql = 'call pivotwizard("c.nome" ,"date_format(b.dt_tratamento_chamado,\'%d/%m\')","1", "cip_nv.tbl_cotacao a,cip_nv.tbl_chamado b,cip_nv.tbl_usuarios c", "a.id_cotacao=b.id_cotacao and b.idtbl_usuario_chamado=c.idtbl_usuario and b.dt_tratamento_chamado BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' " );';
   criaPivotTable($sql, "OPERADOR CHAMADO",$data_1,$data_2,$_POST['setor']);
    
 }elseif($_POST['setor']==6){
 
   mysql_query("SET lc_time_names = 'pt_BR';");
 $sql = 'call pivotwizard("c.nome" ,"date_format(b.data_tratamento,\'%d/%m\')","1", "cip_nv.tbl_cotacao a,cip_nv.base_contestacoes_cotacao b,cip_nv.tbl_usuarios c", "a.id_cotacao=b.id_cotacao and b.analista_contestacao=c.idtbl_usuario and b.data_tratamento BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' OR a.id_cotacao=b.id_cotacao and b.analista_contestacao=c.idtbl_usuario and SUBSTRING(b.dt_atualizacao,1,10) BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' " );';
   criaPivotTable($sql, "OPERADOR CONTESTACAO",$data_1,$data_2,$_POST['setor']);
    
 }elseif($_POST['setor']==7){
 
   mysql_query("SET lc_time_names = 'pt_BR';");
 $sql = 'call pivotwizard("c.operador_diretoria" ,"date_format(b.data_tratamento,\'%d/%m\')","1", "cip_nv.base_diretoria b,cip_nv.base_diretoria c", "b.id=c.id AND b.operador_diretoria=c.operador_diretoria and b.data_tratamento BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND b.turno LIKE \'%'.$_POST['turno'].'%\' ");';
   criaPivotTable($sql, "OPERADOR DIRETORIA",$data_1,$data_2,$_POST['setor']);
    
 }elseif($_POST['setor']==16){
 
   mysql_query("SET lc_time_names = 'pt_BR';");
   $sql = 'call pivotwizard("c.nome" ,"date_format(b.data_tratamento,\'%d/%m\')","1", "bd_erros_pn.controle_pn b,cip_nv.tbl_usuarios c", "b.login=c.cpf and b.data_tratamento BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' " );';
   criaPivotTable($sql, "OPERADOR PORTABILIDADE",$data_1,$data_2,$_POST['setor']);
    
 }elseif($_POST['setor']==19){
 
   mysql_query("SET lc_time_names = 'pt_BR';");
   $sql = 'call pivotwizard("c.nome" ,"date_format(b.data_tratamento,\'%d/%m\')","1", "bd_erros_pn.base_erros b,cip_nv.tbl_usuarios c", "b.usuario=c.cpf and b.data_tratamento BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' " );';
   criaPivotTable($sql, "OPERADOR ERROS",$data_1,$data_2,$_POST['setor']);
    
 }elseif($_POST['setor']==20){
 
   mysql_query("SET lc_time_names = 'pt_BR';");
   $sql = 'call pivotwizard("c.nome" ,"date_format(b.data_tratamento_swap_cip,\'%d/%m\')","1", "cip_nv.tbl_swap b,cip_nv.tbl_usuarios c", "b.operador_swap=c.idtbl_usuario and b.data_tratamento_swap_cip BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' " );';
   criaPivotTable($sql, "OPERADOR SWAP",$data_1,$data_2,$_POST['setor']);
    
 }elseif($_POST['setor']==17){
 
   mysql_query("SET lc_time_names = 'pt_BR';");
   $sql = 'call pivotwizard("c.nome" ,"date_format(b.data_tratamento,\'%d/%m\')","1", "bd_erros_pn.base_erros_top_tt b,cip_nv.tbl_usuarios c", "b.usuario=c.cpf and b.data_tratamento BETWEEN \''."$data_1".'\' AND \''."$data_2".'\' AND c.turno LIKE \'%'.$_POST['turno'].'%\' " );';
   criaPivotTable($sql, "OPERADOR ERROS TT",$data_1,$data_2,$_POST['setor']);
    
 }     
        
   
    ?>


 <?php

  mysql_free_result($consulta);
  mysql_close($conecta,$conecta2);  

  ?>


  <p>
  <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?t=forms/formfiltro_producao.php'" class="sb2 bradius" />
 </p>     
</div>
</div>



</body>
</html>
