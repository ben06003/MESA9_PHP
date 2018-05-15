<?php
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function test1() {
        $("#id1").load("test68.php",function(text,status,xhttp){
            console.log(text+":"+status);
            $("#id2").html(++text);
        })
    }
    $(document).ready(function () {
        $("#btn1").click(function () {
            $.get('test68.php',function(data,status){
                $("#id2").html(data + ":" + status);
            })
        });
    })

    $(document).ready(function () {
        $("#btn2").click(function () {
            $.post('test69.php',
                {max:10},
                function(data,status){
                $("#id3").html(data + ":" + status);
            })
        });
    })

</script>
<input type="button" onclick="test1()" value="111">

<div id="id1"></div>
<div id="id2"></div>
<div id="id3"></div>

<button id="btn1">Click me</button><br>
<button id="btn2">click me2</button>