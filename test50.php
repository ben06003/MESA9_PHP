<?php
    include_once 'Bike.php';

    $myBike = New Bike();

    echo $myBike->getSpeed().'<br>';
    $myBike->upSpeed();
echo $myBike->getSpeed().'<br>';
$myBike->upSpeed();
$myBike->upSpeed();
$myBike->upSpeed();
echo $myBike->getSpeed().'<br>';
