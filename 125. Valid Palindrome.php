<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $s = strtolower($s);
        $s = preg_replace('/[^a-z0-9]/', '', $s);
        $i = 0;
        $j = strlen($s) - 1;

        while ($i < $j) {
            if ($s[$i] !== $s[$j]) {
                return false;
            }

            $i++;
            $j--;
        }

        return true;
    }
}

$solution = new Solution();
var_dump($solution->isPalindrome("A man, a plan, a canal: Panama"));