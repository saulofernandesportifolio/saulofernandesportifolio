<?php
/* Smarty version 4.5.3, created on 2024-09-13 20:29:16
  from '/var/www/html/social/content/themes/namoroeswing/templates/settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4a09c7ed4e5_20803600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59dc9c1f46023f97532a8b04e2add627312179a9' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/settings.tpl',
      1 => 1726259353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:__svg_icons.tpl' => 19,
    'file:settings.account.tpl' => 1,
    'file:settings.profile.tpl' => 1,
    'file:settings.security.tpl' => 1,
    'file:settings.privacy.tpl' => 1,
    'file:settings.notifications.tpl' => 1,
    'file:settings.accounts.tpl' => 1,
    'file:settings.linked.tpl' => 1,
    'file:settings.membership.tpl' => 1,
    'file:settings.invitations.tpl' => 1,
    'file:settings.affiliates.tpl' => 1,
    'file:settings.points.tpl' => 1,
    'file:settings.funding.tpl' => 1,
    'file:settings.monetization.tpl' => 1,
    'file:settings.coinpayments.tpl' => 1,
    'file:settings.bank.tpl' => 1,
    'file:settings.verification.tpl' => 1,
    'file:settings.apps.tpl' => 1,
    'file:settings.blocking.tpl' => 1,
    'file:settings.information.tpl' => 1,
    'file:settings.delete.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_66e4a09c7ed4e5_20803600 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> mt20 sg-offcanvas">
  <div class="row">

    <!-- left panel -->
    <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar">
      <div class="card">
        <div class="card-body with-nav">
          <ul class="side-nav">
            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"settings",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, false);
?>
                <?php echo __("Account Settings");?>

              </a>
            </li>

            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>class="active" <?php }?>>
              <a href="#info-settings" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>aria-expanded="true" <?php }?>>
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Edit Profile");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>show<?php }?>' id="info-settings">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile">
                      <?php echo __("Basic");?>

                    </a>
                  </li>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['work_info_enabled']) {?>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "work") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/work">
                        <?php echo __("Work");?>

                      </a>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['location_info_enabled']) {?>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "location") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/location">
                        <?php echo __("Location");?>

                      </a>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['education_info_enabled']) {?>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "education") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/education">
                        <?php echo __("Education");?>

                      </a>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['other']) {?>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "other") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/other">
                        <?php echo __("Other");?>

                      </a>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['social_info_enabled']) {?>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "social") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/social">
                        <?php echo __("Social Links");?>

                      </a>
                    </li>
                  <?php }?>
                  <!--<?php if ($_smarty_tpl->tpl_vars['system']->value['system_profile_background_enabled']) {?>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "design") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/design">
                        <?php echo __("Design");?>

                      </a>
                    </li>
                  <?php }?>-->
                </ul>
              </div>
            </li>

            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "security") {?>class="active" <?php }?>>
              <a href="#security-settings" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "security") {?>aria-expanded="true" <?php }?>>
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"security",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Security Settings");?>

              </a>
              <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "security") {?>show<?php }?>' id="security-settings">
                <ul>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "security" && $_smarty_tpl->tpl_vars['sub_view']->value == "password") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/security/password">
                      <?php echo __("Password");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "security" && $_smarty_tpl->tpl_vars['sub_view']->value == "sessions") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/security/sessions">
                      <?php echo __("Manage Sessions");?>

                    </a>
                  </li>
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['two_factor_enabled']) {?>
                  <!--<li <?php if ($_smarty_tpl->tpl_vars['view']->value == "security" && $_smarty_tpl->tpl_vars['sub_view']->value == "two-factor") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/security/two-factor">
                        <?php echo __("Two-Factor Authentication");?>

                      </a>
                    </li>-->
                  <?php }?>
                </ul>
              </div>
            </li>

            <div class="divider mtb5"></div>

            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "notifications") {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/notifications">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"notifications",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Notifications");?>

              </a>
            </li>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['verification_requests']) {?>
            <!-- <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/verification">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verification",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Verification");?>

                </a>
              </li>-->
            <?php }?>

            <div class="divider mtb5"></div>

            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "privacy") {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/privacy">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"privacy",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Privacy");?>

              </a>
            </li>

            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blocking") {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/blocking">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"blocking",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Blocking");?>

              </a>
            </li>

            <div class="divider mtb5"></div>

           <!--<li <?php if ($_smarty_tpl->tpl_vars['view']->value == "accounts") {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/accounts">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"user_add",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                <?php echo __("Connected Accounts");?>

              </a>
            </li>-->

            <?php if ($_smarty_tpl->tpl_vars['system']->value['social_login_enabled']) {?>
              <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['google_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['wordpress_login_enabled']) {?>
                <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "linked") {?>class="active" <?php }?>>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/linked">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linked_accounts",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    <?php echo __("Linked Accounts");?>

                  </a>
                </li>
              <?php }?>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_monetize_content'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_invite_users'] || $_smarty_tpl->tpl_vars['system']->value['affiliates_enabled'] || $_smarty_tpl->tpl_vars['system']->value['points_enabled'] || $_smarty_tpl->tpl_vars['user']->value->_data['can_raise_funding'] || $_smarty_tpl->tpl_vars['system']->value['coinpayments_enabled'] || $_smarty_tpl->tpl_vars['system']->value['bank_transfers_enabled']) {?>
              <div class="divider mtb5"></div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "membership") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/membership">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"membership",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Membership");?>

                </a>
              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_monetize_content']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "monetization") {?>class="active" <?php }?>>
                <a href="#monetization-settings" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "monetization") {?>aria-expanded="true" <?php }?>>
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Monetization");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "monetization") {?>show<?php }?>' id="monetization-settings">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "monetization" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/monetization">
                        <?php echo __("Settings");?>

                      </a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['monetization_money_withdraw_enabled']) {?>
                      <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "monetization" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/monetization/payments">
                          <?php echo __("Payments");?>

                        </a>
                      </li>
                    <?php }?>
                  </ul>
                </div>
              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_invite_users']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "invitations") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/invitations">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"invitation",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Invitations");?>

                </a>
              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['affiliates_enabled']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>class="active" <?php }?>>
                <a href="#affiliates-settings" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>aria-expanded="true" <?php }?>>
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"affiliates",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Affiliates");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>show<?php }?>' id="affiliates-settings">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/affiliates">
                        <?php echo __("My Affiliates");?>

                      </a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['affiliates_money_withdraw_enabled']) {?>
                      <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/affiliates/payments">
                          <?php echo __("Payments");?>

                        </a>
                      </li>
                    <?php }?>
                  </ul>
                </div>
              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['points_enabled']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>class="active" <?php }?>>
                <a href="#points-settings" data-bs-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>aria-expanded="true" <?php }?>>
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"points",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Points");?>

                </a>
                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>show<?php }?>' id="points-settings">
                  <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/points">
                        <?php echo __("My Points");?>

                      </a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['points_money_withdraw_enabled']) {?>
                      <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/points/payments">
                          <?php echo __("Payments");?>

                        </a>
                      </li>
                    <?php }?>
                  </ul>
                </div>
              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_raise_funding']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "funding") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/funding">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"funding",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Funding");?>

                </a>
              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['coinpayments_enabled']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "coinpayments") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/coinpayments">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"coinpayments",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("CoinPayments");?>

                </a>
              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['bank_transfers_enabled']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "bank") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/bank">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"bank",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Bank Transfers");?>

                </a>
              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['download_info_enabled'] || $_smarty_tpl->tpl_vars['system']->value['delete_accounts_enabled']) {?>
              <div class="divider mtb5"></div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['download_info_enabled']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "information") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/information">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"user_information",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Your Information");?>

                </a>
              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['delete_accounts_enabled']) {?>
              <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "delete") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/delete">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"delete_user",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                  <?php echo __("Delete Account");?>

                </a>
              </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
    <!-- left panel -->

    <!-- right panel -->
    <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">
      <div class="card">
        <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.account.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.profile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "security") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.security.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "privacy") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.privacy.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "notifications") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "accounts") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.accounts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "linked") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.linked.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "membership") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.membership.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "invitations") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.invitations.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.affiliates.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "points") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.points.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "funding") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.funding.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "monetization") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.monetization.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "coinpayments") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.coinpayments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "bank") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.bank.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "verification") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.verification.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "apps") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.apps.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "blocking") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.blocking.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "information") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.information.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "delete") {?>
          <?php $_smarty_tpl->_subTemplateRender('file:settings.delete.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>
      </div>
    </div>
    <!-- right panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
