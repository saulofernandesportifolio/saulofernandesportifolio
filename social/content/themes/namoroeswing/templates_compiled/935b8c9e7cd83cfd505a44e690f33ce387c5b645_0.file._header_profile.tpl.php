<?php
/* Smarty version 4.5.3, created on 2024-09-13 16:03:14
  from '/var/www/html/social/content/themes/namoroeswing/templates/_header_profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e462425702b1_03752854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '935b8c9e7cd83cfd505a44e690f33ce387c5b645' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/_header_profile.tpl',
      1 => 1725499301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 33,
    'file:_header.search.tpl' => 1,
    'file:_header.friend_requests.tpl' => 1,
    'file:_header.messages.tpl' => 1,
    'file:_header.notifications.tpl' => 1,
    'file:_ads.tpl' => 1,
  ),
),false)) {
function content_66e462425702b1_03752854 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/social/vendor/smarty/smarty/libs/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>

  <body class="<?php if ($_smarty_tpl->tpl_vars['system']->value['theme_mode_night']) {?>night-mode<?php }?> visitor n_chat <?php if ($_smarty_tpl->tpl_vars['page']->value == 'index' && !$_smarty_tpl->tpl_vars['system']->value['newsfeed_public']) {?>index-body<?php }?>" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'profile' && $_smarty_tpl->tpl_vars['system']->value['system_profile_background_enabled'] && $_smarty_tpl->tpl_vars['profile']->value['user_profile_background']) {?>style="background: url(<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_profile_background'];?>
) fixed !important; background-size: 100% auto;" <?php }?>>
  <?php } else { ?>

    <body data-hash-tok="<?php echo $_smarty_tpl->tpl_vars['session_hash']->value['token'];?>
" data-hash-pos="<?php echo $_smarty_tpl->tpl_vars['session_hash']->value['position'];?>
" data-chat-enabled="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_chat_enabled'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['system']->value['theme_mode_night']) {?>night-mode<?php }?> <?php if (!$_smarty_tpl->tpl_vars['system']->value['chat_enabled']) {?>n_chat<?php }
if ($_smarty_tpl->tpl_vars['system']->value['activation_enabled'] && !$_smarty_tpl->tpl_vars['system']->value['activation_required'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_activated']) {?> n_activated<?php }
if (!$_smarty_tpl->tpl_vars['system']->value['system_live']) {?> n_live<?php }?>" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'profile' && $_smarty_tpl->tpl_vars['system']->value['system_profile_background_enabled'] && $_smarty_tpl->tpl_vars['profile']->value['user_profile_background']) {?>style="background: url(<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_profile_background'];?>
) fixed !important; background-size: 100% auto;" <?php }?> <?php if ($_smarty_tpl->tpl_vars['page']->value == "share" && $_smarty_tpl->tpl_vars['url']->value) {?>onload="initialize_scraper()" <?php }?>>
    <?php }?>
    <!-- main wrapper -->
    <div class="main-wrapper-profile">
      <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['system']->value['activation_enabled'] && !$_smarty_tpl->tpl_vars['system']->value['activation_required'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_activated']) {?>
        <!-- top-bar -->
        <div class="top-bar">
          <div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?>">
            <div class="row">
              <div class="col-sm-7 d-none d-sm-block">
                <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_type'] == "email") {?>
                  <?php echo __("Please go to");?>
 <span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_email'];?>
</span> <?php echo __("to complete the activation process");?>
.
                <?php } else { ?>
                  <?php echo __("Please check the SMS on your phone");?>
 <strong><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
</strong> <?php echo __("to complete the activation process");?>
.
                <?php }?>
              </div>
              <div class="col-sm-5">
                <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_type'] == "email") {?>
                  <span class="text-link" data-toggle="modal" data-url="core/activation_email_resend.php">
                    <?php echo __("Resend Verification Email");?>

                  </span>
                  -
                  <span class="text-link" data-toggle="modal" data-url="#activation-email-reset">
                    <?php echo __("Change Email");?>

                  </span>
                <?php } else { ?>
                  <span class="btn btn-info btn-sm mr10" data-toggle="modal" data-url="#activation-phone"><?php echo __("Enter Code");?>
</span>
                  <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_phone']) {?>
                    <span class="text-link" data-toggle="modal" data-url="core/activation_phone_resend.php">
                      <?php echo __("Resend SMS");?>

                    </span>
                    -
                  <?php }?>
                  <span class="text-link" data-toggle="modal" data-url="#activation-phone-reset">
                    <?php echo __("Change Phone Number");?>

                  </span>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
        <!-- top-bar -->
      <?php }?>

      <?php if (!$_smarty_tpl->tpl_vars['system']->value['system_live']) {?>
        <!-- top-bar alert-->
        <div class="top-bar danger">
          <div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?>">
            <i class="fa fa-exclamation-triangle fa-lg pr5"></i>
            <span class="d-none d-sm-inline"><?php echo __("The system has been shutted down");?>
.</span>
            <span><?php echo __("Turn it on from");?>
</span> <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/admincp/settings"><?php echo __("Admin Panel");?>
</a>
          </div>
        </div>
        <!-- top-bar alert-->
      <?php }?>

      <!-- main-header -->
      <?php if ($_smarty_tpl->tpl_vars['page']->value != "index" || ($_smarty_tpl->tpl_vars['user']->value->_logged_in || $_smarty_tpl->tpl_vars['system']->value['newsfeed_public'])) {?>
        <div class="main-header" <?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>style="padding-right: 0;" <?php }?>>
          <div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?>">
            <div class="row">

              <div class="<?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>col-6<?php }?> col-md-4 col-lg-3 <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>d-none d-md-block<?php }?>">
                <!-- logo-wrapper -->
                <div class="logo-wrapper">

                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['system']->value['newsfeed_public']) {?>
                    <!-- menu-icon -->
                    <a href="#" data-bs-toggle="sg-offcanvas" class="menu-icon d-block d-md-none">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-menu",'class'=>"header-icon",'width'=>"20px",'height'=>"20px"), 0, false);
?>
                    </a>
                    <!-- menu-icon -->
                  <?php }?>

                  <!-- logo -->
                  <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="logo <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['system']->value['newsfeed_public']) {?>with-menu-icon<?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['system_logo']) {?>
                      <img class="logo-light img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo'];?>
" alt="<?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
" title="<?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
">
                      <?php if (!$_smarty_tpl->tpl_vars['system']->value['system_logo_dark']) {?>
                        <img class="logo-dark img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo'];?>
" alt="<?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
" title="<?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
">
                      <?php } else { ?>
                        <img class="logo-dark img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo_dark'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
" title="<?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>
">
                      <?php }?>
                    <?php } else { ?>
                      <?php echo __($_smarty_tpl->tpl_vars['system']->value['system_title']);?>

                    <?php }?>
                  </a>
                  <!-- logo -->

                  <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                    <!-- home-icon -->
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="home-icon">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-home",'class'=>"header-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    </a>
                    <!-- home-icon -->
                  <?php }?>

                </div>
                <!-- logo-wrapper -->
              </div>

              <div class="<?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>col-6<?php }?> col-md-8 col-lg-9">
                <div class="row">
                  <div class="col-md-7 col-lg-8">
                    <!-- search-wrapper -->
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in || (!$_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['system']->value['system_public'])) {?>
                      <?php $_smarty_tpl->_subTemplateRender('file:_header.search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <?php }?>
                    <!-- search-wrapper -->
                  </div>
                  <div class="col-md-5 col-lg-4">
                    <!-- navbar-wrapper -->
                    <div class="navbar-wrapper">
                      <ul class="clearfix">
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                          <!-- bars -->
                          <li class="d-block d-md-none">
                            <a href="#" data-bs-toggle="sg-offcanvas">
                              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-menu",'class'=>"header-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                            </a>
                          </li>
                          <!-- bars -->

                          <!-- home -->
                          <li class="d-block d-md-none">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
">
                              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-home",'class'=>"header-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                            </a>
                          </li>
                          <!-- home -->

                          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_add_stories'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_write_articles'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_sell_products'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_raise_funding'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_create_ads'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_create_pages'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_create_groups'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_create_events']) {?>
                            <!-- add -->
                            <li class="d-none d-xxl-block dropdown">
                              <a href="#" data-bs-toggle="dropdown" data-display="static">
                                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-plus",'class'=>"header-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                              </a>
                              <div class="dropdown-menu dropdown-menu-end">
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_add_stories']) {?>
                                  <div class="dropdown-item pointer" data-toggle="modal" data-url="posts/story.php?do=create">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"24_hours",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                                    <?php echo __("Create Story");?>

                                  </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_write_articles']) {?>
                                  <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/new">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"articles",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                                    <?php echo __("Create Blog");?>

                                  </a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_sell_products']) {?>
                                  <div class="dropdown-item pointer" data-toggle="modal" data-url="posts/product.php?do=create">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"products",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                                    <?php echo __("Create Product");?>

                                  </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_raise_funding']) {?>
                                  <div class="dropdown-item pointer" data-toggle="modal" data-url="posts/funding.php?do=create">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"funding",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                                    <?php echo __("Create Funding");?>

                                  </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_create_ads']) {?>
                                  <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/ads/new">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"ads",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                                    <?php echo __("Create Ads");?>

                                  </a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_create_pages']) {?>
                                  <div class="dropdown-item pointer" data-toggle="modal" data-url="pages_groups_events/add.php?type=page">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pages",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                                    <?php echo __("Create Page");?>

                                  </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_create_groups']) {?>
                                  <div class="dropdown-item pointer" data-toggle="modal" data-url="pages_groups_events/add.php?type=group">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                                    <?php echo __("Create Group");?>

                                  </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_create_events']) {?>
                                  <div class="dropdown-item pointer" data-toggle="modal" data-url="pages_groups_events/add.php?type=event">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                                    <?php echo __("Create Event");?>

                                  </div>
                                <?php }?>
                              </div>
                            </li>
                            <!-- add -->
                          <?php }?>

                          <!-- friend requests -->
                          <?php $_smarty_tpl->_subTemplateRender('file:_header.friend_requests.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                          <!-- friend requests -->

                          <!-- messages -->
                          <?php $_smarty_tpl->_subTemplateRender('file:_header.messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                          <!-- messages -->

                          <!-- notifications -->
                          <?php $_smarty_tpl->_subTemplateRender('file:_header.notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                          <!-- notifications -->

                          <!-- search -->
                          <li class="d-block d-md-none">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search">
                              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-search",'class'=>"header-icon",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                            </a>
                          </li>
                          <!-- search -->

                          <!-- user-menu -->
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle user-menu" data-bs-toggle="dropdown" data-display="static">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_picture'];?>
">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
">
                                <img class="rounded-circle mr10" src="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_picture'];?>
" width="20px" height="20px">
                                <span><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['name'];?>
</span>
                              </a>
                              <!--<div class="dropdown-item pointer" data-toggle="modal" data-url="#account-switcher">
                                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"accounts_switcher",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                <?php echo __("Switch Accounts");?>

                              </div>-->
                              <div class="dropdown-divider"></div>
                              <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages">
                                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"membership",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                  <?php echo __("Upgrade to Pro");?>

                                </a>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['system']->value['points_enabled'] || $_smarty_tpl->tpl_vars['system']->value['wallet_enabled'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_raise_funding'] || ($_smarty_tpl->tpl_vars['user']->value->_data['can_monetize_content'] && $_smarty_tpl->tpl_vars['user']->value->_data['user_monetization_enabled'])) {?>
                                <?php if ($_smarty_tpl->tpl_vars['system']->value['points_enabled']) {?>
                                  <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/points">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"points",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                    <?php echo __("Points");?>
: <span class="badge bg-light text-primary"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_points'];?>
</span>
                                  </a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['system']->value['wallet_enabled']) {?>
                                  <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/wallet">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wallet",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                    <?php echo __("Wallet");?>
: <span class="badge bg-light text-primary"><?php echo print_money(smarty_modifier_number_format($_smarty_tpl->tpl_vars['user']->value->_data['user_wallet_balance'],2));?>
</span>
                                  </a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_raise_funding']) {?>
                                  <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/funding">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"funding",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                    <?php echo __("Funding");?>
: <span class="badge bg-light text-primary"><?php echo print_money(smarty_modifier_number_format($_smarty_tpl->tpl_vars['user']->value->_data['user_funding_balance'],2));?>
</span>
                                  </a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_monetize_content'] && $_smarty_tpl->tpl_vars['user']->value->_data['user_monetization_enabled']) {?>
                                  <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/monetization">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                    <?php echo __("Monetization");?>
: <span class="badge bg-light text-primary"><?php echo print_money(smarty_modifier_number_format($_smarty_tpl->tpl_vars['user']->value->_data['user_monetization_balance'],2));?>
</span>
                                  </a>
                                <?php }?>
                                <div class="dropdown-divider"></div>
                              <?php }?>

                              <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings">
                                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"settings",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                <?php echo __("Settings");?>

                              </a>
                              <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/admincp">
                                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"admin_panel",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                  <?php echo __("Admin Panel");?>

                                </a>
                              <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->_is_moderator) {?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/modcp">
                                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"admin_panel",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
echo __("Moderator Panel");?>

                                </a>
                              <?php }?>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signout">
                                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"logout",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                <?php echo __("Log Out");?>

                              </a>
                              <div class="dropdown-divider"></div>
                              <div class="dropdown-item pointer" data-toggle="modal" data-url="#keyboard-shortcuts">
                                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"keyboard",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                <?php echo __("Keyboard Shortcuts");?>

                              </div>
                              <?php if ($_smarty_tpl->tpl_vars['system']->value['themes'] && count($_smarty_tpl->tpl_vars['system']->value['themes']) > 1) {?>
                                <div class="dropdown-item pointer" data-toggle="modal" data-url="#theme-switcher">
                                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"themes_switcher",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                  <?php echo __("Theme Switcher");?>

                                </div>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['system']->value['system_theme_mode_select']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['system']->value['theme_mode_night']) {?>
                                  <div class="dropdown-item pointer js_theme-mode" data-mode="day">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"dark_light",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                    <span class="js_theme-mode-text"><?php echo __("Day Mode");?>
</span>
                                  </div>
                                <?php } else { ?>
                                  <div class="dropdown-item pointer js_theme-mode" data-mode="night">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"dark_light",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                    <span class="js_theme-mode-text"><?php echo __("Night Mode");?>
</span>
                                  </div>
                                <?php }?>
                              <?php }?>
                            </div>
                          </li>
                          <!-- user-menu -->

                        <?php } else { ?>

                          <li class="dropdown float-end">
                            <a href="#" class="dropdown-toggle user-menu" data-bs-toggle="dropdown" data-display="static">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/blank_profile_male.png">
                              <span><?php echo __("Join");?>
</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signin">
                                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"login",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                <?php echo __("Login");?>

                              </a>
                              <?php if ($_smarty_tpl->tpl_vars['system']->value['registration_enabled']) {?>
                                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signup">
                                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"user_add",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                  <?php echo __("Register");?>

                                </a>
                              <?php }?>
                              <?php if (($_smarty_tpl->tpl_vars['system']->value['themes'] && count($_smarty_tpl->tpl_vars['system']->value['themes']) > 1) || $_smarty_tpl->tpl_vars['system']->value['system_theme_mode_select']) {?>
                                <div class="dropdown-divider"></div>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['system']->value['themes'] && count($_smarty_tpl->tpl_vars['system']->value['themes']) > 1) {?>
                                <div class="dropdown-item pointer" data-toggle="modal" data-url="#theme-switcher">
                                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"themes_switcher",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                  <?php echo __("Theme Switcher");?>

                                </div>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['system']->value['system_theme_mode_select']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['system']->value['theme_mode_night']) {?>
                                  <div class="dropdown-item pointer js_theme-mode" data-mode="day">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"dark_light",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                    <span class="js_theme-mode-text"><?php echo __("Day Mode");?>
</span>
                                  </div>
                                <?php } else { ?>
                                  <div class="dropdown-item pointer js_theme-mode" data-mode="night">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"dark_light",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                                    <span class="js_theme-mode-text"><?php echo __("Night Mode");?>
</span>
                                  </div>
                                <?php }?>
                              <?php }?>
                            </div>
                          </li>

                        <?php }?>
                      </ul>
                    </div>
                    <!-- navbar-wrapper -->
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      <?php }?>
      <!-- main-header -->

      <!-- ads -->
      <?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_ads'=>$_smarty_tpl->tpl_vars['ads_master']->value['header'],'_master'=>true), 0, false);
?>
<!-- ads --><?php }
}
