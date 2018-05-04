<?php
class Bird
{
    var $leg;

    public function setLeg($leg)
    {
        if ($leg >= 0 && $leg <= 2) {
            $this->leg = $leg;
        } else {
            //throw new Exception();
            $e = new Exception('error leg');
            throw $e;
        }
    }
}


$bird = new Bird();
try{
    $bird->setLeg(3);
    echo $bird->leg;
}catch(Exception $e){
    echo $e->getMessage().'<br>';
    $bird->setLeg(2);
    echo $bird->leg;
}