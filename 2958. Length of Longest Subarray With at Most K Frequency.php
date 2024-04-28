<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxSubarrayLength($nums, $k)
    {
        $right = 0;
        $counts = [$nums[0] => $max = 1];

        for ($left = 0; $left < count($nums); $left++) {
            while ($counts[$nums[$right]] <= $k) {
                $max = max($max, $right - $left + 1);

                if ($right === count($nums) - 1) {
                    return $max;
                }

                @$counts[$nums[++$right]]++;
            }

            --$counts[$nums[$left]];
        }

        return $max;
    }
}

$solution = new Solution();
var_dump($solution->maxSubarrayLength([1, 2, 3, 1, 2, 3, 1, 2], 2)); // 6
var_dump($solution->maxSubarrayLength([1, 2, 1, 2, 1, 2, 1, 2], 1)); // 2
var_dump($solution->maxSubarrayLength([5, 5, 5, 5, 5, 5, 5], 4)); // 4
var_dump($solution->maxSubarrayLength([2, 2, 3], 1)); // 2
var_dump($solution->maxSubarrayLength([1, 4, 4, 3], 1)); // 2