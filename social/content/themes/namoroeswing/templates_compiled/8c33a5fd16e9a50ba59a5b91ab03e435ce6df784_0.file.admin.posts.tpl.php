<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:52:36
  from '/var/www/html/social/content/themes/namoroeswing/templates/admin.posts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e45fc4094fc2_32882227',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c33a5fd16e9a50ba59a5b91ab03e435ce6df784' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/admin.posts.tpl',
      1 => 1725499300,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__categories.recursive_rows.tpl' => 1,
    'file:__categories.recursive_options.tpl' => 2,
  ),
),false)) {
function content_66e45fc4094fc2_32882227 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
  <div class="card-header with-icon">
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "find") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/posts" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Go Back");?>

        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/posts/add_category" class="btn btn-md btn-primary">
          <i class="fa fa-plus"></i><span class="ml5 d-none d-lg-inline-block"><?php echo __("Add New Category");?>
</span>
        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add_category" || $_smarty_tpl->tpl_vars['sub_view']->value == "edit_category") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/posts/categories" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left"></i><span class="ml5 d-none d-lg-inline-block"><?php echo __("Go Back");?>
</span>
        </a>
      </div>
    <?php }?>
    <i class="fa fa-newspaper mr10"></i><?php echo __("Posts");?>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "find") {?> &rsaquo; <?php echo __("Find");
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?> &rsaquo; <?php echo __("Videos Categories");
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "add_category") {?> &rsaquo; <?php echo __("Videos Categories");?>
 &rsaquo; <?php echo __("Add New Category");
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "edit_category") {?> &rsaquo; <?php echo __("Videos Categories");?>
 &rsaquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['category_name'];
}?>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '' || $_smarty_tpl->tpl_vars['sub_view']->value == "find") {?>

    <div class="card-body">

      <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>
        <div class="row">
          <div class="col-sm-4">
            <div class="stat-panel bg-gradient-indigo">
              <div class="stat-cell narrow">
                <i class="fa fa-newspaper bg-icon"></i>
                <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['posts'];?>
</span><br>
                <span class="text-lg"><?php echo __("Posts");?>
</span><br>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="stat-panel bg-gradient-primary">
              <div class="stat-cell narrow">
                <i class="fa fa-comments bg-icon"></i>
                <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['posts_comments'];?>
</span><br>
                <span class="text-lg"><?php echo __("Comments");?>
</span><br>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="stat-panel bg-gradient-info">
              <div class="stat-cell narrow">
                <i class="fa fa-smile bg-icon"></i>
                <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['posts_likes'];?>
</span><br>
                <span class="text-lg"><?php echo __("Total Reactions");?>
</span><br>
              </div>
            </div>
          </div>
        </div>
      <?php }?>

      <!-- search form -->
      <div class="mb20">
        <form class="d-flex flex-row align-items-center flex-wrap" action="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/posts/find" method="get">
          <div class="form-group mb0">
            <div class="input-group">
              <input type="text" class="form-control" name="query">
              <button type="submit" class="btn btn-sm btn-light"><i class="fas fa-search mr5"></i><?php echo __("Search");?>
</button>
            </div>
          </div>
        </form>
        <div class="form-text small">
          <?php echo __('Search by Post ID or Text');?>

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
              <th><?php echo __("Type");?>
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
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['row']->value['post_author_url'];?>
">
                      <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['post_author_picture'];?>
">
                      <?php echo $_smarty_tpl->tpl_vars['row']->value['post_author_name'];?>

                    </a>
                  </td>
                  <td>
                    <span class="badge rounded-pill badge-lg bg-secondary">
                      <?php if ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "shared") {?>
                        <?php echo __("Share");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == '') {?>
                        <?php echo __("Text");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "map") {?>
                        <?php echo __("Maps");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "link") {?>
                        <?php echo __("Link");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "media") {?>
                        <?php echo __("Media");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "live") {?>
                        <?php echo __("Live Streaming");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "photos") {?>
                        <?php echo __("Photos");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "album") {?>
                        <?php echo __("Album");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "profile_picture") {?>
                        <?php echo __("Profile Picture");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "profile_cover") {?>
                        <?php echo __("Cover Photo");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "page_picture") {?>
                        <?php echo __("Page Picture");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "page_cover") {?>
                        <?php echo __("Page Cover");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "group_picture") {?>
                        <?php echo __("Group Picture");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "group_cover") {?>
                        <?php echo __("Group Cover");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "event_cover") {?>
                        <?php echo __("Event Cover");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "article") {?>
                        <?php echo __("Article");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "product") {?>
                        <?php echo __("Product");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "funding") {?>
                        <?php echo __("Funding");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "offer") {?>
                        <?php echo __("Offer");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "job") {?>
                        <?php echo __("Job");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "poll") {?>
                        <?php echo __("Poll");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "video") {?>
                        <?php echo __("Video");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "audio") {?>
                        <?php echo __("Audio");?>


                      <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['post_type'] == "file") {?>
                        <?php echo __("File");?>


                      <?php }?>
                    </span>
                  </td>
                  <td><span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['row']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['time'];?>
</span></td>
                  <td>
                    <a class="btn btn-sm btn-light" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['row']->value['post_id'];?>
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
                <?php $_smarty_tpl->_subTemplateRender('file:__categories.recursive_rows.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_url'=>"posts",'_handle'=>"video_category"), 0, true);
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

    <form class="js_ajax-forms" data-url="admin/posts.php?do=add_category">
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

    <form class="js_ajax-forms" data-url="admin/posts.php?do=edit_category&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['category_id'];?>
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
