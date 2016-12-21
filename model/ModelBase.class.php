<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/8
 * Time: 18:56
 */
abstract class ModelBase {
    public $params;
    public $result;     //结果集
    public $error_info = 0; //0表示没有错误，1表示出错
    public $error_msg;  //存放报错信息
    public $user_info;
    //检测参数
    public abstract function checkparams();
    //执行逻辑
    public abstract function preform();

    //执行器
    public function getResult($user_info = false) {
        $this->user_info = $user_info;
        $this->getParams();
        $this->result = array(
            'code' => 1,
            'error_msg' => '',
            'data' => '',
            'params' => $this->params,
        );
        $this->checkparams();
        $this->preform();
        return $this->result;
    }

    public function getParams() {
        $params = $_REQUEST;
        $arr = array();
        foreach ($params as $key => $value) {
            $arr['unsafe'][$key] = $value;
            $arr['safe'][$key] = addslashes($value);
        }
        $this->params = $arr;
    }

    //过滤参数
    public function testInput($form) {
        $form = trim($form);
        $form = stripslashes($form);
        $form = htmlspecialchars($form);
        return $form;
    }


}