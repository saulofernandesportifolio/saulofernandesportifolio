<script language="JavaScript">
function abrir(URL) {
 
  var width = 10760;
  var height = 800;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>

<script language="javascript">
function submitForm(){
    var val = document.myform.category.value;
    if(val!=-1){
        document.myform.submit();
    }
}
</script>

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
 


ini_set ( 'mysql.connect_timeout' ,  '600' ); 
ini_set ( 'default_socket_timeout' ,  '600' );
ini_set('memory_limit', '-1');


include("../gala_vpe/bd.php");

?>

	
<?php	
	$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");


   $dt_dia = date("d/m/Y");
  $dt_mes = date("m/Y");
  //$dt_dia = "2015-08-";
  //echo $dt_dia ;
 
 if(empty($data_1) && empty($data_2) ){
  $data_1=$dt_dia;  
  $data_2=$dt_dia;  
 }
 
 
  $ano=date("Y");
   $mesanterior=date("m")-1;
  $mesatual=date("m"); 
  
  if(strlen($mesanterior)==1){
    
    $mesanterior="0".$mesanterior;
  }else{
    
    $mesanterior=$mesanterior;
    
  }
  
    if(strlen($mesatual)==1){
    
    $mesatual="0".$mesatual;
  }else{
    
    $mesatual=$mesatual;
    
  }   
    
 $dt_diaanterior=$ano."-".$mesanterior."-";
 $dt_diaatual=$ano."-".$mesatual."-";


function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."-".substr($string,3,2)."-".substr($string,0,2);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string,6,4)."-".substr($string,3,2)."-".substr($string,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}


?>
<form name="myform" method="post" action="principal.php?&t=forms/formvisao.php"> 
 
 <?php
  $atv_op2="SELECT * FROM tbl_cotacao a 
           INNER JOIN tbl_analise b
           ON a.id_cotacao=b.id_cotacao
           WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )";
                        $acao_op2=mysql_query($atv_op2,$conecta);
					$dado2= mysql_fetch_array($acao_op2);
					    {
		                 $data_tramite= $dado2['dt_inclusao_bd_cip'];
						  if($data_tramite == '')
						 {
						$data_tramite= '';
						$data_tramite2= '';
						 }
						 else
						 {
						 $data_americano = "$data_tramite"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_tramite2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
					     }
						}
?>                     

        
<div id="filtropivot" class="form bradius">
<div class="divformpivot">   
 <p id="p_padrao" align="center">Vis&atilde;o Geral Dia : <?php echo $dt_dia;?></p>
 
     <p>Para filtrar por data clicar no campo (Data Inicial e Data Final)</p>
     <p> Data Inicial: 
            <input name="data_1" type="text" id="data_1" size="15" maxlength="10"  class="txt2data bradius"
            onkeyup="Formatadata(this,event);ValidaEntrada(this,'date');"
            onclick="displayCalendar(document.getElementById('data_1'),'dd/mm/yyyy',this,true);" value="<?php echo  $dt_dia; ?>" />
     
      
      
            Data Final:&nbsp;
            <input name="data_2" type="text" id="data_2" size="15" maxlength="10"  class="txt2data bradius" 
            onkeyup="Formatadata(this,event);ValidaEntrada(this,'date');" 
            onclick="displayCalendar(document.getElementById('data_2'),'dd/mm/yyyy',this,true);" onchange="this.form.submit();"  value="<?php echo  $dt_dia; ?>"/>
             
        </p>
        <hr width="104%"/>               
             <?php
			 //tabela por regional - inicio
			 
		
				$atv_op="SELECT * FROM tbl_cotacao a 
                        INNER JOIN tbl_analise b
                        ON a.id_cotacao=b.id_cotacao
                        WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$totalgeral=mysql_num_rows($acao_op);
						
						 }
						
						$atv_op="SELECT COUNT(a.id_cotacao)as total,
                        a.regional,
                        a.dt_inclusao_bd_cip 
                        FROM tbl_cotacao a 
                         WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' ) GROUP BY regional";
                        $acao_op=mysql_query($atv_op,$conecta);
		echo "<table border='0' class='lista-clientespivot'>";					
		echo "<td>";			          
		echo "<table border='0' class='lista-clientespivot'>
          <thead> 
		<tr>
		<th>
        Regional
        </th>
       	<th>
        Total</font></strong>
        </th>
		</tr>
	    </thead>
          <tbody>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
       
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               	$regional = $dado['regional'];
					    $total = $dado['total'];
                        $dt_inclusao_bd_cip=$dado['dt_inclusao_bd_cip'];
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr>
             
                  	<td>$regional</td>
                  	<td>$total</td>
                  	 </tr>";
						
				               
					}
					$cor2 = '#CCCCCC';
					echo" <tr>
	               <td>
                    Total Geral
					</td>
                   	<td>
					$totalgeral
					</td>
		           </tr>
                     </tbody>
				    "; 
					
				echo "</table>";  
				echo "</td>";
                echo "<td>";
                echo "</td>";
                echo "<td>";				
				 //tabela por regional - fim 
				 
			 	?>
            
              <?php
				   
	            //tabela por tipo - inicio
				$atv_op="SELECT * FROM tbl_cotacao a 
                        INNER JOIN tbl_analise b
                        ON a.id_cotacao=b.id_cotacao
                        WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$totalgeral=mysql_num_rows($acao_op);
						
						 }
						
						$atv_op="SELECT COUNT(a.id_cotacao)as total,
                        a.regional,
                        a.carteira,
                        a.dt_inclusao_bd_cip 
                        FROM tbl_cotacao a 
                         WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' ) GROUP BY a.regional,a.carteira";
                        $acao_op=mysql_query($atv_op,$conecta);
						
					          
		echo "<table border='0' class='lista-clientespivot'>
          <thead> 
		<tr>
	    <th>
        Tipo
        </th>
       	<th>
        Total</font></strong>
        </th>
		</tr>
	    </thead>
          <tbody>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
       
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		                $carteira = $dado['carteira'];
						$total = $dado['total'];
                        $dt_inclusao_bd_cip=$dado['dt_inclusao_bd_cip'];
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr>
             
                  	<td>$carteira</td>
                  	<td>$total</td>
                  	  	</tr>";
						
				               
					}
				
					echo" <tr>
	               <td>
                    Total Geral
					</td>
                    <td>
					$totalgeral
					</td>
		           </tr>
                     </tbody>
				    "; 
					
				echo "</table>";  
				echo "</td>";
                echo "</table>";					
				//tabela por tipo - fim
		 	?>
            <br /><br /><br />                   
            
              <?php
			  	 //tabela por tabela por data analise - inicio   
	 echo "<table border='0' class='lista-clientespivot'>";					
		echo "<td>";
      
								          
		echo "<table border='0' class='lista-clientespivot'>
          <thead> 
		<tr>
         <th>
        DATA
        </th>
	    <th>
        Tipo
        </th>
          <th>
         ".utf8_encode('Análise')."
        </th>
       	<th>
        Total</font></strong>
        </th>
		</tr>
	    </thead>
          <tbody>
		";
                    
//Pesquisa e retorna os campos declarado nas variáveis.
    

     
      $atv_op="SELECT * FROM tbl_cotacao a 
                        INNER JOIN tbl_analise b
                        ON a.id_cotacao=b.id_cotacao
                        WHERE (a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$totalgeral=mysql_num_rows($acao_op);
						
						 }

    
      $atv_op="SELECT count(a.substatus)as total,
               a.id_cotacao, 
               a.regional, 
               a.carteira, 
               a.substatus,
               b.status_cip_analise, 
               b.disc_status_cip_analise,
               DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
               FROM tbl_cotacao a 
               INNER JOIN tbl_analise b
               ON a.id_cotacao=b.id_cotacao
               WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )
               AND b.status_cip_analise IN (2,3,4,5,6) 
               GROUP BY a.carteira,a.dt_inclusao_bd_cip2,b.disc_status_cip_analise 
               ORDER BY a.dt_inclusao_bd_cip2";
        $acao_op=mysql_query($atv_op,$conecta);
     
        
		 while ($dado= mysql_fetch_array($acao_op))
		       {        
		                $id_cotacaoa=$dado['id_cotacao'];
		                $carteira = $dado['carteira'];
						$total = $dado['total'];
				        $dt_inclusao_bd_cip= $dado['dt_inclusao_bd_cip2'];
				        $status_cip_analise= $dado['status_cip_analise'];            
                   
				echo "<tr>
                    <td>$dt_inclusao_bd_cip</td>
                  	<td>$carteira</td>";
                    
                    ?>                 
                  
                    <td><a href="javascript:abrir('../../gala_vpe/site/forms/formdetalhes_visao_cotacao_analise.php?canal=<?php echo $carteira; ?>&status_cip_analise=<?php echo $status_cip_analise; ?>&data_1=<?php echo $data_1 ?>&data_2=<?php echo $data_2 ?> ');"><?php echo $dado['disc_status_cip_analise'] ?></a></td>
                  
			<?php
                  echo  	
				   "<td>$total</td>
                  	  	</tr>";            
					}
					
					echo" <tr>
	               <td>
                    Total Geral
					</td>
                     <td>
                   </td>
                   <td>
                   </td>
                   <td>
					$totalgeral
					</td>
		           </tr>
                     </tbody>
				    "; 
					
				echo "</table>";  
				echo "</td>";
                echo "<td>";					
				 //tabela por data analise - fim 
			 	?>        

           <?php
			  	 //tabela por tabela por data input - inicio   
	       
								          
		echo "<table border='0' class='lista-clientespivot'>
          <thead> 
		<tr>
         <th>
        DATA
        </th>
	    <th>
        Tipo
        </th>
        <th>
         ".utf8_encode('Input')."
        </th>
      	<th>
        Total</font></strong>
        </th>
		</tr>
	    </thead>
          <tbody>
		";
                    
//Pesquisa e retorna os campos declarado nas variáveis.
           	$atv_op="SELECT * FROM tbl_cotacao a 
                        INNER JOIN tbl_input b
                        ON a.id_cotacao=b.id_cotacao
                        WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$totalgeral=mysql_num_rows($acao_op);
						
						 }
           $atv_op="SELECT count(a.id_cotacao) as total, 
                  a.regional, 
                  a.carteira, 
                  a.substatus,
                  c.status_cip_input, 
                  c.disc_status_cip_input,
                  DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
                  FROM tbl_cotacao a 
                  INNER JOIN tbl_input c
                  ON a.id_cotacao=c.id_cotacao
                  WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )
                  AND c.status_cip_input IN (7,8,9,10,11,12) 
                  GROUP BY a.dt_inclusao_bd_cip2,a.carteira,c.disc_status_cip_input";
        $acao_op=mysql_query($atv_op,$conecta);
      
        
		 while ($dado= mysql_fetch_array($acao_op))
		       {
		                $carteira = $dado['carteira'];
						$total = $dado['total'];
				        $dt_inclusao_bd_cip= $dado['dt_inclusao_bd_cip2'];
				        $status_cip_input= $dado['status_cip_input'];             
                   
				echo "<tr>
                    <td>$dt_inclusao_bd_cip</td>
                  	<td>$carteira</td>";
                    ?>
                <td><a href="javascript:abrir('../../gala_vpe/site/forms/formdetalhes_visao_cotacao_input.php?canal=<?php echo $carteira; ?>&status_cip_input=<?php echo $status_cip_input; ?>&data_1=<?php echo $data_1 ?>&data_2=<?php echo $data_2 ?> ');"><?php echo $dado['disc_status_cip_input']; ?></a></td>
                  
                      
            
                  <?php
			     echo  	
				   "<td>$total</td>
                  	  	</tr>";            
					}
					
					echo" <tr>
	               <td>
                    Total Geral
					</td>
                     <td>
                   
					</td>
                    <td>
                   
					</td>
                                                         
                   <td>
					$totalgeral
					</td>
		           </tr>
                     </tbody>
				    "; 
					
				echo "</table>";  
				echo "</td>";
               echo "<td>";
              					
				 //tabela por data input - fim 
			 	?>
                
                
             <?php
			  	 //tabela por tabela por data auditoria - inicio   
	
							          
		echo "<table border='0' class='lista-clientespivot'>
          <thead> 
		<tr>
         <th>
        DATA
        </th>
	    <th>
        Tipo
        </th>
         <th>
         ".utf8_encode('Auditoria')."
        </th>
       	<th>
        Total</font></strong>
        </th>
		</tr>
	    </thead>
          <tbody>
		";
                    
//Pesquisa e retorna os campos declarado nas variáveis.

            $atv_op="SELECT * FROM tbl_cotacao a 
                        INNER JOIN tbl_auditoria b
                        ON a.id_cotacao=b.id_cotacao
                        WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$totalgeral=mysql_num_rows($acao_op);
						
						 }
          
           $atv_op="SELECT count(a.substatus)as total, 
                   a.regional, 
                   a.carteira, 
                   a.substatus,
                   d.status_cip_auditoria, 
                   d.disc_status_cip_auditoria,
                   DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
                   FROM tbl_cotacao a 
                   INNER JOIN tbl_auditoria d
                   ON a.id_cotacao=d.id_cotacao
                   WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )
                   AND d.status_cip_auditoria IN (13,14,15,16,17,18,19) 
                   GROUP BY a.dt_inclusao_bd_cip2,a.carteira";
        $acao_op=mysql_query($atv_op,$conecta);
        
         
        
		 while ($dado= mysql_fetch_array($acao_op))
		       {
		                $carteira             = $dado['carteira'];
						$total                = $dado['total'];
				        $dt_inclusao_bd_cip   = $dado['dt_inclusao_bd_cip2'];
				        $status_cip_auditoria = $dado['status_cip_auditoria'];
                   
				echo "<tr>
                    <td>$dt_inclusao_bd_cip</td>
                  	<td>$carteira</td>";
                    ?>
               <td><a href="javascript:abrir('../../gala_vpe/site/forms/formdetalhes_visao_cotacao_auditoria.php?canal=<?php echo $carteira; ?>&status_cip_auditoria=<?php echo $status_cip_auditoria; ?>&data_1=<?php echo $data_1 ?>&data_2=<?php echo $data_2 ?> ');"><?php echo $dado['disc_status_cip_auditoria']; ?></a></td>
               
               <?php
      
                  echo  	
				   "<td>$total</td>
                  	  	</tr>";            
					}
					
					echo" <tr>
	               <td>
                    Total Geral
					</td>
                     <td>
                   
					</td>
                    <td>
                   
					</td>
                                     
                   <td>
					$totalgeral
					</td>
		           </tr>
                     </tbody>
				    "; 
					
				echo "</table>";  
				echo "</td>";
                
               	echo "<td>";
               					
				 //tabela por data auditoria - fim 
			 	?>              
                
           <?php
			  	 //tabela por tabela por data correcao - inicio   
							          
		echo "<table border='0' class='lista-clientespivot'>
          <thead> 
		<tr>
         <th>
        DATA
        </th>
	    <th>
        Tipo
        </th>
         <th>
         ".utf8_encode('Correção')."
        </th>
       	<th>
        Total</font></strong>
        </th>
		</tr>
	    </thead>
          <tbody>
		";
                    
//Pesquisa e retorna os campos declarado nas variáveis.

               $atv_op="SELECT * FROM tbl_cotacao a 
                        INNER JOIN tbl_correcao b
                        ON a.id_cotacao=b.id_cotacao
                        WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$totalgeral=mysql_num_rows($acao_op);
						
						 }
     
           $atv_op="SELECT count(a.substatus)as total, 
                   a.regional, 
                   a.carteira, 
                   a.substatus,
                   e.status_cip_correcao, 
                   e.disc_status_cip_correcao,
                   DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
                   FROM tbl_cotacao a 
                   INNER JOIN tbl_correcao e
                   ON a.id_cotacao=e.id_cotacao
                   WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )
                   AND e.status_cip_correcao IN (20,21,22,23) 
                   GROUP BY a.dt_inclusao_bd_cip2,a.carteira";
         $acao_op=mysql_query($atv_op,$conecta);
   
       
        
		 while ($dado= mysql_fetch_array($acao_op))
		       {
		                $carteira = $dado['carteira'];
						$total = $dado['total'];
				        $dt_inclusao_bd_cip= $dado['dt_inclusao_bd_cip2'];
				        $status_cip_correcao= $dado['status_cip_correcao'];            
                   
				echo "<tr>
                    <td>$dt_inclusao_bd_cip</td>
                  	<td>$carteira</td>";                  
                ?>    
                  
          <td><a href="javascript:abrir('../../gala_vpe/site/forms/formdetalhes_visao_cotacao_correcao.php?canal=<?php echo $carteira; ?>&status_cip_correcao=<?php echo $status_cip_correcao; ?>&data_1=<?php echo $data_1 ?>&data_2=<?php echo $data_2 ?>  ');"><?php echo $dado['disc_status_cip_correcao']; ?></a></td>
                       
                  <?php        
                          
			
                  echo  	
				   "<td>$total</td>
                  	  	</tr>";            
					}
					
					echo" <tr>
	               <td>
                    Total Geral
					</td>
                     <td>
                   
					</td>
                    <td>
                   
					</td>
                                    
                   <td>
					$totalgeral
					</td>
		           </tr>
                     </tbody>
				    "; 
					
				echo "</table>";  
				echo "</td>";
                echo "</table>";
               					
				 //tabela por data correcao - fim 
			 	?>
                
             
                
</form>
</div>
</div>
</body>
</html>
