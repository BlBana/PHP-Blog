<?php
    require_once "ActionBase.class.php";
    require_once DIR."/model/MyBlogModel.class.php";

    class MyBlog extends ActionBase {
        public $need_login = 1;
        public function action() {
            $MyBlogModel = new MyBlogModel();
            $result = $MyBlogModel->getResult($this->user_info);
            $result['params']['safe']['action'] = 'myblog';
            $this->tpl->assign('params', $result['params']);
            $this->tpl->assign($result);
            $this->tpl->display("myblog.tpl");
        }
    }
?>