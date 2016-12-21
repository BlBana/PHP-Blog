<?php

/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/9
 * Time: 0:00
 */
require_once 'ModelBase.class.php';
require_once DIR.'/dao/DaoUser.class.php';
class SubmitRegisteredModel extends ModelBase {

    public function getResult() {
        $this->getParams();
        $this->checkparams();
        $this->preform();
        return $this->error_msg;
    }

    //执行逻辑
    public function preform(){
        $DaoUser = new DaoUser();
        $where["user_name ="] = $this->params['safe']['user_name'];
        $Count = $DaoUser->checkUserExisted($where);
        if($Count) {
            $this->error_msg['checkUserExisted'] = "用户已存在";
        } else if(!empty($this->error_info)) {
                return 0;
        } else {
            //检查用户是否存在
            $data['user_name'] = $this->params['safe']['user_name'];
            $data['password'] = md5($this->params['safe']['password']);
            $data['nick_name'] = $this->params['safe']['nick_name'];
            $data['tips'] = $this->params['safe']['tips'];
            $data['create_time'] = time();
            $ret = $DaoUser->addUser($data);    //插入成功返回1
            print_r($ret);
            return $ret;
        }
        return 0;
    }

    //检测参数
    public function checkparams(){
        if(empty($this->params['safe']['user_name'])) {
            $this->error_info['user_name'] = 1;
            $this->error_msg['user_name'] = "用户名不能为空";
        } else {
            $this->params['safe']['user_name'] = $this->testInput($this->params['safe']['user_name']);
        }

        if(empty($this->params['safe']['password'])) {
            $this->error_info['password'] = 1;
            $this->error_msg['password'] = "密码不能为空";
        } else {
            if($this->params['safe']['password'] == $this->params['safe']['apassword'])
                $this->params['safe']['password'] = $this->testInput($this->params['safe']['password']);
            else {
                $this->error_info['password'] = 1;
                $this->error_msg['password'] = "两次密码输入不一致";
            }
        }

        if(empty($this->params['safe']['nick_name'])) {
            $this->error_info['nick_name'] = 1;
            $this->error_msg['nick_name'] = "昵称不能为空";
        } else {
            $this->params['safe']['nick_name'] = $this->testInput($this->params['safe']['nick_name']);
        }

        if(empty($this->params['safe']['tips'])) {
            $this->error_info['tips'] = 1;
            $this->error_msg['tips'] = "个性签名不能为空";
        } else {
            $this->params['safe']['tips'] = $this->testInput($this->params['safe']['tips']);
        }
    }


}