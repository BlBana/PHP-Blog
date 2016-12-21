<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/8
 * Time: 23:57
 */
require_once 'ActionBase.class.php';
require_once DIR."/model/SubmitRegisteredModel.class.php";

class SubmitRegistered extends ActionBase {
    public  function action() {
        //页面展示
        $model = new SubmitRegisteredModel();
        $result = $model->getResult();  //$result表示注册是否出问题
        if(!empty($result)) {
            if ($result['checkUserExisted']) {
                $this->tpl->assign("error_checkUserExisted", 1);
            }
            if ($result['user_name']) {
                $this->tpl->assign("error_name", 1);
            }
            if ($result['password']) {
                $this->tpl->assign("error_password", 1);
                $this->tpl->assign("error_password_msg", $result['password']);
            }
            if ($result['tips']) {
                $this->tpl->assign("error_tips", 1);
            }
            if ($result['nick_name']) {
                $this->tpl->assign("error_nick_name", 1);
            }
            if (empty($result)) {
                $this->tpl->assign("error_register", 1);
            }
            $this->tpl->display("registered.tpl");
        } else {
            $this->tpl->display("succ.tpl");
        }
    }
}