<?php
/* Smarty version 3.1.30, created on 2016-12-16 16:12:21
  from "H:\phpStudy\WWW\Worker\Blog\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853a1e5ecebf7_25954082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c42baa54b07bada42c6a0797c54d6363fd621c1' => 
    array (
      0 => 'H:\\phpStudy\\WWW\\Worker\\Blog\\templates\\login.tpl',
      1 => 1481875879,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:right.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5853a1e5ecebf7_25954082 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php echo '<script'; ?>
 type="text/javascript" src="templates/javascript/blog.js"><?php echo '</script'; ?>
>
	<div id="section" class="box">

		<!-- CONTENT -->
		<div id="content">
			<div style="margin:50px 0px 50px 90px">
				<h2>登 录</h2>
				<font color="red" <?php if ($_smarty_tpl->tpl_vars['error_login']->value != 1) {?>style="display:none"<?php }?> id="name_error"> 用户不存在或者密码输入错误</font>
				<form action="http://localhost/Worker/Blog/?action=SubmitLogin" method="post" class="form" onSubmit="return checkSubmitLogin();">
					<ul>
						<li>
							<label for="input-01">用户名</label>
							<input type="text" size="45" class="input-text" id="name" name="user_name"  value="<?php echo $_smarty_tpl->tpl_vars['params']->value['safe']['user_name'];?>
"  />
						</li>
						
						<li>
							<label for="input-03">密码</label>
							<input type="password" size="45" class="input-text" id="password" name="password" />
							<font color="red" style="display:none" id="password_error"> *请输入密码</font>
						</li>
						
						<li><input type="submit" value=" 提交 " class="input-submit"  /></li>

						<a href="http://localhost/Worker/Blog/?action=registered">没有账号去注册</a>
					</ul>
				</form>
			</div>
		</div> 

		<?php $_smarty_tpl->_subTemplateRender("file:right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</div> <!-- /section -->

</div> <!-- /main -->	
	
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
