<?php
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        $s = (string)$x;
        $len = strlen($s);
        $halfLen = floor($len / 2);
        for ($i = 0; $i < $halfLen; $i++) {
            if ($s[$i] !== $s[$len - $i - 1]) {
                return false;
            }
        }

        return true;

        // 1221
        // 12221
    }
}

$solution = new Solution();
$x = 10;
var_dump($solution->isPalindrome($x));
$x = 12221;
var_dump($solution->isPalindrome($x));
$x = 12321;
var_dump($solution->isPalindrome($x));
