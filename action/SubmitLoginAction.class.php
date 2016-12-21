<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/9
 * Time: 0:49
 */
require_once "ActionBase.class.php";
require_once "header.php";
require_once DIR."/model/SubmitLoginModel.class.php";

class SubmitLogin extends ActionBase {

    public function action() {
            $model = new SubmitLoginModel();
            $result = $model->getResult();
            $result['params']['safe']['action'] = 'login';
            if($result['name_code'] || $result['password_code']) {
                $this->tpl->assign('params', $result['params']);
                $this->tpl->assign('error_login', 1);
                $this->tpl->display('login.tpl');
            } else {
                $_SESSION['user_id'] = $result['data']['user_id'];
                $_SESSION['nick_name'] = $result['data']['nick_name'];
                $_SESSION['need_login'] = 1;
                $this->need_login = 1;
                header("Location: index.php");
            }
        }
}