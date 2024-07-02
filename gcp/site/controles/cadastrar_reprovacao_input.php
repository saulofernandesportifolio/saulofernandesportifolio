
<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");
  $calcula_data = date("d/m/Y");	
  $dt_dia = date("Y-m-d");


function tiraaspasimples($valor){
  $result = addslashes($valor);
  $virgula = "\'";
  $result2 = str_replace($virgula, ".", $result);
  return $result2;

  //echo $result;

}




if(empty($_POST['motivo_reprocacao']) || empty($_POST['obs_mt_reprovacao']) || empty($_POST['tipo2erro']) || empty($_POST['tipo_apuradoerro']))
{
    
echo " <script> 
      alert('Por favor preencher o formulario com todos os dados !');
      history.back();
      </script>
      "; 
      exit();   
    
}


if($_POST['motivo_reprocacao'] == 1){
   
   $_POST['motivo_reprocacao']='Reprovação'; 

  }elseif($_POST['motivo_reprocacao'] == 2){
   
   $_POST['motivo_reprocacao']='Parcial'; 

  }elseif($_POST['motivo_reprocacao'] == 3){
   
   $_POST['motivo_reprocacao']='Recorrente'; 
  }


$obs_mt_reprovacao=tiraaspasimples($_POST['obs_mt_reprovacao']);


$query="UPDATE cip_nv.tbl_input  
        SET motivo_da_reprovacao= '{$_POST['motivo_reprocacao']}',
            tipo2erro=  '{$_POST['tipo2erro']}',
            tipo_apuradoerro= '{$_POST['tipo_apuradoerro']}',        
            obs_motivo_reprovacao= '$obs_mt_reprovacao'
        WHERE id_input='{$_POST['id_input']}' ";
(!mysql_query($query,$conecta)); 
 
	 echo "
		<script type=\"text/javascript\">
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_input.php');
		</script>
 		";
exit();
		
?>