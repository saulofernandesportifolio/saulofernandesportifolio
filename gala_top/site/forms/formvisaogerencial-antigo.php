
<?php
  
if(empty($_COOKIE['idtbl_usuario'])){
    
echo "
       <script type=\"text/javascript\">
        alert('Usu&aacute;rio inv&aacute;lido!');
        document.location.replace('index.php');
	    </script>
 ";
  exit(); 
    
    
    
}  


ini_set ( 'mysql.connect_timeout' ,  '600' ); 
ini_set ( 'default_socket_timeout' ,  '600' );
ini_set('memory_limit', '-1');



?>

	
<?php	
	$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

 $dt_dia = date("Y-m-");
  $dt_mes = date("m/Y");
  //$dt_dia = "2015-08-";
  //echo $dt_dia ;
 
  
    
 
  $atv_op2="SELECT * FROM tbl_cotacao a 
           INNER JOIN tbl_analise b
           ON a.id_cotacao=b.id_cotacao
           WHERE a.dt_inclusao_bd_cip like '%$dt_dia%'";
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
 <p id="p_padrao" align="center">Vis&atilde;o Geral M&ecirc;s : <?php echo $dt_mes ?></p>
        <hr width="104%"/>               
             <?php
			 //tabela por regional - inicio
			 
		
				$atv_op="SELECT * FROM tbl_cotacao a 
                        INNER JOIN tbl_analise b
                        ON a.id_cotacao=b.id_cotacao
                        WHERE a.dt_inclusao_bd_cip like '%$dt_dia%'";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$totalgeral=mysql_num_rows($acao_op);
						
						 }
						
						$atv_op="SELECT COUNT(a.id_cotacao)as total,
                        a.regional,
                        a.carteira 
                        FROM tbl_cotacao a 
                         WHERE a.dt_inclusao_bd_cip like '%$dt_dia%' GROUP BY regional";
                        $acao_op=mysql_query($atv_op,$conecta);
						
					          
		echo "<table border='0' class='lista-clientespivot'>
          <thead> 
		<tr>
		<th>
        Regional
        </th>
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
		               	$regional = $dado['regional'];
					    $carteira = $dado['carteira'];
						$total = $dado['total'];
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr>
             
                  	<td>$regional</td>
                    <td>$carteira</td>
                  	<td>$total</td>
                  	  	</tr>";
						
				               
					}
					$cor2 = '#CCCCCC';
					echo" <tr>
	               <td>
                    Total Geral
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
								
				 //tabela por regional - fim 
				 
			 	?>
     
                   <?php
				   
	
				$atv_op="SELECT * FROM tbl_cotacao a 
                        INNER JOIN tbl_analise b
                        ON a.id_cotacao=b.id_cotacao
                        WHERE a.dt_inclusao_bd_cip like '%$dt_dia%'";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$totalgeral=mysql_num_rows($acao_op);
						
						 }
						
						$atv_op="SELECT COUNT(a.id_cotacao)as total,
                        a.regional,
                        a.carteira 
                        FROM tbl_cotacao a 
                         WHERE a.dt_inclusao_bd_cip like '%$dt_dia%' GROUP BY a.regional,a.carteira";
                        $acao_op=mysql_query($atv_op,$conecta);
						
					          
		echo "<table border='0' class='lista-clientespivot'>
          <thead> 
		<tr>
		<th>
        Regional
        </th>
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
		               	$regional = $dado['regional'];
					    $carteira = $dado['carteira'];
						$total = $dado['total'];
	
    
    
     //bloco de definição de tipo de linha           
            $soma= $linha['ALTAS']+$linha['PORTABILIDADE'];
             if($linha['ALTAS']== $linha['total_linhas_ci']){
                  $linha['tipo_de_linha']="ALTAS";
              }else
                  if( $linha['PORTABILIDADE']== $linha['total_linhas_ci']){
                     $linha['tipo_de_linha']="ALTAS";
                   }else
                     if($soma== $linha['total_linhas_ci']){
                        $linha['tipo_de_linha']="alta pura";
                       }else
                          if($linha['TA'] == $linha['total_linhas_ci']){
                            $linha['tipo_de_linha']="troca pura";                     
                           }else{
                               $linha['tipo_de_linha']="migracao"; 
                                }
         if($linha['tipo_de_linha'] == "alta pura" ){
            $linha['tipo_processo']="Input de todas linhas";
            $linha['criterio']="Ate 3 dias uteis";
            $linha['dias']="3"; 
           }else
           if($linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] < '51'  ){
            $linha['tipo_processo']="Input  ate 50 linhas";
            $linha['criterio']="Ate 4 dias uteis"; 
            $linha['dias']="4";
           }else
           if($linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] > '50' and $linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] < '101'){
            $linha['tipo_processo']="Input  entre 51 e 99 linhas";
            $linha['criterio']="Ate 5 dias uteis"; 
            $linha['dias']="5";
           }else
           if($linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] > '100' and $linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] < '201'){
            $linha['tipo_processo']="Input  acima de 100 linhas";
            $linha['criterio']="Ate 6 dias uteis"; 
            $linha['dias']="6";
           }else
           if($linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] > '200' and $linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] < '401'){
            $linha['tipo_processo']="Input  acima de 200 linhas";
            $linha['criterio']="Ate 7 dias uteis"; 
            $linha['dias']="7";
           }else
           if($linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] > '400' and $linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] < '701'){
            $linha['tipo_processo']="Input  acima de 400 linhas";
            $linha['criterio']="Ate 8 dias uteis"; 
            $linha['dias']="8";
           }else
           if($linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] > '700' and $linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] < '1001'){
            $linha['tipo_processo']="Input  acima de 700 linhas";
            $linha['criterio']="Ate 9 dias uteis"; 
            $linha['dias']="9";
           }else
           if($linha['tipo_de_linha'] == "troca pura" and $linha['total_linhas_ci'] > '1000'){
            $linha['tipo_processo']="Input  acima de 1000 linhas";
            $linha['criterio']="Ate 10 dias uteis"; 
            $linha['dias']="10";
           }else
           
           
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] < '51'  ){
            $linha['tipo_processo']="Input  ate 50 linhas";
            $linha['criterio']="Ate 6 dias uteis"; 
            $linha['dias']="6";
           }else
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] > '30' and $linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] < '101'){
            $linha['tipo_processo']="Input  entre 51 e 99 linhas";
            $linha['criterio']="Ate 8 dias uteis"; 
            $linha['dias']="8";
           }else
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] > '100' and $linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] < '201'){
            $linha['tipo_processo']="Input  acima de 100 linhas";
            $linha['criterio']="Ate 10 dias uteis"; 
            $linha['dias']="10";
           }else
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] > '200' and $linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] < '401'){
            $linha['tipo_processo']="Input  acima de 200 linhas";
            $linha['criterio']="Ate 11 dias uteis"; 
            $linha['dias']="11";
           }else
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] > '400' and $linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] < '701'){
            $linha['tipo_processo']="Input  acima de 400 linhas";
            $linha['criterio']="Ate 13 dias uteis"; 
            $linha['dias']="13";
           }else
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] > '700' and $linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] < '1001'){
            $linha['tipo_processo']="Input  acima de 700 linhas";
            $linha['criterio']="Ate 16 dias uteis"; 
            $linha['dias']="16";
           }else
           if($linha['tipo_de_linha'] == "migracao" and $linha['total_linhas_ci'] > '1000'){
            $linha['tipo_processo']="Input  acima de 1000 linhas";
            $linha['criterio']="Ate 22 dias uteis"; 
            $linha['dias']="22";
           }
    
    
    
    
    			
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr>
             
                  	<td>$regional</td>
                    <td>$carteira</td>
                  	<td>$total</td>
                  	  	</tr>";
						
				               
					}
					$cor2 = '#CCCCCC';
					echo" <tr>
	               <td>
                    Total Geral
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
								
				 //tabela por regional - fim 
			 	?>
             <br/><br/>


              <?php
			 	?>
                
                
          

</div>
</div>
</body>
</html>
