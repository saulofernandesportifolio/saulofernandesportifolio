<div id="div_form_relatorios" class="bradius wrapper">
  <fieldset id="fieldset_style">
    <form 
      action="principal.php?t=controles/sql_form_relatorios.php" 
      method="POST"
    >

    <label>Selecione o Relatório:</label>
     <br/>
    <select name="relatorioBi" id="relatorioBi" class="bradius">
        <option value="pretramitacao">Pré-Tramitação</option>
        <option value="tramitacao">Tramitação</option>
        <option value="postramitacao">Pós-Tramitação</option>
        <option value="intragov">Intragov</option>
        <option value="gcon">Gcon</option>
        <option value="historico_pos">Histórico Pós</option>
      </select>
       <br/>
      <label>Data Início:</label>
      <input 
          type="text"
          id="data_inicio"
          name="data_inicio" 
          class="campoData"
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
          required
          style="width: 50%;margin-left: 2%;"
        >
        <br/>
        <input name="bt_enviar_form" id="bt_enviar_form" type="submit" value="Fazer download" class="sb2 bradius" />
    </form>
  </fieldset>
  <p>*Obs:As datas filtradas se referem a <b>data de cadastro</b> do formulário, a excessão é o relatório de <b>Tramitação</b> que considerará para fins de filtro a <b>data de abertura do gestão(afim de considerar os itens que estão na fila dos operadores).</b></p>
</div>