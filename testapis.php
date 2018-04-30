<?php
function createAnswer($n){
    $tmp = range(0,9);
    shuffle($tmp);
    $ret='';
    for($i=0;$i<$n;$i++) {
    $ret .= $tmp[$i];
    }
    return $ret;
}

function checkAB($a,$b){
    //strlen
    $A=$B=0;
    for($i=0;$i<strlen($a);$i++){
        if(substr($a,$i,1)===substr($b,$i,1)){
            $A++;
        }else if(strpos($a,substr($b,$i,1))!==false){
            $B++;
        }
    }
}
