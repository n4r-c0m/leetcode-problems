<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDuplicates($nums) {
        $results = [];
        for ($i = 0, $count = count($nums); $i < $count; $i++) {
            if ($nums[abs($nums[$i]) - 1] < 0) {
                $results[] = abs($nums[$i]);
                continue;
            }

            $nums[abs($nums[$i]) - 1] *= -1;
        }

        return $results;
    }
}

$solution = new Solution();
print_r($solution->findDuplicates([4, 3, 2, 7, 8, 2, 3, 1])); // [2, 3]
print_r($solution->findDuplicates([1, 1, 2])); // [1]
print_r($solution->findDuplicates([1])); // []
