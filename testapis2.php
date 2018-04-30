<?php

function checkTWId($twid)
{
    if (strlen($twid) == 10) {
        if (substr($twid, 0, 1) == 'A' || 'B') {
            if (substr($twid, 1, 1) == 1 || 2) {
//                for($i=0;$i<8;$i++) {
//                    if (substr($twid, $i + 2, 1) != 0 || 1 || 2 || 3 || 4 || 5 || 6 || 7 || 8 || 9) {
//                        return true;
//                    } else {
//                        return true;
//                    }
//                }
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}