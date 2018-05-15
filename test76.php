<?php
    $cont = file_get_contents('books.xml');

     $xml = simplexml_load_string($cont);
     $errors = libxml_get_errors();
     foreach ($errors as $v){
         echo "Error:{$v}<br>";
     }

     var_dump($xml);
     echo '<hr>';
     echo $xml->getName() . ":" . $xml->count();
     echo '<hr>';
     foreach ($xml as $v){
         echo $v->getName() . '<br>';
     }
     echo '<hr>';
     //取得標籤內的屬性and其值
     $attrs = $xml->book[0]->attributes();
     foreach($attrs as $k=>$v){
         echo  "{$k}:{$v}<br>";
     }
    echo '<hr>';
     $cs = $xml->book[0]->children();
     foreach ($cs as $k => $v){
         echo"{$k}:{$v}<br>";
         if(is_object($v)){
             echo'<hr>';
             foreach($v as $kk=>$vv){
                 echo"{$kk}:{$vv}<br>";
             }
         }
     }
