<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/16
 * Time: 17:07
 */
if(isset($_SESSION['need_login']) && $_SESSION['need_login'] == 1) {  //需要判断登陆的页面包含此文件
    header("Location: index.php");
    exit();
}
?>