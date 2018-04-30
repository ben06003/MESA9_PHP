<!--form應用-->
<?php
$n=$sum='';
if(isset($_GET['n'])){
    $n=$_GET['n'];
    $sum=0;$i=1;
    while($i<=$n){
        $sum+=$i;
        $i++;
    }

}

?>
<form>
    <input type="number" name="n"/>
    <input type="submit" value="="/>
    <?php
    echo $sum;
    ?>
</form>
