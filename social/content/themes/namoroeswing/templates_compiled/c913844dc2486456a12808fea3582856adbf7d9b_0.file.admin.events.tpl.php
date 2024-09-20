<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:53:29
  from '/var/www/html/social/content/themes/namoroeswing/templates/admin.events.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e45ff99874c8_69516466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c913844dc2486456a12808fea3582856adbf7d9b' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/admin.events.tpl',
      1 => 1725499304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__categories.recursive_options.tpl' => 3,
    'file:__custom_fields.tpl' => 1,
    'file:__categories.recursive_rows.tpl' => 1,
  ),
),false)) {
function content_66e45ff99874c8_69516466 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
  <div class="card-header with-icon">
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "find") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Go Back");?>

        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "edit_event") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left"></i><span class="ml5 d-none d-lg-inline-block"><?php echo __("Go Back");?>
</span>
        </a>
        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['data']->value['event_id'];?>
" class="btn btn-md btn-info">
          <i class="fa fa-tv"></i><span class="ml5 d-none d-lg-inline-block"><?php echo __("View Event");?>
</span>
        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events/add_category" class="btn btn-md btn-primary">
          <i class="fa fa-plus"></i><span class="ml5 d-none d-lg-inline-block"><?php echo __("Add New Category");?>
</span>
        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add_category" || $_smarty_tpl->tpl_vars['sub_view']->value == "edit_category") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events/categories" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left"></i><span class="ml5 d-none d-lg-inline-block"><?php echo __("Go Back");?>
</span>
        </a>
      </div>
    <?php }?>
    <i class="fa fa-calendar mr10"></i><?php echo __("Events");?>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "find") {?> &rsaquo; <?php echo __("Find");
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "edit_event") {?> &rsaquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['event_title'];
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?> &rsaquo; <?php echo __("Categories");
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "add_category") {?> &rsaquo; <?php echo __("Categories");?>
 &rsaquo; <?php echo __("Add New Category");
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "edit_category") {?> &rsaquo; <?php echo __("Categories");?>
 &rsaquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['category_name'];
}?>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '' || $_smarty_tpl->tpl_vars['sub_view']->value == "find") {?>

    <div class="card-body">

      <!-- search form -->
      <div class="mb20">
        <form class="d-flex flex-row align-items-center flex-wrap" action="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events/find" method="get">
          <div class="form-group mb0">
            <div class="input-group">
              <input type="text" class="form-control" name="query">
              <button type="submit" class="btn btn-sm btn-light"><i class="fas fa-search mr5"></i><?php echo __("Search");?>
</button>
            </div>
          </div>
        </form>
        <div class="form-text small">
          <?php echo __('Search by Event Title');?>

        </div>
      </div>
      <!-- search form -->

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th><?php echo __("ID");?>
</th>
              <th><?php echo __("Event");?>
</th>
              <th><?php echo __("Admin");?>
</th>
              <th><?php echo __("Privacy");?>
</th>
              <th><?php echo __("Interested");?>
</th>
              <th><?php echo __("Going");?>
</th>
              <th><?php echo __("Invited");?>
</th>
              <th><?php echo __("Actions");?>
</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr>
                  <td>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
</a>
                  </td>
                  <td>
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
">
                      <?php echo $_smarty_tpl->tpl_vars['row']->value['event_title'];?>

                    </a>
                  </td>
                  <td>
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
">
                      <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['user_picture'];?>
">
                      <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['row']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['row']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['user_lastname'];
}?>
                    </a>
                  </td>
                  <td>
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['event_privacy'] == "public") {?>
                      <i class="fa fa-globe fa-fw mr5"></i><?php echo __("Public");?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['event_privacy'] == "closed") {?>
                      <i class="fa fa-unlock-alt fa-fw mr5"></i><?php echo __("Closed");?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['event_privacy'] == "secret") {?>
                      <i class="fa fa-lock fa-fw mr5"></i><?php echo __("Secret");?>

                    <?php }?>
                  </td>
                  <td><?php echo $_smarty_tpl->tpl_vars['row']->value['event_interested'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['row']->value['event_going'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['row']->value['event_invited'];?>
</td>
                  <td>
                    <a data-bs-toggle="tooltip" title='<?php echo __("Edit");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events/edit_event/<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
" class="btn btn-sm btn-icon btn-rounded btn-primary">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <button data-bs-toggle="tooltip" title='<?php echo __("Delete");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="event" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['event_id'];?>
">
                      <i class="fa fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
              <tr>
                <td colspan="8" class="text-center">
                  <?php echo __("No data to show");?>

                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
      <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

    </div>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "edit_event") {?>

    <form class="js_ajax-forms" data-url="admin/events.php?do=edit_event&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['event_id'];?>
">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-2 text-center mb20">
            <img class="img-fluid img-thumbnail rounded" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['event_picture'];?>
">
          </div>
          <div class="col-12 col-md-5 mb20">
            <ul class="list-group">
              <li class="list-group-item">
                <span class="float-end badge badge-lg rounded-pill badge-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['event_id'];?>
</span>
                <?php echo __("Event ID");?>

              </li>
              <li class="list-group-item">
                <span class="float-end badge badge-lg rounded-pill badge-secondary">
                  <?php if ($_smarty_tpl->tpl_vars['data']->value['event_privacy'] == "public") {?>
                    <i class="fa fa-globe fa-fw mr5"></i><?php echo __("Public");?>

                  <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['event_privacy'] == "closed") {?>
                    <i class="fa fa-unlock-alt fa-fw mr5"></i><?php echo __("Closed");?>

                  <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['event_privacy'] == "secret") {?>
                    <i class="fa fa-lock fa-fw mr5"></i><?php echo __("Secret");?>

                  <?php }?>
                </span>
                <?php echo __("Privacy");?>

              </li>
            </ul>
          </div>
          <div class="col-12 col-md-5 mb20">
            <ul class="list-group">
              <li class="list-group-item">
                <span class="float-end badge badge-lg rounded-pill badge-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['event_interested'];?>
</span>
                <?php echo __("Interested");?>

              </li>
              <li class="list-group-item">
                <span class="float-end badge badge-lg rounded-pill badge-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['event_going'];?>
</span>
                <?php echo __("Going");?>

              </li>
              <li class="list-group-item">
                <span class="float-end badge badge-lg rounded-pill badge-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['event_invited'];?>
</span>
                <?php echo __("Invited");?>

              </li>
            </ul>
          </div>
        </div>

        <!-- tabs nav -->
        <ul class="nav nav-tabs mb20">
          <li class="nav-item">
            <a class="nav-link active" href="#event_settings" data-bs-toggle="tab">
              <i class="fa fa-cog fa-fw mr5"></i><strong><?php echo __("Event Settings");?>
</strong>
            </a>
          </li>
        </ul>
        <!-- tabs nav -->

        <!-- tabs content -->
        <div class="tab-content">
          <!-- settings tab -->
          <div class="tab-pane active" id="event_settings">
            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo __("Admin");?>

              </label>
              <div class="col-md-9">
                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_name'];?>
">
                  <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_picture'];?>
">
                  <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['data']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['data']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['user_lastname'];
}?>
                </a>
                <a target="_blank" data-bs-toggle="tooltip" title='<?php echo __("Edit");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/edit/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
" class="btn btn-sm btn-light btn-icon btn-rounded ml10">
                  <i class="fa fa-pencil-alt"></i>
                </a>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo __("Name Your Event");?>

              </label>
              <div class="col-md-9">
                <input class="form-control" name="title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['event_title'];?>
">
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo __("Location");?>

              </label>
              <div class="col-md-9">
                <input class="form-control" name="location" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['event_location'];?>
">
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo __("Start Date");?>

              </label>
              <div class="col-md-9">
                <input type="datetime-local" class="form-control" name="start_date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['event_start_date'];?>
">
                <div class="form-text">
                  <?php echo __("Your current server datetime is");?>
: <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
 (UTC)
                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo __("End Date");?>

              </label>
              <div class="col-md-9">
                <input type="datetime-local" class="form-control" name="end_date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['event_end_date'];?>
">
                <div class="form-text">
                  <?php echo __("Your current server datetime is");?>
: <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
 (UTC)
                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo __("Select Privacy");?>

              </label>
              <div class="col-md-9">
                <select class="form-control" name="privacy">
                  <option <?php if ($_smarty_tpl->tpl_vars['data']->value['event_privacy'] == "public") {?>selected<?php }?> value="public"><?php echo __("Public Event");?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['data']->value['event_privacy'] == "closed") {?>selected<?php }?> value="closed"><?php echo __("Closed Event");?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['data']->value['event_privacy'] == "secret") {?>selected<?php }?> value="secret"><?php echo __("Secret Event");?>
</option>
                </select>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo __("Category");?>

              </label>
              <div class="col-md-9">
                <select class="form-control" name="category">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['categories'], 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                    <?php $_smarty_tpl->_subTemplateRender('file:__categories.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('data_category'=>$_smarty_tpl->tpl_vars['data']->value['event_category']), 0, true);
?>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo __("About");?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="description"><?php echo $_smarty_tpl->tpl_vars['data']->value['event_description'];?>
</textarea>
              </div>
            </div>

            <!-- custom fields -->
            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['basic']) {?>
              <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['basic'],'_registration'=>false,'_inline'=>true), 0, false);
?>
            <?php }?>
            <!-- custom fields -->

            <div class="divider"></div>

            <div class="form-table-row">
              <div>
                <div class="form-label h6"><?php echo __("Members Can Publish Posts?");?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo __("Members can publish posts or only event admin");?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="event_publish_enabled">
                  <input type="checkbox" name="event_publish_enabled" id="event_publish_enabled" <?php if ($_smarty_tpl->tpl_vars['data']->value['event_publish_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div>
                <div class="form-label h6"><?php echo __("Post Approval");?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo __("All posts must be approved by the event admin");?>
<br>
                  (<?php echo __("Note: Disable it will approve any pending posts");?>
)
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="event_publish_approval_enabled">
                  <input type="checkbox" name="event_publish_approval_enabled" id="event_publish_approval_enabled" <?php if ($_smarty_tpl->tpl_vars['data']->value['event_publish_approval_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <!-- success -->
            <div class="alert alert-success mt15 mb0 x-hidden"></div>
            <!-- success -->

            <!-- error -->
            <div class="alert alert-danger mt15 mb0 x-hidden"></div>
            <!-- error -->
          </div>
          <!-- settings tab -->
        </div>
        <!-- tabs content -->
      </div>
      <div class="card-footer text-end">
        <button type="button" class="btn btn-danger js_admin-deleter" data-handle="event_posts" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['event_id'];?>
" data-delete-message="<?php echo __("Are you sure you want to delete all posts?");?>
">
          <i class="fa fa-trash-alt mr5"></i><?php echo __("Delete Posts");?>

        </button>
        <button type="button" class="btn btn-danger js_admin-deleter" data-handle="event" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['event_id'];?>
" data-redirect="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events">
          <i class="fa fa-trash-alt mr5"></i><?php echo __("Delete Event");?>

        </button>
        <button type="submit" class="btn btn-primary"><?php echo __("Save Changes");?>
</button>
      </div>
    </form>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover js_treegrid">
          <thead>
            <tr>
              <th><?php echo __("Title");?>
</th>
              <th><?php echo __("Description");?>
</th>
              <th><?php echo __("Order");?>
</th>
              <th><?php echo __("Actions");?>
</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <?php $_smarty_tpl->_subTemplateRender('file:__categories.recursive_rows.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_url'=>"events",'_handle'=>"event_category"), 0, true);
?>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
              <tr>
                <td colspan="5" class="text-center">
                  <?php echo __("No data to show");?>

                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add_category") {?>

    <form class="js_ajax-forms" data-url="admin/events.php?do=add_category">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Name");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="category_name">
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Description");?>

          </label>
          <div class="col-md-9">
            <textarea class="form-control" name="category_description" rows="3"></textarea>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Parent Category");?>

          </label>
          <div class="col-md-9">
            <select class="form-control" name="category_parent_id">
              <option value="0"><?php echo __("Set as a Partent Category");?>
</option>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <?php $_smarty_tpl->_subTemplateRender('file:__categories.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Order");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="category_order">
          </div>
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

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "edit_category") {?>

    <form class="js_ajax-forms" data-url="admin/events.php?do=edit_category&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['category_id'];?>
">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Name");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="category_name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['category_name'];?>
">
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Description");?>

          </label>
          <div class="col-md-9">
            <textarea class="form-control" name="category_description" rows="3"><?php echo $_smarty_tpl->tpl_vars['data']->value['category_description'];?>
</textarea>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Parent Category");?>

          </label>
          <div class="col-md-9">
            <select class="form-control" name="category_parent_id">
              <option value="0"><?php echo __("Set as a Partent Category");?>
</option>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value["categories"], 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <?php $_smarty_tpl->_subTemplateRender('file:__categories.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('data_category'=>$_smarty_tpl->tpl_vars['data']->value['category_parent_id']), 0, true);
?>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Order");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="category_order" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['category_order'];?>
">
          </div>
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
