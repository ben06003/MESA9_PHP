<?php
    include_once 'sql.php';

    if(isset($_REQUEST['account'])){
        $account = $_REQUEST['account'];
        $password = $_REQUEST['passwd'];
        $name = $_REQUEST['name'];
        $icon = null;
        if($_FILES['icon']['error']){
            $icon = addslashes(file_get_contents($_FILES['icon']['tmp_name']));
        }else{
            $icon = '';
        }
        $sql = "insert into `member` (`accont`,`passwd`,`name`,`icon`)".
    "value ('{$account}','{$password}','{$name}',{$icon})";

        if($mysqli->query($sql)){
        header('Location: login.php');
        }else{
            echo'inser error';
        }
    }

    ?>
<script>
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var ret = xhttp.responseText;
            if(ret != 0){
                document.getElementById('mesg').innerHTML = 'xxxx';
            }else{
                document.getElementById('mesg').innerHTML = 'OK';
            }
        }
    }
    function isNewAccount(){
        var account = document.getElementById('account').value;
        xhttp.open('GET','isNewAccount.php?account='+ account);
        xhttp.send();
    }
</script>
<form method="post" enctype="multipart/form-data">
    Account:<input name="account" onchange="isNewAccount()" id="account"/><span id="mesg"></span><br>
    Password:<input type="password" name="passwd"/><br>
    Real name<input name="name"/><br>
    Icon:<input type="file" name="icon"/><br>
    <input type="submit" value="確認">
</form>