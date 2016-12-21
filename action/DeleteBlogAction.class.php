<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/20
 * Time: 19:27
 */
require_once "ActionBase.class.php";
require_once DIR."/model/DeleteBlogModel.class.php";

class DeleteBlog extends ActionBase {
    public $need_login = 1;

    public function action() {
        $DeleteBlogModel = new DeleteBlogModel();
        $result = $DeleteBlogModel->getResult($this->user_info);
        if(!$result['code']) {
            $this->tpl->assign("page", $result['params']['safe']['page']);
            $this->tpl->display("succDeleted.tpl");
        } else {
            header("Location: ./?action=myblog&page=".$result['params']['page']);
        }
    }
}