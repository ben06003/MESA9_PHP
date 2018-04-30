<?php
include'testapis.php';

$result=$hist='';
if (!isset($_GET['answer'])){
    //首次進入
    $answer = createAnswer(4);
}else{
    //之後進入
    $answer = $_GET['answer'];
    $guess = $_GET['guess'];
    $hist=$_GET['hist'];
    $result = checkAB(answer,guess);
    $hist .="{$guess}:{$result}<br>";
}
echo $answer.'<br>';
?>
<form>
    Guess Number:<input type="number" name="guess"/>
    <input type="submit" value="Guess"/>
    <input type="hidden" name="answer" value="<?php echo $answer;?>">
    <input type="hidden" name="answer" value="<?php echo $hist;?>">
</form>
<hr/>
<div>
    <?php
        echo $hist;
    ?>
</div>

