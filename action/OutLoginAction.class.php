<?php
/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/18
 * Time: 15:52
 */
require_once "ActionBase.class.php";

class OutLogin extends ActionBase {
    public function action() {
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }

        session_destroy();
        header("Location: index.php");
    }
}