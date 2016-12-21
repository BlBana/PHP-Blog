<?php
/* Smarty version 3.1.30, created on 2016-12-09 00:44:15
  from "H:\phpStudy\WWW\Worker\Blog\templates\right.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58498ddfadd7c3_91179938',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '829a6dc3507850dfa4f1000d36033ba54404131e' => 
    array (
      0 => 'H:\\phpStudy\\WWW\\Worker\\Blog\\templates\\right.tpl',
      1 => 1481215453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58498ddfadd7c3_91179938 (Smarty_Internal_Template $_smarty_tpl) {
?>
		<!-- SIDEBAR -->
<div id="aside">

			<!-- SIDEBAR MENU -->
			<h3 class="nomb">名人推荐</h3>
			
			<ul class="sponsors">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hot_user']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<li>
					<a href="http://localhost/blog/?action=blogList&user_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nick_name'];?>
</a><br />
					<?php echo $_smarty_tpl->tpl_vars['item']->value['tips'];?>

				</li>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</ul>			
		
</div> <!-- /aside --><?php }
}
