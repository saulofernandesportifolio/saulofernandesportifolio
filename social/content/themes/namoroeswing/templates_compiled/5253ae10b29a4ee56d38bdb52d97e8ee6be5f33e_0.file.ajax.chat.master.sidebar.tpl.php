<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:30
  from '/var/www/html/social/content/themes/namoroeswing/templates/ajax.chat.master.sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4574e2cebd1_89602555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5253ae10b29a4ee56d38bdb52d97e8ee6be5f33e' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/ajax.chat.master.sidebar.tpl',
      1 => 1725499299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66e4574e2cebd1_89602555 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sidebar_friends']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
  <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
    <div class="chat-avatar-wrapper clickable" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
  <?php } else { ?>        
    <div class="chat-avatar-wrapper clickable js_chat-start" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
" data-name="<?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];
}?>" data-link="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
" data-picture="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_picture'];?>
" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {?> <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
 <?php }?>">
  <?php }?>
    <div class="chat-avatar">
      <img src="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_picture'];?>
" alt="" />
      <i class="online-status fa fa-circle <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_is_online']) {?>online<?php } else { ?>offline<?php }?>"></i>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_status_enabled'] && !$_smarty_tpl->tpl_vars['_user']->value['user_is_online']) {?>
      <div class="last-seen">
        <span class='js_moment' data-time='<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_last_seen'];?>
'><?php echo $_smarty_tpl->tpl_vars['_user']->value['user_last_seen'];?>
</span>
      </div>
    <?php } else { ?>
      <div class="pb10"></div>
    <?php }?>
  </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
