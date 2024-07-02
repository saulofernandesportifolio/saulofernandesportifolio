  <?php
  

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 15){
    
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




if(empty($_POST['tipofiltro']) ){

echo "
       <script type=\"text/javascript\">
        alert('Selecione uma opção !');
        document.location.replace('principal.php?&t=forms/formfiltro_diretoria_pendente.php');
      </script>
 ";
  exit(); 

    


}



if($_POST['tipofiltro'] == 1){

  echo "
       <script>
        document.location.replace('principal.php?&t=forms/formconsulta_cotacoes_diretoria2atvpendente.php');
      </script>
 ";

    


}elseif($_POST['tipofiltro'] == 2){

  echo "
       <script>
        document.location.replace('principal.php?&t=forms/formconsulta_cotacoes_diretoria2pendente.php');
      </script>
 ";

    


}elseif($_POST['tipofiltro'] == 3){

  echo "
       <script>
        document.location.replace('principal.php?&t=forms/formconsulta_cotacoes_diretoria2docpendente.php');
      </script>
 ";



}
















?>