<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/8
 * Time: 18:55
 */
session_start();
require_once DIR."/../Smarty/libs/Smarty.class.php";
class ActionBase {
    public $need_login;     //需要登录的页面，给need_login置1
    public $tpl;
    public $user_info;
    public function __construct() {
        $this->tpl = new Smarty();
        //$this->need_login = $_SESSION['need_login'];
        if($this->need_login == 1) {
            $this->checkLogin();
        }
    }
    /**
     * @param
     * @return
     */
    public function checkLogin() {
        if(isset($_SESSION['need_login']) && $_SESSION['need_login'] == 1) {
            $this->user_info = $_SESSION;
            $this->tpl->assign("user_info", $_SESSION['nick_name']);
            $this->tpl->assign("login_state", 1);   //是否显示登出按钮
        } else {
            header("Location: ./index.php?action=login");
        }
    }
}