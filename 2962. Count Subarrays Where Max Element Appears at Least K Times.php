<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countSubarrays($nums, $k)
    {
        $max = max($nums);

        $currentCount = $left = $result = 0;
        for ($right = 0; $right < count($nums); $right++) {
            if ($nums[$right] === $max) {
                $currentCount++;
            }

            if ($currentCount < $k) {
                continue;
            }

            while ($nums[$left] !== $max || $currentCount > $k) {
                $left++;
                if ($nums[$left - 1] === $max) {
                    $currentCount--;
                }
            }

            $result += $left + 1;
        }

        return $result;
    }
}

$solution = new Solution();
var_dump($solution->countSubarrays([1, 3, 2, 3, 3], 2)); // 6
var_dump($solution->countSubarrays([1, 4, 2, 1], 3)); // 0