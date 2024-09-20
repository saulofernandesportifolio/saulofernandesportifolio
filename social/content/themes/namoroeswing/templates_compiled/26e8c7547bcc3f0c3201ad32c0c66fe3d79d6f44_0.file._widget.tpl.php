<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:27
  from '/var/www/html/social/content/themes/namoroeswing/templates/_widget.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4574b2ece61_34863555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26e8c7547bcc3f0c3201ad32c0c66fe3d79d6f44' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/_widget.tpl',
      1 => 1725499302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66e4574b2ece61_34863555 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['widgets']->value) {?>
  <!-- Widgets -->
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['widgets']->value, 'widget');
$_smarty_tpl->tpl_vars['widget']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['widget']->value) {
$_smarty_tpl->tpl_vars['widget']->do_else = false;
?>
    <div class="card">
      <div class="card-header">
        <strong><?php ob_start();
echo $_smarty_tpl->tpl_vars['widget']->value['title'];
$_prefixVariable2 = ob_get_clean();
echo __($_prefixVariable2);?>
</strong>
      </div>
      <div class="card-body"><?php echo $_smarty_tpl->tpl_vars['widget']->value['code'];?>
</div>
    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <!-- Widgets -->
<?php }
}
}
