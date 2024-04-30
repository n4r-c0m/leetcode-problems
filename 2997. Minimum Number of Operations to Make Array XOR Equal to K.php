<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minOperations($nums, $k) {
        $xor = 0;
        foreach ($nums as $num) {
            $xor ^= $num;
        }

        $number = $xor ^ $k;
        $result = 0;
        while ($number) {
            $result += $number & 1;
            $number >>= 1;
        }
        return $result;
    }
}

$solution = new Solution();
var_dump($solution->minOperations([3,13,9,8,5,18,11,10], 13)); // 2
var_dump($solution->minOperations([2,1,3,4], 1)); // 2