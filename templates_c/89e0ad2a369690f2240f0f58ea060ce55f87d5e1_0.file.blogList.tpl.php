<?php
/* Smarty version 3.1.30, created on 2016-12-21 15:00:29
  from "H:\phpStudy\WWW\Worker\Blog\templates\blogList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_585a288d418e04_25126807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89e0ad2a369690f2240f0f58ea060ce55f87d5e1' => 
    array (
      0 => 'H:\\phpStudy\\WWW\\Worker\\Blog\\templates\\blogList.tpl',
      1 => 1482303624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_585a288d418e04_25126807 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" media="screen,projection" type="text/css" href="templates/css/botton.css" />
	<div id="section" class="box">

		<ul class="articles box">
			<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['bloglist'])) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['bloglist'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
					<li>
						<h2><a href="http://localhost/blog/?action=bloginfo&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h2>

						<div class="article-info box">

							<p class="f-right"><a href="#" class="comment">评论 (<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_total'];?>
)</a></p>

							<p class="f-left"><?php echo $_smarty_tpl->tpl_vars['item']->value['create_time'];?>
 | 分类  <?php echo $_smarty_tpl->tpl_vars['item']->value['blog_type_name'];?>
</p>

						</div> <!-- /article-info -->	

						<p>
							<?php echo $_smarty_tpl->tpl_vars['item']->value['blog'];?>

						</p>
						<p class="more"><a href="/blog/?action=deleteBlog&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['pageInfo']->value['page'];?>
"  onclick= "if(confirm( '是否确定！ ')==false)return   false; ">删除&raquo;</a></p>
					</li>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php } else { ?>
			<h1>
				暂无博文
			</h1>
			<?php }?>	
				
			</ul>
			<?php if ($_smarty_tpl->tpl_vars['pageInfo']->value['page_max'] > 1) {?>
			<div class="pagination box">
				<p class="f-right">
					<?php if ($_smarty_tpl->tpl_vars['pageInfo']->value['page'] > 1) {?>
						<a href="http://localhost/blog/?action=bloglist&page=<?php echo $_smarty_tpl->tpl_vars['pageInfo']->value['page']-1;?>
&user_id=<?php echo $_smarty_tpl->tpl_vars['params']->value['safe']['user_id'];?>
">上一页 &raquo;</a>
					<?php }?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageInfo']->value['page_arr'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
						<a href="http://localhost/blog/?action=bloglist&page=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
&user_id=<?php echo $_smarty_tpl->tpl_vars['params']->value['safe']['user_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value == $_smarty_tpl->tpl_vars['pageInfo']->value['page']) {?>class="current"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					<?php if ($_smarty_tpl->tpl_vars['pageInfo']->value['page'] < $_smarty_tpl->tpl_vars['pageInfo']->value['page_max']) {?>
					<a href="http://localhost/blog/?action=bloglist&page=<?php echo $_smarty_tpl->tpl_vars['pageInfo']->value['page']+1;?>
&user_id=<?php echo $_smarty_tpl->tpl_vars['params']->value['safe']['user_id'];?>
">下一页 &raquo;</a>
					<?php }?>
				</p>
				<p class="f-left"> 1 / 13 页</p>
			</div> 
			<?php }?>
	</div> 

</div> <!-- /main -->	
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
