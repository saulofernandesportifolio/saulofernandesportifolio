<?php
include "../funcoes.php";
//Autor: Lauro Pereira
//Grupo Empreza
?>

<!--  Forma o cabeçalho da tabela  -->
<h2>M&oacute;dulo de consulta - Chamados concluidos</h2>
<table border="1" >
  <tr style="border-bottom: none;">
    <td colspan="9">&aacute;rea de pesquisa:</td>
  </tr>
  <tr>
  <form method="GET" action="menu_1.php" target="_self">
    <input type="hidden" name="ide" value="<?php echo $_GET['ide']; ?>" />
    <input type="hidden" name="m" value="<?php echo $_GET['m']; ?>" />
    <td align="center">
        <input value="<?php echo isset($_GET['n_chamado'])?$_GET['n_chamado']:""; ?>" type="text" id="pesquisa_num" name="n_chamado" style="width: 60px;"/>
    </td>
    <td align="center">
        <input value="<?php echo isset($_GET['solicitacao'])?$_GET['solicitacao']:""; ?>" type="text" id="pesquisa_sol" name="solicitacao" style="width: 100px;"/>
    </td>
    <td align="center">
        <input value="<?php echo isset($_GET['tipo'])?$_GET['tipo']:""; ?>" type="text" id="pesquisa_tipo" name="tipo" style="width: 100px;"/>
    </td>
    <td align="center">
        <input value="<?php echo isset($_GET['sistema'])?$_GET['sistema']:""; ?>" type="text" id="pesquisa_sis" name="sistema" style="width: 50px;"/>
    </td>
    <td align="center">
        <input value="<?php echo isset($_GET['login'])?$_GET['login']:""; ?>" type="text" id="pesquisa_log" name="login" style="width: 100px;"/>
    </td>
    <td align="center">
        <input value="<?php echo isset($_GET['dt_solic'])?$_GET['dt_solic']:""; ?>" type="text" id="pesquisa_dt_i" name="dt_solic" style="width: 70px;"/>
    </td>
    <td align="center">
        <input value="<?php echo isset($_GET['l_input'])?$_GET['l_input']:""; ?>" type="text" id="pesquisa_l_in" name="l_input" style="width: 50px;"/>
    </td>
    <td align="center">
        <input value="<?php echo isset($_GET['dt_conclusao'])?$_GET['dt_conclusao']:""; ?>" type="text" id="pesquisa_dt_f" name="dt_conclusao" style="width: 70px;"/>
    </td>
    <td><input type="submit" value="pesquisar" /></td>
    </form>
  </tr>
  <tr>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="10%">N&ordm;</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="13%">solicita&ccedil;&atilde;o</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="17%">Servi&ccedil;o</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="7%" >Sistema</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%">Usu&aacute;rio</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%">Input</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%">Solicitado por:</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="18%">Data de conclus&atilde;o</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="5%" >ABRIR</td>
  </tr>
</div>
<div id="responseTable"><?php include "sql_concluidos.php"; ?></div>