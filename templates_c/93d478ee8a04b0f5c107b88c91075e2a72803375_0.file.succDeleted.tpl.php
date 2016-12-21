<?php
/* Smarty version 3.1.30, created on 2016-12-21 00:19:50
  from "H:\phpStudy\WWW\Worker\Blog\templates\succDeleted.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58595a26e3be85_00862634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93d478ee8a04b0f5c107b88c91075e2a72803375' => 
    array (
      0 => 'H:\\phpStudy\\WWW\\Worker\\Blog\\templates\\succDeleted.tpl',
      1 => 1482250783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58595a26e3be85_00862634 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<meta http-equiv="Refresh" content="3; url=http://localhost/Worker/Blog/?action=myblog&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"/>

<div>
    <div style="text-align:center">
        <h1>删除成功</h1>
        <p><a href="http://localhost/Worker/Blog/?action=myblog">3秒后跳转,点击跳转...</a></p>
    </div>
</div>


</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
