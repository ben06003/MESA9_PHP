<?php
    if(!isset($_GET['account'])) die();

    include_once 'sql.php';

    $account = $_GET['account'];
    $sql = "select accont from member where accont='{$account}'";

    $result = $mysqli->query($sql);

    echo $result->num_rows;