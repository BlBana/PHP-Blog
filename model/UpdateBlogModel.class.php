<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/20
 * Time: 13:48
 */
require_once "ModelBase.class.php";
require_once DIR."/dao/DaoBlogType.class.php";
require_once DIR."/dao/DaoBlog.class.php";

class UpdateBlogModel extends ModelBase {
    public $blog_type;

    public function checkparams() {
        if(empty($this->params['safe']['id']) && !is_numeric($this->params['safe']['id'])) {
            $this->error_info = 1;
        }
    }

    public function preform() {
        $DaoBlogType = new DaoBlogType();
        $this->blog_type = $DaoBlogType->getBlogType();

        if(!$this->error_info) {
            $DaoBlog = new DaoBlog();
            $blog_list = $DaoBlog->getBlogById($this->params['safe']['id']);
            $blog_list = $blog_list['0'];
            $blog_list = $this->formartBlogList($blog_list);
            if(!empty($blog_list)) {
                $this->result['data']['blogInfo'] = $blog_list;
                $this->result['data']['blog_type_list'] = $this->blog_type;
            }
        } else {
            header("./?action=updateblog&id=$this->user_info['user_id']");
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