<?php
include_once 'Bike.php';
$myId = new TWId('', true, 0);
echo $myId->getId() . '<br>';
if (TWId::checkTWId($myId->getId())){
    echo 'OK';
}else{
    echo 'XX';
}
echo '<hr>';

try{
    $urID=new TWId('A123456788');
    echo $urID->getId().'<br>';
}catch(Exception $e){
    $urID=null;
    echo $e->getMessage();
}

echo '<hr>';