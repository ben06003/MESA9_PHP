<?php
//switch 寫法
//沒有break敘述句，echo會繼續往後流
//case 後面只能有一值
//default 當case皆未符合，才跳至default判斷。
    $v =10;

    switch ($v){
        case 1:
            echo'Ａ';
            break;
        case 10:
            echo'B';
            break;
        case 100:
            echo'C';
            break;
        default:
            echo'Ｘ';
            break;
    }

    echo'<hr>';

    $m=rand(1,12);

    switch($m){
        case 1;
            echo'31';
            break;
        case 2;
            echo'28';
            break;
        case 3;
            echo'31';
            break;
        case 5;
            echo'31';
            break;
        case 7;
            echo'31';
            break;
        case 8;
            echo'31';
            break;
        case 10;
            echo'31';
            break;
        case 12;
            echo'31';
            break;
        default:
            echo'30';
            break;
    }


echo'<hr>';

$m=rand(1,12);

switch($m){
    case 1;
    case 3;
    case 5;
    case 7;
    case 8;
    case 10;
    case 12;
        echo'31';
        break;
    case 2;
        echo'28';
        break;
    default:
        echo'30';
        break;
}

echo'<hr>';

$a='1';
    switch($a){
        case 1:echo'A';break;
        case 1:echo'B';break;
        case 1:echo'C';break;
        default:echo'X';
    }



