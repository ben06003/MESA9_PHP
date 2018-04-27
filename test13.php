<?php
//年，月，天數
     $x=$y=$z='';
if(isset($_GET['x'])) {
    $x = $_GET['x'];
    $y = $_GET['y'];


    if($x/4==int && $x/100!=int) {
        $z=366;
    }
    if($x/4==int && $x/100==int && $x/400!=int){
        $z=365;
    }
    if($x/4==int && $x/100==int && $x/400==int){
        $z=366;
    }

}

?>

<form>
   <input type="text" name="x" value="<?php echo $x;?>"/>
    年
    <input type="submit" value="判斷閏年">
    <?php
    if($z!=''){
    echo $z;
    }
    ?>
</form>


