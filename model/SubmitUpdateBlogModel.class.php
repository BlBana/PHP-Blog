<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/20
 * Time: 14:55
 */
require_once "ModelBase.class.php";
require_once DIR."/dao/DaoBlog.class.php";
require_once DIR."/dao/DaoBlogType.class.php";

class SubmitUpdateBlogModel extends ModelBase {
    public $blog_type = array();

    public function checkparams() {
        if(empty($this->params['safe']['title'])) {
            $this->error_info = 1;
        } else {
            $this->params['safe']['title'] = $this->testInput($this->params['safe']['title']);
        }

        if(empty($this->params['safe']['blog_type']) && !is_numeric($this->params['safe']['blog_type'])) {  //不为空并且不能非数字
            $this->error_info = 1;
        } else {
            $this->params['safe']['blog_type'] = $this->testInput($this->params['safe']['blog_type']);
        }

        if(isset($this->params['safe']['show']) && !is_numeric($this->params['safe']['show'])) {
            $this->error_info = 1;
        } else {
            $this->params['safe']['show'] = $this->testInput($this->params['safe']['show']);
        }

        if(empty($this->params['safe']['editorValue'])) {
            $this->error_info = 1;
        } else {
            $this->params['safe']['editorValue'] = $this->testInput($this->params['safe']['editorValue']);
        }

        $this->params['safe']['show'] = !empty($this->params['safe']['show']) ? $this->params['safe']['show'] : 0;
    }

    public function preform() {
        $DaoBlog = new DaoBlog();
        $where['id = '] = $this->params['safe']['id'];
        $Count = $DaoBlog->checkUserExisted($where);
        if(!$Count) {
            $this->result['code'] = 0;
        } else if($this->error_info) {
            $this->result['code'] = 0;
            $DaoBlogType = new DaoBlogType();
            $this->blog_type = $DaoBlogType->getBlogType();
            $this->result['data']['blog_type_list'] = $this->blog_type;
            $DaoBlog = new DaoBlog();
            $blog_list = $DaoBlog->getBlogById($this->params['safe']['id']);
            $blog_list = $blog_list['0'];
            $blog_list = $this->formartBlogList($blog_list);
            if(!empty($blog_list)) {
                $this->result['data']['blogInfo'] = $blog_list;
                $this->result['data']['blog_type_list'] = $this->blog_type;
            }
        } else {
            $update = array();
            $update['title'] = $this->params['safe']['title'];
            $update['blog'] = $this->params['safe']['editorValue'];
            $update['blog_type'] = $this->params['safe']['blog_type'];
            $update['show'] = $this->params['safe']['show'];
            $update['create_time'] = time();
            $where['user_id ='] = $this->user_info['user_id'];
            $ret = $DaoBlog->updateBlog($update, $where);
        }
    }

    public function formartBlogList($blog_list) {
        if(empty($blog_list)) {
            return false;
        }
        $blog_list['blog_type'] = $this->blog_type[$blog_list['blog_type']];    //blog_type内的value都是汉字，不是键值
        $blog_list['blog'] = htmlspecialchars_decode($blog_list['blog']);
        return $blog_list;
    }
}