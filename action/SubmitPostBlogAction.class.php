<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/18
 * Time: 21:51
 */
require_once "ActionBase.class.php";
require_once DIR."/model/SubmitPostModel.class.php";

class SubmitPostBlog extends ActionBase {
    public $need_login = 1;
    public function action() {
        $model = new SubmitPostModel();
        $result = $model->getResult($this->user_info);
        $result['params']['safe']['action'] = 'myblog';
        $this->tpl->assign($result);
        if($result['code'] == 1) {
            header("Location: ./?action=myblog");
        }
        $this->tpl->assign($result);
        $this->tpl->display('post.tpl');
    }
}