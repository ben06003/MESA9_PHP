<?php
    foreach($_REQUEST as $key => $value){
        if(gettype($value)=='array'){
            foreach ($value as $k => $v){
                echo "{$k}:{$v}";
            }
        }else{
            $value=nl2br($value);
            echo "{$key}:{$value}<br>";
        }
    }