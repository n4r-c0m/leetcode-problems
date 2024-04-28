<?php

class Solution {

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @param Integer $d
     * @return Integer
     */
    function findTheDistanceValue($arr1, $arr2, $d) {
        sort($arr1);
        sort($arr2);

        $i1 = $i2 = 0;

        $result = $countArr1 = count($arr1);
        $countArr2 = count($arr2);

        while ($i1 < $countArr1 && $i2 < $countArr2) {
            if ($arr2[$i2] - $arr1[$i1] > $d) {
                $i1++;
                continue;
            }

            if ($arr1[$i1] - $arr2[$i2] > $d) {
                $i2++;
                continue;
            }

            if (abs($arr1[$i1] - $arr2[$i2]) <= $d) {
                $result--;
                $i1++;
                continue;
            }
        }

        return $result;
    }
}
