<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/18
 * Time: 19:13
 */
require_once "DaoBase.class.php";

class DaoBlogType extends DaoBase {

    protected $table_name = "blog_type";

    public function getBlogType() {
        $fileds = array('blog_type');
        $result = $this->select($fileds, $where = false, $type = true); //type=true,以索引形式返回结果；type=false，以关联数组，默认为false（默认关联数组）
        return $result;
    }
}