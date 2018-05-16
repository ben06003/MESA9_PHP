<?php
include_once 'sql.php';
include_once 'Member.php';
session_start();
$account = $_REQUEST['account'];
$passwd = $_REQUEST['passwd'];
$sql = "update member set online='1'"." where account='{$account}'";
$mysqli->query($sql);
$sql = "select * from member " .
    "where account=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $account);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0){
    $member = $result->fetch_object("Member");
//        echo $member->id . '<br>';
//        echo $member->name . '<br>';
//        echo $member->account . '<br>';
//        echo $member->passwd . '<br>';
    if (password_verify($passwd , $member->passwd)){
//            $cart = new Cart();
//            $member->setCart($cart);
        $_SESSION['member'] = $member;
        header('Location: main.php');
    }else{
        header('Location: login.html');
    }
}else{
    header('Location: login.html');
}