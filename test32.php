<?php
    include_once 'testapis2.php';

    if(isset($_GET['id'])){
        $id=$_GET["id"];

        $isRight = checkTWId($id);
        if($isRight){
            echo'ok';
        }else{
            echo'xx';
        }
    }
?>
<form>
    <input type="text" name="id"/>
    <input type="submit" value="check"/>
</form>
