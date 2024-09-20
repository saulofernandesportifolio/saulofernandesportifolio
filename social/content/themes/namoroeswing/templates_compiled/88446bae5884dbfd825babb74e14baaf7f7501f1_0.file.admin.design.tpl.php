<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:43:51
  from '/var/www/html/social/content/themes/namoroeswing/templates/admin.design.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e45db7f3a365_09831951',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88446bae5884dbfd825babb74e14baaf7f7501f1' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/admin.design.tpl',
      1 => 1725499306,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 9,
  ),
),false)) {
function content_66e45db7f3a365_09831951 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
  <div class="card-header with-icon">
    <i class="fa fa-paint-brush mr10"></i><?php echo __("Design");?>

  </div>
  <form class="js_ajax-forms" data-url="admin/design.php">
    <div class="card-body">
      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"fluid",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, false);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo __("Fluid Design");?>
</div>
          <div class="form-text d-none d-sm-block"><?php echo __("Turn the full width containers On and Off");?>
</div>
        </div>
        <div class="text-end">
          <label class="switch" for="fluid_design">
            <input type="checkbox" name="fluid_design" id="fluid_design" <?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"dark_light",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo __("Night Mode is Default");?>
</div>
          <div class="form-text d-none d-sm-block">
            <?php echo __("Make the night mode is the default mode of your website");?>

          </div>
        </div>
        <div class="text-end">
          <label class="switch" for="system_theme_night_on">
            <input type="checkbox" name="system_theme_night_on" id="system_theme_night_on" <?php if ($_smarty_tpl->tpl_vars['system']->value['system_theme_night_on']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"settings",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo __("Users Can Change Mode");?>
</div>
          <div class="form-text d-none d-sm-block">
            <?php echo __("Allow users to select between day and night mode");?>

          </div>
        </div>
        <div class="text-end">
          <label class="switch" for="system_theme_mode_select">
            <input type="checkbox" name="system_theme_mode_select" id="system_theme_mode_select" <?php if ($_smarty_tpl->tpl_vars['system']->value['system_theme_mode_select']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="divider"></div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Logo");?>
 (<?php echo __("Light Mode");?>
)
        </label>
        <div class="col-md-9">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['system_logo'] == '') {?>
            <div class="x-image">
              <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo __("Remove");?>
'>

              </button>
              <div class="x-image-loader">
                <div class="progress x-progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
              <input type="hidden" class="js_x-image-input" name="system_logo" value="">
            </div>
          <?php } else { ?>
            <div class="x-image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo'];?>
')">
              <button type="button" class="btn-close js_x-image-remover" title='<?php echo __("Remove");?>
'>

              </button>
              <div class="x-image-loader">
                <div class="progress x-progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
              <input type="hidden" class="js_x-image-input" name="system_logo" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo'];?>
">
            </div>
          <?php }?>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Logo");?>
 (<?php echo __("Dark Mode");?>
)
        </label>
        <div class="col-md-9">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['system_logo_dark'] == '') {?>
            <div class="x-image">
              <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo __("Remove");?>
'>

              </button>
              <div class="x-image-loader">
                <div class="progress x-progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
              <input type="hidden" class="js_x-image-input" name="system_logo_dark" value="">
            </div>
          <?php } else { ?>
            <div class="x-image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo_dark'];?>
')">
              <button type="button" class="btn-close js_x-image-remover" title='<?php echo __("Remove");?>
'>

              </button>
              <div class="x-image-loader">
                <div class="progress x-progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
              <input type="hidden" class="js_x-image-input" name="system_logo_dark" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo_dark'];?>
">
            </div>
          <?php }?>
        </div>
      </div>

      <div class="divider"></div>

      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo __("Default Favicon");?>
</div>
          <div class="form-text d-none d-sm-block">
            <?php echo __("Use the default");?>
 (<a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/favicon.png"><?php echo __("preview");?>
</a>) (<?php echo __("Disable it to use your custom uploaded image");?>
)
          </div>
        </div>
        <div class="text-end">
          <label class="switch" for="system_favicon_default">
            <input type="checkbox" name="system_favicon_default" id="system_favicon_default" <?php if ($_smarty_tpl->tpl_vars['system']->value['system_favicon_default']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Custom Favicon");?>

        </label>
        <div class="col-md-9">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['system_favicon'] == '') {?>
            <div class="x-image">
              <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo __("Remove");?>
'>

              </button>
              <div class="x-image-loader">
                <div class="progress x-progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
              <input type="hidden" class="js_x-image-input" name="system_favicon" value="">
            </div>
          <?php } else { ?>
            <div class="x-image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_favicon'];?>
')">
              <button type="button" class="btn-close js_x-image-remover" title='<?php echo __("Remove");?>
'>

              </button>
              <div class="x-image-loader">
                <div class="progress x-progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
              <input type="hidden" class="js_x-image-input" name="system_favicon" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_favicon'];?>
">
            </div>
          <?php }?>
        </div>
      </div>

      <div class="divider"></div>

      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"social_share",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo __("Default OG-Image");?>
</div>
          <div class="form-text d-none d-sm-block">
            <?php echo __("Use the default");?>
 (<a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/og-image.jpg"><?php echo __("preview");?>
</a>) (<?php echo __("Disable it to use your custom uploaded image");?>
)
          </div>
        </div>
        <div class="text-end">
          <label class="switch" for="system_ogimage_default">
            <input type="checkbox" name="system_ogimage_default" id="system_ogimage_default" <?php if ($_smarty_tpl->tpl_vars['system']->value['system_ogimage_default']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Custom OG-Image");?>

        </label>
        <div class="col-md-9">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['system_ogimage'] == '') {?>
            <div class="x-image">
              <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo __("Remove");?>
'>

              </button>
              <div class="x-image-loader">
                <div class="progress x-progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
              <input type="hidden" class="js_x-image-input" name="system_ogimage" value="">
            </div>
          <?php } else { ?>
            <div class="x-image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_ogimage'];?>
')">
              <button type="button" class="btn-close js_x-image-remover" title='<?php echo __("Remove");?>
'>

              </button>
              <div class="x-image-loader">
                <div class="progress x-progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
              <input type="hidden" class="js_x-image-input" name="system_ogimage" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_ogimage'];?>
">
            </div>
          <?php }?>
          <div class="form-text">
            <?php echo __("The perfect size for your og-image should be (wdith: 590px & height: 300px)");?>

          </div>
        </div>
      </div>

      <div class="divider"></div>

      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"playstore",'width'=>"40px",'height'=>"40px"), 0, true);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo __("Google Play Store Badge");?>
</div>
          <div class="form-text d-none d-sm-block"><?php echo __("Show Google Play Store badge on the landing page");?>
</div>
        </div>
        <div class="text-end">
          <label class="switch" for="play_store_badge_enabled">
            <input type="checkbox" name="play_store_badge_enabled" id="play_store_badge_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['play_store_badge_enabled']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Google Play Store Link");?>

        </label>
        <div class="col-md-9">
          <input type="text" class="form-control" name="play_store_link" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['play_store_link'];?>
">
          <div class="form-text">
            <?php echo __("The app link on Google Play Store");?>

          </div>
        </div>
      </div>

      <div class="divider"></div>

      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"appgallery",'width'=>"40px",'height'=>"40px"), 0, true);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo __("Huawei AppGallery Badge");?>
</div>
          <div class="form-text d-none d-sm-block"><?php echo __("Show Huawei AppGallery badge on the landing page");?>
</div>
        </div>
        <div class="text-end">
          <label class="switch" for="appgallery_badge_enabled">
            <input type="checkbox" name="appgallery_badge_enabled" id="appgallery_badge_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['appgallery_badge_enabled']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Huawei AppGallery Link");?>

        </label>
        <div class="col-md-9">
          <input type="text" class="form-control" name="appgallery_store_link" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['appgallery_store_link'];?>
">
          <div class="form-text">
            <?php echo __("The app link on Huawei AppGallery");?>

          </div>
        </div>
      </div>

      <div class="divider"></div>

      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"appstore",'width'=>"40px",'height'=>"40px"), 0, true);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo __("Apple App Store Badge");?>
</div>
          <div class="form-text d-none d-sm-block"><?php echo __("Show Apple App Store badge on the landing page");?>
</div>
        </div>
        <div class="text-end">
          <label class="switch" for="app_store_badge_enabled">
            <input type="checkbox" name="app_store_badge_enabled" id="app_store_badge_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['app_store_badge_enabled']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Apple App Store Link");?>

        </label>
        <div class="col-md-9">
          <input type="text" class="form-control" name="app_store_link" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['app_store_link'];?>
">
          <div class="form-text">
            <?php echo __("The app link on Apple App Store");?>

          </div>
        </div>
      </div>

      <div class="divider"></div>

      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"themes_switcher",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo __("Enable Customization");?>
</div>
          <div class="form-text d-none d-sm-block"><?php echo __("Turn the customization On and Off");?>
</div>
        </div>
        <div class="text-end">
          <label class="switch" for="css_customized">
            <input type="checkbox" name="css_customized" id="css_customized" <?php if ($_smarty_tpl->tpl_vars['system']->value['css_customized']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Background Color");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_background" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_background'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_background'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Link Color");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_link_color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_link_color'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_link_color'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Header Color");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_header" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_header'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_header'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Header Search Background");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_header_search" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_header_search'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_header_search'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Header Search Font");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_header_search_color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_header_search_color'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_header_search_color'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Button Primary");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_btn_primary" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_btn_primary'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_btn_primary'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Header Icons");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_header_icons" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_header_icons'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_header_icons'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Header Icons (Night Mode)");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_header_icons_night" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_header_icons_night'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_header_icons_night'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Main Icons");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_main_icons" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_main_icons'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_main_icons'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Main Icons (Night Mode)");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_main_icons_night" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_main_icons_night'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_main_icons_night'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Action Icons");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_action_icons" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_action_icons'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_action_icons'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Action Icons (Night Mode)");?>

        </label>
        <div class="col-md-9">
          <div class="input-group js_colorpicker">
            <input type="text" class="form-control form-control-color" name="css_action_icons_night" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_action_icons_night'];?>
" />
            <input type="color" class="form-control form-control-color" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['css_action_icons_night'];?>
" />
          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Custom CSS");?>

        </label>
        <div class="col-md-9">
          <textarea class="form-control" rows="10" name="css_custome_css" id="custom-css"><?php echo $_smarty_tpl->tpl_vars['system']->value['css_custome_css'];?>
</textarea>
          <div class="form-text">
            <?php echo __("Header Custom CSS");?>

          </div>
        </div>
      </div>

      <div class="divider"></div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Header Custom JavaScript");?>

        </label>
        <div class="col-md-9">
          <textarea name="custome_js_header" id="custome_js_header"><?php echo $_smarty_tpl->tpl_vars['system']->value['custome_js_header'];?>
</textarea>
          <div class="form-text">
            <?php echo __("The code will be added in head tag");?>

          </div>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo __("Footer Custom JavaScript");?>

        </label>
        <div class="col-md-9">
          <textarea name="custome_js_footer" id="custome_js_footer"><?php echo $_smarty_tpl->tpl_vars['system']->value['custome_js_footer'];?>
</textarea>
          <div class="form-text">
            <?php echo __("The code will be added at the end of body tag");?>

          </div>
        </div>
      </div>

      <!-- error -->
      <div class="alert alert-danger mt15 mb0 x-hidden"></div>
      <!-- error -->
    </div>
    <div class="card-footer text-end">
      <button type="submit" class="btn btn-primary"><?php echo __("Save Changes");?>
</button>
    </div>
  </form>

</div><?php }
}
