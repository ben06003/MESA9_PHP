<?php
    $mysqli= new mysqli('localhost','root','root','iii');
    //bool mysqli_set_charset ( mysqli $link , string $charset )
    mysqli_set_charset($mysqli, 'utf8');
    //    $mysqli->set_charset('utf8');

//    $sql1 = 'insert into cust (cname,tel,birthday) '.'value ("test1","123","2000-02-09") ';
//    $sql2 =
//    $sql3 =
    $sql4 = 'select * from cust';
//
    if($result=$mysqli->query($sql4)){
        // ＄result->mysqli_result class 物件實體
        while($data = $result->fetch_assoc()) {
            foreach ($data as $k=>$v){
                echo"{$k}:{$v}<br>";
            }
            echo'<hr>';
        }
    }else{
        echo 'xx';
    }
