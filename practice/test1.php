<?php
include_once 'sql.php';
?>
<script>
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById('view').innerHTML =
                xhttp.responseText;
        }
    }
    function auto(){
        xhttp.open('GET', 'inAndOutRoom.php', true);
        xhttp.send();
    }
    function inRoom() {
        var value = 0;
        xhttp.open('GET', 'inAndOutRoom.php?value=' + value, true);
        xhttp.send();
    }
    function outRoom() {
        var value = 1;
        xhttp.open('GET', 'inAndOutRoom.php?value=' + value, true);
        xhttp.send();
    }
    setInterval(auto,1000)
    </script>

<button onclick="inRoom()" value="inRoom">inRoom</button>

    <button onclick="outRoom()" value="outRoom">outRoom</button>

        <div id="view"></div>