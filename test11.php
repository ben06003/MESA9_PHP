<?php
//在數學上true==1,flase==0
//在字串上true==1,flase==''

$var1 = false; $var2 =10; $var3 = '123';
$result = $var1 . $var2;
echo $result.'<br>';
$var1 = true; $var2 =10; $var3 = '123';
$result = $var1 . $var2;
echo $result.'<br>';
$var1 = false; $var2 =10; $var3 = '123';
$result = $var1 + $var2;
echo $result.'<br>';
$var1 = true; $var2 =10; $var3 = '123';
$result = $var1 + $var2;
echo $result.'<br>';