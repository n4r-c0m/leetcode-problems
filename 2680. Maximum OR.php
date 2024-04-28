<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maximumOr($nums, $k) {

        $targetIndex = $nums[0];
        $targetBin = decbin($targetIndex);
        for ($i = 0, $count = count($nums); $i < $count; $i++) {
            $bin = decbin($nums[$i]);
            if (strlen($bin) < strlen($targetBin)) {
                continue;
            }

            if (strlen($bin) > strlen($targetBin)) {
                $targetIndex = $i;
                $targetBin = $bin;
                continue;
            }


        }

        return $result;
    }
}

$solution = new Solution();
var_dump($solution->maximumOr([12, 9], 1)); // 30
var_dump($solution->maximumOr([3, 1, 2, 4], 2)); // 6
var_dump($solution->maximumOr([2, 2, 2], 1)); // 5
var_dump($solution->maximumOr([3, 2, 1, 5], 2)); // 7
var_dump($solution->maximumOr([3, 2, 1, 5], 5)); // 15
