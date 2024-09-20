<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:27
  from '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_event.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4574b34e3d6_08512883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65d80afaa9b3460fef0ee338ec699edb1e42d810' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/__feeds_event.tpl',
      1 => 1725499294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 2,
  ),
),false)) {
function content_66e4574b34e3d6_08512883 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_tpl']->value == "box") {?>
  <li class="col-md-6 col-lg-3">
    <div class="ui-box <?php if ($_smarty_tpl->tpl_vars['_darker']->value) {?>darker<?php }?>">
      <div class="img">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <img alt="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_picture'];?>
" />
            </a>          
          <?php } else { ?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
              <img alt="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_picture'];?>
" />
            </a>
          <?php }?>
      </div>
      <div class="mt10">
        <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
          <a class="h6" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
</a>
          <div><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_interested'];?>
 <?php echo __("Interested");?>
</div>
        <?php } else { ?>
          <a class="h6" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
</a>
          <div><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_interested'];?>
 <?php echo __("Interested");?>
</div>
        <?php }?>
      </div>
      <div class="mt10">
        <?php if ($_smarty_tpl->tpl_vars['_event']->value['i_joined']['is_interested']) {?>
          <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
            <button type="button" class="btn btn-sm btn-light" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <i class="fa fa-check mr5"></i><?php echo __("Interested");?>

            </button>
          <?php } else { ?>
            <button type="button" class="btn btn-sm btn-light js_uninterest-event" data-id="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];?>
">
              <i class="fa fa-check mr5"></i><?php echo __("Interested");?>

            </button>
          <?php }?>
        <?php } else { ?>
          <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
            <button type="button" class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
              <i class="fa fa-star mr5"></i><?php echo __("Interested");?>

            </button> 
          <?php } else { ?>
            <button type="button" class="btn btn-sm btn-primary js_interest-event" data-id="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];?>
">
              <i class="fa fa-star mr5"></i><?php echo __("Interested");?>

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
          <img src="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
">
        </a>
      <?php } else { ?>
        <a class="data-avatar" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
          <img src="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
">
        </a>
      <?php }?>      
      <div class="data-content">
        <div class="float-end">
          <?php if ($_smarty_tpl->tpl_vars['_event']->value['i_joined']['is_interested']) {?>
            <button type="button" class="btn btn-sm btn-light js_uninterest-event" data-id="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];?>
">
              <i class="fa fa-check mr5"></i><?php echo __("Interested");?>

            </button>
          <?php } else { ?>
           <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
              <button type="button" class="btn btn-sm btn-light rounded-pill" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, false);
?>
              </button>
           <?php } else { ?>
              <button type="button" class="btn btn-sm btn-light rounded-pill js_interest-event" data-id="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];?>
">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?>
              </button>
            <?php }?> 
          <?php }?>
        </div>
        <div>
          <span class="name">
           <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
</a>
           <?php } else { ?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
</a>
           <?php }?> 
          </span>
          <div><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_interested'];?>
 <?php echo __("Interested");?>
</div>
        </div>
      </div>
    </div>
  </li>
<?php }
}
}
