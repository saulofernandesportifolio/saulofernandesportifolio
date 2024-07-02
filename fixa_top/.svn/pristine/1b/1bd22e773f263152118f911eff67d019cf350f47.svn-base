
<?php
//parametros
$id_usuario = $_GET['id']; 
?>
<body>
   <label class="textoParagrafo">Siscom:</label>
        <input class="inputsTextTabelas" type="text" id="nSolicitacaoRedistribuicao"></input>
        <a href="#" class="estiloLupa" id="consultaSolicitacoesRedistribuicao"><i class="fa fa-search"></a></i>
   <br/>
   <div id="wrapper">
    <table id="keywords" class="sortable" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th><span>Siscom</span></th>
            <th><span>Tramitação</span></th>
            <th><span>Aprovação</span></th>
            <th><span>Operador</span></th>
            <th><span>Revisão</span></th>
          </tr>
        </thead>
        <tbody id="rowSolicitacoes"></tbody>
    </table>
   </div>
   <br/>
   <label class="textoParagrafo">Enviar para fase:</label>
        <select name="faseRedistribuicao" id="faseRedistribuicao" class="selectsTabelas bradius">
        </select>
    <label class="textoParagrafo">Escolha o operador:</label>
        <select name="operadorRedistribuir" id="operadorRedistribuir" class="selectsTabelas bradius">
        </select>
        <br/>
        <br/>
    <input name="bt_enviar" onclick="enviarSolicitacao(this, '<?php echo  $id_usuario?>', 'red', '');" id="bto_enviar" type="button" value="Salvar" class="sb2 bradius" />
   <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onClick="history.back();"/>
</body>
<input type="hidden" id="id_usuario" value="<?php echo $id_usuario?>"></input>
<input type="hidden" id="tipo_redistribuicao" value="tramitacao"></input>
