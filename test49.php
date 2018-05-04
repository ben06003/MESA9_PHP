<?php
$src = imagecreatefromjpeg("img2.jpg");
$dst = imagecreatetruecolor(100,100);

$src_w=imagesx($src);
$src_h=imagesy($src);
if($src_w<$src_h){
    //長版
    $dst_h=100;
    $dst_w=100*$src_w/$src_h;
    $dst_x=100/2-$dst_w/2;
    $dst_y=0;
}else{
    //寬版
    $dst_h=100;
    $dst_w=100*$src_h/$src_w;
    $dst_x=0;
    $dst_y=100/2-$dst_h/2;
}
//bool imagecopyresized ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )
    imagecopyresized ( $dst, $src ,
    0 , 0 ,
    0, 0 ,
    $dst_w, $dst_h ,
    $src_w ,$src_h );
    header("Content-type:image/jpeg");
    imagejpeg($src);

    imagedestroy($src);
    imagedestroy($dst);