<?php
include("../fixa/bd.php");
require_once '../fixa/site/classes/cripto.php';
?>

<?php
$cripto = new cripto();
//parametros
$id_usuario = $_GET['id']; 
?>
<body onload="consultaFilaChamados('<?php echo $id_usuario?>');">
    <label class="textoParagrafo">Protocolo Solicitação:</label>
        <input class="inputsTextTabelas" type="text" id="n_solicitacao"></input>
        <a href="#" class="estiloLupa" id="consultaFilaChamados"><i class="fa fa-search"></a></i>
   <br/>
   <div id="wrapper">
    <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th><span>Data</span></th>
            <th><span>Operador</span></th>
            <th><span>CPF</span></th>  
            <th><span>Protocolo Solic.</span></th>
            <th><span>Nº GS.</span></th>
            <th><span>Canal Entrada</span></th>
            <th><span>Status</span></th>
            <th><span>Obs</span></th>
            <th><span>Qtde Acessos</span></th>
            <th><span>Revisao</span></th>
            <th><span>Situacao</span></th>
            <th><span>Chamado</span></th>
            <th><span>Ação</span></th>
          </tr>
        </thead>
        <tbody id="rowSolicitacoes">
        </tbody>
    </table>
   </div> 
</body>
