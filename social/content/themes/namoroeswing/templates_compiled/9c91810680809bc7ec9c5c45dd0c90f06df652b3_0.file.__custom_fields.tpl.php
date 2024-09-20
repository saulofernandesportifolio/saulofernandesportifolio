<?php
/* Smarty version 4.5.3, created on 2024-09-13 15:16:16
  from '/var/www/html/social/content/themes/namoroeswing/templates/__custom_fields.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_66e457404e92b3_43114253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c91810680809bc7ec9c5c45dd0c90f06df652b3' => 
    array (
      0 => '/var/www/html/social/content/themes/namoroeswing/templates/__custom_fields.tpl',
      1 => 1725499307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66e457404e92b3_43114253 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_registration']->value) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_custom_fields']->value, 'custom_field');
$_smarty_tpl->tpl_vars['custom_field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['custom_field']->value) {
$_smarty_tpl->tpl_vars['custom_field']->do_else = false;
?>
    <label class="form-label"><?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
 <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['mandatory'] && !$_smarty_tpl->tpl_vars['_search']->value) {?>*<?php }?></label>
    <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textbox") {?>
      <input name="fld_<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['field_id'];?>
" type="text" class="form-control" <?php if (!$_smarty_tpl->tpl_vars['_search']->value) {?>placeholder="<?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
" <?php }?> <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['mandatory'] && !$_smarty_tpl->tpl_vars['_search']->value) {?>required<?php }?>>
    <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textarea") {?>
      <textarea name="fld_<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['field_id'];?>
" class="form-control" <?php if (!$_smarty_tpl->tpl_vars['_search']->value) {?>placeholder="<?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
" <?php }?> <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['mandatory'] && !$_smarty_tpl->tpl_vars['_search']->value) {?>required<?php }?>></textarea>
    <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "selectbox") {?>
      <select name="fld_<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['field_id'];?>
" class="form-control" <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['mandatory'] && !$_smarty_tpl->tpl_vars['_search']->value) {?>required<?php }?>>
        <?php if ($_smarty_tpl->tpl_vars['_search']->value) {?>
          <option selected value="any"><?php echo __("Any");?>
</option>
        <?php } else { ?>
          <option selected value="none"><?php echo __("Select");?>
 <?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
</option>
        <?php }?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_field']->value['options'], 'value', false, 'id');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo __($_smarty_tpl->tpl_vars['value']->value);?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </select>
    <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "multipleselectbox") {?>
      <select name="fld_<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['field_id'];?>
[]" class="form-control" multiple <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['mandatory'] && !$_smarty_tpl->tpl_vars['_search']->value) {?>required<?php }?>>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_field']->value['options'], 'value', false, 'id');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo __($_smarty_tpl->tpl_vars['value']->value);?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </select>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['description'] && !$_smarty_tpl->tpl_vars['_search']->value) {?>
      <div class="form-text">
        <?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['description']);?>

      </div>
    <?php }?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_custom_fields']->value, 'custom_field');
$_smarty_tpl->tpl_vars['custom_field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['custom_field']->value) {
$_smarty_tpl->tpl_vars['custom_field']->do_else = false;
?>
    <div class="form-group <?php if ($_smarty_tpl->tpl_vars['_inline']->value) {?>row<?php }?>">
      <label class="form-label <?php if ($_smarty_tpl->tpl_vars['_inline']->value) {?>col-md-3<?php }?>"><?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
 <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['mandatory']) {?>*<?php }?></label>
      <?php if ($_smarty_tpl->tpl_vars['_inline']->value) {?><div class="col-md-9"><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textbox") {?>
          <input type="text" name="fld_<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['field_id'];?>
" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
" <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['mandatory']) {?>required<?php }?>>
        <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textarea") {?>
          <textarea name="fld_<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['field_id'];?>
" class="form-control" <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['mandatory']) {?>required<?php }?>><?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
</textarea>
        <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "selectbox") {?>
          <select name="fld_<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['field_id'];?>
" class="form-control" <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['mandatory']) {?>required<?php }?>>
            <option <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['value'] == '') {?>selected<?php }?> value="none"><?php echo __("Select");?>
 <?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['label']);?>
</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_field']->value['options'], 'value', false, 'id');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
              <option <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['value'] == $_smarty_tpl->tpl_vars['value']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo __($_smarty_tpl->tpl_vars['value']->value);?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </select>
        <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "multipleselectbox") {?>
          <select name="fld_<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['field_id'];?>
[]" class="form-control" multiple <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['mandatory']) {?>required<?php }?>>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_field']->value['options'], 'value', false, 'id');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
              <option <?php if ((isset($_smarty_tpl->tpl_vars['custom_field']->value['value'])) && in_array($_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl->tpl_vars['custom_field']->value['value'])) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo __($_smarty_tpl->tpl_vars['value']->value);?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </select>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['description']) {?>
          <div class="form-text">
            <?php echo __($_smarty_tpl->tpl_vars['custom_field']->value['description']);?>

          </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['_inline']->value) {?>
      </div><?php }?>
    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
