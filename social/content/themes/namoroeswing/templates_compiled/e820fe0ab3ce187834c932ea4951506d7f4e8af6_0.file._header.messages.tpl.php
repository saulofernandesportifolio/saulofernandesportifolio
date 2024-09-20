<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:26
  from '/var/www/html/social/content/themes/namoroeswing/templates/_header.messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4574ad5be45_08940211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e820fe0ab3ce187834c932ea4951506d7f4e8af6' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/_header.messages.tpl',
      1 => 1725499301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
    'file:__feeds_conversation.tpl' => 1,
  ),
),false)) {
function content_66e4574ad5be45_08940211 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="dropdown js_live-messages">

    <a href="#" data-bs-toggle="dropdown" data-display="static">
    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-messages",'class'=>"header-icon",'width'=>"24px",'height'=>"24px"), 0, false);
?>
    <span class="counter red shadow-sm rounded-pill <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_live_messages_counter'] == 0) {?>x-hidden<?php }?>">
      <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_live_messages_counter'];?>

    </span>
  <div class="dropdown-menu dropdown-menu-end dropdown-widget">
    <div class="dropdown-widget-header">
      <span class="title"><?php echo __("Messages");?>
</span>
      <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
        <a class="float-end text-link" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php echo __("Send a New Message");?>
</a>
        <?php } else { ?>
         <a class="float-end text-link js_chat-new" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages/new"><?php echo __("Send a New Message");?>
</a>
      <?php }?>
    </div>
    <div class="dropdown-widget-body">
      <div class="js_scroller">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['conversations']) {?>
          <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['conversations'], 'conversation');
$_smarty_tpl->tpl_vars['conversation']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['conversation']->value) {
$_smarty_tpl->tpl_vars['conversation']->do_else = false;
?>
              <?php $_smarty_tpl->_subTemplateRender('file:__feeds_conversation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </ul>
        <?php } else { ?>
          <p class="text-center text-muted mt10">
            <?php echo __("No messages");?>

          </p>
        <?php }?>
      </div>
    </div>
      <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
        <a class="dropdown-widget-footer" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php echo __("See All");?>
</a>
        <?php } else { ?>
         <a class="dropdown-widget-footer" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages"><?php echo __("See All");?>
</a>
      <?php }?>
  </div>
</li><?php }
}
