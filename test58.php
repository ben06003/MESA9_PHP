<?php
    include_once 'MyOOtest3.php';
    include_once 'MyOOtest4.php';


    $obj1 = new \tw\brad\utils\Test1();
    $obj1->m1();
    echo '<hr>';
    $obj2 = new \tw\brad\tools\Test1();
    $obj2->m1();
    echo '<hr>';

    //import

    use tw\brad\utils\Test1;    //class
    use tw\brad\tools\Test1 as Test2;   //class
    use function tw\brad\utils\sayYA;

    $obj3 = new Test1();
    $obj3->m1();
    echo '<hr>';
    $obj4 = new Test2();
    $obj4->m1();
    echo '<hr>';
    sayYa();
