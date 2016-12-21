<?php
/* Smarty version 3.1.30, created on 2016-12-11 20:21:49
  from "H:\phpStudy\WWW\Worker\Blog\templates\registered.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_584d44ddce2479_54098832',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7fba27ab7f931ee4acc873d21f0612e7cf1f312' => 
    array (
      0 => 'H:\\phpStudy\\WWW\\Worker\\Blog\\templates\\registered.tpl',
      1 => 1481458903,
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
function content_584d44ddce2479_54098832 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="templates/javascript/blog.js"><?php echo '</script'; ?>
>
	<div id="section" class="box">

		<!-- CONTENT -->
		<div id="content">
			<div style="margin:10px 0px 50px 120px">
				<h2>注 册</h2>
				<form action="http://localhost/Worker/Blog/?action=SubmitRegistered" method="post" class="form" onsubmit="return checkRegistered();">
					<ul>
						<li>
							<label >用户名<font color="red"> *字母数字下划线</font></label>
							<input type="text" size="45" class="input-text" name="user_name" id="name"/>
							<font color="red" <?php if ($_smarty_tpl->tpl_vars['error_name']->value != 1) {?>style="display:none"<?php }?> id="name_error"> *请正确输入用户名</font>
						</li>
						
						<li>
							<label >密码 </label>
							<input type="password" size="45" class="input-text"  name="password"  id='password'/>
							<font color="red" style="display:none" id="password_error"> *请输入密码</font>
                            <font color="red" <?php if ($_smarty_tpl->tpl_vars['error_password']->value != 1) {?>style="display:none"<?php }?> id="password1_error"> <?php echo $_smarty_tpl->tpl_vars['error_password_msg']->value;?>
</font>
						</li>
						<li>
							<label>再次输入密码 </label>
							<input type="password" size="45" class="input-text"  name="apassword" id="apassword"/>
							<font color="red" style="display:none" id="apassword_error"> *两次密码不一致</font>
						</li>

						<li>
							<label >昵称<font color="red"> *0~20个字符</font></label>
							<input type="text" size="45" class="input-text"  name="nick_name" id="nick_name"/>
							<font color="red" style="display:none" id="nick_name_error"> *昵称不能为空</font>
                            <font color="red" <?php if ($_smarty_tpl->tpl_vars['error_nick_name']->value != 1) {?>style="display:none"<?php }?> id="nick_name_error"> *昵称输入不能为空</font>
						</li>
						<li>
							<label >个人签名<font color="red"> *最多30个汉字</font></label>
							<textarea cols="47" rows="2" class="input-text"  name="tips" id='tips'></textarea>
							<font color="red" style="display:none" id="tips_error"> *个人签名不能为空</font>
                            <font color="red" <?php if ($_smarty_tpl->tpl_vars['error_tips']->value != 1) {?>style="display:none"<?php }?> id="tips_error"> *个性签名不能为空</font>
						</li>
						
						<li><input type="submit" value=" 提交 " class="input-submit" /></li>
                        <font color="red" <?php if ($_smarty_tpl->tpl_vars['error_register']->value != 1) {?>style="display:none"<?php }?> id="tips_error"> *注册成功</font>
                        <font color="red" <?php if ($_smarty_tpl->tpl_vars['error_checkUserExisted']->value != 1) {?>style="display:none"<?php }?> id="tips_error"> *用户已存在</font>
					</ul>
				</form>
			</div>
		</div> <!-- /content -->

		<!-- SIDEBAR -->
	<?php $_smarty_tpl->_subTemplateRender("file:right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	</div> <!-- /section -->

</div> <!-- /main -->	
	
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php }
}
