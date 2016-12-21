<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/9
 * Time: 0:24
 */
require_once 'ActionBase.class.php';

class Login extends ActionBase {

    public function action() {
        $result['params']['safe']['action'] = 'login';
        $this->tpl->assign('params', $result['params']);
        $this->tpl->assign('error_login', 0);
        $this->tpl->display('login.tpl');
    }
}