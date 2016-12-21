<?php

/**
 * Created by PhpStorm.
 * User: BBana
 * Date: 2016/12/8
 * Time: 21:25
 */
class DaoBase
{
    protected $table_name;
    private $mysqli;
    public function __construct() {
        if(empty($this->table_name)) {
            die('table_name is null');
        }
        $this->getDbConnect();
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }

    public function getDbConnect() {
        $this->mysqli = new mysqli('localhost', 'root', '07191226', 'blog');
        $this->mysqli->set_charset("utf8");
        if(mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

    protected function select($filed, $where = false, $type = false, $endWith = false) {
        if(empty($filed)) {
            return false;
        }
        $sql = "";
        $filed = self::createFiled($filed);
        $where = self::createWhere($where);

        $sql .= "select ".$filed." from ".$this->table_name." ".$where." ".$endWith;
        $result = $this->mysqli->query($sql);
        $result = self::fomatSqlResult($result, $type);
        return $result;
    }

    protected function getCount($where) {
        $sql = "";
        $where = self::createWhere($where);
        $sql .= "select count(*) as total from ".$this->table_name." ".$where;
        $result = $this->mysqli->query($sql);
        $result = self::fomatSqlResult($result);

        return $result[0]['total'];
    }

    public function insert($data) {
        $filed = "(";
        $values = "(";

        foreach ($data as $k => $v) {
            $filed .= "`$k`,";
            $values .= "'$v',";
        }
        $filed = trim($filed, ",").')';
        $values = trim($values, ",").')';
        $insert = "insert into ".$this->table_name.$filed." values ".$values;
        $result = $this->mysqli->query($insert);
        return $result;
    }

    public function update($data, $where = false) {
        $filed = "";
        foreach($data as $k => $v) {
            $filed .= "`$k` = '$v',";
        }

        $filed = trim($filed, ',');

        $where = self::createWhere($where);
        $update = "update ".$this->table_name." set ".$filed." ".$where;
        $result = $this->mysqli->query($update);
        return $result;
    }

    public function delete($where) {
        $data = array('is_deleted' => 1);   //is_deleted 逻辑表示是否删除
        return $this->update($data ,$where);
    }

    private static function fomatSqlResult($result, $type = false) {
        $ret = array();
        if(!$type) {
            while ($row = $result->fetch_assoc()) {
                $ret[] = $row;
            }
        } else {
            while ($row = $result->fetch_array( MYSQLI_NUM )) {
                $ret[] = $row[0];
            }
        }
        return $ret;
    }

    private static function createFiled($filed) {
        $sql = "";
        foreach($filed as $key => $value) {
            $sql .= " `$value`,";
        }
        return trim($sql, ',');
    }

    private static function createWhere($where) {
        if(empty($where)) {
            return false;
        }
        $sql = " where ";
        foreach ($where as $key => $value) {
            $sql .= " ".$key." '$value' "."and";
        }
        return trim($sql, 'and');
    }

}