<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:53:50
  from '/var/www/html/social/content/themes/namoroeswing/templates/admin.blogs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e4600e950ac0_91419564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '071729748223150c5fa78d5ca5644c23ac03f431' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/admin.blogs.tpl',
      1 => 1725499307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__categories.recursive_rows.tpl' => 1,
    'file:__categories.recursive_options.tpl' => 2,
  ),
),false)) {
function content_66e4600e950ac0_91419564 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/social/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<div class="card">
  <div class="card-header with-icon">
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "find") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blogs" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Go Back");?>

        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blogs/add_category" class="btn btn-md btn-primary">
          <i class="fa fa-plus mr5"></i><?php echo __("Add New Category");?>

        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add_category" || $_smarty_tpl->tpl_vars['sub_view']->value == "edit_category") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blogs/categories" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Go Back");?>

        </a>
      </div>
    <?php }?>
    <i class="fab fa-blogger-b mr10"></i><?php echo __("Blogs");?>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "find") {?> &rsaquo; <?php echo __("Find");
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
/blogs/find" method="get">
          <div class="form-group mb0">
            <div class="input-group">
              <input type="text" class="form-control" name="query">
              <button type="submit" class="btn btn-sm btn-light"><i class="fas fa-search mr5"></i><?php echo __("Search");?>
</button>
            </div>
          </div>
        </form>
        <div class="form-text small">
          <?php echo __('Search by Article Title, Text or Tags');?>

        </div>
      </div>
      <!-- search form -->

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th><?php echo __("ID");?>
</th>
              <th><?php echo __("Author");?>
</th>
              <th><?php echo __("Title");?>
</th>
              <th><?php echo __("Time");?>
</th>
              <th><?php echo __("Link");?>
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
                  <td><?php echo $_smarty_tpl->tpl_vars['row']->value['post_id'];?>
</td>
                  <td>
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['row']->value['article_author_url'];?>
">
                      <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['article_author_picture'];?>
">
                      <?php echo $_smarty_tpl->tpl_vars['row']->value['article_author_name'];?>

                    </a>
                  </td>
                  <td>
                    <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['title'],30);?>
</span>
                  </td>
                  <td><span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['row']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['time'];?>
</span></td>
                  <td>
                    <a class="btn btn-sm btn-light" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['row']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['article_title_url'];?>
" target="_blank">
                      <i class="fa fa-eye mr5"></i><?php echo __("View");?>

                    </a>
                  </td>
                  <td>
                    <button data-bs-toggle="tooltip" title='<?php echo __("Delete");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="post" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['post_id'];?>
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
                <td colspan="6" class="text-center">
                  <?php echo __("No data to show");?>

                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>

      <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>


    </div>

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
                <?php $_smarty_tpl->_subTemplateRender('file:__categories.recursive_rows.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_url'=>"blogs",'_handle'=>"blogs_category"), 0, true);
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

    <form class="js_ajax-forms" data-url="admin/blogs.php?do=add_category">
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

    <form class="js_ajax-forms" data-url="admin/blogs.php?do=edit_category&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['category_id'];?>
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
