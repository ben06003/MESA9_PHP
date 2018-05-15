i am test63 <hr>
<?php
    include_once 'MyOOTest.php';
    session_start();

    if(!isset($_SESSION['s1'])) header('Location:test62.php');
    
    $s1=$_SESSION['s1'];
    echo $s1->calSu() . ':' . $s1->calAvg() . '<hr>>';
?>
<a href="test64.php">test64</a>
