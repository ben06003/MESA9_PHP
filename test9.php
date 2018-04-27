<?php
    $z=$x=$y='';
    $op=1;
if(isset($_GET['x'])){
    $x=$_GET['x'];
    $y=$_GET['y'];
    $op=$_GET['op'];

    if($op==1){
        $z=$x+$y;}
        else if($op==2){
            $z=$x-$y;}
        else if($op==3){
            $z=$x*$y;}
        else if($op==4){
            $a=(int)($x/$y);
            $b=$x-($a*$y);
            $z=$a . '......' . $b;}
}
    ?>
<form>
    <input type="text" name="x" value="<?php echo $x;?>"/>
    <select name="op">
        <option value="1" <?php if($op==1){echo 'selected';};?>>+</option>
        <option value="2" <?php if($op==2){echo 'selected';};?>>_</option>
        <option value="3" <?php if($op==3){echo 'selected';};?>>*</option>
        <option value="4" <?php if($op==4){echo 'selected';};?>>/</option>
    </select>

    <input type="text" name="y" value="<?php echo $y;?>">
    <input type="submit" value="=">
    <?php
    if($z!='' && $b!=0){
    echo $z;}
    if($b==0){
        echo $a;
    }
    ?>
</form>
