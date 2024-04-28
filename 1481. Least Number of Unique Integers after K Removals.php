<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer
     */
    function findLeastNumOfUniqueInts($arr, $k) {
        $counts = array_count_values($arr);
        sort($counts, SORT_NUMERIC);

        $result = count($counts);
        foreach ($counts as $count) {
            $k -= $count;
            if ($k < 0) {
                break;
            }

            $result -= 1;
        }

        return $result;
    }
}

$arr = [5,5,4];
$k = 1;
$solution = new Solution();
echo $solution->findLeastNumOfUniqueInts($arr, $k);
