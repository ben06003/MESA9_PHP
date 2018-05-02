<?php
    $rate=$_GET['rate'];
    //產生畫布
    //resource imagecreatetruecolor ( int $width , int $height )
    $img=ImageCreateTrueColor(400,40);
    //開始作畫
    //int imagecolorallocate ( resource $image , int $red , int $green , int $blue )
    $yellow=imagecolorallocate($img,255,255,0);
    $red=imagecolorallocate($img,255,0,0);
    //bool imagefill ( resource $image , int $x , int $y , int $color )
    ImageFill($img,0,0,$yellow);
    //bool imagefilledrectangle ( resource $image , int $x1 , int $y1 , int $x2 , int $y2 , int $color )
    imagefilledrectangle($img,0,0,400*$rate/100,40,$red);
    //輸出（1.到檔案  2.到瀏覽器)
    //void header ( string $header [, bool $replace = TRUE [, int $http_response_code ]] )
    header('Content-Type: image/jpeg');
    //  bool imagejpeg ( resource $image [, mixed $to [, int $quality ]] )
    imagejpeg($img);
    //清除記憶體
    //bool imagedestroy ( resource $image )
    imagedestroy($img);