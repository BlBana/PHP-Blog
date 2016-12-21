<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/20
 * Time: 12:41
 */
require_once "ModelBase.class.php";
require_once DIR."/dao/DaoBlog.class.php";
require_once DIR."/dao/DaoBlogType.class.php";
require_once DIR."/dao/DaoComment.class.php";
require_once DIR."/dao/DaoUser.class.php";

class BlogInfoModel extends ModelBase {
    public $blog_type;
    public $error_info = 0;
    public $comment;
    public $userinfo;

    public function checkparams() {
        if(empty($this->params['safe']['id']) && !is_numeric($this->params['safe']['id'])) {
            $this->error_info = 1;       //输入信息出现问题
        } else {
            $this->params['safe']['id'] = $this->testInput($this->params['safe']['id']);
        }
    }

    public function preform() {
        $DaoBlogType = new DaoBlogType();
        $this->blog_type = $DaoBlogType->getBlogType();
        if(!$this->error_info) {
            $DaoBlog = new DaoBlog();
            $ret = $DaoBlog->getBlogById($this->params['safe']['id']);
            $blogInfo = $ret['0'];
            $blogInfo = $this->formartBlog($blogInfo);
            $this->commentList();
            if (!empty($blogInfo)) {
                $this->result['data']['comment'] = $this->comment;
                $this->result['data']['blogInfo'] = $blogInfo;
                $this->result['data']['self'] = $blogInfo['user_id'] == $this->user_info['user_id'] ? 1 : 0;
                $this->result['data']['is_login'] = !empty($this->user_info) ? 1 : 0;
            }
        }
    }

    public function formartBlog($blogInfo) {
        if(empty($blogInfo)) {
            return false;
        }
        $blogInfo['blog_type'] = $this->blog_type[$blogInfo['blog_type']];
        $blogInfo['create_time'] = date('Y-m-d H:i:s', $blogInfo['create_time']);
        $blogInfo['blog'] = htmlspecialchars_decode($blogInfo['blog']);
        return $blogInfo;
    }

    public function commentList() {
        $DaoComment = new DaoComment();
        $DaoUserInfo = new DaoUser();
        $this->comment = $DaoComment->CommentList($this->params['safe']['id']);
        foreach ($this->comment as $key => $value) {
            $this->comment[$key]['create_time'] = date("Y-m-d H:i:s", $value['create_time']);
            $this->userinfo = $DaoUserInfo->getUserInfoByUserId($value['user_id']);
            $this->comment[$key]['user_info'] = $this->userinfo[0];
        }
    }

}