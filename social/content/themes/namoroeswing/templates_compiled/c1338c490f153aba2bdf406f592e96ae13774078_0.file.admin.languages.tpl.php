<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:49:49
  from '/var/www/html/social/content/themes/namoroeswing/templates/admin.languages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e45f1d6a9859_12085829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1338c490f153aba2bdf406f592e96ae13774078' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/admin.languages.tpl',
      1 => 1725499299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66e45f1d6a9859_12085829 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
  <div class="card-header with-icon">
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/languages/add" class="btn btn-md btn-primary">
          <i class="fa fa-plus mr5"></i><?php echo __("Add New Language");?>

        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add" || $_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/languages" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Go Back");?>

        </a>
      </div>
    <?php }?>
    <i class="fa fa-language mr10"></i><?php echo __("Languages");?>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?> &rsaquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['title'];
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "add") {?> &rsaquo; <?php echo __("Add New Language");
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
              <th><?php echo __("Title");?>
</th>
              <th><?php echo __("Code");?>
</th>
              <th><?php echo __("Order");?>
</th>
              <th><?php echo __("Default");?>
</th>
              <th><?php echo __("Enabled");?>
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
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['language_id'];?>
</td>
                <td>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/languages/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['language_id'];?>
">
                    <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['flag'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>

                  </a>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['code'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['language_order'];?>
</td>
                <td>
                  <?php if ($_smarty_tpl->tpl_vars['row']->value['default']) {?>
                    <span class="badge rounded-pill badge-lg bg-success"><?php echo __("Yes");?>
</span>
                  <?php } else { ?>
                    <span class="badge rounded-pill badge-lg bg-danger"><?php echo __("No");?>
</span>
                  <?php }?>
                </td>
                <td>
                  <?php if ($_smarty_tpl->tpl_vars['row']->value['enabled']) {?>
                    <span class="badge rounded-pill badge-lg bg-success"><?php echo __("Yes");?>
</span>
                  <?php } else { ?>
                    <span class="badge rounded-pill badge-lg bg-danger"><?php echo __("No");?>
</span>
                  <?php }?>
                </td>
                <td>
                  <a data-bs-toggle="tooltip" title='<?php echo __("Edit");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/languages/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['language_id'];?>
" class="btn btn-sm btn-icon btn-rounded btn-primary">
                    <i class="fa fa-pencil-alt"></i>
                  </a>
                  <button data-bs-toggle="tooltip" title='<?php echo __("Delete");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="language" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['language_id'];?>
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

    <form class="js_ajax-forms" data-url="admin/languages.php?do=edit&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['language_id'];?>
">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Default");?>

          </label>
          <div class="col-md-9">
            <label class="switch" for="default">
              <input type="checkbox" name="default" id="default" <?php if ($_smarty_tpl->tpl_vars['data']->value['default']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
            <div class="form-text">
              <?php echo __("Make it the default language of the site");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Enabled");?>

          </label>
          <div class="col-md-9">
            <label class="switch" for="enabled">
              <input type="checkbox" name="enabled" id="enabled" <?php if ($_smarty_tpl->tpl_vars['data']->value['enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
            <div class="form-text">
              <?php echo __("Make it enbaled so the user can translate the site to it");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Code");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="code" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['code'];?>
">
            <div class="form-text">
              <?php echo __("Language country_code, For Example: en_us, ar_sa or fr_fr");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Native Name");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
">
            <div class="form-text">
              <?php echo __("The native name of this language");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Flag");?>

          </label>
          <div class="col-md-9">
            <?php if ($_smarty_tpl->tpl_vars['data']->value['flag'] == '') {?>
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
                <input type="hidden" class="js_x-image-input" name="flag" value="">
              </div>
            <?php } else { ?>
              <div class="x-image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['flag'];?>
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
                <input type="hidden" class="js_x-image-input" name="flag" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['flag'];?>
">
              </div>
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Direction");?>

          </label>
          <div class="col-md-9">
            <select class="form-control" name="dir">
              <option <?php if ($_smarty_tpl->tpl_vars['data']->value['dir'] == "LTR") {?>selected<?php }?> value="LTR">LTR</option>
              <option <?php if ($_smarty_tpl->tpl_vars['data']->value['dir'] == "RTL") {?>selected<?php }?> value="RTL">RTL</option>
            </select>
            <div class="form-text">
              <?php echo __("The direction of this language 'Left To Right' or 'Right To Left'");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Order");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="language_order" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['language_order'];?>
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

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add") {?>

    <form class="js_ajax-forms" data-url="admin/languages.php?do=add">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Default");?>

          </label>
          <div class="col-md-9">
            <label class="switch" for="default">
              <input type="checkbox" name="default" id="default">
              <span class="slider round"></span>
            </label>
            <div class="form-text">
              <?php echo __("Make it the default language of the site");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Enabled");?>

          </label>
          <div class="col-md-9">
            <label class="switch" for="enabled">
              <input type="checkbox" name="enabled" id="enabled">
              <span class="slider round"></span>
            </label>
            <div class="form-text">
              <?php echo __("Make it enbaled so the user can translate the site to it");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Code");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="code">
            <div class="form-text">
              <?php echo __("Language country_code, For Example: en_us, ar_sa or fr_fr");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Native Name");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="title">
            <div class="form-text">
              <?php echo __("The native name of this language");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Flag");?>

          </label>
          <div class="col-md-9">
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
              <input type="hidden" class="js_x-image-input" name="flag" value="">
            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Direction");?>

          </label>
          <div class="col-md-9">
            <select class="form-control" name="dir">
              <option value="LTR">LTR</option>
              <option value="RTL">RTL</option>
            </select>
            <div class="form-text">
              <?php echo __("The direction of this language 'Left To Right' or 'Right To Left'");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo __("Order");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="language_order">
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
