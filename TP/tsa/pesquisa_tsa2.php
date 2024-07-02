<?php   
@session_start();
include '../conexao.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php
	if($_SESSION["tsa"] == 0){  
    echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../logout.php');
		</script>
 		";
	}
	$tempo = 0;

set_time_limit($tempo);
date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");
  
function transforme_data_hora_dma($data){
    $dataHora = explode(" ",$data);
    $dt = explode("-",$dataHora[0]);
    return $dt[2]."/".$dt[1]."/".$dt[0]." ".$dataHora[1];
}  

function transforme_data_hora_amd($data2){
    $dataHora2 = explode(" ",$data2);
    $dt2 = explode("/",$dataHora2[0]);
    return $dt2[2]."-".$dt2[1]."-".$dt2[0];
}  
  
  
    //Recebe Post
    if(isset($_POST["n_monitoria"]) && $_POST["n_monitoria"]!= ''){$n_monitoria= $_POST["n_monitoria"];}
        else{$n_monitoria = '%';}
    if(isset($_POST["n_pedido"]) && $_POST["n_pedido"]!= ''){$pedido= $_POST["n_pedido"];}
        else{$pedido = '%';}
	$acao= 	               $_POST["acao"];
    $operacao=		       $_POST["erro"];
    $analise_bko=	       $_POST["analise_bko"];
    $correcao=		       $_POST["ofensor"];
    $tipodata =            $_POST['tipodata'];   



 

if($tipodata == 1){
  $data_1 =transforme_data_hora_amd($_POST["data_1"]);
  $data_2 = transforme_data_hora_amd($_POST["data_2"]);
  $coluna="data_hora_auditoria BETWEEN '$data_1' and '$data_2'";
      
}
if($tipodata == 2){
 $data_1 =transforme_data_hora_amd($_POST["data_1"]);
 $data_2 = transforme_data_hora_amd($_POST["data_2"]);  
 $coluna="data_correcao BETWEEN '$data_1' and '$data_2'";
}
if($tipodata == 3)
{
$coluna = "data_correcao LIKE '%' AND data_hora_auditoria LIKE '%'";    
}    
  
 
    
?>
<div id="principal">

    <div id="menu">
   <?php 
    include("../menu.php") ?>
    </div>
    <div id="caixa" style="height:460px;">
        <div id="conteudo">
            <p id="p_padrao">TSA - <?php echo $_SESSION["nome"]; ?>.</p>
<?php
echo "<table bgcolor='D6CA98' align='left' border='0' class='combobox_padrao_grande'>
		<tr>
    		<td id=\"t_td\"><strong><font color=\"#000000\">	Nº da monitoria	    </font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	Pedido	            </font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	Ação	            </font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	Revisões	        </font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	Operacao	        </font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	Analise Bko	        </font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	Necessario Correcao	</font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	Status da correcao	</font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	sub-status          </font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	Datahora - Auditoria</font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	Data Correção       </font></strong></td>
            <td id=\"t_td\"><strong><font color=\"#000000\">	Data Cadastro       </font></strong></td>
		</tr>
		";

 $sql="SELECT * FROM base_tsa 
      WHERE `n_monitoria`           LIKE    '$n_monitoria' 
        AND `pedido`                LIKE    '$pedido' 
        AND `acao`                  LIKE    '$acao'
        AND `erro`                  LIKE    '$erro'
        AND `analise bko`           LIKE    '$analise_bko'
        AND `operador ofensor`      LIKE    '$ofensor'
        AND $coluna";
        //die($sql);
$consulta = mysql_query($sql);
$num=mysql_num_rows($consulta);


if(mysql_num_rows($consulta) == 0)
{
     echo "<script type=\"text/javascript\">
    		alert('Nenhuma TSA encontrada!');
    		document.location.replace('../../tp/tsa/pesquisa_tsa.php');
    		</script>
     		";
}else

     echo "Total de {$num} pedidos.";
{
    $cor= "#FFFFFF";
    while ($dado= mysql_fetch_array($consulta))
    {
        $id          = $dado["codigo"];
        $n_monitoria = $dado["n_monitoria"];
        $pedido      = $dado["pedido"];
        $q_revisoes  = $dado["qtde de revisões"];
        $operacao    = $dado["operacao"];
        $analise_bko = $dado["analise bko"];
        $correcao    = $dado["necessario correcao"];
        $status_correcao =  $dado["status da correcao"];
        $subStatus_correcao =  $dado["sub-status da correcao"];
        $data_aud           = transforme_data_hora_dma($dado['data_hora_auditoria']);
        $data_cad           = transforme_data_hora_dma($dado['data_cadastro']);
        $data_corre         = transforme_data_hora_dma($dado['data_correcao']);

     if($cor == "#CCCCCC")
     {
       	$cor= "#FFFFFF";
     }else{
        $cor= "#CCCCCC";
	 }

     echo " <tr bgcolor=\"$cor\">
    		<td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\"><a href='abre_tsa.php?id=$id'>$n_monitoria</a></font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$pedido</font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$acao</font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$q_revisoes</font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$operacao</font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$analise_bko</font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$correcao</font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$status_correcao</font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$subStatus_correcao</font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$data_aud</font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$data_corre</font></td>
            <td id=\"t_td\"  bgcolor=\"$cor\"><font color=\"#000000\">$data_cad</font></td>
    		</tr>
    		";
    }
}		
?>
        </div>        
    </div>   
</div>    
</body>
</html>