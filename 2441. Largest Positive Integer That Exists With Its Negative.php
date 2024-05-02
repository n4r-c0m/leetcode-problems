<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxK($nums) {
        $result = -1;
        $keys = array_fill_keys($nums, true);

        foreach ($nums as $num) {
            if ($num <= 0 || !isset($keys[-$num])) {
                continue;
            }

            $result = max($num, $result);
        }

        return $result;
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxK_Shortest($nums) {
        $inverted = array_map(fn($num) => -$num, $nums);
        $i = array_intersect($inverted, $nums);
        return $i ? max($i) : -1;
    }
}

$solution = new Solution();
var_dump($solution->findMaxK([-1,2,-3,3])); // 3
var_dump($solution->findMaxK([-1,10,6,7,-7,1])); // 7
var_dump($solution->findMaxK([-10,8,6,7,-2,-3])); // -1
