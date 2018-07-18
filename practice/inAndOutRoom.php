<?php
include_once 'Member.php';
include_once 'sql.php';
if(isset($_GET['account'])){
    $account= $_GET['account'];
    $sql = "update member set online='0'"." where account='{$account}'";
    $mysqli->query($sql);
    $sql = "select * from member where online='1'";
    $result = $mysqli->query($sql);
    $j = $result->num_rows;
    echo "上線人數:{$j}<hr>";
    for ($i = 0; $i < $j; $i++) {
        $member = $result->fetch_object("Member");
        if ($member->online == 1) {
            echo $member->nickname . '<br>';
        }
    }
}else {
    $sql = "select * from member where online='1'";
    $result = $mysqli->query($sql);
    $j = $result->num_rows;
    echo "上線人數:{$j}<hr>";
    for ($i = 0; $i < $j; $i++) {
        $member = $result->fetch_object("Member");
        if ($member->online == 1) {
            echo $member->nickname . '<br>';
        }
    }
}