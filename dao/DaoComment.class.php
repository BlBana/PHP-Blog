<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/21
 * Time: 12:48
 */
require_once "DaoBase.class.php";

class DaoComment extends DaoBase {
    protected $table_name = "comment";

    public function addComment($data) {
        return $this->insert($data);
    }

    public function CommentList($blog_id) {
        if(empty($blog_id)) {
            return false;
        }

        $field = array(
            'comment',
            'create_time',
            'user_id',
        );

        $where = array(
            'is_deleted = ' => 0,
            'blog_id =' => $blog_id,
        );
        $type = false;
        $endWith = " order by create_time desc ";
        return $this->select($field, $where, $type, $endWith);
    }

    public function getTotalComment($blog_id) {
        $where = array(
            'blog_id = ' => $blog_id,
            'is_deleted = ' => 0
        );
        return $this->getCount($where);
    }
}