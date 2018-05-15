<?php
class Message{

}
    include_once 'sql.php';
    include_once 'Member.php';

    $mesg = new Message();
    if(isset($_REQUEST['account'])&&isset($_REQUEST['passwd'])){
        $account = $_REQUEST['account'];
        $passwd = $_REQUEST['passwd'];
        $sql = "select * from member where accont={$account}";

        $result = $mysqli->query($sql);


        if($result->num_rows>0){
            $member = $result->fetch_object("Member");
            $mesg->status='1';
            $mesg->name = $member->name;
        }else{
            $mesg->status='2';
            $mesg->message='error' ;
        }
    }else{
        $mesg->status='3';
        $mesg->message='data error' ;
    }

    echo json_encode($mesg);