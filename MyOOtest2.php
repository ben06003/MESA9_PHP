<?php
// 定義規格:介面
interface Shape{
    function calLength();
    function calArea();
}
interface IOS{
    function exam1();
}
interface ZCE{
    function exam2();
}
class Rectangle implements Shape{
    function calLength(){
        echo'123';
    }
    function calArea(){
        echo'456';
    }
}

class Triangle implements Shape{
    function calLength(){
        echo'456';
    }
    function calArea(){
        echo'789';
    }
}

class Student1 implements IOS,ZCE{
     function exam1()
    {

    }
    function exam2(){

    }
}
class Student2 implements IOS{
    function exam1()
    {

    }
}
class Student3 implements ZCE{
    function exam2(){

    }
}

trait test1{
    function m1(){
        echo 'Test1:m1()';
    }
}
trait test2{
    function m2(){
        echo 'Test2:m2()';
    }
    function m3(){
        echo 'Test3:m3()';
    }
}

class Test3{
    use test1;
    use test2;

}