

<table border='1' width="100%">
    <?php
    for($j=0;$j<10;$j++) {
        echo '<tr>';
        for ($i = 1; $i <= 10; $i++) {
            $newj=$j*10;
            $h=$i + $newj;
            for($t=2;$t<$i+$newj;$t++) {
                if ($h % $t != 0) {
                    echo '<td bgcolor="red">';
                    echo $h ;
                    echo '</td>';
                    break;
                }else{
                    echo '<td>';
                    echo $i+$newj;
                    echo '</td>';
                    break;
                }
            }

        }
        echo '</tr>';
    }
    ?>
</table>


<table border='1' width="100%">
    <?php
    for($j=0;$j<10;$j++) {
        echo '<tr>';
        for ($i = 1; $i <= 10; $i++) {
            $newj=$j*10;
            $h=$i + $newj;
            for($t=2;$t<$i+$newj;$t++) {
                if ($h % $t != 0) {
                    echo '<td bgcolor="red">';
                    echo $h ;
                    echo '</td>';
                    break;
                }else{
                    echo '<td>';
                    echo $i+$newj;
                    echo '</td>';
                    break;
                }
            }

        }
        echo '</tr>';
    }
    ?>
</table>
