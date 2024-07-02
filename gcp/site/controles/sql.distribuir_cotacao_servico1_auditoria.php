<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Untitled Document</title>
</head>

<body>

<?php

$tempo = 0;

set_time_limit($tempo);
  
 $data_quantificacao=date('Y-m_d H:s:i'); 

  $sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
    
    while($linha_operador = mysql_fetch_assoc($acao_operador))
    {
    $idtbl_usuario = $linha_operador["idtbl_usuario"];
    $nomeuser= $linha_operador["nome"];
    }
 
//$id_cotacao;
 
 

if ( $_POST['ALTAS'] == 0 
&& $_POST['PORTABILIDADE'] == 0 
&& $_POST['MIGRACAO'] == 0 
&& $_POST['TROCAS'] == 0 
&& $_POST['TT'] == 0 
&& $_POST['BACKUP'] == 0 
&& $_POST['M_2_M'] == 0 
&& $_POST['FIXA'] == 0 
&& $_POST['PRE_POS'] == 0 
&& $_POST['MIGRACAO_TROCA'] == 0)
{
//$dado = $usuario;

echo "    <script type=\"text/javascript\">
          alert('Erro ao cadastrar atividade!');
          </script>
          <script type=\"text/javascript\">
           alert('Favor preencher todos os campos para efetuar a atividade. Obrigado!');
           history.back();
		   </script>
    ";
    exit();
 
}
else{
	

 



 $ALTAS = $_POST['ALTAS'];
 $PORTABILIDADE = $_POST['PORTABILIDADE'];
 $MIGRACAO      = $_POST['MIGRACAO'];
 $TROCAS        = $_POST['TROCAS'];
 $TT            = $_POST['TT'];
 $BACKUP        = $_POST['BACKUP'];
 $M_2_M         = $_POST['M_2_M'];
 $FIXA        = $_POST['FIXA'];
 $PRE_POS       = $_POST['PRE_POS']; 
 $MIGRACAO_TROCA= $_POST['MIGRACAO_TROCA'];
//$TIPO_SERVICO  = $_POST['TIPO_SERVICO'];
$informacoes= $_POST['informacoes'];

$soma=$ALTAS+$PORTABILIDADE+$MIGRACAO+$TROCAS+$TT+$BACKUP+$FIXA+$M_2_M+$PRE_POS+$MIGRACAO_TROCA;

if($ALTAS > 0 ){
 $HP='ALTAS';  
}else{
  $HP='';  
}
if($PORTABILIDADE > 0){
   $PN = '-PORTABILIDADE';
}else{
  $PN = '';
}
if($MIGRACAO > 0){
  $MG = '-MIGRACAO';
}else{
   $MG = '';
}
if($TROCAS > 0){
   $TA= '-TROCAS';
}else{
   $TA = '';
}

if($TT > 0){
   $TT1 = '-TT';
}else{
   $TT1= '';
}
if($BACKUP  > 0){
$BACKUP1 = '-BACKUP';
}else{
  $BACKUP1 = '';
}
if($FIXA > 0){
$FIXA1 = '-FIXA';
}else{
  $FIXA1= '';
}
if($M_2_M > 0){
$M_2_M1 = '-M_2_M';
}else{
$M_2_M1 = '';
}
if($PRE_POS > 0){
$PRE_POS1= '-PRE_POS';
}else{
$PRE_POS1 = '';
}
if($MIGRACAO_TROCA > 0){
$MIGRACAO_TROCA1= '-MIGRACAO_TROCA';
}else{
$MIGRACAO_TROCA1 = '';
}



$CONCATENASERV= $HP.$PN.$MG.$TA.$TT1.$BACKUP1.$FIXA1.$M_2_M1.$PRE_POS1.$MIGRACAO_TROCA1;



if(empty($ALTAS)){
 
  $ALTAS=0;

}
if(empty($PORTABILIDADE)){
    
   $PORTABILIDADE=0;  

}
if(empty($MIGRACAO)){
    
   $MIGRACAO=0; 

}
if(empty($TROCAS)){
    
   $TROCAS=0;   

}
if(empty($TT)){
    
   $TT=0;  

}
if(empty($BACKUP)){
    
   $BACKUP=0;   

}
if(empty($M_2_M)){
    
   $M_2_M=0; 

}
if(empty($FIXA)){
    
   $FIXA=0;   

}
if(empty($PRE_POS)){
    
   $PRE_POS=0; 

}
if(empty($MIGRACAO_TROCA)){
    
 $MIGRACAO_TROCA=0;  

}
if(empty($informacoes)){

$informacoes='-';

}



$id_cotacao= (int) $_POST['id_cotacao'];

                            

 $query="UPDATE cip_nv.tbl_cotacao a SET 
                                a.ALTAS            ='$ALTAS',
                                a.PORTABILIDADE2   ='$PORTABILIDADE',
                                a.MIGRACAO         ='$MIGRACAO',
                                a.TROCAS           ='$TROCAS',
                                a.TT               ='$TT',
                                a.BACKUP           ='$BACKUP',
                                a.M_2_M            ='$M_2_M',
                                a.FIXA             ='$FIXA',
                                a.PRE_POS          ='$PRE_POS', 
                                a.MIGRACAO_TROCA   ='$MIGRACAO_TROCA',
                                a.TIPO_SERVICO     ='$CONCATENASERV',
                                a.informacoes      ='$informacoes',
                                a.total_linhas_cip ='$soma',
                                a.data_quantificacao='$data_quantificacao', 
                                a.usuario_quantificacao='$nomeuser'                   
                           WHERE a.id_cotacao        = '$id_cotacao' ";



(!mysql_query($query,$conecta));


 $query="UPDATE cip_nv.tbl_auditoria b SET 
                              	b.status_cip_auditoria      = '13',
								                b.disc_status_cip_auditoria = 'Distribuir',
							                  b.setor                     = 'Auditoria'
								WHERE id_cotacao  = '$id_cotacao'";


(!mysql_query($query,$conecta));


if($_POST['tipo'] == 'VPG - TOP'){

 $query2="UPDATE cip_nv.tbl_cotacao a,cip_nv.carteira b 
SET a.carteira=SUBSTRING(b.carteira,6,255) 
WHERE a.cpf_cnpj=b.cpf_cnpj AND a.id_cotacao= '$id_cotacao' ";

(!mysql_query($query2,$conecta));
}elseif($_POST['tipo'] <>  'VPG - TOP'){

 $query2="UPDATE cip_nv.tbl_cotacao a 
SET a.carteira='".$_POST['tipo']."' 
WHERE  a.id_cotacao= '$id_cotacao' ";
(!mysql_query($query2,$conecta));

}


$query3="UPDATE cip_nv.tbl_cotacao a 
SET a.segmento='GOV' 
WHERE a.id_cotacao= '$id_cotacao' AND a.carteira LIKE '%GOV%'  ";
(!mysql_query($query3,$conecta));


$query7="UPDATE cip_nv.tbl_cotacao a 
SET a.segmento='MASSIVO' 
WHERE a.id_cotacao= '$id_cotacao' AND a.carteira LIKE '%MASS%' ";
(!mysql_query($query7,$conecta));


$query5="UPDATE cip_nv.tbl_cotacao a 
SET a.segmento='VIP' 
WHERE a.id_cotacao= '$id_cotacao' AND a.carteira LIKE '%VIP%' ";
(!mysql_query($query5,$conecta));

$query6="UPDATE cip_nv.tbl_cotacao a 
SET a.segmento='ESTRATEGICO' 
WHERE a.id_cotacao= '$id_cotacao' AND a.carteira LIKE '%ESTRATEGICO%' ";
(!mysql_query($query6,$conecta));



$query4="UPDATE cip_nv.tbl_cotacao a 
SET a.segmento='TOP' 
WHERE a.id_cotacao= '$id_cotacao' AND a.segmento IS NULL ";
(!mysql_query($query4,$conecta));



$sql_empresa="UPDATE cip_nv.empresa_especial,cip_nv.tbl_cotacao 
SET  tbl_cotacao.cliente_tipo=empresa_especial.grupo 
WHERE tbl_cotacao.cpf_cnpj=empresa_especial.raiz_grupo 
AND tbl_cotacao.cliente_tipo IS NULL 
AND tbl_cotacao.id_cotacao='$id_cotacao' ";
(!mysql_query($sql_empresa,$conecta));

	 
//contagem sla
  include("sql.sla.php");



/*if($_POST['cart']== '%'){

  $canal='%';
}else{
 $canal=$_POST['segmento'];

}*/
//$dado = $usuario;
//$dado2= $canal;
//$dado3= '0';
//$dado4= '';

echo "
       <script type=\"text/javascript\">
        alert('Linhas das cotacoes cadastrada com sucesso!');
        document.location.replace('principal.php?&t=forms/formdistribuir_cotacao_auditoria.php');
	    </script>
 ";
  exit();
}
	
mysql_free_result($acao_operador);
mysql_close($conecta);
mysql_next_result($conecta);
?>




</body>
</html>
