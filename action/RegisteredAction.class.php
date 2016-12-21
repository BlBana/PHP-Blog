<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/9
 * Time: 0:45
 */
require_once 'ActionBase.class.php';

class Registered extends ActionBase {
    public function action() {
        $this->tpl->assign("error_name", 0);    //1表示用户名输入有误，0表示无误
        $this->tpl->display("registered.tpl");
    }
}