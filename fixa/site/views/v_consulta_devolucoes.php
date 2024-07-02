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
<label>Area:</label>
<select name="areaConsulta" id="areaConsulta" class="selectsTabelas bradius">
    <option></option>  
    <option value="POSICIONAMENTO">POSICIONAMENTO</option>
    <option value="Comercial">COMERCIAL</option>
    <option value="MKT">MKT</option>
    <option value="Sistemas">SISTEMAS</option>
    <option value="AG. TELEFONICA">AG. TELEFÔNICA</option>
  </select>
  <a href="#" class="estiloLupa" id="consultaDevolucoes"><i class="fa fa-search"></a></i>
  <br/>
 <div id="wrapper">
  <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th><span>Data</span></th>
          <th><span>Operador</span></th>
          <th><span>Nº Solic.</span></th>
          <th><span>Revisão</span></th>
          <th><span>Fase</span></th>
          <th><span>Status</span></th>
          <th><span>Area</span></th>
          <th><span>Motivo</span></th>
          <th><span>Motivo Desc.</span></th>
          <th><span>Situação</span></th>
        </tr>
      </thead>
      <tbody id="rowDevolucoes">
      </tbody>
  </table>
 </div> 
</body>
