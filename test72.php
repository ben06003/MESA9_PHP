<?php
    $obj1 = new Mytest2(1,2,3);
    $cont = file_get_contents("https://cloud.culture.tw/frontsite/trans/SearchShowAction.do?method=doFindTypeJ&category=6");

    $root = json_decode($cont);

//    var_dump($root);
    foreach ($root as $k=>$v){
        foreach ($v as $kk=>$vv){
            echo "{$kk}:";
            if(is_array($vv)){
                foreach ($vv as $kkk=>$vvv) {
                    if (is_object($vvv)) {
                        foreach ($vvv as $kkkk => $vvvv) {
                            echo "<li>{$kkkk}:{$vvvv}</li>";
                        }
                    }else{
                        echo $vvv;
                    }
                }
            }else{
                echo"{$vv}";
            }
            echo "<br>";
        }
        echo "<hr>";
    }


    class Mytest2{
        var $x, $y,$z;
        function __construct($x,$y,$z){
            $this->x = $x;
            $this->y = $y;
            $this->z = $z;
        }
    }