<?php
   sayYa();sayYa();sayYa();
   sayHello('Brad');
   sayHelloV2('King');
   sayHelloV3($n=4);
   sayHelloV3($n=4,'King');
   sayHelloV4();
   sayHelloV4(123);
   sayHelloV4('King');
   sayHelloV4(123,'King');


   function sayYa(){
       echo'Ya<br>';
   }

   function sayHello($name){
       echo"Hello,{$name}<br>";
   }

    function sayHelloV2($name='World'){
        echo"Hello,{$name}<br>";
    }

    //有預設的選項可往後擺，無預設的必要條件需擺前面
    //錯誤：function sayHelloV3($name='World'，$n)
    function sayHelloV3($n,$name='World')
    {
        for ($i = 0; $i < $n; $i++) {
            echo "Hello,{$name}<br>";
        }
    }
    function sayHelloV4(){
        $n=func_get_args(); //捕抓所有傳遞進來的參數＝>array
        foreach($n as $k=>$v){
            echo "{$k}:{$v}<br>";
        }
    }



