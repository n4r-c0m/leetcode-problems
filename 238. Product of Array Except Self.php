<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums) {
        $result = [];
        $current = 1;
        $count = count($nums);

        for ($i = 0; $i < $count; $i++) {
            $result[$i] = $current;
            $current *= $nums[$i];
        }

        $current = 1;
        for ($i = $count - 1; $i >= 0; $i--) {
            $result[$i] *= $current;
            $current *= $nums[$i];
        }

        return $result;
    }
}

$solution = new Solution();
print_r($solution->productExceptSelf([1, 2, 3, 4])); // [24,12,8,6]
print_r($solution->productExceptSelf([-1, 1, 0, -3, 3])); // [0,0,9,0,0]
print_r($solution->productExceptSelf([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])); // [3628800,1814400,1209600,907200,725760,604800,518400,453600,403200,362880]