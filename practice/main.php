
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
    echo $icon;
?>

<!DOCTYPE html>
<html>
<head>
    <img src="data:image/jpeg;base64,<?php echo $icon; ?>"/>
    <title>Chat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <link href="css.html" rel="stylesheet">
    <style type="text/css">
        * {margin:0;padding:0;box-sizing:border-box;font-family:arial,sans-serif;resize:none;}
        html,body {width:100%;height:100%;}
        #wrapper {position:relative;margin:auto;width:100%;height:100%;}
        #chat_output {position:absolute;top:5%;left:18%;padding:10px;width:80%;height:80%;border:1px black solid;
            overflow-y:scroll;overflow-x:scroll;}
        #chat_input {position:absolute;bottom:10px;left:18%;padding:10px;width:80%;height:50px;border:1px solid #ccc;}
        #online{position:absolute;top:5%;left:10px;bottom:0;border:1px black solid;width:15%;height:80%;padding:10px;}
    </style>
</head>
<body >
<div id="wrapper">
    <div id="online">

    </div>
    <div id="chat_output"></div>
    <textarea id="chat_input" placeholder="Deine Nachricht..."></textarea>
    <script type="text/javascript">
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200){
                document.getElementById('online').innerHTML =
                    xhttp.responseText;
            }
        }
        jQuery(function($){
            // Websocket
            var websocket_server = new WebSocket("ws://localhost:8080/");
            websocket_server.onopen = function(e) {
                websocket_server.send(
                    JSON.stringify({
                        'type':'socket',
                        'user_id':'<?php echo $session; ?>',
                        'img':'<?php echo $icon?>'
                    })
                );
            };
            websocket_server.onerror = function(e) {
                // Errorhandling
            }
            websocket_server.onmessage = function(e)
            {
                xhttp.open('GET', 'inAndOutRoom.php', true);
                xhttp.send();
                var json = JSON.parse(e.data);
                switch(json.type) {
                    case 'chat':
                        $('#chat_output').append("<img src=\'data:image/jpeg;base64\',\'json.img\'/>"+json.msg);
                        break;
                    case 'socket':
                        $('#chat_output').append("<img src=\"data:image/jpeg;base64,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\"/>"+json.msg);
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
        });

    </script>
</div>
</body>
</html>