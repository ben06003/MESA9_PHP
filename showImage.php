<?php

    if(!isset($_REQUEST['pid'])) header('Location:bmain');

    $pid = $_REQUEST['pid'];

    for($i = 1;$i<=4;$i++){
        $pfile = "test3/p_{$pid}_{$i}.jpg";
        if(file_exists($pfile)){
            echo "<img src='{$pfile}'/>";
        }
    }