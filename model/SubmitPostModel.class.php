<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/18
 * Time: 22:06
 */
require_once "ModelBase.class.php";
require_once DIR."/Dao/DaoBlogType.class.php";
require_once DIR."/Dao/DaoBlog.class.php";

class SubmitPostModel extends ModelBase {
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

    public function preform() {     //文章内容$this->params['safe']['editorValue']
        if(!$this->error_info) {       //1表示输入内容有误
            $insert = array();
            $insert['title'] = $this->params['safe']['title'];
            $insert['blog'] = $this->params['safe']['editorValue'];
            $insert['blog_type'] = $this->params['safe']['blog_type'];
            $insert['show'] = $this->params['safe']['show'];
            $insert['user_id'] = $this->user_info['user_id'];
            $insert['is_deleted'] = 0;
            $insert['create_time'] = time();
            $DaoBlog = new DaoBlog();
            $ret = $DaoBlog->insertBlog($insert);
        } else {
            $DaoBlogType = new DaoBlogType();
            $this->blog_type = $DaoBlogType->getBlogType();
            $this->result['data']['blog_type'] = $this->blog_type;
            $this->result['code'] = 0;      //说明内容有误
        }
    }


}