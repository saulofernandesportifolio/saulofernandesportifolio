<div class="divformcarrega">
<?php


?>

 <div id="resolucao">
 <div id="filtro" class="form bradius">


  <form name="form1" method="post" action="principal.php?t=controles\tratamento_linhas.php">

   <h3 align="center" style="background: #A0873C"><font color="#FFFFFF">ATUALIZAR BASE</font></h3>
        
      <h3 align="center" style="background: #A0873C"><font color="#FFFFFF">SELECIONE O FILTRO</font></h3>
     <div class="acomodar"> 
        <p>Canal:
        <select name="canal" id="canal">
          <option value="%" selected="selected">Todos</option>
          <option value="VPG">VPG</option>
          <option value="VPE">VPE</option>
          <option value="GOV">GOV</option>
           <option value="PETRO">PETROBRAS</option>
        </select>
        </p>
        
         <p>
         <input name="usuario" type="hidden" id="usuario" value="<?php echo "$usuario" ?>" />
          <input type="submit" class="sb2 bradius" name="Submit" value="       OK       " />
          <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php'" />
        </p>

      </form>

   </div>

  </div>
  
</div>

</div>
</body>
</html>