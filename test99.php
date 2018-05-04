

<table border='1' width="100%">
    <?php
    // 寫程式時，變數需有是有意義的,如下＄k,$j,$i,$newj
        for($k=0;$k<2;$k++){
            echo'<tr>';
            for($j=2;$j<=5;$j++){
                $newj=$j+$k*4;
    //(boolean)?（值1):(值2) 判斷boolean為trun of flase，trun==(值1)，flase==(值2）
                echo'<td bgcolor="'.((($k+$newj)%2==0)?'yellow':'pink').'">';
                for($i=1;$i<=9;$i++){
                    $r=$i*$newj;
                    echo"{$newj} x {$i} = $r <br>";
                }
                echo'</td>';
            }
            echo'</tr>';
        }
    ?>

</table>
