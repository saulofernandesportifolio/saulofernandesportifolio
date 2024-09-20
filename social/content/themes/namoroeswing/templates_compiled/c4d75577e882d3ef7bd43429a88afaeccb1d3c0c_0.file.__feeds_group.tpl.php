<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:27
  from '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_group.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4574b31f577_63728221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4d75577e882d3ef7bd43429a88afaeccb1d3c0c' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_group.tpl',
      1 => 1725499297,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 2,
  ),
),false)) {
function content_66e4574b31f577_63728221 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_tpl']->value == "box") {?>
  <li class="col-md-6 col-lg-3">
    <div class="ui-box <?php if ($_smarty_tpl->tpl_vars['_darker']->value) {?>darker<?php }?>">
      <div class="img">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <img alt="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_picture'];?>
" />
            </a>         
          <?php } else { ?>        
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
              <img alt="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_picture'];?>
" />
            </a>
          <?php }?>
      </div>
      <div class="mt10">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
            <a class="h6" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
</a>
            <div><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_members'];?>
 <?php echo __("Members");?>
</div>          
          <?php } else { ?>
            <a class="h6" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
</a>
            <div><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_members'];?>
 <?php echo __("Members");?>
</div>
          <?php }?>
      </div>
      <div class="mt10">
        <?php if ($_smarty_tpl->tpl_vars['_group']->value['i_joined'] == "approved") {?>
          <button type="button" class="btn btn-sm btn-success <?php if (!$_smarty_tpl->tpl_vars['_no_action']->value) {?>btn-delete<?php }?> js_leave-group" data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];?>
">
            <i class="fa fa-check mr5"></i><?php echo __("Joined");?>

          </button>
        <?php } elseif ($_smarty_tpl->tpl_vars['_group']->value['i_joined'] == "pending") {?>
          <button type="button" class="btn btn-sm btn-warning js_leave-group" data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];?>
">
            <i class="fa fa-clock mr5"></i><?php echo __("Pending");?>

          </button>
        <?php } else { ?>
          <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
          <button type="button" class="btn btn-sm btn-success" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
            <i class="fa fa-user-plus mr5"></i><?php echo __("Join");?>

          </button>
            <?php } else { ?>
            <button type="button" class="btn btn-sm btn-success js_join-group" data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
" data-privacy="<?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['_group']->value['group_admin']) {?>public<?php } else {
echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];
}?>">
              <i class="fa fa-user-plus mr5"></i><?php echo __("Join");?>

            </button>
          <?php }?>

        <?php }?>
      </div>
    </div>
  </li>
<?php } elseif ($_smarty_tpl->tpl_vars['_tpl']->value == "list") {?>
  <li class="feeds-item">
    <div class="data-container <?php if ($_smarty_tpl->tpl_vars['_small']->value) {?>small<?php }?>">
      <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
        <a class="data-avatar" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
          <img src="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
">
        </a>
      <?php } else { ?>
        <a class="data-avatar" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
          <img src="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
">
        </a>
      <?php }?>
      <div class="data-content">
        <div class="float-end">
          <?php if ($_smarty_tpl->tpl_vars['_group']->value['i_joined'] == "approved") {?>
            <button type="button" class="btn btn-sm btn-success <?php if (!$_smarty_tpl->tpl_vars['_no_action']->value) {?>btn-delete<?php }?> js_leave-group" data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];?>
">
              <i class="fa fa-check mr5"></i><?php echo __("Joined");?>

            </button>
          <?php } elseif ($_smarty_tpl->tpl_vars['_group']->value['i_joined'] == "pending") {?>
            <button type="button" class="btn btn-sm btn-warning js_leave-group" data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];?>
">
              <i class="fa fa-clock mr5"></i><?php echo __("Pending");?>

            </button>
          <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
              <button type="button" class="btn btn-sm btn-light rounded-pill" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linked_accounts",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, false);
?>
              </button>          
            <?php } else { ?>
              <button type="button" class="btn btn-sm btn-light rounded-pill js_join-group" data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
" data-privacy="<?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['_group']->value['group_admin']) {?>public<?php } else {
echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];
}?>">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linked_accounts",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?>
              </button>
            <?php }?>  
          <?php }?>
        </div>
        <div>
          <span class="name">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
</a>     
            <?php } else { ?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
</a>
            <?php }?>
          </span>
          <div><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_members'];?>
 <?php echo __("Members");?>
</div>
        </div>
      </div>
    </div>
  </li>
<?php }
}
}
