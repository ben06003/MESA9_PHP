<?php
    //resource imagecreatefromjpeg ( string $filename )
    $img = imagecreatefromjpeg('coffee.jpg');
    $blue = imagecolorallocate($img,0,0,255);
    //array imagefttext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text [, array $extrainfo ] )

    imagefttext ( $img, 24 , 0, 100, 300, $blue ,"Bold.ttf" ,"Hellow,World");

    header("Content-type:image/jpeg");
    //  bool imagejpeg ( resource $image [, mixed $to [, int $quality ]] )
    imagejpeg($img);
    //清除記憶體
    //bool imagedestroy ( resource $image )
    imagedestroy($img);