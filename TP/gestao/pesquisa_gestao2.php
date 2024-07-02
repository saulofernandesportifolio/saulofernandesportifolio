<?php   
@session_start(); 

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">

<?php

    $tempo = 0;
  set_time_limit($tempo);

ini_set ( 'mysql.connect_timeout' ,  '800' ); 
ini_set ( 'default_socket_timeout' ,  '800' );
ini_set('memory_limit', '-1');


//Testa se o perfil está correto.
if($_POST['nu_pedido'] == ""){
    $nu_pedido = "%";
}else{
    $nu_pedido = $_POST['nu_pedido'];
}
if($_POST['status'] == ""){
    $status = "%";
}else{
    $status = $_POST['status'];
}
if($_SESSION["operador_gestao"] == 0){
	echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../logout.php');
		</script>
	";
}
include "../conexao.php";

if (!isset($_POST["regional"]) && empty($_POST["nu_pedido"]) && empty($_POST["status"]))
{
echo "<script>alert('Nenhuma regional selecionada.'); document.location.replace('../../tp/gestao/gestao_filtro.php'); </script>\n";
exit;
}

$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];

if($nu_pedido === "%" && $status === "%" && isset($_POST['regional'])){
    $tipo = $_POST['regional']; 
    $regionais = ''; 
    foreach($tipo as $k => $v){ 
    $regionais.= ", or, "."regional="."'".$v."'";
    }
    //DELETE($valores,1,2);
    $regionais = "teste".$regionais;
    $regiao = explode(",", $regionais);
    $regiao2 = array_slice($regiao,2,55);
    $novavar2 = implode("", $regiao2);

   $sql_consulta="SELECT * 
                   FROM base_gestao  
                   WHERE ($novavar2) 
                   ORDER BY termino_efetivo ASC";
}else{
   $sql_consulta="SELECT * 
                   FROM base_gestao  
                   WHERE pedido LIKE '$nu_pedido%' and
                         fila LIKE '$status%' 
                   ORDER BY termino_efetivo ASC";
}
$tempo = 0;
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
$data_dia= date("y/m/d"); 
//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario
$sql_verifca = "$sql_consulta";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());
$num = mysql_num_rows($acao_verifica);
if( $num > 0){?>
    <div id="principal">
    <div id="menu">
    
	<?php include("../menu.php") ?>
    
    </div>
    <div>
    <div id="conteudo_pn">
     
    <p id="p_padrao">Foram encontrados <?php echo "$num" ?> pedidos.</p>
    
	<?php          
		echo "<form method='POST' action='encaminha_gestao.php'>
        <table bgcolor='D6CA98' align='center' border='0'  width=\"40%\">
            <tr>
    		<td id=\"t_td\" width=\"8%\">
                <strong><font color=\"#000000\">Pedido</font></strong>
            </td>
    		<td id=\"t_td\" width=\"5%\">
                <strong><font color=\"#000000\">Regional</font></strong>
            </td>
            <td id=\"t_td\" width=\"50%\">
                <strong><font color=\"#000000\"><center>GC</center></font></strong>
            </td>
            <td id=\"t_td\" width=\"20%\">
                <strong><font color=\"#000000\">Status</font></strong>
            </td>
            <td id=\"t_td\" width=\"20%\">
                <strong><font color=\"#000000\">Tramite</font></strong>
            </td>
            <td id=\"t_td\" width=\"20%\">
                <strong><font color=\"#000000\">Usuario</font></strong>
            </td>
    		<td id=\"t_td\" width=\"5%\">
                <strong><font color=\"#000000\">Data Trâmite</font></strong>
            </td>
            <td id=\"t_td\" width=\"5%\">
                <strong><font color=\"#000000\">Encaminhar<br />pedido</font></strong>
            </td>                  
    		</tr>
        
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado=mysql_fetch_array($acao_verifica))
			{
				$id_gestao = $dado["id_gestao"];
				$regional = $dado["regional"];
				$pedido = $dado["pedido"];
				$gc = $dado["gc"];
                $status = $dado["disc_status_tp"];
                $tramite = $dado["tramite"];
                $usuario = $dado["usuario"];
				$termino_efetivo = $dado ["termino_efetivo"];


if ($termino_efetivo <> 0){   
$data_americano2 = "$termino_efetivo";
$partes_da_data2 = explode(" ",$data_americano2);
$data2="$partes_da_data2[0]";
$datatransf2= explode("-",$data2);
$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
$termino_efetivo = $data2;
}
else
{
$criado_em = "";
}
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
               	<td nowrap='nowrap' id=\"t_td\" bgcolor=\"$cor\">
				<a href=\"gestao_bko.php?&id_gestao=$id_gestao\">$pedido</a>
				</td>
                  	<td nowrap='nowrap' id=\"t_td\" bgcolor=\"$cor\">$regional</td> 
                  	<td nowrap='nowrap' id=\"t_td\" bgcolor=\"$cor\">$gc</td>
                    <td nowrap='nowrap' id=\"t_td\" bgcolor=\"$cor\">$status</td>
                    <td nowrap='nowrap' id=\"t_td\" bgcolor=\"$cor\">$tramite</td>
                    <td nowrap='nowrap' id=\"t_td\" bgcolor=\"$cor\">$usuario</td>
				  	<td nowrap='nowrap' id=\"t_td\" bgcolor=\"$cor\">$termino_efetivo</td>
                    <td nowrap='nowrap' id=\"t_td\" bgcolor=\"$cor\">
                        <center><input type=\"checkbox\" name=\"id_pedido[]\" value=\"$id_gestao\" /></center>
                    </td>
               		</tr>";
					}
                echo "<tr>
                        <td align='center' colspan=3>
                            <font size='5'>Encaminhar para o operador: </font>
                        </td>
                        <td colspan=2>
                            <select name='operador'>";
                                $sql="SELECT nome, login 
                                      FROM tp.usuarios 
                                      WHERE operador_gestao = 1 and
                                            bi = 0
                                      ORDER BY nome;";
                                $consulta = mysql_query($sql);
                                while($dado=mysql_fetch_assoc($consulta)){
                                    echo "<option value='".$dado['login']."'>".$dado['nome']."</option>";
                                }
                echo "</select></td>
                        <td align='center' colspan=2>
                            <input type='submit' id='enviar' name='enviar' value='Encaminhar' /></td></tr>";
				echo "</form></table>";   
			 	?>
			</div>
		</div>
	</div>
</body>
</html>
<?php
}else{
    echo "<script type=\"text/javascript\">
        alert('Nenhum pedido foi encontrado!');
        document.location.replace('../../tp/gestao/pesquisa_gestao.php');
        </script>";
}
?>