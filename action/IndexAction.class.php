<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/8
 * Time: 18:55
 */
require_once 'ActionBase.class.php';
require_once DIR."/model/IndexModel.class.php";
class index extends ActionBase {
    //public $need_login = 1;
    public function action() {
        //页面展示
        $IndexModel = new IndexModel();
        $result = $IndexModel->getResult();
        $this->user_info = $_SESSION;
        $this->tpl->assign($result);
        $this->tpl->assign("user_info", $_SESSION['nick_name']);
        $this->tpl->assign("login_state", 1);
        $this->tpl->assign("test", " BlBana");
        $this->tpl->display('index.tpl');
    }
}