<?php
    $x=$_GET['x'];
    echo $x . ':' . gettype($x).'<br>';
    $y=$_GET['y'];

    $z=$x+$y;

    echo "{$x}+{$y}={$z}".'<BR>';
    var_dump($x);
    var_dump($y);