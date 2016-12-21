<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/21
 * Time: 1:23
 */
require_once "ModelBase.class.php";
require_once DIR."/dao/DaoComment.class.php";

class SubmitCommentModel extends ModelBase {
    public function preform() {
        if(!$this->error_info) {
            $DaoComment = new DaoComment();
            $insert['user_id'] = $this->user_info['user_id'];
            $insert['blog_id'] = $this->params['safe']['blog_id'];
            $insert['comment'] = $this->params['safe']['comment'];
            $insert['create_time'] = time();
            $this->result['data'] = $DaoComment->addComment($insert);
        } else {
            $this->result['code'] = 0;
        }
    }

    public function checkparams() {
        if(empty($this->params['safe']['comment'])) {
            $this->error_info = 1;
        } else {
            $this->params['safe']['comment'] = $this->testInput($this->params['safe']['comment']);
        }

        if(empty($this->user_info['user_id']) && !is_numeric($this->user_info['user_id'])) {
            $this->error_info = 1;
        } else {
            $this->params['safe']['user_id'] = $this->testInput($this->params['safe']['user_id']);
        }

        if(empty($this->params['safe']['blog_id']) && !is_numeric($this->params['safe']['blog_id'])) {
            $this->error_info = 1;
        } else {
            $this->params['safe']['blog_id'] = $this->testInput($this->params['safe']['blog_id']);
        }
    }
}