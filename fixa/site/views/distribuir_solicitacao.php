<?php
include("../fixa/bd.php");
require_once '../fixa/site/classes/cripto.php';
?>

<?php
$cripto = new cripto();
//parametros
$id_usuario = $_GET['id']; 

?>
<body onload="buscaSolicitacoesDistribuicaoByFase('<?php echo  $id_usuario?>');">
<label>Fase:</label>
<select name="areaConsultaFaseItens" id="areaConsultaFaseItens" class="selectsTabelas bradius">
    <option value="pretramitacao">Pré-Tramitação</option>
    <option value="tramitacao">Tramitação</option>
    <?php if($projeto != "Voz"){?>
    <option value="pos_tramitacao">Pós-Tramitação</option>
    <?php }?>
  </select>
  <a href="#" class="estiloLupa" id="areaConsultaFaseItensPesquisar" onClick="buscaSolicitacoesDistribuicaoByFase('<?php echo  $id_usuario?>');"><i class="fa fa-search"></a></i>
  <br/>
 <div id="wrapper">
  <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
      <thead>
        <tr></tr>
      </thead>
      <tbody id="areaConsultaFaseItensDados">
      </tbody>
  </table>
  <div class="div_forms">
      <label class="textoParagrafo">Escolha o operador:</label>
      <select name="operadorDistribuir" id="operadorDistribuir" class="txt2comboboxpadraoOld bradius" required>
      </select>
    </div>
    <br/>
    <input name="bt_enviar" onclick="enviarSolicitacao(this, '<?php echo  $id_usuario?>', 'dist', '');" id="bto_enviar" type="button" value="Salvar" class="sb2 bradius" />
    <input type="button" id="bto_limpar" value="Limpar" class="sb2 bradius"/>
    <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onClick="history.back();"/>
 </div> 
</body>
