<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function numSubarrayProductLessThanK($nums, $k)
    {
        if ($k <= 1) {
            return 0;
        }
        $ans = 0;
        $prefix_sum = 1;
        $left = 0;
        for ($i = 0; $i < count($nums); $i++) {
            $prefix_sum *= $nums[$i];
            while ($prefix_sum >= $k) {
                $prefix_sum /= $nums[$left];
                $left += 1;
            }
            $ans += $i - $left + 1;
        }

        return $ans;
    }
}

$solution = new Solution();
var_dump($solution->numSubarrayProductLessThanK([10, 5, 100, 100, 2, 6], 100));
var_dump($solution->numSubarrayProductLessThanK([10, 5, 2, 6], 100)); // 8
$nums = [1, 2, 3];
$k = 0;
var_dump($solution->numSubarrayProductLessThanK($nums, $k)); // 0
$nums = [1, 1, 1];
$k = 1;
var_dump($solution->numSubarrayProductLessThanK($nums, $k)); // 0