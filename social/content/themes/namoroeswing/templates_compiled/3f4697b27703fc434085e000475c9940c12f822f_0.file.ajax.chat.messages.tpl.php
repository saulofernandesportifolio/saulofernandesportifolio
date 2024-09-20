<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:20:54
  from '/var/www/html/social/content/themes/namoroeswing/templates/ajax.chat.messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e458569c7662_63462004',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f4697b27703fc434085e000475c9940c12f822f' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/ajax.chat.messages.tpl',
      1 => 1725499293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_message.tpl' => 1,
  ),
),false)) {
function content_66e458569c7662_63462004 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'message');
$_smarty_tpl->tpl_vars['message']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->do_else = false;
?>
  <?php $_smarty_tpl->_subTemplateRender('file:__feeds_message.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
