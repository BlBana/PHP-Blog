<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/20
 * Time: 19:28
 */
require_once "ModelBase.class.php";
require_once DIR."/dao/DaoBlog.class.php";

class DeleteBlogModel extends ModelBase {
    public function checkparams() {
        if(empty($this->params['safe']['id'])) {
            $this->error_info = 1;
        }
    }

    public function preform() {
        $DaoBlog = new DaoBlog();
        $this->result['data'] = $DaoBlog->getBlogById($this->params['safe']['id']);
        if($this->result['data']['user_id'] != $this->user_info['user_id'] && $this->error_info) {
            header("Location: ./?action=myblog&page=".intval($this->params['safe']['page']));
        } else {
            $delete['is_deleted'] = 1;
            $where['id = '] = $this->params['safe']['id'];
            $this->result['code'] = $DaoBlog->updateBlog($delete, $where) ? 0 : 1;
        }
    }
}