<?php
    class Bard01{
        var $name,$age,$weight;
        function __construct($name,$age,$weight){
            $this->name = $name;
            $this->weight = $weight;
            $this->age = $age;
        }
    }

    $a = array(1,2,3,4,5,6);
    $json1 = json_encode($a);
    echo $json1;
    echo '<hr>';
    $root = json_decode($json1);
    var_dump($root);
    echo '<hr>';

    $obj1 = new Bard01('bbb',12,30);
    $obj2 = new Bard01('ccc',13,40);
    $obj3 = new Bard01('ddd',14,50);
    $obj4 = new Bard01('eee',15,60);

    $json2 = json_encode($obj1);
    echo $json2.'<hr>';
    $root = json_decode($json2);
    foreach ($root as $k=>$v){
        echo "{$k}:{$v}<br>";
    }

    $b= array($obj1,$obj2,$obj3,$obj4);
    $json3 = json_encode($b);
    echo $json3.'<hr>';
    $root = json_decode($json2);
    foreach ($root as $json2){
        foreach ($json2 as $kk=>$vv){
            echo "{$kk}:{$vv}<br>";
        }
    }