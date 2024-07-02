<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
      $(document).ready(function(){        
         $("select[name=erro]").change(function(){
            $("select[name=disc_erro]").html('<option value="0">Carregando...</option>');
            $.post("desc_erro.php", 
                  {erro:$(this).val()},
                  function(valor){
                     $("select[name=desc_erro]").html(valor);
				  }
                  )
         })
         $("select[name=erro]").change(function(){
            $("select[name=disc_oferta]").html('<option value="0">Carregando...</option>');
            $.post("desc_oferta.php", 
                  {erro:$(this).val()},
                  function(valor){
                     $("select[name=desc_oferta]").html(valor);				  }
                  )
         })
         $( "#data_aud").datepicker({
            showOn: "button",
            buttonImage: "calendario.png",
            buttonImageOnly: true
        });
      })
      function valida(element, tipo){
        switch (tipo)
        {
            case 'dateTime':
                regex = /^(((0?[1-9]|[1-2][0-9]|3[0-1])\/(0?[1,3,5,7,8]|1[0,2]))|((0?[1-9]|[1-2][0-9]|30)\/(0?[4,6,9]|11))|((0?[1-9]|[1][0-9]|2[0-8])\/0?(2)))\/(20[0-1][0-9])  ?(([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9]))$/;
                break;
            
            case 'pedido':
                 regex = /^1-[0-9]{10,13}$/
             break;
            
            case 'date':
                regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9]$/;
                break;
             case 'text':
                regex = /^(.|\s)+$/;
                break;
            case 'indexQ':
                regex = /^(0|([0]{0,2}[1-9])|([0]{0,1}[1-9][0-9])|(100))$/;
                break;
            case 'senha':
                regex = /^([@#$&?!-. A-Za-z0-9])$/;
                break;
            case 'login':
                regex = /^[ .-A-Za-z0-9]+$/;
                break;
                
        }
 
        resultado = regex.exec(element.value);
        
        if(!resultado) {
            element.style.backgroundColor = "#FFAA99";
            document.getElementById("bt_enviar").disabled = 1;
        }
        else {
            element.style.backgroundColor = "#FFF";
            document.getElementById("bt_enviar").disabled = 0;
        }
     }
     function verificaCorrecao(elemento){
        if(elemento.value == 'Sim' || elemento.value =='Não') {
            document.getElementById("area_correcao").disabled = 0;
            document.getElementById("acao_correcao").disabled = 0;
            document.getElementById("input_status_correcao").disabled = 0;
        }
        /*else if(elemento.value =='Não') {
            document.getElementById("area_correcao").disabled = 1;
            document.getElementById("acao_correcao").disabled = 1;
            document.getElementById("input_status_correcao").disabled = 1;
        }*/
     }
     

</script>


<script>

  /* function valida()
               {

	              tam = document.frmTeste.pedido.value

	              if(tam.length  < 12){
                  document.frmTeste.pedido.focus();
                  document.frmTeste.pedido.style.backgroundColor = "#FFAA99"; 
                 }else{
                   document.frmTeste.pedido.style.backgroundColor = "#FFFFFF"; 
                 }

              };*/

</script>

</head>
<body id="logar">

<?php
	if($_SESSION["tsa"] == 0){    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
	
	include("../../tp/conexao.php");

$sql_user="SELECT * FROM usuarios WHERE login = '$login'";
$acao_op=mysql_query($sql_user,$conecta);
while($dado= mysql_fetch_array($acao_op)){					    
    $login = $dado["login"];
}
//echo $login;

;
?>
  
<div id="principal">

    <div id="menu">
   <?php 
    include("../menu.php") ?>
    </div>
    <div id="caixa" style="height:460px;">
        <div id="conteudo">
            <p id="p_padrao">TSA - <?php echo $_SESSION["nome"]; ?>.</p>
            <form name="frmTeste" action="tsa_valida_cadastro.php" method="post">
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                        <td id="t_td">Número da monitoria</td>
                        <td colspan="3">
                            <span id="n_monitoria">
                                <input name="n_monitoria" type="text"  class="textbox_padrao" maxlength="20" />
                            </span>
                        </td>
                	</tr>
                    <tr>
                        <td><br /></td>
                        <td><br /></td>
                    </tr>
                    <tr>
                        <td id="t_td">Ação</td>
                        <td>
                            <select name="acao" class="combobox_padrao" id="acao">
                                <option value="0">Selecione...</option>
                                <?php
                        		 include '../conexao.php';
                                 $sql = "SELECT opcao FROM tp.tsa_menu WHERE indice = 'Ação';";
                                 $qr = mysql_query($sql) or die(mysql_error());
                                 while($ln = mysql_fetch_assoc($qr)){
                                 echo '<option value="'.$ln['opcao'].'">'.$ln['opcao'].'</option>';
                                 }
                             	 ?>
                            </select>
                        </td>
                        <td id="t_td">DataHora - Auditoria</td>
                        <td>
                            <span id="dt_auditoria">
                                <input id="data_aud" onblur="valida(this, 'dateTime');" name="dt_auditoria" type="text"  class="textbox_padrao" maxlength="20" />
                            </span>
                        </td>
                	</tr>
                    <tr>
                        <td id="t_td">Pedido</td>
                        <td> <span id="pedido">
                      		    <input onblur="valida(this,'pedido');" name="pedido" type="text" class="textbox_padrao"  maxlength="20" /><br />
                             </span>
                        </td>
                        <td id="t_td">Quantidade de revisões</td>
                        <td>
                            <span id="q_revisoes">
                       		   <input name="q_revisoes" type="text"  class="textbox_padrao" maxlength="20" />
                            </span>                            
                        </td>
                    </tr>
                    <tr>
                    	<td id="t_td">Indice de qualidade</td>	
                    	<td>
                            <span id="i_qualidade">
                    		  <input onblur="valida(this, 'indexQ');" name="i_qualidade" type="text"  class="textbox_padrao" maxlength="20" /><br />
                            </span>
                    	</td>
                         <td id="t_td">Operação</td>	
                    	<td>
                            <span id="operacao">
                    		  <input name="operacao" type="text"  class="textbox_padrao" maxlength="50" />
                            <span class="textfieldMinCharsMsg">Indice inválido.</span><span class="textfieldMaxCharsMsg">Indice inválido.</span></span>
                    	</td>
                    </tr>
                    <tr>
                        <td id="t_td" >Parecer Auditoria</td>
                        <td colspan="3"	>
                                <textarea onblur="valida(this, 'text');" name="parecer" id="parecer" cols="56" rows="3"></textarea>
                        </td>
                	</tr>
                    <tr>
                        <td id="t_td">Erro</td>
                        <td colspan="3">
                            <span id="spryselect1">                  
                            <select name="erro" class="combobox_padrao_grande" id="erro" >
                                <option value="0">Selecione...</option>
                                <?php
                        		 include '../conexao.php';
                                 $sql = "SELECT indice FROM tp.tsa_menu WHERE classe = 'erro' GROUP BY indice;";
                                 $qr = mysql_query($sql) or die(mysql_error());
                                 while($ln = mysql_fetch_assoc($qr)){
                                 echo '<option value="'.$ln['indice'].'">'.$ln['indice'].'</option>';
                                 }
                             	 ?>
                            </select>
                            <span class="selectInvalidMsg">Selecione um tipo válido.</span></span>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">Descrição do erro</td>
                        <td colspan="3">
                            <span id="desc_erro"> 
                            <select name="desc_erro" class="combobox_padrao_grande">
                                <option value="0">Selecione...</option>
                                                                                         
                            <span class="selectInvalidMsg">Selecione um tipo válido.</span></span>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">Descrição da oferta</td>
                        <td colspan="3">
                            <select name="desc_oferta" class="combobox_padrao_grande">
                                <option value="0">Selecione...</option>                                                    
                        </td>
                    </tr>
               		<tr>
                        <td id="t_td">Análise BKO</td>
                        <td colspan="3">
                            <span id="spryselect1">
                            <select name="analise_bko" class="combobox_padrao" id="analise_bko">
                                <option value="0">Selecione...</option>
                                <?php
                        		 include '../conexao.php';
                                 $sql = "SELECT opcao FROM tp.tsa_menu WHERE indice = 'Análise BKO';";
                                 $qr = mysql_query($sql) or die(mysql_error());
                                 while($ln = mysql_fetch_assoc($qr)){
                                 echo '<option value="'.$ln['opcao'].'">'.$ln['opcao'].'</option>';
                                 }
                             	 ?>
                            </select>
                            <span class="selectInvalidMsg">Selecione um tipo válido.</span></span>
                        </td>
                       
                	</tr>
                    <tr> 
                    <td id="t_td">Turno:</td>
                         <td id="t_td"><select name='turno_cadastro' class='combobox_padrao' >
                            <option value='0'>Selecione...</option>
                            <option value='dia'>Dia</option>
                            <option value='intermediario'>Intermediário</option>
                            <option value='noite'>Noite</option>
                            </select>
                  </td></tr>
                    
                    <tr>
                        <td id="t_td" >Manifestação BKO</td>
                        <td colspan="3"	>
                              <textarea onblur="valida(this, 'text');" name="manifestacao" id="manifestacao" cols="56" rows="3"></textarea>
                        </td>
                	</tr>
                    <tr>
                        <td id="t_td">Ofensor</td>
						<td  colspan="3"><span id="spryselect3">
                            <select name="ofensor" class="combobox_padrao_grande" >
                              <option value="0">Selecione...</option>
                                <?php
                        		 include '../conexao.php';
                                 $sql = "SELECT nome FROM tp.funcionarios_emp GROUP BY nome ORDER BY nome";
                                 $qr = mysql_query($sql) or die(mysql_error());
                                 while($ln = mysql_fetch_assoc($qr)){
                                 echo '<option value="'.$ln['nome'].'">'.$ln['nome'].'</option>';
                                 }
                             	 ?>
                            </select>
                            <span class="selectInvalidMsg">Selecione um ofensor válido.</span></span>
                    	</td>
                	</tr>  
                    <tr>
                        <td id="t_td">Necessário correção</td>
						<td><span id="spryselect3">
                            <select onchange="verificaCorrecao(this);" name="correcao" class="combobox_padrao_medio" >
                              <option value="0">Selecione...</option>
                                <?php
                        		 include '../conexao.php';
                                 $sql = "SELECT opcao FROM tp.tsa_menu WHERE indice = 'Necessário correção';";
                                 $qr = mysql_query($sql) or die(mysql_error());
                                 while($ln = mysql_fetch_assoc($qr)){
                                 echo '<option value="'.$ln['opcao'].'">'.$ln['opcao'].'</option>';
                                 }
                             	 ?>
                            </select>
                            <span class="selectInvalidMsg">Selecione um analista válido.</span></span>
                    	</td>
                     <input type="hidden" name="tp_acao" value="insert" />
                	</tr>
                     <tr align="center" >
                    <td id="t_td">Área da correção</td>
						<td id="t_td"><span id="spryselect3">
                            <select name="area_correcao" class="combobox_padrao_medio" >
                              <option value="0">Selecione...</option>
                                <?php
                        		 include '../conexao.php';
                                 $sql = "SELECT opcao FROM tp.tsa_menu WHERE indice = 'Área correção';";
                                 $qr = mysql_query($sql) or die(mysql_error());
                                 while($ln = mysql_fetch_assoc($qr)){
                                 echo '<option value="'.$ln['opcao'].'">'.$ln['opcao'].'</option>';
                                 }
                             	 ?>
                            </select>
                            <span class="selectInvalidMsg">Selecione um analista válido.</span></span>
                    	</td>
                        </tr> 
                    <tr align="center" >
  	                  <td></td>
                    	<td colspan="1">
                    		<input id="bt_enviar" name="enviar" type="submit" value="Enviar" class="botao_padrao" />
                 		</td>
                        <td>
                    		<input name="limpar" type="reset" value="Limpar" class="botao_padrao" />
                    	</td>
                        <td><?php $login = $_SESSION["login"]; $nome = $_SESSION["nome"];?></td>
                	</tr>
                	</table>
                    
            </form>
        
        </div>
        
    </div>
    
</div>
<script type="text/javascript">
new Spry.Widget.ValidationTextField("n_monitoria", "custom", 
    {minChars:8, maxChars:13, validateOn:["blur", "change"], characterMasking: /[0-9]/, useCharacterMasking:true, isRequired:false});
new Spry.Widget.ValidationTextField("dt_auditoria", "custom", 
    {validateOn:["blur", "change"], characterMasking: /[0-9/ :]/, useCharacterMasking:true, isRequired:false});
new Spry.Widget.ValidationTextField("pedido", "custom", 
    {validateOn:["blur", "change"], characterMasking: /[0-9-]/, useCharacterMasking:true, isRequired:false});
new Spry.Widget.ValidationTextField("q_revisoes", "custom", 
    {minChars:1, maxChars:2,validateOn:["blur", "change"], characterMasking: /[0-9]/, useCharacterMasking:true, isRequired:false});
new Spry.Widget.ValidationTextField("i_qualidade", "custom", 
    {minChars:1, maxChars:3,validateOn:["blur", "change"], characterMasking: /[0-9]/, useCharacterMasking:true, isRequired:false});
new Spry.Widget.ValidationTextField("operacao", "custom", 
    {validateOn:["blur", "change"], characterMasking: /[A-Za-z- ]/, useCharacterMasking:true, isRequired:false});
new Spry.Widget.ValidationTextField("dt_analise", "custom", 
    {validateOn:["blur", "change"], characterMasking: /[0-9/]/, useCharacterMasking:true, isRequired:false});
new Spry.Widget.ValidationTextField("status_correcao", "custom", 
    {validateOn:["blur", "change"], characterMasking: /[A-Za-z ]/, useCharacterMasking:true, isRequired:false});
</script>
</body>
</html>