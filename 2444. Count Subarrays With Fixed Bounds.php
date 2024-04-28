<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $minK
     * @param Integer $maxK
     * @return Integer
     */
    function countSubarrays($nums, $minK, $maxK)
    {
        $minIndex = $maxIndex = $badIndex = -1;
        $result = 0;
        for ($i = 0; $i < count($nums); $i++) {
            $badIndex = ($nums[$i] < $minK || $nums[$i] > $maxK) ? $i : $badIndex;
            if ($badIndex == $i) continue;
            $minIndex = ($nums[$i] === $minK) ? $i : $minIndex;
            $maxIndex = ($nums[$i] === $maxK) ? $i : $maxIndex;

            $result += max(
                0,
                min($minIndex, $maxIndex) - $badIndex,
            );
        }

        return $result;
    }
}

$solution = new Solution();
var_dump($solution->countSubarrays([1, 1, 1, 1], 1, 1)); // 10
var_dump($solution->countSubarrays([1, 3, 5, 2, 7, 5], 1, 5)); // 2
var_dump($solution->countSubarrays([1, 2, 3, 4], 4, 4)); // 1
var_dump($solution->countSubarrays([1, 2, 3, 4], 1, 2)); // 1