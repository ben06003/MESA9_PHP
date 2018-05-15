<?php
include_once 'sql.php';
include_once 'Product.php';
include_once 'Cart.php';

session_start();
$Cart = $_SESSION['cart'];
$pid = $_REQUEST['pid'];
$num = $_REQUEST['num'];
$Cart->addProduct($pid, $num);

foreach ($Cart->getList() as $k=>$v){
    echo "{$k}:{$v}";
}