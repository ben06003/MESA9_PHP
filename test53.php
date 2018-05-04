<?php
    include_once 'Bike.php';

    $m1 = new Member();
    $m1->id = '123';
    $m1->name= 'Brad';
    echo $m1->id.':'.$m1->name.'<br>';