<div id="div_form_relatorios" class="bradius wrapper">
  <fieldset id="fieldset_style">
    <form 
      action="principal.php?t=Controller/SolicitacaoRelatoriosController.php" 
      method="POST"
    >

    <label>Selecione o Relatório:</label>
     <br/>
    <select name="relatorioBi" id="relatorioBi" class="bradius">
        <!--<option value="consolidado_tramitacao">Tramitação - Realizado/Pendentes</option>
        <option value="consolidado_aprovacao">Aprovação - Realizado/Pendentes</option>
        <option value="tramitacao">Tramitação - Geral</option>
        <option value="aprovacao">Aprovação - Geral</option>-->
        <option value="consolidado_geral">Consolidado</option>
      </select>
       <br/>
      <label>Data Início:</label>
      <input 
          type="text"
          id="data_inicio"
          name="data_inicio" 
          class="campoData"
          onblur = "validaData(this)";
          required
          style="width: 50%;"
        >
        <br/>
         <label>Data Fim:</label>
      <input 
          type="text"
          id="data_fim"
          name="data_fim" 
          class="campoData"
          onblur = "validaData(this)";
          required
          style="width: 50%;margin-left: 2%;"
        >
        <br/>
        <input name="bt_enviar_form" id="bt_enviar_form" type="submit" value="Fazer download" class="sb2 bradius" />
        <P>As datas acima se referem a Data do Siscom</P>
    </form>
  </fieldset>