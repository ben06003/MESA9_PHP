<?php
$fp = fopen("https://zh.wikipedia.org/wiki/UNIX",'r');

while($c=fgets($fp)){
    echo $c.'<br>';
}
fclose($fp);