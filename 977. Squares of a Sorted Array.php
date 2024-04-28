<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortedSquares($nums) {
        $left = 0;
        $right = count($nums) - 1;

        $result = [];
        while ($left <= $right) {
            $leftSquare = $nums[$left] ** 2;
            $rightSquare = $nums[$right] ** 2;

            if ($leftSquare > $rightSquare) {
                $result[] = $leftSquare;
                $left++;
            } else {
                $result[] = $rightSquare;
                $right--;
            }
        }

        return array_reverse($result);
    }
}

$solution = new Solution();
print_r($solution->sortedSquares([-4,-1,0,3,10]));
print_r($solution->sortedSquares([-7,-3,2,3,11]));