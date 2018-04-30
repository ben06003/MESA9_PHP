<?php
    //傳值
    function test1($var1){
        $var1 += 10;
        return $var1;
    }
    //傳位置的值
    function test2(&$var3){
        $var3 += 10;
    }

    $var1 = 100;
    $var1 = test1($var1);
    echo $var1.'<br>';

    $var4 = 100;
    test2($var4);
    echo $var4;