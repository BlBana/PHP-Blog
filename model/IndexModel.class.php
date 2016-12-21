<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/8
 * Time: 18:55
 */
require_once 'ModelBase.class.php';
require_once DIR.'/dao/DaoBlogType.class.php';
require_once DIR.'/dao/DaoBlog.class.php';
require_once DIR.'/lib/Tools.class.php';
require_once DIR.'/dao/DaoUser.class.php';
require_once DIR.'/dao/DaoComment.class.php';

class IndexModel extends ModelBase {
    public $blog_type = array();
    //执行逻辑
    public function preform() {
        if(!$this->error_info) {
            $DaoBlogType = new DaoBlogType();
            $this->blog_type = $DaoBlogType->getBlogType();
            $DaoBlog = new DaoBlog();
            $list = $DaoBlog->getBlogList();
            $pageInfo = Tools::_pageInfo($this->params['safe']['page'], count($list), $limit = 4);

            if (is_array($list)) {
                $list = array_slice($list, $pageInfo['start'], $pageInfo['limit']);
            }

            $DaoUser = new DaoUser();
            $hot_user = $DaoUser->getUser();
            $this->result['hot_user'] = $hot_user;
            $list = $this->formartList($list);
            $this->result['data']['list'] = $list;
            $this->result['pageInfo'] = $pageInfo;
        }
    }

    //检测参数
    public function checkparams() {
        $this->params['safe']['page'] = empty($this->params['safe']['page']) ? 1 : $this->params['safe']['page'];
        if(!is_numeric($this->params['safe']['page'])) {
            $this->error_info = 1;
        }
    }

    public function formartList($list) {
        if(empty($list)) {
            return false;
        }
        $DaoUser = new DaoUser();
        $DaoComment = new DaoComment();
        foreach ($list as $key => $value) {
            $commentTotal = $DaoComment->getTotalComment($list[$key]['id']);
            $list[$key]['nick_name'] = $this->user_info['nick_name'];
            $list[$key]['create_time'] = date("Y-m-d H:i:s", $value['create_time']);
            $list[$key]['comment_total'] = $commentTotal;
            $value['blog'] = htmlspecialchars_decode($value['blog']);
            $content = strip_tags($value['blog']);

            if(mb_strlen($content, "UTF-8") > 200) {
                $content = mb_substr($content, 0, 200, 'UTF-8')."...";
            }
            $list[$key]['blog_type_name'] = $this->blog_type[$value['blog_type']];
            $list[$key]['blog'] = $content;
            $user_info = $DaoUser->getUserInfoByUserId($value['user_id']);
            $list[$key]['user_info'] = $user_info[0];
        }
        return $list;
    }
}