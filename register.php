<?php
    include_once 'sql.php';

    if(isset($_REQUEST['account'])){
        $account = $_REQUEST['account'];
        $password = $_REQUEST['passwd'];
        $name = $_REQUEST['name'];

        $sql = "insert into `member` (`accont`,`passwd`,`name`)".
    "value ('{$account}','{$password}','{$name}')";

        if($mysqli->query($sql)){
        header('Location: login.php');
        }else{
            echo'inser error';
        }
    }

    ?>

<form>
    Account:<input name="account"/><br>
    Password:<input type="password" name="passwd"/><br>
    Real name<input name="name"/><br>
    <input type="submit" value="確認">
</form>