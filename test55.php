<?php
include_once 'MyOOtest2.php';

$obj1= new Rectangle();
$obj2= new Triangle();

calShapeArea($obj1);
echo '<hr>';
calShapeArea($obj2);
echo '<hr>';

function calShapeArea(Shape $shape){
    $shape->calArea();
}

$s1 = new Student1();
$s2 = new Student2();
$s3 = new Student3();

if($s2 instanceof IOS){
    echo 'ok';
}else{
    echo 'xx';
}