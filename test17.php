<?php
//$p1=$p2=$p3=$p4=$p5=$p6=0;
//if
//for($i=0;$i<100;$i++){
//    $x=rand(1,6);
//    if($x==1){
//        $p1++;
//    }
//    if($x==2){
//        $p2++;
//    }
//    if($x==3){
//        $p3++;
//    }
//    if($x==4){
//        $p4++;
//    }
//    if($x==5){
//        $p5++;
//    }
//    if($x==6){
//        $p6++;
//    }
//}
//switch
//echo "$p1<br>";
//echo "$p2<br>";
//echo "$p3<br>";
//echo "$p4<br>";
//echo "$p5<br>";
//echo "$p6<br>";
//for($i=0;$i<100;$i++){
//    $x=rand(1,6);
//    switch ($x){
//        case 1:$p1++;break;
//        case 2:$p2++;break;
//        case 3:$p3++;break;
//        case 4:$p4++;break;
//        case 5:$p5++;break;
//        case 6:$p6++;break;
//
//    }
//}
//echo "$p1<br>";
//echo "$p2<br>";
//echo "$p3<br>";
//echo "$p4<br>";
//echo "$p5<br>";
//echo "$p6<br>";
//使用array調整
$p=array(1=>0,0,0,0,0,0);
for($i=0;$i<10000;$i++){
    $x=rand(1,6);
    $p[$x]++;
}

for($i=1;$i<=6;$i++){
    echo"{$i}點出現{$p[$i]}次<br>";
}
//調整機率
echo'<hr>';
$p=array(1=>0,0,0,0,0,0);
for($i=0;$i<10000;$i++){
    $x=rand(1,9);
    $p[$x>=7?$x-6:$x]++;
}

for($i=1;$i<=6;$i++){
    echo"{$i}點出現{$p[$i]}次<br>";
}

echo'<hr>';
for($i=1;$i<=count($p);$i++){
    echo"{$i}點出現{$p[$i]}次<br>";
}

//foreach應用，
echo'<hr>';
foreach($p as $key => $value){
    echo "{$key}:{$value}<br>";
}

