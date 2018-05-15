<?php
    include_once 'sql.php';
    if(isset($_REQUEST['account'])){
        $account = $_REQUEST['account'];
        $passwd = $_REQUEST['passwd'];
        $nickname = $_REQUEST['nickname'];
        $icon = $_REQUEST['icon'];
        $sql = "insert into `member` (`account`,`passwd`,`nickname`,`icon`)".
            "values ('{$account}','{$password}','{$name}','{$icon}')";
        $mysqli->query($sql);

    }

?>

<form >
    帳號：<input type="text" name="account"/><br>
    密碼：<input type="password" name="passwd"/><br>
    論壇名稱：<input type="text" name="nickname"/><br>
    頭像：<input type="file" name="icon"  accept="image/gif, image/jpeg, image/png"/><br>
    頭像預載：<br>
    <img id="preview_progressbarTW_img" src="#" /><br>
    <input type="submit" value="確認">
</form>
