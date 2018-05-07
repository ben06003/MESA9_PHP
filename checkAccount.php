<?php
    include_once 'sql.php';
    include_once 'Member.php';

    $account= $_REQUEST['account'];
    $passwd = $_REQUEST['passwd'];

    $sql= "select * from member"." where accont='{$account}' and passwd='{$passwd}'";
    $result = $mysqli->query($sql);
//    echo $sql;
//    echo $result->num_rows;
    if($result->num_rows>0){
       $member = $result->fetch_object("Member");
        header('Location:main.php');
    }else{
        header('Location:login.php');
    }