
<?php
    include_once 'sql.php';
    include_once 'Member.php';
    session_start();
    if(isset($_SESSION['member'])){
    $member = $_SESSION['member'];
    $session = $member->nickname;
    }else{
        header('Location:login.html');
    }
    $icon = base64_encode($member->icon);
    $account = $member->account;

?>

<!DOCTYPE html>
<html>
<head>

    <title>即時聊天室</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <link href="css.html" rel="stylesheet">
    <style type="text/css">

            #wrapper {
                position:relative;
                top: 150px;
                margin:0px auto;
                width:300px;
                height:300px;

            }
            #chat_output {
                position:absolute;
                margin:0px auto;
                padding:10px;
                width:300px;
                height:320px;
                border:1px black solid;
                overflow-y:scroll;
                overflow-x:scroll;
            }
            #chat_input {
                position:absolute;
                margin:0px auto;
                top:360px;
                padding:10px;
                width:300px;
                height:50px;
                border:1px solid #ccc;}
            #welcome{
                position:absolute;
                margin:0px auto;
                top: -70px;
                left:100px;
                border:1px black solid;
                width:200px;
                height:40px;
                padding:10px;}
            #online{
                position:absolute;
                margin:0px auto;
                top:-70px;
                left:0;
                border:1px black solid;
                width:80px;
                height:40px;
                padding:10px;}
            #top{
                position:absolute;
                margin:0px auto;
                top:-140px;
                left:0;
                border:1px black solid;
                width:300px;
                height:40px;
                padding:10px;}
    </style>

</head>
<body >
<div id="wrapper">
    <div id="top">即時聊天室</div>
    <div id="chat_output"></div>
    <div id="online"></div>
    <div id="welcome"></div>
        <textarea id="chat_input" placeholder="輸入文字"></textarea>
    <script type="text/javascript">
        // var xhttp = new XMLHttpRequest();
        // xhttp.onreadystatechange = function () {
        //     if (xhttp.readyState == 4 && xhttp.status == 200){
        //         document.getElementById('online').innerHTML =
        //             xhttp.responseText;
        //     }
        // }
        jQuery(function($){
            // Websocket
            var websocket_server = new WebSocket("ws://localhost:8080/");
            websocket_server.onopen = function(e) {
                $('#welcome').html('Hello'+"<img src=\"data:image/jpeg;base64,<?php echo $icon; ?>\"/>"+
                    '<?php echo $session; ?>');
                websocket_server.send(
                    JSON.stringify({
                        'type':'socket',
                        'user_id':'<?php echo $session; ?>',
                        'img':'<?php echo $icon?>'
                    })
                );
            };
            websocket_server.onclose = function (e){
                alert('伺服器已關閉請重新登入');
            };

            websocket_server.onmessage = function(e)
            {
                var json = JSON.parse(e.data);
                switch(json.type) {
                    case 'online':
                        $('#online').html(json.msg);
                        break;
                    case 'chat':
                        $('#chat_output').append(json.msg);
                        break;
                    case 'socket':
                        $('#chat_output').append(json.msg);
                        break;
                }
            }
            // Events
            $('#chat_input').on('keyup',function(e){
                if(e.keyCode==13 && !e.shiftKey)
                {
                    var chat_msg = $(this).val();
                    websocket_server.send(
                        JSON.stringify({
                            'type':'chat',
                            'user_id':'<?php echo $session; ?>',
                            'chat_msg':chat_msg,
                            'img':'<?php echo $icon?>'
                        })
                    );
                    $(this).val('');
                }
            });
                <?php session_destroy();?>
        });

    </script>
</div>
</body>
</html>