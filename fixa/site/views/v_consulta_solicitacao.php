<?php
include("../fixa/bd.php");
require_once '../fixa/site/classes/cripto.php';
?>

<?php
$cripto = new cripto();
//parametros
$id_usuario = $_GET['id']; 
$id_usuario = $cripto->decodificar($id_usuario);
?>
<body>
      <label class="textoParagrafo">Protocolo Solicitação:</label>
        <input class="inputsTextTabelas" type="text" id="n_solicitacao"></input>
        <label class="textoParagrafo">Nº gs:</label>
        <input class="inputsTextTabelas" type="text" id="n_gs_consulta_solicitacao"></input>
        <a href="#" class="estiloLupa" id="estiloLupaConsultaSolicitacoes"><i class="fa fa-search"></a></i>
   <br/>
   <div id="wrapper">    
    <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th><span>Data</span></th>
            <th><span>Operador</span></th>
            <th><span>CPF</span></th>  
            <th><span>Nº Solic.</span></th>
            <th><span>Nº GS.</span></th>
            <th><span>Fase</span></th>
            <th><span>Status</span></th>
            <th><span>Cnpj</span></th>
            <th><span>Razão Social</span></th>
            <th><span>Qtde Acessos</span></th>
            <th><span>Revisão</span></th>
          </tr>
        </thead>
        <tbody id="rowSolicitacoes">
        </tbody>
    </table>
   </div> 
</body>

