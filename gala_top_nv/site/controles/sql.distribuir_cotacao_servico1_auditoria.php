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
  $MIGRACAO = '-SERVICOS';
}else{
   $MIGRACAO = '';
}
if($TROCAS > 0){
   $TA= '-TROCAS';
}else{
   $TA = '';
}

if($TT > 0){
   $TT1 = '-TT';
}else{
   $TT1 = '';
}
if($BACKUP  > 0){
$BACKUP1 = '-BACKUP';
}else{
  $BACKUP1 = '';
}
if($FIXA > 0){
$FIXA = '-FIXA';
}else{
$FIXA = '';
}
if($M_2_M > 0){
$M_2_M = '-M_2_M';
}else{
$M_2_M = '';
}
if($PRE_POS > 0){
$PRE_POS= '-PRE_POS';
}else{
$PRE_POS = '';
}
if($MIGRACAO_TROCA > 0){
$MIGRACAO_TROCA= '-MIGRACAO_TROCA';
}else{
$MIGRACAO_TROCA = '';
}

$CONCATENASERV= $HP.$PN.$MIGRACAO.$TA.$TT1.$BACKUP1.$FIXA.$M_2_M.$PRE_POS.$MIGRACAO_TROCA;

  $query="UPDATE tbl_cotacao a SET 
                                a.ALTAS          ='{$_POST['ALTAS']}',
                                a.PORTABILIDADE2 ='{$_POST['PORTABILIDADE']}',
                                a.MIGRACAO       ='{$_POST['MIGRACAO']}',
                                a.TROCAS         ='{$_POST['TROCAS']}',
                                a.TT             ='{$_POST['TT']}',
                                a.BACKUP         ='{$_POST['BACKUP']}',
                                a.M_2_M          ='{$_POST['M_2_M']}',
                                a.FIXA           ='{$_POST['FIXA']}',
                                a.PRE_POS        = '{$_POST['PRE_POS']}', 
                                a.MIGRACAO_TROCA = '{$_POST['MIGRACAO_TROCA']}',
                                a.TIPO_SERVICO  ='$CONCATENASERV',
                                a.informacoes ='$informacoes',
                                a.total_linhas_cip ='$soma'               
                                WHERE id_cotacao  = '$id_cotacao'  ";


(!mysql_query($query,$conecta));


 $query="UPDATE tbl_auditoria b SET 
                              	b.status_cip_auditoria      = '13',
								                b.disc_status_cip_auditoria ='Distribuir',
							                  b.setor                     ='Auditoria'
								WHERE id_cotacao  = '$id_cotacao'";


(!mysql_query($query,$conecta));

//contagem sla
   include("site/controles/sql.sla.php");






//$dado = $usuario;
//$dado2= $canal;
//$dado3= '0';
//$dado4= '';

echo "
       <script type=\"text/javascript\">
        alert('Linhas das cotacoes cadastrada com sucesso!');
        document.location.replace('principal.php?t=forms/formdistribuir_cotacao_auditoria.php');
	    </script>
 ";
  exit();
}
	

?>




</body>
</html>
