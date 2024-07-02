
<?php
//parametros
$id_usuario = $_GET['id']; 

?>
<body onload="buscaSolicitacoesDistribuicaoByFase('<?php echo  $id_usuario?>');">
<label>Fase:</label>
<select name="areaConsultaFaseItens" id="areaConsultaFaseItens" class="selectsTabelas bradius">
    <option value="tramitacao">Tramitação</option>
    <option value="aprovacao">Aprovação</option>
</select>
<label>Siscom:</label>
<input type="text" name="siscom_solicitacao_distribuir" id="siscom_solicitacao_distribuir" style="WIDTH: 15%;"/>
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
    <input id="excluirSolicitacoesSiscom" name="excluir" type="button" value="Excluir Solicitações" class="sb2 bradius" onClick="excluirSolicitacoesSiscom('<?php echo  $id_usuario?>');" style="width: 10%;"/>
 </div> 
</body>
