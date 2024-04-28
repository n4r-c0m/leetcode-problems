<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxFrequencyElements($nums)
    {
        $freqs1 = array_count_values($nums);
        $freqs2 = array_count_values($freqs1);
        return max($freqs1) * $freqs2[max($freqs1)];
    }
}

$solution = new Solution();
var_dump($solution->maxFrequencyElements([1, 2, 2, 3, 1, 4])); // 4
var_dump($solution->maxFrequencyElements([1, 2, 4, 5, 6, 7, 8, 9, 10, 11])); // 10
var_dump($solution->maxFrequencyElements([1, 2, 2, 2, 2, 2, 2, 2, 2, 2])); // 9
var_dump($solution->maxFrequencyElements([1, 2, 2, 2, 2, 2, 2, 2, 2, 3])); // 8
var_dump($solution->maxFrequencyElements([1, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3])); // 8
