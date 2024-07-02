<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script language="JavaScript">
function abrir(URL) {
 
  var width = 150;
  var height = 250;
 
  var left = 99;
  var top = 99;
 
  window.open(URL,'janela','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=680,height=800');
 
}
</script>
</head>
<body id="logar" background="../../tp/img/background.JPG">

<?php
    //Testa se o perfil está correto.
	if($_SESSION["adm_erros"] == 0){  
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('..\logout.php');
			</script>
 		";
	}
    $nome = $_SESSION["nome"];
    $turno = $_SESSION["turno"];				    
    $login = $_SESSION["login"];

    $tempo = 0;

    set_time_limit($tempo);
    date_default_timezone_set("Brazil/East");
    $dt_dia = date("Y-m-d");
    $dt_dia2 = date("d/m/Y");
  
    include("../../tp/conexao.php");
    $atv_dia="SELECT * 
              FROM base_erros 
              WHERE data_tramite ='$dt_dia'";
    $consulta_atv_dia=mysql_query($atv_dia,$conecta);
    $dado= mysql_fetch_array($consulta_atv_dia);
    {
		$data_tramite= $dado['data_tramite'];				 
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
            $data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
            $data_tramite2 = $data;
        }
    }						
?>
<p id="p_padrao" align="center">
    Visão Erros Dia: <?php echo $dt_dia2 ?>
</p>
<hr width="104%" />       
<?php
//tabela por regional - inicio //
    include("../../tp/conexao.php");
    $dado= mysql_fetch_array($consulta_atv_dia);
    {
        $total_atv=mysql_num_rows($consulta_atv_dia);
    }
    $atv_regional= "SELECT regional,  
                        COUNT(pedido)as pedido
                    FROM base_erros 
                    WHERE data_tramite = '$dt_dia' 
                    GROUP BY regional";
    $consulta_atv_regional=mysql_query($atv_regional,$conecta);
    echo "<table bgcolor='D6CA98' align='left' border='0' class='combobox_padrao'>
            <tr>
                <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Regional</font></strong>
                </td>
                <td id=\"t_td1\" width=\"1%\">
                    <strong><font color=\"#000000\">Total</font></strong>
                </td>
            </tr>
    ";
    //Pesquisa e retorna os campos declarado nas variáveis.
    include("../../tp/conexao.php");
    $cor= "#FFFFFF";
    while ($dado= mysql_fetch_array($consulta_atv_regional))
    {
        $regional = $dado['regional'];
        $pedido = $dado['pedido'];
        if($cor == "#CCCCCC"){
            $cor= "#FFFFFF";
        }else{
            $cor= "#CCCCCC";
        }
        echo "<tr bgcolor=\"$cor\">
                <td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$regional</td>
                <td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$pedido</td>
              </tr>";    
    }
    $cor2 = '#CCCCCC';
    echo "<tr bgcolor=\"$cor2\">
            <td id=\"t_td\" width=\"1%\">
                <strong><font color=\"#000000\">Total Geral</font></strong>
            </td>
            <td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
                <strong><font color=\"#000000\">$total_atv</font></strong>
            </td>
          </tr>
         "; 
    echo "</table>";  
//tabela por regional - fim //
    
//tabela por tipo de solicitação - inicio //    
    include("../../tp/conexao.php");
    $atv_tipo= "SELECT  tipo, 
                        COUNT(pedido)as pedido 
                FROM base_erros 
                WHERE data_tramite = '$dt_dia' 
                GROUP BY tipo";
    $consulta_atv_tipo=mysql_query($atv_tipo,$conecta);
    echo "<table bgcolor='D6CA98' align='reight' border='0' class='combobox_padrao_grande'>
            <tr>
                <td id=\"t_td\" width=\"15%\">
                    <strong><font color=\"#000000\">Tipo De Solicitacao</font></strong>
                </td>
                <td id=\"t_td1\" width=\"10%\">
                    <strong><font color=\"#000000\">Total</font></strong>
                </td>
            </tr>
         ";
    //Pesquisa e retorna os campos declarado nas variáveis.
    include("../../tp/conexao.php");
    $cor= "#FFFFFF";
    while ($dado= mysql_fetch_array($consulta_atv_tipo))
    {
        $tipo_de_solicitacao= $dado['tipo'];
        $pedido = $dado['pedido'];
        if($cor == "#CCCCCC"){
            $cor= "#FFFFFF";
        }else{
            $cor= "#CCCCCC";
        }
        echo "<tr bgcolor=\"$cor\">
                <td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$tipo_de_solicitacao</td>
                <td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$pedido</td>
              </tr>";
    }
    $cor2 = '#CCCCCC';
    echo" <tr bgcolor=\"$cor2\">
            <td id=\"t_td\" width=\"1%\">
                <strong><font color=\"#000000\">Total Geral</font></strong>
            </td>
            <td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
                <strong><font color=\"#000000\">$total_atv</font></strong>
            </td>
          </tr>
    "; 
    echo "</table>";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    //tabela por tipo de solicitação - fim   //
?>
             <br /><br />
<?php
//tabela por motivo - inicio //
    include("../../tp/conexao.php");
    
    $atv_motivo="SELECT COUNT(pedido)as pedido, 
                    status_do_pedido 
                 FROM base_erros 
                 WHERE data_tramite = '$dt_dia' 
                 GROUP BY status_do_pedido";
    $consulta_atv_motivo = mysql_query($atv_motivo,$conecta);
    echo "<table bgcolor='D6CA98' align='reight' border='0'>
            <tr>
                <td id=\"t_td\" width=\"15%\">
                    <strong><font color=\"#000000\">Status do pedido</font></strong>
                </td>
                <td id=\"t_td1\" width=\"12%\">
                    <strong><font color=\"#000000\">Total</font></strong>
                </td>
            </tr>
          ";
    //Pesquisa e retorna os campos declarado nas variáveis.
    include("../../tp/conexao.php");
    $cor= "#FFFFFF";
    while ($dado= mysql_fetch_array($consulta_atv_motivo))
    {
        $motivo= $dado['status_do_pedido'];
        $pedido = $dado['pedido'];				
        if($cor == "#CCCCCC"){
            $cor= "#FFFFFF";
        }else{
            $cor= "#CCCCCC";
        }
        if(empty($motivo))$motivo = "<i><b>&nbsp;Vazio</b></i>";
        echo "<tr bgcolor=\"$cor\">
        <td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">".$motivo."</td>
        <td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$pedido</td>
        </tr>";
    }
    $cor2 = '#CCCCCC';
    echo "<tr bgcolor=\"$cor2\">
            <td id=\"t_td\" width=\"1%\">
                <strong><font color=\"#000000\">Total Geral</font></strong>
            </td>
            <td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
                <strong><font color=\"#000000\">$total_atv</font></strong>
            </td>
          </tr>
         "; 
    echo "</table>"; 
    echo "<br>";
    echo "<br>";
//tabela por motivo - fim //
                
//tabela por tipo - inicio //
    include("../../tp/conexao.php");							
    $atv_tipo= "SELECT COUNT(pedido)as pedido, 
                       tipo, 
                       acao 
                FROM erros_pendentes 
                WHERE data_cad = '$dt_dia' 
                GROUP BY tipo";
    $consulta_atv_tipo=mysql_query($atv_tipo,$conecta);
    
    echo "<table bgcolor='D6CA98' align='reight' border='0'>
            <tr>
                <td id=\"t_td\" width=\"15%\">
                    <strong><font color=\"#000000\">Atividades pendentes</font></strong>
                </td>
                <td id=\"t_td1\" width=\"12%\">
                    <strong><font color=\"#000000\">Total</font></strong>
                </td>
            </tr>
           ";
    //Pesquisa e retorna os campos declarado nas variáveis.
    include("../../tp/conexao.php");
    $cor= "#FFFFFF";
    while ($dado= mysql_fetch_array($consulta_atv_tipo))
    {
        $tipo = $dado['tipo'];
        $pedido= $dado['pedido'];			
        
        if($cor == "#CCCCCC"){
            $cor= "#FFFFFF";
        }else{
            $cor= "#CCCCCC";
        }
        
        echo "<tr bgcolor=\"$cor\">
                <td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$tipo</td>
                <td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$pedido</td>
              </tr>
             ";
    }
    $cor2 = '#CCCCCC';
    echo "<tr bgcolor=\"$cor2\">
            <td id=\"t_td\" width=\"1%\">
                <strong><font color=\"#000000\">Total Geral</font></strong>
            </td>
            <td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
                <strong><font color=\"#000000\">$total_atv</font></strong>
            </td>
           </tr>
          "; 
    echo "</table>"; 
    echo "<br>";
    echo "<br>";
//tabela por motivo - fim //

//tabela por motivo - inicio
			  
						include("../../tp/conexao.php");
				$atv_op="select sum(linhas)as Linha,linhas,tipo,disc_status_tp from base_erros where disc_status_tp <> 'Tratado' and data_tramite like '$dt_dia'";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
					$linha1 = $dado['Linha'];
						}
							
                        $atv_op="select sum(linhas)as Linha,linhas,tipo,disc_status_tp from base_erros where disc_status_tp <> 'Tratado' and data_tramite like '$dt_dia' group by tipo, disc_status_tp";
                        $acao_op=mysql_query($atv_op,$conecta);
						         
		echo "<table bgcolor='D6CA98' align='reight' border='0'>
		<tr><strong>Linhas pendentes</strong></tr>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Tipo</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">status</font></strong>
        </td>
		       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               

						$disc_status_tp = $dado['disc_status_tp'];
						$linha = $dado['Linha'];
						$tipo = $dado['tipo'];
						

					if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$tipo</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$disc_status_tp</td>
					<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$linha</td>
                  	  	</tr>";						
				               
					}
					
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\"></font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$linha1</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>";
				echo "<br>";
				echo "<br>";
				//tabela por motivo - fim
				  
			 	?>
                
            
                                            <?php
			  //tabela por motivo - inicio
			  
						include("../../tp/conexao.php");
				$atv_op="select sum(pedido)as Linha,linhas,tipo,disc_status_tp from base_erros where disc_status_tp <> 'Tratado' and data_tramite like '$dt_dia'";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
					$linha1 = $dado['Linha'];
						}
							
                        $atv_op="select sum(pedido)as Linha,linhas,tipo,disc_status_tp from base_erros where disc_status_tp <> 'Tratado' and data_tramite like '$dt_dia' group by tipo, disc_status_tp";
                        $acao_op=mysql_query($atv_op,$conecta);
						         
		echo "<table bgcolor='D6CA98' align='reight' border='0'>
		<tr><strong>Pedidos pendentes</strong></tr>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Tipo</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">status</font></strong>
        </td>
		       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               

						$disc_status_tp = $dado['disc_status_tp'];
						$linha = $dado['Linha'];
						$tipo = $dado['tipo'];
						

					if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$tipo</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$disc_status_tp</td>
					<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$linha</td>
                  	  	</tr>";						
				               
					}
					
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\"></font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$linha1</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>";
				echo "<br>";
				echo "<br>";
				//tabela por motivo - fim
				  
			 	?>
                
                                    
                
                  
            <?php
			//tabela por operador - inicio
						include("../../tp/conexao.php");
						$atv_op="SELECT * FROM base_erros WHERE data_tramite ='$dt_dia' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
		               				   
						$login2=mysql_num_rows($acao_op);
				
						 }					
						
						
                        $atv_op="SELECT COUNT(pedido)as pedido ,
                                        regional,
                                        usuario,
                                        disc_status_tp,
                                        criado_em,
                                        tramite,
                                        nome2,
                                        data_tramite,
                                        turno 
                                 FROM base_erros 
                                 WHERE (data_tramite = '$dt_dia' and 
                                            tramite = 'Tratando') or 
                                       (data_tramite= '$dt_dia' and 
                                            tramite = 'Tratado') or 
                                       (data_tramite = '$dt_dia' and 
                                            tramite = 'Aguardando') 
                                 GROUP BY usuario,
                                          disc_status_tp DESC";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='left' border='0'>
        <tr>
		<td id=\"t_td\" width=\"35%\">
        <strong><font color=\"#000000\">Operador</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Data Tramite</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Tramite</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Data Cadastro</font></strong>
        </td>
		 <td id=\"t_td1\" width=\"10%\">
        <strong><font color=\"#000000\">Turno</font></strong>
        </td>
        <td id=\"t_td1\" width=\"10%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login8 = $dado['usuario'];
						$regional = $dado['regional'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['criado_em'];
						$tramite = $dado['tramite'];
						$nome2 = $dado['nome2'];
						$data_tramite = $dado['data_tramite'];
						$turnoo= $dado['turno'];
						$pedido = $dado['pedido'];
						$usuario = $dado['usuario'];
						
				$data_americano = "$data_cadastro"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_cadastro2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
				$data_americano2 = "$data_tramite"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data2 = explode(" ",$data_americano2);
				$data2="$partes_da_data2[0]";
				
				$datatransf2 = explode("-",$data2);
				$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
				//$datacompleta = $data;
				
				$data_tramite3 = $data2;
								
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\">$nome2</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$data_tramite3</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$disc_status_tp</a></td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">$data_cadastro2</td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$turnoo</td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">";
					?>
					
<a href="javascript:abrir('pedidos_erros_detalhes_sup.php?&login_usuario=<?php echo $usuario ?>&tramite=<?php echo $disc_status_tp ?>&turnoo=<?php echo $turnoo ?>&pesquisa_data=<?php echo $pesquisa_data ?>');"><?php echo $pedido ?></a>

					<?php
					echo "</td>
					</tr>";
         
					}
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$login2</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>";
				//tabela por operador - fim   
			 	?>
        
        </div>
        
    </div>
    
</div>
</body>
</html>