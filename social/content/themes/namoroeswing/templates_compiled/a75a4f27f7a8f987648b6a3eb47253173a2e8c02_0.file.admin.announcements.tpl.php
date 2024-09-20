<?php
/* Smarty version 4.5.3, created on 2024-09-13 21:14:04
  from '/var/www/html/social/content/themes/namoroeswing/templates/admin.announcements.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4ab1cbdf093_42812618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a75a4f27f7a8f987648b6a3eb47253173a2e8c02' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/admin.announcements.tpl',
      1 => 1725499304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66e4ab1cbdf093_42812618 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
  <div class="card-header with-icon">
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/announcements/add" class="btn btn-md btn-primary">
          <i class="fa fa-plus mr5"></i><?php echo __("Add New Announcement");?>

        </a>
      </div>
    <?php } else { ?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/announcements" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Go Back");?>

        </a>
      </div>
    <?php }?>
    <i class="fa fa-bullhorn mr10"></i><?php echo __("Announcements");?>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?> &rsaquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "add") {?> &rsaquo; <?php echo __("Add New Announcement");
}?>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover js_dataTable">
          <thead>
            <tr>
              <th><?php echo __("ID");?>
</th>
              <th><?php echo __("Name");?>
</th>
              <th><?php echo __("Type");?>
</th>
              <th><?php echo __("Start Date");?>
</th>
              <th><?php echo __("End Date");?>
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
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['announcement_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['type'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['start_date'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['end_date'];?>
</td>
                <td>
                  <a data-bs-toggle="tooltip" title='<?php echo __("Edit");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/announcements/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['announcement_id'];?>
" class="btn btn-sm btn-icon btn-rounded btn-primary">
                    <i class="fa fa-pencil-alt"></i>
                  </a>
                  <button data-bs-toggle="tooltip" title='<?php echo __("Delete");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="announcement" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['announcement_id'];?>
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
    </div>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?>

    <form class="js_ajax-forms" data-url="admin/announcements.php?do=edit&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['announcement_id'];?>
">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Name");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
            <div class="form-text">
              <?php echo __("Announcement name will appear only in the admin panel (mandatory)");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Title");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
">
            <div class="form-text">
              <?php echo __("Announcement title will appear on the announcement block");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Type");?>

          </label>
          <div class="col-md-9">
            <select class="form-control" name="type">
              <option <?php if ($_smarty_tpl->tpl_vars['data']->value['type'] == "success") {?>selected<?php }?> value="success" class="alert-success"><?php echo __("Success");?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['data']->value['type'] == "warning") {?>selected<?php }?> value="warning" class="alert-warning"><?php echo __("Warning");?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['data']->value['type'] == "danger") {?>selected<?php }?> value="danger" class="alert-danger"><?php echo __("Danger");?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['data']->value['type'] == "info") {?>selected<?php }?> value="info" class="alert-info"><?php echo __("Info");?>
</option>
            </select>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("HTML");?>

          </label>
          <div class="col-md-9">
            <textarea class="form-control js_wysiwyg-advanced" name="code"><?php echo $_smarty_tpl->tpl_vars['data']->value['code'];?>
</textarea>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Start Date");?>

          </label>
          <div class="col-md-9">
            <input type="datetime-local" class="form-control" name="start_date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['start_date'];?>
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
            <input type="datetime-local" class="form-control" name="end_date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['end_date'];?>
">
            <div class="form-text">
              <?php echo __("Your current server datetime is");?>
: <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
 (UTC)
            </div>
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

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add") {?>

    <form class="js_ajax-forms" data-url="admin/announcements.php?do=add">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Name");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="name">
            <div class="form-text">
              <?php echo __("Announcement name will appear only in the admin panel");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Title");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="title">
            <div class="form-text">
              <?php echo __("Announcement title will appear on the announcement block");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Type");?>

          </label>
          <div class="col-md-9">
            <select class="form-control" name="type">
              <option value="success" class="alert-success"><?php echo __("Success");?>
</option>
              <option value="warning" class="alert-warning"><?php echo __("Warning");?>
</option>
              <option value="danger" class="alert-danger"><?php echo __("Danger");?>
</option>
              <option value="info" class="alert-info"><?php echo __("Info");?>
</option>
            </select>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("HTML");?>

          </label>
          <div class="col-md-9">
            <textarea class="form-control js_wysiwyg-advanced" name="code"></textarea>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Start Date");?>

          </label>
          <div class="col-md-9">
            <input type="datetime-local" class="form-control" name="start_date">
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
            <input type="datetime-local" class="form-control" name="end_date">
            <div class="form-text">
              <?php echo __("Your current server datetime is");?>
: <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
 (UTC)
            </div>
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
