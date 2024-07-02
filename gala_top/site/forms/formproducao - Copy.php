<?php


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




$tempo = 0;

set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
  
$dt_dia = date("Y-m-");  
  




if($_POST['setor']==1){
    
 $sql="SELECT * FROM tbl_analise b 
      WHERE b.dt_tratamento_analise LIKE '$dt_dia%'"; 
 $consulta = mysql_query($sql) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}

if($_POST['setor']==2){
    
 $sql="SELECT * FROM tbl_input b 
      WHERE b.dt_tratamento_input LIKE '$dt_dia%'"; 
 $consulta = mysql_query($sql) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}

if($_POST['setor']==3){
    
 $sql="SELECT * FROM tbl_auditoria b 
      WHERE b.dt_tratamento_auditoria LIKE '$dt_dia%'"; 
 $consulta = mysql_query($sql) or die(mysql_error());       
 $num = mysql_num_rows($consulta);
}

if($_POST['setor']==4){
    
 $sql="SELECT * FROM tbl_correcao b 
      WHERE b.dt_tratamento_correcao LIKE '$dt_dia%'"; 
 $consulta = mysql_query($sql) or die(mysql_error());       
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
<h3 align="center">RESUMO PRODU&Ccedil;&Atilde;O</h3>
  <?php
  if($_POST['setor']==1){
  mysql_query("SET lc_time_names = 'pt_BR';");

  $sql = 'call pivotwizard("c.nome,b.setor" ,"date_format(b.dt_tratamento_analise,\'%d/%m\')","1", "tbl_cotacao a,tbl_analise b,tbl_usuarios c", "a.id_cotacao=b.id_cotacao and b.idtbl_usuario_analise=c.idtbl_usuario and b.dt_tratamento_analise LIKE \'%'."$dt_dia".'%\' " );';
  criaPivotTable($sql, "Tipo");
 }
 elseif($_POST['setor']==2){
   mysql_query("SET lc_time_names = 'pt_BR';");
  $sql = 'call pivotwizard("c.nome,b.setor" ,"date_format(b.dt_tratamento_input,\'%d/%m\')","1", "tbl_cotacao a,tbl_input b,tbl_usuarios c", "a.id_cotacao=b.id_cotacao and b.idtbl_usuario_input=c.idtbl_usuario and b.dt_tratamento_input LIKE \'%'."$dt_dia".'%\' " );';
  criaPivotTable($sql, "Tipo");
 }
 elseif($_POST['setor']==3){
   mysql_query("SET lc_time_names = 'pt_BR';");
  $sql = 'call pivotwizard("c.nome,b.setor" ,"date_format(b.dt_tratamento_auditoria,\'%d/%m\')","1", "tbl_cotacao a,tbl_auditoria b,tbl_usuarios c", "a.id_cotacao=b.id_cotacao and b.idtbl_usuario_auditoria=c.idtbl_usuario and b.dt_tratamento_auditoria LIKE \'%'."$dt_dia".'%\' " );';
  criaPivotTable($sql, "Tipo");
 } 
 elseif($_POST['setor']==4){
 
   mysql_query("SET lc_time_names = 'pt_BR';");
 $sql = 'call pivotwizard("c.nome,b.setor" ,"date_format(b.dt_tratamento_correcao,\'%d/%m\')","1", "tbl_cotacao a,tbl_correcao b,tbl_usuarios c", "a.id_cotacao=b.id_cotacao and b.idtbl_usuario_correcao=c.idtbl_usuario and b.dt_tratamento_correcao LIKE \'%'."$dt_dia".'%\' " );';
   criaPivotTable($sql, "Tipo");
    
 } 
   
    ?>


  <p>
  <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?t=forms/formfiltro_producao.php'" class="sb2 bradius" />
 </p>     
</div>
</div>



</body>
</html>
