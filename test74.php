<?php
    include_once  'sql.php';

//    $sql ="insert into from product (pname,price,qty)"." values ('ggg',123,11)";
//    $mysqli->query($sql);

    $sql ="insert into from product (pname,price,qty)"." values ('ggg',123,11)";
    $mysqli->prepare($sql);

    $var1 =  'test2';
    $var2 =  123;
    $var3 =  12;