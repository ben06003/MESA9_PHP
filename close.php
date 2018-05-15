<?php
    include_once 'sql.php';
    include_once 'Member.php';
    include_once 'Cart.php';

    session_start();

    $cart = $_SESSION['cart'];
    $member = $_SESSION['member'];

    foreach ($cart->getList() as $pid => $sum){
        $cid = $member->id;
        $sql="insert into `order` (pid,cid,amount,odate)" .
        " values ($pid,$cid,$sum,now())";
        $mysqli->query($sql);

    }
