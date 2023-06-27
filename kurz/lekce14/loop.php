<?php
$arr1 = [1, 2, 4, 5, 7, 9, 10, 11, 18];
$arr2 = [1, 3, 6, 7, 8, 9, 11, 12, 20];
$arrFin = [];
$arrTemp = [0][0];

$total = array($arr1, $arr2);
$totCount = count($total);
$y = 0;





while ($y < $totCount) {


    if ($y == 0) {
        foreach ($total[$y] as $x) {
            $arrTemp[$y][$x] = $x;
        }
    }

    if ($y > 0 && $y < $totCount - 1) {


        foreach ($total[++$y] as $x) {
            if ($arrTemp[$y - 1][$x] != null) {
                $arrTemp[$y][$x] = $x;
                array_push($arrFin, $x);
            }
        }
    }

    if ($y = $totCount-1) {
        foreach ($total[++$y] as $x) {
            if ($arrTemp[$y - 1][$x] != null) {
                array_push($arrFin, $x);
            }
        }
    }
}
