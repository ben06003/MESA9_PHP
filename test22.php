<?php
    //do......while 進入do直接進入並執行{},{}內結果while判斷後為false離開，若{}內結果while判斷後為true,再重新執行{}
    $var1 = 1;
    do{
        echo "{$var1}<br>";
        $var1++;


    }while($var1<=10);
?>