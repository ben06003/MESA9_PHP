<script>
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var ret = xhttp.responseText;
                if(ret.substr(0,3) == 'num'){

                }else{

                }
        }
    }
    function test1(){
        var max = document.getElementById("max").value;

        xhttp.open('GET','test68.php?max=' + max);
        xhttp.send();
    }
    function test2(){
        var max = document.getElementById("max").value;

        xhttp.open('POST','test69.php');
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xhttp.send("max=" + max);
    }
    function test3() {
        setInterval(test1,1000*3)
    }

    setInterval(function () {
        xhttp.open('GET','test70.php');
        xhttp.send();
    },1000);
</script>
<input type="number" id="max" value=""/>
<input type="button" onclick="test1()" value="發送"><br>
<input type="button" onclick="test2()" value="發送2"><br>
<input type="button" onclick="test3()" value="發送3"><br>

<hr>
<div id="here"></div>
<hr/>
<div id="num"></div>