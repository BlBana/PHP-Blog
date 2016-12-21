<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/19
 * Time: 0:47
 */
require_once "DaoBase.class.php";

class DaoBlog extends DaoBase {
    protected $table_name = "blog";

    public function insertBlog($data) {
        return $this->insert($data);
    }

    public function getUserBlogListByUserId($user_id) {
        $filed = array(
            'id',
            'title',
            'blog_type',
            'show',
            'blog',
            'user_id',
            'create_time',
        );

        $where = array(
            'user_id =' => $user_id,
            'is_deleted =' => 0,
        );
        $endWith = " order by create_time desc ";
        $type = false;
        return $this->select($filed, $where, $type, $endWith);
    }

    public function getBlogById($id) {
        $filed = array(
            'id',
            'title',
            'blog_type',
            'show',
            'blog',
            'user_id',
            'create_time',
        );

        $where = array(
            'id =' => $id,
            'is_deleted =' => 0,
        );
        $type = false;
        return $this->select($filed, $where, $type);
    }

    public function getBlogList() {
        $filed = array(
            'id',
            'title',
            'blog_type',
            'show',
            'blog',
            'user_id',
            'create_time',
        );
        $where = array('is_deleted =' => 0);
        $type = false;
        $endWith = " order by create_time desc ";
        return $this->select($filed, $where, $type, $endWith);
    }

    public function checkUserExisted($where) {
        return $this->getCount($where);
    }

    public function updateBlog($data, $where) {
        return $this->update($data, $where);
    }
}