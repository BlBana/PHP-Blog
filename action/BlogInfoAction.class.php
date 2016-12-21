<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/20
 * Time: 12:36
 */
require_once "ActionBase.class.php";
require_once DIR."/model/BlogInfoModel.class.php";

class BlogInfo extends ActionBase {
    public $need_login = 1;

    public function action() {
        $BlogInfoModel = new BlogInfoModel();
        $result = $BlogInfoModel->getResult($this->user_info);
        $result['params']['safe']['action'] = 'myblog';
        $this->tpl->assign($result);
        $this->tpl->display("info.tpl");
    }
}