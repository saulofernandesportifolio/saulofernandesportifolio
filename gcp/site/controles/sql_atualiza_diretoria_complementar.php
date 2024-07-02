<?php

include("../../bd.php");

 
    
if(empty($_POST['altas']) 
  && empty($_POST['portabilidade']) && empty($_POST['migracao']) 
  && empty($_POST['trocas']) && empty($_POST['tt']) && empty($_POST['backup']) 
  && empty($_POST['m2m']) && empty($_POST['fixa']) && empty($_POST['pre_pos']) 
  && empty($_POST['migracao_troca'])){
    
    
echo "
       <script type=\"text/javascript\">
        alert('Por gentileza preencher os campos!');
        history.back();
      </script>
 ";
  exit(); 
    
    
    
} 



  $total_linhas  = $_POST['total_linhas']; 
  $qtdlinhascomp = $_POST['qtdlinhascomp'];
  $ddd           = $_POST['ddd'];
  $altas         = $_POST['altas'];
  $portabilidade = $_POST['portabilidade'];
  $migracao      = $_POST['migracao'];
  $trocas        = $_POST['trocas'];
  $tt            = $_POST['tt'];
  $backup        = $_POST['backup'];
  $m2m           = $_POST['m_2_m'];
  $fixa          = $_POST['fixa'];
  $pre_pos       = $_POST['pre_pos'];
  $migracao_troca= $_POST['migracao_troca'];
  $id_cotacao_filha= $_POST['id_cotacao_filha'];
  $cotacaopri=$_POST['cotacaopri'];
  $idpri=$_POST['idpri'];      
  




$sqlpp="UPDATE cip_nv.base_diretoria_complementar a 
                     SET a.total_linhas          = '$total_linhas',  
                         a.qtd_linhas_negociacao = '$qtdlinhascomp',
                         a.ddd                   = '$ddd',  
                         a.altas                 = '$altas',
                         a.portabilidade         = '$portabilidade',
                         a.migracao              = '$migracao',
                         a.trocas                = '$trocas',
                         a.tt                    = '$tt',
                         a.`backup`              = '$backup',
                         a.m2m                   = '$m2m',
                         a.fixa                  = '$fixa',
                         a.pre_pos               = '$pre_pos',
                         a.migracao_troca        = '$migracao_troca' 
                    WHERE a.id_cotacao_filha='$id_cotacao_filha' ";
$acaopp = mysql_query($sqlpp,$conecta) or die (mysql_error());


    
echo "
       <script type=\"text/javascript\">
        alert('Atualizada com sucesso !');
        document.location.replace('../forms/formvisualizarcomplementares_diretoria.php?&cotacaopri={$cotacaopri}&idpri={$idpri}');
      </script>
 ";
  exit(); 
    
    






?>