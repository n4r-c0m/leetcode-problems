<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function rearrangeArray($nums) {
        $positiveIndex = $negativeIndex = 0;
        $result = [];

        for ($pair = 1, $numOfPairs = count($nums) / 2; $pair <= $numOfPairs; $pair++) {
            while ($nums[$positiveIndex] < 0) {
                $positiveIndex++;
            }

            $result[] = $nums[$positiveIndex];
            $positiveIndex++;

            while ($nums[$negativeIndex] > 0) {
                $negativeIndex++;
            }

            $result[] = $nums[$negativeIndex];
            $negativeIndex++;
        }

        return $result;
    }
}

$nums = [3,1,-2,-5,2,-4];
$solution = new Solution();
print_r($solution->rearrangeArray($nums));
