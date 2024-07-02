<div class="divformcarrega">
<?php

?>

<div id="resolucao">
	<div id="filtro" class="form bradius">
    <form action="principal.php?t=controles/sql_valida_tipo_atualizacao.php" method="POST">
        <h3 align="center" style="background: #735D25"><font color="#FFFFFF">SELECIONE O FILTRO</font></h3><br />
        <div class="acomodar">
        <p>Canal:
          <select name="canal" id="canal">
          <option value="0" selected="selected">Todos</option>
          <option value="VPG">VPG</option>
          <!--<option value="VPE">VPE</option>
          <option value="GOV">GOV</option>
          <option value="Petro">PETROBRAS</option>--!>
          </select></p>
      <br/>
          <input name="usuario" type="hidden" id="usuario" value="<?php echo "$usuario" ?>" />
            <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="       OK       "  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php'" />

            </form>
        <!--principal-->
        </div>

        
               
    </div>
</div>






</body>
</html>