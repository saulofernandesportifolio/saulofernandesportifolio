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




 function criaPivotTable($sql, $nomeRelatorio)
 {
    $p=0;
    $total_geral=array();
    $contLinha=1;
    $contCol=1;
    $consulta = mysql_query($sql) or die(mysql_error());
    echo "<table class='lista-clientespivot' border='1'>";
    while($campos = mysql_fetch_assoc($consulta)){
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
            echo "<th>Total</th></tr>";
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
        echo "<td>$total</td></tr>";
        if(!isset($total_geral[$p]))
        {
            $total_geral[$p] = 0;
        }
        $total_geral[$p]+= $total;
        $p=0;
    }
    echo "<tr><td>Total</td>";
    foreach($total_geral as $vlr){
        if($vlr == 0){
            $vlr='';
        }
        echo "<td>$vlr</td>";
    }
    echo "</tr>";
    echo "</table>";
    unset($consulta);
    unset($sql);
}

?>
<div id="filtropivot" class="form bradius">
<div class="divformpivot">
<h3 align="center">RESUMO</h3>
  <?php
  
  if($_POST['setor']==1){
   mysql_query("SET lc_time_names = 'pt_BR';");
   $sql = 'call pivotwizard("a.carteira,b.disc_status_cip_analise","date_format(a.dt_inclusao_bd_cip2,\'%d/%m\')","1", "tbl_cotacao a,tbl_analise b", "a.id_cotacao=b.id_cotacao and a.dt_inclusao_bd_cip2 LIKE \'%'."$dt_mes2".'%\'" );';
   criaPivotTable($sql, "Tipo");
 }
 elseif($_POST['setor']==2){
   mysql_query("SET lc_time_names = 'pt_BR';");
   $sql = 'call pivotwizard("a.carteira,b.disc_status_cip_input","date_format(a.dt_inclusao_bd_cip2,\'%d/%m\')","1", "tbl_cotacao a,tbl_input b", "a.id_cotacao=b.id_cotacao and a.dt_inclusao_bd_cip2 LIKE \'%'."$dt_mes2".'%\'" );';
   criaPivotTable($sql, "Tipo");
 }
 elseif($_POST['setor']==3){
   mysql_query("SET lc_time_names = 'pt_BR';");
   $sql = 'call pivotwizard("a.carteira,b.disc_status_cip_auditoria","date_format(a.dt_inclusao_bd_cip2,\'%d/%m\')","1", "tbl_cotacao a,tbl_auditoria b", "a.id_cotacao=b.id_cotacao and a.dt_inclusao_bd_cip2 LIKE \'%'."$dt_mes2".'%\'" );';
   criaPivotTable($sql, "Tipo");
 } 
 elseif($_POST['setor']==4){
  mysql_query("SET lc_time_names = 'pt_BR';");
 $sql = 'call pivotwizard("a.carteira,b.disc_status_cip_correcao","date_format(a.dt_inclusao_bd_cip2,\'%d/%m\')","1", "tbl_cotacao a,tbl_correcao b", "a.id_cotacao=b.id_cotacao and a.dt_inclusao_bd_cip2 LIKE \'%'."$dt_mes2".'%\'" );';   
 criaPivotTable($sql, "Tipo");
 } 
  
  
  
  
   ?>


    
</div>
</div>



</body>
</html>
