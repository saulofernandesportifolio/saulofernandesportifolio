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
  
    
if($perfil!= 5 && $perfil != 12){
    
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

$sql ="SELECT count(a.id_cotacao) as total, a.cotacao_principal 
                     FROM tbl_cotacao a 
                     WHERE a.cotacao_principal = '{$_POST['cotacao_principal']}'  
                     GROUP BY a.cotacao_principal ";
      $result = mysql_query($sql) or die (mysql_error());
      $count = mysql_fetch_array($result);
       $total=$count['total'];


     if($total == 0){

    echo "
       <script type=\"text/javascript\">
        alert('A cotacao nao esta na base !');
        history.back();
	    </script>
    ";
     exit(); 

      }else{

$sql_cota="SELECT * FROM tbl_cotacao a
WHERE a.cotacao_principal = '{$_POST['cotacao_principal']}'
GROUP BY a.cotacao_principal LIMIT 1";
$result = mysql_query($sql_cota) or die(mysql_error()); 
while($linha_cota=mysql_fetch_array($result)){
$id_cotacao       = $linha_cota['id_cotacao'];
}
      //Monta SQL para select
       $sql ="SELECT * FROM tbl_cotacao a INNER JOIN tbl_auditoria b
              ON a.id_cotacao='$id_cotacao' 
              WHERE b.idtbl_usuario_auditoria ='$idtbl_usuario' OR b.idtbl_usuario_auditoria <> '$idtbl_usuario' 
                    and a.cotacao_principal = '{$_POST['cotacao_principal']}'
                    GROUP BY a.cotacao_principal  LIMIT 1 ";
       $result = mysql_query($sql) or die(mysql_error()); 
       while($linha_cota=mysql_fetch_array($result)){
       $id_cotacao       = $linha_cota['id_cotacao'];
       $cotacao_principal= $linha_cota['cotacao_principal'];  
       $carteira         = $linha_cota['carteira']; 
       $regional         = $linha_cota['regional'];  
       $uf               = $linha_cota['uf']; 
       }

?>
<div class="divformcarrega">



<form style="background:#E7E4D1;" class="bradius" action="principal.php?id_cotacao=<?php echo $id_cotacao ?>&t=controles/sql_importar_cotacoes_filhas1.php" method="post" enctype="multipart/form-data" name="form1" >
  <p align="center"><b><font color="#a0873c" size="4" face="Gotham Light">Carga cota&ccedil;&eth;es filhas VPG</font></b></p>
      <br />
      
  <p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label style="padding-left: 5px;">Cota&ccedil;&atilde;o Principal:&nbsp;<?php echo $cotacao_principal; ?></label></p>
  <p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label style="padding-left: 20px;">Regional:&nbsp;<?php echo  $regional; ?></label></p>
  <p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label style="padding-left: 20px;">UF:&nbsp;<?php echo  $uf; ?></label></p>
  <p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label style="padding-left: 20px;">Carteira:&nbsp;<?php echo  $carteira; ?></label> </p>   
  <p>&nbsp;</p>
  <p>&nbsp;Selecione o arquivo (extens&atilde;o .txt): <input type="file" name="file"/>
    </p>
      <br />
  <p>&nbsp;</p>
  <p>&nbsp;Obs: Somente arquivos de extens&otilde;es txt e codifica&ccedil;&atilde;o UTF- 8</font></p>
  <p align="center">
  </p>

    <br />
    &nbsp;<input type="submit" name="Submit" value="   Enviar  " class="sb2 bradius"/>
	<input type="button" name="Submit2" value="Cancelar" onclick="window.location='principal.php?filtro=%&t=forms/formhome_operacao.php'" class="sb2 bradius"/>


 </form>
     
</div>

<?php } ?>
</body>
</html>
