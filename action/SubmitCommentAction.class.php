<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/21
 * Time: 1:19
 */
require_once "ActionBase.class.php";
require_once DIR."/model/SubmitCommentModel.class.php";


class SubmitComment extends ActionBase {
    public $need_login = 1;
    public function action() {
        $SubmitCommentModel = new SubmitCommentModel();
        $result = $SubmitCommentModel->getResult($this->user_info);
        if($result['code'] == 1) {
            header('Location: ./?action=bloginfo&id='.$result['params']['safe']['blog_id']);
        } else {
            header('Location: ./?action=bloginfo&id='.$result['params']['safe']['blog_id']);
        }
    }
}