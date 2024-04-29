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

        $result = 0;
        for ($i = 0; $i < 22; $i++) {
            if ((($xor & (1 << $i)) > 0) != (($k & (1 << $i)) > 0)) {
                $result++;
            }
        }

        return $result;
    }
}

$solution = new Solution();
var_dump($solution->minOperations([3,13,9,8,5,18,11,10], 13)); // 2
var_dump($solution->minOperations([2,1,3,4], 1)); // 2