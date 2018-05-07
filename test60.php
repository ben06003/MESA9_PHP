<?php
$password='123456';

$newpasswd=password_hash($password,PASSWORD_BCRYPT);

echo$password.'<br>';
echo $newpasswd.'<br>';
if($password_verify($password,$newpasswd)){

}
