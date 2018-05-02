<?php
    $upload=$_FILES['upload'];
//    foreach($upload as $k => $v){
//          echo "{$k}:{$v}<br>";
//    }
    foreach($upload['error'] as $k=>$v){
        if($v==0){
            if(copy($upload['tmp_name'][$k],
                "test3/{$upload['name'][$k]}")){
                echo 'upload ok'.$upload['tmp_name'][$k].'<br>';
                }else{
                    echo 'upload Fail'.$upload['tmp_name'][$k].'<br>';
                    }
                }
     }


