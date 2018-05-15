i am test62 <hr>
<?php
    include_once 'MyOOTest.php';
    session_start();

    $s1 = new Student(90,87,94);

    $_SESSION['s1']=$s1;

    ?>
<hr>
<a href="test63.php">test63</a>
