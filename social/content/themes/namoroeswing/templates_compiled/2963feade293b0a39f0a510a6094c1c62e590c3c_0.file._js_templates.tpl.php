<?php
/* Smarty version 4.5.3, created on 2024-09-13 16:18:30
  from '/var/www/html/social/content/themes/namoroeswing/templates/_js_templates.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e465d6a1e5b2_03292934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2963feade293b0a39f0a510a6094c1c62e590c3c' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/_js_templates.tpl',
      1 => 1726244005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 57,
  ),
),false)) {
function content_66e465d6a1e5b2_03292934 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/social/vendor/smarty/smarty/libs/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<!-- Toasts --><div class="toast-container p-3 bottom-0 start-0 fixed-bottom"></div><!-- Toasts --><!-- Modals --><div id="modal" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><div class="loader pt10 pb10"></div></div></div></div></div><?php echo '<script'; ?>
 id="modal-login" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Not Logged In");?>
</h6></div><div class="modal-body"><p><?php echo __("Please log in to continue");?>
</p></div><div class="modal-footer"><a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signin"><?php echo __("Login");?>
</a></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-upgrade" type="text/template"><div class="modal-header"><h4 class="modal-title" style="padding-left: 36%;"><b><?php echo __("Attention !");?>
</b></h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><!-- upgrade --><div class="alert alert-warning" ><div class="icon"><i class="fa fa-id-card fa-2x"></i></div><div class="text"><strong><?php echo __("Membership");?>
</strong><br><?php echo __("Have access to all options, choose the best plan for you, and have all the advantages of being Plus. Check the available packages?");?>
</div></div><!-- upgrade --></div><div class="modal-footer" style="justify-content: center;"><div class="text-center"><?php if (!$_smarty_tpl->tpl_vars['profile']->value['name']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/" class="btn btn-primary btn btn-block"><i class="fa fa-check mr5"></i><?php echo __("Continue Free");?>
</a><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
" class="btn btn-primary btn btn-block"><i class="fa fa-check mr5"></i><?php echo __("Continue Free");?>
</a><?php }?></div><div class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="btn btn-primary btn btn-block"><i class="fa fa-rocket mr5"></i><?php echo __("Check Pro Packages");?>
</a></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-message" type="text/template"><div class="modal-header"><h6 class="modal-title">{{title}}</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><p>{{message}}</p></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-success" type="text/template"><div class="modal-body text-center" style="padding: 50px;"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"main-icon mb20",'width'=>"60px",'height'=>"60px"), 0, false);
?><h4>{{title}}</h4><p class="mt20">{{message}}</p></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-error" type="text/template"><div class="modal-body text-center" style="padding: 50px;"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"report",'class'=>"main-icon mb20",'width'=>"60px",'height'=>"60px"), 0, true);
?><h4>{{title}}</h4><p class="mt20">{{message}}</p></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-confirm" type="text/template"><div class="modal-header"><h6 class="modal-title">{{title}}</h6></div><div class="modal-body"><h6>{{message}}</h6>{{#password_check}}<div class="form-group mt20"><label class="form-label" for="modal-password-check"><?php echo __("Confirm Password");?>
</label><input id="modal-password-check" name="password_check" type="password" class="form-control"></div>{{/password_check}}</div><div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="button" class="btn btn-primary" id="modal-confirm-ok"><?php echo __("Confirm");?>
</button></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-loading" type="text/template">
    <div class="modal-body text-center">
      <div class="spinner-border text-primary"></div>
    </div>
  <?php echo '</script'; ?>
><!-- Modals --><!-- Theme Switcher --><?php echo '<script'; ?>
 id="theme-switcher" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"themes_switcher",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Theme Switcher");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body pb0 pt30"><div class="row"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['system']->value['themes'], 'theme');
$_smarty_tpl->tpl_vars['theme']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['theme']->value) {
$_smarty_tpl->tpl_vars['theme']->do_else = false;
?><div class="col-6"><div style="background: rgb(0 0 0 / 0.06); padding: 8px; border-radius: 8px; margin-bottom: 30px;"><a style="display: block; position: relative; padding-bottom: 60%;" href="?theme=<?php echo $_smarty_tpl->tpl_vars['theme']->value['name'];?>
"><img style="width: 100%; height: 100%; position: absolute; top: 0; right: 0; bottom: 0; left: 0; border-radius: 4px;" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['theme']->value['name'];?>
/thumbnail.png"><span style="position: absolute; background: linear-gradient(transparent, rgb(0 0 0 / 0.7)); bottom: 0; left: 0; right: 0; width: 100%; border-radius: 0 0 8px 8px; color: #fff; font-size: 14px; text-align: center; text-transform: capitalize; padding: 20px 8px 8px;"><?php echo $_smarty_tpl->tpl_vars['theme']->value['name'];?>
</span></a></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div><?php echo '</script'; ?>
><!-- Themes --><!-- Search --><?php echo '<script'; ?>
 id="search-for" type="text/template"><div class="ptb10 plr10"><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search/{{#hashtag}}hashtag/{{/hashtag}}{{query}}"><i class="fa fa-search pr5"></i> <?php echo __("Search for");?>
 {{#hashtag}}#{{/hashtag}}{{query}}</a></div><?php echo '</script'; ?>
><!-- Search --><!-- Lightbox --><?php echo '<script'; ?>
 id="lightbox" type="text/template"><div class="lightbox"><div class="lightbox-container"><div class="lightbox-preview"><div class="lightbox-next js_lightbox-slider"><?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == 'RTL') {?><i class="fa fa-chevron-circle-left fa-3x"></i><?php } else { ?><i class="fa fa-chevron-circle-right fa-3x"></i><?php }?></div><div class="lightbox-prev js_lightbox-slider"><?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == 'RTL') {?><i class="fa fa-chevron-circle-right fa-3x"></i><?php } else { ?><i class="fa fa-chevron-circle-left fa-3x"></i><?php }?></div><div class="lightbox-download"><a href="{{image}}" download><?php echo __("Download");?>
</a> - <a target="_blank" href="{{image}}"><?php echo __("View Original");?>
</a></div><img alt="" class="img-fluid" src="{{image}}"></div><div class="lightbox-data"><div class="clearfix"><div class="pt5 pr5 float-end"><button type="button" class="btn-close lightbox-close js_lightbox-close"></button></div></div><div class="lightbox-post"><div class="js_scroller" data-slimScroll-height="100%"><div class="loader mtb10"></div></div></div></div></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="lightbox-nodata" type="text/template"><div class="lightbox"><div class="lightbox-container"><div class="lightbox-preview nodata"><div class="lightbox-exit js_lightbox-close"><i class="fas fa-times fa-2x"></i></div><img alt="" class="img-fluid" src="{{image}}"></div></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="lightbox-live" type="text/template"><div class="lightbox" data-live-post-id="{{post_id}}"><div class="lightbox-container"><div class="lightbox-preview with-live"><div class="live-stream-video" id="js_live-video"><div class="live-counter" id="js_live-counter"><span class="status offline" id=js_live-counter-status><?php echo __("Offline");?>
</span><span class="number"><i class="fas fa-eye mr5"></i><strong id="js_live-counter-number">0</strong></span></div><div class="live-status" id="js_live-status"><?php echo __("Loading");?>
<span class="spinner-grow spinner-grow-sm ml10"></span></div></div></div><div class="lightbox-data"><div class="clearfix"><div class="pt5 pr5 float-end"><button type="button" class="btn-close lightbox-close js_lightbox-close"></button></div></div><div class="lightbox-post"><div class="js_scroller" data-slimScroll-height="100%"><div class="loader mtb10"></div></div></div></div></div></div><?php echo '</script'; ?>
><!-- Lightbox --><!-- Two-Factor Authentication --><?php echo '<script'; ?>
 id="two-factor-authentication" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Two-factor authentication required");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="core/two_factor_authentication.php"><div class="modal-body"><div class="mb20"><?php echo __("You've asked us to require a 6-digit login code when anyone tries to access your account from a new device or browser");?>
.</div><div class="mb20"><?php echo __("Enter the 6-digit code that we sent to your");?>
 <strong>{{method}}</strong></div><div class="form-group"><input name="two_factor_key" type="text" class="form-control" placeholder="######" required autofocus></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><input name="user_id" type="hidden" value="{{user_id}}">{{#remember}}<input name="remember" type="hidden" value="true">{{/remember}}{{#connecting_account}}<input name="connecting_account" type="hidden" value="true">{{/connecting_account}}<button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><!-- Two-Factor Authentication --><?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?><!-- Forget Password --><?php echo '<script'; ?>
 id="forget-password-confirm" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Check Your Email");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="core/forget_password_confirm.php"><div class="modal-body"><div class="mb20"><?php echo __("Check your email");?>
 - <?php echo __("We sent you an email with a six-digit confirmation code. Enter it below to continue to reset your password");?>
.</div><div class="row"><div class="col-md-6"><div class="form-group"><input name="reset_key" type="text" class="form-control" placeholder="######" required autofocus></div></div><div class="col-md-6"><label class="form-label mb5"><?php echo __("We sent your code to");?>
</label> <span class="badge badge-lg bg-light text-primary">{{email}}</span></div></div><!-- error --><div class="alert alert-danger mt15 mb0 x-hidden"></div><!-- error --></div><div class="modal-footer"><input name="email" type="hidden" value="{{email}}"><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="forget-password-reset" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Change Your Password!");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="core/forget_password_reset.php"><div class="modal-body"><div class="form-group"><label class="form-label" for="password"><?php echo __("New Password");?>
</label><input name="password" id="password" type="password" class="form-control" required autofocus></div><div class="form-group"><label class="form-label" for="confirm"><?php echo __("Confirm Password");?>
</label><input name="confirm" id="confirm" type="password" class="form-control" required></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><input name="email" type="hidden" value="{{email}}"><input name="reset_key" type="hidden" value="{{reset_key}}"><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><!-- Forget Password --><?php } else { ?><!-- Account Switcher --><?php echo '<script'; ?>
 id="account-switcher" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"accounts_switcher",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Switch Accounts");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body ptb30"><ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['connected_accounts'], 'connected_account');
$_smarty_tpl->tpl_vars['connected_account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['connected_account']->value) {
$_smarty_tpl->tpl_vars['connected_account']->do_else = false;
?><li class="feeds-item with-hover mt5"><div class="data-container js_connected-account-switch" data-uid="<?php echo $_smarty_tpl->tpl_vars['connected_account']->value['user_id'];?>
"><span class="data-avatar"><img src="<?php echo $_smarty_tpl->tpl_vars['connected_account']->value['user_picture'];?>
" alt=""></span><div class="data-content"><?php if ($_smarty_tpl->tpl_vars['connected_account']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?><div class="float-end"><i class="fa fa-check-circle fa-fw fa-2x text-success"></i></div><?php }?><div class="mt5"><span class="name text-link-no-underline"><?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['connected_account']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['connected_account']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['connected_account']->value['user_lastname'];
}?></span><?php if ($_smarty_tpl->tpl_vars['connected_account']->value['user_subscribed'] && $_smarty_tpl->tpl_vars['connected_account']->value['user_package'] != 5) {?><span class="pro-badge" data-bs-toggle="tooltip" title='<?php echo __("Pro User");?>
'><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pro_badge",'width'=>"20px",'height'=>"20px"), 0, true);
?></span><?php }
if ($_smarty_tpl->tpl_vars['connected_account']->value['user_verified'] && $_smarty_tpl->tpl_vars['connected_account']->value['user_package'] === 5 || $_smarty_tpl->tpl_vars['connected_account']->value['user_verified'] && $_smarty_tpl->tpl_vars['connected_account']->value['package_name'] == "Plano 180") {?><span class="verified-badge" data-bs-toggle="tooltip" title='<?php echo __("Verified User");?>
'><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), 0, true);
?></span><?php }?></div></div></div></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_master_account']) {?><div class="d-grid mt20"><button class="btn btn-primary" data-toggle="modal" data-url="#account-connector"><?php echo __("Add Account");?>
</button></div><?php }?></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="account-connector" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"accounts_switcher",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Connect Accounts");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body ptb30"><form class="js_ajax-forms" data-url="users/switch.php" method="POST"><!-- username or email --><div class="form-group"><div class="input-group"><span class="input-group-text"><i class="far fa-user fa-fw"></i></span><input type="text" class="form-control" placeholder='<?php echo __("Email");?>
 <?php echo __("or");?>
 <?php echo __("Username");?>
' name="username_email" required></div></div><!-- username or email --><!-- password --><div class="form-group"><div class="input-group"><span class="input-group-text"><i class="fas fa-key fa-fw"></i></span><input type="password" class="form-control" placeholder='<?php echo __("Password");?>
' name="password" required></div></div><!-- password --><!-- submit --><div class="d-grid form-group"><input type="hidden" name="do" value="signin"><button type="submit" class="btn btn-lg btn-primary bg-gradient-blue border-0 rounded-pill"><?php echo __("Login");?>
</button></div><!-- submit --><!-- error --><div class="alert alert-danger mt15 mb0 x-hidden"></div><!-- error --></form></div><?php echo '</script'; ?>
><!-- Account Switcher --><!-- Email Activation --><?php echo '<script'; ?>
 id="activation-email-reset" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Change Email Address");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="core/activation_email_reset.php"><div class="modal-body"><div class="form-group"><label class="form-label mb10"><?php echo __("Current Email");?>
</label><br><span class="badge badge-lg bg-info"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_email'];?>
</span></div><div class="form-group"><label class="form-label" for="email"><?php echo __("New Email");?>
</label><input name="email" id="email" type="email" class="form-control" required autofocus></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><!-- Email Activation --><!-- Phone Activation --><?php echo '<script'; ?>
 id="activation-phone" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Enter the code from the SMS message");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="core/activation_phone.php"><div class="modal-body"><div class="mb20"><?php echo __("Let us know if this mobile number belongs to you. Enter the code in the SMS");?>
</div><div class="row"><div class="col-md-6"><div class="form-group"><input name="code" type="text" class="form-control" placeholder="######" required autofocus><?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_phone']) {?><div class="form-text"><span class="text-link" data-toggle="modal" data-url="core/activation_phone_resend.php"><?php echo __("Resend SMS");?>
</span></div><?php }?></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="col-md-6"><?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_phone']) {
echo __("We sent your code to");?>
 <strong><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
</strong><?php }?></div></div></div><div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="activation-phone-reset" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Change Phone Number");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="core/activation_phone_reset.php"><div class="modal-body"><?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_phone']) {?><div class="form-group"><label class="form-label"><?php echo __("Current Phone");?>
</label><p class="form-control-plaintext"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
</p></div><?php }?><div class="form-group"><label class="form-label"><?php echo __("New Phone");?>
</label><input name="phone" type="text" class="form-control" required autofocus><div class="form-text"><?php echo __("For example");?>
: +12344567890</div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><!-- Phone Activation --><!-- x-uploader -->
    <?php echo '<script'; ?>
 id="x-uploader" type="text/template">
      <form class="x-uploader" action="{{url}}" method="post" enctype="multipart/form-data">
        {{#multiple}}
        <input name="file[]" type="file" multiple="multiple" accept="{{accept}}">
        {{/multiple}}
        {{^multiple}}
        <input name="file" type="file" accept="{{accept}}">
        {{/multiple}}
        <input type="hidden" name="secret" value="{{secret}}">
      </form>
    <?php echo '</script'; ?>
>
    <!-- x-uploader --><!-- Noty Notification --><?php if ($_smarty_tpl->tpl_vars['system']->value['noty_notifications_enabled']) {
echo '<script'; ?>
 id="toast-notification" type="text/template"><div class="toast align-items-center text-bg-info border-0" role="alert" aria-live="assertive" aria-atomic="true"><div class="d-flex"><div class="toast-body"><div class="data-container"><div class="data-avatar"><img src="{{image}}" /></div><div class="data-content mt10">{{message}}</div></div></div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div></div><?php echo '</script'; ?>
><?php }?><!-- Noty Notification --><!-- Adblock Detector --><?php if ($_smarty_tpl->tpl_vars['system']->value['adblock_detector_enabled']) {
echo '<script'; ?>
 id="adblock-detector" type="text/template"><div class="adblock-detector"><?php echo __("Our website is made possible by displaying online advertisements to our visitors");?>
<br><?php echo __("Please consider supporting us by disabling your ad blocker");?>
.</div><?php echo '</script'; ?>
><?php }?><!-- Adblock Detector --><!-- Keyboard Shortcuts --><?php echo '<script'; ?>
 id="keyboard-shortcuts" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"keyboard",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Keyboard Shortcuts");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body text-xlg"><div class="mb10"><kbd>J</kbd> <?php echo __("Scroll to the next post");?>
</div><div><kbd>K</kbd> <?php echo __("Scroll to the previous post");?>
</div></div><?php echo '</script'; ?>
><!-- Keyboard Shortcuts --><!-- Emoji Menu --><?php echo '<script'; ?>
 id="emoji-menu" type="text/template"><div class="emoji-menu"><div class="tab-content"><div class="tab-pane tab-emojis active" id="tab-emojis-{{id}}"><div class="js_scroller" data-slimScroll-height="180"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->get_emojis(), 'emoji', false, 'emoji_index');
$_smarty_tpl->tpl_vars['emoji']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['emoji_index']->value => $_smarty_tpl->tpl_vars['emoji']->value) {
$_smarty_tpl->tpl_vars['emoji']->do_else = false;
?><div class="item item-<?php echo $_smarty_tpl->tpl_vars['emoji_index']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['emoji_index']->value > 50) {?> style="display: none;" js-hidden <?php }?>><i data-emoji="<?php echo $_smarty_tpl->tpl_vars['emoji']->value['unicode_char'];?>
" class="js_emoji twa twa-2x twa-<?php echo $_smarty_tpl->tpl_vars['emoji']->value['class'];?>
"></i></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div><div class="tab-pane" id="tab-stickers-{{id}}"><div class="js_scroller" data-slimScroll-height="180"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->get_stickers(), 'sticker');
$_smarty_tpl->tpl_vars['sticker']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sticker']->value) {
$_smarty_tpl->tpl_vars['sticker']->do_else = false;
?><div class="item"><img data-emoji=":STK-<?php echo $_smarty_tpl->tpl_vars['sticker']->value['sticker_id'];?>
:" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['sticker']->value['image'];?>
" class="js_emoji"></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div><ul class="nav nav-tabs"><li class="nav-item"><a class="nav-link active" href="#tab-emojis-{{id}}" data-bs-toggle="tab"><i class="fa fa-smile fa-fw mr5"></i><?php echo __("Emojis");?>
</a></li><li class="nav-item"><a class="nav-link" href="#tab-stickers-{{id}}" data-bs-toggle="tab"><i class="fa fa-hand-peace fa-fw mr5"></i><?php echo __("Stickers");?>
</a></li></ul></div><?php echo '</script'; ?>
><!-- Emoji Menu --><!-- Chat --><?php if ($_smarty_tpl->tpl_vars['system']->value['chat_enabled']) {?><!-- Chat Sidebar --><div class="chat-sidebar <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_chat_enabled']) {?>disabled<?php }?>"><div class="chat-sidebar-content"><div class="js_scroller" data-slimScroll-height="100%"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sidebar_friends']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><div class="chat-avatar-wrapper clickable" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php } else { ?><div class="chat-avatar-wrapper clickable js_chat-start" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
" data-name="<?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];
}?>" data-link="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
"><?php }?><div class="chat-avatar"><img src="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_picture'];?>
" alt="" /><i class="online-status fa fa-circle <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_is_online']) {?>online<?php } else { ?>offline<?php }?>"></i></div><div class="last-seen"><?php if ($_smarty_tpl->tpl_vars['system']->value['chat_status_enabled'] && !$_smarty_tpl->tpl_vars['_user']->value['user_is_online']) {?><span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_last_seen'];?>
"><?php echo $_smarty_tpl->tpl_vars['_user']->value["user_last_seen"];?>
</span><?php } else { ?><div class="pb10"></div><?php }?></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div><div class="chat-sidebar-footer"><?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><a class="btn btn-chat rounded-circle mb10" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"start_chat",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?></a><?php } else { ?><a class="btn btn-chat rounded-circle mb10 js_chat-new" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages/new"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"start_chat",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?></a><?php }
if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><a class="btn btn-chat rounded-circle mb10" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"cog",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
} else { ?><button class="btn btn-chat rounded-circle" data-bs-toggle="dropdown" data-display="static"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"cog",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?></button><?php }?><div class="dropdown-menu dropdown-menu-end action-dropdown-menu"><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/blocking"><div class="action"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"blocking",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("Manage Blocking");?>
</div><div class="action-desc"><?php echo __("Manage blocked users");?>
</div></a><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/privacy"><div class="action"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"privacy",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("Privacy Settings");?>
</div><div class="action-desc"><?php echo __("Manage your privacy");?>
</div></a><div class="dropdown-divider"></div><?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_chat_enabled']) {?><div class="dropdown-item pointer js_chat-toggle" data-status="on"><div class="action"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"hide",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("Turn Off Chat");?>
</div></div><?php } else { ?><div class="dropdown-item pointer js_chat-toggle" data-status="off"><div class="action"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"unhide",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("Turn On Chat");?>
</div></div><?php }?></div></div></div><!-- Chat Sidebar --><?php }
echo '<script'; ?>
 id="chat-box-new" type="text/template"><div class="chat-widget chat-box opened fresh"><!-- head --><div class="chat-widget-head"><!-- user-card --><div class="chat-user-card"><div class="name"><?php echo __("New Message");?>
</div></div><!-- user-card --><!-- buttons--><div class="chat-head-btns"><span class="chat-head-btn js_chat-box-close"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"close",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?></span></div><!-- buttons--></div><!-- head --><!-- content --><div class="chat-widget-content"><div class="chat-conversations js_scroller"></div><div class="chat-to clearfix js_autocomplete-tags"><div class="to"><?php echo __("To");?>
:</div><ul class="tags"></ul><div class="typeahead"><input type="text" size="1" autofocus></div></div><div class="chat-voice-notes"><div class="voice-recording-wrapper" data-handle="chat"><!-- processing message --><div class="x-hidden js_voice-processing-message"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"upload",'class'=>"main-icon mr5",'width'=>"16px",'height'=>"16px"), 0, true);
echo __("Processing");?>
<span class="loading-dots"></span></div><!-- processing message --><!-- success message --><div class="x-hidden js_voice-success-message"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"main-icon mr5",'width'=>"16px",'height'=>"16px"), 0, true);
echo __("Voice note recorded successfully");?>
<div class="float-end"><button type="button" class="btn-close js_voice-remove"></button></div></div><!-- success message --><!-- start recording --><div class="btn-voice-start js_voice-start"><i class="fas fa-microphone mr5"></i><?php echo __("Record");?>
</div><!-- start recording --><!-- stop recording --><div class="btn-voice-stop js_voice-stop" style="display: none"><i class="far fa-stop-circle mr5"></i><?php echo __("Recording");?>
 <span class="js_voice-timer">00:00</span></div><!-- stop recording --></div></div><div class="chat-attachments attachments clearfix x-hidden"><ul><li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li></ul></div><div class="x-form chat-form invisible"><div class="chat-form-message"><?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><textarea class="js_autosize" dir="auto" rows="1" placeholder='<?php echo __("Write a message");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"></textarea><?php } else { ?><textarea class="js_autosize js_post-message" dir="auto" rows="1" placeholder='<?php echo __("Write a message");?>
'></textarea><?php }?></div><ul class="x-form-tools clearfix"><?php if ($_smarty_tpl->tpl_vars['system']->value['chat_photos_enabled']) {?><li class="x-form-tools-attach"><?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><i class="far fa-image fa-lg fa-fw" data-handle="chat" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"></i><?php } else { ?><i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="chat"></i><?php }?></li><?php }
if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_chat_enabled']) {
if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><li class="x-form-tools-voice" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><i class="fas fa-microphone fa-lg fa-fw"></i></li><?php } else { ?><li class="x-form-tools-voice js_chat-voice-notes-toggle"><i class="fas fa-microphone fa-lg fa-fw"></i></li><?php }
}
if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><li class="x-form-tools-emoji" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><i class="far fa-smile-wink fa-lg fa-fw"></i></li><?php } else { ?><li class="x-form-tools-emoji js_emoji-menu-toggle"><i class="far fa-smile-wink fa-lg fa-fw"></i></li><?php }?></ul></div></div><!-- content --></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-box" type="text/template"><div class="chat-widget chat-box opened" id="{{chat_key_value}}" {{#conversation_id}}data-cid="{{conversation_id}}" {{/conversation_id}} {{#user_id}}data-uid="{{user_id}}" {{/user_id}}><!-- head --><div class="chat-widget-head"><!-- label --><div class="chat-head-label"><span class="badge rounded-pill bg-danger js_chat-box-label"></span></div><!-- label --><!-- user-card --><a class="chat-user-card" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/{{link}}" title="{{name_list}}">{{^multiple}}<div class="avatar"><img src="{{picture}}"><i class="online-status fa fa-circle offline js_chat-box-status"></i></div>{{/multiple}}<div class="name"><span>{{name}}</span></div></a><!-- user-card --><!-- buttons--><div class="chat-head-btns"><!-- video/audio calls (not multiple) -->{{^multiple}}<?php if ($_smarty_tpl->tpl_vars['system']->value['audio_call_enabled'] && $_smarty_tpl->tpl_vars['user']->value->_data['can_start_audio_call']) {
if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><span class="chat-head-btn" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_audio",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?></span><?php } else { ?><span class="chat-head-btn js_chat-call-start" data-type="audio" data-uid="{{user_id}}" data-name="{{name_list}}"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_audio",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?></span><?php }
}
if ($_smarty_tpl->tpl_vars['system']->value['video_call_enabled'] && $_smarty_tpl->tpl_vars['user']->value->_data['can_start_video_call']) {
if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><span class="chat-head-btn" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_video",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?></span><?php } else { ?><span class="chat-head-btn js_chat-call-start" data-type="video" data-uid="{{user_id}}" data-name="{{name_list}}"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_video",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?></span><?php }
}?>{{/multiple}}<!-- video/audio calls (not multiple) --><span class="chat-head-btn js_chat-box-close"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"close",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?></span></div><!-- buttons--></div><!-- head --><!-- content --><div class="chat-widget-content"><div class="chat-conversations js_scroller"><ul></ul></div><div class="chat-typing"><i class="far fa-comment-dots mr5"></i><span class="loading-dots"><span class="js_chat-typing-users"></span> <?php echo __("Typing");?>
</span></div><div class="chat-voice-notes"><div class="voice-recording-wrapper" data-handle="chat"><!-- processing message --><div class="x-hidden js_voice-processing-message"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"upload",'class'=>"main-icon mr5",'width'=>"16px",'height'=>"16px"), 0, true);
echo __("Processing");?>
<span class="loading-dots"></span></div><!-- processing message --><!-- success message --><div class="x-hidden js_voice-success-message"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"main-icon mr5",'width'=>"16px",'height'=>"16px"), 0, true);
echo __("Voice note recorded successfully");?>
<div class="float-end"><button type="button" class="btn-close js_voice-remove"></button></div></div><!-- success message --><!-- start recording --><div class="btn-voice-start js_voice-start"><i class="fas fa-microphone mr5"></i><?php echo __("Record");?>
</div><!-- start recording --><!-- stop recording --><div class="btn-voice-stop js_voice-stop" style="display: none"><i class="far fa-stop-circle mr5"></i><?php echo __("Recording");?>
 <span class="js_voice-timer">00:00</span></div><!-- stop recording --></div></div><div class="chat-attachments attachments clearfix x-hidden"><ul><li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li></ul></div><div class="x-form chat-form"><div class="chat-form-message"><?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><textarea class="js_autosize" dir="auto" rows="1" placeholder='<?php echo __("Write a message");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"></textarea><?php } else { ?><textarea class="js_autosize js_post-message" dir="auto" rows="1" placeholder='<?php echo __("Write a message");?>
'></textarea><?php }?></div><ul class="x-form-tools clearfix"><?php if ($_smarty_tpl->tpl_vars['system']->value['chat_photos_enabled']) {?><li class="x-form-tools-attach"><?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><i class="far fa-image fa-lg fa-fw" data-handle="chat" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"></i><?php } else { ?><i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="chat"></i><?php }?></li><?php }
if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_chat_enabled']) {
if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><li class="x-form-tools-voice" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><i class="fas fa-microphone fa-lg fa-fw"></i></li><?php } else { ?><li class="x-form-tools-voice js_chat-voice-notes-toggle"><i class="fas fa-microphone fa-lg fa-fw"></i></li><?php }
}
if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><li class="x-form-tools-emoji" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><i class="far fa-smile-wink fa-lg fa-fw"></i></li><?php } else { ?><li class="x-form-tools-emoji js_emoji-menu-toggle"><i class="far fa-smile-wink fa-lg fa-fw"></i></li><?php }
if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed'] || $_smarty_tpl->tpl_vars['user']->value->_data['user_package'] == 5 && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?><li class="x-form-tools-colors" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/upgrade/posts" data-toggle="modal" data-url="core/upgradepost.php"><i class="fa fa-circle fa-lg fa-fw"></i></li><?php } else { ?><li class="x-form-tools-colors js_chat-colors-menu-toggle js_chat-color-me {{^conversation_id}}x-hidden{{/conversation_id}}"><i class="fa fa-circle fa-lg fa-fw"></i></li><?php }?></ul></div></div><!-- content --></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-message" type="text/template"><li><div class="conversation clearfix right" id="{{id}}"><div class="conversation-body"><div class="text js_chat-color-me" {{#color}}style="background-color: {{color}}" {{/color}}>{{{message}}}{{#image}}<span class="text-link js_lightbox-nodata {{#message}}mt5{{/message}}" data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/{{image}}"><img alt="" class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/{{image}}"></span>{{/image}}{{#voice_note}}<audio class="js_audio" id="audio-{{id}}" controls preload="auto" style="width: 100%; min-width: 100px;"><source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/{{voice_note}}" type="audio/mpeg"><source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/{{voice_note}}" type="audio/mp3"><?php echo __("Your browser does not support HTML5 audio");?>
</audio>{{/voice_note}}</div><div class="time js_moment" data-time="{{time}}">{{time}}</div></div></div></li><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-calling" type="text/template"><div class="modal-header border-0"><h6 class="modal-title  mx-auto">{{#is_video}}<?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_video",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>{{/is_video}}{{#is_audio}}<?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_audio",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>{{/is_audio}}<?php echo __("Calling");?>
</h6></div><div class="modal-body text-center"><h3>{{name}}</h3><p class="text-lg js_chat-calling-message"><?php echo __("Connecting");?>
<span class="loading-dots"></span></p><div class="twilio-stream-wrapper"><div class="twilio-stream"></div><div class="twilio-stream-local"></div></div><div class="mt30"><button type="button" class="btn btn-light rounded-pill x-hidden js_chat-call-close" data-bs-dismiss="modal"><?php echo __("Close");?>
</button><button type="button" class="btn btn-md btn-danger rounded-pill x-hidden js_chat-call-cancel" data-type="{{type}}" data-bs-dismiss="modal"><i class="fas fa-phone-slash fa-lg fa-fw"></i></button><button type="button" class="btn btn-md btn-danger rounded-pill x-hidden js_chat-call-end" data-type="{{type}}" data-bs-dismiss="modal"><i class="fas fa-phone-slash fa-lg fa-fw"></i></button></div></div><div class="modal-footer border-0"></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-ringing" type="text/template"><div class="modal-header border-0"><h6 class="modal-title mx-auto">{{#is_video}}<?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_video",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>{{/is_video}}{{#is_audio}}<?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_audio",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>{{/is_audio}}</h6></div><div class="modal-body text-center"><div class="position-relative mb10" style="height: 106px;"><div class="profile-avatar-wrapper static"><img src="{{image}}" alt="{{name}}" style="width: 98px; height: 98px;"></div></div><h3>{{name}}</h3>{{#is_video}}<p class="text-lg js_chat-ringing-message"><?php echo __("Wants to have video call with you");?>
</p>{{/is_video}}{{#is_audio}}<p class="text-lg js_chat-ringing-message"><?php echo __("Wants to have audio call with you");?>
</p>{{/is_audio}}<div class="twilio-stream-wrapper"><div class="twilio-stream"></div><div class="twilio-stream-local"></div></div><div class="mt30"><button type="submit" class="btn btn-icon btn-rounded btn-success mr10 js_chat-call-answer" data-type="{{type}}" data-id="{{id}}"><i class="fas fa-phone-alt fa-lg fa-fw"></i></button><button type="button" class="btn btn-icon btn-rounded btn-danger js_chat-call-decline" data-type="{{type}}" data-id="{{id}}" data-bs-dismiss="modal"><i class="fas fa-phone-slash fa-lg fa-fw"></i></button><button type="button" class="btn btn-icon btn-rounded btn-danger x-hidden js_chat-call-end" data-type="{{type}}" data-id="{{id}}" data-bs-dismiss="modal"><i class="fas fa-phone-slash fa-lg fa-fw"></i></button></div></div><div class="modal-footer border-0"></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-colors-menu" type="text/template">
      <div class="chat-colors-menu">
        <div class="js_scroller" data-slimScroll-height="180">
          <div class="item js_chat-color" data-color="#5e72e4" style="color: #5e72e4;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#0ba05d" style="color: #0ba05d;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#ed9e6a" style="color: #ed9e6a;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#a085e2" style="color: #a085e2;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#01a5a5" style="color: #01a5a5;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#2b87ce" style="color: #2b87ce;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#ff72d2" style="color: #ff72d2;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#c9605e" style="color: #c9605e;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#056bba" style="color: #056bba;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#fc9cde" style="color: #fc9cde;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#70a0e0" style="color: #70a0e0;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#f2812b" style="color: #f2812b;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#8ec96c" style="color: #8ec96c;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#f33d4c" style="color: #f33d4c;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#aa2294" style="color: #aa2294;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#0e71ea" style="color: #0e71ea;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#b582af" style="color: #b582af;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#a1ce79" style="color: #a1ce79;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#56c4c5" style="color: #56c4c5;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#f9a722" style="color: #f9a722;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#f9c270" style="color: #f9c270;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#609b41" style="color: #609b41;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#51bcbc" style="color: #51bcbc;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#008484" style="color: #008484;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
          <div class="item js_chat-color" data-color="#5462a5" style="color: #5462a5;">
            <i class="fa fa-circle fa-2x"></i>
          </div>
        </div>
      </div>
    <?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-attachments-item" type="text/template"><li class="item deletable" data-src="{{src}}"><img alt="" src="{{image_path}}"><button type="button" class="btn-close js_chat-attachment-remover" title='<?php echo __("Remove");?>
'></button></li><?php echo '</script'; ?>
><!-- Chat --><!-- DayTime Messages --><?php if ($_smarty_tpl->tpl_vars['system']->value['daytime_msg_enabled'] && $_smarty_tpl->tpl_vars['page']->value == "index") {
echo '<script'; ?>
 id="message-morning" type="text/template"><div class="card daytime_message"><button type="button" class="btn-close float-end js_daytime-remover"></button><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"sun",'width'=>"40px",'height'=>"40px",'class'=>"d-table-cell vertical-align-middle pr10"), 0, true);
?><div class="d-table-cell"><strong><?php echo __("Good Morning");?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['name'];?>
</strong><br><span><?php echo __($_smarty_tpl->tpl_vars['system']->value['system_morning_message']);?>
</span></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="message-afternoon" type="text/template"><div class="card daytime_message"><button type="button" class="btn-close float-end js_daytime-remover"></button><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"afternoon",'width'=>"40px",'height'=>"40px",'class'=>"d-table-cell vertical-align-middle pr10"), 0, true);
?><div class="d-table-cell"><strong><?php echo __("Good Afternoon");?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['name'];?>
</strong><br><span><?php echo __($_smarty_tpl->tpl_vars['system']->value['system_afternoon_message']);?>
</span></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="message-evening" type="text/template"><div class="card daytime_message"><button type="button" class="btn-close float-end js_daytime-remover"></button><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"night",'width'=>"40px",'height'=>"40px",'class'=>"d-table-cell vertical-align-middle pr10"), 0, true);
?><div class="d-table-cell"><strong><?php echo __("Good Evening");?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['name'];?>
</strong><br><span><?php echo __($_smarty_tpl->tpl_vars['system']->value['system_evening_message']);?>
</span></div></div><?php echo '</script'; ?>
><?php }?><!-- DayTime Messages --><!-- Gifts --><?php if ($_smarty_tpl->tpl_vars['system']->value['gifts_enabled'] && $_smarty_tpl->tpl_vars['page']->value == "profile") {
echo '<script'; ?>
 id="gifts" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"gifts",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Gifts");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="users/gifts.php?do=send&uid={{uid}}"><div class="modal-body"><div class="js_scroller" data-slimScroll-height="440"><div class="row no-gutters"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gifts']->value, 'gift');
$_smarty_tpl->tpl_vars['gift']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gift']->value) {
$_smarty_tpl->tpl_vars['gift']->do_else = false;
?><div class="col-12 col-sm-6 col-md-4 ptb5 plr5"><input class="x-hidden input-label" type="radio" name="gift" value="<?php echo $_smarty_tpl->tpl_vars['gift']->value['gift_id'];?>
" id="gift_<?php echo $_smarty_tpl->tpl_vars['gift']->value['gift_id'];?>
" /><label class="button-label-image" for="gift_<?php echo $_smarty_tpl->tpl_vars['gift']->value['gift_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['gift']->value['image'];?>
" /></label></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="submit" class="btn btn-primary"><?php echo __("Send");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="gift" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"gifts",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['gift']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['gift']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['gift']->value['user_lastname'];
}?> <?php echo __("sent you a gift");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body text-center"><img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['gift']->value['image'];?>
"></div><?php echo '</script'; ?>
><?php }?><!-- Gifts --><!-- Uploader --><?php echo '<script'; ?>
 id="uploader-attachments-image-item" type="text/template"><li class="item deletable" data-src="{{src}}"><img alt="" src="{{image_path}}"><button type="button" class="btn-close {{#mini}}js_publisher-mini-attachment-image-remover{{/mini}}{{^mini}}js_publisher-attachment-image-remover{{/mini}}" title='<?php echo __("Remove");?>
'></button></li><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="uploader-attachments-video-item" type="text/template"><li class="item deletable" data-src="{{src}}"><div class="name">{{name}}</div><button type="button" class="btn-close js_publisher-mini-attachment-video-remover" title='<?php echo __("Remove");?>
'></button></li><?php echo '</script'; ?>
><!-- Uploader --><!-- Posts [Publisher|Comments] --><?php if ($_smarty_tpl->tpl_vars['page']->value == "index" || $_smarty_tpl->tpl_vars['page']->value == "profile" || $_smarty_tpl->tpl_vars['page']->value == "page" || $_smarty_tpl->tpl_vars['page']->value == "group" || $_smarty_tpl->tpl_vars['page']->value == "event" || $_smarty_tpl->tpl_vars['page']->value == "post" || $_smarty_tpl->tpl_vars['page']->value == "photo" || $_smarty_tpl->tpl_vars['page']->value == "market" || $_smarty_tpl->tpl_vars['page']->value == "blogs" || $_smarty_tpl->tpl_vars['page']->value == "directory" || $_smarty_tpl->tpl_vars['page']->value == "search" || $_smarty_tpl->tpl_vars['page']->value == "share") {?><!-- Publisher --><?php echo '<script'; ?>
 id="scraper-photo" type="text/template"><div class="publisher-scraper-remover js_publisher-scraper-remover"><button type="button" class="btn-close"></button></div><div class="post-media"><div class="post-media-image"><div class="image" style="background-image:url('{{url}}');"></div></div><div class="post-media-meta"><div class="source">{{provider}}</div></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="scraper-link" type="text/template"><div class="publisher-scraper-remover js_publisher-scraper-remover"><button type="button" class="btn-close"></button></div><div class="post-media">{{#thumbnail}}<a class="post-media-image" href="{{url}}" target="_blank"><div class="image" style="background-image:url('{{thumbnail}}');"></div><div class="source">{{host}}</div></a>{{/thumbnail}}<div class="post-media-meta"><a class="title mb5" href="{{url}}" target="_blank">{{title}}</a><div class="text mb5">{{text}}</div></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="scraper-media" type="text/template"><div class="publisher-scraper-remover js_publisher-scraper-remover"><button type="button" class="btn-close"></button></div><div>{{{html}}}</div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="scraper-player" type="text/template"><div class="publisher-scraper-remover js_publisher-scraper-remover"><button type="button" class="btn-close"></button></div><div><div class="ratio ratio-16x9">{{{html}}}</div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="scraper-facebook" type="text/template"><div class="publisher-scraper-remover js_publisher-scraper-remover"><button type="button" class="btn-close"></button></div><div><div class="embed-facebook-wrapper">{{{html}}}<div class="embed-facebook-placeholder ptb30"><div class="d-flex justify-content-center"><div class="spinner-grow"></div></div></div></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="poll-option" type="text/template"><div class="publisher-meta" data-meta="poll"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"plus",'class'=>"main-icon",'width'=>"16px",'height'=>"16px"), 0, true);
?><input type="text" placeholder='<?php echo __("Add an option");?>
...'></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="pubisher-gif" type="text/template"><div class="publisher-scraper-remover js_publisher-gif-remover"><button type="button" class="btn-close"></button></div><div class="post-media"><div class="post-media-image"><div class="image" style="background-image:url('{{src}}');"></div></div></div><?php echo '</script'; ?>
><!-- Publisher --><!-- Comments --><?php echo '<script'; ?>
 id="comment-attachments-item" type="text/template"><li class="item deletable" data-src="{{src}}"><img alt="" src="{{image_path}}"><button type="button" class="btn-close js_comment-attachment-remover" title='<?php echo __("Remove");?>
'></button></li><?php echo '</script'; ?>
><!-- Comments --><!-- Edit (Posts|Comments) --><?php echo '<script'; ?>
 id="edit-post" type="text/template"><div class="post-edit"><div class="x-form comment-form"><textarea rows="2" class="js_autosize js_mention js_update-post-textarea">{{text}}</textarea><ul class="x-form-tools clearfix"><li class="x-form-tools-emoji js_emoji-menu-toggle"><i class="far fa-smile-wink fa-lg fa-fw"></i></li></ul></div><div class="text-end mt5"><button class="btn btn-sm btn-outline-light plr15 rounded-pill mr5 js_unedit-post"><?php echo __("Cancel");?>
</button><button class="btn btn-sm btn-outline-primary plr15 rounded-pill js_update-post"><?php echo __("Save");?>
</button></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="edit-comment" type="text/template"><div class="comment-edit"><div class="x-form comment-form"><textarea rows="1" class="js_autosize js_mention js_update-comment-textarea">{{text}}</textarea><ul class="x-form-tools clearfix"><li class="x-form-tools-attach"><i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="comment"></i></li><li class="x-form-tools-emoji js_emoji-menu-toggle"><i class="far fa-smile-wink fa-lg fa-fw"></i></li></ul></div><div class="comment-attachments attachments clearfix x-hidden"><ul><li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li></ul></div><div class="text-end mt5"><button class="btn btn-sm btn-outline-light plr15 rounded-pill mr5 js_unedit-comment"><?php echo __("Cancel");?>
</button><button class="btn btn-sm btn-outline-primary plr15 rounded-pill js_update-comment"><?php echo __("Save");?>
</button></div></div><?php echo '</script'; ?>
><!-- Edit (Posts|Comments) --><!-- Hidden (Posts|Authors) --><?php echo '<script'; ?>
 id="hidden-post" type="text/template"><div class="post flagged" data-id="{{id}}"><div class="text-semibold mb5"><?php echo __("Post Hidden");?>
</div><?php echo __("This post will no longer appear to you");?>
 <span class="text-link js_unhide-post"><?php echo __("Undo");?>
</span></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="hidden-author" type="text/template"><div class="post flagged" data-id="{{id}}"><?php echo __("You won't see posts from");?>
 {{name}} <?php echo __("in News Feed anymore");?>
. <span class="text-link js_unhide-author" data-author-id="{{uid}}" data-author-name="{{name}}"><?php echo __("Undo");?>
</span></div><?php echo '</script'; ?>
><!-- Hidden (Posts|Authors) --><?php if ($_smarty_tpl->tpl_vars['system']->value['tips_enabled']) {?><!-- Tips --><?php echo '<script'; ?>
 id="send-tip" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"tips",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Send Tip");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="payments/wallet.php?do=send_tip"><div class="modal-body"><div class="form-group"><label class="form-label" for="amount"><?php echo __("Your Wallet Credit");?>
</label><div><span class="badge badge-lg bg-info"><?php echo print_money(smarty_modifier_number_format($_smarty_tpl->tpl_vars['user']->value->_data['user_wallet_balance'],2));?>
</span></div></div><div class="form-group"><label class="form-label"><?php echo __("Amount");?>
</label><div class="input-money <?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_dir'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div><div class="form-text"><?php echo __("The minimum amount");?>
: <?php echo print_money($_smarty_tpl->tpl_vars['system']->value['tips_min_amount']);?>
 <?php echo __("and the maximum");?>
: <?php echo print_money($_smarty_tpl->tpl_vars['system']->value['tips_max_amount']);?>
</div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><input type="hidden" name="send_to_id" value="{{id}}"><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-primary"><?php echo __("Send");?>
</button></div></form><?php echo '</script'; ?>
><!-- Tips --><?php }
}?><!-- Posts [Publisher|Comments] --><!-- Wallet --><?php if ($_smarty_tpl->tpl_vars['page']->value == "wallet") {
echo '<script'; ?>
 id="wallet-transfer" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wallet_transfer",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Send Money");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="payments/wallet.php?do=wallet_transfer"><div class="modal-body"><div class="form-group"><label class="form-label"><?php echo __("Amount");?>
</label><div class="input-money <?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_dir'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div></div><div class="form-group"><label class="form-label" for="send_to"><?php echo __("Send To");?>
</label><div class="position-relative js_autocomplete"><input type="text" class="form-control" placeholder="<?php echo __("Search for user name or email");?>
" name="send_to" id="send_to" autocomplete="off"><input type="hidden" name="send_to_id"></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="submit" class="btn btn-primary"><?php echo __("Send");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="wallet-replenish" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"payments",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Replenish Credit");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="payments/wallet.php?do=wallet_replenish"><div class="modal-body"><div class="form-group"><label class="form-label" for="amount"><?php echo __("Amount");?>
</label><div class="input-money <?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_dir'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="wallet-withdraw-affiliates" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"affiliates",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Withdraw Affiliates Credit");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="payments/wallet.php?do=wallet_withdraw_affiliates"><div class="modal-body"><div class="form-group"><label class="form-label" for="amount"><?php echo __("Your Affiliates Credit");?>
</label><div><span class="badge badge-lg bg-info"><?php echo print_money(smarty_modifier_number_format($_smarty_tpl->tpl_vars['user']->value->_data['user_affiliate_balance'],2));?>
</span></div></div><div class="form-group"><label class="form-label" for="amount"><?php echo __("Amount");?>
</label><div class="input-money <?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_dir'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="wallet-withdraw-points" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"points",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Withdraw Points Credit");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="payments/wallet.php?do=wallet_withdraw_points"><div class="modal-body"><div class="form-group"><label class="form-label" for="amount"><?php echo __("Your Points Credit");?>
</label><div><span class="badge badge-lg bg-info"><?php echo print_money((smarty_modifier_number_format(((1/$_smarty_tpl->tpl_vars['system']->value['points_per_currency'])*$_smarty_tpl->tpl_vars['user']->value->_data['user_points']),2)));?>
</span></div></div><div class="form-group"><label class="form-label" for="amount"><?php echo __("Amount");?>
</label><div class="input-money <?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_dir'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="wallet-withdraw-funding" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"funding",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Withdraw Funding Credit");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="payments/wallet.php?do=wallet_withdraw_funding"><div class="modal-body"><div class="form-group"><label class="form-label" for="amount"><?php echo __("Your Funding Credit");?>
</label><div><span class="badge badge-lg bg-info"><?php echo print_money(smarty_modifier_number_format($_smarty_tpl->tpl_vars['user']->value->_data['user_funding_balance'],2));?>
</span></div></div><div class="form-group"><label class="form-label" for="amount"><?php echo __("Amount");?>
</label><div class="input-money <?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_dir'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="wallet-withdraw-monetization" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Withdraw Monetization Credit");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="payments/wallet.php?do=wallet_withdraw_monetization"><div class="modal-body"><div class="form-group"><label class="form-label" for="amount"><?php echo __("Your Monetization Credit");?>
</label><div><span class="badge badge-lg bg-info"><?php echo print_money(smarty_modifier_number_format($_smarty_tpl->tpl_vars['user']->value->_data['user_monetization_balance'],2));?>
</span></div></div><div class="form-group"><label class="form-label" for="amount"><?php echo __("Amount");?>
</label><div class="input-money <?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_dir'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php }?><!-- Wallet --><!-- Crop Profile Picture --><?php if ($_smarty_tpl->tpl_vars['page']->value == "started" || $_smarty_tpl->tpl_vars['page']->value == "profile" || $_smarty_tpl->tpl_vars['page']->value == "page" || $_smarty_tpl->tpl_vars['page']->value == "group") {
echo '<script'; ?>
 id="crop-profile-picture" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"crop",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Crop Picture");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body text-center"><div class="alert alert-info mb-20"><i class="fa fa-info-circle mr5"></i><?php echo __("Crop animated images will make them static, You can skip the cropping process by clicking on the cancel button");?>
</div><img id="cropped-profile-picture" src="{{image}}" style="max-width: 100%;"></div><div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="button" class="btn btn-primary js_crop-picture" data-handle="{{handle}}" data-id="{{id}}"><?php echo __("Save");?>
</button></div><?php echo '</script'; ?>
><?php }?><!-- Crop Profile Picture --><!-- Download Information --><?php if ($_smarty_tpl->tpl_vars['page']->value == "settings") {
echo '<script'; ?>
 id="download-information" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"user_information",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Download Your Information");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><div class="text-center"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"ready",'class'=>"mb20",'width'=>"100px",'height'=>"100px"), 0, true);
?><p class="text-lg"><?php echo __("Your file is ready to download");?>
</p><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/download?hash=<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
-<?php echo $_smarty_tpl->tpl_vars['secret']->value;?>
" class="btn btn-md btn-primary bg-gradient-blue border-0 rounded-pill"><i class="fa fa-cloud-download-alt mr10"></i><?php echo __("Download");?>
</a></div></div><?php echo '</script'; ?>
><?php }?><!-- Download Information --><!-- Verification Documents --><?php if ($_smarty_tpl->tpl_vars['page']->value == "admin") {
echo '<script'; ?>
 id="verification-documents" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Verification Documents");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><?php if ($_smarty_tpl->tpl_vars['system']->value['verification_docs_required']) {?><div class="row form-group"><label class="col-md-3 form-label"><?php echo __("Documents");?>
</label><div class="col-sm-9"><div class="row"><div class="col-sm-6"><div class="section-title mb20"><i class="fas fa-passport mr10"></i><?php echo __("Personal Photo");?>
</div><a target="_blank" href="{{photo}}"><img class="img-fluid" src="{{photo}}"></a></div><div class="col-sm-6"><div class="section-title mb20"><i class="fas fa-passport mr10"></i><?php echo __("Passport or National ID");?>
</div><a target="_blank" href="{{passport}}"><img class="img-fluid" src="{{passport}}"></a></div></div></div></div><?php }?><div class="row form-group"><label class="col-md-3 form-label"><?php echo __("Message");?>
</label><div class="col-sm-9"><p class="pt5 pb0">{{message}}</p></div></div></div><div class="modal-footer"><button class="btn btn-danger js_admin-unverify" data-id="{{request-id}}"><i class="fa fa-times mr5"></i><?php echo __("Decline");?>
</button><button class="btn btn-success js_admin-verify" data-handle="{{handle}}" data-id="{{node-id}}"><i class="fa fa-check mr5"></i><?php echo __("Verify");?>
</button></div><?php echo '</script'; ?>
><?php }?><!-- Verification Documents --><!-- Funding --><?php if ($_smarty_tpl->tpl_vars['system']->value['funding_enabled'] && ($_smarty_tpl->tpl_vars['page']->value == "index" || $_smarty_tpl->tpl_vars['page']->value == "profile" || $_smarty_tpl->tpl_vars['page']->value == "page" || $_smarty_tpl->tpl_vars['page']->value == "group" || $_smarty_tpl->tpl_vars['page']->value == "post" || $_smarty_tpl->tpl_vars['page']->value == "directory" || $_smarty_tpl->tpl_vars['page']->value == "search")) {
echo '<script'; ?>
 id="funding-donate" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"funding",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Donate");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="posts/funding.php?do=donate&post_id={{post_id}}"><div class="modal-body"><div class="form-group"><label class="form-label" for="amount"><?php echo __("Amount");?>
</label><div class="input-money <?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_dir'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount" /></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-primary"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php }?><!-- Funding --><!-- Payments --><?php if ($_smarty_tpl->tpl_vars['page']->value == "packages" || $_smarty_tpl->tpl_vars['page']->value == "ads" || $_smarty_tpl->tpl_vars['page']->value == "wallet" || ($_smarty_tpl->tpl_vars['page']->value == "index" || $_smarty_tpl->tpl_vars['page']->value == "profile" || $_smarty_tpl->tpl_vars['page']->value == "page" || $_smarty_tpl->tpl_vars['page']->value == "group" || $_smarty_tpl->tpl_vars['page']->value == "post" || $_smarty_tpl->tpl_vars['page']->value == "directory" || $_smarty_tpl->tpl_vars['page']->value == "search" || $_smarty_tpl->tpl_vars['page']->value == "movies")) {?><!-- Payment Method --><?php echo '<script'; ?>
 id="payment" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Select Your Payment Method");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body text-center"><div class="row justify-content-center"><?php if ($_smarty_tpl->tpl_vars['system']->value['paypal_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-paypal btn btn-md btn-payment" data-handle="{{handle}}" {{#id}} data-id="{{id}}" {{/id}} {{#price}} data-price="{{price}}" {{/price}}><i class="fab fa-paypal fa-lg fa-fw mr5" style="color: #00186A;"></i><?php echo __("PayPal");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['mercado_pago_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-mercado-pago btn btn-md btn-payment" data-handle="{{handle}}" {{#id}} data-id="{{id}}" {{/id}} {{#price}} data-price="{{price}}" {{/price}}><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"mercado-pago",'class'=>"mr5",'width'=>"20px",'height'=>"20px"), 0, true);
?> <?php echo __("Market paid out");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['creditcard_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-stripe btn btn-md btn-payment" data-handle="{{handle}}" {{#id}} data-id="{{id}}" {{/id}} {{#price}} data-price="{{price}}" {{/price}} {{#name}} data-name="{{name}}" {{/name}} {{#img}} data-img="{{img}}" {{/img}} data-method="credit"><i class="fa fa-credit-card fa-lg fa-fw mr5" style="color: #8798CC;"></i><?php echo __("Credit Card");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['alipay_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-stripe btn btn-md btn-payment" data-handle="{{handle}}" {{#id}} data-id="{{id}}" {{/id}} {{#price}} data-price="{{price}}" {{/price}} {{#name}} data-name="{{name}}" {{/name}} {{#img}} data-img="{{img}}" {{/img}} data-method="alipay"><i class="fab fa-alipay fa-lg fa-fw mr5" style="color: #5B9EDD;"></i><?php echo __("Alipay");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['paystack_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-paystack btn btn-md btn-payment" data-handle="{{handle}}" {{#id}} data-id="{{id}}" {{/id}} {{#price}} data-price="{{price}}" {{/price}}><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"paystack",'class'=>"mr5",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("Paystack");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['coinpayments_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-coinpayments btn btn-md btn-payment" data-handle="{{handle}}" {{#id}} data-id="{{id}}" {{/id}} {{#price}} data-price="{{price}}" {{/price}}><i class="fab fa-bitcoin fa-lg fa-fw mr5" style="color: #FFC107;"></i><?php echo __("CoinPayments");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['2checkout_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="btn btn-md btn-payment" data-toggle="modal" data-url="#twocheckout" data-options='{ "handle": "{{handle}}", "id": "{{id}}", "price": "{{price}}" }'><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"2co",'class'=>"mr5",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("2Checkout");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['razorpay_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="btn btn-md btn-payment" data-toggle="modal" data-url="#razorpay" data-options='{ "handle": "{{handle}}", "id": "{{id}}", "price": "{{price}}" }'><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"razorpay",'class'=>"mr5",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("Razorpay");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['cashfree_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="btn btn-md btn-payment" data-toggle="modal" data-url="#cashfree" data-options='{ "handle": "{{handle}}", "id": "{{id}}", "price": "{{price}}" }'><img width="20px" height="20px" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/cashfree.png" class="mr5"><?php echo __("Cashfree");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['coinbase_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-coinbase btn btn-md btn-payment" data-handle="{{handle}}" {{#id}} data-id="{{id}}" {{/id}} {{#price}} data-price="{{price}}" {{/price}}><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"coinbase",'class'=>"mr10",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("Coinbase");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['securionpay_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-securionpay btn btn-md btn-payment" data-handle="{{handle}}" {{#id}} data-id="{{id}}" {{/id}} {{#price}} data-price="{{price}}" {{/price}}><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"securionpay",'class'=>"mr10",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("SecurionPay");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['moneypoolscash_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-moneypoolscash btn btn-md btn-payment" data-handle="{{handle}}" {{#id}} data-id="{{id}}" {{/id}} {{#price}} data-price="{{price}}" {{/price}}><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"moneypoolscash",'class'=>"mr10",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("MoneyPoolsCash");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['bank_transfers_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="btn btn-md btn-payment" data-toggle="modal" data-url="#bank-transfer" data-options='{ "handle": "{{handle}}", "id": "{{id}}", "price": "{{price}}" }' data-size="large"><i class="fa fa-university fa-lg fa-fw mr5" style="color: #4CAF50;"></i><?php echo __("Bank Transfer");?>
</button></div></div><?php }
if ($_smarty_tpl->tpl_vars['page']->value == "packages" && $_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && $_smarty_tpl->tpl_vars['system']->value['packages_wallet_payment_enabled'] && $_smarty_tpl->tpl_vars['system']->value['wallet_enabled']) {?><div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-wallet-package btn btn-md btn-payment" data-id="{{id}}"><i class="fa fa-wallet fa-lg fa-fw mr5" style="color: #007bff;"></i><?php echo __("Wallet Credit");?>
</button></div></div><?php }
if (($_smarty_tpl->tpl_vars['page']->value != "packages" && $_smarty_tpl->tpl_vars['page']->value != "wallet") && $_smarty_tpl->tpl_vars['system']->value['monetization_enabled'] && $_smarty_tpl->tpl_vars['system']->value['monetization_wallet_payment_enabled'] && $_smarty_tpl->tpl_vars['system']->value['wallet_enabled']) {?>{{#subscribe}}<div class="col-12 col-sm-6 mb10"><div class="d-grid"><button class="js_payment-wallet-monetization btn btn-md btn-payment" data-id="{{id}}"><i class="fa fa-wallet fa-lg fa-fw mr5" style="color: #007bff;"></i><?php echo __("Wallet Credit");?>
</button></div></div>{{/subscribe}}<?php }?></div></div><?php echo '</script'; ?>
><!-- Payment Method --><!-- 2Checkout --><?php if ($_smarty_tpl->tpl_vars['system']->value['2checkout_enabled']) {
echo '<script'; ?>
 id="twocheckout" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"2co",'class'=>"mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("2Checkout");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form id="twocheckout_form"><div class="modal-body"><div class="heading-small mb20"><?php echo __("Card Info");?>
</div><div class="pl-md-4 pr-md-4"><div class="row"><div class="form-group col-md-12"><label class="form-label"><?php echo __("Card Number");?>
</label><input name="card_number" type="text" class="form-control" required autocomplete="off"></div><div class="form-group col-md-4"><label class="form-label"><?php echo __("Exp Month");?>
</label><select name="card_exp_month" class="form-control" required><?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 12+1 - (1) : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php if ($_smarty_tpl->tpl_vars['i']->value < 10) {?>0<?php }
echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['i']->value < 10) {?>0<?php }
echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }
}
?></select></div><div class="form-group col-md-4"><label class="form-label"><?php echo __("Exp Year");?>
</label><select name="card_exp_year" class="form-control" required><?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2040+1 - (2023) : 2023-(2040)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 2023, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }
}
?></select></div><div class="form-group col-md-4"><label class="form-label"><?php echo __("CVC");?>
</label><input name="card_cvv" type="text" class="form-control" required autocomplete="off"></div></div></div><div class="heading-small mb20"><?php echo __("Billing Information");?>
</div><div class="pl-md-4 pr-md-4"><div class="row"><div class="form-group col-md-6"><label class="form-label"><?php echo __("Name");?>
</label><input name="billing_name" type="text" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['name'];?>
"></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("Email");?>
</label><input name="billing_email" type="email" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_email'];?>
"></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("Phone");?>
</label><input name="billing_phone" type="text" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
"></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("Address");?>
</label><input name="billing_address" type="text" class="form-control required"></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("City");?>
</label><input name="billing_city" type="text" class="form-control" required></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("State");?>
</label><input name="billing_state" type="text" class="form-control" required></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("Country");?>
</label><select name="billing_country" class="form-control" required><option value="none"><?php echo __("Select Country");?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?><option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_country'] == $_smarty_tpl->tpl_vars['country']->value['country_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['country']->value['country_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['country']->value['country_name'];?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("Zip Code");?>
</label><input name="billing_zip_code" type="text" class="form-control" required></div></div></div><!-- error --><div class="alert alert-danger mt15 mb0 x-hidden"></div><!-- error --></div><div class="modal-footer"><input type="hidden" name="token" value="" /><input type="hidden" name="handle" value="{{handle}}"><input type="hidden" name="id" value="{{id}}"><input type="hidden" name="price" value="{{price}}"><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-primary"><i class="fa fa-check-circle mr10"></i><?php echo __("Pay");?>
</button></div></form><?php echo '</script'; ?>
><?php }?><!-- 2Checkout --><!-- Razorpay --><?php if ($_smarty_tpl->tpl_vars['system']->value['razorpay_enabled']) {
echo '<script'; ?>
 id="razorpay" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"razorpay",'class'=>"mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Razorpay");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form id="razorpay_form"><div class="modal-body"><div class="row"><div class="form-group col-md-6"><label class="form-label"><?php echo __("Name");?>
</label><input name="billing_name" type="text" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['name'];?>
" /></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("Email");?>
</label><input name="billing_email" type="email" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_email'];?>
" /></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("Phone");?>
</label><input name="billing_phone" type="text" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
" /></div></div><!-- error --><div class="alert alert-danger mt15 mb0 x-hidden"></div><!-- error --></div><div class="modal-footer"><input type="hidden" name="handle" value="{{handle}}" /><input type="hidden" name="id" value="{{id}}" /><input type="hidden" name="price" value="{{price}}" /><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-primary"><i class="fa fa-check-circle mr10"></i><?php echo __("Pay");?>
</button></div></form><?php echo '</script'; ?>
><?php }?><!-- Razorpay --><!-- Cashfree --><?php if ($_smarty_tpl->tpl_vars['system']->value['cashfree_enabled']) {
echo '<script'; ?>
 id="cashfree" type="text/template"><div class="modal-header"><h6 class="modal-title"><img width="24px" height="24px" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/cashfree.png" class="mr10"><?php echo __("Cashfree");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form id="cashfree_form"><div class="modal-body"><div class="row"><div class="form-group col-md-6"><label class="form-label"><?php echo __("Name");?>
</label><input name="billing_name" type="text" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['name'];?>
" /></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("Email");?>
</label><input name="billing_email" type="email" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_email'];?>
" /></div><div class="form-group col-md-6"><label class="form-label"><?php echo __("Phone");?>
</label><input name="billing_phone" type="text" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
" /></div></div><!-- error --><div class="alert alert-danger mt15 mb0 x-hidden"></div><!-- error --></div><div class="modal-footer"><input type="hidden" name="handle" value="{{handle}}" /><input type="hidden" name="id" value="{{id}}" /><input type="hidden" name="price" value="{{price}}" /><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-primary"><i class="fa fa-check-circle mr10"></i><?php echo __("Pay");?>
</button></div></form><?php echo '</script'; ?>
><?php }?><!-- Cashfree --><!-- Bank Transfer --><?php if ($_smarty_tpl->tpl_vars['system']->value['bank_transfers_enabled']) {
echo '<script'; ?>
 id="bank-transfer" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"bank",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
echo __("Bank Transfer");?>
</h6><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><form class="js_ajax-forms" data-url="payments/bank.php"><div class="modal-body"><div class="page-header rounded bank-transfer mb30"><div class="circle-1"></div><div class="circle-2"></div><div class="inner text-left"><?php if ($_smarty_tpl->tpl_vars['system']->value['bank_name']) {?><h2 class="mb20"><i class="fa fa-university mr5"></i><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_name'];?>
</h2><?php }
if ($_smarty_tpl->tpl_vars['system']->value['bank_account_number']) {?><div class="mb10"><div class="bank-info-meta"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_number'];?>
</div><span class="bank-info-help"><?php echo __("Account Number / IBAN");?>
</span></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['bank_account_name']) {?><div class="mb10"><div class="bank-info-meta"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_name'];?>
</div><span class="bank-info-help"><?php echo __("Account Name");?>
</span></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['bank_account_routing'] || $_smarty_tpl->tpl_vars['system']->value['bank_account_country']) {?><div class="row mb10"><?php if ($_smarty_tpl->tpl_vars['system']->value['bank_account_routing']) {?><div class="col-md-6"><div class="bank-info-meta"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_routing'];?>
</div><span class="bank-info-help"><?php echo __("Routing Code");?>
</span></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['bank_account_country']) {?><div class="col-md-6"><div class="bank-info-meta"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_country'];?>
</div><span class="bank-info-help"><?php echo __("Country");?>
</span></div><?php }?></div><?php }?></div></div><div class="alert alert-warning"><div class="icon"><i class="fa fa-exclamation-triangle fa-2x"></i></div><div class="text"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_transfer_note'];?>
</div></div><div class="row form-group"><label class="col-md-3 form-label"><?php echo __("Bank Receipt");?>
</label><div class="col-md-9"><div class="x-image"><button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo __("Remove");?>
'></button><div class="x-image-loader"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></div><i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i><input type="hidden" class="js_x-image-input" name="bank_receipt" value=""></div><div class="form-text"><?php echo __("Please attach your bank receipt");?>
</div></div></div><!-- success --><div class="alert alert-success mt15 mb0 x-hidden"></div><!-- success --><!-- error --><div class="alert alert-danger mt15 mb0 x-hidden"></div><!-- error --></div><div class="modal-footer"><input type="hidden" name="handle" value="{{handle}}"><input type="hidden" name="id" value="{{id}}"><input type="hidden" name="price" value="{{price}}"><button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-primary"><i class="fa fa-check-circle mr10"></i><?php echo __("Send");?>
</button></div></form><?php echo '</script'; ?>
><?php }?><!-- Bank Transfer --><?php }?><!-- Payments --><!-- Auto Connect --><?php if ($_smarty_tpl->tpl_vars['page']->value == "admin" && $_smarty_tpl->tpl_vars['view']->value == "tools" && $_smarty_tpl->tpl_vars['sub_view']->value == "auto-connect") {
echo '<script'; ?>
 id="auto-connect-node" type="text/template"><div class="auto-connect-node"><div class="row form-group"><label class="col-md-3 form-label"><?php echo __("Select");?>
 {{nodes_name}}</label><div class="col-md-9"><select class="form-control mb10" name="{{country_field_name}}"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['country_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['country']->value['country_name'];?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><input type="text" class="js_tagify-ajax-late x-hidden" data-handle="{{nodes}}" name="{{nodes_field_name}}"><div class="form-text"><?php echo __("Search for nodes you want new accounts to auto connect");?>
 <?php echo __("to this country");?>
</div></div></div></div><?php echo '</script'; ?>
><?php }?><!-- Auto Connect --><?php }?>


<?php }
}
