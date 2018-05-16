<?php
include_once 'sql.php';
include_once 'Member.php';

$sql = "select * from member where online='1'";
echo $sql;
$result=$mysqli->query($sql);
$j = $result->num_rows;
for($i=0;$i<$j;$i++){
$member = $result->fetch_object("Member");
echo $member->noline;
echo '<hr>';
}