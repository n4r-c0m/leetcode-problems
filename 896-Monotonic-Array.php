<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isMonotonic($nums) {
        for ($index = 0; $index <= count($nums) - 1; $index++) {
            if ($nums[$index] < $nums[$index + 1]) {
                $increasing = true;
            }

            if ($nums[$index] > $nums[$index + 1]) {
                $decreasing = true;
            }

            if (isset($increasing) && isset($decreasing)) {
                return false;
            }
        }

        return true;
    }
}

$nums = [1, 2, 2, 3];
//$nums = [6, 5, 4, 4];
//$nums = [1, 3, 2];
//$nums = [1, 2, 4, 5];
//$nums = [1, 1, 1];
//$nums = [1, 1, 0];
//$nums = [1, 1, 2];
//$nums = [1, 1, 2, 3, 4, 5];
//$nums = [5, 4, 3, 2, 1];

$solution = new Solution();
var_dump($solution->isMonotonic($nums));
