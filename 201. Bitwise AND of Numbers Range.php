<?php
class Solution {

    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function rangeBitwiseAnd($left, $right) {
        $shift = 0;
        while ($left < $right) {
            $left >>= 1;
            $right >>= 1;
            $shift++;
        }
        return $left << $shift;
    }
}

$left = 5;
$right = 7;
$solution = new Solution();
var_dump($solution->rangeBitwiseAnd($left, $right)); // 4

$left = 3;
$right = 3;
$solution = new Solution();
var_dump($solution->rangeBitwiseAnd($left, $right)); // 3

$left = 3;
$right = 4;
$solution = new Solution();
var_dump($solution->rangeBitwiseAnd($left, $right)); // 0
