<?php
    for($i=0;$i<10;$i++){
        $rand=rand(1,10);
        $isrepeat=false;
        for($j=0;$j<$i;$j++){
            if($poker[$j]==$rand){
                $isrepeat=true;
                break;
            }
        }
        if($isrepeat==false){
            $poker[$i]=$rand;
        }else{
            $i--;
        }
    };
    foreach ($poker as $v){
        echo $v.'<br>';
    }
