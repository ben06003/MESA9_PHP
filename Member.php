<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/5/7
 * Time: 下午2:18
 */

class Member{
    private $id, $name, $accont, $passwd;

    function __get($name){
    return $this->$name;
    }
    function __set($name, $value){
        $this->$name = $value;
    }
}