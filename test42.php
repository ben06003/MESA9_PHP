<?php
    if(!isset($_FILES['upload']))    die('server busy');

    $upload=$_FILES['upload'];

    //var_dump() 檢視變數的型態與其型態資料
//    var_dump($upload);
    foreach($upload as $k => $v){
        echo "{$k}:{$v}<hr>";
    }
    //copy(來源,目的)型態ＢＯＯＬＩＮＧ ，在私服端有留備份
    //move_upload_file(來源,目的)型態ＢＯＯＬＩＮＧ，在斯服端沒有留備份
    if($upload['error']==0){
        copy($upload['tmp_name'],
            "test3/{$upload['name']}");
    }
