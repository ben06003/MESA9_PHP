<?php
    //陣列寫法
    $a1[0] = 123;
    $a1[1] = 12.3;
    $a1[2] = 'brad';
    var_dump($a1);

    echo'<hr>';
    $a2[0]=123;
    $a2[1]=12.3;
    $a2[4]='brad';
    var_dump($a2);

    echo'<hr>';
    $a3['name']='Brad';
    $a3['weight']=80;
    $a3['gender']=true;
    $a3['age']=53;
    $a3[123]=345;
    var_dump($a3);

    echo'<hr>';
    $a4=array(12,32,45,'rrr',true);
    var_dump($a4);

    echo'<hr>';
    $a1[]=111;
    $a1[]=222;
    var_dump($a1);

    //陣列裡[]內不指定，從最大值後面+1
    echo'<hr>';
    $a2[]=111;
    $a2[]=222;
    var_dump($a1);


