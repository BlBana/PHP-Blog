<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/21
 * Time: 14:47
 */
require_once "ActionBase.class.php";
require_once DIR."/model/BlogListModel.class.php";

class BlogList extends ActionBase {

    public function action() {
        $BlogListModel = new BlogListModel();
        $result = $BlogListModel->getResult();
        $result['params']['safe']['action'] = "index";
        if($result['code'] == 0) {
            header("Location: ./?action=index");
        }
        $this->tpl->assign($result);
        $this->tpl->display("blogList.tpl");
    }
}