<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:19:00
  from '/var/www/html/social/content/themes/namoroeswing/templates/admin.permissions_groups.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e457e48a5d50_78938958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63f1947b885f32fe66ffe43c66e79baf4ae6d775' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/admin.permissions_groups.tpl',
      1 => 1725499294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 58,
  ),
),false)) {
function content_66e457e48a5d50_78938958 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
  <div class="card-header with-icon">
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/permissions_groups/add" class="btn btn-md btn-primary">
          <i class="fa fa-key mr5"></i><?php echo __("Add New Group");?>

        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add" || $_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/permissions_groups" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Go Back");?>

        </a>
      </div>
    <?php }?>
    <i class="fa fa-key mr10"></i><?php echo __("Permissions Groups");?>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?> &rsaquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['permissions_group_title'];
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "add") {?> &rsaquo; <?php echo __("Add New Group");
}?>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>

    <div class="card-body">
      <!-- System Permissions Groups (Users/Verified) -->
      <h6 class="card-title mb20"><?php echo __("System Permissions Groups");?>
</h6>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th><?php echo __("ID");?>
</th>
              <th><?php echo __("Title");?>
</th>
              <th><?php echo __("Actions");?>
</th>
            </tr>
          </thead>
          <tbody>
            <!-- Users -->
            <tr>
              <td>1</td>
              <td><?php echo __("Users Permissions");?>
</td>
              <td>
                <a data-bs-toggle="tooltip" title='<?php echo __("Edit");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/permissions_groups/edit/users" class="btn btn-sm btn-icon btn-rounded btn-primary">
                  <i class="fa fa-pencil-alt"></i>
                </a>
              </td>
            </tr>
            <!-- Users -->
            <!-- Verified -->
            <tr>
              <td>2</td>
              <td><?php echo __("Verified Permissions");?>
</td>
              <td>
                <a data-bs-toggle="tooltip" title='<?php echo __("Edit");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/permissions_groups/edit/verified" class="btn btn-sm btn-icon btn-rounded btn-primary">
                  <i class="fa fa-pencil-alt"></i>
                </a>
              </td>
            </tr>
            <!-- Verified -->
          </tbody>
        </table>
      </div>
      <!-- System Permissions Groups (Users/Verified) -->

      <div class="divider"></div>

      <!-- Custom Permissions Groups -->
      <h6 class="card-title mb20"><?php echo __("Custom Permissions Groups");?>
</h6>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover js_dataTable">
          <thead>
            <tr>
              <th><?php echo __("ID");?>
</th>
              <th><?php echo __("Title");?>
</th>
              <th><?php echo __("Actions");?>
</th>
            </tr>
          </thead>
          <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
              <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['permissions_group_id'];?>
</td>
                <td>
                  <?php echo $_smarty_tpl->tpl_vars['row']->value['permissions_group_title'];?>

                </td>
                <td>
                  <a data-bs-toggle="tooltip" title='<?php echo __("Edit");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/permissions_groups/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['permissions_group_id'];?>
" class="btn btn-sm btn-icon btn-rounded btn-primary">
                    <i class="fa fa-pencil-alt"></i>
                  </a>
                  <button data-bs-toggle="tooltip" title='<?php echo __("Delete");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="permissions_group" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['permissions_group_id'];?>
">
                    <i class="fa fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </tbody>
        </table>
      </div>
      <!-- Custom Permissions Groups -->
    </div>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add") {?>

    <form class="js_ajax-forms" data-url="admin/permissions_groups.php?do=add">
      <div class="card-body">
        <div class="heading-small mb20">
          <?php echo __("Grouo Info");?>

        </div>
        <div class="pl-md-4">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo __("Group Title");?>

            </label>
            <div class="col-md-9">
              <input class="form-control" name="title">
            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Modules Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Pages Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pages",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, false);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Pages");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Create Pages");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="pages_permission">
                <input type="checkbox" name="pages_permission" id="pages_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Pages Permission -->

          <!-- Groups Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Groups");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Create Groups");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="groups_permission">
                <input type="checkbox" name="groups_permission" id="groups_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Groups Permission -->

          <!-- Events Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Events");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Create Events");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="events_permission">
                <input type="checkbox" name="events_permission" id="events_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Events Permission -->

          <!-- Blogs Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"blogs",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Blogs");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Write Articles");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="blogs_permission">
                <input type="checkbox" name="blogs_permission" id="blogs_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Blogs Permission -->

          <!-- Market Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"market",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Market");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Sell Products");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="market_permission">
                <input type="checkbox" name="market_permission" id="market_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Market Permission -->

          <!-- Forums Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"forums",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Forums");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Threads/Replies");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="forums_permission">
                <input type="checkbox" name="forums_permission" id="forums_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Forums Permission -->

          <!-- Movies Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"movies",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Movies");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Watch Movies");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="movies_permission">
                <input type="checkbox" name="movies_permission" id="movies_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Movies Permission -->

          <!-- Games Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"games",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Games");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Play Games");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="games_permission">
                <input type="checkbox" name="games_permission" id="games_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Games Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Features Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Gifts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"gifts",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Gifts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Send Gifts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="gifts_permission">
                <input type="checkbox" name="gifts_permission" id="gifts_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Gifts Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Posts Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Blogs Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"blogs",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Blogs");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Read Articles");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="blogs_permission_read">
                <input type="checkbox" name="blogs_permission_read" id="blogs_permission_read">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Blogs Permission -->

          <!-- Videos Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Videos");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Watch Videos");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="videos_permission_read">
                <input type="checkbox" name="videos_permission_read" id="videos_permission_read">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Videos Permission -->

          <!-- Stories Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"24_hours",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Stories");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Stories");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="stories_permission">
                <input type="checkbox" name="stories_permission" id="stories_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Stories Permission -->

          <!-- Colored Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"posts_colored",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Colored Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Colored Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="colored_posts_permission">
                <input type="checkbox" name="colored_posts_permission" id="colored_posts_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Colored Posts Permission -->

          <!-- Feelings/Activity Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"smile",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Feelings/Activity Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Feelings/Activity Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="activity_posts_permission">
                <input type="checkbox" name="activity_posts_permission" id="activity_posts_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Feelings/Activity Posts Permission -->

          <!-- Polls Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"polls",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Polls Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Polls Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="polls_posts_permission">
                <input type="checkbox" name="polls_posts_permission" id="polls_posts_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Polls Posts Permission -->

          <!-- Geolocation Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Geolocation Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Geolocation Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="geolocation_posts_permission">
                <input type="checkbox" name="geolocation_posts_permission" id="geolocation_posts_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Geolocation Posts Permission -->

          <!-- GIF Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"gif",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("GIF Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add GIF Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="gif_posts_permission">
                <input type="checkbox" name="gif_posts_permission" id="gif_posts_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- GIF Posts Permission -->

          <!-- Anonymous Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"spy",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Anonymous Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Anonymous Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="anonymous_posts_permission">
                <input type="checkbox" name="anonymous_posts_permission" id="anonymous_posts_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Anonymous Posts Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Registration Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Invitation Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"invitation",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Invitation");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Generate Invitation Codes");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="invitation_permission">
                <input type="checkbox" name="invitation_permission" id="invitation_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Invitation Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Chat Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Audio Call Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_audio",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Audio Call");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Make Audio Calls");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="audio_call_permission">
                <input type="checkbox" name="audio_call_permission" id="audio_call_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Audio Call Permission -->

          <!-- Video Call Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_video",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Video Call");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Make Video Calls");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="video_call_permission">
                <input type="checkbox" name="video_call_permission" id="video_call_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Video Call Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Live Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Live Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"live",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Live");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Go Live");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="live_permission">
                <input type="checkbox" name="live_permission" id="live_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Live Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Uploads Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Videos Upload Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Videos Upload");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Upload Videos");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="videos_upload_permission">
                <input type="checkbox" name="videos_upload_permission" id="videos_upload_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Videos Upload Permission -->

          <!-- Audios Upload Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"audios",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Audio Upload");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Upload Audio");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="audios_upload_permission">
                <input type="checkbox" name="audios_upload_permission" id="audios_upload_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Audios Upload Permission -->

          <!-- Files Upload Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"files",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Files Upload");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Upload Files");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="files_upload_permission">
                <input type="checkbox" name="files_upload_permission" id="files_upload_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Files Upload Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Money Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Ads Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"ads",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Ads");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Create Ads");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="ads_permission">
                <input type="checkbox" name="ads_permission" id="ads_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Ads Permission -->

          <!-- Fundings Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"funding",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Fundings");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Raise Fundings");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="fundings_permission">
                <input type="checkbox" name="fundings_permission" id="fundings_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Fundings Permission -->

          <!-- Monetization Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Monetization");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Monetize Content");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="monetization_permission">
                <input type="checkbox" name="monetization_permission" id="monetization_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Monetization Permission -->

          <!-- Tips Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"tips",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Tips");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Receive Tips");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="tips_permission">
                <input type="checkbox" name="tips_permission" id="tips_permission">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Tips Permission -->
        </div>

        <!-- success -->
        <div class="alert alert-success mt15 mb0 x-hidden"></div>
        <!-- success -->

        <!-- error -->
        <div class="alert alert-danger mt15 mb0 x-hidden"></div>
        <!-- error -->
      </div>
      <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary"><?php echo __("Save Changes");?>
</button>
      </div>
    </form>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?>

    <form class="js_ajax-forms" data-url="admin/permissions_groups.php?do=edit&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['permissions_group_id'];?>
">
      <div class="card-body">
        <div class="heading-small mb20">
          <?php echo __("Grouo Info");?>

        </div>
        <div class="pl-md-4">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo __("Group Title");?>

            </label>
            <div class="col-md-9">
              <input class="form-control" name="title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['permissions_group_title'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['permissions_group_id'],array('1','2'))) {?>readonly<?php }?>>
            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Modules Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Pages Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pages",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Pages");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Create Pages");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="pages_permission">
                <input type="checkbox" name="pages_permission" id="pages_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['pages_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Pages Permission -->

          <!-- Groups Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Groups");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Create Groups");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="groups_permission">
                <input type="checkbox" name="groups_permission" id="groups_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['groups_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Groups Permission -->

          <!-- Events Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Events");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Create Events");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="events_permission">
                <input type="checkbox" name="events_permission" id="events_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['events_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Events Permission -->

          <!-- Blogs Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"blogs",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Blogs");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Write Articles");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="blogs_permission">
                <input type="checkbox" name="blogs_permission" id="blogs_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['blogs_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Blogs Permission -->

          <!-- Market Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"market",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Market");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Sell Products");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="market_permission">
                <input type="checkbox" name="market_permission" id="market_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['market_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Market Permission -->

          <!-- Forums Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"forums",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Forums");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Threads/Replies");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="forums_permission">
                <input type="checkbox" name="forums_permission" id="forums_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['forums_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Forums Permission -->

          <!-- Movies Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"movies",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Movies");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Watch Movies");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="movies_permission">
                <input type="checkbox" name="movies_permission" id="movies_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['movies_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Movies Permission -->

          <!-- Games Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"games",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Games");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Play Games");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="games_permission">
                <input type="checkbox" name="games_permission" id="games_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['games_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Games Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Features Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Gifts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"gifts",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Gifts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Send Gifts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="gifts_permission">
                <input type="checkbox" name="gifts_permission" id="gifts_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['gifts_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Gifts Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Posts Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Blogs Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"blogs",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Blogs");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Read Articles");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="blogs_permission_read">
                <input type="checkbox" name="blogs_permission_read" id="blogs_permission_read" <?php if ($_smarty_tpl->tpl_vars['data']->value['blogs_permission_read']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Blogs Permission -->

          <!-- Videos Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Videos");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Watch Videos");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="videos_permission_read">
                <input type="checkbox" name="videos_permission_read" id="videos_permission_read" <?php if ($_smarty_tpl->tpl_vars['data']->value['videos_permission_read']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Videos Permission -->

          <!-- Stories Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"24_hours",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Stories");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Stories");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="stories_permission">
                <input type="checkbox" name="stories_permission" id="stories_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['stories_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Stories Permission -->

          <!-- Colored Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"posts_colored",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Colored Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Colored Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="colored_posts_permission">
                <input type="checkbox" name="colored_posts_permission" id="colored_posts_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['colored_posts_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Colored Posts Permission -->

          <!-- Feelings/Activity Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"smile",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Feelings/Activity Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Feelings/Activity Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="activity_posts_permission">
                <input type="checkbox" name="activity_posts_permission" id="activity_posts_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['activity_posts_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Feelings/Activity Posts Permission -->

          <!-- Polls Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"polls",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Polls Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Polls Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="polls_posts_permission">
                <input type="checkbox" name="polls_posts_permission" id="polls_posts_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['polls_posts_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Polls Posts Permission -->

          <!-- Geolocation Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Geolocation Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Geolocation Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="geolocation_posts_permission">
                <input type="checkbox" name="geolocation_posts_permission" id="geolocation_posts_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['geolocation_posts_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Geolocation Posts Permission -->

          <!-- GIF Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"gif",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("GIF Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add GIF Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="gif_posts_permission">
                <input type="checkbox" name="gif_posts_permission" id="gif_posts_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['gif_posts_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- GIF Posts Permission -->

          <!-- Anonymous Posts Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"spy",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Anonymous Posts");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Add Anonymous Posts");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="anonymous_posts_permission">
                <input type="checkbox" name="anonymous_posts_permission" id="anonymous_posts_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['anonymous_posts_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Anonymous Posts Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Registration Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Invitation Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"invitation",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Invitation");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Generate Invitation Codes");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="invitation_permission">
                <input type="checkbox" name="invitation_permission" id="invitation_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['invitation_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Invitation Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Chat Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Audio Call Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_audio",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Audio Call");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Make Audio Calls");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="audio_call_permission">
                <input type="checkbox" name="audio_call_permission" id="audio_call_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['audio_call_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Audio Call Permission -->

          <!-- Video Call Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_video",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Video Call");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Make Video Calls");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="video_call_permission">
                <input type="checkbox" name="video_call_permission" id="video_call_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['video_call_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Video Call Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Live Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Live Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"live",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Live");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Go Live");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="live_permission">
                <input type="checkbox" name="live_permission" id="live_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['live_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Live Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Uploads Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Videos Upload Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Videos Upload");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Upload Videos");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="videos_upload_permission">
                <input type="checkbox" name="videos_upload_permission" id="videos_upload_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['videos_upload_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Videos Upload Permission -->

          <!-- Audios Upload Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"audios",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Audio Upload");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Upload Audio");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="audios_upload_permission">
                <input type="checkbox" name="audios_upload_permission" id="audios_upload_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['audios_upload_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Audios Upload Permission -->

          <!-- Files Upload Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"files",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Files Upload");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Upload Files");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="files_upload_permission">
                <input type="checkbox" name="files_upload_permission" id="files_upload_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['files_upload_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Files Upload Permission -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo __("Money Permissions");?>

        </div>
        <div class="pl-md-4">
          <!-- Ads Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"ads",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Ads");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Create Ads");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="ads_permission">
                <input type="checkbox" name="ads_permission" id="ads_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['ads_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Ads Permission -->

          <!-- Fundings Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"funding",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Fundings");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Raise Fundings");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="fundings_permission">
                <input type="checkbox" name="fundings_permission" id="fundings_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['fundings_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Fundings Permission -->

          <!-- Monetization Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Monetization");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Monetize Content");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="monetization_permission">
                <input type="checkbox" name="monetization_permission" id="monetization_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['monetization_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Monetization Permission -->

          <!-- Tips Permission -->
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"tips",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo __("Tips");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo __("Can Receive Tips");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="tips_permission">
                <input type="checkbox" name="tips_permission" id="tips_permission" <?php if ($_smarty_tpl->tpl_vars['data']->value['tips_permission']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- Tips Permission -->
        </div>

        <!-- success -->
        <div class="alert alert-success mt15 mb0 x-hidden"></div>
        <!-- success -->

        <!-- error -->
        <div class="alert alert-danger mt15 mb0 x-hidden"></div>
        <!-- error -->
      </div>
      <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary"><?php echo __("Save Changes");?>
</button>
      </div>
    </form>

  <?php }?>
</div><?php }
}
