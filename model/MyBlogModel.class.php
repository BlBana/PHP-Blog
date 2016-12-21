<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/19
 * Time: 20:36
 */
require_once "ModelBase.class.php";
require_once DIR."/dao/DaoBlog.class.php";
require_once DIR."/dao/DaoBlogType.class.php";
require_once DIR."/lib/Tools.class.php";
require_once DIR."/dao/DaoComment.class.php";

class MyBlogModel extends ModelBase {

    public $blog_type = array();



    public function checkparams() {
        $this->params['safe']['page'] = empty($this->params['safe']['page']) ? 1 : $this->params['safe']['page'];
        if(!is_numeric($this->params['safe']['page'])) {
            $this->error_info = 1;
        }
    }

    public function preform() {
        if(!$this->error_info) {
            $DaoBlogType = new DaoBlogType();
            $this->blog_type = $DaoBlogType->getBlogType();
            $DaoBlog = new DaoBlog();
            $blog_list = $DaoBlog->getUserBlogListByUserId($this->user_info['user_id']);
            $blog_list = $this->formartList($blog_list);
            $pageInfo = Tools::_pageInfo($this->params['safe']['page'], count($blog_list), $limit = 4);
            if (is_array($blog_list)) {
                $blog_list = array_slice($blog_list, $pageInfo['start'], $pageInfo['limit']);
            }
            $this->result['pageInfo'] = $pageInfo;
            $this->result['data']['myblog_list'] = $blog_list;
        } else {
            header("Location: ./?action=myblog&page=".intval($this->params['safe']['page']));
        }
    }

    public function formartList($list) {
        if(empty($list)) {
            return false;
        }
        $DaoComment = new DaoComment();
        foreach($list as $key => $value) {
            $commentTotal = $DaoComment->getTotalComment($list[$key]['id']);
            $list[$key]['comment_total'] = $commentTotal;
            $list[$key]['nick_name'] = $this->user_info['nick_name'];
            $list[$key]['create_time'] = date("Y-m-d H:i:s", $value['create_time']);
            $content = strip_tags(htmlspecialchars_decode($value['blog']));
            if(mb_strlen($content, "UTF-8") > 200) {
                $content = mb_substr($content, 0, 200, 'UTF-8')."...";
            }
            $list[$key]['blog_type_name'] = $this->blog_type[$value['blog_type']];
            $list[$key]['blog'] = $content;
        }
        return $list;
    }
}