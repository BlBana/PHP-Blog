<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/18
 * Time: 17:27
 */
require_once "ModelBase.class.php";
require_once DIR."/dao/DaoBlogType.class.php";

class PostBlogModel extends ModelBase {
    public $blog_type = array();

    public function checkparams() {     //检查参数

    }

    public function preform() {     //执行操作
        $Dao = new DaoBlogType();
        $this->blog_type = $Dao->getBlogType();
        $this->result['data']['blog_type'] = $this->blog_type;  //表示文章类型 0 => Web安全 ， 1 => 逆向工程 ， 2 => 社会工程学 , 3 => 安全资讯 , 4 => 经验分享
    }
/*
    public function getResult() {
        $this->getParams();
        $this->checkparams();
        $this->preform();
        return $this->result;
    }
*/
}