<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums) {
        for ($i = 0, $count = count($nums); $i < $count; $i++) {
            if ($nums[$i] <= 0) {
                $nums[$i] = 0;
                continue;
            }
        }

        $nums = array_flip($nums);

        for ($i = 1; $i <= $count + 1; $i++) {
            if (isset($nums[$i])) {
                continue;
            }

            return $i;
        }

        // The code execution should never reach this part
    }
}

$solution = new Solution();
print_r($solution->firstMissingPositive([1,2,0])); // 3
print_r($solution->firstMissingPositive([3,4,-1,1])); // 2
print_r($solution->firstMissingPositive([7,8,9,11,12])); // 1
print_r($solution->firstMissingPositive([1])); // 2