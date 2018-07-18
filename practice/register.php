<?php
    include_once 'sql.php';
?>
<script>
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200){
            var ret = xhttp.responseText;
            if (ret != 0){
                document.getElementById('mesg').innerHTML = '此帳號有人使用';
            }else{
                document.getElementById('mesg').innerHTML = '此帳號可以使用';
            }
        }
    }
    function isNewAccount() {
        var account = document.getElementById('account').value;
        xhttp.open('GET', 'isNewAccount.php?account=' + account, true);
        xhttp.send();
    }

    function checkNewAccount() {
        if(document.getElementById('mesg').innerHTML == '此帳號有人使用'){
            alert('請kkkk變更使用帳號');
        }else{
            alert('iiii');
            <?php

            if(isset($_REQUEST['account'])){
            $account = $_REQUEST['account'];
            $passwd = password_hash($_REQUEST['passwd'],
                PASSWORD_DEFAULT);
            $nickname = $_REQUEST['nickname'];
            $icon = null;
            if ($_FILES['icon']['error']==0){
                $icon =
                    addslashes(file_get_contents($_FILES['icon']['tmp_name']));
            }
            $sql = "insert into `member` (`account`,`passwd`,`nickname`,`icon`)".
            "values ('{$account}','{$passwd}','{$nickname}','{$icon}')";

            echo $sql;
            if ($mysqli->query($sql)){
                echo $sql;
//                header('Location: login.html');
            }else{
                echo 'insert error';
            }

            }?>
        }
    }
</script>

<form method="post" enctype="multipart/form-data">
    帳號：<input type="text" id="account" name="account" onchange="isNewAccount()"/>
    <span id="mesg"></span><br>
    密碼：<input type="password" name="passwd"/><br>
    暱稱：<input type="text" name="nickname"/><br>
    頭像：<input type="file" name="icon"  accept="image/gif, image/jpeg, image/png"/><br>

    <input type="submit" value="確認" onclick="checkNewAccount()">
</form>
