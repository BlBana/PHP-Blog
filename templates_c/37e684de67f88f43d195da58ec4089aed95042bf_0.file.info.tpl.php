<?php
/* Smarty version 3.1.30, created on 2016-12-20 13:39:17
  from "H:\phpStudy\WWW\Worker\Blog\templates\info.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5858c4054c6971_17421877',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37e684de67f88f43d195da58ec4089aed95042bf' => 
    array (
      0 => 'H:\\phpStudy\\WWW\\Worker\\Blog\\templates\\info.tpl',
      1 => 1482212354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5858c4054c6971_17421877 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div id="section" class="box">
				<h2><?php echo $_smarty_tpl->tpl_vars['data']->value['blogInfo']['title'];?>
</h2>

				<div >
					<?php if ($_smarty_tpl->tpl_vars['data']->value['self'] == 1) {?><p class="f-right"><a href="./?action=updateBlog&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['blogInfo']['id'];?>
" class="comment">编辑</a></p><?php }?>
					<p class="f-left"><?php echo $_smarty_tpl->tpl_vars['data']->value['blogInfo']['create_time'];?>
| 分类 <?php echo $_smarty_tpl->tpl_vars['data']->value['blogInfo']['blog_type'];?>
 </p>
				</div>
				
				<div style="border-bottom: 1px dotted #CCC; height:50px;"></div>
				<div style="padding:10px">
					<?php echo $_smarty_tpl->tpl_vars['data']->value['blogInfo']['blog'];?>

				</div>
				<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['comment'])) {?>
				<div style="border-bottom: 1px dotted #CCC;"></div>
				<h3>评论</h3>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['comment'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
						<div style="padding:0 0 0 10px">
							<?php echo $_smarty_tpl->tpl_vars['item']->value['user_info']['nick_name'];?>
:<?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>

							<br/>
							评论时间 : <?php echo $_smarty_tpl->tpl_vars['item']->value['create_time'];?>

						</div>
					<div style="border-bottom: 1px dotted #CCC;"></div>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php }?>


		<?php if ($_smarty_tpl->tpl_vars['data']->value['is_login'] == 1) {?>
				<form action="./?action=SubmitComment" method="post" class="form">
					<ul>
						<textarea cols="75" rows="5" class="input-text"  name="comment"></textarea>
						<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['blogInfo']['id'];?>
" name="blog_id"/>
						<li><input type="submit" value=" 提交 " class="input-submit"  /></li>
					</ul>
				</form>
		<?php }?>
	</div> 
</div> 	
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
