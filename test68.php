<?php

    $max=49;
    if(isset($_REQUEST)) {
        $max = $_REQUEST['max'];
    }
    echo rand(1,$max);
