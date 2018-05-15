<?php
    include_once 'sql.php';

    if(isset($_REQUEST['account'])){
        $account = $_REQUEST['account'];
        $password = $_REQUEST['passwd'];
        $sql = "select * from member"." where accont=? and passwd=?";

        $stmt=$mysqli->prepare($sql);
        $stmt->bind_param("ss",$account,$password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>0){
            echo 'OK';
        }else{
            echo "xx";
        }

    }
?>
<h1>Brad Big Company</h1>
<hr>
<form>
    Account:<input type="text" name="account"/><br>
    Password:<input type="password" name="passwd"/><br>
    <input type="submit" value="登入">
    <input type="button" value="註冊" onclick="location.href='register.php'">
</form>