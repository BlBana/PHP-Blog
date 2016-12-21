<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="[HERE PASTE YOUR DESCRIPTION]" />
    <meta name="author" content="Template:TemplatesDock " />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="templates/css/main.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="templates/css/skin.css" />
    <script type="text/javascript" src="templates/javascript/cufon-yui.js"></script>
    <script type="text/javascript" src="templates/javascript/jquery-1.8.3.js"></script>

    <script type="text/javascript">Cufon.replace('h1, h2, h3, h4, h5, h6', {hover:true});</script>
    <title>PHP BlogSystem</title>
</head>

<body>

<div class="main">

    <!-- HEADER -->
    <div id="header" class="box">

        <h1 id="logo">PHP<{$test}></h1>

        <!-- NAVIGATION -->
        <ul id="nav">
            <li <{if empty($params.safe.action) || $params.safe.action == 'index'}>class="current"<{/if}>><a href="http://localhost/Worker/Blog/">首页</a></li>
            <li <{if $params.safe.action == 'myblog'}> class="current" <{/if}>><a href="http://localhost/Worker/Blog/?action=myblog">我的博客</a></li>
            <{if !$user_info}>
            <li <{if $params.safe.action == 'login'}> class="current" <{/if}> ><a href="http://localhost/Worker/Blog/index.php?action=login">登录/注册</a></li>
            <{else}>
            <li><a href="#"><{$user_info}></a></li>
            <{/if}>
            <li><a href="./index.php?action=outLogin" <{if $login_state != 1}>style="display: none"<{/if}>>退出登录</a></li>
        </ul>

    </div> <!-- /header -->