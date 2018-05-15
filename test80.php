<?php
    include_once 'test81.php';

    $x = $_REQUEST['x'];
    $y = $_REQUEST['y'];

    $result = calXY($x,$y);

//    header("Location: test82.php?result={$result}");

    $view = file_get_contents('test82.html');
    str_replace('###',$result,$view);
    echo $view;