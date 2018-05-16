<?php
include_once 'Member.php';
include_once 'sql.php';

$sql = "select * from member where online='1'";
$result=$mysqli->query($sql);
$j = $result->num_rows;
echo"上線人數:{$j}<hr>";
for($i=0;$i<$j;$i++) {
    $member = $result->fetch_object("Member");
    if ($member->online == 1) {
        echo $member->nickname.'<br>';
    }
}