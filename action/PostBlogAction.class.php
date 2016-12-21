<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/18
 * Time: 17:20
 */
require_once "ActionBase.class.php";
require_once DIR."/model/PostBlogModel.class.php";

class PostBlog extends ActionBase {
    public $need_login = 1;

    public function action() {
        $PostBlogModel = new PostBlogModel();
        $result = $PostBlogModel->getResult();
        $this->tpl->assign($result);
        $this->tpl->display("post.tpl");
    }
}