<?php
	$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

$dt_mes2 = date("Y-m-");



$sql_operador="SELECT * FROM tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 4 && $perfil != 7){
    
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


 function criaPivotTable($sql2, $nomeRelatorio2)
 {
    $p2=0;
    $total_geral2=array();
    $contLinha2=1;
    $contCol2=1;
    $consulta2 = mysql_query($sql2) or die(mysql_error());
    echo "<table class='lista-clientespivot' border='1'>";
    while($campos2 = mysql_fetch_assoc($consulta2)){
        if($contLinha2 == 1){
            echo "<tr>";
            foreach(array_keys($campos2) as $idx2 => $vlr2){
                if($contCol2 == 1){
                    echo "<th>".$nomeRelatorio2."</th>";
                    $contCol2++;
                }else{
                    $vlr2 = str_replace("_", " ", $vlr2);
                    $cabec2 = "<th>";
                    $cabec2 .= $vlr2;
                    $cabec2 .= "</th>";
                    echo $cabec2;
                }                
            }
            echo "<th>Total</th></tr>";
            $contLinha2 = 0;                                                
        }
        echo "<tr>";
        $total2 =0;
        foreach(array_values($campos2) as $idx2 => $vlr2){
            if($contLinha2 == 0){
                echo "<td>";
                $contLinha2++;
            }else{
                if(!isset($total_geral2[$p2])){
                    $total_geral2[$p2] = 0;
                }
                $total_geral2[$p2]+= $vlr2;
                $total2 += $vlr2;
                echo "<td>";
                $p2++;  
            }
            echo $vlr2."</td>";
        }
        $contLinha2 = 0;
        echo "<td>$total2</td></tr>";
        if(!isset($total_geral2[$p2]))
        {
            $total_geral2[$p2] = 0;
        }
        $total_geral2[$p2]+= $total2;
        $p2=0;
    }
    echo "<tr><td>Total</td>";
    foreach($total_geral2 as $vlr2){
        if($vlr2 == 0){
            $vlr2='';
        }
        echo "<td>$vlr2</td>";
    }
    echo "</tr>";
    echo "</table>";
    unset($consulta2);
    unset($sql2);
}

?>
<div id="filtropivot" class="form bradius">
<div class="divformpivot">

  <?php
  if($_POST['setor']==1){
       mysql_query("SET lc_time_names = 'pt_BR';");
     $sql2 = 'call pivotwizard("a.status,b.disc_status_cip_analise","date_format(a.dt_inclusao_bd_cip2,\'%d/%m\')","1", "tbl_cotacao a, tbl_analise b", "a.id_cotacao=b.id_cotacao and a.dt_inclusao_bd_cip2 LIKE \'%'."$dt_mes2".'%\'" );';
      criaPivotTable($sql2, "Status");
   }   
     elseif($_POST['setor']==2){      
         mysql_query("SET lc_time_names = 'pt_BR';");
     $sql2 = 'call pivotwizard("a.status,b.disc_status_cip_input","date_format(a.dt_inclusao_bd_cip2,\'%d/%m\')","1", "tbl_cotacao a, tbl_input b", "a.id_cotacao=b.id_cotacao and a.dt_inclusao_bd_cip2 LIKE \'%'."$dt_mes2".'%\'" );';
      criaPivotTable($sql2, "Status");
   }   
    elseif($_POST['setor']==3){      
         mysql_query("SET lc_time_names = 'pt_BR';");
     $sql2 = 'call pivotwizard("a.status,b.disc_status_cip_auditoria","date_format(a.dt_inclusao_bd_cip2,\'%d/%m\')","1", "tbl_cotacao a, tbl_auditoria b", "a.id_cotacao=b.id_cotacao and a.dt_inclusao_bd_cip2 LIKE \'%'."$dt_mes2".'%\'" );';
      criaPivotTable($sql2, "Status");
    }  
    elseif($_POST['setor']==4){      
         mysql_query("SET lc_time_names = 'pt_BR';");
     $sql2 = 'call pivotwizard("a.status,b.disc_status_cip_correcao","date_format(a.dt_inclusao_bd_cip2,\'%d/%m\')","1", "tbl_cotacao a, tbl_correcao b", "a.id_cotacao=b.id_cotacao and a.dt_inclusao_bd_cip2 LIKE \'%'."$dt_mes2".'%\'" );';
      criaPivotTable($sql2, "Status");
    }  
     
       
   ?>
    
</div>
</div>




</body>
</html>
