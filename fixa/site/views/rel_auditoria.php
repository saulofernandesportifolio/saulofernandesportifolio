
<div id="margem_temp" style="margin-top: 60px;"></div>
<label class="textoParagrafo">Selecione o mês:</label>
<select 
    name="mesRelatorioAuditoria" 
    id="mesRelatorioAuditoria"  
    class="txt2comboboxpadrao bradius"
    required
    style="width: 40px;"
    >
    <option value="01">1</option>
    <option value="02">2</option>
    <option value="03">3</option>
    <option value="04">4</option>
    <option value="05">5</option>
    <option value="06">6</option>
    <option value="07">7</option>
    <option value="08">8</option>
    <option value="09">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
</select>
<a href="#" class="estiloLupa" onClick="carregaRelatorioAuditoria()"><i class="fa fa-search"></a></i>
<img id="loader" src="../fixa/images/loading.gif"/>

<div id="tabela_evolucao_auditoria">
  
</div>
 <div class="chart_auditoria_principal">
    <h1 id="titulo_evolucao_auditoria" style="display: none">Evolução Auditoria</p></h1>        
    <div id="placeholder" style="width:100%;height:100%;"></div>
     <h1 id="titulo_evolucao_auditoria" style="display: none">Auditoria VPE-Voz</p></h1>         
</div>
<div id="tabela_evolucao_auditoria_status">
</div>
<div class="chart_auditoria_aprovados">
    <h1 id="titulo_evolucao_auditoria_status" style="display: none"></p></h1>        
    <div id="placeholderstatus"></div>      
</div>