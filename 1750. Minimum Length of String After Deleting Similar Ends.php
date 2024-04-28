<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minimumLength($s) {
        $left = 0;
        $right = strlen($s) - 1;

        while ($left < $right && $s[$left] === $s[$right]) {
            $char = $s[$left];
            while ($left <= $right && $s[$left] === $char) {
                $left++;
            }

            while ($left <= $right && $s[$right] === $char) {
                $right--;
            }
        }

        return $right - $left + 1;
    }
}

$solution = new Solution();
echo $solution->minimumLength('ca') . "\n";
echo $solution->minimumLength('cabaabac') . "\n";
echo $solution->minimumLength('aabccabba') . "\n";
echo $solution->minimumLength('a') . "\n";