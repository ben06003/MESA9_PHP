<?php
    include_once 'sql.php';
    include_once 'Member.php';
    include_once 'Cart.php';
    session_start();

    $account= $_REQUEST['account'];
    $passwd = $_REQUEST['passwd'];


    $sql = "select * from member"." where accont=? and passwd=?";

    $stmt=$mysqli->prepare($sql);
    $stmt->bind_param("ss",$account,$passwd);
    $stmt->execute();
    $result = $stmt->get_result();
//    echo $sql;
//    echo $result->num_rows;
    if($result->num_rows>0){
       $member = $result->fetch_object("Member");
       $_SESSION['member'] = $member;
       $_SESSION['cart']= new Cart();
        header('Location:main.php');
    }else{
        header('Location:login.php');
    }