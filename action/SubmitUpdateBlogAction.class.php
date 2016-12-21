<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/20
 * Time: 14:53
 */
require_once "ActionBase.class.php";
require_once DIR."/model/SubmitUpdateBlogModel.class.php";

class SubmitUpdateBlog extends ActionBase {
    public $need_login = 1;

    public function action() {
        $SubmitUpdateBlogModel = new SubmitUpdateBlogModel();
        $result = $SubmitUpdateBlogModel->getResult($this->user_info);
        if($result['code'] == 1) {
            header('Location: ./?action=bloginfo&id='.$result['params']['safe']['id']);
        }
        $this->tpl->assign($result);
        $this->tpl->display("update.tpl");
    }
}