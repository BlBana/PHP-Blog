<?php
/* Smarty version 3.1.30, created on 2016-12-21 15:27:14
  from "H:\phpStudy\WWW\Worker\Blog\templates\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_585a2ed25a7745_80556231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8cd3866e63d3d5184165ec02a0e9c1ab89f9b09' => 
    array (
      0 => 'H:\\phpStudy\\WWW\\Worker\\Blog\\templates\\header.tpl',
      1 => 1482305227,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_585a2ed25a7745_80556231 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="[HERE PASTE YOUR DESCRIPTION]" />
    <meta name="author" content="Template:TemplatesDock " />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="templates/css/main.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="templates/css/skin.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="templates/javascript/cufon-yui.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="templates/javascript/jquery-1.8.3.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">Cufon.replace('h1, h2, h3, h4, h5, h6', {hover:true});<?php echo '</script'; ?>
>
    <title>PHP BlogSystem</title>
</head>

<body>

<div class="main">

    <!-- HEADER -->
    <div id="header" class="box">

        <h1 id="logo">PHP<?php echo $_smarty_tpl->tpl_vars['test']->value;?>
</h1>

        <!-- NAVIGATION -->
        <ul id="nav">
            <li <?php if (empty($_smarty_tpl->tpl_vars['params']->value['safe']['action']) || $_smarty_tpl->tpl_vars['params']->value['safe']['action'] == 'index') {?>class="current"<?php }?>><a href="http://localhost/Worker/Blog/">首页</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['params']->value['safe']['action'] == 'myblog') {?> class="current" <?php }?>><a href="http://localhost/Worker/Blog/?action=myblog">我的博客</a></li>
            <?php if (!$_smarty_tpl->tpl_vars['user_info']->value) {?>
            <li <?php if ($_smarty_tpl->tpl_vars['params']->value['safe']['action'] == 'login') {?> class="current" <?php }?> ><a href="http://localhost/Worker/Blog/index.php?action=login">登录/注册</a></li>
            <?php } else { ?>
            <li><a href="#"><?php echo $_smarty_tpl->tpl_vars['user_info']->value;?>
</a></li>
            <?php }?>
            <li><a href="./index.php?action=outLogin" <?php if ($_smarty_tpl->tpl_vars['login_state']->value != 1) {?>style="display: none"<?php }?>>退出登录</a></li>
        </ul>

    </div> <!-- /header --><?php }
}
