<?php

class Solution {

    /**
     * @param String[] $nums
     * @return String
     */
    function findDifferentBinaryString($nums) {
        $solution = '';

        $count = count($nums);
        for ($index = 0; $index < $count; $index++) {
            $solution .= 1 - (int)$nums[$index][$index];
        }

        return $solution;
    }
}

$nums = ["00","10"];
$solution = new Solution();
print_r($solution->findDifferentBinaryString($nums));