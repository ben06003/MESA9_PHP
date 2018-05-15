<?php
class Cart{
    private  $list;
    function __construct(){
        $this->list = array();
    }
    function getlist(){
        return $this->list;
    }
    function addProduct($pid,$num){
        $this->list["{$pid}"] = $num;
    }
    function rmProduct($pid){
        unset($this->list["{$pid}"]);
    }
    function getItemNum($pid){
        if(isset($this->list["{$pid}"])){
            return $this->list["{$pid}"];
        }
    }
}