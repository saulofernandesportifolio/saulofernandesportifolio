<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:34
  from '/var/www/html/social/content/themes/namoroeswing/templates/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e457526fd973_27109394',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca8919a5787df56dca97142b3f3a4177bf24cef2' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/admin.tpl',
      1 => 1725499301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:admin.".((string)$_smarty_tpl->tpl_vars[\'view\']->value).".tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_66e457526fd973_27109394 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> mt20 sg-offcanvas">
  <div class="row">

    <!-- left panel -->
    <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar">

      <!-- System -->
      <div class="card mb15">
        <div class="card-header block-title">
          <?php echo __("System");?>

        </div>
        <div class="card-body with-nav">
          <ul class="side-nav">
            <!-- Dashboard -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "dashboard") {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
">
                <i class="fa fa-tachometer-alt fa-lg fa-fw mr10" style="color: #5e72e4"></i><?php echo __("Dashboard");?>

              </a>
            </li>
            <!-- Dashboard -->

            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
              <!-- Settings -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings") {?>class="active" <?php }?>>
                <a href="#settings" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-cog fa-lg fa-fw mr10" style="color: #5e72e4"></i><?php echo __("Settings");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings") {?>show<?php }?>' id="settings">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings">
                        <i class="fa fa-cogs fa-lg fa-fw mr10"></i><?php echo __("System Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "posts") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/posts">
                        <i class="fa fa-comment-alt fa-lg fa-fw mr10"></i><?php echo __("Posts Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "registration") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/registration">
                        <i class="fa fa-sign-in-alt fa-lg fa-fw mr10"></i><?php echo __("Registration Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "accounts") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/accounts">
                        <i class="fa fa-users-cog fa-lg fa-fw mr10"></i><?php echo __("Accounts Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "email") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/email">
                        <i class="fa fa-envelope-open fa-lg fa-fw mr10"></i><?php echo __("Email Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "sms") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/sms">
                        <i class="fa fa-mobile fa-lg fa-fw mr10"></i><?php echo __("SMS Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "notifications") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/notifications">
                        <i class="fa fa-bell fa-lg fa-fw mr10"></i><?php echo __("Notifications Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "chat") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/chat">
                        <i class="fa fa-comments fa-lg fa-fw mr10"></i><?php echo __("Chat Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "live") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/live">
                        <i class="fa fa-signal fa-lg fa-fw mr10"></i><?php echo __("Live Stream Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "uploads") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/uploads">
                        <i class="fa fa-upload fa-lg fa-fw mr10"></i><?php echo __("Uploads Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/payments">
                        <i class="fa fa-credit-card fa-lg fa-fw mr10"></i><?php echo __("Payments Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "security") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/security">
                        <i class="fa fa-shield-alt fa-lg fa-fw mr10"></i><?php echo __("Security Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "limits") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/limits">
                        <i class="fa fa-tachometer-alt fa-lg fa-fw mr10"></i><?php echo __("Limits Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "analytics") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/analytics">
                        <i class="fa fa-chart-pie fa-lg fa-fw mr10"></i><?php echo __("Analytics Settings");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Settings -->

              <!-- Themes -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "themes") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/themes">
                  <i class="fa fa-desktop fa-lg fa-fw mr10" style="color: #5e72e4"></i><?php echo __("Themes");?>

                </a>
              </li>
              <!-- Themes -->

              <!-- Design -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "design") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/design">
                  <i class="fa fa-paint-brush fa-lg fa-fw mr10" style="color: #5e72e4"></i><?php echo __("Design");?>

                </a>
              </li>
              <!-- Design -->

              <!-- Languages -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "languages") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/languages">
                  <i class="fa fa-language fa-lg fa-fw mr10" style="color: #5e72e4"></i><?php echo __("Languages");?>

                </a>
              </li>
              <!-- Languages -->

              <!-- Countries -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "countries") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/countries">
                  <i class="fa fa-globe fa-lg fa-fw mr10" style="color: #5e72e4"></i><?php echo __("Countries");?>

                </a>
              </li>
              <!-- Countries -->

              <!-- Currencies -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "currencies") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/currencies">
                  <i class="fa fa-money-bill-alt fa-lg fa-fw mr10" style="color: #5e72e4"></i><?php echo __("Currencies");?>

                </a>
              </li>
              <!-- Currencies -->

              <!-- Genders -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "genders") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/genders">
                  <i class="fa fa-venus-mars fa-lg fa-fw mr10" style="color: #5e72e4"></i><?php echo __("Genders");?>

                </a>
              </li>
              <!-- Genders -->
            <?php }?>
          </ul>
        </div>
      </div>
      <!-- System -->

      <!-- Users -->
      <div class="card mb15">
        <div class="card-header block-title">
          <?php echo __("Users");?>

        </div>
        <div class="card-body with-nav">
          <ul class="side-nav">
            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
              <!-- Users -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users") {?>class="active" <?php }?>>
                <a href="#users" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "users") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-user fa-lg fa-fw mr10" style="color: #9C27B0"></i><?php echo __("Users");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "users") {?>show<?php }?>' id="users">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users">
                        <?php echo __("List Users");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == "moderators") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/moderators">
                        <?php echo __("List Moderators");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == "admins") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/admins">
                        <?php echo __("List Admins");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == "online") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/online">
                        <?php echo __("List Online");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == "banned") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/banned">
                        <?php echo __("List Banned");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Users -->
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
              <!-- Users Groups -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users_groups") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users_groups">
                  <i class="fa fa-users fa-lg fa-fw mr10" style="color: #9C27B0"></i><?php echo __("Users Groups");?>

                </a>
              </li>
              <!-- Users Groups -->
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
              <!-- Permissions Groups -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "permissions_groups") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/permissions_groups">
                  <i class="fa fa-key fa-lg fa-fw mr10" style="color: #9C27B0"></i><?php echo __("Permissions Groups");?>

                </a>
              </li>
              <!-- Permissions Groups -->
            <?php }?>
          </ul>
        </div>
      </div>
      <!-- Users -->


      <!-- Modules -->
      <div class="card mb15">
        <div class="card-header block-title">
          <?php echo __("Modules");?>

        </div>
        <div class="card-body with-nav">
          <ul class="side-nav">

            <!-- Posts -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "posts") {?>class="active" <?php }?>>
              <a href="#posts" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "posts") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-newspaper fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Posts");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "posts") {?>show<?php }?>' id="posts">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "posts" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/posts">
                      <?php echo __("List posts");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "posts" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/posts/categories">
                      <?php echo __("List Videos Categories");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Posts -->

            <!-- Pages -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages") {?>class="active" <?php }?>>
              <a href="#pages" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-flag fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Pages");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages") {?>show<?php }?>' id="pages">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pages">
                      <?php echo __("List Pages");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pages/categories">
                      <?php echo __("List Categories");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Pages -->

            <!-- Groups -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>class="active" <?php }?>>
              <a href="#groups" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-users fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Groups");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>show<?php }?>' id="groups">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/groups">
                      <?php echo __("List Groups");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/groups/categories">
                      <?php echo __("List Categories");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Groups -->

            <!-- Events -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "events") {?>class="active" <?php }?>>
              <a href="#events" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "events") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-calendar fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Events");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "events") {?>show<?php }?>' id="events">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "events" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events">
                      <?php echo __("List Events");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "events" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events/categories">
                      <?php echo __("List Categories");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Events -->

            <!-- Blogs -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs") {?>class="active" <?php }?>>
              <a href="#blogs" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs") {?>aria-expanded="true" <?php }?>>
                <i class="fab fa-blogger-b fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Blogs");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs") {?>show<?php }?>' id="blogs">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blogs">
                      <?php echo __("List Articles");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blogs/categories">
                      <?php echo __("List Categories");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Blogs -->

            <!-- Market -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "market") {?>class="active" <?php }?>>
              <a href="#market" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "market") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-shopping-bag fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Marketplace");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "market") {?>show<?php }?>' id="market">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "market" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/market">
                      <?php echo __("List Products");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "market" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/market/categories">
                      <?php echo __("List Categories");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Market -->

            <!-- Offers -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "offers") {?>class="active" <?php }?>>
              <a href="#offers" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "offers") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-tag fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Offers");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "offers") {?>show<?php }?>' id="offers">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "offers" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/offers">
                      <?php echo __("List Offers");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "offers" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/offers/categories">
                      <?php echo __("List Categories");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Offers -->

            <!-- Jobs -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "jobs") {?>class="active" <?php }?>>
              <a href="#jobs" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "jobs") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-briefcase fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Jobs");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "jobs") {?>show<?php }?>' id="jobs">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "jobs" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/jobs">
                      <?php echo __("List Jobs");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "jobs" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/jobs/categories">
                      <?php echo __("List Categories");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Jobs -->

            <!-- Forums -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums") {?>class="active" <?php }?>>
              <a href="#forums" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-comments fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Forums");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums") {?>show<?php }?>' id="forums">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums">
                      <?php echo __("List Forums");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums" && $_smarty_tpl->tpl_vars['sub_view']->value == "threads") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums/threads">
                      <?php echo __("List Threads");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums" && $_smarty_tpl->tpl_vars['sub_view']->value == "replies") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums/replies">
                      <?php echo __("List Replies");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Forums -->

            <!-- Movies -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "movies") {?>class="active" <?php }?>>
              <a href="#movies" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "movies") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-film fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Movies");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "movies") {?>show<?php }?>' id="movies">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "movies" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/movies">
                      <?php echo __("List Movies");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "movies" && $_smarty_tpl->tpl_vars['sub_view']->value == "genres") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/movies/genres">
                      <?php echo __("List Genres");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Movies -->

            <!-- Games -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "games") {?>class="active" <?php }?>>
              <a href="#games" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "games") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-gamepad fa-lg fa-fw mr10" style="color: #F44336"></i><?php echo __("Games");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "games") {?>show<?php }?>' id="games">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "games" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/games">
                      <?php echo __("List Games");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "games" && $_smarty_tpl->tpl_vars['sub_view']->value == "genres") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/games/genres">
                      <?php echo __("List Genres");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Games -->

          </ul>
        </div>
      </div>
      <!-- Modules -->

      <!-- Money -->
      <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
        <div class="card mb15">
          <div class="card-header block-title">
            <?php echo __("Money");?>

          </div>
          <div class="card-body with-nav">
            <ul class="side-nav">

              <!-- Ads -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads") {?>class="active" <?php }?>>
                <a href="#ads" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-bullseye fa-lg fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Ads");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads") {?>show<?php }?>' id="ads">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/ads">
                        <?php echo __("Ads Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads" && $_smarty_tpl->tpl_vars['sub_view']->value == "users_ads") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/ads/users_ads">
                        <?php echo __("List Users Ads");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads" && $_smarty_tpl->tpl_vars['sub_view']->value == "system_ads") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/ads/system_ads">
                        <?php echo __("List System Ads");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Ads -->

              <!-- Wallet -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "wallet") {?>class="active" <?php }?>>
                <a href="#wallet" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "wallet") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-wallet fa-lg fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Wallet");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "wallet") {?>show<?php }?>' id="wallet">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "wallet" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/wallet">
                        <?php echo __("Wallet Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "wallet" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/wallet/payments">
                        <?php if ($_smarty_tpl->tpl_vars['wallet_payments_insights']->value) {?><span class="float-end badge rounded-pill bg-danger"><?php echo $_smarty_tpl->tpl_vars['wallet_payments_insights']->value;?>
</span><?php }?>
                        <?php echo __("Payment Requests");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Wallet -->

              <!-- Pro System -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pro") {?>class="active" <?php }?>>
                <a href="#pro" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "pro") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-cubes fa-lg fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Pro System");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "pro") {?>show<?php }?>' id="pro">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pro" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pro">
                        <?php echo __("Pro Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pro" && $_smarty_tpl->tpl_vars['sub_view']->value == "packages") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pro/packages">
                        <?php echo __("List Packages");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pro" && $_smarty_tpl->tpl_vars['sub_view']->value == "subscribers") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pro/subscribers">
                        <?php echo __("List Subscribers");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pro" && $_smarty_tpl->tpl_vars['sub_view']->value == "earnings") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pro/earnings">
                        <?php echo __("Earnings");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Pro System -->

              <!-- Affiliates -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>class="active" <?php }?>>
                <a href="#affiliates" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-exchange-alt fa-lg fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Affiliates");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>show<?php }?>' id="affiliates">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/affiliates">
                        <?php echo __("Affiliates Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/affiliates/payments">
                        <?php if ($_smarty_tpl->tpl_vars['affiliates_payments_insights']->value) {?><span class="float-end badge rounded-pill bg-danger"><?php echo $_smarty_tpl->tpl_vars['affiliates_payments_insights']->value;?>
</span><?php }?>
                        <?php echo __("Payment Requests");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Affiliates -->

              <!-- Points -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>class="active" <?php }?>>
                <a href="#points" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-piggy-bank fa-lg fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Points System");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>show<?php }?>' id="points">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/points">
                        <?php echo __("Points Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/points/payments">
                        <?php if ($_smarty_tpl->tpl_vars['points_payments_insights']->value) {?><span class="float-end badge rounded-pill bg-danger"><?php echo $_smarty_tpl->tpl_vars['points_payments_insights']->value;?>
</span><?php }?>
                        <?php echo __("Payment Requests");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Points -->

              <!-- Funding -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "funding") {?>class="active" <?php }?>>
                <a href="#funding" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "funding") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-hand-holding-usd fa-lg fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Funding");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "funding") {?>show<?php }?>' id="funding">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "funding" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/funding">
                        <?php echo __("Funding Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "funding" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/funding/payments">
                        <?php if ($_smarty_tpl->tpl_vars['funding_payments_insights']->value) {?><span class="float-end badge rounded-pill bg-danger"><?php echo $_smarty_tpl->tpl_vars['funding_payments_insights']->value;?>
</span><?php }?>
                        <?php echo __("Payment Requests");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "funding" && $_smarty_tpl->tpl_vars['sub_view']->value == "requests") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/funding/requests">
                        <?php echo __("Funding Requests");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Funding -->

              <!-- Content Monetization -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "monetization") {?>class="active" <?php }?>>
                <a href="#monetization" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "monetization") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-coins fa-lg fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Content Monetization");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "monetization") {?>show<?php }?>' id="monetization">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "monetization" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/monetization">
                        <?php echo __("Monetization Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "monetization" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/monetization/payments">
                        <?php if ($_smarty_tpl->tpl_vars['monetization_payments_insights']->value) {?><span class="float-end badge rounded-pill bg-danger"><?php echo $_smarty_tpl->tpl_vars['monetization_payments_insights']->value;?>
</span><?php }?>
                        <?php echo __("Payment Requests");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Content Monetization -->

              <!-- Tips -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tips") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/tips">
                  <i class="fa fa-dollar-sign fa-lg fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Tips");?>

                </a>
              </li>
              <!-- Tips -->

            </ul>
          </div>
        </div>
      <?php }?>
      <!-- Money -->

      <!-- Payments -->
      <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
        <div class="card mb15">
          <div class="card-header block-title">
            <?php echo __("Payments");?>

          </div>
          <div class="card-body with-nav">
            <ul class="side-nav">

              <!-- CoinPayments -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "coinpayments") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/coinpayments">
                  <i class="fab fa-bitcoin fa-lg fa-fw mr10" style="color: #4CAF50"></i><?php echo __("CoinPayments");?>

                </a>
              </li>
              <!-- CoinPayments -->

              <!-- Bank Receipts -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "bank") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/bank">
                  <?php if ($_smarty_tpl->tpl_vars['bank_transfers_insights']->value) {?><span class="float-end badge rounded-pill bg-danger"><?php echo $_smarty_tpl->tpl_vars['bank_transfers_insights']->value;?>
</span><?php }?>
                  <i class="fa fa-university fa-lg fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Bank Receipts");?>

                </a>
              </li>
              <!-- Bank Receipts -->

            </ul>
          </div>
        </div>
      <?php }?>
      <!-- Money -->

      <!-- Developers -->
      <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
        <div class="card mb15">
          <div class="card-header block-title">
            <?php echo __("Developers");?>

          </div>
          <div class="card-body with-nav">
            <ul class="side-nav">

              <!-- Developers -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers") {?>class="active" <?php }?>>
                <a href="#developers" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-cubes fa-lg fa-fw mr10" style="color: #ffc107"></i><?php echo __("Developers");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers") {?>show<?php }?>' id="developers">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/developers">
                        <?php echo __("Developers Settings");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers" && $_smarty_tpl->tpl_vars['sub_view']->value == "apps") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/developers/apps">
                        <?php echo __("List Apps");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/developers/categories">
                        <?php echo __("List Categories");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Developers -->

            </ul>
          </div>
        </div>
      <?php }?>
      <!-- Developers -->

      <!-- Tools -->
      <div class="card mb15">
        <div class="card-header block-title">
          <?php echo __("Tools");?>

        </div>
        <div class="card-body with-nav">
          <ul class="side-nav">

            <!-- Reports -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "reports") {?>class="active" <?php }?>>
              <a href="#reports" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "reports") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-exclamation-triangle fa-lg fa-fw mr10" style="color: #03A9F4"></i><?php echo __("Reports");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "reports") {?>show<?php }?>' id="reports">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "reports" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/reports">
                      <?php if ($_smarty_tpl->tpl_vars['reports_insights']->value) {?><span class="float-end badge rounded-pill bg-danger"><?php echo $_smarty_tpl->tpl_vars['reports_insights']->value;?>
</span><?php }?>
                      <?php echo __("List reports");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "reports" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/reports/categories">
                      <?php echo __("List Categories");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Reports -->

            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
              <!-- Blacklist -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blacklist") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blacklist">
                  <i class="fa fa-minus-circle fa-lg fa-fw mr10" style="color: #03A9F4"></i><?php echo __("Blacklist");?>

                </a>
              </li>
              <!-- Blacklist -->
            <?php }?>

            <!-- Verification -->
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification") {?>class="active" <?php }?>>
              <a href="#verification" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification") {?>aria-expanded="true" <?php }?>>
                <i class="fa fa-check-circle fa-lg fa-fw mr10" style="color: #03A9F4"></i><?php echo __("Verification");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification") {?>show<?php }?>' id="verification">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/verification">
                      <?php if ($_smarty_tpl->tpl_vars['verification_requests_insights']->value) {?><span class="float-end badge rounded-pill bg-danger"><?php echo $_smarty_tpl->tpl_vars['verification_requests_insights']->value;?>
</span><?php }?>
                      <?php echo __("List Requests");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification" && $_smarty_tpl->tpl_vars['sub_view']->value == "users") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/verification/users">
                      <?php echo __("List Verified Users");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification" && $_smarty_tpl->tpl_vars['sub_view']->value == "pages") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/verification/pages">
                      <?php echo __("List Verified Pages");?>

                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Verification -->

            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
              <!-- Tools -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools") {?>class="active" <?php }?>>
                <a href="#tools" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools") {?>aria-expanded="true" <?php }?>>
                  <i class="fa fa-toolbox fa-lg fa-fw mr10" style="color: #03A9F4"></i><?php echo __("Tools");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools") {?>show<?php }?>' id="tools">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools" && $_smarty_tpl->tpl_vars['sub_view']->value == "faker") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/tools/faker">
                        <?php echo __("Fake Generator");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools" && $_smarty_tpl->tpl_vars['sub_view']->value == "auto-connect") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/tools/auto-connect">
                        <?php echo __("Auto Connect");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools" && $_smarty_tpl->tpl_vars['sub_view']->value == "garbage-collector") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/tools/garbage-collector">
                        <?php echo __("Garbage Collector");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools" && $_smarty_tpl->tpl_vars['sub_view']->value == "backups") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/tools/backups">
                        <?php echo __("Backup Database & Files");?>

                      </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools" && $_smarty_tpl->tpl_vars['sub_view']->value == "reset") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/tools/reset">
                        <?php echo __("Factory Reset");?>

                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- Tools -->
            <?php }?>

          </ul>
        </div>
      </div>
      <!-- Tools -->

      <!-- Customization -->
      <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
        <div class="card mb15">
          <div class="card-header block-title">
            <?php echo __("Customization");?>

          </div>
          <div class="card-body with-nav">
            <ul class="side-nav">

              <!-- Custom Fields -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "custom_fields") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/custom_fields">
                  <i class="fa fa-bars fa-lg fa-fw mr10" style="color: #FF5722"></i><?php echo __("Custom Fields");?>

                </a>
              </li>
              <!-- Custom Fields -->

              <!-- Static Pages -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "static") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/static">
                  <i class="fa fa-file fa-lg fa-fw mr10" style="color: #FF5722"></i><?php echo __("Static Pages");?>

                </a>
              </li>
              <!-- Static Pages -->

              <!-- Colored Posts -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "colored_posts") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/colored_posts">
                  <i class="fa fa-palette fa-lg fa-fw mr10" style="color: #FF5722"></i><?php echo __("Colored Posts");?>

                </a>
              </li>
              <!-- Colored Posts -->

              <!-- Widgets -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "widgets") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/widgets">
                  <i class="fa fa-puzzle-piece fa-lg fa-fw mr10" style="color: #FF5722"></i><?php echo __("Widgets");?>

                </a>
              </li>
              <!-- Widgets -->

              <!-- Reactions -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "reactions") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/reactions">
                  <i class="fa fa-smile fa-lg fa-fw mr10" style="color: #FF5722"></i><?php echo __("Reactions");?>

                </a>
              </li>
              <!-- Reactions -->

              <!-- Emojis -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "emojis") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/emojis">
                  <i class="fa fa-grin-tears fa-lg fa-fw mr10" style="color: #FF5722"></i><?php echo __("Emojis");?>

                </a>
              </li>
              <!-- Emojis -->

              <!-- Stickers -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "stickers") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/stickers">
                  <i class="fa fa-hand-peace fa-lg fa-fw mr10" style="color: #FF5722"></i><?php echo __("Stickers");?>

                </a>
              </li>
              <!-- Stickers -->

              <!-- Gifts -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "gifts") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/gifts">
                  <i class="fa fa-gift fa-lg fa-fw mr10" style="color: #FF5722"></i><?php echo __("Gifts");?>

                </a>
              </li>
              <!-- Gifts -->

            </ul>
          </div>
        </div>
      <?php }?>
      <!-- Customization -->

      <!-- Reach -->
      <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
        <div class="card mb15">
          <div class="card-header block-title">
            <?php echo __("Reach");?>

          </div>
          <div class="card-body with-nav">
            <ul class="side-nav">

              <!-- Announcements -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "announcements") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/announcements">
                  <i class="fa fa-bullhorn fa-lg fa-fw mr10" style="color: #009688"></i><?php echo __("Announcements");?>

                </a>
              </li>
              <!-- Announcements -->

              <!-- Notifications -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "notifications") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/notifications">
                  <i class="fa fa-bell fa-lg fa-fw mr10" style="color: #009688"></i><?php echo __("Mass Notifications");?>

                </a>
              </li>
              <!-- Notifications -->

              <!-- Newsletter -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "newsletter") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/newsletter">
                  <i class="fa fa-paper-plane fa-lg fa-fw mr10" style="color: #009688"></i><?php echo __("Newsletter");?>

                </a>
              </li>
              <!-- Newsletter -->

            </ul>
          </div>
        </div>
      <?php }?>
      <!-- Reach -->

      <!-- Sngine -->
      <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
        <div class="card">
          <div class="card-header block-title">
            <?php echo __("Sngine");?>

          </div>
          <div class="card-body with-nav">
            <ul class="side-nav">

              <!-- Changelog -->
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "changelog") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/changelog">
                  <i class="fa fa-stopwatch fa-lg fa-fw mr10" style="color: #795548"></i><?php echo __("Changelog");?>

                </a>
              </li>
              <!-- Changelog -->

              <!-- Build -->
              <li>
                <div class="static">
                  <i class="fa fa-copyright fa-lg fa-fw mr10" style="color: #795548"></i><?php echo __("Build");?>
 v<?php echo $_smarty_tpl->tpl_vars['system']->value['system_version'];?>

                </div>
              </li>
              <!-- Build -->

            </ul>
          </div>
        </div>
      <?php }?>
      <!-- Sngine -->

    </div>
    <!-- left panel -->

    <!-- right panel -->
    <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">
      <?php $_smarty_tpl->_subTemplateRender("file:admin.".((string)$_smarty_tpl->tpl_vars['view']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </div>
    <!-- right panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
