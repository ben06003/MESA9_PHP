<!DOCTYPE HTML>

<html>
<head>

    <script type = "text/javascript">
        //透過伺服器傳送文字給所有使用者
        function sendText() {
            var msg = {
                type: "message",
                text: document.getElementById("text").value,
                id: clientID,
                date: Date.now()
            };

            mySocket.send(JSON.stringify(msg));
            document.getElementById("text").value = "";
        }

        function WebSocketTest() {
            var ws = new WebSocket("ws://localhost:9998/echo");
            if ("WebSocket" in window) {
                alert("WebSocket is supported by your Browser!");

                // Let us open a web socket
                ws.onopen = function() {

                    // Web Socket is connected, send data using send()
                        ws.send("Message to send");
                    alert("Message is sent...");
                };

                ws.onmessage = function (evt) {
                    var received_msg = evt.data;
                    alert("Message is received...");
                };

                ws.onclose = function() {

                    // websocket is closed.
                    alert("Connection is closed...");
                };
            } else {

                // The browser doesn't support WebSocket
                alert("WebSocket NOT supported by your Browser!");
            }
        }
    </script>


</head>

<body>
<div id = "sse">
    <a href = "javascript:WebSocketTest()">Run WebSocket</a>
</div>

</body>
</html>