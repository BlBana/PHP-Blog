<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/9
 * Time: 1:00
 */
require_once "ModelBase.class.php";
require_once DIR."/dao/DaoUser.class.php";

class SubmitLoginModel extends ModelBase {
    public function checkparams() {
        if(empty($this->params['safe']['user_name'])) {
            $this->result['name_code'] = 1;
        } else {
            $this->params['safe']['user_name'] = $this->testInput($this->params['safe']['user_name']);
        }

        if(empty($this->params['safe']['password'])) {
            $this->result['password_code'] = 1;
        }
    }

    public function preform() {
        $DaoUser = new DaoUser();
        $ret = $DaoUser->getUserInfoByUsernameAndPassWord($this->params['safe']['user_name'], $this->params['safe']['password']);
        if(empty($ret)) {
            $this->result['name_code'] = 1;
        }
        $this->result['data'] = $ret[0];
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